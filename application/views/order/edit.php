<?php
	$this->load->view("_partials/header.php");

	$inventory = $this->data['inventory'];
?>
	<main id="main" class="row">
	    <div class="large-3 medium-3 column">
	        <!-- #sidenav -->
	        <ul id="sidenav" class="tabs vertical">
	            <li class="tab-title">
	                <a class="tab-stores" href="<?= base_url()?>store" title="Stores">
	                    <span class="icon"></span> Stores</a>
	            </li>
	            <li class="tab-title">
	                <a class="tab-inventory" href="<?= base_url()?>inventory" title="Inventory">
	                    <span class="icon"></span> Inventory</a>
	            </li>Back to store
	            <li class="tab-title active">
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
                <div id="inventory" class="content active">
                    
                    <form action="<?php echo base_url(); ?>inventory/save" method="post" >
                    	<input type="hidden" name="inventory_id" value="<?php echo $inventory->inventory_id; ?>"
                        <table class="table table--dsh">
                        	<thead>
	                        <tr>
	                            <th class="table--dsh__header">SKU</th>
	                            <th class="table--dsh__header">Price</th>
	                            <th class="table--dsh__header">Name</th>
	                            <th class="table--dsh__header">Distributor</th>
	                            <th class="table--dsh__header">Quantity</th>
	                            <th class="table--dsh__header">Demand</th>
	                            <th class="table--dsh__header" style="width: 160px; text-align: center;"></th>
	                        </tr>
	                        </thead>
	                        <tbody>
	                        <tr>
	                            <!-- SKU -->
	                            <td>
	                                <input name="sku" type="text" value="<?php echo $inventory->inventory_sku;?>"/>
	                            </td> <!-- end of SKU -->
	                            <!-- Price -->
	                            <td>
	                                <input name="price" type="text" value="<?php echo $inventory->inventory_price; ?>"/>
	                            </td> <!-- end of Price -->

	                            <!-- Name -->
	                            <td>
	                                <input name="name" type="text" value="<?php echo $inventory->inventory_name; ?>"/>
	                            </td> <!-- end of name -->
	                            <!-- Distributor -->
	                            <td>
	                                <input name="distributor" type="text" value="<?php echo $inventory->inventory_distributor; ?>"/>
	                            </td> <!-- end of distributor -->
	                            <!-- Quantity -->
	                            <td>
	                                <input name="quantity" type="number" value="<?php echo $inventory->inventory_quantity; ?>"/>
	                            </td> <!-- end of quantity -->

	                            <!-- Demand -->
	                            <td><?php echo $inventory->inventory_demand; ?></td> <!-- end of demand -->

	                            <!-- Action -->
	                            <td class="table--dsh__action">
	                                <!-- Order action -->
	                                <a class="button secondary disabled right" href="#" title="Order">
	                                    <i class="fa fa-plus"></i> Order
	                                </a> <!-- end of order action -->
	                            </td> <!-- end of actions -->
	                        </tr>
	                    	</tbody>
	                    </table>
	                    <!-- .outer-actions -->
                        <div class="outer-actions">
                            <!-- Bulk actions -->
                            <ul class="no-bullet inline-list bulk-actions right">
                                <!-- Save -->
                                <li>
                                	<button class="button secondary" type="submit" title="Save">
                                        <i class="fa fa-check"></i> Save
                                    </button>
                                </li> <!-- end of save action -->
                                <!-- Cancel -->
                                <li>
                                	<a class="button alert" href="#" title="Cancel">
                                        Cancel
                                    </a>
                                </li> <!-- enf of cancel action -->
                            </ul> <!-- end of bulk actions -->
                        </div>
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