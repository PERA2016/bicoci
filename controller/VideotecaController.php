<?php
class VideotecaController
{
	public function __construct()
	{
function default_category_save5($post_ID)
		{
			$_idCPT=0;//id CPT
			$_tipoCPT="";// variable tipo CPT
			$_idCPT=$post_ID; //Asignar id CPT
			$_tipoCPT=get_post_type( $post_ID );//Obtener tipo CPT.
			if ($_tipoCPT=="videoteca") {
				//Obtener Dinamicamente id Categoria videoteca 
				require_once(bicoci_plugin_dir.'/model/ComunicadoModel.php');//Modelo Para comunicados
  				$model = new  ComunicadoModel(); //Instanciar La clase ComunicadoModel
  				$resultado = $model->get_Categoria("videoteca");//Obtener el Id de la categoria videoteca
				wp_set_post_categories($post_ID, $resultado);//Asignar Categoria Automaticamente a videoteca nuevo
		}
    }
        add_action( 'save_post', 'default_category_save5' );

	/**..**/}

///Funcion para crear los Custom Type Post para Videoteca.

/**
 * Registrar post type Papers.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */

public function VideotecaInit()
	{ 

		function VideotecaCTP()
		 {
			$labels = array(
			'name'               => _x( 'Videoteca', 'post type nombre General', 'bicoci' ),
			'singular_name'      => _x( 'Videoteca', 'post type nombre Singular', 'bicoci' ),
			'menu_name'          => _x( 'Videoteca', 'admin menu', 'bicoci' ),
			'name_admin_bar'     => _x( 'Videoteca', 'add new on admin bar', 'bicoci' ),
			'add_new'            => _x( 'Agregar Nuevo', 'videoteca', 'bicoci' ),
			'add_new_item'       => __( 'Agregar Nuevo', 'videoteca' ),
			'new_item'           => __( 'Nuevo Videoteca', 'bicoci' ),
			'edit_item'          => __( 'Editar Videoteca', 'bicoci' ),
			'view_item'          => __( 'Ver Videoteca', 'bicoci' ),
			'all_items'          => __( 'Toda la Videoteca', 'bicoci' ),
			'search_items'       => __( 'Buscar Videoteca', 'bicoci' ),
			'parent_item_colon'  => __( 'Parent Videoteca:', 'bicoci' ),
			'not_found'          => __( 'No se encontroron videos.', 'bicoci' ),
			'not_found_in_trash' => __( 'No se encontraron videos en Papelera.', 'bicoci' )
			
							);

			$args = array(
			'labels'             => $labels,
	        'description'        => __( 'Descripcion.', 'bicoci' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'videoteca' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail','category' ),
			'taxonomies' => array( 'category'),
			'menu_icon' => 'dashicons-video-alt'
						);
			///Registrar Nuestro CTP (Custom Type Post)
				register_post_type( 'videoteca', $args ); 
		}/// fin Funcion PapersCTP

		//Hook init para agregar CPT al menu de Administracion.
		add_action( 'init', 'VideotecaCTP' );
	}////fin Funcion VideotecaInit
}//fin class VideotecaController.
//Instanciar la clase para que los Papers se Desplieguen en la Admin Bar
$varMenu1= new VideotecaController();
$varMenu1->VideotecaInit();
?>