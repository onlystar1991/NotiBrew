<?php
	$this->load->view("_partials/header.php");
?>
	<main id="main" class="row">
	    <?php
            $this->load->view("_partials/side_bar.php");
        ?>
	    <div class="large-9 medium-8 column">
	        <!-- Tabs content -->
	        <div id="main-content" class="tabs-content">
	            
	            <div id="inventory" class="content active">

                    <header class="store-action">
                        <span class="h4">&nbsp;</span>
                        
                        <!-- Actions -->
                        <ul class="no-bullet inline-list right">
                            <li><a class="button secondary" href="#" title="Add Beer"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Beer</a></li>
                        </ul>
                    </header>
                    <article>
                    </article>
                    <table class="table table--dsh">
                        <tr>
                            <th class="table--dsh__header">SKU</th>
                            <th class="table--dsh__header">Price</th>
                            <th class="table--dsh__header">Name</th>
                            <th class="table--dsh__header">Distributor</th>
                            <th class="table--dsh__header">Quantity</th>
                            <th class="table--dsh__header">Demand</th>
                            <th class="table--dsh__header">Status</th>
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
                    				<?php 
                                    if($inventory->inventory_in_stock) {
                                        echo "in stock";  
                                    } else {
                                        echo "arrives ".$inventory->inventory_arrive_date;
                                    }
                                    ?>
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