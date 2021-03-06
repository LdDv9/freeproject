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
        $result = [];
        $user = new User();
        $validate = new  Validator($data, array(), 'en');
        $validate->rule('required',['user_login','user_password']);
        $validate->rule('email',['user_login']);
        if ($validate->validate()) {
            $signIn = $user->signIn($data);
           if ($signIn['errors']) {
               $result['errors'] = $signIn['errors'];
           } else {
               $result['success'] = $signIn['errors'];
           }
            $result['mess']   = $signIn['mess'];
        } else {
            $result['errors'] = 1;
            foreach ($validate->errors() as $listError) {
                $result['mess'] = $listError[0];
                break;
            }
        }
        return $result;
    }
    public function ajaxLogOut($data) {
        $result =[];
        if (is_user_logged_in()) {
            wp_logout();
            $result['success'] = 1;
        } else {
            $result['errors'] = 1;
            $result['mess'] = 'Not logged in';
        }
        return $result;
    }
    public function ajaxRegisterUser($data) {
        $validate = new Validator($data,array(),'en');
        $validate->rule('required',['user_login','user_password','user_email']);
        $validate->rule('email',['user_email']);
        if (is_user_logged_in()) {
            $result = [
              'errors' => 'logged',
              'mess'   => 'You must be logout to register'
            ];
            return $result;
        }
        if ($validate->validate()) {
            $user = new User();
            $result = $user->registerUser($data);
        } else {
            $result['errors'] = 1;
            foreach ($validate->errors() as $listError) {
                $result['mess'] = $listError[0];
                break;
            }
        }
        return $result;
    }
}
