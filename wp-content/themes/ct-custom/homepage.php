<?php
/**
 * Template Name: Home Page
 */
get_header("header");
global $wpdb;
$table_name = $wpdb->prefix . 'home_setting_table';
$res = $wpdb->get_results( "SELECT * FROM $table_name where id=1" ); 
?>

    <section class="breadgrum-section">
			<div class="container">
				<div class="row">
					<div class="col-6 text-left">Home / Who we are / <b>Contact</b></div>
					<div class="col-6"></div>
				</div>
			</div>
		</section>

    <section class="home-content">
			<div class="container">
				<div class="row">
					<div class="col-12 text-left page-title"><?php echo the_title(); ?></div>
					<div class="col-12 page-post-content"><?php echo get_the_content(); ?></div>
				</div>
			</div>
		</section>

    <section class="form-section">
			<div class="container">
				<div class="row">
					<div class="col-6">
						<h3 class="frm-heading">CONTACT US</h3>
						<?php echo do_shortcode( '[contact-form-7 id="3e5f1bb" title="Contact form 1"]' ); ?>
					</div>
					<div class="col-6">
						<h3 class="frm-heading">REACH US</h3>
						<div class="reach-us-div">
							<div class="reach-us-div-top">
								<div class="reach-us-div-top-content-top">
									<p>Coalition Skills Test</p>
									<!-- 535 La Plata Street<br />
									4200 Argentina -->
									<?php echo isset($res[0]) ? $res[0]->address : ""?>
								</div>
								<div class="reach-us-div-top-content-bottom">
									<!-- Phone: 385.154.11.28.38<br />
									Fax: 385.154.35.66.78 -->
									Phone: <?php echo isset($res[0]) ? $res[0]->phone_number : ""?><br />
									Fax: <?php echo isset($res[0]) ? $res[0]->fax : ""?>
								</div>
							</div>
							<div class="reach-us-div-bottom">
								<?php $upload_dir = wp_upload_dir(); ?>
								<a href="<?php echo isset($res[0]) ? $res[0]->facebook : ""?>">
									<img src="<?php echo $upload_dir['baseurl'] . '/icons/fb.png'; ?>" />
								</a>
								<a href="<?php echo isset($res[0]) ? $res[0]->twitter_link : ""?>">
									<img src="<?php echo $upload_dir['baseurl'] . '/icons/othericons.png'; ?>" />
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
 
<?php get_footer("footer"); ?>