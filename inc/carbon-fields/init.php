<?php

add_action('carbon_fields_register_fields', function () {
    require_once get_template_directory() . '/inc/carbon-fields/theme-options.php';
});
