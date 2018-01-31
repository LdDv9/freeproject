<?php


namespace App\Http\Controllers;


use App\User;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class IndexController extends Controller
{
    public static $instance;
    
    public static function init()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
        
    }
    public function __construct() {
       parent::__construct();
        add_action('wp_ajax_get_user',[$this,$this->ajaxHandler()]);
        add_action('wp_ajax_nopriv_get_user',[$this,$this->ajaxHandler()]);
    }
    public function index() {
        $user   = new User();
        return view('welcome');
    }
    static function ajaxGetUser($data){
        header('Content-Type: application/json');
    
        echo json_encode($data);
    }

}
