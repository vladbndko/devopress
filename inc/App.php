<?php

use \Dflydev\DotAccessData\Data;

class App {

  /**
   * Get config value
   *
   * @param string $path config path
   *
   * @return string|null config value
   * @since 1.0.0
   *
   */
  public static function config( string $path ): ?string {
    $json = file_get_contents(self::file('devopress.config.json'));
    $config = new Data(json_decode($json, true));

    return $config->has($path) ? $config->get($path) : null;
  }

  /**
   * Get escaped option value
   *
   * @param string $name option name
   *
   * @return string|null escaped option value
   * @since 1.0.0
   *
   */
  public static function option( string $name ): ?string {
    if ( ! function_exists( 'carbon_get_theme_option' ) ) {
      return esc_html__( carbon_get_theme_option( $name ) );
    }

    return null;
  }

  /**
   * Get raw option value
   *
   * @param string $name option name
   *
   * @return string|null escaped option value
   * @since 1.0.0
   *
   */
  public static function optionRaw( string $name ): ?string {
    if ( ! function_exists( 'carbon_get_theme_option' ) ) {
      return carbon_get_theme_option( $name );
    }

    return null;
  }

  /**
   * Get escaped meta value
   *
   * @param integer $id post id
   * @param string $name option name
   *
   * @return string|null escaped option value
   * @since 1.0.0
   *
   */
  public static function meta( int $id, string $name ): ?string {
    if ( ! function_exists( 'carbon_get_post_meta' ) ) {
      return esc_html__( carbon_get_post_meta( $id, $name ) );
    }

    return null;
  }

  /**
   * Get raw meta value
   *
   * @param integer $id post id
   * @param string $name option name
   *
   * @return string|array|null raw option value
   * @since 1.0.0
   *
   */
  public static function metaRaw( int $id, string $name ) {
    if ( ! function_exists( 'carbon_get_post_meta' ) ) {
      return carbon_get_post_meta( $id, $name );
    }

    return null;
  }

  /**
   * Get full path to the file
   *
   * @param string $path path to the file from root theme directory
   *
   * @return string full path to the file
   * @since 1.0.0
   *
   */
  public static function file( string $path ): string {
    return get_template_directory_uri() . "/$path";
  }

  /**
   * Get full path to the image
   *
   * @param string $path path to the image from assets/images/folder
   *
   * @return string full path to the image
   * @since 1.0.0
   *
   */
  public static function image( string $path ): string {
    return get_template_directory_uri() . "/assets/images/$path";
  }
}
