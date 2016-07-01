<?php
class PapersController
{
	public function __construct()
	{
function default_category_save4($post_ID)
		{
			$_idCPT=0;//id CPT
			$_tipoCPT="";// variable tipo CPT
			$_idCPT=$post_ID; //Asignar id CPT
			$_tipoCPT=get_post_type( $post_ID );//Obtener tipo CPT.
			if ($_tipoCPT=="papers") {
				//Obtener Dinamicamente id Categoria papers 
				require_once(bicoci_plugin_dir.'/model/ComunicadoModel.php');//Modelo Para comunicados
  				$model = new  ComunicadoModel(); //Instanciar La clase ComunicadoModel
  				$resultado = $model->get_Categoria("papers");//Obtener el Id de la categoria papers
				wp_set_post_categories($post_ID, $resultado);//Asignar Categoria Automaticamente a papers nuevo
		}
    }
        add_action( 'save_post', 'default_category_save4' );

	/**..**/}

///Funcion para crear los Custom Type Post para Papers.

/**
 * Registrar post type Papers.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */

public function PapersInit()
	{ 

		function PapersCTP()
		 {
			$labels = array(
			'name'               => _x( 'Papers', 'post type nombre General', 'bicoci' ),
			'singular_name'      => _x( 'Papers', 'post type nombre Singular', 'bicoci' ),
			'menu_name'          => _x( 'Papers', 'admin menu', 'bicoci' ),
			'name_admin_bar'     => _x( 'Papers', 'add new on admin bar', 'bicoci' ),
			'add_new'            => _x( 'Agregar Nuevo', 'papers', 'bicoci' ),
			'add_new_item'       => __( 'Agregar Nuevo', 'bicoci' ),
			'new_item'           => __( 'Nuevo Paper', 'bicoci' ),
			'edit_item'          => __( 'Editar Paper', 'bicoci' ),
			'view_item'          => __( 'Ver Paper', 'bicoci' ),
			'all_items'          => __( 'Todos los Papers', 'bicoci' ),
			'search_items'       => __( 'Buscar Papers', 'bicoci' ),
			'parent_item_colon'  => __( 'Parent Paper:', 'bicoci' ),
			'not_found'          => __( 'No se encontraron Papers.', 'bicoci' ),
			'not_found_in_trash' => __( 'No se encontraron Papers en Papelera.', 'bicoci' )
			
							);

			$args = array(
			'labels'             => $labels,
	        'description'        => __( 'Descripcion.', 'bicoci' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'papers' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail','category' ),
			'taxonomies' => array( 'category'),
			'menu_icon' => 'dashicons-id-alt'
						);
			///Registrar Nuestro CTP (Custom Type Post)
				register_post_type( 'papers', $args ); 
		}/// fin Funcion PapersCTP

		//Hook init para agregar CPT al menu de Administracion.
		add_action( 'init', 'PapersCTP' );
	}////fin Funcion PapersInit
}//fin class PapersController.
//Instanciar la clase para que los Papers se Desplieguen en la Admin Bar
$varMenu1= new PapersController();
$varMenu1->PapersInit();
?>