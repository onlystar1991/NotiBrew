<?php
	$this->load->view("_partials/header.php");

	$hours = array("1am", "2am","3am", "4am","5am", "6am","7am", "8am","9am", "10am","11am", "12pm","1pm", "2pm","3pm", "4pm","5pm", "6pm","7pm", "8pm","9pm", "10pm","11pm", "12am");
	$store = $this->data['store'];
?>
	<main id="main" class="row">
	    <div class="large-3 medium-3 column">
	        <!-- #sidenav -->
	        <ul id="sidenav" class="tabs vertical">
	            <li class="tab-title active">
	                <a class="tab-stores" href="<?= base_url()?>store" title="Stores">
	                    <span class="icon"></span> Stores</a>
	            </li>
	            <li class="tab-title">
	                <a class="tab-inventory" href="<?= base_url()?>inventory" title="Inventory">
	                    <span class="icon"></span> Inventory</a>
	            </li>Back to store
	            <li class="tab-title">
	                <a class="tab-orders" href="<?= base_url()?>order" title="Orders">
	                    <span class="icon"></span> Orders</a>
	            </li>
	        </ul>
	        <!-- end of #sidenav -->
	    </div>

	    <div class="large-9 medium-8 column">
	        <!-- Tabs content -->
	        <div id="main-content" class="tabs-content">
	            <!-- #stores -->
                <div id="stores" class="content active">
                    
                    <form action="<?php echo base_url(); ?>store/save" method="post" enctype="multipart/form-data">
                        <header class="store-action">
                            <!-- Back button -->
                            <a class="h4" href="<?= base_url() ?>store/" title="Back to store"><i class="fa fa-angle-left"></i> Back to store</a> <!-- end of back button -->

                            <!-- Actions -->
                            <ul class="no-bullet inline-list right">
                                <li>
                                	<button class="button secondary" type="submit" title="Save">
                                		<i class="fa fa-check"></i>&nbsp;&nbsp;Save
                                	</button>
                                </li>
                            </ul>
                        </header> <!-- END OF STORE EDIT ACTION -->
                        <input type="hidden" name="store_id" value="<?php echo $store->store_id; ?>"
                        <!-- Store details -->
                        <article class="store-details">
                            <div class="row">
                                <!-- Store name -->
                                <input id="storeName" class="text-center h3" name="storeName" type="text" 
                                       placeholder="Store name"
                                       data-autosize-input="{ 'space': 0 }"
                                       value="<?php echo $store->store_name; ?>"/> <!-- end of store name -->

                                <!-- Store address -->
                                <input id="storeAddress" class="text-center" name="storeAddress" type="text" 
                                       placeholder="Address"
                                       data-autosize-input="{ 'space': 0 }"
                                       value="<?php echo $store->store_address; ?>"/> <!-- end of store address -->

                                <!-- Store schedule -->
                                <ul class="store__schedule no-bullet">
                                    <li>
                                        <span class="store__day">Mo</span>
                                        <span class="store__time">

                                        	<select id="moStart" name="moFrom">
	                                        	<?php
	                                        	for($i = 0; $i < 24; $i++) {
	                                        		if (strtolower($store->store_from_monday) == $hours[$i]) {
	                                        			?>
	                                        			<option value="<?php echo $hours[$i];?>" selected><?php echo $hours[$i];?></option>
	                                        			<?php
	                                        		} else {
	                                        			?>
	                                        			<option value="<?php echo $hours[$i];?>"><?php echo $hours[$i];?></option>
	                                        			<?php
	                                        		}
	                                        	}
	                                        	?>
                                            </select>
                                            - 
                                            
                                            <select id="moEnd" name="moTo">
                                                <?php
	                                        	for($i = 0; $i < 24; $i++) {
	                                        		if (strtolower($store->store_to_monday) == $hours[$i]) {
	                                        			?>
	                                        			<option value="<?php echo $hours[$i];?>" selected><?php echo $hours[$i];?></option>
	                                        			<?php
	                                        		} else {
	                                        			?>
	                                        			<option value="<?php echo $hours[$i];?>"><?php echo $hours[$i];?></option>
	                                        			<?php
	                                        		}
	                                        	}
	                                        	?>
                                            </select>
                                        </span>
                                    </li>
                                    <li>
                                        <span class="store__day">Tu</span> 
                                        <span class="store__time">
                                            <select id="tuStart" name="tuFrom">
                                                <?php
	                                        	for($i = 0; $i < 24; $i++) {
	                                        		if (strtolower($store->store_from_tuesday) == $hours[$i]) {
	                                        			?>
	                                        			<option value="<?php echo $hours[$i];?>" selected><?php echo $hours[$i];?></option>
	                                        			<?php
	                                        		} else {
	                                        			?>
	                                        			<option value="<?php echo $hours[$i];?>"><?php echo $hours[$i];?></option>
	                                        			<?php
	                                        		}
	                                        	}
	                                        	?>
                                            </select>
                                            - 
                                            
                                            <select id="tuEnd" name="tuTo">
                                                <?php
	                                        	for($i = 0; $i < 24; $i++) {
	                                        		if (strtolower($store->store_to_tuesday) == $hours[$i]) {
	                                        			?>
	                                        			<option value="<?php echo $hours[$i];?>" selected><?php echo $hours[$i];?></option>
	                                        			<?php
	                                        		} else {
	                                        			?>
	                                        			<option value="<?php echo $hours[$i];?>"><?php echo $hours[$i];?></option>
	                                        			<?php
	                                        		}
	                                        	}
	                                        	?>
                                            </select>
                                        </span>
                                    </li>
                                    <li>
                                        <span class="store__day">We</span> 
                                        <span class="store__time">
                                            <select id="weStart" name="weFrom">
                                                <?php
	                                        	for($i = 0; $i < 24; $i++) {
	                                        		if (strtolower($store->store_from_wednesday) == $hours[$i]) {
	                                        			?>
	                                        			<option value="<?php echo $hours[$i];?>" selected><?php echo $hours[$i];?></option>
	                                        			<?php
	                                        		} else {
	                                        			?>
	                                        			<option value="<?php echo $hours[$i];?>"><?php echo $hours[$i];?></option>
	                                        			<?php
	                                        		}
	                                        	}
	                                        	?>
                                            </select>
                                            - 
                                            
                                            <select id="weEnd" name="weTo">
                                                <?php
	                                        	for($i = 0; $i < 24; $i++) {
	                                        		if (strtolower($store->store_to_wednesday) == $hours[$i]) {
	                                        			?>
	                                        			<option value="<?php echo $hours[$i];?>" selected><?php echo $hours[$i];?></option>
	                                        			<?php
	                                        		} else {
	                                        			?>
	                                        			<option value="<?php echo $hours[$i];?>"><?php echo $hours[$i];?></option>
	                                        			<?php
	                                        		}
	                                        	}
	                                        	?>
                                            </select>
                                        </span>
                                    </li>
                                    <li>
                                        <span class="store__day">Th</span> 
                                        <span class="store__time">
                                            <select id="thStart" name="thFrom">
                                                <?php
	                                        	for($i = 0; $i < 24; $i++) {
	                                        		if (strtolower($store->store_from_thursday) == $hours[$i]) {
	                                        			?>
	                                        			<option value="<?php echo $hours[$i];?>" selected><?php echo $hours[$i];?></option>
	                                        			<?php
	                                        		} else {
	                                        			?>
	                                        			<option value="<?php echo $hours[$i];?>"><?php echo $hours[$i];?></option>
	                                        			<?php
	                                        		}
	                                        	}
	                                        	?>
                                            </select>
                                            - 
                                            
                                            <select id="thEnd" name="thTo">
                                                <?php
	                                        	for($i = 0; $i < 24; $i++) {
	                                        		if (strtolower($store->store_to_thursday) == $hours[$i]) {
	                                        			?>
	                                        			<option value="<?php echo $hours[$i];?>" selected><?php echo $hours[$i];?></option>
	                                        			<?php
	                                        		} else {
	                                        			?>
	                                        			<option value="<?php echo $hours[$i];?>"><?php echo $hours[$i];?></option>
	                                        			<?php
	                                        		}
	                                        	}
	                                        	?>
                                            </select>
                                        </span>
                                    </li>
                                    <li>
                                        <span class="store__day">Fr</span> 
                                        <span class="store__time">
                                            <select id="frStart" name="frFrom">
                                                <?php
	                                        	for($i = 0; $i < 24; $i++) {
	                                        		if (strtolower($store->store_from_friday) == $hours[$i]) {
	                                        			?>
	                                        			<option value="<?php echo $hours[$i];?>" selected><?php echo $hours[$i];?></option>
	                                        			<?php
	                                        		} else {
	                                        			?>
	                                        			<option value="<?php echo $hours[$i];?>"><?php echo $hours[$i];?></option>
	                                        			<?php
	                                        		}
	                                        	}
	                                        	?>
                                            </select>
                                            - 
                                            
                                            <select id="frEnd" name="frTo">
                                                <?php
	                                        	for($i = 0; $i < 24; $i++) {
	                                        		if (strtolower($store->store_to_friday) == $hours[$i]) {
	                                        			?>
	                                        			<option value="<?php echo $hours[$i];?>" selected><?php echo $hours[$i];?></option>
	                                        			<?php
	                                        		} else {
	                                        			?>
	                                        			<option value="<?php echo $hours[$i];?>"><?php echo $hours[$i];?></option>
	                                        			<?php
	                                        		}
	                                        	}
	                                        	?>
                                            </select>
                                        </span>
                                    </li>
                                    <li>
                                        <span class="store__day">Sa</span> 
                                        <span class="store__time">
                                            <select id="saStart" name="saFrom">
                                                <?php
	                                        	for($i = 0; $i < 24; $i++) {
	                                        		if (strtolower($store->store_from_saturday) == $hours[$i]) {
	                                        			?>
	                                        			<option value="<?php echo $hours[$i];?>" selected><?php echo $hours[$i];?></option>
	                                        			<?php
	                                        		} else {
	                                        			?>
	                                        			<option value="<?php echo $hours[$i];?>"><?php echo $hours[$i];?></option>
	                                        			<?php
	                                        		}
	                                        	}
	                                        	?>
                                            </select>
                                            - 
                                            
                                            <select id="saEnd" name="saTo">
                                                <?php
	                                        	for($i = 0; $i < 24; $i++) {
	                                        		if (strtolower($store->store_to_saturday) == $hours[$i]) {
	                                        			?>
	                                        			<option value="<?php echo $hours[$i];?>" selected><?php echo $hours[$i];?></option>
	                                        			<?php
	                                        		} else {
	                                        			?>
	                                        			<option value="<?php echo $hours[$i];?>"><?php echo $hours[$i];?></option>
	                                        			<?php
	                                        		}
	                                        	}
	                                        	?>
                                            </select>
                                        </span>
                                    </li>
                                    <li>
                                        <span class="store__day">Su</span> 
                                        <span class="store__time">
                                            <select id="suStart" name="suFrom">
                                                <?php
	                                        	for($i = 0; $i < 24; $i++) {
	                                        		if (strtolower($store->store_from_sunday) == $hours[$i]) {
	                                        			?>
	                                        			<option value="<?php echo $hours[$i];?>" selected><?php echo $hours[$i];?></option>
	                                        			<?php
	                                        		} else {
	                                        			?>
	                                        			<option value="<?php echo $hours[$i];?>"><?php echo $hours[$i];?></option>
	                                        			<?php
	                                        		}
	                                        	}
	                                        	?>
                                            </select>
                                            - 
                                            
                                            <select id="suEnd" name="suTo">
                                                <?php
	                                        	for($i = 0; $i < 24; $i++) {
	                                        		if (strtolower($store->store_to_sunday) == $hours[$i]) {
	                                        			?>
	                                        			<option value="<?php echo $hours[$i];?>" selected><?php echo $hours[$i];?></option>
	                                        			<?php
	                                        		} else {
	                                        			?>
	                                        			<option value="<?php echo $hours[$i];?>"><?php echo $hours[$i];?></option>
	                                        			<?php
	                                        		}
	                                        	}
	                                        	?>
                                            </select>
                                        </span>
                                    </li>
                                </ul> <!-- end of store schedule -->

                                <div class="large-6 column">
                                    <!-- Store description -->
                                    <textarea id="storeDescription" name="storeDescripton" placeholder="Description" rows="6"><?php echo $store->store_description; ?></textarea>
                                </div>

                                <!-- Clearfix -->
                                <div class="clearfix"></div> <!-- end of clearfix -->

                                <!-- Store logo -->
                                <div class="photo-wrapper" style="width: 100px; height: 80px;">
                                    
                                    <img class="th photo" id="img_store_logo" src="<?php echo $store->store_logo; ?>" style="max-width: 70px !important; max-height: 70px !important;" alt="" title="Top Hops Beer Shop"/>
                                    <br/>
                                    <!-- Filename -->
                                     <span class="photo-label" id="logo_title"><?php $res = explode("-", $store->store_logo); echo $res[count($res)-1]; ?></span> <!-- end of filename -->

                                     <!-- Delete action -->
                                     <a href="#" id="delete_store_logo" class="deleteImage" title="Delete (filename goes here)"><i class="fa fa-times"></i></a>
                                </div> <!-- end of store logo -->

                                <!-- Clearfix -->
                                <p class="clearfix"></p> <!-- end of clearfix -->

                                <!-- Store photos -->
                                <article class="store__photos">
                                    <article class="photos">
                                        <div class="photo-wrapper" style="width: 150px; min-height: 100px;">
											<img class="th photo" id="img_store_image1" src="<?php echo $store->store_image1; ?>" style="max-width: 150px !important; max-height: 250px !important;" alt=""/>
                                            <!-- Filename -->
                                             <span class="photo-label" id="image1_title"><?php $res = explode("-", $store->store_image1); echo $res[count($res)-1]; ?></span> <!-- end of filename -->
                                             <!-- Delete action -->
                                             <a href="#" id="delete_store_image1" title="Delete (filename goes here)"><i class="fa fa-times"></i></a>
                                        </div> 

                                        <div class="photo-wrapper" style="width: 150px; min-height: 100px;">
                                        	
                                            <img class="th photo" id="img_store_image2" src="<?php echo $store->store_image2; ?>" style="max-width: 150px !important; max-height: 250px !important;" alt=""/><br/>
                                            <!-- Filename -->
                                            <span class="photo-label" id="image2_title"><?php $res = explode("-", $store->store_image2); echo $res[count($res)-1]; ?></span>
                                             <!-- Delete action -->
                                            <a href="#" id="delete_store_image2" class="deleteImage" title="Delete (filename goes here)"><i class="fa fa-times"></i></a>
                                        </div> 
                                    </article>

                                    <!-- Clearfix -->
                                    <p class="clearfix"></p> <!-- end of clearfix -->

                                    <!-- Upload image action -->
                                    <a class="photo-upload alert" id="file_upload_span">
                                         <i class="fa fa-upload"></i>&nbsp;&nbsp;Upload image
                                    </a> <!-- end of upload image action -->
                                    <input type="file" name="store_icon" id="file_store_icon" style="display: none;">
                                    <input type="hidden" id="deleteIcon" name="store_icon_delete" value=0 />
                                    <input type="file" name="store_image1" id="file_store_image1" style="display: none;">
                                    <input type="hidden" id="deleteStoreImage1" name="store_image1_delete" value=0 />
                                    <input type="file" name="store_image2" id="file_store_image2" style="display: none;">
                                    <input type="hidden" id="deleteStoreImage2" name="store_image2_delete" value=0 />
                                    <div id="file-upload-dialog" title="File Upload" style="display: none;">
                                    	<a href="#" id="div-icon-upload">Store Icon:</a>
										<br>
										<a href="#" id="div-image1-upload">Store Image1:</a>
										<br>
										<a href="#" id="div-image2-upload">Store Image2:</a>
										<br>
									</div>
                                </article> <!-- end of store photos -->
                            </div>
                        </article> <!-- end of store details -->
                    </form>
                </div> <!-- end of #stores -->
	            <!-- end of #stores -->
	        </div>
	        <!-- end of tabs content -->
	    </div>
	</main>
<?php
	$this->load->view("_partials/footer.php");
?>