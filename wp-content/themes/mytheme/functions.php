<?php
register_nav_menus(array(
'menu' => 'Menu Superior',
));
/*
========================================================
Theme support function
========================================================
*/
add_theme_support('post-thumbnails');
//add_action( 'after_setup_theme', 'wpdocs_theme_setup' );
//function wpdocs_theme_setup() {
    add_image_size( 'slider_thumbs', 470 ); // 300 pixels wide (and unlimited height)
    add_image_size( 'list_articles_thumbs', 450 ); // 
//}
add_theme_support('html5', array('search-form'));
/*
========================================================
Sidebar functions
========================================================
*/

register_sidebar(array(
    'name' => 'Sidebar',
    'before_widget' => '<section class="widget">',
    'after_widget' => '</section>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
));


register_sidebar(array(
    'name' => 'Footer',
    'before_widget' => '<section class="widget">',
    'after_widget' => '</section>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
));


//Quitar la barra de herramientas de WORDPRESS

add_action('after_setup_theme', 'bp_no_admin_bar');

function bp_no_admin_bar() {
add_filter( 'show_admin_bar', '__return_false' ); 
}

//Funcion que devuelve la posicion de un substring en la Nsime ocurrencia.
function strposOffset($string, $search, $offset)
{
    /*** explode the string ***/
    $arr = explode($search, $string);
    /*** check the search is not out of bounds ***/
    switch( $offset )
    {
        case $offset == 0:
        return false;
        break;
    
        case $offset > max(array_keys($arr)):
        return false;
        break;

        default:
        return strlen(implode($search, array_slice($arr, 0, $offset)));
    }
}

//agrega formato al resultado de get_the_content()
function get_the_content_with_formatting ($more_link_text = '(more...)', $stripteaser = 0, $more_file = '') {
	$content = get_the_content($more_link_text, $stripteaser, $more_file);
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	return $content;
}

//filtra etiquetas no deseadas de los articulos, de las matriculas
function first_table() {
    
    $text = wpautop(get_the_content_with_formatting());
    $text = substr($text, strposOffset($text,'<table',1), strposOffset($text,'</table>',1) - strposOffset($text,'<table',1)) ;
    $text = strip_tags($text, '<a><strong><em><td><th><br><tr>');
    return  '<table>' . $text . '</table>';
}

//filtra las etiquetas de las listas de los modulos
function first_list() {
    
    $text = wpautop(get_the_content_with_formatting());
    $text = substr($text, strposOffset($text,'<ol>',1), strposOffset($text,'</ol>',1) - strposOffset($text,'<ol>',1)); 
    $text = strip_tags($text, '<a><strong><em><br><li>');
    return  '<ol>' . $text . '</ol>';
}


function slug_get_avatar( $avatar, $id_or_email, $size, $default, $alt ) {

    //If is email, try and find user ID
    if( ! is_numeric( $id_or_email ) && is_email( $id_or_email ) ){
        $user  =  get_user_by( 'email', $id_or_email );
        if( $user ){
            $id_or_email = $user->ID;
        }
    }

    //if not user ID, return
    if( ! is_numeric( $id_or_email ) ){
        return $avatar;
    }

    //Find ID of attachment saved user meta
    $saved = get_user_meta( $id_or_email, 'field_with_custom_avatar_id', true );
    if( 0 < absint( $saved ) ) {
        //return saved image
        return wp_get_attachment_image( $saved, [ $size, $size ], false, ['alt' => $alt] );
    }

    //return normal
    return $avatar;

}

?>
