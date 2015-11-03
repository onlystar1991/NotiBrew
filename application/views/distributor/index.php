<?php
	$this->load->view("_partials/header.php");
	$distributors = $this->data['distributors'];
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
                    <!-- List of distributors -->
                    <ul class="no-bullet">

                	<?php
                		foreach ($distributors as $distributor) {
                			?>
                			<li>
                				<a class="lnk-underlined" href="<?php echo base_url()."distributor/view/".$distributor->distributor_id;?>" title="<?= $distributor->distributor_name ?>"><?= $distributor->distributor_name ?></a>
                			</li>
                			<?php
                		}
                	?>
                    </ul> <!-- end of list distributors -->
                </div>

                <!-- Stores pagination -->
                <div id="pagination" class="pagination-centered" style="width: auto; height: auto;">
                    <ul class="tsc_pagination" style="height: auto; width: 50%; margin: auto;">
                        <?php 
	                        foreach ($this->data['links'] as $link) {
	                            echo "<li>". $link."</li>";
	                        }
	                    ?>
                    </ul>
                </div>
	        </div>
			<!-- end of tabs content -->
	    </div>
	</main>

<?php
	$this->load->view("_partials/footer.php");
?>