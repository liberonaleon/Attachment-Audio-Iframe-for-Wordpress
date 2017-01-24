<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<!doctype html>
  <html class="no-js"  <?php language_attributes(); ?>>

  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
         
    <?php wp_head(); ?>
        
     

<body>

<?php $audio_attachment_url = wp_get_attachment_url( $audio_attachments[0]->ID ); ?>
<?php $parent = get_post_field( 'post_parent', $imgID);
$link = get_permalink($parent);
$titulo = get_the_title($parent); 
?>


<?php

// imagen audios
$thumb_id = get_post_thumbnail_id();
$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'large', true);
$thumb_url = $thumb_url_array[0];

?>


<?php
// imagen post
$current = $post->ID;
$parent = $post->post_parent;
$grandparent_get = get_post($parent);
$grandparent = $grandparent_get->post_parent;
 
$image = wp_get_attachment_image_src( get_post_thumbnail_id( $parent ),'large' ); ?>
 

 

<?php

//echo $thumb_url;
//echo $image[0];

if ( $thumb_url == 'http://www.rockandpop.cl/wp-includes/images/media/default.png'): 
   $img = $image[0];
else:
   $img = $thumb_url;
endif;
  ?>



<div id="main">
  <div class="player" style="background:url('<?php echo $img; ?>') no-repeat center center;">
    <div class="rp-logo-audio waves-effect waves-light">
    <a href="http://www.rockandpop.cl" target="_blank">
      <img src="http://www.rockandpop.cl/wp-content/themes/rockandpop-v6/assets/images/logo-menu.jpg">
      </a>
    </div>
    <a href="#modal">
    <div class="share">
     <i class="fa fa-share-alt" aria-hidden="true"></i>
    </div>
    </a>
    <div class="mask"></div>
    <ul class="player-info info-one">
      <li><?php the_title(); ?></li>
      <li>@rockandpop</li>
      <li id="duration_time"></li>
    </ul>
    <ul class="player-info info-two">
      <li><?php the_title(); ?></li>
      <li>@rockandpop</li>
      <li><span id="duration"></span><i> / <span id="duration_time_two"></span></i></li>
    </ul>
    <div id="play-button" class="unchecked">
      <i class="icon icon-play"></i>
    </div>
    <div class="control-row">
      <div class="waves-animation-one"></div>
      <div class="waves-animation-two"></div>
      <div id="pause-button">
        <i class="icon"></i>
      </div>
      <div class="seek-field">
        <input id="audioSeekBar" min="0" max="" step="1" value="0" type="range" oninput="audioSeekBar()" onchange="this.oninput()">
      </div>
      <div class="volume-icon">
        <i class="icon-volume-up"></i>
      </div>
      <div class="volume-field">
        <input type="range" min="0" max="100" value="100" step="1" oninput="audio.volume = this.value/100" onchange="this.oninput()">
      </div>
    </div>
  </div>
</div>



<style type="text/css">


</style>

<audio id="audio-player" ontimeupdate="SeekBar()" preload="auto" loop>
  <source src="<?php echo $audio_attachment_url; ?>" type="audio/mpeg">
</audio>

<div id="modal">
  <div class="modal-content">
    <div class="header">
      <h2><?php the_title(); ?></h2>
    </div>
    <div class="copy">
      <div class="share-audio">
        <?php if (!wp_is_mobile()): ?>
         <p style="float: left;">Compartir:</p>
        <?php else: ?>
         <p>Compartir:</p>
       <?php endif; ?>
       <ul>
        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $link; ?>" target="_blank">
        <li>
          <span class="fa-stack fa-lg">
          <i class="fa fa-circle fa-stack-2x"></i>
          <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
          </span>
       </li>
       </a>
        <a href="https://twitter.com/intent/tweet?text=<?php echo rawurlencode($titulo); ?>&via=rockandpop&url=<?php echo $link; ?>" target="_blank">
       <li>
          <span class="fa-stack fa-lg">
          <i class="fa fa-circle fa-stack-2x"></i>
          <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
        </span>
       </li>
      </a>
      <a href="whatsapp://send?text=<?php echo $titulo ?> – <?php echo urlencode($link); ?>" data-action="share/whatsapp/share">
       <li>
          <span class="fa-stack fa-lg">
          <i class="fa fa-circle fa-stack-2x"></i>
          <i class="fa fa-whatsapp fa-stack-1x fa-inverse"></i>
        </span>
       </li>
       </a>
       </ul>
       </div>
       <?php if (!wp_is_mobile()): ?>
       <p>Código iframe:</p>
       <xmp><iframe id="rpaudios" class="rpaudios" src="<?php the_permalink(); ?>" width="100%" height="375" allowscriptaccess="always" frameborder="0" scrolling="no" ></iframe></xmp>
       <?php endif; ?>
       <br>
       <a href="#">Cerrar</a> </div>
  </div>
  <div class="overlay"></div>
</div>


<?php wp_footer(); ?>


</body>
</html>

	<?php endwhile; ?>	
	<?php endif; ?>