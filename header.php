<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Devopress
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo App::image('favicon/favicon.ico'); ?>">
    <link rel="icon" href="<?php echo App::image('favicon/icon.svg'); ?>" type="image/svg+xml">
    <link rel="apple-touch-icon" href="<?php echo App::image('favicon/apple.png'); ?>">
    <link rel="manifest" href="<?php echo App::file('manifest.webmanifest')?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="page">
  <header id="site-header" class="site-header">
  </header>
  <main id="site-main" class="site-main">
<div class="container">
  <div class="row">
    <div class="col-6">
      <?php
      echo Form::openAjax('send_message', ['id' => 'send-message']);
      echo Form::label('name', 'Name');
      echo Form::text('name');

      echo Form::label('email', 'Email');
      echo Form::email('email');

      echo Form::label('message', 'Message');
      echo Form::textarea('message');
      echo Form::label('accepted', 'Agree');
      echo Form::checkbox('accepted', 'Choose me', 1, 'accepted');

      ?>
      <button type="submit" class="btn btn-primary">SEND</button>
      <?php
      echo Form::close();
      ?>

    </div>
  </div>
</div>
