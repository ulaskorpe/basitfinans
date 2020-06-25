<?php

namespace App\Http\Controllers;

use App\Models\NakitTypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;



class MaliTabloController extends Controller
{

    use MenuTrait;

    public function gelirTablosu(){
        $data=array();
        $data['who']=$this->whois();

        return view('muhasebe_vergi.mali_tablolar.gelir_tablosu',$data);
    }


    public function bilanco(){
        $data=array();
        $data['who']=$this->whois();
        return view('muhasebe_vergi.mali_tablolar.bilanco',$data);
    }

    public function nakitAkisi(){
        // echo Session::get('session_id');
        $data=array();
        $data['who']=$this->whois();

        //$data['months'] = ['Ocak','Şubat','Mart','Nisan','Mayıs','Haziran','Temmuz','Ağustos','Eylül','Ekim','Kasım','Aralık'];
        return view('muhasebe_vergi.mali_tablolar.nakit_akisi',$data);
    }

    public function nakitAkisiInner(){
        $data=array();
        $data['who']=$this->whois();
        $data['months'] = [[1,'Ocak'],[2,'Şubat'],[3,'Mart'],[4,'Nisan'],[5,'Mayıs'],[6,'Haziran'],[7,'Temmuz'],[8,'Ağustos'],[9,'Eylül'],[10,'Ekim'],[11,'Kasım'],[12,'Aralık']];

        $data['incomes'] = NakitTypes::with('subtypes')
            ->where('user_id','=',$data['who']['user_id'])
            ->where('guest_id','=',$data['who']['guest_id'])
            ->where('type','=',1)->where('parent_type_id','=',0)->orderBy('order')->get();
        $data['expanses'] = NakitTypes::with('subtypes')
            ->where('user_id','=',$data['who']['user_id'])
            ->where('guest_id','=',$data['who']['guest_id'])
            ->where('type','=',0)->where('parent_type_id','=',0)->orderBy('order')->get();
        return view('muhasebe_vergi.mali_tablolar.nakit_akisi_inner',$data);
    }

    public function nakitAkisUstKalem(Request $request,$type=0,$year=0,$id=0){
      //  echo Session::get('session_id').":";
        if ($request->isMethod('post')) {
            $resultArray = DB::transaction(function () use ($request) {

                if(empty($request['id'])){
                    $kalem = new NakitTypes();
                    $msg = 'Üst kalem eklendi';
                    $oldOrder= 0;
                }else{
                    $kalem = NakitTypes::find($request['id']);
                    $oldOrder= $kalem['order'];
                    $msg = 'Üst kalem güncellendi';
                }
                $type = ($request['type']==1)?1:0;
                $kalem->type = $type;
                $kalem->type_name = $request['type_name'];
                $kalem->order = $request['order'];
                $kalem->guest_id = $request['guest_id'];
                $kalem->parent_type_id = 0;
                $kalem->user_id = $request['user_id'];

                    if ($kalem->save()) {

                        if(empty($request['id'])) {

                            $others = NakitTypes::where('user_id', '=', $request['user_id'])->where('guest_id', '=', $request['guest_id'])
                                ->where('order', '>=', $request['order'])
                                ->where('type', '=', $type)
                                ->where('id', '!=', $kalem['id'])
                                ->where('parent_type_id', '=', 0)->get();

                            foreach ($others as $other) {
                                $other->order = $other->order + 1;
                                $other->save();
                            }

                        }else{

                            if($oldOrder != $request['order']){
                                //  echo $oldOrder.":".$request['order'];

                                if($request['order']>$oldOrder){
                                    $others=NakitTypes::where('user_id', '=', $request['user_id'])->where('guest_id', '=', $request['guest_id'])
                                        ->where('type', '=', $type)
                                        ->where('id', '!=', $kalem['id'])
                                        ->where('parent_type_id', '=', 0)
                                        ->where('order','>',$oldOrder)
                                        ->where('order','<=',$request['order'])->get();

                                    foreach ($others as $other) {
                                        $other->order = $other->order - 1 ;
                                        $other->save();
                                    }
                                }else{
                                    $others=NakitTypes::where('user_id', '=', $request['user_id'])->where('guest_id', '=', $request['guest_id'])
                                        ->where('order','<',$oldOrder)
                                        ->where('order','>=',$request['order'])
                                        ->where('type', '=', $type)
                                        ->where('id', '!=', $kalem['id'])
                                        ->where('parent_type_id', '=', 0)
                                        ->get();
                                    foreach ($others as $other) {
                                        $other->order = $other->order + 1 ;
                                        $other->save();
                                    }
                                }
                            }///order changed
                        }

                        return ['msg' =>$msg, 'result' => 'success', 'link' => route('nakit-akisi'), 'field' => ''];
                    } else {
                        return ['msg' => __('errors.user_inactive'), 'result' => 'error', 'link' => '', 'field' => 'email'];
                    }

            });
            //   return json_encode(['msg' => $resultArray['msg'], 'result' => $resultArray['result'], 'link' => $resultArray['link'], 'field' => $resultArray['field']]);
            return json_encode($resultArray);
        }
        $data=array();
        $data['who']=$this->whois();
        $type = ($type==1)?1:0;
        $data['type'] = $type;
        $data['year'] = $year;
        $count = NakitTypes::where('user_id','=',$data['who']['user_id'])
                    ->where('guest_id','=',$data['who']['guest_id'])
                    ->where('type','=',$type)
                    ->where('parent_type_id','=',0)
                    ->count();

        if($id >0 ){
            $data['kalem'] =  NakitTypes::find($id);
            //$count++;
        }else{
            $data['kalem'] =  NakitTypes::find(0);;
            $count++;

        }

        $data['count'] = $count;

        $data['ex'] = ($id>0)?'Güncelle':'Ekle';
        return view('muhasebe_vergi.mali_tablolar.nakit_akis_ust_kalem',$data);
    }


