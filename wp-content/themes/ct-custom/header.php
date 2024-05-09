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
	<style type="text/css">
		section.header-area {
		    min-height: 110px;
		    background: #f9f9f9;
		    display: flex;
		    align-items: center;
		}

		p.site-title a {
		    font-size: 30px;
		    color: #000;
		}

		.menu-align {
		    display: flex;
		    align-items: center;
		}

		.site-branding {
		    display: flex;
		    align-items: center;
		}

		p.site-title {
		    margin: inherit;
		}
		.menu li {
		    padding: 0 3%;
		}

		.menu li a {
		    color: #000;
		}

		.top-bar {
		    min-height: 35px;
		    background-color: #ff6200;
		}
		.top-bar-align {
		    display: flex;
		    align-items: center;
		    height: 35px;
		}

		span.top-bar-white {
		    color: #fff;
		    margin-left: 3%;
		}
		.top-bar-dark {
			color: #ce3f00;
		}
		.logo-dark {
			color: #ff6200;
		}
		ul.sub-menu {
		    background-color: #fff;
		    padding: 7%;
		}

		ul.sub-menu li {
		    margin: 2% 0;
		}

		section.breadgrum-section {
		    margin-top: 50px;
		}

		.page-title {
		    margin-top: 55px;
		    font-size: 25px;
		    color: #ff6200;
		    font-weight: bold;
		}
		.page-post-content {
		    margin-top: 20px;
		}
		.twocols {
		    width: 100%;
		}
		.twocols input {
		    width: 100%;
		}

		.onecol {
		    width: 48%;
		}

		.onecol input {
		    width: 100%;
		}
		.adjust-cols {
			display: flex;
			justify-content: space-between;
		}
		.twocols p {
		    margin-bottom: 5px;
		}

		.twocols input, .onecol input, .twocols textarea {
		    background-color: #f6f6f6;
		    padding: 1% 0 1% 3%;
		}
		.inputbtn {
		    width: 22% !important;
		    min-height: 35px;
		    font-size: 17px !important;
		    font-weight: 600;
		    background-color: #ff6200 !important;
		    color: #fff !important;
		}

		.frm-heading {
		    margin-top: 55px;
		    font-size: 25px;
		    color: #e6884e;
		    border-bottom: 4px solid #0c0c0c;
		    width: 100%;
		    padding-bottom: 1%;
		    margin-bottom: 3%;
		}

		.reach-us-div {
		    min-height: 365px;
		    display: flex;
		    justify-content:space-between;
		    flex-direction:column;
		}

		.reach-us-div-top-content-bottom {
		    margin-top: 6%;
		}

		.reach-us-div-top-content-top p {
		    margin-bottom: 10px;
		}
	</style>
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
					the_custom_logo();
					if ( is_front_page() && is_home() ) :
						?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?> <span class="logo-dark">LOGO</span></a></h1>
						<?php
					else :
						?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?><span class="logo-dark">LOGO</span></a></p>
						<?php
					endif;
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
