<article>
    <div class="thumb">
        <a href="<?php the_permalink(); ?>">
            <div class="contenedor">
                <?php if(has_post_thumbnail()){the_post_thumbnail('list_articles_thumbs');}?>
            </div>
        </a>
    </div>

    <h2>
        <a href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
        </a>
    </h2>

</article>
