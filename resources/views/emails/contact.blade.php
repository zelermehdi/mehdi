<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Contact — {{ $label }}</title>
</head>
<body style="margin:0; padding:0; background-color:#0B0B0F; font-family:Arial, Helvetica, sans-serif; color:#ffffff;">

  <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#0B0B0F; padding:24px;">
    <tr>
      <td align="center">

        <!-- Container -->
        <table width="100%" cellpadding="0" cellspacing="0" style="max-width:600px; background-color:#12121A; border-radius:16px; overflow:hidden;">
          
          <!-- Header -->
          <tr>
            <td style="padding:24px; background-color:#15151F;">
              <h1 style="margin:0; font-size:22px; font-weight:600;">
                Verre Gule
              </h1>
              <p style="margin:6px 0 0; font-size:13px; color:#b5b5b5;">
                Nouveau message — {{ $label }}
              </p>
            </td>
          </tr>

          <!-- Content -->
          <tr>
            <td style="padding:24px;">
              
              <p style="margin:0 0 16px; font-size:14px; color:#dddddd;">
                Un nouveau message a été envoyé depuis le formulaire de contact.
              </p>

              <!-- Info block -->
              <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#0B0B0F; border-radius:12px; margin-bottom:20px;">
                <tr>
                  <td style="padding:16px; font-size:14px;">
                    <p style="margin:0 0 8px;">
                      <strong>Nom :</strong> {{ $d['name'] }}
                    </p>
                    <p style="margin:0 0 8px;">
                      <strong>Email :</strong>
                      <a href="mailto:{{ $d['email'] }}" style="color:#F53003; text-decoration:none;">
                        {{ $d['email'] }}
                      </a>
                    </p>
                    <p style="margin:0;">
                      <strong>Téléphone :</strong> {{ $d['phone'] ?? '—' }}
                    </p>
                  </td>
                </tr>
              </table>

              <!-- Message -->
              <p style="margin:0 0 8px; font-size:13px; color:#b5b5b5;">
                Message
              </p>

              <div style="background-color:#0B0B0F; border-radius:12px; padding:16px; font-size:14px; line-height:1.6; color:#ffffff; white-space:pre-wrap;">
                {{ $d['message'] }}
              </div>

            </td>
          </tr>

          <!-- Footer -->
          <tr>
            <td style="padding:16px 24px; background-color:#15151F; font-size:11px; color:#9a9a9a; text-align:center;">
              © {{ date('Y') }} Verre Gule — Message automatique
            </td>
          </tr>

        </table>

      </td>
    </tr>
  </table>

</body>
</html>
