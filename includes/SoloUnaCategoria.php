<?php
//Eliminar Edicion de la Categoria en Quick Edit y eliminar agregar mas categorias
function customAdminCSS() {
    echo '<style type="text/css">
    .inline-edit-col .inline-edit-categories-label, .inline-edit-col .category-checklist {
    	display: none !important;
    }
    </style>';

//.aam-icon-small-delete
 //Ocultar boton eliminar de rol usuario
echo '<style type="text/css">
.aam-icon-small-delete {
    display: none;
    visibility: hidden;
}
    </style>';
//Elimar opcion Agregar mas categorias
echo '<style type="text/css">#category-add-toggle {
    display: none;
    visibility: hidden;
}
    </style>';

   ///Ocultar div de Categorias.  
    echo '<style type="text/css">
    #categorydiv {
    display: none;
    visibility: hidden;
}
    </style>';
    // Desactivar Actualizacion de AAM
 echo '<style type="text/css">
    #advanced-access-manager-update {
    display: none;
    visibility: hidden;
}
    </style>';

  //Desactivar Actualizacion de Bitacora
 echo '<style type="text/css">
    #stream-update {
    display: none;
    visibility: hidden;
}
    </style>';

//Ocultar Filtro de todas las categorias en filtrar por categoria
echo '<style type="text/css">
    #cat {
    display: none;
    visibility: hidden;
}
    </style>';
      ///Ocultar div de Autor.  
    echo '<style type="text/css">
    #authordiv {
    display: none;
    visibility: hidden;
}
    </style>';
//Ocultar check categoria
echo '<style type="text/css">
    #categorydiv-hide {
    display: none;
    visibility: hidden;
}
    </style>';
 //Ocultar opcion quitar imagen 
echo '<style type="text/css">
    #remove-post-thumbnail {
    display: none;
    visibility: hidden;
}
    </style>';
  //Ocultar vista previa
echo '<style type="text/css">
    #post-preview {
    display: none;
    visibility: hidden;
}
    </style>';
//Ocultar Visibilidad publico
echo '<style type="text/css">
    #visibility {
    display: none;
    visibility: hidden;
}
    </style>';
//Ocultar Mover papelera nuevo post
echo '<style type="text/css">
    #delete-action {
    display: none;
    visibility: hidden;
}
    </style>';
 //Ocultar Mover papelera nuevo post
echo '<style type="text/css">
    .edit-slug {
    display: none;
    visibility: hidden;
}
    </style>';
//Ocultar elementos de nuevo post
echo '<style type="text/css">
    #edit-slug-box {
    display: none;
    visibility: hidden;
}
    </style>';
//Ocultar elementos de crear nuevo
echo '<style type="text/css">
    #show-settings-link {
    display: none;
    visibility: hidden;
}
    </style>';
//Ocultar Unistall de Bitacora
echo '<style type="text/css">
    #wp_stream_uninstall {
    display: none;
    visibility: hidden;
}
    </style>';



//requiridos
/* style all input elements with a required attribute */
echo '<style type="text/css">
/*input:required {
  box-shadow: 4px 4px 20px rgba(200, 0, 0, 0.85);
}*/

.requerido:after {
content:" *"; 
color: #e32;
margin: 0px 0px 0px 2px; 
font-size: large; 
padding: 0 5px 0 0; }

input:required:after {
content:"*"; 
color: #e32;
position: absolute; 
margin: 0px 0px 0px 5px; 
font-size: large; 
padding: 0 5px 0 0; }

/**
 * style input elements that have a required
 * attribute and a focus state
 */
input:required:focus {
  border: 1px solid red;
  outline: none;
}

/**
 * style input elements that have a required
 * attribute and a hover state
 */
input:required:hover {
  opacity: 1;
}
 </style>';
//
}//Fin customAdminCSS
add_action('admin_head', 'customAdminCSS');

/*------------------------------------------------------------------------------------
    Remover edicion rapida los publicados
------------------------------------------------------------------------------------*/
add_filter( 'post_row_actions', 'remove_row_actions', 10, 2 );//10-> prioridad, 2-> Parametros de funcion
function remove_row_actions( $actions, $post )
{
  global $current_screen;
   //if( $current_screen->post_type != 'libro'&& $current_screen->post_type != 'revista' && $current_screen->post_type != 'hemeroteca'  ) return $actions;
    //unset( $actions['edit'] );
    //unset( $actions['view'] );
    //unset( $actions['trash'] );
    unset( $actions['inline hide-if-no-js'] );//Edicion Rapida
    //$actions['inline hide-if-no-js'] .= __( 'Quick&nbsp;Edit' );

    return $actions;
}


/*------------------------------------------------------------------------------------
    Agregar nuevas categorias
------------------------------------------------------------------------------------*/
//Crear categorias de Los Publicados
function categoria(){
$my_catLibro = array('cat_name' => 'libro', 
    'category_description' => 'Publicados de libros de la EISI',
     'category_nicename' => 'libro',
      'category_parent' => '');

// Create the category
wp_insert_category($my_catLibro);

$my_catRevista = array('cat_name' => 'revista', 
    'category_description' => 'Publicados de revistas de la EISI',
     'category_nicename' => 'revista',
      'category_parent' => '');
// Create the category
wp_insert_category($my_catRevista);

$my_catHemeroteca = array('cat_name' => 'hemeroteca', 
    'category_description' => 'Publicados de hemeroteca de la EISI',
     'category_nicename' => 'hemeroteca',
      'category_parent' => '');
// Create the category
wp_insert_category($my_catHemeroteca);

$my_catPapers = array('cat_name' => 'papers', 
    'category_description' => 'Publicados de papers de la EISI',
     'category_nicename' => 'papers',
      'category_parent' => '');

// Create the category
wp_insert_category($my_catPapers);

$my_catVideoteca = array('cat_name' => 'videoteca', 
    'category_description' => 'Publicados de videos de la EISI',
     'category_nicename' => 'videoteca',
      'category_parent' => '');

// Create the category
wp_insert_category($my_catVideoteca);

}
add_action('admin_init','categoria');
/*------------------------------------------------------------------------------------
    Fin Agregar nuevas categorias
------------------------------------------------------------------------------------*/
?>