<?php

if (! function_exists('get_request_ip')) {
    /**
     * Get the ip from the current request
     */
    function get_request_ip(): ?string
    {
        if (config('app.cloudflare_enabled') && isset($_SERVER['HTTP_CF_CONNECTING_IP'])) {
            return $_SERVER['HTTP_CF_CONNECTING_IP'];
        } else {
            return request()->ip();
        }
    }
}

if (! function_exists('get_setting')) {

    function get_setting(string $key, $default = null)
    {
        return app(\App\Support\Settings\SiteSettings::class)->{$key} ?: $default;
    }
}
