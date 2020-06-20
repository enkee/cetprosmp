<?php get_header(); ?>

<section id="main">
    <section id="articles_list">
        <article>
            <?php
                if(have_posts()):
                    while(have_posts()) : the_post();
                        the_content();
                    endwhile;
                    
                    echo paginate_links();
                    /*next_posts_link();
                    previous_posts_link();*/

                else:
                    echo '<p>No content found</p>';
                endif;
            ?>
        </article>
    </section>
</section>
<?php get_footer();?>
