<?php get_header(); ?>

<section id="main">
    <section id="articles_list">
        <?php
        $args = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'category_name' => 'slider',
                    //'posts_per_page' => 5, //se configura afuera
                    //'paged' => $paged,
                );
        
        $arr_posts = new WP_Query( $args );
        
        if( $arr_posts->have_posts() ) :
        
        while( $arr_posts->have_posts() ) : $arr_posts->the_post();
        ?>

        <article>
            <div class="thumb">
                <a href="<?php the_permalink(); ?>">
                    <?php if(has_post_thumbnail()){the_post_thumbnail('list_articles_thumbs');}?>
                </a>
            </div>

            <h2>
                <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                </a>
            </h2>

            <div class="extract">
                <?php //the_excerpt(); 
                    echo first_list();
                ?>
            </div>
        </article>

        <?php endwhile;?>

        <div id="pagination">
            <p>
                <?php 
                    //echo paginate_links();
                    previous_posts_link('<- Post Anteriores')
                ?>
                <?php
                    //if(count($arr_posts) > $args['posts_per_page']):
                        next_posts_link('Post Siguientes ->');
                    //endif;
                ?>

            </p>
        </div>

        <?php else: ?>
        <h1>No se encontraron Articulos</h1>
        <?php endif; ?>



    </section>

</section>
