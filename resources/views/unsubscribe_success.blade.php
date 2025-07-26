<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suscripción Cancelada</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
        }

        h1 {
            color: #333;
        }

        p {
            color: #666;
        }

        a {
            color: #007BFF;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <h1>¡Suscripción cancelada!</h1>
    <p>El correo <strong>{{ $email }}</strong> ha sido eliminado de nuestra lista de notificaciones.</p>
    <p>No recibirás más correos electrónicos de nuestra parte.</p>
    <a href="{{ url('/') }}">Volver al inicio</a>
</body>

</html>