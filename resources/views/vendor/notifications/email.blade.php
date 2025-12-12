<x-mail::message>

{{-- Encabezado --}}
# Solicitud de cambio de contraseña

{{-- Introducción personalizada --}}
<p style="font-size: 15px; line-height: 1.5;">
Recibimos una solicitud para restablecer la contraseña de tu cuenta.  
Si fuiste tú quien inició este proceso, confirma la acción presionando el siguiente botón.
</p>

{{-- Botón de acción --}}
<x-mail::button :url="$actionUrl" color="primary">
Cambiar contraseña
</x-mail::button>

{{-- Mensaje final --}}
<p style="font-size: 14px; margin-top: 20px;">
Si no realizaste esta solicitud, puedes ignorar este mensaje.  
Tu cuenta seguirá siendo segura.
</p>

{{-- Despedida --}}
Saludos cordiales,<br>
{{ config('app.name') }}

{{-- Subcopy (texto alternativo por si el botón no funciona) --}}
<x-slot:subcopy>
Si el botón no funciona, copia y pega el siguiente enlace en tu navegador:

<span class="break-all" style="display: block; margin-top: 10px;">
    {{ $actionUrl }}
</span>
</x-slot:subcopy>

</x-mail::message>
