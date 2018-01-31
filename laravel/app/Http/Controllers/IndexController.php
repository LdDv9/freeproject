<?php

namespace App\Http\Controllers;

use App\Base;
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
        add_action('wp_ajax_get_user',['App\Http\Controllers\IndexController','ajaxGetUser']);
        add_action('wp_ajax_nopriv_get_user',['App\Http\Controllers\IndexController','ajaxGetUser']);
    }
    public function index() {
        $user   = new User();
        return view('welcome');
    }
    public function ajaxGetUser(){
        $input = request()->all();
        dd($input);
    }

}
