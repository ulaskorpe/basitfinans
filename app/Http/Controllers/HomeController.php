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

class HomeController extends Controller
{
    use MenuTrait;

    public function index()
    {
        $data=array();
        $data['who']=$this->whois(Session::get('user_id'));
        return view('index',$data);
    }



    public function stopajHesaplama()
    {
        $data=array();
        $data['who']=$this->whois(Session::get('user_id'));
        return view('muhasebe_vergi.stopaj_hesaplama',$data);
    }
    public function amortisman()
    {
        $data=array();
        $data['who']=$this->whois(Session::get('user_id'));
        return view('muhasebe_vergi.amortisman',$data);
    }


    public function amortismanInner($a_orani,$a_yontemi,$tutar)
    {
        $data=array();
        $data['a_orani']=$a_orani;
        $data['a_yontemi']=$a_yontemi;
        $data['tutar']=$tutar;
        $data['who']=$this->whois(Session::get('user_id'));
        return view('muhasebe_vergi.amortisman_inner',$data);
    }

    private function renameFile($file, $width = 0, $height = 0, $aspect = 1)
    {

        $height = (!empty($height) && is_numeric($height) && $height > 0) ? $height : 'A';
        $width = (!empty($width) && is_numeric($width) && $width > 0) ? $width : 'A';

        $aspect = ($aspect) ? "aspected" : "no";
        $add = $width . "x" . $height . "_" . $aspect;

        $farray = explode('/', $file);
        $fileName = $farray[count($farray) - 1];

        $extArray = explode(".", $fileName);
        $ext = $extArray[count($extArray) - 1];

        $newFileName = "";
        for ($i = 0; $i < count($extArray) - 1; $i++) {
            $newFileName .= $extArray[$i];
        }
        $newFileName = $newFileName . "_" . $add . "." . $ext;
        return str_replace($fileName, $newFileName, $file);

    }

    public function getCommonFile(Request $request)
    {


        if ($request->h || $request->w) {

            $filename = public_path($request->input("u"));
            $newFilename = $this->renameFile($filename, $request->w, $request->h, $request->a);
            $mime = \GuzzleHttp\Psr7\mimetype_from_filename($filename);

            if (!is_file($newFilename)) {

                if (empty($request->h)) {

                    Image::make($filename)->widen($request->w, function ($constraint) use ($request) {
                        if ($request->a)
                            $constraint->aspectRatio();
                    })->save($newFilename);

                } elseif (empty($request->w)) {

                    Image::make($filename)->heighten($request->h, function ($constraint) use ($request) {
                        if ($request->a)
                            $constraint->aspectRatio();
                    })->save($newFilename);

                } else {

                    Image::make($filename)->resize($request->w, $request->h, function ($constraint) use ($request) {
                        if ($request->a)
                            $constraint->aspectRatio();
                    })->save($newFilename);


                }
            }
        } else {

            $newFilename = public_path($request->input("u"));
            //return $newFilename;
            $mime = \GuzzleHttp\Psr7\mimetype_from_filename($newFilename);
        }

        return response()->file($newFilename, [
            'Content-Type' => $mime,
            'Content-Disposition' => 'inline; filename="' . $newFilename . '"',
            //'Cache-Control' => 'public, max-age=604800'// 1 weeek
            'Cache-Control' => 'public, max-age=800'// 1 weeek
        ]);
    }

    public function checkImage($image){
        $allowed = ['jpg','jpeg','png'];
        $ext = GeneralHelper::findExtension($image);
        //echo $ext;

        if(in_array($ext,$allowed)){
            return "ok";
        }else{
            return 0;
        }
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


