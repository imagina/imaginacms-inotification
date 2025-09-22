@php
  $contactRepository = app('Modules\Icontact\Repositories\ItemRepository');
  $contactParams = [
    'filter' => [
      'type_id' => [
        'where' => 'in',
        'value' => [0, 2],
        'is_enable' => 1
      ]
    ]
  ];
  $contactData = $contactRepository->getItemsBy(json_decode(json_encode($contactParams)));
@endphp

<hr style="background-color: transparent;border: 0.5px solid #e2e2e2; margin:40px 0;">

<tr>
  <td align="center" style="padding:30px 0 20px;">
    <table role="presentation" width="700" cellpadding="0" cellspacing="0" border="0" align="center" bgcolor="#ffffff"
           height="100%"
           style="border-collapse:collapse;font-family:'Open Sans', sans-serif,Arial, sans-serif, 'Segoe UI Symbol', Symbol;">
      <!--
      INFO CONTACT
      -->
      <tr>
        <td style="padding-bottom:20px">
          <table role="presentation" width="700" cellpadding="0" cellspacing="0" border="0" align="center" height="100%"
                 style="border-collapse:collapse;font-family:'Open Sans', sans-serif,Arial, sans-serif, 'Segoe UI Symbol', Symbol;">
            <tr>
              <td align="center">
                <!--
                PHONES
               -->
                <p
                  style="font-size:13.5px; line-height:1.4; font-weight:400; color:#212529;margin:0 0 5px 0;;text-align:center;">
                  @if(!empty($contactData))
                    @foreach($contactData as $phone)
                      @if($phone->type_id == 0)
                        <a href="tel:{{$phone->country_code . $phone->value}}"
                           style="text-decoration:none;color:#212529;font-weight:500;">
                          (+{{ $phone->country_code }}) {{ $phone->value }}
                        </a>
                        @if(!$loop->last)
                          -
                        @endif
                      @endif
                    @endforeach
                  @endif
                </p>
                
                <!--
                 EMAILS
                -->
                <p
                  style="font-size:13.5px; line-height:1.4; font-weight:500; color:#212529; margin:0;text-align:center;">
                  @if(!empty($contactData))
                    @foreach($contactData as $email)
                      @if($email->type_id == 2)
                        <a href="mailto:{{$email->value}}"
                           style="text-decoration:none;color:#212529;font-weight:600;">
                          {{ $email->value }}
                        </a>
                        @if(!$loop->last)
                          -
                        @endif
                      @endif
                    @endforeach
                  @endif
                </p>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      
      <!--
      COPYRIGHT
      -->
      <tr align="center">
        <td align="center" style="padding-bottom: 20px;">
          <a href="{{ env('APP_URL', url('')) }}" target="_blank" style="text-decoration:none;">
            <p style="font-size:13.5px; line-height:1.4; font-weight:400; color:#212529; margin:0;text-align:center;">
              <span style="color:{{ setting('isite::brandPrimary') }}; font-weight:600;">
                ©{{ date("Y") }} - <b><em>{{setting('isite::siteName')}}</em></b>
              </span>.
              {{ trans('isite::copyright.text') }}
            </p>
          </a>
        </td>
      <tr>
        <td>
          <table role="presentation" width="700" cellpadding="0" cellspacing="0" border="0" align="center" height="100%"
                 style="border-collapse:collapse;font-family:'Open Sans', sans-serif,Arial, sans-serif, 'Segoe UI Symbol', Symbol;">
            <tr>
              <td align="center"
                  style="font-size:13.5px; line-height:1.4; font-weight:400; color:#212529; margin:0;text-align:center;">
                <a href="{{ env('APP_URL', url('')) }}" target="_blank"
                   style="font-size:13.5px;line-height:1.4;font-weight:600;color:#212529;margin:0;text-align:center;"
                   title="Visitar sitio">
                  {{trans("inotification::notification.email.date.from")}}: {{ env('APP_URL', url('')) }}
                </a>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </td>
</tr>