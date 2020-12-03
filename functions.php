<?php
/**
 * Asoloweb Custom functions
 * @subpackage Asoloweb Theme
 * @since 1.0
 */


 //Rimuovo barra top-menu
 add_filter('show_admin_bar', '__return_false');


 //Admin CSS

function admin_style() {
	wp_enqueue_style('admin-styles', get_template_directory_uri().'/css/admin.css');
}

add_action('admin_enqueue_scripts', 'admin_style');

add_filter( 'woocommerce_subcategory_count_html', '__return_null' );



//POPUP
add_filter( 'wc_add_to_cart_message_html', 'custom_add_to_cart_message_html', 10, 2 );
function custom_add_to_cart_message_html( $message, $products ) {

    $message = '
		<div class="CartModal">
			<div class="CartModalTitle">Prodotto aggiunto al carrello!</div>
			<p>Cosa vuoi fare ora?</p>
			<div class="ModalButtonContainer">
				<a href="#" class="ModalButton closeModal">Continua gli acquisti</a>
				<a href="'.wc_get_cart_url().'" class="ModalButton ModalButtonGreen">Vai al carrello</a>
			</div>
		</div>
	';

	return $message;
}



 // NASCONDO TUTTI GLI AGGIORNAMENTI CORE e PLUGIN

function remove_core_updates(){
global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
}
add_filter('pre_site_transient_update_core','remove_core_updates');
add_filter('pre_site_transient_update_plugins','remove_core_updates');
add_filter('pre_site_transient_update_themes','remove_core_updates');


 // MENU
function MainMenu() {
  register_nav_menus(
    array(
		'main-menu' => __( 'Menu principale' ),
    'main-menu-top' => __( 'Menu superiore' ),
		'menu-mobile' => __( 'Menu Mobile' ),
		'footer-col-1' => __( 'Footer Colonna 1' ),
		'footer-col-2' => __( 'Footer Colonna 2' ),
		'footer-col-3' => __( 'Footer Colonna 3' ),
    )
  );
}
add_action( 'init', 'MainMenu' );



