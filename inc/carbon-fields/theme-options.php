<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make('theme_options', __('Site Options', 'devocraft'))
  ->add_tab(__('Design', 'devocraft'), [
    Field::make('image', 'logo', __('Logo', 'devocraft')),
  ])
  ->add_tab(__('Contacts', 'devocraft'), [
    Field::make('text', 'contacts_phone', __('Phone number', 'devocraft')),
    Field::make('text', 'contacts_email', __('E-mail', 'devocraft'))
      ->set_attribute('type', 'email'),
    Field::make('text', 'contacts_address', __('Address', 'devocraft')),
  ])
  ->add_tab(__('Social', 'devocraft'), [
    Field::make('complex', 'social_links', __('Social links', 'devocraft'))
      ->setup_labels([
        'plural_name' => __('Links', 'devocraft'),
        'singular_name' => __('Link', 'devocraft'),
      ])
      ->add_fields([
        Field::make('text', 'name', __('Name', 'devocraft'))
          ->set_width(33),
        Field::make('text', 'url', __('URL address', 'devocraft'))
          ->set_width(33),
        Field::make('text', 'icon', __('Icon', 'devocraft'))
          ->set_help_text('Choose one from <a href="https://fontawesome.com/icons?d=gallery&s=brands" target="_blank" rel="nofollow">FontAwesome Brands</a>')
          ->set_width(33),
      ])
      ->set_collapsed(true)
      ->set_header_template('<%- name %>')
  ])
  ->add_tab(__('Footer', 'devocraft'), [
    Field::make('textarea', 'footer_text', __('Footer text', 'devocraft')),
  ])
  ->add_tab(__('Cookie', 'devocraft'), [
    Field::make('textarea', 'cookie_text', __('Cookie text', 'devocraft')),
  ]);

