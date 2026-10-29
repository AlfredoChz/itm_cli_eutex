<?php

use App\Models\SiteSetting;

if (!function_exists('setting')) {
    /**
     * Obtener el valor de una configuración del sitio o su valor predeterminado.
     */
    function setting(string $key, mixed $default = null): mixed
    {
        try {
            return SiteSetting::get($key, $default);
        } catch (\Throwable $e) {
            return $default;
        }
    }
}
