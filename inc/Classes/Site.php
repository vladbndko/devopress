<?php

class Site
{
    public static function option($key): string {
        return esc_html__(carbon_get_theme_option($key));
    }
    public static function meta($id, $key): string {
        return esc_html__(carbon_get_post_meta($id, $key));
    }
}
