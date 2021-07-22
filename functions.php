<?php

    /******************************************************************************
     Ajoute l'option "image mise en avant" dans le back-end de l'article
    ******************************************************************************/

    add_theme_support( 'post-thumbnails' );


/********************************************************************************
 * Charge les feuilles de style propres au thème.
 * Utilisation : add_action('wp_enqueue_scripts', 'monprefixe_charger_css_web');
*********************************************************************************/

function monprefixe_charger_css_web() {

    wp_enqueue_style( 'bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' );

    wp_enqueue_style( 'bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css' );

    wp_enqueue_style( 'mon-style', get_template_directory_uri() . '/style.css');

} 

add_action('wp_enqueue_scripts', 'monprefixe_charger_css_web');


/**********************************************************************************
  Charge les scripts propres au thème.
  Utilisation : add_action('wp_enqueue_scripts', 'monprefixe_charger_js_web');
***********************************************************************************/

function monprefixe_charger_js_web() {

    wp_enqueue_script( 'bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js');

} 

add_action('wp_enqueue_scripts', 'monprefixe_charger_js_web');


/********************************************************************************************************************
**********************************Register Custom Navigation Walker**************************************************
*********************************************************************************************************************/

/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'festival' ),
) );



/********************************************************************************************************************
***********************************************Création des widgets**************************************************
*********************************************************************************************************************/

add_action( 'widgets_init', 'nouvelle_zone_widgets_init' );

function nouvelle_zone_widgets_init() {

    register_sidebar( array(
        'name'          => 'Zone Footer 1',
        'id'            => 'footer_1',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="text-danger">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => 'Zone Footer 2',
        'id'            => 'footer_2',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="text-danger">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => 'Zone Footer 3',
        'id'            => 'footer_3',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="text-danger">',
        'after_title'   => '</h2>',
    ) );
}

/********************************************************************************************************************
***********************************************Custom Post Type**************************************************
*********************************************************************************************************************/


function wpm_custom_post_type() {
    //Dénominations du custom post type
    $labels = array(
        //Le nom au pluriel
        'name'          => _x( 'Films' , 'Post Type General Name'),
        //Nom au singulier
        'singular_name' => _x( 'Film' , 'Post Type Singular Name' ),
        // Le libellé affiché dans le menu
		'menu_name'           => __( 'Films'),
		// Les différents libellés de l'administration
		'all_items'           => __( 'Programmation'),
		'view_item'           => __( 'Voir la programmation'),
		'add_new_item'        => __( 'Ajouter un nouveau film'),
		'add_new'             => __( 'Ajouter'),
		'edit_item'           => __( 'Editer le film'),
		'update_item'         => __( 'Modifier le film'),
		'search_items'        => __( 'Rechercher un film'),
		'not_found'           => __( 'Non trouvée'),
		'not_found_in_trash'  => __( 'Non trouvée dans la corbeille'),
    );


    // On peut définir ici d'autres options pour notre custom post type
    $args = array(
		'label'               => __( 'Films'),
		'description'         => __( 'Programmation'),
		'labels'              => $labels,
        'menu_icon'           => 'dashicons-video-alt2',
		// On définit les options disponibles dans l'éditeur de notre custom post type ( un titre, un auteur...)
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		/* 
		* Différentes options supplémentaires
		*/
		'show_in_rest'        => true,
		'hierarchical'        => false,
		'public'              => true,
		'has_archive'         => true,
		'rewrite'			  => array( 'slug' => 'films'),

	);

    register_post_type( 'films', $args );
};

//Afficher dans Wordpress
add_action( 'init' , 'wpm_custom_post_type' );



function wpm_add_taxonomies() {
// Taxonomie Année

// On déclare ici les différentes dénominations de notre taxonomie qui seront affichées et utilisées dans l'administration de WordPress
$labels_annee = array(
    'name'              			=> _x( 'Années', 'taxonomy general name'),
    'singular_name'     			=> _x( 'Année', 'taxonomy singular name'),
    'search_items'      			=> __( 'Chercher une année'),
    'all_items'        				=> __( 'Toutes les années'),
    'edit_item'         			=> __( 'Editer l année'),
    'update_item'       			=> __( 'Mettre à jour l année'),
    'add_new_item'     				=> __( 'Ajouter une nouvelle année'),
    'new_item_name'     			=> __( 'Valeur de la nouvelle année'),
    'separate_items_with_commas'	=> __( 'Séparer les réalisateurs avec une virgule'),
    'menu_name'         => __( 'Année'),
);

$args_annee = array(
// Si 'hierarchical' est défini à false, notre taxonomie se comportera comme une étiquette standard
    'hierarchical'      => false,
    'labels'            => $labels_annee,
    'show_ui'           => true,
    'show_in_rest'      => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array( 'slug' => 'annees' ),
);

register_taxonomy( 'annees', 'films', $args_annee );


// Taxonomie Réalisateurs
$labels_realisateurs = array(
    'name'                       => _x( 'Réalisateurs', 'taxonomy general name'),
    'singular_name'              => _x( 'Réalisateur', 'taxonomy singular name'),
    'search_items'               => __( 'Rechercher un réalisateur'),
    'popular_items'              => __( 'Réalisateurs populaires'),
    'all_items'                  => __( 'Tous les réalisateurs'),
    'edit_item'                  => __( 'Editer un réalisateur'),
    'update_item'                => __( 'Mettre à jour un réalisateur'),
    'add_new_item'               => __( 'Ajouter un nouveau réalisateur'),
    'new_item_name'              => __( 'Nom du nouveau réalisateur'),
    'separate_items_with_commas' => __( 'Séparer les réalisateurs avec une virgule'),
    'add_or_remove_items'        => __( 'Ajouter ou supprimer un réalisateur'),
    'choose_from_most_used'      => __( 'Choisir parmi les plus utilisés'),
    'not_found'                  => __( 'Pas de réalisateurs trouvés'),
    'menu_name'                  => __( 'Réalisateurs'),
);

$args_realisateurs = array(
    'hierarchical'          => false,
    'labels'                => $labels_realisateurs,
    'show_ui'               => true,
    'show_in_rest'			=> true,
    'show_admin_column'     => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var'             => true,
    'rewrite'               => array( 'slug' => 'realisateurs' ),
);

register_taxonomy( 'realisateurs', 'films', $args_realisateurs );

};

add_action( 'init', 'wpm_add_taxonomies', 0 );