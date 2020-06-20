<?php get_header(); ?>

<section id="main">

    <section id="articles_list">

        <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

        <article>
            <div class="thumb"><a href="<?php the_permalink(); ?>">
                    <?php if(has_post_thumbnail()){the_post_thumbnail('list_articles_thumbs');}?>
                </a></div>
            <hgroup>
                <h2><a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a></h2>
            </hgroup>
            <div class="date">
                <?php the_date(); ?> en
                <span>
                    <?php the_category(); ?></span>
            </div>
            <div class="extract">
                <?php the_content(); ?>
            </div>
        </article>

        <?php endwhile; else: ?>

        <p>No se encontraron Articulos</p>

        <?php endif; ?>

        <h3>Blog Post About Sin categoria</h3>
        <?php 
            
            $ourCurrentPage = get_query_var('paged');
        
            $sinCategoriaPosts = new WP_Query(
                array(
                    'category_name' => 'sin-categoria',
                    'posts_per_page' => 3,
                    'paged' => $ourCurrentPage
                )
            );
        
            if($sinCategoriaPosts->have_posts()):
                while($sinCategoriaPosts->have_posts()):
                    $sinCategoriaPosts->the_post();
        ?>
        <li>
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </li>
        <?php                         
                endwhile;
            
        
            echo paginate_links(array(
                'total' => $sinCategoriaPosts->max_num_pages
            ));
            /*previous_posts_link();
            next_posts_link('Next page', $sinCategoriaPosts->max_num_pages);*/
        
            endif;
        ?>

        <p>
            <?php
                
            ?>
        </p>


    </section>

    <?php get_sidebar(); ?>

</section>

<?php get_footer(); ?>
