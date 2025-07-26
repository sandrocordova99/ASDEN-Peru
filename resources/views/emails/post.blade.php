<!DOCTYPE html>
<html>

<head>
    <title>Nuevo blog publicado</title>
</head>

<body style="font-family: 'Arial', sans-serif; background: linear-gradient(to bottom, #f5f7fa 0%, #e5e9f2 100%); color: #333; margin: 0; padding: 10px 0px;">
    <x-email cabecera="NUEVO BLOG PUBLICADO" titulo="{{ $content->title }}" btnText="Leer blog completo" ruta="{{ url('/post/' . $content->id) }}" unsubscribeUrl="{{ $unsubscribeUrl }}">
        <p style="color: #555; font-size: 15px; line-height: 1.6; margin-bottom: 25px;">{{ $content->resumen }}</p>
    </x-email>
</body>

</html>