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

    private function whois($user_id){
        $user =  Admin::find($user_id);
        return $user;
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