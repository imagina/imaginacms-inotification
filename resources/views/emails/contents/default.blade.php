@extends($data["layout"] ?? setting('inotification::templateEmail'))

@section('content')
  
  @if(isset($data["content"]) && $data["content"])
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0"
           style="background-color:#f5f5f5; padding:20px 15px;font-family:'Open Sans', sans-serif,Arial, sans-serif, 'Segoe UI Symbol', Symbol;">
      <tr>
        <td>
          @include($data["content"])
        </td>
      </tr>
    </table>
  @else
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0"
           style="background-color:#ffffff; padding:50px 25px;">
      <tr>
        <td style="padding:32px 0;background:#fff;">
          <h1 style="font-size:24px;color:#222;margin-bottom:16px;font-family:Arial,sans-serif;">
            {!! $data["title"] !!}
          </h1>
        </td>
      </tr>
      <tr>
        <td style="font-size:16px;color:#444;line-height:1.6;font-family:Arial,sans-serif;">
          {!! $data["message"]!!}
        </td>
      </tr>
    </table>
  @endif

@stop
