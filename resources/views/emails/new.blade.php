<!DOCTYPE html>
<html>

<head>
    <title>Nueva noticia publicada</title>
</head>

<body style="font-family: 'Arial', sans-serif; background: linear-gradient(to bottom, #f5f7fa 0%, #e5e9f2 100%); color: #333; margin: 0; padding: 10px 0px;">
    <x-email cabecera="NUEVA NOTICIA PUBLICADA" titulo="{{ $content->titulo }}" btnText="Leer noticia completa" ruta="{{ url('/noticias/' . $content->id) }}" unsubscribeUrl="{{ $unsubscribeUrl }}">
        <p style="color: #555; font-size: 15px; line-height: 1.6; margin-bottom: 25px;">{{ $content->resumen }}</p>
    </x-email>
</body>

</html>