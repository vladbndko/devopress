<?php


function asset( string $path ): ?string {
    return get_template_directory_uri() . "/assets/$path";
}

function image( string $path ): ?string {
    return get_template_directory_uri() . "/assets/images/$path";
}

function sprite( string $icon_name ): ?string {
    return get_template_directory_uri() . "/assets/sprite.svg#$icon_name";
}


function get_theme_option( string $name ) {
    return carbon_get_theme_option( $name );
}

function validate_token( string $token ) {
    $secret = get_theme_option( 'recaptcha_secret_key' );
    $url    = "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$token&remoteip={$_SERVER['REMOTE_ADDR']}";

    return json_decode( file_get_contents( $url ) );
}

