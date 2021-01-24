<?php

class Assets
{
  public static function get($path): string
  {
    return get_template_directory_uri() . "/$path";
  }

  public static function image($path): string
  {
    return get_template_directory_uri() . "/assets/img/$path";
  }
}
