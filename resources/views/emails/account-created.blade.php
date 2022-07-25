<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="x-apple-disable-message-reformatting">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&display=swap" rel="stylesheet">
    <title></title>
    <!--[if mso]>
    <noscript>
        <xml>
            <o:OfficeDocumentSettings>
                <o:PixelsPerInch>96</o:PixelsPerInch>
            </o:OfficeDocumentSettings>
        </xml>
    </noscript>
    <![endif]-->
    <style>
        body{font-family: 'Poppins', sans-serif;}
    </style>
</head>
<body style="margin:0;padding:0;background-color:#FFF">
    <table role="presentation" style="width:602px;border-collapse:collapse;border-spacing:0;text-align:left;margin:0 auto">
        <tr>
            <td align="center" style="padding:40px 0 30px 0;background:#1a1a1a;">
                <img src="{{ asset('images/nexday-logo-email-header.png') }}" alt="" width="300" style="height:auto;display:block;margin:0 auto" />
            </td>
        </tr>
        <tr>
            <td style="padding:80px 20px;background-color:#EBF1F4">
                <img src="{{ asset('images/mail-verify.png') }}" alt="" width="146" height="48" style="height:auto;display:block;margin:0 auto 25px" />
                <h2 style="text-align:center;color:#2a2a2a;font-size:2em;text-transform:capitalize;margin-bottom: 15px;margin:0 0">Account Created Successfully</h2>
                <p style="text-align:center;color:#888;margin:10px 0 0;font-size:1.3em;line-height:1.6em">Please find your login credentials below.</p>
                <p style="font-size: 13px;color:#888;text-align:center;padding:0;margin:0;"><em>Your login is only active when you have verified your email address.</em></p>
            </td>
        </tr>
        <tr>
            <td style="padding:15px;">
                <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                    <tr>
                        <td style="padding:20px;">
                            <h3 style="text-align:center;padding:15px 0 10px;font-size:14px;font-weight:bold;color:rgb(102, 102, 102);margin:0;">Email Address</h1>
                            <p style="width:40%;margin:0 auto;padding: 15px 25px;background-color:#EBF1F4;font-size:16px;border-radius:4px;color:#313131;text-align:center;font-weight:bold;">{{ $email }}</p>
                            <h4 style="text-align:center;padding:15px 0 10px;font-size:14px;font-weight:bold;color:rgb(102, 102, 102);margin:0;">Password</h1>
                            <p style="width:40%;margin:0 auto;padding: 15px 25px;background-color:#EBF1F4;font-size:16px;border-radius:4px;color:#313131;text-align:center;font-weight:bold;">{{ $accountPassword }}</p>
                            <p><a href="{{ url('register/verify-email/' . $verifyToken) }}" style="display: block;width:60%;margin: 30px auto;border-radius:5px;background-color:#2d2dd4;color:#fff;padding: 15px 25px;text-align:center;font-weight:bolder;font-size:18px;text-decoration:none">Verify Email Address</a></p>
                            <p style="margin: 25px 0;padding:30px 0;text-align:center;font-size:1.1em;color:rgb(85, 85, 85);line-height:1.52em">
                                Welcome on board the Nexday&copy; project. A community governed by transparency, and equal opportunities. We believe collectively, our dream of creating a platform that serves your business requirements satisfactorily, is feasible,
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <div style="border-top: 1px solid #eee!important;padding:40px 25px;text-align:center">
                    <p style="color:#888">&copy;{{ date('Y') }} Aknessy Resources</p>
                    <p style="color:#888;line-height: 1.4em;padding:10px 0">23 Nkonib layout, Calabar Municipality,<br /> Calabar, Cross River State,<br /> Nigeria.</p>
                </div>
            </td>
        </tr>
        <tr>
            <td style="padding:30px;background-color:#EBF1F4">
                <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                    <tr>
                        <td style="padding:0;width:50%;text-align:center;" align="left">
                            <a href="" style="text-decoration:uderline;color:#888;font-size:1.1em;">Help Center</a>
                        </td>
                        <td style="padding:0;width:50%;text-align:center" align="right">
                            <a href="" style="text-decoration:uderline;color:#888;font-size:1.1em;">Preferences</a>
                        </td>
                        <td style="padding:0;width:50%;text-align:center" align="right">
                            <a href="" style="text-decoration:uderline;color:#888;font-size:1.1em;">Unsubscribe</a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>