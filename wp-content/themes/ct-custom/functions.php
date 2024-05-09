<?php
/**
 * CT Custom functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package CT_Custom
 */

if ( ! function_exists( 'ct_custom_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ct_custom_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on CT Custom, use a find and replace
		 * to change 'ct-custom' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ct-custom', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'ct-custom' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'ct_custom_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'ct_custom_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ct_custom_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'ct_custom_content_width', 640 );
}
add_action( 'after_setup_theme', 'ct_custom_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ct_custom_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'ct-custom' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'ct-custom' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'ct_custom_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ct_custom_scripts() {
	wp_enqueue_style( 'ct-custom-style', get_stylesheet_uri() );

	wp_enqueue_script( 'ct-custom-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'ct-custom-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ct_custom_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}


function assign_course_to_child() { 

			add_menu_page( 'Child Program Relationship', 'Home Setting', 'manage_options', 'home_setting', 'home_page_setting', 'dashicons-admin-multisite', 12 );
		}
		add_action( 'admin_menu', 'assign_course_to_child' );

        function home_page_setting() {
            //ob_start();  
            
            /********** Insert Operation **********/
            global $wpdb;
            
			if(isset($_REQUEST["submit_btn"])) { 
	      		$table_name = $wpdb->prefix . 'home_setting_table';
	      	
	      	    $res = $wpdb->get_results( "SELECT * FROM $table_name where id=1" );

	            if($res[0]) {
	                $wpdb->update( 
            			$table_name, 
            			array("userID" => $_REQUEST["userinfo"], "programIDs" => json_encode($_REQUEST["programs"])),
            			array("userID" => $_REQUEST["userinfo"])
            		);
	            } else {
	                $wpdb->insert( 
            			$table_name, 
            			array("userID" => $_REQUEST["userinfo"], "programIDs" => json_encode($_REQUEST["programs"]), "created_at" => date("Y-m-d h:i:s"))
            		);
	            }
	    
	      	    // print_r($_REQUEST);
			}
			/********** Insert Operation **********/
			
            
            ?>
            
            <!-- Boostrap 4 CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" crossorigin="anonymous">
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
            
            <!-- Boostrap JS -->
            <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" crossorigin="anonymous"></script>
            
            <style>
                .form-items {
                    border: 3px solid #061e26;
                    border-radius: 10px;
                    margin: 3% 2px;
                    padding: 4%;
                }

                .wp-core-ui select[multiple] {
                    width: 100%;
                }
            </style>

            <div class="form-items">
                
                <?php if(isset($_REQUEST["submit_btn"])) { ?>
                <div class="alert alert-success" role="alert">
                  <?php if($res[0]) { ?>
                    <?php echo get_userdata($res[0]->userID)->user_login; ?> Setting's has been updated successfuly !!!
                  <?php } else { ?>
                    <?php echo get_userdata($_REQUEST["userinfo"])->user_login; ?> Setting's has been inserted successfuly !!!
                  <?php } ?>
                </div>
                <?php } ?>
                
                <section>
    					<div class="row">
    						<div class="col-sm-12 col-md-12 col-lg-12">
    						    <h3>Home Page Setting</h3>
    						</div>
    					</div>
    			</section>
    			
    			<br /><br />
    			<form name="frm" id="frm" action="admin.php?page=home_setting" method="post" enctype="multipart/form-data">
    					<section>
    					    
    						<div class="row">
    						    <div class="col-sm-12 col-md-6 col-lg-6">
    						      <label>Image Upload for Logo</label>
    						      <p>
    						      	<input type="file" class="form-control" name="logo" id="logo" />
    						      </p>
    						    </div>

						        <div class="col-sm-12 col-md-6 col-lg-6">
						              <label>Phone Number</label>
        						      <p>
        						      	<input type="text" class="form-control" name="phone" id="phone" value="" />
        						      </p>
						        </div>

						        <div class="col-sm-12 col-md-6 col-lg-6">
						              <label>Address Information</label>
        						      <p>
        						      	<input type="text" class="form-control" name="address" id="address" value="" />
        						      </p>
						        </div>

						        <div class="col-sm-12 col-md-6 col-lg-6">
						              <label>Fax Number</label>
        						      <p>
        						      	<input type="text" class="form-control" name="fax" id="fax" value="" />
        						      </p>
						        </div>

						        <div class="col-sm-12 col-md-6 col-lg-6">
						              <label>Facebook Link:</label>
        						      <p>
        						      	<input type="text" class="form-control" name="fblink" id="fblink" value="" />
        						      </p>
						        </div>

						        <div class="col-sm-12 col-md-6 col-lg-6">
						              <label>Twitter Link:</label>
        						      <p>
        						      	<input type="text" class="form-control" name="twittwrlink" id="twittwrlink" value="" />
        						      </p>
						        </div>

						        <div class="col-sm-12 col-md-6 col-lg-6">
						              <label>Pintrest Link:</label>
        						      <p>
        						      	<input type="text" class="form-control" name="pintlink" id="pintlink" value="" />
        						      </p>
						        </div>

						        <div class="col-sm-12 col-md-6 col-lg-6">
						              <label>LinkDin Link:</label>
        						      <p>
        						      	<input type="text" class="form-control" name="linkdinlink" id="linkdinlink" value="" />
        						      </p>
						        </div>

						        <div class="col-sm-12 col-md-12 col-lg-12">
						            <button type="submit" name="submit_btn" id="submit_btn" class="form-control btn btn-success">Submit</button>
						        </div>
						    </div>
						    
    					</section>
    			</form>	
			
			</div>
            <?php
            // echo "here";
            //return ob_get_clean();
        }
