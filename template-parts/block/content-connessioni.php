<?php
/**
 * Block Name: Connessioni
 *
 * This is the template that displays the woocommerce product categories
 */
   if( !empty($block['className']) ) {
    $className = ' ' . $block['className'];
  }
?>
<div class="<?php echo $className; ?>">
  	<div class="ConnessioniContainer">
  		<?php
  		global $post;

      $Target = get_field('target');
      $TipoConnessione = get_field('tipo_di_connessione');
      $TipoFibra = get_field('tipo_fibra');
      $MostraDettagliAzienda = get_field('mostra_dettagli_azienda');
      if ($TipoFibra != ''){
        $args = array(
    			'post_type' => 'connessione',
          'meta_query'	=> array(
          		'relation'		=> 'AND',
          		array(
          			'key'	 	=> 'target',
          			'value'	  	=>$Target,
          			'compare' 	=> 'IN',
          		),
          		array(
          			'key'	  	=> 'tipo_di_connessione',
          			'value'	  	=> $TipoConnessione,
          			'compare' 	=> '=',
          		),
              array(
          			'key'	  	=> 'tipo_fibra',
          			'value'	  	=> $TipoFibra,
          			'compare' 	=> '=',
          		),
          	),
    			'post_status' => 'publish',
    			'posts_per_page' => -1,
    			'orderby' => 'title',
    			'order' => 'ASC'
    		);
      } else {
        $args = array(
    			'post_type' => 'connessione',
          'meta_query'	=> array(
          		'relation'		=> 'AND',
          		array(
          			'key'	 	=> 'target',
          			'value'	  	=>$Target,
          			'compare' 	=> 'IN',
          		),
          		array(
          			'key'	  	=> 'tipo_di_connessione',
          			'value'	  	=> $TipoConnessione,
          			'compare' 	=> '=',
          		),
          	),
    			'post_status' => 'publish',
    			'posts_per_page' => -1,
    			'orderby' => 'title',
    			'order' => 'ASC'
    		);
      }



      $loop = new WP_Query( $args );
      while ( $loop->have_posts() ) : $loop->the_post(); ?>

      <div class="SingleConn">
        <?php
          $Thumb = get_field('immagine_connessione',get_the_ID());
        ?>
        <div class="SingleConnThumb" style="background-image:url('<?php echo $Thumb;?>')">
        </div>
        <div class="SingleConnInnerContainer">
          <div class="SingleConnTitle"><?php the_title(); ?></div>
          <div class="SingleNewsDesc"><?php the_field('descrizione_breve',get_the_ID()); ?></div>
          <?php
            $OriginalPermalink = get_the_permalink();
            if ($MostraDettagliAzienda == 1){
              $Permalink = ''.$OriginalPermalink.'?azienda=1';
            } else {
              $Permalink = $OriginalPermalink;
            }
           ?>
          <a class="SingleNewsLink" href="<?php echo $Permalink;?>">Vai alla connessione</a>
        </div>
      </div>

      <?php endwhile;

      wp_reset_postdata();
      ?>
  	</div>
</div>
