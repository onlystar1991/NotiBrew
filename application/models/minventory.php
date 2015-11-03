<?php
/**
 * Created by PhpStorm.
 * User: win
 * Date: 1/7/15
 * Time: 9:35 PM
 */

use Parse\ParseException;
use Parse\ParseObject;
use Parse\ParseQuery;

class MInventory extends CI_Model {

    var $inventory_id;
    var $inventory_name;
    var $inventory_sku;
    var $inventory_distributor;
    var $inventory_quantity;
    var $inventory_demand; //Store Icon
    var $inventory_price;

    public function __construct()
    {
        parent::__construct();
    }
}