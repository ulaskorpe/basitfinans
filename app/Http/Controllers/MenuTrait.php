<?php
/**
 * Created by PhpStorm.
 * User: Toshiba
 * Date: 26.07.2018
 * Time: 11:25
 */

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Setting;
use App\User;
use Illuminate\Support\Facades\Session;

trait MenuTrait
{
    private $types = [];


    private function findSetting($user_id){
        $user =  $this->whois($user_id);

        if($user['sudo']==1){
            $setting = Setting::find(1);
        }elseif($user['client_id']>0){
            $setting = Setting::where('client_id','=',$user['client_id'])->first();
        }else{
            $setting = Setting::find(1);
        }

        return $setting;
    }

    private function whois(){
        $data= array();
        if(empty(Session::get('user_id'))){
            if( Session::get('session_id') > 0) {
                $data['guest_id'] =Session::get('session_id');
            }else{
                $id= rand(1000000,9999999);
                Session::put('session_id',$id) ;
                $data['guest_id'] = $id;
            }
            $data['user_id']= 0;
        }else{
            $data['user_id'] =  User::find(Session::get('user_id'));
            $data['guest_id'] = 0;
        }


        return $data;
    }

    private function menuItems(){
        return null;
    }

    private function sendNotification($adminArray = [] , $notification, $link){


        foreach ($adminArray as $admin_id){
            $not = new Notification();
            $not->notification = $notification;
            $not->link  = $link ;
            $not->admin_id= $admin_id;
            $not->seen = 0;
            $not->save();
        }


    }


}