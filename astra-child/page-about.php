<main class="main" role="main">
    <?php // open the WordPress loop
    if (have_posts()) : while (have_posts()) : the_post();

            // are there any rows within within our flexible content?
            if (have_rows('home_page_content')) :

                // loop through all the rows of flexible content
                while (have_rows('home_page_content')) : the_row();

                    // EMAIL UPDATES
                    if (get_row_layout() == 'receive_email_updates')
                        get_template_part('partials/stripe', 'email');

                    // NEW PODCAST
                    if (get_row_layout() == 'new_podcast')
                        get_template_part('partials/stripe', 'podcast');

                    // SERVICES STRIPE
                    if (get_row_layout() == 'services')
                        get_template_part('partials/stripe', 'services');

                    // TESTIMONIAL
                    if (get_row_layout() == 'testimonials')
                        get_template_part('partials/stripe', 'testimonial');

                    // FROM THE BLOG
                    if (get_row_layout() == 'from_the_blog')
                        get_template_part('partials/blog', 'excerpt');

                endwhile; // close the loop of flexible content
            endif; // close flexible content conditional

        endwhile;
    endif; // close the WordPress loop 
    ?>
</main>