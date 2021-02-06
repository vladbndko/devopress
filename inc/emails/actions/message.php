<?php

add_action( 'wp_ajax_send_message', 'send_message' );
add_action( 'wp_ajax_nopriv_send_message', 'send_message' );

function send_message() {
  header( 'Content-Type: application/json; charset=UTF-8' );
  $data = [];
  $recaptcha = $_POST['token'];
  $secret_key = App::config( 'recaptcha.secret_key' );
  $response = file_get_contents(
    "https://www.google.com/recaptcha/api/siteverify?secret={$secret_key}&response={$recaptcha}&remoteip={$_SERVER['REMOTE_ADDR']}"
  );
  $response = json_decode( $response );
  if ( $response->success === false ) {
    $data['errors']['recaptcha'] = [__('Recaptcha error occurred', DOMAIN)];
    $data['sendStatus']['type'] = 'error';
    $data['sendStatus']['text'] = __('Some errors occurred', DOMAIN);
    echo json_encode( $data );
    wp_die();
  }

  $vars = [
    'name' => isset( $_POST['name'] ) ? trim( $_POST['name'] ) : '',
    'email' => isset( $_POST['email'] ) ? trim( $_POST['email'] ) : '',
    'message' => isset( $_POST['message'] ) ? trim( $_POST['message'] ) : '',
    'accepted' => isset( $_POST['accepted'] ) ? trim( $_POST['accepted'] ) : '',
  ];

  $v = new Valitron\Validator( [
    'name' => $vars['name'],
    'email' => $vars['email'],
    'message' => $vars['message'],
    'accepted' => $vars['accepted'],
  ] );

  $v->rules([
    'required' => [ 'name', 'email' ],
    'email' => ['email'],
    'accepted' => ['accepted'],
  ]);

  if ( ! $v->validate() ) {
    $data['errors'] = $v->errors();
    $data['sendStatus']['type'] = 'error';
    $data['sendStatus']['text'] = __('Some errors occurred', DOMAIN);
    echo json_encode( $data );
    wp_die();
  }

  $site_name = get_bloginfo( 'name' );
  $admin_email = get_option( 'admin_email' );
  $from = "{$site_name} <{$admin_email}>";

  $email = WP_Mail::init()
                  ->from( $from )
                  ->to( $admin_email )
                  ->subject( __( 'Email subject', DOMAIN ) )
                  ->template( get_template_directory() . '/inc/emails/templates/message.php', $vars )
                  ->send();
  if ( $email ) {
    $data['sendStatus']['type'] = 'success';
    $data['sendStatus']['text'] = __('Message was successfully sent', DOMAIN);
  }
  echo json_encode($data);
  wp_die();
}
