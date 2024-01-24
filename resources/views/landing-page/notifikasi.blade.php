<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Sintesia Animalia Indonesia - Email Verification</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800,900&display=swap" rel="stylesheet">
  </head>
  <body style="margin: 0; padding: 0; box-sizing: border-box;">
    <table align="center" cellpadding="0" cellspacing="0" width="95%">
      <tr>
        <td align="center">
          <table align="center" cellpadding="0" cellspacing="0" width="600" style="border-spacing: 2px 5px;" bgcolor="#fff">
            <tr>
              <td align="center" style="padding: 5px 5px 5px 5px;">
              </td>
            </tr>
            <tr>
              <td bgcolor="#fff">
                <table cellpadding="0" cellspacing="0" width="100%%">
                  <tr>
                    <td style="padding: 10px 0 10px 0; font-family: Nunito, sans-serif; font-size: 20px; font-weight: 900">
                      Aktifkan Akun Anda
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td bgcolor="#fff">
                <table cellpadding="0" cellspacing="0" width="100%%">
                  <tr>
                    <td style="padding: 20px 0 20px 0; font-family: Nunito, sans-serif; font-size: 16px;">
                      Hi, <span id="name">{{$details['username'] }}</span>
                    </td>
                  </tr>
                  <tr>
                    <td>Username : {{$details['username'] }}</td>
                  </tr>
                  <tr>
                    <td>Password : {{$details['password'] }}</td>
                  </tr>
                  <tr>
                    <td style="padding: 0; font-family: Nunito, sans-serif; font-size: 16px; margin-top:20px">
                      Terima kasih telah mendaftar di Sintesia Animalia Indonesia. Mohon konfirmasi email ini untuk mengaktifkan akun Anda dengan cara copy dan paste URL di bawah ke dalam browser Anda:
                    </td>
                  </tr>
                  <tr>
                    <td style="padding: 0; font-family: Nunito, sans-serif; font-size: 16px;">
                      <p id="url" style="color:blue">{{$details['url']}}</p>
                    </td>
                  </tr>
                  <tr>
                    <td style="padding: 50px 0; font-family: Nunito, sans-serif; font-size: 16px;">
                      Hormat Kami,
                        <p>Sintesia Animalia Indonesia</p>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </body>
</html>
