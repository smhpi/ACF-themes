<?php

/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

?>

<?php astra_entry_before(); ?>

<article <?php
			echo astra_attr(
				'article-single',
				array(
					'itemtype'  => 'https://schema.org/CreativeWork',
					'itemscope' => 'itemscope',
					'id'        => 'post-' . get_the_id(),
					'class'     => join(' ', get_post_class()),
				)
			);
			?>>

	<?php astra_entry_top(); ?>

	<?php astra_entry_content_single(); ?>
	<?php
	if (get_field('location')) {
		echo '<p class="location">Location: ' . get_field('location') . '</p>';
	}

	if (get_field('profile_description')) {
		the_field('profile_description');
	}

	if (have_rows('resume')) {
		echo '<div class="resume">';
		$resume_format =
			'<section class="resume-section">
			<h4>
				<span class="date">%1$s</span>
				<span class="title">%2$s</span>
				<div class="simple-description">%3$s</div></h4>
			%4$s
		</section>';
		while (have_rows('resume')) {
			the_row();
			$title = get_sub_field(('title'));
			$simple_description = get_sub_field(('simple_description'));
			$start_date = get_sub_field(('start_date'));
			$end_date = get_sub_field(('end_date'));
			$full_description = get_sub_field(('full_description'));
			$date = ($end_date) ? $start_date . '-' . $end_date : $start_date;

			printf(
				$resume_format,
				$date,
				$title,
				$simple_description,
				$full_description
			);
		}

		echo '</div>';
	}

	$firends = get_field('friends');
	if ($firends) {
		echo '<ul class="prodile-firends">';
		$format = '<li><a href="%1$s" title="%2s"> %3$s</a></li>';
		foreach ($friends  as $post) {
			setup_postdata(($post));
			printf(
				$format,
				get_permalink(),
				get_the_title(),
				get_the_post_thumbnail(get_the_ID(), 'medium')
			);
		}
		wp_reset_postdata();
		echo '</ul>';
	}

	?>
	<?php astra_entry_bottom(); ?>

</article><!-- #post-## -->

<?php astra_entry_after(); ?>