<?php
class LibroController
{
	public function __construct()
	{
//$this->post_ID;
//
function default_category_save2($post_ID){
			$_idCPT=0;//id CPT
			$_tipoCPT="";// variable tipo CPT
			$_idCPT=$post_ID;//Asignar id CPT
			$_tipoCPT=get_post_type( $post_ID );//Obtener tipo CPT.
			if ($_tipoCPT=="libros") {
				//Obtener Dinamicamente id Categoria libro
				require_once(bicoci_plugin_dir.'/model/ComunicadoModel.php');//Modelo Para comunicados
  				$model = new  ComunicadoModel(); //Instanciar La clase ComunicadoModel
  				$resultado = $model->get_Categoria("libros");//Obtener el Id de la categoria "libro"
				wp_set_post_categories($post_ID, $resultado);//Asignar Categoria Automaticamente a libro nuevo
			 }
		}
        add_action( 'save_post', 'default_category_save2' );
	/**..**/}

///Funcion para crear los Custom Type Post para Libros.

/**
 * Registrat post type Libros.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */

public function LibroInit()
	{ 

		function LibroCTP()
		 {
			$labels = array(
			'name'               => _x( 'Libros', 'post type nombre General', 'bicoci' ),
			'singular_name'      => _x( 'Libro', 'post type nombre Singular', 'bicoci' ),
			'menu_name'          => _x( 'Libros', 'admin menu', 'bicoci' ),
			'name_admin_bar'     => _x( 'libro', 'add new on admin bar', 'bicoci' ),
			'add_new'            => _x( 'Agregar Nuevo', 'Libro', 'bicoci' ),
			'add_new_item'       => __( 'Agregar Nuevo Libro', 'bicoci' ),
			'new_item'           => __( 'Nuevo Libro', 'bicoci' ),
			'edit_item'          => __( 'Editar Libro', 'bicoci' ),
			'view_item'          => __( 'Ver Libro', 'bicoci' ),
			'all_items'          => __( 'Todos los Libros', 'bicoci' ),
			'search_items'       => __( 'Buscar Libros', 'bicoci' ),
			'parent_item_colon'  => __( 'Parent Libros:', 'bicoci' ),
			'not_found'          => __( 'No se encontraron Libros.', 'bicoci' ),
			'not_found_in_trash' => __( 'No se encontraron Libros en Papelera.', 'bicoci' )
			
							);

			$args = array(
			'labels'             => $labels,
	        'description'        => __( 'Descripcion.', 'bicoci' ),
			'public'             => true,//Si el Post aparecera publico en el sitio
			'publicly_queryable' => true,//Si el Post aparece en la Busqueda del sitio
			'show_ui'            => true,
			'show_in_menu'       => true,//Si se muestra en el menu de administracion
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'libros' ),//ID del CPT
			'capability_type'    => 'post',//De donde deriba el CPT, Existen otros tipos como Admon de media etc
			'has_archive'        => true,// Si se puede agregar un archico el CPT
			'hierarchical'       => false,
			'menu_position'      => null,//Posicion del Menu en el Admin menu
			//las caracteristicas esenciales a la hora de agregar un nuevo Libro
										// titulo, editor, autor, imgen destacada	,categoria, campos personalizados
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'category'/*,'custom-fields'*/ ),
			'taxonomies' => array( 'category'),//Categoria del libro
			'menu_icon' => 'dashicons-editor-spellcheck'//Icono del CPT
						);
			///Registrar Nuestro CTP (Custom Type Post)
				register_post_type( 'libros', $args ); //ID dep CPT
		}/// fin Funcion ProyectoCTP

//********************Configuraciones extras*******************************************//
		//Hook init para agregar CPT al menu de Administracion.
		add_action( 'init', 'LibroCTP' );
		//Quitar botón agregar multimedia del editor
			function RemoverAddMediaButtons()
				{//
        		 remove_action( 'media_buttons', 'media_buttons' ); //}
        		}
		//hook para Remover boton de objeto
		add_action('admin_head', 'RemoverAddMediaButtons');
		
		//Remover Menu de Entradas por Defecto de WP
		function RemoverMenuEntradasWP() 
				{
				 remove_menu_page('upload.php');//Remover Menu Medios.
				 remove_menu_page('edit-comments.php');//Remover Menu Comentarios.
    	    	 remove_menu_page('edit.php'); //Remover Menu Entradas.
    	    	 remove_menu_page('edit-tags.php'); //Remover Menu categorias.
    	    	 //Remover Categorias dentro de libros, revistas-cientificas, hemeroteca, videoteca.
    	    	 remove_submenu_page( 'edit.php?post_type=revistas-cientificas', 'edit-tags.php?taxonomy=category&amp;post_type=revistas-cientificas' );
    	    	 remove_submenu_page( 'edit.php?post_type=libros', 'edit-tags.php?taxonomy=category&amp;post_type=libros' );
    	    	 remove_submenu_page( 'edit.php?post_type=hemeroteca', 'edit-tags.php?taxonomy=category&amp;post_type=hemeroteca' );
    	    	 remove_submenu_page( 'edit.php?post_type=papers', 'edit-tags.php?taxonomy=category&amp;post_type=papers' );
                 remove_submenu_page( 'edit.php?post_type=videoteca', 'edit-tags.php?taxonomy=category&amp;post_type=videoteca' );
    	    	}
		add_action( 'admin_menu', 'RemoverMenuEntradasWP' ); 
		//Agregar los CPT a Main Feed
		function AgregarCPTMainFeed($qv) 
				{
				 if (isset($qv['feed']) && !isset($qv['post_type']))
				 $qv['post_type'] = array('libros', 'revistas-cientificas','hemeroteca','papers','videoteca');//CPT creados
				 return $qv;
				}
		add_filter('request', 'AgregarCPTMainFeed');

		// Obligar Seleccionar Imgagen destacada*/
		
		require_once(bicoci_plugin_dir.'/includes/ImagenDestacada.php');
		ValidarImagen();//Funcion que se encuentra en el archivo requirido.
		
		//Agregar los CPT al menu categorias en la parte publica de wordpress
		add_filter('pre_get_posts', 'query_post_type');
			function query_post_type($query) {
			  if(is_category() || is_tag()) {
			    $post_type = get_query_var('post_type');
				if($post_type)
				    $post_type = $post_type;
				else
				    $post_type = array('post','libros','hemeroteca','revistas-cientificas','papers'); // replace cpt to your custom post type
			    $query->set('post_type',$post_type);
				return $query;
			    }
			}
		//MVC para Ayuda de Wordpress con respecto a CPT wordpress
		require_once(bicoci_plugin_dir.'/view/ComunicadoVista.php');
		$varAyudaLibro= new ComunicadoVista();
		$varAyudaLibro->RenderAyudaComunicado( );//Funcion que se encuentra en el archivo requirido.
		//Ordenar Visualmente los Comunicados
		require_once(bicoci_plugin_dir.'/model/OrdenarComunicadoModel.php');
		$scporder = new OrdenarComunicadoModel();

//Google Analytics
add_action('wp_footer', 'add_googleanalytics');
function add_googleanalytics() { ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-69850406-1', 'auto');
  ga('send', 'pageview');

</script>
<?php
	}//fin add_googleanalytics
}////fin Funcion LibroInit
/********************Fin Configuraciones extras*******************************************/

}//fin class ComunicadoController.
//Instaciar la clase para que los Libros se Desplieguen en la Admin Bar
$varMenu= new LibroController();
$varMenu->LibroInit();
?>