<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ClientExecutive;
use Illuminate\Http\Request;
use App\Http\Controllers\Helpers\GeneralHelper;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ClientController extends Controller
{
    use MenuTrait;


    public function index(){
        $data=array();
        $data['who'] = $this->whois(Session::get('user_id'));
        $data['clients'] = Client::all();


        return view('client.index',$data);

    }

    public function create(Request $request){

        if ($request->isMethod('post')) {
            $messages = [];
            $rules = [
                'email'=>'required|unique:clients',

            ];
            $this->validate($request, $rules, $messages);
            $resultArray = DB::transaction(function () use ($request) {

                $array = ['name','title','email','phone','website','address','description'];
                $client = new Client();
                foreach ($array as $item){
                $client->$item = (!empty($request[$item])) ? $request[$item]:'';
                }

                $file = $request->file('logo');
                if (!empty($file)) {
                    $path = public_path("img/clients/" . $client->id);
                    $filename = GeneralHelper::fixName($request['name_surname']) . "_" . date('YmdHis') . "." . GeneralHelper::findExtension($file->getClientOriginalName()); //FileHelper::fixname($personnel['name']).".". FileHelper::findExtension($file->getClientOriginalName());
                    $file->move($path, $filename);
                    $client->logo = "img/clients/" . $client->id . "/" . $filename;
                }
                $client->save();
                return ['msg' => __('admin.client_created'),'id'=>$client->id ];
            });


            return json_encode(['msg' => $resultArray['msg'], 'id' => $resultArray['id']]);

        }else{

            $data=array();
            $data['who'] = $this->whois(Session::get('user_id'));
            $data['settings'] = $this->findSetting(Session::get('user_id'));
            return view('client.create',$data);
        }
    }


    public function update($id=0,$active=1,Request $request){

        if ($request->isMethod('post')) {
            $messages = [];
            $rules = [


            ];
            $this->validate($request, $rules, $messages);
            $resultArray = DB::transaction(function () use ($request) {

                $array = ['name','title','email','phone','website','address','description'];
                $client = Client::find($request['id']);
                foreach ($array as $item){
                    $client->$item = (!empty($request[$item])) ? $request[$item]:'';
                }

                $file = $request->file('logo');
                if (!empty($file)) {
                    $path = public_path("img/clients/" . $client->id);
                    $filename = GeneralHelper::fixName($request['name_surname']) . "_" . date('YmdHis') . "." . GeneralHelper::findExtension($file->getClientOriginalName()); //FileHelper::fixname($personnel['name']).".". FileHelper::findExtension($file->getClientOriginalName());
                    $file->move($path, $filename);
                    $client->logo = "img/clients/" . $client->id . "/" . $filename;
                }
                $client->save();
                return ['msg' => __('admin.client_updated'),'id'=>$client->id ];
            });


            return json_encode(['msg' => $resultArray['msg'], 'id' => $resultArray['id']]);

        }else{

            $data=array();
            $data['active']=$active;
            $data['client'] = Client::find($id);
            $data['executives']=ClientExecutive::where('client_id','=',$id)->get();
            $data['who'] = $this->whois(Session::get('user_id'));
            $data['settings'] = $this->findSetting(Session::get('user_id'));
            return view('client.update',$data);
        }
    }


    public function createExecutive(Request $request,$client_id=0){
        if ($request->isMethod('post')) {
            $messages = [];
            $rules = [
                'email'=>'required|unique:client_executives',

            ];
            $this->validate($request, $rules, $messages);
            $resultArray = DB::transaction(function () use ($request) {

                $array = ['name','email','phone','description','client_id'];
                $clientExecutive = new ClientExecutive();
                foreach ($array as $item){
                    $clientExecutive->$item = (!empty($request[$item])) ? $request[$item]:'';
                }

                $file = $request->file('image');
                if (!empty($file)) {
                    $path = public_path("img/clients/" . $request['client_id']);
                    $filename = GeneralHelper::fixName($request['name']) . "_" . date('YmdHis') . "." . GeneralHelper::findExtension($file->getClientOriginalName()); //FileHelper::fixname($personnel['name']).".". FileHelper::findExtension($file->getClientOriginalName());
                    $file->move($path, $filename);
                    $clientExecutive->image = "img/clients/" . $request['client_id'] . "/" . $filename;
                }
                $clientExecutive->save();
                return ['msg' => __('admin.executive_created'),'id'=>$clientExecutive->id ];
            });


            return json_encode(['msg' => $resultArray['msg'], 'id' => $resultArray['id']]);

        }else{

            $data=array();
            $data['client']=Client::find($client_id);
            $data['who'] = $this->whois(Session::get('user_id'));
            $data['settings'] = $this->findSetting(Session::get('user_id'));
            return view('client.executive.create',$data);
        }
    }
    public function updateExecutive(Request $request,$id=0){
        if ($request->isMethod('post')) {
            $messages = [];
            $rules = [


            ];
            $this->validate($request, $rules, $messages);
            $resultArray = DB::transaction(function () use ($request) {

                $array = ['name','email','phone','description'];
                $clientExecutive = ClientExecutive::find($request['id']);
                foreach ($array as $item){
                    $clientExecutive->$item = (!empty($request[$item])) ? $request[$item]:'';
                }

                $file = $request->file('image');
                if (!empty($file)) {
                    $path = public_path("img/clients/" . $request['client_id']);
                    $filename = GeneralHelper::fixName($request['name']) . "_" . date('YmdHis') . "." . GeneralHelper::findExtension($file->getClientOriginalName()); //FileHelper::fixname($personnel['name']).".". FileHelper::findExtension($file->getClientOriginalName());
                    $file->move($path, $filename);
                    $clientExecutive->image = "img/clients/" . $request['client_id'] . "/" . $filename;
                }
                $clientExecutive->save();
                return ['msg' => __('admin.executive_updated'),'id'=>$clientExecutive->id ];
            });


            return json_encode(['msg' => $resultArray['msg'], 'id' => $resultArray['id']]);

        }else{

            $data=array();
            $data['executive'] = ClientExecutive::find($id);
            $data['client']=Client::find($data['executive']['client_id']);
            $data['who'] = $this->whois(Session::get('user_id'));
            $data['settings'] = $this->findSetting(Session::get('user_id'));
            return view('client.executive.update',$data);
        }
    }

    public function deleteExecutive($id){

        ClientExecutive::where('id','=',$id)->delete();
        return json_encode(['msg' => __('admin.executive_deleted'), 'id' =>$id]);

    }

}
