<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make('theme_options', __('Site Options', 'devopress'))
  ->add_tab(__('Design', 'devopress'), [
    Field::make('image', 'logo', __('Logo', 'devopress')),
  ])
  ->add_tab(__('Contacts', 'devopress'), [
    Field::make('text', 'contacts_phone', __('Phone number', 'devopress')),
    Field::make('text', 'contacts_email', __('E-mail', 'devopress'))
      ->set_attribute('type', 'email'),
    Field::make('text', 'contacts_address', __('Address', 'devopress')),
  ])
  ->add_tab(__('Social', 'devopress'), [
    Field::make('complex', 'social_links', __('Social links', 'devopress'))
      ->setup_labels([
        'plural_name' => __('Links', 'devopress'),
        'singular_name' => __('Link', 'devopress'),
      ])
      ->add_fields([
        Field::make('text', 'name', __('Name', 'devopress'))
          ->set_width(33),
        Field::make('text', 'url', __('URL address', 'devopress'))
          ->set_width(33),
        Field::make('text', 'icon', __('Icon', 'devopress'))
          ->set_help_text('Choose one from <a href="https://fontawesome.com/icons?d=gallery&s=brands" target="_blank" rel="nofollow">FontAwesome Brands</a>')
          ->set_width(33),
      ])
      ->set_collapsed(true)
      ->set_header_template('<%- name %>')
  ])
  ->add_tab(__('Footer', 'devopress'), [
    Field::make('textarea', 'footer_text', __('Footer text', 'devopress')),
  ])
  ->add_tab(__('Cookie', 'devopress'), [
    Field::make('textarea', 'cookie_text', __('Cookie text', 'devopress')),
  ]);

