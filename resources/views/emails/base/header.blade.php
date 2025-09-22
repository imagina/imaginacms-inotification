<tr>
  <td align="center" style="padding: 0;">
    <table role="presentation" width="700" cellpadding="0" cellspacing="0" border="0"
           style="border-collapse: collapse;overflow: hidden; background-color: #ffffff;">
      <tr>
        <td align="center" style="padding: 13px 25px 13px 25px;">
          <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" align="center"
                 bgcolor="#fff" height="100%"
                 style="border-collapse:collapse;font-family:'Open Sans', sans-serif,Arial, sans-serif, 'Segoe UI Symbol', Symbol;">
            <tr>
              <!--
              LOGO
              -->
              <td align="left" valign="middle" width="50%" style="padding: 10px 0;">
                <a href="{{ env('APP_URL', url('')) }}" target="_blank" style="display: inline-block;">
                  <img src="{{setting('isite::logo1')}}" alt="{{setting('core::site-name-mini')}}" width="120"
                       height="65"
                       style="display:block; width:120px; height:65px; object-fit:contain; object-position:left; border:0; outline:none; text-decoration:none;">
                </a>
              </td>
              
              <!--
              DATE
              -->
              <td align="right" valign="middle" width="50%" style="padding: 10px 0;">
                <p
                  style="margin:0 0 10px 0;font-weight:800;color:#212529;font-size:14px;line-height:1;text-transform:capitalize;">
                  {{ strftime("%d de %B") }}
                </p>
                <P
                  style="margin:0;font-weight:800;color:#212529;font-size:14px;line-height:1;text-transform:capitalize;">
                  {{ strftime("%G") }}
                </P>
                <span
                  style="border-bottom:1.5px solid {{setting('isite::brandPrimary')}}; width:45px;display:block;margin-top:2px;"></span>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </td>
</tr>