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


class Order extends CI_Controller{

    private static $app_id     =   'upTrZvYWTbzoZKTI9Up9uGWYHiamL3LCWNvfiTrx';
    private static $rest_key   =   'NUyL27OK8vIdZGtiqwskfVyPAiCT0Z6zCm7d3NXG';
    private static $master_key =   'UXkRORqhyp22XBg28k0EOxSZitOgVRv5gaDWFHJ8';

    public function __construct() {

        parent::__construct();
        ParseClient::initialize(self::$app_id, self::$rest_key, self::$master_key);
        $this->load->model('morder');
        $this->load->helper('url');
        $this->load->library("pagination");
        $this->load->library("session");

    }

    public function index() {

        if (!$this->session->userdata('isSigned')) {
            redirect('auth/index');
        }

        $all_orders = $this->getOrderlist();
        $result_array = array();
        $this->data['orders'] = array();
        $config = array();
        $config["base_url"] = base_url() . "order";
        $config["total_rows"] = count($all_orders);
        $config["per_page"] = 4;
        $config["uri_segment"] = 2;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

        $str_links = $this->pagination->create_links();
        $this->data['links'] = explode('&nbsp;',$str_links );

        for ($i = $page; $i < ($page + 4); $i++) {
            try {
                if ($all_orders[$i]) {
                    $result_array[] = $all_orders[$i];    
                } else {
                    break;
                }
            } catch (Exception $e) {
                break;
            }
        }
        
        $this->data['orders'] = $result_array;

        $this->load->view('order/index', $data);

    }
    
    private function getOrderlist() {
       
        $query = new ParseQuery("MyOrders");

        $result = $query->find();


        $resultArray = array();
        for($i = 0; $i < count($result); $i++) {
            $object = $result[$i];

            $order = new MOrder();

            $order->order_id = $object->getObjectId();

            $order->order_customer_name = $object->get("beerCreator");
            
            $order->order_payment_method = $object->get("cardType");

            $order->order_date = $object->getCreatedAt()->format('Y-m-d');

            $order->order_detail = $object->get("beerDescription");

            $resultArray[] = $order;
        }

        return $resultArray;
    }
}