// Funzione che rimuove UL e LI dal menu
class Description_Walker extends Walker_Nav_Menu
{
function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 )
    {
        $classes = empty($item->classes) ? array () : (array) $item->classes;
        $class_names = join(' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
        !empty ( $class_names ) and $class_names = ' class="'. esc_attr( $class_names ) . '"';
        $output .= "";
        $attributes  = '';
        !empty( $item->attr_title ) and $attributes .= ' title="'  . esc_attr( $item->attr_title ) .'"';
        !empty( $item->target ) and $attributes .= ' target="' . esc_attr( $item->target     ) .'"';
        !empty( $item->xfn ) and $attributes .= ' rel="'    . esc_attr( $item->xfn        ) .'"';
        !empty( $item->url ) and $attributes .= ' href="'   . esc_attr( $item->url        ) .'"';
        $title = apply_filters( 'the_title', $item->title, $item->ID );
        $item_output = $args->before
        . "<a $attributes $class_names>"
        . $args->link_before
        . $title
        . '</a>'
        . $args->link_after
        . $args->after;
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}


// Option page


if( function_exists('acf_add_options_page') ) {

	acf_add_options_page('Opzioni');
}


// REGISTRO IL CUSTOM POST TYPE UTENTIDOWNLOAD

// Register Custom Post Type

function register_connessione_post_type() {

	$labels = array(
		'name'                => 'Connessioni',
		'singular_name'       => 'Connessione',
		'menu_name'           => 'Connessioni',
		'parent_item_colon'   => '',
		'all_items'           => 'Tutte le connessioni',
		'view_item'           => 'Visualizza connessione',
		'add_new_item'        => 'Aggiungi connessione',
		'add_new'             => 'Aggiungi connesione',
		'edit_item'           => 'Modifica connessione',
		'update_item'         => 'Aggiorna connessione',
		'search_items'        => 'Ricerca connessione',
		'not_found'           => 'Connessione non trovata',
		'not_found_in_trash'  => 'Nessuna connessione trovata',
	);
	$rewrite = array(
		'slug'                => 'connessione',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => 'Connessione',
		'description'         => 'Connessione',
		'labels'              => $labels,
		'supports'            => array( 'title', 'custom-fields' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_icon' 			  => 'dashicons-rest-api',
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'post',
	);
	register_post_type( 'connessione', $args );

}
// Hook into the 'init' action
add_action( 'init', 'register_connessione_post_type', 0 );

/* */

function register_promozione_post_type() {

	$labels = array(
		'name'                => 'Promozioni',
		'singular_name'       => 'Promozione',
		'menu_name'           => 'Promozioni',
		'parent_item_colon'   => '',
		'all_items'           => 'Tutte le promozioni',
		'view_item'           => 'Visualizza promozione',
		'add_new_item'        => 'Aggiungi promozione',
		'add_new'             => 'Aggiungi promozione',
		'edit_item'           => 'Modifica connessione',
		'update_item'         => 'Aggiorna promozione',
		'search_items'        => 'Ricerca promozione',
		'not_found'           => 'Promozione non trovata',
		'not_found_in_trash'  => 'Nessuna promozione trovata',
	);
	$rewrite = array(
		'slug'                => 'promozioni',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => 'Promozione',
		'description'         => 'Promozione',
		'labels'              => $labels,
		'supports'            => array( 'title', 'custom-fields' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_icon' 			  => 'dashicons-buddicons-groups',
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'post',
	);
	register_post_type( 'promozione', $args );

}

// Hook into the 'init' action
add_action( 'init', 'register_promozione_post_type', 0 );


/* abilito SVG*/

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');



// REGISTRO I VARI BLOCCHI PERSONALIZZATI
add_action('acf/init', 'my_acf_init');
function my_acf_init() {

	// check function exists
	if( function_exists('acf_register_block') ) {

		// Registro il blocco Titolo Mix
		acf_register_block(array(
			'name'				=> 'titolo-mix',
			'title'				=> __('Testo e grafica'),
			'description'		=> __('Blocco Titolo e immagine'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'helioos-blocks',
			'icon'				=> 'align-pull-right',
			'keywords'			=> array( 'titolo' ),
		));

		acf_register_block(array(
			'name'				=> 'connessioni',
			'title'				=> __('Connessioni'),
			'description'		=> __('Connessioni Internet'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'helioos-blocks',
			'icon'				=> 'networking',
			'keywords'			=> array( 'connessioni' ),
		));

		acf_register_block(array(
			'name'				=> 'blocchetto',
			'title'				=> __('Blocchetto'),
			'description'		=> __('Blocchetti'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'helioos-blocks',
			'icon'				=> 'grid-view',
			'keywords'			=> array( 'blocchetto' ),
		));

		acf_register_block(array(
			'name'				=> 'banner',
			'title'				=> __('Banner'),
			'description'		=> __('Banner'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'helioos-blocks',
			'icon'				=> 'align-full-width',
			'keywords'			=> array( 'Banner' ),
		));

		acf_register_block(array(
			'name'				=> 'testo-immagine',
			'title'				=> __('Testo e immagine'),
			'description'		=> __('Testo e immagine'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'helioos-blocks',
			'icon'				=> 'id',
			'keywords'			=> array( 'Testo immagine' ),
		));
	}
}


// RENDERIZZO I BLOCCHI
function my_acf_block_render_callback( $block ) {
	// convert name ("acf/testimonial") into path friendly slug ("testimonial")
	$slug = str_replace('acf/', '', $block['name']);
	// include a template part from within the "template-parts/block" folder
	if( file_exists( get_theme_file_path("/template-parts/block/content-{$slug}.php") ) ) {
		include( get_theme_file_path("/template-parts/block/content-{$slug}.php") );
	}
}

// NASCONDO BLOCCHI NON UTILIZZATI

add_filter( 'allowed_block_types', 'misha_allowed_block_types' );

function misha_allowed_block_types( $allowed_blocks ) {

	return array(
		'core/heading',
		'core/columns',
    'core/shortcode',
		'acf/titolo-mix',
		'acf/connessioni',
		'acf/banner',
		'acf/blocchetto',
		'acf/testo-immagine',
		'core/freeform',
		'core/image',
		'core/spacer',
		'core/paragraph',
		'core/block'
		);
}
