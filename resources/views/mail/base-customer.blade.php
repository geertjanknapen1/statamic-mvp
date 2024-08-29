<html>
    <head>
        <title>@yield('subject')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    </head>

    <body style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; margin: 0; padding: 0; font-family: Arial, sans-serif; height: 100%; width: 600px;">
        <table>
            <tr>
                <td width="580">
                    <table style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; margin: auto; width: 600px; border-collapse: collapse;"
                           width="600px">
                        <tr>
                            <td colspan="3"
                                style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #495f1c; height: 1px; line-height: 1px; padding:0;"
                                height="1" bgcolor="#495f1c"></td>
                        </tr>
                        <tr>
                            <td colspan="3"
                                style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; height: 10px; line-height: 10px; padding:0;"
                                height="10"></td>
                        </tr>
                        <tr>
                            <td style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 30px;" width="30"></td>
                            <td align="left"
                                style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 200px; height: 60px; line-height: 60px; float: left;"
                                width="200" height="60">
                                <a href="{{ URL::to('/') }}" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;">
                                    <img src="{{ url('bertels/assets/images/logo_small.png') }}" alt="Bertels B.V."
                                         style="-ms-interpolation-mode: bicubic; border: 0; line-height: 100%; outline: none; text-decoration: none; height: 39px; width: 150px;" width="150"
                                         height="39">
                                </a>
                            </td>
                            <td style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 30px;" width="30"></td>
                        </tr>
                        <tr>
                            <td colspan="3" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt;">
                                <table
                                    style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; margin: auto; width: 600px; height: 500px; border-collapse: collapse;"
                                    width="600" height="500">
                                    <tr>
                                        <td style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 30px;" width="30"></td>
                                        <td style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: auto; vertical-align: top; text-align: left;"
                                            valign="top" align="left">
                                            <br>
                                            <h1 style="font-size: 1.1rem; display: block;">@yield('subject')</h1>
                                            @yield('content')
                                            <br>
                                            <br>
                                        </td>
                                        <td style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 30px;" width="30"></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3"
                                style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #495f1c; height: 1px; line-height: 1px; padding:0;"
                                height="1" bgcolor="#495f1c"></td>
                        </tr>
                        <tr>
                            <td colspan="3"
                                style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; height: 10px; line-height: 10px; padding:0;"
                                height="10">&nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 30px;" width="30"></td>
                            <td align="right"
                                style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 200px; height: 60px; line-height: 60px; float: right;"
                                width="200" height="60">
                                <a href="{{ URL::to('/') }}" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;">
                                    <img src="{{ url('bertels/assets/images/logo_small.png') }}" alt="Bertels B.V."
                                         style="-ms-interpolation-mode: bicubic; border: 0; line-height: 100%; outline: none; text-decoration: none; height: 39px; width: 150px;" width="150"
                                         height="39">
                                </a>
                            </td>
                            <td style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 30px;" width="30"></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                @yield('footer')
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>
