<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array(  ) );
        wp_enqueue_script( 'script', get_stylesheet_directory_uri() . '/js/clipboard.min.js', array (), 1.1, true);
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );

function enqueue_our_required_stylesheets(){
    wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
}
add_action('wp_enqueue_scripts','enqueue_our_required_stylesheets');


function facetwp_query_args_autor( $query_args, $class ) {
    global $post;
    if ( 'material_autor' == $class->ajax_params['template'] ) {
        $query_args['meta_query'][0][ 'value'] = $post->ID;
    }
    return $query_args;
}
add_filter( 'facetwp_query_args', 'facetwp_query_args_autor', 10, 2 );

function facetwp_query_args_organisation( $query_args, $class ) {

    global $post;
    if ( 'material_organisation' == $class->ajax_params['template'] ) {
        $query_args['meta_query'][0][ 'value'] = $post->ID;
    }
    return $query_args;
}
add_filter( 'facetwp_query_args', 'facetwp_query_args_organisation', 10, 2 );


function facetwp_query_args_material_verweise( $query_args, $class ) {
    global $post;
    if ( 'material_verweise' == $class->ajax_params['template'] ) {
        $query_args['post__in'] = Materialpool_Material::get_verweise_ids();
    }
    return $query_args;
}
add_filter( 'facetwp_query_args', 'facetwp_query_args_material_verweise', 10, 2 );

