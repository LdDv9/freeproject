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
        add_action('wp_ajax_handler_laravel',[$this,"ajaxHandler"]);
        add_action('wp_ajax_nopriv_handler_laravel',[$this,"ajaxHandler"]);
    }
    public function index() {

        return view('welcome');
    }
    static function ajaxGetUser($data){
        $user   = new User();
        $dataUser = $user->getUsers();
        return $dataUser;
//        print_r(json_encode($user->getUsers()));
    }
}
