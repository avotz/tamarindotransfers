<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tamarindotransfers
 */

?>
	<button id="btn-menu-footer" class="btn-menu-footer">
	     Contact
	 </button>
	<div class="footer-nav">
	 <?php wp_nav_menu( array(
	             'theme_location' => 'secondary',
	             'menu_id' => 'secondary-menu',
	             'container'       => 'nav',
	            'container_class' => 'nav-menu',
	            'container_id'    => '',
	            'menu_class'      => 'nav-menu-ul',
	              ) 
	          ); 
	          ?>
		
		<!-- <div class="partners">
			<ul>
				<li><a href="#" title="Calitur"><img src="/img/logo-calitur.png" alt="calitur" /></a></li>
				<li><a href="#" title="Caturgua" ><img src="/img/logo-caturgua.png" alt="caturgua" /></a></li>
				<li><a href="#" title="I.C.T"><img src="/img/logo-ict.png" alt="I.C.T" /></a></li>
			</ul>
		</div> -->
	</div>
	<div class="copyright">
		copyright &copy; 2017 <a href="https://www.avotz.com" target="_blank" title="Avotz Webworks"><i class="icon-avotz"></i></a>
	</div>
	<div id="transfer-popup" class="request-popup white-popup mfp-hide mfp-with-anim">   

	    <?php echo do_shortcode('[contact-form-7 id="43" title="Book Transfer"]') ?>

	    <div class="request-popup-notes">
	    	
	    </div>

	</div>
	<div id="tour-popup" class="request-popup white-popup mfp-hide mfp-with-anim">               
	    <?php echo do_shortcode('[contact-form-7 id="71" title="Book Tour"]') ?>
	</div>

	

<?php wp_footer(); ?>

</body>
</html>
