<?php get_header(); ?>

<div id="no-slide">
        <?php include(TEMPLATEPATH. '/slideshow.php'); ?>
</div>

<section id="main">
    <div class="bajar text-center">
        <i class="fas fa-angle-down" aria-hidden="true"></i>
    </div>
    <section class="articles_list" id="articulos">
        <?php
        //Titulo de Matricula
            $args = array(
                    'title'       => 'cetpro_lbl_matricula',
                    'post_type'   => 'wp_block',
                    'numberposts' => 1
            );

            $my_posts = new WP_Query($args);

            if( $my_posts ) :
                $my_posts->the_post();
                the_content();
            endif;
        ?>

        <?php
        // Articulos
        $paged = get_query_var( 'page' );
            
        $arr_posts = new WP_Query(
                array(
                    //'post_type' => 'post',
                    //'post_status' => 'publish',
                    'category_name' => 'slider',
                    'posts_per_page' => 10, 
                    'paged' => $paged,
                ));
        
        if($arr_posts->have_posts()):
        
            while($arr_posts->have_posts()):$arr_posts->the_post();
            
        ?>

        <article class="row">
            <div class="col-sm-5 thumb">
                <a href="<?php the_permalink(); ?>">
                    <div class="contenedor">
                        <?php if(has_post_thumbnail()){the_post_thumbnail('list_articles_thumbs');}?>
                    </div>
                </a>
            </div>

            <div class="col-sm-7 contenido">
                <h2>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h2>
                <?php
                    echo first_table();
                ?>
            </div>
        </article>

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
        <div class="horario">
            <?php
        //Horarios y Notas
            $args = array(
                    'title'       => 'cetpro_horarios',
                    'post_type'   => 'wp_block',
                    'numberposts' => 1
            );

            $my_posts = new WP_Query($args);

            if( $my_posts ) :
                $my_posts->the_post();
                the_content();
            endif;
        ?>
        </div>
    </section>

    <?php get_sidebar();?>
</section>

<?php get_footer(); ?>