    public function nakitAkisAltKalem(Request $request,$ust_id=0,$id=0){
        //  echo Session::get('session_id').":";
        if ($request->isMethod('post')) {
            $resultArray = DB::transaction(function () use ($request) {

                if(empty($request['id'])){
                    $kalem = new NakitTypes();
                    $msg = 'Üst kalem eklendi';
                    $oldOrder= 0;
                }else{
                    $kalem = NakitTypes::find($request['id']);
                    $oldOrder= $kalem['order'];
                    $msg = 'Üst kalem güncellendi';
                }
                $type = ($request['type']==1)?1:0;
                $kalem->type = $type;
                $kalem->type_name = $request['type_name'];
                $kalem->order = $request['order'];
                $kalem->guest_id = $request['guest_id'];
                $kalem->parent_type_id = 0;
                $kalem->user_id = $request['user_id'];

                if ($kalem->save()) {

                    if(empty($request['id'])) {

                        $others = NakitTypes::where('user_id', '=', $request['user_id'])->where('guest_id', '=', $request['guest_id'])
                            ->where('order', '>=', $request['order'])
                            ->where('type', '=', $type)
                            ->where('id', '!=', $kalem['id'])
                            ->where('parent_type_id', '=', 0)->get();

                        foreach ($others as $other) {
                            $other->order = $other->order + 1;
                            $other->save();
                        }

                    }else{

                        if($oldOrder != $request['order']){
                            //  echo $oldOrder.":".$request['order'];

                            if($request['order']>$oldOrder){
                                $others=NakitTypes::where('user_id', '=', $request['user_id'])->where('guest_id', '=', $request['guest_id'])
                                    ->where('type', '=', $type)
                                    ->where('id', '!=', $kalem['id'])
                                    ->where('parent_type_id', '=', 0)
                                    ->where('order','>',$oldOrder)
                                    ->where('order','<=',$request['order'])->get();

                                foreach ($others as $other) {
                                    $other->order = $other->order - 1 ;
                                    $other->save();
                                }
                            }else{
                                $others=NakitTypes::where('user_id', '=', $request['user_id'])->where('guest_id', '=', $request['guest_id'])
                                    ->where('order','<',$oldOrder)
                                    ->where('order','>=',$request['order'])
                                    ->where('type', '=', $type)
                                    ->where('id', '!=', $kalem['id'])
                                    ->where('parent_type_id', '=', 0)
                                    ->get();
                                foreach ($others as $other) {
                                    $other->order = $other->order + 1 ;
                                    $other->save();
                                }
                            }
                        }///order changed
                    }

                    return ['msg' =>$msg, 'result' => 'success', 'link' => route('nakit-akisi'), 'field' => ''];
                } else {
                    return ['msg' => __('errors.user_inactive'), 'result' => 'error', 'link' => '', 'field' => 'email'];
                }

            });
            //   return json_encode(['msg' => $resultArray['msg'], 'result' => $resultArray['result'], 'link' => $resultArray['link'], 'field' => $resultArray['field']]);
            return json_encode($resultArray);
        }
        $data=array();
        $data['who']=$this->whois();
        $type = ($type==1)?1:0;
        $data['type'] = $type;
        $data['year'] = $year;
        $count = NakitTypes::where('user_id','=',$data['who']['user_id'])
            ->where('guest_id','=',$data['who']['guest_id'])
            ->where('type','=',$type)
            ->where('parent_type_id','=',0)
            ->count();

        if($id >0 ){
            $data['kalem'] =  NakitTypes::find($id);
            //$count++;
        }else{
            $data['kalem'] =  NakitTypes::find(0);;
            $count++;

        }

        $data['count'] = $count;

        $data['ex'] = ($id>0)?'Güncelle':'Ekle';
        return view('muhasebe_vergi.mali_tablolar.nakit_akis_ust_kalem',$data);
    }


    public function nakitAkisUstKalemGetOrder($type = 0,$id=0){
        $data=array();
        $data['who']=$this->whois();
        $type = ($type==1)?1:0;

        $count = NakitTypes::where('user_id','=',$data['who']['user_id'])->where('guest_id','=',$data['who']['guest_id'])
                    ->where('type','=',$type)
                    ->where('parent_type_id','=',0)
                    ->count();
        $txt="";
        for($i=($count+1);$i>0;$i--){
            $txt.="<option value='".$i."'>".$i."</option>";
        }
        return $txt;

    }

}
