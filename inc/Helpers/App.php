<?php

class App
{
  public static function option($name)
  {
    return esc_html__(carbon_get_theme_option($name));
  }

  public static function meta($id, $name)
  {
    return esc_html__(carbon_get_post_meta($id, $name));
  }
}
