<?php
// Template Name: Flexible Field


if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

acf_form_head();

get_header(); ?>

<?php if (astra_page_layout() == 'left-sidebar') : ?>

<?php get_sidebar(); ?>

<?php endif ?>

<?php

// Check value exists.
if (have_rows('content')) :

    // Loop through rows.
    while (have_rows('content')) : the_row();

        // Case: Paragraph layout.
        if (get_row_layout() == 'content') :
            $text = get_sub_field('text');
            echo $text;

        // Case: Download layout.
        elseif (get_row_layout() == 'download') :
            $file = get_sub_field('file');
        // Do something...

        elseif (get_row_layout() == 'gallery') :
            $image = get_sub_field('image');
            echo '<img src="' . $image['url'] . '" />';
        // Do something...

        endif;

    // End loop.
    endwhile;

// No value.
else :
// Do something...
endif;
?>

<?php if (astra_page_layout() == 'right-sidebar') : ?>

<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>