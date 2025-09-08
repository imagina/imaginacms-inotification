<?php

namespace Modules\Inotification\Services;

use Illuminate\Http\Response;
use Modules\Inotification\Services\NotificationDispatcherService;

class NotificationService
{

    /**
     * get Data Example to test notification layout (email)
     * @param mixed $request
     */
    public function getDataExample(mixed $request): mixed
    {
        $to = $request->query('email');
        $config = $request->query('config');

        //Validation Data from Config
        if ($config) {
            $dataFromConfig = config($config);
            if (isset($dataFromConfig['extraParams'])) {

                $resolvedParams = [];
                foreach ($dataFromConfig['extraParams'] as $key => $value) {
                    if (is_array($value) && isset($value['entity'], $value['param'])) {
                        $id = $request->query($value['param']);
                        $entityClass = $value['entity'];
                        $resolvedParams[$key] = $id ? $entityClass::find($id) : null;
                    } else {
                        $resolvedParams[$key] = $value;
                    }
                }
                $dataFromConfig['extraParams'] = $resolvedParams;
            }
        }

        $dataDefault = [
            'title' => itrans("inotification::notification.email.default.title"),
            'message' => itrans("inotification::notification.email.default.message")
        ];

        if (isset($dataFromConfig)) {
            $dataFromConfig['title'] = itrans($dataFromConfig['title']);
            $data = array_merge($dataDefault, $dataFromConfig);
        }


        //Validation to Send Email
        if ($to) {
            //Validation Email
            if (!filter_var($to, FILTER_VALIDATE_EMAIL)) {
                return response()->json(['error' => 'Invalid Email'], Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            $dataToSend = isset($data) ? $data : $dataDefault;
            $dataToSend['email'] = $to;

            app(NotificationDispatcherService::class)->execute($dataToSend);
        }

        return $data ?? $dataDefault;
    }
}
