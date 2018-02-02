<?php


namespace App\Http\Controllers;
use Valitron\Validator;
use Illuminate\Validation\Factory;
use App\User;
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
    public function ajaxGetUser($data){
        $user   = new User();
        $dataUser = $user->getUsers();
        return $dataUser;
    }
    public function ajaxGetPost($data){
        $user   = new User();
        $dataPost = $user->getPost();
        return $dataPost;
    }
    public function ajaxSignIn($data){
        $validate = new  Validator($data, array(), 'vi');
        $validate->rule('required','user_login');
        $validate->validate();
        echo '<pre>';
        print_r($validate);
        echo '</pre>';
        exit();


        echo '<pre>';
        print_r($validate);
        echo '</pre>';
        exit();
        $user = new User();
        $signIn = $user->signIn();
        return $signIn;
    }
}
