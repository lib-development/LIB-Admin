<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simples-Minimalistic Responsive Template</title>
    <style type="text/css">
        /* Client-specific Styles */
        /* Force Outlook to provide a "view in browser" menu link. */
        /* Prevent Webkit and Windows Mobile platforms from changing default font sizes, while not breaking desktop design. */
        p,a{
            font-family: Helvetica, arial, sans-serif;
        }
        .ExternalClass {width:100%;} /* Force Hotmail to display emails at full width */
        .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height: 100%;} /* Force Hotmail to display normal line spacing.*/
        /*STYLES*/
        /*IPAD STYLES*/
        @media only screen and (max-width: 640px) {
            a[href^="tel"], a[href^="sms"] {
                text-decoration: none;
                color: #0a8cce; /* or whatever your want */
                pointer-events: none;
                cursor: default;
            }
            .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
                text-decoration: default;
                color: #0a8cce !important;
                pointer-events: auto;
                cursor: default;
            }
            table[class=devicewidth] {width: 440px!important;text-align:center!important;}
            table[class=devicewidthinner] {width: 420px!important;text-align:center!important;}
            img[class=banner] {width: 440px!important;height:220px!important;}
            img[class=colimg2] {width: 440px!important;height:220px!important;}
        }
        /*IPHONE STYLES*/
        @media only screen and (max-width: 480px) {
            a[href^="tel"], a[href^="sms"] {
                text-decoration: none;
                color: #0a8cce; /* or whatever your want */
                pointer-events: none;
                cursor: default;
            }
            .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
                text-decoration: default;
                color: #0a8cce !important;
                pointer-events: auto;
                cursor: default;
            }
            table[class=devicewidth] {width: 280px!important;text-align:center!important;}
            table[class=devicewidthinner] {width: 260px!important;text-align:center!important;}
            img[class=banner] {width: 280px!important;height:140px!important;}
            img[class=colimg2] {width: 280px!important;height:140px!important;}
            td[class=mobile-hide]{display:none!important;}
            td[class="padding-bottom25"]{padding-bottom:25px!important;}
        }
        .clearfix {
            overflow: auto;
        }
    </style>
</head>
<body style="-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;margin:0;padding:0;width:100% !important">
<!-- Start of preheader -->
<table width="100%" bgcolor="#ffffff" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="preheader" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;margin:0;padding:0;width:100% !important;line-height:100% !important">
    <tbody>
    <tr>
        <td style="border-collapse:collapse">
            <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt">
                <tbody>
                <tr>
                    <td width="100%" style="border-collapse:collapse">
                        <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt">
                            <tbody>
                            <!-- Spacing -->
                            <tr>
                                <td width="100%" height="10" style="border-collapse:collapse"></td>
                            </tr>
                            <!-- Spacing -->

                            <!-- Spacing -->
                            <tr>
                                <td width="100%" height="10" style="border-collapse:collapse"></td>
                            </tr>
                            <!-- Spacing -->
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>
<!-- End of preheader -->
<!-- Start of header -->
<table width="100%" bgcolor="#ffffff" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="header" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;margin:0;padding:0;width:100% !important;line-height:100% !important">
    <tbody>
    <tr>
        <td style="border-collapse:collapse">
            <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt">
                <tbody>
                <tr>
                    <td width="100%" style="border-collapse:collapse">
                        <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt">
                            <tbody>
                            <!-- Spacing -->
                            <tr>
                                <td height="20" style="border-collapse:collapse;font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
                            </tr>
                            <!-- Spacing -->
                            <tr>
                                <td style="border-collapse:collapse;border-bottom: 1px solid #eee;">
                                    <!-- logo -->
                                    <table width="500" align="center" border="0" cellpadding="0" cellspacing="0" class="devicewidth" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt">
                                        <tbody>
                                        <tr>
                                            <td width="400" height="45" align="center" style="border-collapse:collapse">
                                                <div class="imgpop">
                                                    <a target="_blank" href="#" style="color: #1e1e1e;text-decoration:none;text-decoration:none !important; font-size: 35px;">
                                                        {{ $info['subject'] }}</a>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <!-- end of logo -->
                                </td>

                            </tr>


                            <!-- Spacing -->
                            <tr>
                                <td height="20" style="border-collapse:collapse;font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
                            </tr>
                            <!-- Spacing -->
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>
<!-- End of Header -->
<!-- Start of main-banner -->

<!-- End of main-banner -->
<!-- Start of seperator -->
<table width="100%" bgcolor="#ffffff" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="seperator" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;margin:0;padding:0;width:100% !important;line-height:100% !important">
    <tbody>
    <tr>
        <td style="border-collapse:collapse">
            <table width="600" align="center" cellspacing="0" cellpadding="0" border="0" class="devicewidth" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt">
                <tbody>
                <tr>
                    <td align="center" height="20" style="border-collapse:collapse;font-size:1px; line-height:1px;">&nbsp;</td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>
<!-- End of seperator -->
<!-- Start Full Text -->
<table width="100%" bgcolor="#ffffff" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="full-text" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt;margin:0;padding:0;width:100% !important;line-height:100% !important">
    <tbody>
    <tr>
        <td style="border-collapse:collapse">
            <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt">
                <tbody>
                <tr>
                    <td width="100%" style="border-collapse:collapse">
                        <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt">
                            <tbody>
                            <!-- Spacing -->
                            <tr>
                                <td height="20" style="border-collapse:collapse;font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
                            </tr>
                            <!-- Spacing -->
                            <tr>
                                <td style="border-collapse:collapse">
                                    <table width="560" align="center" cellpadding="0" cellspacing="0" border="0" class="devicewidthinner" style="border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt">
                                        <tbody>
                                        <!-- Title -->

                                        <!-- End of spacing -->
                                        <!-- content -->
                                        <tr>
                                            <td style="border-collapse:collapse;font-family: Helvetica, arial, sans-serif; font-size: 12px; margin-top: 30px;color: #666666; text-align:left; line-height: 30px;" st-content="fulltext-content">
                                                {!! $message_data !!}
                                            </td>
                                        </tr>
                                        <!-- End of content -->
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <!-- Spacing -->
                            <tr>
                                <td height="20" style="border-collapse:collapse;font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
                            </tr>
                            <!-- Spacing -->
                            </tbody>
                        </table>
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