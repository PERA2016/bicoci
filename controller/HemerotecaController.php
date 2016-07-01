<?php
class HemerotecaController
{
	public function __construct()
	{
		function default_category_save1($post_ID)
		{
			$_idCPT=0;//id CPT
			$_tipoCPT="";// variable tipo CPT
			$_idCPT=$post_ID;//Asignar id CPT
			$_tipoCPT=get_post_type( $post_ID );//Obtener tipo CPT.
			if ($_tipoCPT=="hemeroteca") {
				//Obtener Dinamicamente id Categoria Hemeroteca
				require_once(bicoci_plugin_dir.'/model/ComunicadoModel.php');//Modelo Para comunicados
  				$model = new  ComunicadoModel(); //Instanciar La clase ComunicadoModel
  				$resultado = $model->get_Categoria("hemeroteca");//Obtener el Id de la categoria hemeroteca
				wp_set_post_categories($post_ID, $resultado);//Asignar Categoria Automaticamente a hemeroteca nuevo			 	
			 } 
	    }
        add_action( 'save_post', 'default_category_save1' );



	/**..**/}//Fin Constructor

///Funcion para crear los Custom Type Post para Hemeroteca.

/**
 * Registrar post type Hemeroteca.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */

public function HemerotecaInit()
	{ 

		function HemerotecaCTP()
		 {
			$labels = array(
			'name'               => _x( 'Hemeroteca', 'post type nombre General', 'bicoci' ),
			'singular_name'      => _x( 'Hemeroteca', 'post type nombre Singular', 'bicoci' ),
			'menu_name'          => _x( 'Hemeroteca', 'admin menu', 'bicoci' ),
			'name_admin_bar'     => _x( 'Hemeroteca', 'add new on admin bar', 'bicoci' ),
			'add_new'            => _x( 'Agregar Nueva', 'hemeroteca', 'bicoci' ),
			'add_new_item'       => __( 'Agregar Nueva Hemeroteca', 'bicoci' ),
			'new_item'           => __( 'Nueva Hemeroteca', 'bicoci' ),
			'edit_item'          => __( 'Editar Hemeroteca', 'bicoci' ),
			'view_item'          => __( 'Ver Hemeroteca', 'bicoci' ),
			'all_items'          => __( 'Toda la Hemeroteca', 'bicoci' ),
			'search_items'       => __( 'Buscar Hemeroteca', 'bicoci' ),
			'parent_item_colon'  => __( 'Parent Hemeroteca:', 'bicoci' ),
			'not_found'          => __( 'No se enconto Hemeroteca.', 'bicoci' ),
			'not_found_in_trash' => __( 'No se enconto Hemeroteca en Papelera.', 'bicoci' )
			
							);

			$args = array(
			'labels'             => $labels,
	        'description'        => __( 'Descripcion.', 'bicoci' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'hemeroteca' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'author', /**'thumbnail', **/'category' ),//La Hemeroteca no Tiene Imagen Destacada
			'taxonomies' => array( 'category'),
			'menu_icon' => 'dashicons-album'
						);
			///Registrar Nuestro CTP (Custom Type Post)
				register_post_type( 'hemeroteca', $args ); 
		}/// fin Funcion HemerotecaCTP

		//Hook init para agregar CPT al menu de Administracion.
		add_action( 'init', 'HemerotecaCTP' );

	}////fin Funcion HemerotecaInit


}//fin class ComunicadoController.
//Instaciar la clase para que la hemeroteca se Despliegue en la Admin Bar
$varMenu= new HemerotecaController();
$varMenu->HemerotecaInit();
?>