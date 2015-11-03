<?php
	$this->load->view("_partials/header.php");
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
	            <li class="tab-title active">
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
	            <li class="tab-title">
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
	            
	            <div id="inventory" class="content active">
                    <table class="table table--dsh">
                        <tr>
                            <th class="table--dsh__header">SKU</th>
                            <th class="table--dsh__header">Price</th>
                            <th class="table--dsh__header">Name</th>
                            <th class="table--dsh__header">Distributor</th>
                            <th class="table--dsh__header">Quantity</th>
                            <th class="table--dsh__header">Demand</th>
                            <th class="table--dsh__header" style="text-align: center;"></th>
                            <th class="table--dsh__header" style="text-align: center;"></th>
                        </tr>
                        <?php
                    	foreach($this->data['inventories'] as $inventory) {
                    		?>
                    		<tr>
                    			<td>
                    				<?php echo $inventory->inventory_sku; ?>
                    			</td>
                    		
                    			<td>
                    				<?php echo $inventory->inventory_price; ?>
                    			</td>
                    		
                    			<td>
                    				<?php echo $inventory->inventory_name; ?>
                    			</td>
                    		
                    			<td>
                    				<?php echo $inventory->inventory_distributor; ?>
                    			</td>
                    		
                    			<td>
                    				<?php echo $inventory->inventory_quantity; ?>
                    			</td>
                    		
                    			<td>
                    				<?php echo $inventory->inventory_demand; ?>
                    			</td>
                    		
                    			<td>
                    				<a class="action__edit hvr-bob" href="<?php echo base_url().'inventory/edit/'.$inventory->inventory_id; ?>" title="Edit Inventory">
		                                <i class="fa fa-pencil"></i>
		                            </a> <!-- end of edit -->
                    			</td>
                    		
                    			<td class="table--dsh__action">
                                    <!-- Order action -->
                                    <a class="button secondary right" href="#" title="Order">
                                        <i class="fa fa-plus"></i> Order
                                    </a> <!-- end of order action -->
                                </td> <!-- end of actions -->
                    		</tr>
                    		<?php
                    	}
                        ?>
                        
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
                </div>

	        </div>
	        <!-- end of tabs content -->
	    </div>
	</main>

<?php
	$this->load->view("_partials/footer.php");
?>