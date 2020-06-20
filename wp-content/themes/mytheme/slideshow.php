<section id="slideshow" class="esconder">
    <?php
        $args = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'cat' => '14,15',
                    'posts_per_page' => 10,
                );
        
        $arr_posts = new WP_Query( $args );
        
        if( $arr_posts->have_posts() ) : while( $arr_posts->have_posts() ) : $arr_posts->the_post();
        
    ?>

    <div class="slide">
        <div class="thumb">
            <a href="<?php the_permalink();?>">
                <?php if(has_post_thumbnail()){the_post_thumbnail('slider_thumbs');}?></a>
        </div>
        <article>
            <hgroup>
                <h2><a href="<?php the_permalink();?>">
                        <?php the_title();?></a></h2>
            </hgroup>

            <div id="sl-content">
                <?php
                foreach((get_the_category()) as $category){
                    $catName = $category->name;}
                    //echo category_description($category);
                    
                if($catName == 'welcome'):
                    the_content();
                else:
                    echo first_list();
                endif;
                ?>
            </div>
        </article>

    </div>

    <?php endwhile; else: ?>

    <h2>No se encontraron articulos</h2>

    <?php endif; ?>
</section>
