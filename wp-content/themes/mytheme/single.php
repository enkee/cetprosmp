<?php get_header(); ?>

<section id="main">

    <section id="articles_list">

        <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
        <article>
            <div class="thumb">
                <a href="<?php the_permalink(); ?>">
                    <div class="contenedor">
                        <?php if(has_post_thumbnail())  {the_post_thumbnail('list_articles_thumbs');}?>
                    </div>
                </a>
            </div>
            <hgroup>
                <h2><a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a></h2>
            </hgroup>
            <div class="date">
                <?php the_modified_date(); ?>

            </div>
            <div class="contenido">
                <?php the_content(); ?>
            </div>
        </article>

        <?php endwhile; else: ?>

        <h1>No se encontraron Articulos</h1>

        <?php endif; ?>

        <div id="comentarios">
            <div id="caja_comentarios">
                <h3>Comentarios</h3>

                <?php comments_template(); ?>

                <?php if( !have_comments() ) : ?>
                <p>(No hay comentarios para este Articulo)</p>
                <?php endif; ?>
            </div>
        </div>

    </section>


    <?php get_sidebar(); ?>

</section>

<?php get_footer(); ?>
