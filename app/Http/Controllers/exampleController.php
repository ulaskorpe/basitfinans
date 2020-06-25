<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class exampleController extends Controller
{
    public function index(){


        $data = $this->menuItems();
        $data['galleries']=Gallery::orderBy('order')->get();

        return view('admin.gallery.index',$data);
    }
    public function create(Request $request){
        if ($request->isMethod('post')) {
            $messages = [];
            $rules = [
                'title'=>'required',
                'image' => 'mimes:png,jpg,jpeg'
                //    'content'=>'required'
            ];
            $this->validate($request, $rules, $messages);

            $galleryID=  DB::transaction(function () use ($request) {
                $gallery = new Gallery();
                $gallery->title  = $request['title'];
                $gallery->plot  = $request['plot'];
                $gallery->menu_title  = (!empty($request['menu_title']))?$request['menu_title']:substr($request['title'],0,50);
                $gallery->keywords  = $request['keywords'];
                $gallery->description  = $request['description'];
                $gallery->language  = $request['language'];
                $gallery->content  = $request['real_content'];
                $gallery->show  = $request['show'];
                $gallery->order  = $request['order'];
                $gallery->save();



                $file = $request->file('image');
                if (!empty($file)) {
                    $path = public_path("img/gallery_files/".$gallery->id);
                    $filename = GeneralHelper::fixName($request['title']) . "_" . date('YmdHis') . "." . GeneralHelper::findExtension($file->getClientOriginalName()); //FileHelper::fixname($personnel['name']).".". FileHelper::findExtension($file->getClientOriginalName());
                    $file->move($path, $filename);
                    $gallery->image = "img/gallery_files/".$gallery->id."/" . $filename;
                    $gallery->save();

                }

                $others=Gallery::where('id','!=',$gallery->id)
                    ->where('order','>=',$request['order'])->get();
                foreach ($others as $other) {
                    $other->order = $other->order + 1 ;
                    $other->save();
                }
                return $gallery->id;
            });



            return  json_encode(['msg'=>__('admin.gallery_added'),'id'=>$galleryID]);


        }

        $data = $this->menuItems();



        return view('admin.gallery.create_gallery',$data);
    }
    public function update(Request $request,$id=0){

        if ($request->isMethod('post')) {
            $selectedgallery = Gallery::find($request['gallery_id']);
            $oldOrder= $selectedgallery->order;

            $messages = [];
            $rules = [
                'title'=>'required',
                'image' => 'mimes:png,jpg,jpeg'
                //    'content'=>'required'

            ];
            $this->validate($request, $rules, $messages);




            DB::transaction(function () use ($request,$oldOrder,$selectedgallery) {

                // $selectedgallery = gallery::find($request['gallery_id']);
                $selectedgallery->title  = $request['title'];
                $selectedgallery->plot  = $request['plot'];
                $selectedgallery->menu_title  = (!empty($request['menu_title']))?$request['menu_title']:substr($request['title'],0,50);
                $selectedgallery->keywords  = $request['keywords'];
                $selectedgallery->description  = $request['description'];
                $selectedgallery->language  = $request['language'];
                $selectedgallery->content  = $request['real_content'];
                //$selectedgallery->type  = $request['type'];
                $selectedgallery->show  = $request['show'];
                $selectedgallery->order  = $request['order'];
                $selectedgallery->save();

                $file = $request->file('image');
                if (!empty($file)) {
                    $path = public_path("img/gallery_files/".$selectedgallery->id."/");
                    $filename = GeneralHelper::fixName($request['title']) . "_" . date('YmdHis') . "." . GeneralHelper::findExtension($file->getClientOriginalName()); //FileHelper::fixname($personnel['name']).".". FileHelper::findExtension($file->getClientOriginalName());
                    $file->move($path, $filename);
                    $selectedgallery->image = "img/gallery_files/".$selectedgallery->id."/" . $filename;
                    $selectedgallery->save();
                }


                if($oldOrder != $request['order']){
                    //  echo $oldOrder.":".$request['order'];

                    if($request['order']>$oldOrder){
                        $others=Gallery::where('id','!=',$selectedgallery->id)
                            ->where('order','>',$oldOrder)
                            ->where('order','<=',$request['order'])->get();

                        foreach ($others as $other) {
                            $other->order = $other->order - 1 ;
                            $other->save();
                        }
                    }else{
                        $others=Gallery::where('id','!=',$selectedgallery->id)
                            ->where('order','<',$oldOrder)
                            ->where('order','>=',$request['order'])
                            ->get();
                        foreach ($others as $other) {
                            $other->order = $other->order + 1 ;
                            $other->save();
                        }
                    }
                }///order changed
            });


            return  json_encode(['msg'=>__('admin.gallery_updated'),'id'=>$selectedgallery->id]);


        }else{

            $selectedgallery = Gallery::find($id);

        }

        $data = $this->menuItems();
        $data['types'] = $this->types;
        $data['gallery'] = $selectedgallery;
        $data['count']=Gallery::where('id','>',0)->get()->count();
        $data['countImage'] = GalleryImage::where('gallery_id','=',$selectedgallery->id)->count();

        return view('admin.gallery.update_gallery',$data);
    }
    public function get_end(){
        $articles = Gallery::where('id','>',0)->count();
        return $articles;
    }
    public function get_end_images($gallery_id=0){
        $count = GalleryImage::where('gallery_id','=',$gallery_id)->count();
        return $count;
    }
    public function galleryImages($gallery_id=0){
        $data = $this->menuItems();
        $data['images']=GalleryImage::where('gallery_id','=',$gallery_id)->orderBy('order')->get();
        $data['gallery']=Gallery::find($gallery_id);
        return view('admin.gallery.images',$data);
    }




    public function galleryImagesCreate(Request $request,$gallery_id=0){
        if ($request->isMethod('post')) {
            $messages = [];
            $rules = [

                'title'=>'required',
                'image' => 'mimes:png,jpg,jpeg'
                //    'content'=>'required'
            ];
            $this->validate($request, $rules, $messages);

            $imageID=  DB::transaction(function () use ($request) {
                $image = new GalleryImage();
                $image->title  = $request['title'];
                $image->keywords  = $request['keywords'];
                $image->description  = $request['description'];
                $image->gallery_id  = $request['gallery_id'];
                $image->show  = $request['show'];
                $image->order  = $request['order'];
                $image->save();



                $file = $request->file('image');
                if (!empty($file)) {
                    $path = public_path("img/gallery_files/".$image->gallery_id);
                    $filename = GeneralHelper::fixName($request['title']) . "_" . date('YmdHis') . "." . GeneralHelper::findExtension($file->getClientOriginalName()); //FileHelper::fixname($personnel['name']).".". FileHelper::findExtension($file->getClientOriginalName());
                    $file->move($path, $filename);
                    $image->image = "img/gallery_files/".$image->gallery_id."/" . $filename;
                    $image->save();

                }

                $others=GalleryImage::where('id','!=',$image->id)->where('gallery_id','=',$request['gallery_id'])
                    ->where('order','>=',$request['order'])->get();
                foreach ($others as $other) {
                    $other->order = $other->order + 1 ;
                    $other->save();
                }
                return $image->id;
            });



            return  json_encode(['msg'=>__('admin.image_added'),'id'=>$imageID,'gallery_id'=>$request['gallery_id']]);


        }

        $data = $this->menuItems();
        $data['gallery']=Gallery::find($gallery_id);


        return view('admin.gallery.create_image',$data);
    }


    public function galleryImagesUpdate(Request $request,$gallery_id=0,$image_id=0){
        if ($request->isMethod('post')) {

            $selectedImage = GalleryImage::find($request['image_id']);
            $oldOrder= $selectedImage->order;

            $messages = [];
            $rules = [

                'title'=>'required',
                'image' => 'mimes:png,jpg,jpeg'
                //    'content'=>'required'
            ];
            $this->validate($request, $rules, $messages);

            $imageID=  DB::transaction(function () use ($request,$oldOrder,$selectedImage) {

                $selectedImage->title  = $request['title'];
                $selectedImage->keywords  = $request['keywords'];
                $selectedImage->description  = $request['description'];
                $selectedImage->gallery_id  = $request['gallery_id'];
                $selectedImage->show  = $request['show'];
                $selectedImage->order  = $request['order'];
                $selectedImage->save();

                $file = $request->file('image');
                if (!empty($file)) {
                    $path = public_path("img/gallery_files/".$selectedImage->gallery_id);
                    $filename = GeneralHelper::fixName($request['title']) . "_" . date('YmdHis') . "." . GeneralHelper::findExtension($file->getClientOriginalName()); //FileHelper::fixname($personnel['name']).".". FileHelper::findExtension($file->getClientOriginalName());
                    $file->move($path, $filename);
                    $selectedImage->image = "img/gallery_files/".$selectedImage->gallery_id."/" . $filename;
                    $selectedImage->save();

                }

                if($oldOrder != $request['order']){
                    //  echo $oldOrder.":".$request['order'];

                    if($request['order']>$oldOrder){
                        $others=GalleryImage::where('id','!=',$selectedImage->id)
                            ->where('order','>',$oldOrder)
                            ->where('gallery_id','=',$selectedImage->gallery_id)
                            ->where('order','<=',$request['order'])->get();

                        foreach ($others as $other) {
                            $other->order = $other->order - 1 ;
                            $other->save();
                        }
                    }else{
                        $others=GalleryImage::where('id','!=',$selectedImage->id)
                            ->where('order','<',$oldOrder)
                            ->where('gallery_id','=',$selectedImage->gallery_id)
                            ->where('order','>=',$request['order'])
                            ->get();
                        foreach ($others as $other) {
                            $other->order = $other->order + 1 ;
                            $other->save();
                        }
                    }
                }///order changed


                return $selectedImage->id;
            });



            return  json_encode(['msg'=>__('admin.image_updated'),'id'=>$imageID,'gallery_id'=>$selectedImage->gallery_id]);


        }else{
            $selectedImage = GalleryImage::find($image_id);
        }


        $data = $this->menuItems();
        $data['gallery']=Gallery::find($gallery_id);
        $data['image']=$selectedImage;
        $data['count']=GalleryImage::where('gallery_id','=',$selectedImage->gallery_id)->count();


        return view('admin.gallery.update_image',$data);
    }
}
