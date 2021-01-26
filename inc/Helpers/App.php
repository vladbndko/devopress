<?php

class App {
  public static function option( $name ) {
    if ( ! function_exists( 'carbon_get_theme_option' ) ) {
      return esc_html__( carbon_get_theme_option( $name ) );
    }
  }

  public static function meta( $id, $name ) {
    if ( ! function_exists( 'carbon_get_post_meta' ) ) {
      return esc_html__( carbon_get_post_meta( $id, $name ) );
    }
  }
}
