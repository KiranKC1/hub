
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <style type="text/css">
        /* CLIENT-SPECIFIC STYLES */
        body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
        table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
        img { -ms-interpolation-mode: bicubic; }
        
        /* RESET STYLES */
        img { border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; }
        table { border-collapse: collapse !important; }
        body { height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important; }
        
        /* iOS BLUE LINKS */
        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }
        
        /* MEDIA QUERIES */
        @media  screen and (max-width: 480px) {
            .mobile-hide {
                display: none !important;
            }
            .mobile-center {
                text-align: center !important;
            }
        }
        
        /* ANDROID CENTER FIX */
        div[style*="margin: 16px 0;"] { margin: 0 !important; }
        

        .tag ul li {
            display: inline-block;  
            margin-bottom: 5px;
        }
        
        .tag ul li{
            color: black;
            padding: 4px 7px;
            border: 1px solid #7bc634;
            border-radius: 25px;
            font-size: .6rem;
            font-weight:600;
            background-color: #f6c42c;
            font-family:'Boogaloo', cursive;
        }
        </style>
    </head>
    <body style="margin: 0 !important; padding: 0 !important;" bgcolor="#eeeeee">
        
        
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <td align="center" style="background-color: #eeeeee;" bgcolor="#eeeeee">
                <!--[if (gte mso 9)|(IE)]>
                <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
                <tr>
                <td align="center" valign="top" width="600">
                <![endif]-->
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                    <tr>
                        <td align="left" valign="top" style="padding: 8px 35px" bgcolor="#4397b6">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                                <tr>
                                    <td align="left" style="font-family:brandon-grotesque; font-size: 14px; font-weight: 400; line-height: 24px;">
                                        <a target="_blank" href="{{ URL::to('/') }}"><img width="60" height="64" src="{{ asset('assets/img/now-logo.png') }}" style="margin-bottom: 10px;" alt="EZU DRIVE"></a>

                                    </td>
                                    <td align="right">
                                        <a href="{{ URL::to('/') }}">
                                            <img src="{{ asset('assets/img/ryan.jpg') }}" title="{{ $user['name'] }}" width="50" style="border-radius:50%"/>
                                        </a>
                                    </td>
                                </tr>
                            </table>
                            
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding: 35px; background-color: #f9f9f9;" bgcolor="#f9f9f9">
        
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                                <tr>
                                    <td align="left" style="font-family:brandon-grotesque; font-size: 16px; font-weight: 400; line-height: 24px;">
                                        
                                        <p style="font-size: 18px; font-weight: 800; line-height: 24px; color: #333333;">
                                            Hello {{ $user['name'] }},
                                        </p>
                                        
                                        <p style="font-size: 16px; font-weight: 400; line-height: 24px; color: #4c4747;">
                                            You recently registered {{ $user['email'] }} as your email address for your Ezu account. To verify that this email address belongs to you, please click on the link below and then sign in using this email and password.
                                            <div style="text-align:center;margin:20px">
                                                <a href="{{ $url }}" style="background-color:#4397b6;color:#ffffff;display:inline-block;font-family:brandon-grotesque;text-transform: uppercase;font-size:14px;font-weight:regular;line-height:45px;text-align:center;text-decoration:none;width:155px;-webkit-text-size-adjust:none;mso-hide:all;">Confirm Email</a>
                                            </div>

                                            <span style=" color: #4c4747;">
                                                If you did not make this registration, you can ignore this email.
                                            </span>

                                        </p>
            
                                        <p style="font-size: 16px; font-weight: 600; line-height: 24px; color: #333333;">                              
                                            Thanks,<br>
                                            EZU Drive
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="max-width:600px;height: 50px;background-color: #f9f9f9;"></td>
                    </tr>
                    <tr>
                        <td align="center" style="padding: 35px; background-color: #3c3b3b;" bgcolor="#3c3b3b">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                                <tr>
                                    <td align="left" style="font-family:brandon-grotesque; font-size: 14px; font-weight: 400; line-height: 24px;">
                                        <p style="font-size: 14px; font-weight: 400; line-height: 20px; color: #dfdfdf;">
                                            <a href="{{ URL::to('/') }}" style="color:#dfdfdf;" target="_blank">Ezunotes</a> | 
                                            <a href="{{ URL::to('events') }}" style="color:#dfdfdf;" target="_blank">Ezucareer</a> | 
                                            <a href="{{ URL::to('download') }}" style="color:#dfdfdf;" target="_blank">Ezuhub</a>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="padding: 10px 0px;font-family:brandon-grotesque; font-size: 14px; font-weight: 400; line-height: 24px;">
                                        <p style="font-size: 14px; font-weight: 400; line-height: 20px; color: #777777;">
                                            
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" style="font-family:brandon-grotesque; font-size: 14px; font-weight: 400; line-height: 24px;">
                                        <p style="font-size: 14px; font-weight: 400; line-height: 20px; color: #777777;">
                                            Copyright © 2018 Incube
                                        </p>
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
                    
                    
