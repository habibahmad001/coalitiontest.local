<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CT_Custom
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
	<?php wp_head(); ?>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/css/custom.css'; ?>">
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ct-custom' ); ?></a>

	<!-- <header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$ct_custom_description = get_bloginfo( 'description', 'display' );
			if ( $ct_custom_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $ct_custom_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
		</div>

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'ct-custom' ); ?></button>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );
			?>
		</nav>
	</header> -->



<header id="header">
	<section class="top-bar">
		<div class="container">
			<div class="row top-bar-align">
				<div class="col-6 text-left top-bar-dark">CALL US NOW! <span class="top-bar-white">385.154.11.28.35</span></div>
				<div class="col-6 text-right top-bar-dark">LOGIN <span class="top-bar-white">SIGNUP</span></div>
			</div>
		</div>
	</section>
    <section class="header-area">
    	<div class="container">
	      <div class="row">
	        <div class="col-6">
	          <div class="site-branding">
				<?php
					global $wpdb;
					$table_name = $wpdb->prefix . 'home_setting_table';
					$reslogo = $wpdb->get_results( "SELECT * FROM $table_name where id=1" );
					if(isset($reslogo) && $reslogo[0]->logo != "") {
						echo '<img src="./wp-content/uploads/icons/images/'.$reslogo[0]->logo.'" width="45px"/>';
					} else {
						if ( is_front_page() && is_home() ) :
						?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?> <span class="logo-dark">LOGO</span></a></h1>
							<?php
						else :
							?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?><span class="logo-dark">LOGO</span></a></p>
							<?php
						endif;
					}
					$ct_custom_description = get_bloginfo( 'description', 'display' );
					if ( $ct_custom_description || is_customize_preview() ) :
						?>
						<p class="site-description"><?php echo $ct_custom_description; /* WPCS: xss ok. */ ?></p>
					<?php endif; ?>
				</div>
	        </div>
	        <div class="col-6 menu-align">
	          <nav id="site-navigation" class="main-navigation">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					) );
					?>
				</nav>
	        </div>
	      </div>  
	    </div>      
    </section>
</header>

	<div id="content" class="container site-content">
