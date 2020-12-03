<?php
	/**
	 * Template Name: Single Connessione
	 */
 	get_header();
	the_post();

  $MostraDettagliAzienda = $_GET['azienda'];
 ?>


<div class="SiteWidth ConnPage">
  <div class="ConnBanner" style="background-image:url('<?php the_field('immagine_connessione'); ?>');"></div>
  <div class="ConnDesc">
    <div class="ConnTitle">CONNESSIONE <?php the_title(); ?></div>
    <div><?php the_field('descrizione_estesa'); ?></div>
    <div class="ConnCTAContainer">
      <a class="MainButtonCTA" href="/contatti">Attiva ora il contratto</a>
    </div>
  </div>
  <div class="BlockBlocchetto ConnBlocchetto">
  	<div class="SiteWidth">
  		<div class="Block_prod_container">
  				<div id="BlocchettoList">
              <!-- Single Block -->
  						<div class="BlockSingleBlocchetto">
  							<div class="BlockSingleBlocchettoImage">
  								<img src="<?php bloginfo('template_url'); ?>/img/DownloadIcon.png"/>
  							</div>
  							<div class="BlockSingleBlocchettoTitle">
  								Velocità Download
  							</div>
  							<div class="BlockSingleBlocchettoDesc">
  								<?php the_field('download'); ?> Mbps
  							</div>
  						</div>
              <!-- Fine single -->
              <!-- Single Block -->
  						<div class="BlockSingleBlocchetto">
  							<div class="BlockSingleBlocchettoImage">
  								<img src="<?php bloginfo('template_url'); ?>/img/UploadIcon.png"/>
  							</div>
  							<div class="BlockSingleBlocchettoTitle">
  								Velocità Upload
  							</div>
  							<div class="BlockSingleBlocchettoDesc">
  								<?php the_field('upload'); ?> Mbps
  							</div>
  						</div>
              <!-- Fine single -->
              <!-- Single Block -->
  						<div class="BlockSingleBlocchetto">
  							<div class="BlockSingleBlocchettoImage">
  								<img src="<?php bloginfo('template_url'); ?>/img/Attivazione_icon.png"/>
  							</div>
  							<div class="BlockSingleBlocchettoTitle">
  								Attivazione
  							</div>
  							<div class="BlockSingleBlocchettoDesc">
                  <?php
                  if ($MostraDettagliAzienda == 1){
                    the_field('attivazione_azienda');
                  } else {
                    the_field('prezzo');
                  }?> €
  							</div>
  						</div>
              <!-- Fine single -->
              <!-- Single Block -->
  						<div class="BlockSingleBlocchetto">
  							<div class="BlockSingleBlocchettoImage">
  								<img src="<?php bloginfo('template_url'); ?>/img/Icon_prezzo.png"/>
  							</div>
  							<div class="BlockSingleBlocchettoTitle">
  								Canone mensile
  							</div>
  							<div class="BlockSingleBlocchettoDesc">
                  <?php
                  if ($MostraDettagliAzienda == 1){
                    the_field('prezzo_azienda');
                  } else {
                    the_field('prezzo');
                  }?> €
  							</div>
  						</div>
              <!-- Fine single -->
  				</div>
          <div class="LabelIva">
            <?php
              $Target = get_field('target');
              if ($Target == 'casa'){
                echo 'Tutti i prezzi sono IVA inclusa';
              } else {
                echo 'Tutti i prezzi sono IVA esclusa';
              }
            ?>
          </div>
  		</div>
  	</div>
  </div>
  <?php
    $TipoConnessione = get_field('tipo_di_connessione');
    if ($TipoConnessione == 'wifi'){?>
  <!--- Come funziona WiFi -->
  <div class="SiteWidth <?php echo $className;?>">
  	<div class="BlockMix BlockMixAlign<?php the_field('allineamento');?>">
  		<div class="BlockMixTextContainer">
  			<div>
  				<h1><?php the_field('titolo_installazione', 'option'); ?></h1>
  				<p><?php the_field('desc_installazione', 'option'); ?></p>
  			</div>
  			<div class="BlockMixButtonContainer">
  				<a class="MainButtonCTA" href="<?php the_field('link_pulsante');?>">Scopri come funziona il servizio</a>
  			</div>
  		</div>
  		<div>
  			<div class="BlockMixAnimation" style="background-image: url('http://develop.prometeo.biz/helioos/wp-content/uploads/2020/12/BaclBlock.jpg');">
  				<div class="BlockAnimationImage aos-scroll-flip" style="background-image:url('<?php bloginfo('template_url'); ?>/img/Install_home.png');"></div>
  			</div>
  		</div>
  	</div>
  </div>
<?php } ?>
  <!-- Dettagli -->
  <h1>Dettagli connessione </h1>
  <div class="ConnTable HalfSiteWidth aos-scroll">
      <?php
      if ($MostraDettagliAzienda == 1){
        $table = get_field( 'tabella_azienda' );
      } else {
        $table = get_field( 'tabella' );
      }

      if ( ! empty ( $table ) ) {

          echo '<table border="0">';

              if ( ! empty( $table['caption'] ) ) {

                  echo '<caption>' . $table['caption'] . '</caption>';
              }

              if ( ! empty( $table['header'] ) ) {

                  echo '<thead>';

                      echo '<tr>';

                          foreach ( $table['header'] as $th ) {

                              echo '<th>';
                                  echo $th['c'];
                              echo '</th>';
                          }

                      echo '</tr>';

                  echo '</thead>';
              }

              echo '<tbody>';

                  foreach ( $table['body'] as $tr ) {

                      echo '<tr>';

                          foreach ( $tr as $td ) {

                              echo '<td>';
                                  echo $td['c'];
                              echo '</td>';
                          }

                      echo '</tr>';
                  }

              echo '</tbody>';

          echo '</table>';
      }
      ?>
  </div>
  <div class="ConnTable HalfSiteWidth aos-scroll">
      <?php
      if ($MostraDettagliAzienda == 1){
        $table = get_field( 'tabella_extra' );
      } else {
        $table = get_field( 'tabella' );
      }

      if ( ! empty ( $table ) ) {

          echo '<table border="0">';

              if ( ! empty( $table['caption'] ) ) {

                  echo '<caption>' . $table['caption'] . '</caption>';
              }

              if ( ! empty( $table['header'] ) ) {

                  echo '<thead>';

                      echo '<tr>';

                          foreach ( $table['header'] as $th ) {

                              echo '<th>';
                                  echo $th['c'];
                              echo '</th>';
                          }

                      echo '</tr>';

                  echo '</thead>';
              }

              echo '<tbody>';

                  foreach ( $table['body'] as $tr ) {

                      echo '<tr>';

                          foreach ( $tr as $td ) {

                              echo '<td>';
                                  echo $td['c'];
                              echo '</td>';
                          }

                      echo '</tr>';
                  }

              echo '</tbody>';

          echo '</table>';
      }
      ?>
  </div>
  <div class="ConnCTABanner aos-scroll">
    <div class="ConnCTABannerInner">
      <h1>Scopri se la tua abitazione è coperta dal servizio Helioos WiFi</h1>
      <p>Inserisci il tuo indirizzo e ti diremo con esattezza se la tua abitazione è coperta dal servizio internet Helioos WiFi</p>
    </div>
    <div class="ConnCTABannerInner">
      <?php echo do_shortcode( '[contact-form-7 id="366" title="Richiedi Coperturra"]' );?>
    </div>
  </div>
</div>

<?php get_footer(); ?>
