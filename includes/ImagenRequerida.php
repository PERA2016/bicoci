<?php
function rfi_guard( $new_status, $old_status, $post ) {
    if ( $new_status === 'publish' 
        && !rfi_should_let_post_publish( $post ) ) {
      // wp_die('Error, Debes establecer una Imagen Destacada.', 'Error',  array( 'response' => 500, 'back_link' => true ));
       //wp_die( __( 'Imagen destacada requerida para cambiar Estado.', 'require-featured-image' ) );
         wp_die( __( 'Debes establecer una Imagen Destacada.', 'require-featured-image' ) );
     }
}
add_action( 'admin_enqueue_scripts', 'rfi_enqueue_edit_screen_js' );
function rfi_enqueue_edit_screen_js( $hook ) {
    global $post;
    $postLibro1=['libro'];
	if ( $hook !== 'post.php' && $hook !== 'post-new.php' )
        return;
                                    //rfi_return_post_types()
    if ( in_array( $post->post_type, $postLibro1 ) ) {
        wp_register_script( 'rfi-admin-js', plugins_url('bicoci/includes/js/ImagenRequerida.js'), array( 'jquery' ) );
        wp_enqueue_script( 'rfi-admin-js' );
        wp_localize_script(
            'rfi-admin-js',
            'objectL10n',
            array(
                'jsWarningHtml' => __( '<strong>El Libro no Tiene Imagen Requerida.</strong>. Es necesario asignarle una para publicar en Libros.', 'require-featured-image' ),
            )
        );
    }
}
function rfi_enforcement_start_time() {
    $option = get_option( 'rfi_enforcement_start', 'default' );
    if ( $option === 'default' ) {
        // added in 1.1.0, activation times for installations before
        //  that release are set to two weeks prior to the first call 
        $existing_install_guessed_time = time() - ( 86400*14 );
        add_option( 'rfi_enforcement_start', $existing_install_guessed_time );
        $option = $existing_install_guessed_time;
    }
    return apply_filters( 'rfi_enforcement_start', (int)$option );
}

function rfi_should_let_post_publish( $post ) {
    $postLibro2=['libro'];
    $has_featured_image = has_post_thumbnail( $post->ID );
    $is_watched_post_type = in_array( $post->post_type, $postLibro2 );
    $is_after_enforcement_time = strtotime( $post->post_date ) > rfi_enforcement_start_time();
    
    if ( $is_after_enforcement_time && $is_watched_post_type ) {
        return $has_featured_image;
    }
    return true;
}
?>