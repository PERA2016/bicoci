<?php

class RevistaController
{
	public function __construct()
	{
function default_category_save3($post_ID)
		{
			$_idCPT=0;//id CPT
			$_tipoCPT="";// variable tipo CPT
			$_idCPT=$post_ID; //Asignar id CPT
			$_tipoCPT=get_post_type( $post_ID );//Obtener tipo CPT.
			if ($_tipoCPT=="revistas-cientificas") {
				//Obtener Dinamicamente id Categoria Revista 
				require_once(bicoci_plugin_dir.'/model/ComunicadoModel.php');//Modelo Para comunicados
  				$model = new  ComunicadoModel(); //Instanciar La clase ComunicadoModel
  				$resultado = $model->get_Categoria("revistas-cientificas");//Obtener el Id de la categoria revista
				wp_set_post_categories($post_ID, $resultado);//Asignar Categoria Automaticamente a evento nuevo
		}
    }
        add_action( 'save_post', 'default_category_save3' );

	/**..**/}

///Funcion para crear los Custom Type Post para Revista.

/**
 * Registrat post type Revista.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */

public function RevistaInit()
	{ 

		function RevistaCTP()
		 {
			$labels = array(
			'name'               => _x( 'Revistas Cientifica', 'post type nombre General', 'bicoci' ),
			'singular_name'      => _x( 'Revista', 'post type nombre Singular', 'bicoci' ),
			'menu_name'          => _x( 'Revistas Cientifica', 'admin menu', 'bicoci' ),
			'name_admin_bar'     => _x( 'Revista', 'add new on admin bar', 'bicoci' ),
			'add_new'            => _x( 'Agregar Nueva', 'revista', 'bicoci' ),
			'add_new_item'       => __( 'Agregar Nueva Revista', 'bicoci' ),
			'new_item'           => __( 'Nueva Revista', 'bicoci' ),
			'edit_item'          => __( 'Editar Revista', 'bicoci' ),
			'view_item'          => __( 'Ver Revista', 'bicoci' ),
			'all_items'          => __( 'Todas las Revistas', 'bicoci' ),
			'search_items'       => __( 'Buscar Revista', 'bicoci' ),
			'parent_item_colon'  => __( 'Parent Revista:', 'bicoci' ),
			'not_found'          => __( 'No se encontraron Revistas.', 'bicoci' ),
			'not_found_in_trash' => __( 'No se encontraron Revistas en Papelera.', 'bicoci' )
			
							);

			$args = array(
			'labels'             => $labels,
	        'description'        => __( 'Descripcion.', 'bicoci' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'revistas-cientificas' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'author', /**'thumbnail', **/'category' ),//Las revistas no Tienen Imagen Destacada
			'taxonomies' => array( 'category'),
			'menu_icon' => 'dashicons-images-alt2'
						);
			///Registrar Nuestro CTP (Custom Type Post)
				register_post_type( 'revistas-cientificas', $args ); 
		}/// fin Funcion RevistaCTP

		//Hook init para agregar CPT al menu de Administracion.
		add_action( 'init', 'RevistaCTP' );
	}////fin Funcion RevistaInit


}//fin class ComunicadoController.
//Instaciar la clase para que las Revistas se Desplieguen en la Admin Bar
$varMenu1= new RevistaController();
$varMenu1->RevistaInit();
?>