<div style="max-width: 600px; margin: 20px auto; padding: 0 10px;">
    <!-- Tarjeta con sombra y gradiente sutil -->
    <div style="background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);">
        <!-- ENCABEZADO: Gradiente azul vertical -->
        <div style="background-color:#0e354f; padding: 25px 20px; text-align: center;">
            <h1 style="color: white; font-size: 22px; font-weight: bold; margin: 0; text-shadow: 0 1px 2px rgba(0,0,0,0.2);">{{ $cabecera }}</h1>
        </div>

        <!-- Cuerpo del mensaje -->
        <div style="padding: 30px 25px; text-align: center;">
            <!-- Título con gradiente horizontal (solo texto) -->
            <h2 style="color: #0E354F; font-size: 20px; font-weight: 600; margin-bottom: 20px; display: inline-block;">
                {{ $titulo }}
            </h2>

            {{ $slot }}

            <!-- BOTÓN: Gradiente azul + hover -->
            <a href="{{ $ruta }}"
                style="display:inline-block;padding:12px 30px;color:#ffffff;text-decoration:none;font-weight:600;font-size:16px;background-color:#0e354f; border-radius:10px;">
                {{ $btnText }}
            </a>
        </div>

        <!-- Footer -->
        <div style="border-top: 1px solid #e5e7eb; padding: 18px 20px; text-align: center; background: linear-gradient(to bottom, #f9fafb 0%, #f0f2f5 100%);">
            <p style="color: #777; font-size: 12px; margin: 0;">
                ¿No quieres recibir más notificaciones?
                <a href="{{ $unsubscribeUrl }}" style="color: #175075; text-decoration: underline; font-weight: 500;">Cancelar suscripción</a>
            </p>
        </div>
    </div>

</div>