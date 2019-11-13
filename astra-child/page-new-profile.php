<?php
// Template Name: User Profile

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

acf_form_head();

get_header(); ?>

<?php if (astra_page_layout() == 'left-sidebar') : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<div id="primary" <?php astra_primary_class(); ?>>

	<article <?php
				echo astra_attr(
					'article-page',
					array(
						'itemtype'  => 'https://schema.org/CreativeWork',
						'itemscope' => 'itemscope',
						'id'        => 'post-' . get_the_id(),
						'class'     => join(' ', get_post_class()),

					)
				);
				?>>

		<?php astra_entry_top(); ?>

		<header class="entry-header <?php astra_entry_header_class(); ?>">

			<?php astra_get_post_thumbnail(); ?>

			<?php astra_the_title('<h1 class="entry-title" itemprop="headline">', '</h1>'); ?>
		</header><!-- .entry-header -->

		<div class="entry-content clear" itemprop="text">
			<?php
			acf_form(array(
				'post_id' => 'new_post',
				'post_title' => true,
				'post_content' => true,
				'new_post' => array(
					'post_type' => 'post',
					'post_status' => 'draft',
					'post_category' => array(1),
				),
			));
			?>
		</div>

</div><!-- #primary -->

<?php if (astra_page_layout() == 'right-sidebar') : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>