<?php
function upload_image($imagename, $random)
{

	if (!empty($_FILES[$imagename])) {
	    $uploaded_size = $_FILES[$imagename]['size'];
	    $uploaded_type = $_FILES[$imagename]['type'];
	    $target_dir = "../wp-content/uploads/icons/images/";

	    // Check if the "uploads" folder exists, if not, create it
	    if (!file_exists($target_dir)) {
	        mkdir($target_dir, 0755, true); // Creates the directory recursively
	    }

	    $target = $target_dir . $random . $_FILES[$imagename]['name'];
	    $ok = 1;

	    // Proceed with your existing upload logic here
	    // (e.g., move_uploaded_file(), validation, etc.)
	}
		
	//This is our size condition
	if ($uploaded_size > 350000)
	{		
		//$ok=0;
		//return false;
	}
	
	//This is our limit file type condition
	if ($uploaded_type =="text/php")
	{		
		return false;
		$ok=0;
	}			
	
	//Here we check that $ok was not set to 0 by an error
	if ($ok==0)
	{
		return false;
	}
	
	//If everything is ok we try to upload it
	else if($_FILES[$imagename]['name'] != null &&  $_FILES[$imagename]['name']!= "")
	{
		if(move_uploaded_file($_FILES[$imagename]['tmp_name'], $target))
		{
			return true;					
		}
		else
		{
			return false;
		}
	}

}

function home_page_setting_menu() { 

			add_menu_page( 'Home Page Setting', 'Home Setting', 'manage_options', 'home_setting', 'home_page_setting', 'dashicons-admin-multisite', 12 );
		}
		add_action( 'admin_menu', 'home_page_setting_menu' );

        function home_page_setting() {
            //ob_start();  
            
            /********** Insert Operation **********/
            global $wpdb;
            
            $table_name = $wpdb->prefix . 'home_setting_table';
            $res = $wpdb->get_results( "SELECT * FROM $table_name where id=1" );
			if(isset($_REQUEST["submit_btn"])) { 	      	
	      	    $logo_path = "";
	      	    $random = "r".(rand()%10000);
	      	    if($_FILES['logo']['name'] != "")
				{
					if($res[0]) {
						unlink("../wp-content/uploads/icons/images/" . $res[0]->logo);
					}
					if(upload_image('logo', $random))
				    {
				    	$logo_path = $random.$_FILES['logo']['name'];
				    }
						
				} else {
					$logo_path = $res[0]->logo;
				}

				$updated = false;

        		if($res[0]) {
		            if($wpdb->update( 
	        			$table_name, 
	        			array("logo" => $logo_path, 
	        				"phone_number" => $_REQUEST["phone"],
	        				"address" => $_REQUEST["address"],
	        				"fax" => $_REQUEST["fax"],
	        				"facebook" => $_REQUEST["fblink"],
	        				"twitter_link" => $_REQUEST["twittwrlink"],
	        				"pintrest_link" => $_REQUEST["pintlink"],
	        				"linkdin_link" => $_REQUEST["linkdinlink"],
	        			),
	        			array("id" => 1)
	        		)) {
		            	$updated = true;
	        		}
		        } else {
		            $wpdb->insert( 
		    			$table_name, 
		    			array("logo" => $logo_path, 
	        				"phone_number" => $_REQUEST["phone"],
	        				"address" => $_REQUEST["address"],
	        				"fax" => $_REQUEST["fax"],
	        				"facebook" => $_REQUEST["fblink"],
	        				"twitter_link" => $_REQUEST["twittwrlink"],
	        				"pintrest_link" => $_REQUEST["pintlink"],
	        				"linkdin_link" => $_REQUEST["linkdinlink"],
	        			)
		    		);
		        }
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
                  <?php if($res[0] && $updated) { ?>
                    Setting's has been updated successfuly !!!
                  <?php } else { ?>
                    Setting's has been inserted successfuly !!!
                  <?php } ?>
                </div>             
                <?php
                	$table_name = $wpdb->prefix . 'home_setting_table';
            		$res = $wpdb->get_results( "SELECT * FROM $table_name where id=1" );	 
            			} 
            	?>
                
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
        						      	<input type="text" class="form-control" name="phone" id="phone" placeholder="i.e 385.154.11.28.38" value="<?php echo isset($res[0]) ? $res[0]->phone_number : ""?>" />
        						      </p>
						        </div>

						        <div class="col-sm-12 col-md-6 col-lg-6">
						              <label>Address Information</label>
        						      <p>
        						      	<input type="text" class="form-control" placeholder="i.e 535 La Plata Street, 4200 Argentina" name="address" id="address" value="<?php echo isset($res[0]) ? $res[0]->address : ""?>" />
        						      </p>
						        </div>

						        <div class="col-sm-12 col-md-6 col-lg-6">
						              <label>Fax Number</label>
        						      <p>
        						      	<input type="text" class="form-control" placeholder="i.e 385.154.35.66.78" name="fax" id="fax" value="<?php echo isset($res[0]) ? $res[0]->fax : ""?>" />
        						      </p>
						        </div>

						        <div class="col-sm-12 col-md-6 col-lg-6">
						              <label>Facebook Link:</label>
        						      <p>
        						      	<input type="text" class="form-control" placeholder="i.e https://www.facebook.com/" name="fblink" id="fblink" value="<?php echo isset($res[0]) ? $res[0]->facebook : ""?>" />
        						      </p>
						        </div>

						        <div class="col-sm-12 col-md-6 col-lg-6">
						              <label>Twitter Link:</label>
        						      <p>
        						      	<input type="text" class="form-control" placeholder="i.e https://twitter.com/" name="twittwrlink" id="twittwrlink" value="<?php echo isset($res[0]) ? $res[0]->twitter_link : ""?>" />
        						      </p>
						        </div>

						        <div class="col-sm-12 col-md-6 col-lg-6">
						              <label>Pintrest Link:</label>
        						      <p>
        						      	<input type="text" class="form-control" placeholder="i.e https://www.pinterest.com/" name="pintlink" id="pintlink" value="<?php echo isset($res[0]) ? $res[0]->pintrest_link : ""?>" />
        						      </p>
						        </div>

						        <div class="col-sm-12 col-md-6 col-lg-6">
						              <label>LinkDin Link:</label>
        						      <p>
        						      	<input type="text" class="form-control" placeholder="i.e https://linkedin.com/" name="linkdinlink" id="linkdinlink" value="<?php echo isset($res[0]) ? $res[0]->linkdin_link : ""?>" />
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

?>