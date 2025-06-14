<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="x-ua-compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <title>PLEXPOINDIA 2024</title>
    <style>
        body { margin: 0; padding: 0; font-family: LATO LIGHT, sans-serif; background: #CCCCCC !important; }
        a { border: 0; outline: none; text-decoration: none; cursor: pointer; }
        a, a:hover { transition: all .3s; -o-transition: all .3s; -ms-transition: all .3s; -moz-transition: all .3s; -webkit-transition: all .3s; }
        img { border: 0; outline: none; max-width: 100%; }
        .table { background-color: #fff; }
        .mobile-show { display: none !important; }

        @media only screen and (max-width:600px) {
            .mobile-show { display: block !important; }
            .mble-width { width: 18px !important; }
            .item-table { border-left: 0 !important; border-right: 0 !important; border-top: 1px solid #E4E2E2; border-bottom: 1px solid #E4E2E2 }
            .border { border-top: 1px solid #E4E2E2 !important; }
            .main-table { width: 100% !important; }
            .table { width: 100% !important; }
            .space { width: 15px !important; }
            .footer-space { width: 10px !important }
            .td-height { height: 25px !important; }
            .text { line-height: 34px !important; }
            .hide { display: none !important; }
            .survey-block { width: 30px !important; }
            .info { width: 100% !important; }
            .logo { width: 200px !important; }
            .perfect-fit { display: inline !important; }
            .mobile-menu { display: none !important; }
            .tracking-mobile-menu { display: inline-block; width: 35%; }
            .column-space { width: 20px !important; }
            .align-left { text-align: left !important; }
            .footer-td { width: 4px !important }
            .title-text { font-size: 20px !important; line-height: 30px !important; }
            .order-text { font-size: 14px !important; line-height: 18px; letter-spacing: 2.63px; }
            .footer-text { display: inline; text-align: center; }
            .item-text { font-size: 12px !important; letter-spacing: 1.85px !important; }
            .preparing { width: 120px !important; text-align: center; }
            .block { display: block !important; text-align: center !important; }
            .order-text { font-size: 13px !important; }
            .full-table { width: 100% !important; }
            .footer-font { font-size: 8.4px !important; line-height: 10.8px !important; }
            .social-space { width: 7px !important; }
            .social-link, .social-link img { width: 18px !important; }
            .body-font { font-size: 12px !important; line-height: 18px !important; }
            .title-font { font-size: 14px !important; line-height: 20px !important; }
            .mb-lg-height { height: 24px !important; }
            .mb-md-height { height: 15px !important; }
            .mb-top-space { height: 15px !important; }
        }

        @media only screen and (max-width:480px) {
            .item-col-1 { width: 2% !important; }
            .item-col-2 { width: 22% !important; }
            .item-col-3 { width: 13% !important; }
            .item-col-4 { width: 33% !important; }
            .item-col-5 { width: 28% !important; }

        }

        @media only screen and (max-width:374px) {
            .footer-listing { width: 100%; display: block; height: 25px !important; }
            .listing-hide { display: none !important; }
            .main-table { width: 100% !important; }
        }
    </style>
</head>

<body style="margin:0; font-family: LATO LIGHT, sans-serif; font-size:14px;background:#CCCCCC">
    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#CCCCCC">
        <tbody>
            <tr>
                <td>
                    <table width="600" align="center" cellpadding="0" cellspacing="0" border="0" class="main-table"
                    style="background-color:#fff;">
                    <tbody>
                        <tr>
                            <td class="mb-top-space" height="25" valign="top" style="font-size:0; line-height:0;background-color: #CCCCCC;" bgcolor="#CCCCCC"></td>
                        </tr>

                        <tr>
                            <td width="100%">
                                <img src="{{ asset('images/mail-header.jpeg') }}" style="margin: 0; border: 0; padding: 0; display: block; width: 100%; max-width: 600px;"/>
                            </td>
                        </tr>

                        <tr>
                            <td class="mb-md-height" height="25" valign="top" style="font-size:0; line-height:0;"></td>
                        </tr>

                        <tr>
                            <td>
                                <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                    <tbody>
                                        <tr>
                                            <td width="30" class="mble-width"></td>
                                            <td>
                                                <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                                    <tbody>
                                                        <tr>
                                                            <td class="title-font" style="font-family: LATO LIGHT, sans-serif;font-size: 20px; line-height: 24px;color: #005040;font-weight: bold;">
                                                                Dear <?php echo $data['name'];?>,
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td height="10" valign="top" style="font-size:0; line-height:0;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="body-font" style="font-family: LATO LIGHT, sans-serif;font-size: 16px; line-height: 24px; color: #99CC5E;">
                                                                We have got your Userinquiry.
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td height="10" valign="top" style="font-size:0; line-height:0;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="body-font" style="font-family: LATO LIGHT, sans-serif;font-size: 16px; line-height: 24px; color: #99CC5E;">
                                                                Our team will go through your details and get in touch with you within next few working days to discuss the next steps.
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td height="10" valign="top" style="font-size:0; line-height:0;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="body-font" style="font-family: LATO LIGHT, sans-serif;font-size: 16px; line-height: 24px; color: #99CC5E;">
                                                                Thank you for showing interest in PLEXPOINDIA 2024.
                                                            </td>
                                                        </tr>

                                                        
                                                        <tr>
                                                            <td height="50" class="mb-lg-height" valign="top" style="font-size:0; line-height:0;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="body-font" style="font-family: LATO LIGHT, sans-serif;font-size: 16px; line-height: 24px; color: #99CC5E;">
                                                                Warm regards,<br/>
                                                                PLEXPOINDIA 2024 Organizing Committee
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td height="50" class="mb-lg-height" valign="top" style="font-size:0; line-height:0;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="body-font" style="font-family: LATO LIGHT, sans-serif;font-size: 16px; line-height: 24px; color: #99CC5E;">
                                                                Note: This is a system-generated email, please do not reply to it.
                                                            </td>
                                                        </tr>
                                                    </tbody>   
                                                </table>
                                            </td>
                                            <td width="30" class="mble-width"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <!-- content section ends -->

                        <tr>
                            <td height="50" class="mb-lg-height" valign="top" style="font-size:0; line-height:0;"></td>
                        </tr>
                        
                        <!-- Footer starts -->
                        <tr>
                            <td>
                                <table cellspacing="0" cellpadding="0" border="0" width="100%" bgcolor="#f2f2f2" style="background-color: #f2f2f2;">
                                    <tr>
                                        <td height="12" valign="top" style="font-size:0; line-height:0;"></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                                <tbody>
                                                    <tr>
                                                        <td width="30" class="mble-width"></td>
                                                        <td>
                                                            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="footer-font" style="font-family: LATO LIGHT, sans-serif;font-size: 14px; line-height: 18px;color: #707070;">Copyright © <?php echo date('Y'); ?> PLEXPOINDIA.</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td height="8" valign="top" style="font-size:0; line-height:0;"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="footer-font" style="font-family: LATO LIGHT, sans-serif;font-size: 14px; line-height: 18px;color: #707070;">
                                                                            <a class="footer-font" href="https://plexpoindia.org/fact-sheet-and-conditions-for-participation" style="font-family: LATO LIGHT, sans-serif; font-size: 14px; line-height: 18px; color: #707070;text-decoration: underline;" target="_blank">Participations Terms</a>
                                                                            <!-- &nbsp;&nbsp;&nbsp; -->
                                                                            <!-- <a class="footer-font" href="https://havyajewels.fltstaging.com/terms-and-conditions" style="font-family: LATO LIGHT, sans-serif; font-size: 14px; line-height: 18px; color: #707070;text-decoration: underline;" target="_blank">Terms & Conditions</a> -->
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td>
                                                            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td width="30" class="social-link">
                                                                                            <a href="https://www.facebook.com/people/Plexpoindia/61559291267520/" title="Facebook" style="display:inline-block;" target="_blank">
                                                                                                <img width="30" src="https://exhibitor.plexpoindia.org/images/FB.png" alt="Facebook" />
                                                                                            </a>
                                                                                        </td>
                                                                                        
                                                                                        <td width="12" class="social-space"></td>

                                                                                        <td width="30" class="social-link">
                                                                                            <a href="https://www.instagram.com/plexpo_india/" title="Instagram" style="display:inline-block;" target="_blank">
                                                                                            <img width="30" src="https://exhibitor.plexpoindia.org/images/IG.png" alt="Instagram" />
                                                                                            </a>
                                                                                        </td>

                                                                                        <td width="12" class="social-space"></td>
                                                                                        
                                                                                        <td width="30" class="social-link">
                                                                                            <a href="https://www.youtube.com/@gspma.ahmedabad/videos" title="YouTube" style="display:inline-block;" target="_blank">
                                                                                            <img width="30" src="https://exhibitor.plexpoindia.org/images/YT.png" alt="YouTube" />
                                                                                            </a>
                                                                                        </td>

                                                                                        <td width="12" class="social-space"></td>

                                                                                        <td width="30" class="social-link">
                                                                                            <a href="https://twitter.com/i/flow/login?redirect_after_login=%2FGspmaAhmedabad" title="Twitter" style="display:inline-block;" target="_blank">
                                                                                            <img width="30" src="https://exhibitor.plexpoindia.org/images/X.png" alt="Twitter" />
                                                                                            </a>
                                                                                        </td>

                                                                                        <td width="12" class="social-space"></td>

                                                                                        <td width="30" class="social-link">
                                                                                            <a href="https://www.linkedin.com/company/plexpoindia/" title="LinkedIN" style="display:inline-block;" target="_blank">
                                                                                            <img width="30" src="https://exhibitor.plexpoindia.org/images/IN.png" alt="LinkedIN" />
                                                                                            </a>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td width="30" class="mble-width"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="12" valign="top" style="font-size:0; line-height:0;"></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <!-- Footer ends -->

                        <tr>
                            <td class="mb-top-space" height="25" valign="top" style="font-size:0; line-height:0;background-color: #CCCCCC;" bgcolor="#CCCCCC"></td>
                        </tr>

                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
</body>

</html>