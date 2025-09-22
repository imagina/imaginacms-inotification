<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<body>
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0"
       align="center" bgcolor="#f5f5f5" height="100%"
       style="border-collapse:collapse;font-family:'Open Sans', sans-serif,Arial, sans-serif, 'Segoe UI Symbol', Symbol;">
  <tbody>
  <tr>
    <td>
      <table width="700" cellpadding="0" cellspacing="0" border="0" align="center" bgcolor="#ffffff" height="100%">
        <tbody>
        <tr>
          <td align="center">
            @include('inotification::emails.base.header')
          </td>
        </tr>
        <tr>
          <td align="left">
            @yield('content')
          </td>
        </tr>
        <tr>
          <td align="center">
            @include('inotification::emails.base.footer')
          </td>
        </tr>
        </tbody>
      </table>
    </td>
  </tr>
  </tbody>
</table>
</body>
</html>
