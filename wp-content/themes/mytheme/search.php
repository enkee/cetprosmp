<?php get_header(); ?>

<section id="main">
    <section id="articles_list">
        <h2>Resultados</h2>
        <?php
            if(have_posts()):
                while(have_posts()) : the_post();
        ?>

        <?php
            get_template_part('content', 'search');
        ?>

        <?php
        
            endwhile;
        
            echo paginate_links(array(
                //'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	            //'format' => '?paged=%#%',
                'current' => max(1, $paged),
                'total' => $arr_posts->max_num_pages,
                
                ));
                    /*previous_posts_link();
                    next_posts_link('Next page', $arr_posts->max_num_pages);*/
        
        else:
                    echo '<p>No content found</p>';
        endif; 
        ?>
    </section>
</section>
<?php get_footer();?>
