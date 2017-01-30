<?php
/**
 * Created by PhpStorm.
 * User: Joachim
 * Date: 29.01.2017
 * Time: 18:25
 */
/* replace in viewerjs-plugin.php line 135 ff.*/
function viewerjs_shortcode_handler($args) {
    global $viewerjs_plugin_url;
    $document_url = home_url().'/?vsviewer_url='.$args[0];
    $options = get_option('ViewerJS_PluginSettings');
    $iframe_width = $options['width'];
    $iframe_height = $options['height'];
    return "<iframe src=\"$viewerjs_plugin_url" .
        '#' . $document_url .'" '.
        "width=\"$iframe_width\" ".
        "height=\"$iframe_height\" ".
        'style="border: 1px solid black; border-radius: 5px;" '.
        'webkitallowfullscreen="true" '.
        'mozallowfullscreen="true"></iframe>
			<p class="viewerjsurlmeta">Quelle: <span class="viewerjsurl">'.$args[0].'</span></p>';
}
add_shortcode('viewerjs', 'viewerjs_shortcode_handler');


function get_crossdomain_viewer_url(){


    global $wp_version;

    if(isset($_GET['vsviewer_url'])){
        $url = $_GET['vsviewer_url'];


        //@todo check url in materialpool

        $file_name=substr (strrchr ($url, "/"), 1);

        $args = array(
            'user-agent'  => 'rpi-virtuell/' . $wp_version . '; ' . home_url(),
        );
        $response = wp_remote_get( $url, $args );
        $headers = wp_remote_retrieve_headers($response);

        $ct = $headers['content-type'];

        if( is_array($response) ) {

            header("Content-type:$ct");
            header("Content-Disposition:inline;filename='$file_name'");
            print $response['body'];
            die();
        }
    }
}
add_action( 'init', 'get_crossdomain_viewer_url' );