<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Helpers\GeneralHelper;
use App\Models\Admin;
use App\Models\Client;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class AdminHomeController extends Controller
{
    use MenuTrait;

    public function index()
    {
        $data=array();
        $data['who']=$this->whois(Session::get('admin_id'));
        return view('admin_panel.main_index',$data);
    }

    public function login(Request $request){
        if ($request->isMethod('post')) {
            $resultArray = DB::transaction(function () use ($request) {
                $checkUser = Admin::where('email','=',$request['email'])
                    ->where('password','=',md5(trim($request['password'])))->first();
                //return response(__('admin.slider_added'), 200);
                if(!empty($checkUser['id'])){

                    if($checkUser['active']==1){

                        Session::put('admin_id',$checkUser['id']);

                        /*$admin_rights = collect(['clients'=>$checkUser['clients'],
                           'contents'=>$checkUser['contents'],
                           'reports'=>$checkUser['reports'],
                           'settings'=>$checkUser['settings'],

                       ]);
                    //   Session::push('admin_rights', $admin_rights);*/
                        if(!empty($request['remember_me'])){
                            Cookie::queue('remember_me', $checkUser['id'], 3600);
                        }
                        if($checkUser['sudo']){  //superadmin
                            Session::put('sudo',1);
                            Session::put('delete',1);


                        }else{
                            Session::put('delete',0);
                            Session::put('sudo',0);
                            Session::put('clients',$checkUser['clients']);
                            Session::put('contents',$checkUser['contents']);
                            Session::put('reports',$checkUser['reports']);
                            Session::put('settings',$checkUser['settings']);

                        }
                        Session::put('lang',$checkUser['lang']);

                        return  ['msg'=>__('general.login_successful'),'result'=>'success','link'=>route('home')];
                    }else{
                        return  ['msg'=>__('errors.admin_inactive'),'result'=>'success','link'=>route('home')];
                    }
                }else{
                    return  ['msg'=>__('errors.login_error'),'result'=>'0','link'=>route('login')];
                }
            });

            return   json_encode($resultArray);
        }
        return view('admin_panel.auth.login');
    }

    public function forgetPw(Request $request){
        $admin = Admin::where('email','=',$request['pw_email'])->first();
        if(!empty($admin['id'])){
            $msg = __('general.pw_sent_to_email');
            $result='success';
        }else{
            $msg = __('errors.email_not_found');
            $result=1;
        }

        $resultArray = ['msg'=>$msg,'result'=>$result,'link'=>route('login')];
        return   json_encode($resultArray);
    }

    public function generatePw(){
        return GeneralHelper::randomPassword(6,1);
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect('admin-panel/login');
    }




    public function  updatePassword(Request $request){

        $data['who'] = $this->whois(Session::get('admin_id'));
        $admin = Admin::find($request->session()->get('admin_id'));

        $data ['admin'] = $admin;
        if ($request->isMethod('post')) {
            $messages = [];
            $rules = [
                //'old_password'=>'required|in:'.md5($request['old_password']),
                //  'password' => 'required|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%]).*$/|confirmed',
                'password' => 'required|min:6',
                'password_again'=>'required|same:password'
            ];
            $this->validate($request, $rules, $messages);

            $adminID = DB::transaction(function () use ($request, $admin) {
                $admin->password = md5(trim($request['password']));
                $admin->save();
                return $admin->id;
            });
            return json_encode(['msg' => __('admin.password_updated'), 'id' => $adminID]);
        }


        //    dd(Session::get('admin_rights'));
        return view('admin_panel.update_password',$data);

        //return view('sayfa');
    }

    public function  profile(Request $request){


        $data['who'] = $this->whois(Session::get('admin_id'));
        $data['settings'] = $this->findSetting(Session::get('admin_id'));
        //  $admin = Admin::where('id','=',$request->session()->get('admin_id'))->withPivot('clients')->first();
        $admin = Admin::find($request->session()->get('admin_id'));
        $data ['admin'] = $admin;
        if ($request->isMethod('post')) {
            $messages = [];
            $rules = [
                'email' => 'required|email|unique:admins,email,' . $admin['id'],
                'avatar' => 'mimes:png,jpg,jpeg',
            ];
            $this->validate($request, $rules, $messages);
            $adminID = DB::transaction(function () use ($request, $admin) {
                $admin->name_surname = $request['name_surname'];
                $admin->email = $request['email'];
                $admin->phone = $request['phone'];

                $file = $request->file('avatar');


                if (!empty($file)) {
                    $path = public_path("img/admins/" . $admin->id);
                    $filename = GeneralHelper::fixName($request['name_surname']) . "_" . date('YmdHis') . "." . GeneralHelper::findExtension($file->getClientOriginalName());
                    if($file->move($path, $filename)){

                    }
                    $admin->avatar = "img/admins/" . $admin->id . "/" . $filename;

                }

                $admin->save();
                return $admin->id;
            });
            return json_encode(['msg' => __('admin.profile_updated'), 'id' => $adminID]);
        }

        return view('admin_panel.profile',$data);
        //return view('sayfa');
    }



    public function  updateSettings(Request $request){

        $data['who'] = $this->whois(Session::get('admin_id'));
        // $data['settings'] = $this->findSetting(Session::get('admin_id'));

        $data['admin_settings'] = 'active';
        $admin = Admin::find($request->session()->get('admin_id'));
        $data ['admin'] = $admin;
        if ($request->isMethod('post')) {
            $messages = [];
            $rules = [
                'lang'=>'required',
                //'old_password'=>'required|in:'.md5($request['old_password']),
                //  'password' => 'required|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%]).*$/|confirmed',
                //    'password' => 'required|min:6',
                //  'password_confirm'=>'required|same:password'
            ];
            $this->validate($request, $rules, $messages);

            $adminID = DB::transaction(function () use ($request, $admin) {
                $admin->lang = $request['lang'];
                $admin->save();

                $langArray=['tr','en'];
                $lang=(!in_array($request['lang'],$langArray)) ?'tr':$request['lang'];
                Session::put('lang',$lang);

                return $admin->id;
            });
            return json_encode(['msg' => __('admin.settings_updated'), 'id' => $adminID]);
        }


        //    dd(Session::get('admin_rights'));
        return view('admin_panel.settings',$data);

        //return view('sayfa');
    }

    public function emailExistsAdmin($email,$id=0){
        $check = Admin::select('id')->where('email','=',$email)->where('id','<>',$id)->first();
        return (!empty($check['id']))?"1":"0";

    }

    public function emailExistsClient($email,$id=0){
        $check = Client::select('id')->where('email','=',$email)->where('id','<>',$id)->first();
        return (!empty($check['id']))?"1":"0";
    }

    public function getPic(){
        $admin = $this->whois(Session::get('admin_id'));
        if(!empty($admin['avatar'])) {
            //$data='<img src='.url($admin['avatar']).' alt="..." class="img-circle profile_img" width="40">';
            $data='<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="'.url($admin['avatar']).'" alt=""> 
                  </a>';

        }else{
            $dz = explode(" ",$admin['name_surname']);
            $first = strtoupper(substr($dz[0],0,1));
            $second = (!empty($dz[1])) ? strtoupper(substr($dz[1],0,1)):'';
            $cc = $first.$second;
            $data='<span class="m-type m-type--md m--bg-warning"><span class="m--font-light">'.$cc.'</span></span>';
        }//?url($admin['avatar']):null;

        return  $data;
    }
}
