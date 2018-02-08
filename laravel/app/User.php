<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
     public function getUsers() {
         $DB = require 'DB.php';
         $data = $DB->table('wp_users')->where('ID',1)->first();
         return $data;
     }
     public function getPost(){
         $DB = require 'DB.php';
         $data = $DB->table('wp_posts')->where('post_status','publish')->where('post_type','post')->get();
         return $data;
     }
    public function signIn($data){
         $result = [];
        $arrSignIn = $data;
        $resultSignIn = wp_signon($arrSignIn);
        if (!empty($resultSignIn->errors)) {
            $result['errors'] = 1;
            foreach ($resultSignIn->errors as $listErrors) {
               $result['mess'] = $listErrors[0];
            }
        } else {
            $result = [
                'success' => 1,
                'mess'    => 'Sign in success'
            ];
        }
        return $result;
    }
    public function registerUser($data) {
         $userAccount   = $data['user_login'];
         $userPassword = $data['user_password'];
         $userEmail    = $data['user_email'];
         $result = wp_create_user($userAccount,$userPassword,$userEmail);
        if (!empty($result->errors)) {
            foreach ((array)$result->errors as $error => $listError) {
                $result->errors = $error;
                $result->mess   = $listError[0];
                break;
            }
        } else {
            $result->success = 1;
            $result->mess    = 'Register success';
            $arrarySignOn = [
                'user_login' => $userEmail,
                'user_password' => $userPassword
            ];
            wp_signon($arrarySignOn);
        }
        return $result;
    }
}
