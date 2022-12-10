<?php


function message_send( WP_REST_Request $request ) {
    $body = $request->get_body_params();
    $validator = new Validator( $body );
    $validator->rule( 'required', [ 'name', 'email', 'message' ] );
    $validator->rule( 'email', [ 'email' ] );
    if ( ! $validator->validate() ) {
        return new WP_REST_Response( [ 'message' => 'Validation failed', 'errors' => $validator->errors() ], 422 );
    }
    if ( get_theme_option( 'recaptcha_enabled' ) ) {
        $recaptcha_response = validate_token( $body['token'] );
        if ( $recaptcha_response->success === false ) {
            return new WP_REST_Response( [ 'message' => 'reCAPTCHA failed', 'error' => $recaptcha_response ], 401 );
        }
    }
    try {
        WP_Mail::init()
            ->headers( [
                "Reply-To: {$body['name']}<{$body['email']}>",
            ] )
            ->from( get_option( 'admin_email' ) )
            ->to( get_theme_option( 'message_form_recipient' ) )
            ->subject( get_theme_option( 'message_form_subject' ) )
            ->template( get_template_directory() . '/mails/message.php', [ 'data' => $body ] )
            ->send();
    } catch ( Exception $ex ) {
        return new WP_REST_Response( [ 'message' => 'Sending failed', 'error' => $ex->getMessage() ], 500 );
    }

    return new WP_REST_Response( [ 'message' => 'Thank you for your submission.' ], 200 );
}

add_action( 'rest_api_init', function () {
    register_rest_route( 'wp/v2', '/message/send', [
        'methods'             => 'POST',
        'callback'            => 'message_send',
        'permission_callback' => '__return_true'
    ] );
} );
