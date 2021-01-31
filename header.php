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
    <?php
    $cities = [
      [ 'value' => '', 'text' => 'Choose your city', 'attributes' => ['selected', 'hidden', 'disabled']],
      [ 'value' => 'dnipro', 'text' => 'Dnipro'],
      [ 'value' => 'kiev', 'text' => 'Kiev'],
      [ 'value' => 'lviv', 'text' => 'Lviv'],
    ];

    echo Form::open('action', ['attribute-name' => 'value']);
    echo Form::label('for', 'text', ['attribute-name' => 'value']);
      echo Form::text('name',  ['attribute-name' => 'value', 'disabled' => 'disabled']);
      echo Form::email('email',  ['attribute-name' => 'value']);
      echo Form::number('number', ['attribute-name' => 'value']);
      echo Form::date('date', ['attribute-name' => 'value']);
      echo Form::file('file', ['attribute-name' => 'value']);
      echo Form::color('color', ['attribute-name' => 'value']);
      echo Form::select('city', $cities, ['data-city' => 'my']);
      echo Form::checkbox('checkbox', 'Choose me', 'value', 'check', ['checked' => 'checked'], ['class' => 'mt-4'], ['class' => 'super-label']);
    echo Form::radio('type', 'Type 1', 'type-1', 'radio-1');
    echo Form::radio('type', 'Type 2', 'type-2', 'radio-2');
    echo Form::textarea('textarea', 'Some text', ['rows' => 10]);
      echo Form::close();
    ?>
    <form action="<?php echo admin_url('admin-ajax.php?action=send_message'); ?>" id="send-message">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDisabled">
        <label class="form-check-label" for="flexCheckDisabled">
          Disabled checkbox
        </label>
      </div>
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
