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

if ( !function_exists( 'load_rw_materialpool_js' ) ):
    function load_rw_materialpool_js() {
        wp_enqueue_script( 'load_rw_facet_js', get_stylesheet_directory_uri() . '/js/facet_labels.js', array (), 0.1, true);
        wp_enqueue_script( 'load_toc_js', get_stylesheet_directory_uri() . '/js/jquery.toc.js', array (), 0.1, true);
        wp_enqueue_script( 'load_rw_materialpool_js', get_stylesheet_directory_uri() . '/js/materialpool.js', array (), 0.1, true);
    }
endif;
add_action( 'wp_enqueue_scripts', 'load_rw_materialpool_js', 10 );

function enqueue_our_required_stylesheets(){
    wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
}
add_action('wp_enqueue_scripts','enqueue_our_required_stylesheets');

function facetwp_query_args_autor( $query_args, $class ) {
    global $post;

    if ( defined('REST_REQUEST') && REST_REQUEST ) {
          if ( 'material_autor' == $class->ajax_params['template'] ) {
            $autor =  get_page_by_path( str_replace('autor/','',$class->ajax_params['http_params']['uri']) , OBJECT, 'autor' );
            $query_args['meta_query'][0][ 'value'] = (string)$autor->ID;
        }
    } else {
        if ( 'material_autor' == $class->ajax_params['template'] ) {
            $query_args['meta_query'][0][ 'value'] = (string)$post->ID;
        }
    }

    return $query_args;
}

add_filter( 'facetwp_query_args', 'facetwp_query_args_autor', 10, 2 );

function facetwp_query_args_organisation( $query_args, $class ) {

    if (defined('REST_REQUEST') && REST_REQUEST) {

        if ('material_organisation' == $class->ajax_params['template']) {
            $organisation =  get_page_by_path( str_replace('organisation/','',$class->ajax_params['http_params']['uri']) , OBJECT, 'organisation' );
            $query_args['meta_query'][0][ 'value'] = (string)$organisation->ID;
        }
    } else {
        global $post;
        if ('material_organisation' == $class->ajax_params['template']) {
            $query_args['meta_query'][0]['value'] = $post->ID;
        }
    }
    return $query_args;
}
add_filter( 'facetwp_query_args', 'facetwp_query_args_organisation', 10, 2 );


function facetwp_query_args_material_verweise( $query_args, $class ) {
    global $post;
    if ('material_verweise' == $class->ajax_params['template']) {
        $query_args['post__in'] = Materialpool_Material::get_verweise_ids();
    }
    return $query_args;
}
add_filter( 'facetwp_query_args', 'facetwp_query_args_material_verweise', 10, 2 );



function facetwp_query_args_themenseiten( $query_args, $class ) {
    global $post;
    global $themenseite_material_id_list;


    if (defined('DOING_AJAX') && DOING_AJAX) {
        $material_id_list = array();

        if ('thema' == $class->ajax_params['template']) {
            $themenseite =  get_page_by_path( str_replace('themenseite/','',$class->ajax_params['http_params']['uri']) , OBJECT, 'themenseite' );

        }
        foreach(Materialpool_Themenseite::get_gruppen($themenseite->ID) as $gruppe){
            $id_list = explode( ',', $gruppe[ 'auswahl'] );
            $material_id_list = array_merge($material_id_list, $id_list);
        }

        $query_args['post__in'] = $material_id_list;


    }elseif ($post->post_type == "themenseite" && !is_embed() ){
        $query_args['post__in'] = $themenseite_material_id_list;
    }

    return $query_args;
}
add_filter( 'facetwp_query_args', 'facetwp_query_args_themenseiten', 10, 2 );



function my_facetwp_facet_html( $output, $params ) {
    if ( 'alpika' == $params['facet']['name'] ) {
        $output = str_replace('>1 <','>aus den Instituten <',$output);
    }
    return $output;
}

add_filter( 'facetwp_facet_html', 'my_facetwp_facet_html', 10, 2 );


/*add accordeons to [accordion].<h3>..[/accordion] shortcode*/

function enqueue_required_jquery_scripts(){
    wp_enqueue_style('accordion', "//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css");
    wp_enqueue_script( 'jquery-ui', '//code.jquery.com/ui/1.12.1/jquery-ui.js', array (), 1.1, true);

}
add_action('wp_enqueue_scripts','enqueue_required_jquery_scripts');


function add_h3_accordion($description, $post){
    if ( is_single()){

        $acn_content = '';
/*
        preg_match_all('/\[accordion\].*\[\/accordion\]/es',$description,$accs);

        for($a=0; $a<count($accs);$a++){

            $acc_content = $accs[0][$a];


            $acn_content = str_replace('</h3>','</h3><div>',$acc_content);
            $acn_content = str_replace('<h3','</div><h3',$acn_content);

            $start = strpos($acn_content,'<h3');

            //$acn_content = '<div class="accordion">'.substr($acn_content,$start).'</div></div>';
            $acn_content = substr($acn_content,$start).'</div>';

            $description= str_replace($acc_content,$acn_content,$description);


        }
*/
        $description = str_replace('</h3>','</h3><div>',$description);
        $description = str_replace('<h3','</div><h3',$description);


        $description = preg_replace('/<p>\[accordion\]<\/p>\W*<\/div><h3/','</div><div class="accordion"><h3',$description);
        $description = preg_replace('/<p>\[accordion\]<\/p>/','',$description);
        $description = str_replace('<p>[/accordion]</p>','</div>',$description);
        $description = '<div>'.$description  .'</div>';

        //if(count($accs)>0){

            $description .= "
             <script>
                  jQuery( function() {
                    jQuery( '.accordion' ).accordion({
                      collapsible: true,
                      heightStyle: 'content',
                      active:false,
                      header:'h3'
                    });
                  } );
             </script>
            
            ";

        //}
    }
    return $description;
}
add_filter( 'materialpool_material_description',add_h3_accordion, 10 ,2 );

function frontend_ajax() {
    echo '<script type = "text/javascript" >';
    echo 'var ajaxurl = "'. admin_url('admin-ajax.php') . '"' ;
    echo '</script >';
}

if ( !is_admin() ) {
    add_action( 'wp_head', 'frontend_ajax');
}

function catch_thema_image() {
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches [1] [0];

    if(empty($first_img)){ //Defines a default image
        $first_img = get_stylesheet_directory_uri() . '/assets/default.jpg';
    }
    return $first_img;
}