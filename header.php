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
    <link rel="icon" href="<?php echo Asset::image('favicon/favicon.ico'); ?>">
    <link rel="icon" href="<?php echo Asset::image('favicon/icon.svg'); ?>" type="image/svg+xml">
    <link rel="apple-touch-icon" href="<?php echo Asset::image('favicon/apple.png'); ?>">
    <link rel="manifest" href="<?php echo Asset::get('manifest.webmanifest')?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="page">
  <header id="site-header" class="site-header">

  </header>
  <main id="site-main" class="site-main">
