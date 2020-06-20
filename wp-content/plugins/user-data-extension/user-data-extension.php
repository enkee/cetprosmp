<?php
/*
Plugin Name: user-data-extension
Plugin URI: cetprosmp.edu.pe
Description: Este Plugin esta en desarrollo
Version: 1.0.0
Author: Enrique Palomino
Author URI: cetprosmp.edu.pe
License: GPLv2
shortcode: [user_data_form]
*/

//Agrega un campo de texto al formulario de Usuario de Wordpres
add_filter('user_contactmethods','agregar_campos_contacto');

function agregar_campos_contacto($arr){
    $arr['phone'] = __('Phone');
    return $arr;
}


//Agregar toda una seccion al formulario de Usuario de Wordpress

//Añadimos los campos en una nueva sección
add_action( 'show_user_profile', 'agregar_campos_seccion' );
add_action( 'edit_user_profile', 'agregar_campos_seccion' );
 
function agregar_campos_seccion( $user ) {
?>
    <h3><?php _e('Datos Académicos'); ?></h3>
    
    <table class="form-table">
        <tr>
            <th>
                <label for="profesion"><?php _e('Profesion'); ?></label>
            </th>
            <td>
                <input type="text" name="profesion" id="profesion" class="regular-text"
                	value="<?php echo esc_attr( get_the_author_meta( 'profesion', $user->ID ) ); ?>" />
                <p class="description"><?php _e('Ingresa tu profesión'); ?></p>
            </td>
        </tr>
    </table>
<?php }

//Guardamos los nuevos campos
add_action( 'personal_options_update', 'grabar_campos_seccion' );
add_action( 'edit_user_profile_update', 'grabar_campos_seccion' );

function grabar_campos_seccion( $user_id ) {
	
    if ( !current_user_can( 'edit_user', $user_id ) ) {
        return false;
    }

    if( isset($_POST['profesion']) ) {
        $profesion = sanitize_text_field($_POST['profesion']);
        update_user_meta( $user_id, 'profesion', $profesion );
    }
}

//============================================================
// Formulario de datos de Usuario

add_shortcode('user_data_form', 'Formulario_de_usuario');

function Formulario_de_usuario($user){
    ob_start();
    ?>

    <form action="<?php get_the_permalink()?>" method="post"  class="formulario">
        <div class="form-input">
            <label for="nombre">Nombre</label>
            <input type="text" name="profesion" id="profesion" class="regular-text"
                	value="<?php echo esc_attr( get_the_author_meta( 'profesion', $user->ID ) ); ?>" />

        </div>
    </form> 

    <?php
    return ob_get_clean();
}

?>