<!doctype html>
<html lang="en-US">
<head>
  <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>New Account Setup | Careerly BD</title>
  <style type="text/css">
    /* Base & reset */
    body, table, td, p, a { margin:0; padding:0; border:0; font-family: 'Open Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif; }
    body { background-color: #f2f3f8; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; }
    a { text-decoration: none; color: #1e1e2d; }
    a:hover { text-decoration: underline !important; }

    /* Responsive container */
    @media only screen and (max-width: 600px) {
      .wrapper { width:100% !important; }
      .inner-table { width:100% !important; }
      .btn { display:block !important; width:100% !important; box-sizing:border-box; text-align:center; }
      .credentials-box { padding:0 15px !important; }
    }
  </style>
</head>
<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" style="margin:0; background-color:#f2f3f8;">

  <!-- MAIN TABLE -->
  <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8"
         style="font-family:'Open Sans', 'Helvetica Neue', Arial, sans-serif; background:#f2f3f8;">
    <tr>
      <td align="center">
        <!-- WRAPPER (max-width 670px) -->
        <table class="wrapper" style="max-width:670px; width:100%; margin:0 auto; background:#f2f3f8;" border="0" cellpadding="0" cellspacing="0">
          <tr><td style="height:40px;">&nbsp;</td></tr>

          <!-- LOGO -->
          <tr>
            <td align="center" style="padding:0 20px;">
              <a href="https://careerlybd.org/" title="careerly BD" target="_blank" style="display:inline-block;">
                <img width="60" src="{{ asset(getSetting('app_logo'))  }}" alt="careerly BD" style="display:block; border:0;">
              </a>
            </td>
          </tr>
          <tr><td style="height:16px;">&nbsp;</td></tr>

          <!-- MAIN CARD -->
          <tr>
            <td align="center" style="padding:0 15px;">
              <table class="inner-table" width="100%" border="0" cellpadding="0" cellspacing="0"
                     style="background:#ffffff; border-radius:8px; box-shadow:0 8px 24px rgba(0,0,0,0.05); max-width:640px; margin:0 auto;">
                <tr><td style="height:36px;">&nbsp;</td></tr>

                <!-- HEADER -->
                <tr>
                  <td style="padding:0 30px; text-align:center;">
                    <h1 style="color:#1e1e2d; font-weight:600; font-size:28px; font-family:'Rubik','Open Sans',sans-serif; margin:0 0 6px; letter-spacing:-0.3px;">
                      Welcome to Carrerly BD
                    </h1>
                    <p style="font-size:15px; color:#455056; margin:8px 0 0; line-height:24px; max-width:480px; display:inline-block;">
                      Your account has been successfully created. Below are your system‑generated credentials.
                    </p>
                    <div style="margin:18px 0 6px; border-bottom:1px solid #eaeef2; width:80px; display:inline-block;"></div>
                  </td>
                </tr>

                <!-- OTP / KEY -->
                <tr>
                  <td style="padding:14px 30px 6px; text-align:center;">
                    <span style="display:inline-block; background:#f6f9fc; padding:8px 32px; border-radius:40px; font-weight:600; font-size:22px; letter-spacing:2px; color:#1e1e2d; font-family:'Rubik',sans-serif; border:1px solid #e2e8f0;">
                      {{ $otp }}
                    </span>
                    <p style="font-size:13px; color:#7a8792; margin:8px 0 0; letter-spacing:0.3px;">One‑time verification code</p>
                  </td>
                </tr>
                <tr><td style="height:20px;">&nbsp;</td></tr>
              </table>
            </td>
          </tr>

          <!-- FOOTER -->
          <tr><td style="height:16px;">&nbsp;</td></tr>
          <tr>
            <td align="center" style="padding:0 20px 8px;">
              <p style="font-size:14px; color:#8e9aa5; line-height:22px; margin:0;">
                &copy; 2026 <strong style="color:#455056; font-weight:500;">https://careerlybd.org/</strong> &nbsp;·&nbsp; careerly BD Admin
              </p>
              <p style="font-size:12px; color:#9aa6b0; margin:6px 0 0;">
                This is a system‑generated message. Please keep your credentials secure.
              </p>
            </td>
          </tr>
          <tr><td style="height:32px;">&nbsp;</td></tr>
        </table>
        <!-- END WRAPPER -->
      </td>
    </tr>
  </table>
  <!-- END MAIN TABLE -->

</body>
</html>