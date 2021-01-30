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
    <form action="<?php echo admin_url('admin-ajax.php?action=send_message');?>" id="send-message">
      <div class="form-group">
        <label for="name">Name</label>
        <input class="form-control" id="name" name="name">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email">
      </div>
      <div class="form-group">
        <label for="message">Message</label>
        <input class="form-control" id="message" name="message">
      </div>
      <button type="submit" class="btn btn-primary">SEND</button>
    </form>
