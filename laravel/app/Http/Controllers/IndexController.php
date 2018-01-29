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
        add_action('wp_ajax_index_ajax',['App\Http\Controllers\PageController','ajaxTest']);
        add_action('wp_ajax_nopriv_index_ajax',['App\Http\Controllers\PageController','ajaxTest']);
    }
    public function index() {
        echo 'abc';
//        $user   = new User();
//        dd($user->getUsers());
        return view('welcome');
    }
}
