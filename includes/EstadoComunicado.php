<?php
add_action( 'admin_enqueue_scripts','action_admin_enqueue_scripts'  );
function action_admin_enqueue_scripts() {
      
    // javascriptp para modificar post status dropdown donde aparezca.
      wp_enqueue_script( 'edit_flow-custom_status', plugins_url('bicoci/includes/js/EstadoComunicado.js'), array( 'jquery','post' ), '', true );
    
  }

//Agregar estado de cancelado
function jc_custom_post_status(){
     register_post_status( 'cancelado', array(
          'label'                     => _x( 'cancelado', 'libro' ),
          'public'                    => false,//Para que NO aparezca en el Feed
          'show_in_admin_all_list'    => false,//Para que NO aparezcan en la opciones todos en ver todos los comunicados
          'show_in_admin_status_list' => true,//Aparecer Un apartado de los status por defecto en el admin area
          'label_count'               => _n_noop( 'Cancelado <span class="count">(%s)</span>', 'Cancelados <span class="count">(%s)</span>' ),
          'exclude_from_search'       => false
     ) );
}
add_action( 'init', 'jc_custom_post_status' );

function jc_display_cancelado_state( $states ) {
     global $post;
     $arg = get_query_var( 'post_status' );
     if($arg != 'cancelado'){
          if($post->post_status == 'cancelado'){
               return array('cancelado');
          }
     }
    return $states;
}
add_filter( 'display_post_states', 'jc_display_cancelado_state' );
/* JS Para el estado Cancelado */
function jc_append_post_status_bulk_edit() {
    //Eliminar  Editar de la Lista de Acciones en lote 
    echo '
     <script>
     jQuery(document).ready(function($){
     $("#bulk-action-selector-top").find("option[value=edit]").remove();  
     });
     </script>
            ';
//Agregar al inline edit estado "cancelado" 
echo "<script>
  jQuery(document).ready( function() {
    jQuery( 'select[name=\"_status\"]' ).append( '<option value=\"cancelado\">Cancelado</option>' );
  });
  </script>";
}

add_action( 'admin_footer-edit.php', 'jc_append_post_status_bulk_edit' );

/* Agregar estado cancelado en edit dropdown */

add_action( 'post_submitbox_misc_actions', 'my_post_submitbox_misc_actions' );
function my_post_submitbox_misc_actions(){

global $post;

echo '<script>
   jQuery(document).ready(function() {
  // publish button validation
  jQuery("#publish").click(function(){
    $title_value = jQuery.trim(jQuery("#title").val());
    if($title_value == 0 && $title_value != " "){
      alert("Titulo no valido");
      jQuery(".spinner").css("visibility", "hidden");
      jQuery("#title").focus();
      return false;
    }
  });
  // draft button validation
  jQuery("#save-post").click(function(){
    $title_value = jQuery.trim(jQuery("#title").val());
    if($title_value == 0 && $title_value != " "){
      alert("Titulo no valido");
      jQuery(".spinner").css("visibility", "hidden");
      jQuery("#title").focus();
      return false;
    }
  });
});
    </script>';



//only when editing a post
////Agregar un nuevo CPT al if ejemplo ||$post->post_type == 'evento2'
if( $post->post_type == 'libro' ||$post->post_type == 'revista' ||$post->post_type == 'hemeroteca'||$post->post_type == 'papers'  ){
    // custom post status: approved
    $complete = '';
    $label = '';   

    if( $post->post_status == 'cancelado' ){
        $complete = ' selected=\"selected\"';
        $label = '<span id=\"post-status-display\"> cancelado</span>';
    }
    echo '<script>
    jQuery(document).ready(function($){
        $("select#post_status").append("<option value=\"cancelado\" '.$complete.'>Cancelado</option>");
        $(".misc-pub-section label").append("'.$label.'");
    });
    </script>';

   }//Fin If ( $post->post_type == 'libro' )

global $pagenow;
    //echo $pagenow;
if ( in_array( $pagenow, array( 'post-new.php' ) ) )
    {
      //echo ">Entro post-new  ";
     echo '
     <script>
     jQuery(document).ready(function($){
     $("#post_status").find("option[value=cancelado]").remove();  
     });
     </script>';
   }
   
}// Fin my_post_submitbox_misc_actions
//Ocultar escritorio del Dashboard

function annointed_admin_bar_remove() {
        global $wp_admin_bar;

        /* Remove their stuff */
        $wp_admin_bar->remove_menu('wp-logo');
        $wp_admin_bar->remove_menu('comments');
        $wp_admin_bar->remove_menu('new-content');
        $wp_admin_bar->remove_menu('updates');
}

add_action('wp_before_admin_bar_render', 'annointed_admin_bar_remove', 0);
//Eliminar Opciones del Escritorio
function example_remove_dashboard_widgets() {
            remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
            remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );       
            remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );     
            remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' );               
            remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
            remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
            remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );   
            remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' ); 
            remove_meta_box( 'dashboard_browser_nag', 'dashboard', 'normal' );   
            remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );                   
    } 
 
    add_action('wp_dashboard_setup', 'example_remove_dashboard_widgets' ); 
//Solo una columna en el escritorio     
function so_screen_layout_columns( $columns ) {
        $columns['dashboard'] = 1;
        return $columns;    }
add_filter( 'screen_layout_columns', 'so_screen_layout_columns' );
 
    function so_screen_layout_dashboard() {
        return 1;
    }
add_filter( 'get_user_option_screen_layout_dashboard', 'so_screen_layout_dashboard' );    
//Personalizar Escritorio
function st_welcome_panel() {
echo
'<div class="Bienvenido-al-BICOCI">'
.'<h1>Bienvenido al BICOCI</h1>'
.'</div>';
echo '<center> <img id="logo-admin"src='.plugins_url().'/bicoci/includes/img/logo-bicoci.png></center> ';
}

remove_action('welcome_panel','wp_welcome_panel');
add_action('welcome_panel','st_welcome_panel'); 
//Quitar actualizaciones menu
function edit_admin_menus() {  
global $submenu;  
unset($submenu['index.php'][10]);
unset($submenu['options-general.php'][25]); // Discussion
return $submenu;
}  
add_action( 'admin_menu', 'edit_admin_menus' );


function remove_core_updates(){
    global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
}
add_filter('pre_site_transient_update_core','remove_core_updates');
add_filter('pre_site_transient_update_plugins','remove_core_updates');
add_filter('pre_site_transient_update_themes','remove_core_updates'); 
?>