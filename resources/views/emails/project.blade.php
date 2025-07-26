<!DOCTYPE html>
<html>

<head>
    <title>Nuevo proyecto publicado</title>
</head>

<body style="font-family: 'Arial', sans-serif; background: linear-gradient(to bottom, #f5f7fa 0%, #e5e9f2 100%); color: #333; margin: 0; padding: 10px 0px;">
    <x-email cabecera="NUEVO PROYECTO PUBLICADO" titulo="{{ $content->titulo }}" btnText="Ver proyectos" ruta="{{ url('/projects/') }}" unsubscribeUrl="{{ $unsubscribeUrl }}">
        <p style="color: #555; font-size: 15px; line-height: 1.6; margin-bottom: 25px;">{{ $content->resumen }}</p>
        <a href="{{ url('/collaborate') }}"
            style="display: inline-block; 
          background: white; 
          color: #0e354f; 
          padding:10px 30px;
          text-decoration:none;
          font-weight:600;
          font-size:16px;
          border-radius: 10px; 
          margin: 10px 0; 
          margin-right: 5px;
          transition: all 0.3s; 
          border: 2px solid #0e354f;
          box-shadow: 0 3px 10px rgba(42, 117, 181, 0.2);">
            Colabora aquí
        </a>
    </x-email>
</body>

</html>