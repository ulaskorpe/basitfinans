<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Helpers\GeneralHelper;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    use MenuTrait;


    public function index(){
        $data=array();
        $data['who'] = $this->whois(Session::get('user_id'));
        $data['admins']=Admin::all();


        return view('admin.index',$data);

    }

    public function create(Request $request){

        if ($request->isMethod('post')) {
            $messages = [];
            $rules = [
                'email'=>'required|unique:admins',
            ];
            $this->validate($request, $rules, $messages);
            $resultArray = DB::transaction(function () use ($request) {

                if(!empty($request['sudo'])){
                    $sudo = 1;
                    $clients =0;
                    $constents =0;
                    $reports =0;
                    $settings =0;
                }else{
                    $sudo=0;
                    $clients =(!empty($request['clients']))?1:0;
                    $constents =(!empty($request['contents']))?1:0;
                    $reports =(!empty($request['reports']))?1:0;
                    $settings =(!empty($request['settings']))?1:0;
                }

                $admin = new Admin();
                $admin->title = '';// (!empty($request['title']))?$request['title']:'';
                $admin->name_surname = $request['name_surname'];
                $admin->password = md5(trim($request['password']));
                $admin->phone = $request['phone'];
                $admin->email = $request['email'];
                $admin->contents =$constents;
                $admin->sudo =  $sudo;
                $admin->clients =  $clients;
                $admin->reports = $reports;
                $admin->settings = $settings;
                $admin->active=1;
                ///   $admin->modules = 0;
                $admin->lang = 'tr';
                $admin->save();
                $file = $request->file('avatar');
                if (!empty($file)) {
                    $path = public_path("img/admins/" . $admin->id);
                    $filename = GeneralHelper::fixName($request['name_surname']) . "_" . date('YmdHis') . "." . GeneralHelper::findExtension($file->getClientOriginalName()); //FileHelper::fixname($personnel['name']).".". FileHelper::findExtension($file->getClientOriginalName());
                    $file->move($path, $filename);
                    $admin->avatar = "img/admins/" . $admin->id . "/" . $filename;
                    $admin->save();
                }
                return ['msg' => __('admin.admin_created'),'id'=>$admin->id ];
            });


            return json_encode(['msg' => $resultArray['msg'], 'id' => $resultArray['id']]);

        }else{

            $data=array();
            $data['who'] = $this->whois(Session::get('user_id'));
            $data['settings'] = $this->findSetting(Session::get('user_id'));
            return view('admin.create',$data);
        }
    }


    public function update($id=0 , Request $request){

        if ($request->isMethod('post')) {
            $messages = [];
            $rules = [
               // 'email'=>'required|unique:admins',
            ];
            $this->validate($request, $rules, $messages);
            $resultArray = DB::transaction(function () use ($request) {
                if(!empty($request['sudo'])){
                    $sudo = 1;
                    $clients =0;
                    $constents =0;
                    $reports =0;
                    $settings =0;
                }else{
                    $sudo=0;
                    $clients =(!empty($request['clients']))?1:0;
                    $constents =(!empty($request['contents']))?1:0;
                    $reports =(!empty($request['reports']))?1:0;
                    $settings =(!empty($request['settings']))?1:0;
                }

                $admin = Admin::find($request['id']);
                $admin->title = '';// (!empty($request['title']))?$request['title']:'';
                $admin->name_surname = $request['name_surname'];
                //$admin->password = md5(trim($request['password']));
                $admin->phone = $request['phone'];
                $admin->email = $request['email'];
                $admin->contents =$constents;
                $admin->sudo =  $sudo;
                $admin->clients =  $clients;
                $admin->reports = $reports;
                $admin->settings = $settings;
                $admin->active=(!empty($request['active']))?1:0;;
                ///   $admin->modules = 0;
                $admin->lang = 'tr';
                $admin->save();
                $file = $request->file('avatar');
                if (!empty($file)) {
                    $path = public_path("img/admins/" . $admin->id);
                    $filename = GeneralHelper::fixName($request['name_surname']) . "_" . date('YmdHis') . "." . GeneralHelper::findExtension($file->getClientOriginalName()); //FileHelper::fixname($personnel['name']).".". FileHelper::findExtension($file->getClientOriginalName());
                    $file->move($path, $filename);
                    $admin->avatar = "img/admins/" . $admin->id . "/" . $filename;
                    $admin->save();
                }
                return ['msg' => __('general.admin_updated'),'id'=>$admin->id ];
            });


            return json_encode(['msg' => $resultArray['msg'], 'id' => $resultArray['id']]);

        }else{

            $data=array();
            $data['admin']=Admin::find($id);
            $data['who'] = $this->whois(Session::get('user_id'));
            $data['settings'] = $this->findSetting(Session::get('user_id'));
            return view('admin.update',$data);
        }
    }



}
