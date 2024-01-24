{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verifikasi Akun</title>
</head>
<body>
    <p>Hello <b> {{$details['username'] }}</b>!
    </p>

    <p>
        Berikut ini adalah data anda:
    </p>

    <table>
        <tr>
            <td>Username : {{$details['username'] }}</td>
            <td>Username : {{$details['password'] }}</td>
        </tr>

        <tr>
            <td>Websie : {{$details['website'] }} </td>
        </tr>

        <tr>
            <td>Tanggal Register : {{$details['datetime'] }}</td>
        </tr>

        <center>
            <h3>
                Copy link dibawah ini untuk verifikasi akun :
            </h3>
            <b style="color:blue">{{$details['url']}} </b>
        </center>

        <p>
            Terima kasih telah melakukan registrasi
        </p>
    </table>
</body>
</html> --}}

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Help - Email Verification</title>
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
                <a href="https://wehelpyou.xyz" target="_blank">
                  <img src="https://wehelpyou.xyz/statics/logo/help-logo-email.png" alt="Logo" style="width:420px; margin: -100px -100px; border:0;"/>
                </a>
              </td>
            </tr>
            <tr>
              <td bgcolor="#fff">
                <table cellpadding="0" cellspacing="0" width="100%%">
                  <tr>
                    <td style="padding: 10px 0 10px 0; font-family: Nunito, sans-serif; font-size: 20px; font-weight: 900">
                      Aktifkan Akun Help Anda
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
                      Hi, <span id="name">&#60;Name&#62;</span>
                    </td>
                  </tr>
                  <tr>
                    <td style="padding: 0; font-family: Nunito, sans-serif; font-size: 16px;">
                      Terima kasih telah mendaftar di Help. Mohon konfirmasi email ini untuk mengaktifkan akun Help Anda.
                    </td>
                  </tr>
                  <tr>
                    <td style="padding: 20px 0 20px 0; font-family: Nunito, sans-serif; font-size: 16px; text-align: center;">
                      <button style="background-color: #e04420; border: none; color: white; padding: 15px 40px; text-align: center; display: inline-block; font-family: Nunito, sans-serif; font-size: 18px; font-weight: bold; cursor: pointer;">
                        Konfimasi Email
                      </button>
                    </td>
                  </tr>
                  <tr>
                    <td style="padding: 0; font-family: Nunito, sans-serif; font-size: 16px;">
                      Jika Anda kesulitan mengklik tombol "Konfirmasi Email", copy dan paste URL di bawah ke dalam browser Anda:
                      <p id="url">&#60;URL&#62;</p>
                    </td>
                  </tr>
                  <tr>
                    <td style="padding: 50px 0; font-family: Nunito, sans-serif; font-size: 16px;">
                      Regards,
                      <p>Help</p>
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
