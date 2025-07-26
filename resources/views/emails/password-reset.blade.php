<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer contraseña</title>
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap');
    </style>
</head>

<body style="margin: 0; padding: 0; font-family: 'Open Sans', Arial, sans-serif; background-color: #f7fafc;">
    <!-- Contenedor principal -->
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="max-width: 600px; margin: 0 auto;">
        <!-- Header -->
        <tr>
            <td style="padding: 30px 20px; text-align: center; background-color: #0E354F;">
                <h1 style="color: #ffffff; margin: 0; font-size: 24px; font-weight: 600;">Restablece tu contraseña</h1>
            </td>
        </tr>

        <!-- Cuerpo del mensaje -->
        <tr>
            <td style="padding: 30px 20px; background-color: #ffffff;">
                <p style="color: #4a5568; font-size: 16px; line-height: 1.6; margin-bottom: 25px;">
                    Hemos recibido una solicitud para restablecer la contraseña de tu cuenta. Haz clic en el botón para continuar:
                </p>

                <!-- Botón CTA -->
                <table align="center" border="0" cellspacing="0" cellpadding="0" style="margin: 25px auto;">
                    <tr>
                        <td align="center" style="border-radius: 4px; background-color: #0E354F;">
                            <a href="{{ $url }}" style="display: inline-block; padding: 12px 30px; color: #ffffff; text-decoration: none; font-weight: 600; font-size: 16px;">
                                Restablecer contraseña
                            </a>
                        </td>
                    </tr>
                </table>

                <!-- Texto importante -->
                <p style="color: #718096; font-size: 14px; line-height: 1.5; margin-top: 30px; padding: 15px; background-color: #f8f9fa; border-left: 4px solid #e2e8f0;">
                    <strong style="color: #0E354F;">Importante:</strong>
                    Este enlace es válido por <strong>24 horas</strong>. Si no solicitaste este cambio, ignora este correo o contacta a soporte.
                </p>

                <p style="color: #718096; font-size: 14px; margin-top: 20px;">
                    ¿No hiciste esta solicitud? <a href="mailto:asdenorg.peru@gmail.com" style="color: #0E354F; text-decoration: none;">Notifícanos</a>.
                </p>
            </td>
        </tr>

        <!-- Footer -->
        <tr>
            <td style="padding: 20px; text-align: center; background-color: #f7fafc; font-size: 12px; color: #718096; border-top: 1px solid #e2e8f0;">
                <p style="margin: 0;">
                    © {{ date('Y') }} Asden Perú. Todos los derechos reservados.<br>
                    <a href="{{ config('app.url') }}" style="color: #0E354F; text-decoration: none;">Visita nuestro sitio</a>
                </p>
            </td>
        </tr>
    </table>
</body>

</html>