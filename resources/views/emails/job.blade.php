<!DOCTYPE html>
<html>

<head>
    <title>Nueva oferta laboral</title>
</head>

<body style="font-family: 'Arial', sans-serif; background: linear-gradient(to bottom, #f5f7fa 0%, #e5e9f2 100%); color: #333; margin: 0; padding: 10px 0px;">
    <x-email cabecera="NUEVA OFERTA LABORAL" titulo="{{ $content->titulo }}" btnText="Ver empleos" ruta="{{ url('/jobBoard') }}" unsubscribeUrl="{{ $unsubscribeUrl }}">
        <div style="text-align: center; margin-bottom: 15px;">
            <span style="color: #555; font-size: 15px; margin-right: 10px;"><strong>Modalidad: </strong>{{ $content->modalidad }}</span>
            <span style="color: #555; font-size: 15px; margin-right: 10px;"><strong>Tipo: </strong>{{ $content->tipo_trabajo }}</span>
            <span style="color: #555; font-size: 15px;"><strong>Vacantes: </strong>{{ $content->cantidad_puestos}}</span>
        </div>
        <p style="color: #555; font-size: 15px; line-height: 1.6; margin-bottom: 25px;">{{ $content->resumen }}</p>
    </x-email>
</body>

</html>