<?php
	$this->load->view("_partials/header.php");
	$orders = $this->data['orders'];
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
	            <li class="tab-title active">
	                <a class="tab-orders" href="<?= base_url()?>order" title="Orders">
	                    <span class="icon"></span> Orders
	                </a>
	            </li>
	        </ul>
	        <!-- end of #sidenav -->
	    </div>
	    <div class="large-9 medium-8 column">
	        <!-- Tabs content -->
	        <div id="main-content" class="tabs-content">
	            
	            <!-- #orders -->
                <div id="orders" class="content active">
                    <table class="table table--dsh">
                        <thead>
                            <tr>
                                <th class="table--dsh__header">Order ID</th>
                                <th class="table--dsh__header">Customer Name</th>
                                <th class="table--dsh__header">Date</th>
                                <th class="table--dsh__header">Payment Method</th>
                                <th class="table--dsh__header">Details</th>
                            </tr// >
                        </thead>
                        <tbody>
                        	<?php
                        	$i = 0;
                        	foreach ($orders as $order) {
                        		$i++;
                        		?>
                        	<tr>
                        		<td>
                        			<?php echo str_pad($i, 3, '0', STR_PAD_LEFT); ?>
                        		</td>
                        		<td>
                        			<?php echo $order->order_customer_name; ?>
                        		</td>
                        		<td>
                        			<?php echo $order->order_date; ?>
                        		</td>
                        		<td>
                        			<?php echo $order->order_payment_method; ?>
                        		</td>
                        		<td>
                        			Details
                        			<?php // echo $order->order_detail; ?>
                        		</td>
                        	</tr>
                        		<?php
                        	}
                        	?>
                        </tbody>
                    </table>
                    
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
                </div> <!-- end of #orders -->
	        </div>
			<!-- end of tabs content -->
	    </div>
	</main>

<?php
	$this->load->view("_partials/footer.php");
?>