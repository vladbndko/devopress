<?php /** @var array $args */ ?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="icon" href="<?php echo asset( 'favicon/favicon.ico' ); ?>">
    <link rel="icon" href="<?php echo asset( 'favicon/icon.svg' ); ?>" type="image/svg+xml">
    <link rel="apple-touch-icon" href="<?php echo asset( 'favicon/apple-touch-icon.png' ); ?>">
    <link rel="manifest" href="<?php echo get_template_directory_uri() . '/site.webmanifest'; ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <?php wp_head(); ?>
</head>

<body <?php body_class( 'page' ); ?>>
<?php wp_body_open(); ?>

<main class="main">

    <header class="header">HEADER

    </header>
