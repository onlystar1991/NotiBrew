<?php
/**
 * Created by PhpStorm.
 * User: bok
 * Date: 9/21/14
 * Time: 9:19 PM
 */
require PARSE_SDK_INC;

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));


use Parse\ParseClient;
use Parse\ParseUser;
use Parse\ParseSessionStorage;
use Parse\ParseException;
use Parse\ParseObject;
use Parse\ParseQuery;
use Parse\ParseFile;


class Inventory extends CI_Controller{

    private static $app_id     =   'upTrZvYWTbzoZKTI9Up9uGWYHiamL3LCWNvfiTrx';
    private static $rest_key   =   'NUyL27OK8vIdZGtiqwskfVyPAiCT0Z6zCm7d3NXG';
    private static $master_key =   'UXkRORqhyp22XBg28k0EOxSZitOgVRv5gaDWFHJ8';

    public function __construct() {

        parent::__construct();
        ParseClient::initialize(self::$app_id, self::$rest_key, self::$master_key);
        $this->load->model('minventory');
        $this->load->helper('url');
        $this->load->library("pagination");
        $this->load->library("session");

    }

    public function index() {
        if (!$this->session->userdata('isSigned')) {
            redirect('auth/index');
        }
        
        $all_inventories = $this->getInventorylist();
        $result_array = array();
        $this->data['inventories'] = array();
        $config = array();
        $config["base_url"] = base_url() . "inventory";
        $config["total_rows"] = count($all_inventories);
        $config["per_page"] = 4;
        $config["uri_segment"] = 2;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

        $str_links = $this->pagination->create_links();
        $this->data['links'] = explode('&nbsp;',$str_links );

        for ($i = $page; $i < ($page + 4); $i++) {
            try {
                if ($all_inventories[$i]) {
                    $result_array[] = $all_inventories[$i];    
                } else {
                    break;
                }
            } catch (Exception $e) {
                break;
            }
        }
        
        $this->data['inventories'] = $result_array;

        $this->load->view('inventory/index', $data);

    }
    
    private function getInventorylist() {
       
        $query = new ParseQuery("Inventory");
        $result = $query->find();
        $resultArray = array();
        for($i = 0; $i < count($result); $i++) {
            $object = $result[$i];

            $inventory = new MInventory();
            $inventory->inventory_id = $object->getObjectId();
            $inventory->inventory_name = $object->get("inventoryName");
            $inventory->inventory_sku = $object->get("inventorySku");
            $inventory->inventory_distributor = $object->get("inventoryDistributor");
            $inventory->inventory_quantity = $object->get("inventoryQuantity");
            $inventory->inventory_demand = $object->get("inventoryDemand");
            $inventory->inventory_price = $object->get("inventoryPrice");

            $resultArray[] = $inventory;
        }

        return $resultArray;
    }

    
    public function delete($sId = "") {
        if (!$sId) {
            redirect("inventory/");
        } else {
            $query = new ParseQuery("Inventory");
            $inventory = $query->get($sId);
            $inventory->destroy();
            redirect("inventory/");
        }
    }

    public function edit($sId = "") {
        if (!$sId) {
            redirect("inventory/");
        } else {
            $query = new ParseQuery("Inventory");
            $inventory = $query->get($sId);

            $minventory = new MInventory();
            $minventory->inventory_id = $inventory->getObjectId();
            $minventory->inventory_name = $inventory->get("inventoryName");
            $minventory->inventory_sku = $inventory->get("inventorySku");
            $minventory->inventory_distributor = $inventory->get("inventoryDistributor");
            $minventory->inventory_quantity = $inventory->get("inventoryQuantity");
            $minventory->inventory_demand = $inventory->get("inventoryDemand");
            $minventory->inventory_price = $inventory->get("inventoryPrice");

            
            $this->data['inventory'] = $minventory;
            $this->load->view("inventory/edit", $data);
        }
    }
    public function save() {
        
        $query = new ParseQuery("Inventory");
        $inventory = $query->get($this->input->post("inventory_id"));

        $inventory->set("inventoryName", $this->input->post("name"));
        $inventory->set("inventorySku", $this->input->post("sku"));
        $inventory->set("inventoryDistributor", $this->input->post("distributor"));
        $quantity = $this->input->post("quantity");

        $inventory->set("inventoryQuantity", (int)$quantity);
        $inventory->set("inventoryPrice", $this->input->post("price"));
      
        try {
            $inventory->save();
            redirect("inventory/");
        } catch (ParseException $ex) {
            die("Exception Occured :".$ex->getMessage());
        }
    }
}