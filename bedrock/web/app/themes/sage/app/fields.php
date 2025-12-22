<?php

/**
 * Register ACF field groups for the Neighborly homepage.
 */

namespace App;

use function acf_add_local_field_group;

/**
 * Register Homepage Hero field group.
 *
 * @return void
 */
add_action('acf/init', function () {
    if (! function_exists('acf_add_local_field_group')) {
        return;
    }

    acf_add_local_field_group([
        'key' => 'group_homepage_hero',
        'title' => 'Homepage Hero Section',
        'fields' => [
            [
                'key' => 'field_hero_subheading',
                'label' => 'Hero Badge Text',
                'name' => 'hero_subheading',
                'type' => 'text',
                'instructions' => 'Badge text above the main heading (e.g., "Home Services Made Simple")',
                'required' => 0,
                'default_value' => 'Home Services Made Simple',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ],
            [
                'key' => 'field_hero_heading',
                'label' => 'Hero Heading (Line 1)',
                'name' => 'hero_heading',
                'type' => 'text',
                'instructions' => 'First line of the hero heading (e.g., "Hi, Neighbor!")',
                'required' => 0,
                'default_value' => 'Hi, Neighbor!',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ],
            [
                'key' => 'field_hero_heading_line2',
                'label' => 'Hero Heading (Line 2)',
                'name' => 'hero_heading_line2',
                'type' => 'text',
                'instructions' => 'Second line of the hero heading (e.g., "Need a hand around the house?")',
                'required' => 0,
                'default_value' => 'Need a hand around the house?',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'front-page.blade.php',
                ],
            ],
            [
                [
                    'param' => 'page_type',
                    'operator' => '==',
                    'value' => 'front_page',
                ],
            ],
        ],
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => 'Customize the hero section content for the homepage',
    ]);
});
