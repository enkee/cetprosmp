<footer>
    <div class="contenpie">
        <!-- <div id="widgets">
            <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer')): endif; ?>
        </div> -->

        <div id="datos">
            <?php
                $the_slug = 'Datos CETPRO SMP';

                $args = array(
                    'name'        => $the_slug,
                    'post_type'   => 'post',
                    'post_status' => 'publish',
                    'numberposts' => 1);

                $my_posts = new WP_Query($args);

                if ($my_posts):
                    $my_posts->the_post();
                    the_content();
                endif;
            ?>
        </div>

        <p id="copyright"><span>Copyright @2018 - Todos los derechos reservados</span><span> CETPRO "San Martin de Porres" - v.0.4.20</span></p>

        <a data-scroll class="ir-arriba" href="#"><i class="fas fa-arrow-circle-up" aria-hidden="true"> </i> </a>
    </div>
</footer>


<!--Aqui comienzan los scripts-->

<!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->
<!--Jquery-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- <script src="<?php bloginfo('template_url'); ?>/js/jquery-3.3.1.min.js"></script> -->

<script src="<?php bloginfo('template_url'); ?>/js/jquery-ui.min.js"></script>

<script src="<?php bloginfo('template_url'); ?>/js/jquery.touchSwipe.js"></script>

<script src="<?php bloginfo('template_url'); ?>/js/jquery.slideandswipe.js"></script>

<script src="<?php bloginfo('template_url'); ?>/js/sidebar-menu.js"></script>

<script src="<?php bloginfo('template_url'); ?>/js/wow.min.js"></script>

<script src="<?php bloginfo('template_url'); ?>/js/smooth-scroll.min.js"></script>

<script src="<?php bloginfo('template_url'); ?>/js/scripts.js"></script>

<script src="<?php bloginfo('template_url'); ?>/js/popper.min.js"></script>

<script src="<?php bloginfo('template_url'); ?>/js/bootstrap.min.js"></script>

<script src="<?php bloginfo('template_url'); ?>/js/slick.min.js"></script>

<!-- Inicializacion de sidesho slick -->
<script type="text/javascript">
$(document).ready(function() {
    $('#slideshow').slick({

        dots: true,
        autoplay: true,
        autoplaySpeed: 3000,
    });
});
</script>

<!-- Inicializacion de side-swipe-menu -->
<script>
    $(document).ready(function() {
        $('nav').slideAndSwipe();
    });
</script>

<!-- Inicializacion de sidebar-menu -->
<script>
    $.sidebarMenu($('.sidebar-menu'));
</script>

<!-- Inicializacion de WOW -->
<script>
   new WOW().init();
</script>

<!-- Inicializacion de SmoothScroll -->
<script>
    var scroll = new SmoothScroll('a[href*="#"]', {
	speed: 300
    });
</script>


<?php wp_footer(); ?>

</body>

</html>