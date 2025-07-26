<?php

return [

    'paths' => ['api/', 'sanctum/csrf-cookie',''],

    'allowed_methods' => [''],

    'allowed_origins' => ['http://localhost:3000/'], // Si usas otro puerto se cambia.

    'allowed_origins_patterns' => [],

    'allowed_headers' => [''],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,

];