<?php

/* @var array $data */

$title = 'New message';

get_template_part( 'template-parts/mails/header', null, [ 'title' => $title ] );

$rows = [
    'name'    => 'Name',
    'email'   => 'Email',
    'message' => 'Message',
];

?>

    <h1><?php echo $title; ?></h1>
    <?php foreach ( $rows as $key => $title ) : ?>
        <p><strong><?php echo $title; ?>: </strong><?php echo $data[ $key ]; ?></p>
    <?php endforeach; ?>
    <br>
    <p>Was sent from the page: <a href="<?php echo $data['source']; ?>"><?php echo $data['source']; ?></a></p>

<?php get_template_part( 'template-parts/mails/footer' );

