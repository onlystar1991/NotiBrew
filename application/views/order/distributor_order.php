<?php
	$this->load->view("_partials/header.php");
	$orders = $this->data['orders'];
?>
	<main id="main" class="row">
	    <?php
	    	$this->load->view("_partials/side_bar.php");
	    ?>
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
                                </td>
                        		
                                    <?php 
                                        if (!$order->order_isAproved) {
                                            if ($order->order_isAproved != null) echo "<td class=''>Denied :".$order->order_deniedReason."</td>" ;
                                            else
                                            ?>

                                            <td class="table--dsh__action" id="td-<?php echo $order->order_id; ?>">
                                                <ul class="no-bullet inline-list">
                                                    <li> <!-- Approve action -->
                                                        <a class="button secondary action_approve" value="<?php echo $order->order_id; ?>" href="#" title="Approve">Approve</a> <!-- end of: Approve action -->
                                                    </li>
                                                    <li> <!-- Deny action -->
                                                        <a class="button action_deny" href="#" title="Deny">Deny</a> <!-- end of: Deny action -->
                                                    </li>
                                                </ul>

                                            <?php

                                        } else {

                                            ?>
                                            <td class="status-approved">approved
                                            <?php
                                        }
                                    ?>
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
<script>
    $(function() {
        $(".action_approve").click(function(e) {

            $.ajax({
                url: "<?= base_url().'order/action_approve' ?>",
                data: {order_id: $(this).attr('value')},
                dataTyep: "JSON",
                type: "POST",
                success: function(response) {
                    res = $.parseJSON(response);                    
                    if (res.result == "success") {
                        $("#td-"+ res.id).addClass("status-approved").html("approved");
                    }
                }
            });
            e.preventDefault();
        });

    })
</script>