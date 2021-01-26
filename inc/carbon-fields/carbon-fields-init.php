<?php


add_action('carbon_fields_register_fields', 'devopress_theme_options');
function devopress_theme_options()
{
    require get_template_directory() . '/inc/carbon-fields/meta-fields.php';
    require get_template_directory() . '/inc/carbon-fields/theme-options.php';
}
