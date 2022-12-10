<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make( 'theme_options', __( 'Theme Options', TEXT_DOMAIN ) )
    ->add_tab( __( 'Contacts', TEXT_DOMAIN ), [] )
    ->add_tab( __( 'Forms', TEXT_DOMAIN ), [
        Field::make( 'separator', 'separator_message_form', __( 'Message form', TEXT_DOMAIN ) ),
        Field::make( 'text', 'message_form_recipient', __( 'Email recipient', TEXT_DOMAIN ) )->set_required()->set_width( 50 ),
        Field::make( 'text', 'message_form_subject', __( 'Email subject', TEXT_DOMAIN ) )->set_required()->set_width( 50 ),

        Field::make( 'separator', 'separator_recaptcha', __( 'reCAPTCHA', TEXT_DOMAIN ) ),
        Field::make( 'radio', 'recaptcha_enabled', __( 'Enabled', TEXT_DOMAIN ) )
            ->set_options( [ 1 => 'Yes', 0 => 'No' ] )
            ->set_default_value( 0 ),
        Field::make( 'text', 'recaptcha_site_key', __( 'Site Key', TEXT_DOMAIN ) )
            ->set_conditional_logic( [
                'relation' => 'AND',
                [ 'field' => 'recaptcha_enabled', 'value' => 1, 'compare' => '=' ]
            ] ),
        Field::make( 'text', 'recaptcha_secret_key', __( 'Secret Key', TEXT_DOMAIN ) )
            ->set_conditional_logic( [
                'relation' => 'AND',
                [ 'field' => 'recaptcha_enabled', 'value' => 1, 'compare' => '=' ]
            ] ),
    ] );
