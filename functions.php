<?php 

//agrega los assets al iframe del audio
function audio_assets() {
    if (is_attachment()):

    wp_enqueue_style( 'normalize', 'https://cdnjs.cloudflare.com/ajax/libs/normalize/4.2.0/normalize.min.css', array(), '', 'all' );
    wp_enqueue_style( 'waves-css', get_template_directory_uri() . '/vendor/css/waves.css', array(), '0.7.4', 'all' );
    wp_enqueue_style( 'fontello',  get_template_directory_uri() . '/vendor/css/fontello.css', array(), '', 'all' );
    wp_enqueue_style( 'modal-css', get_template_directory_uri() . '/vendor/css/modal.css', array(), '', 'all' );
    wp_enqueue_style( 'all-audio-css', get_template_directory_uri() . '/vendor/css/all.css', array(), '1.0', 'all' );

    wp_enqueue_script( 'audio-jquery', 'https://code.jquery.com/jquery-2.1.1.min.js', array(), '2.1.1', true );
    wp_enqueue_script( 'osom', 'https://use.fontawesome.com/1d0e62d4e0.js', array(), '4.6.3', true );
    wp_enqueue_script( 'waves', get_template_directory_uri() . '/vendor/js/waves.js', array(), '', true );
    wp_enqueue_script( 'audio-js', get_template_directory_uri() . '/vendor/js/all.js', array(), '', true );

   endif;

}
add_action( 'wp_enqueue_scripts', 'audio_assets' );



// reemplaza los attached audios por el nuevo player
add_filter( 'media_send_to_editor', 'audio_rp', 20, 3 );
function audio_rp( $html, $id, $attachment ){
	$output = '';
	$post = get_post( $id );
	if ( 'audio/mpeg' == $post->post_mime_type ) {
        $output .= '<iframe id="rpaudios" class="rpaudios" src="'.$attachment[url].'"  height="375" allowscriptaccess="always" frameborder="0" scrolling="no" ></iframe>';
		return $output;
	} else {
		return $html;
	}
}

 ?>


