<?php
	$this->load->view("_partials/header.php");
	$beers = $this->data['beers'];
?>
	<main id="main" class="row">
	    <div class="large-3 medium-3 column">
	        <!-- #sidenav -->
	        <ul id="sidenav" class="tabs vertical">
	            <li class="tab-title">
	                <a class="tab-stores" href="<?= base_url()?>store" title="Stores">
	                    <span class="icon"></span> Stores
	                </a>
	            </li>
	            <li class="tab-title">
	                <a class="tab-inventory" href="<?= base_url()?>inventory" title="Inventory">
	                    <span class="icon"></span> Inventory
	                </a>
	            </li>
	            <li class="tab-title">
	                <a class="tab-orders" href="<?= base_url()?>order" title="Orders">
	                    <span class="icon"></span> Orders
	                </a>
	            </li>
	            <li class="tab-title">
	                <a class="tab-dashboard" href="<?= base_url()?>dashboard" title="Dashboard">
	                    <span class="icon"></span> Dashboard
	                </a>
	            </li>
	            <li class="tab-title active">
	                <a class="tab-distributor" href="<?= base_url()?>distributor" title="Distributor">
	                    <span class="icon"></span> Distributor
	                </a>
	            </li>
	            <li class="tab-title">
	                <a class="tab-marketing" href="<?= base_url()?>marketing" title="Marketing">
	                    <span class="icon"></span> Marketing
	                </a>
	            </li>
	        </ul>
	        <!-- end of #sidenav -->
	    </div>
	    <div class="large-9 medium-8 column">
	        <!-- Tabs content -->
	        <div id="main-content" class="tabs-content">
	            <!-- Distributor -->
                <div id="distributor" class="content active">
                    <!--
                        DISTRIBUTOR VIEW ACTION
                    -->
                    <header class="store-action">
                        <!-- Back button -->
                        <a class="h4" href="<?php echo base_url() ?>distributor" title="Back to distributor">
                        	<i class="fa fa-angle-left"></i> Back to distributor
                        </a> <!-- end of back button -->
                    </header> <!-- END OF DISTRIBUTOR VIEW ACTION -->

                    <!-- Distributor details -->
                    <article>
                        <!-- The distributor name -->
                        <h3 title="[Please change title here]"><?php echo $this->data['distributor_name'];?></h3> <!-- end of the distributor name -->
                        <!-- Spacer -->
                        <br/> <!-- end of: Spacer -->
                        
                        <table class="table table--dsh">
                            <thead>
                                <tr>
                                    <td>Beer Name</td>
                                    <td>Price</td>
                                    <td>Min. Number Needed to Buy</td>
                                </tr>
                            </thead>
                            <tbody>
                        	<?php
                        	foreach ($beers as $beer) {
                        		?>
                        		<tr>
                        			<td>
                        				<?php echo $beer->beer_title; ?>
                        			</td>
                        			<td>
                        				<?php
                        				$price = ((int)$beer->beer_tax_price) + ((int)$beer->beer_delivery_price);
                        				echo $price;
                        				?>
                        			</td>
                        			<td>
                        				<?php echo $beer->beer_percent; ?>
                        			</td>
                        		</tr>
                        		<?php
                        	}
                        	?>
                            </tbody>
                        </table>
                    </article>
                </div> <!-- end of #distributor -->

	        </div>
			<!-- end of tabs content -->
	    </div>
	</main>

<?php
	$this->load->view("_partials/footer.php");
?>