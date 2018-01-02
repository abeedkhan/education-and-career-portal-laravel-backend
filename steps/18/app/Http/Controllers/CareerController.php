<?php

namespace App\Http\Controllers;

use App\Career;
use App\CareerDetail;
use App\File;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $career_details = Career::with(
            'careerDetails' ,
            'item.files')->get();
        return response()->json($career_details);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
        'language_id'=>'required',
        'career_title'=>'required',
        'career_description'=>'required',
        'instructions'=>'required'
        ];
        $this->validate($request , $rules);
        $item = Item::create(['item_type_id'=>2]);
        $career_data = ['item_id'=>$item->id];
        $career = Career::create($career_data);

        $career_detail_data = $request->only([
            'language_id',
            'career_title',
            'career_description',
            'instructions',
        ]);
        $career_detail_data['career_id'] = $career->id;
        CareerDetail::create($career_detail_data );
        if($request->has('image')){
            $image= $request->file('image');
            $ext = $request->file('image')->getClientOriginalExtension();
            $filename    = $image->getClientOriginalName();
            $unique_name = md5($filename. time()).'.'.$ext;
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(350, 542);
            $image_resize->save(public_path('img/' .$unique_name));
            //$image_name = $request->image->store('');
            File::create(['item_id'=>$item->id , 'name'=>$unique_name , 'file_type_id'=>1]);
        }else{
            File::create(['item_id'=>$item->id , 'name'=>'no_image_career.jpg' , 'file_type_id'=>1]);
        }
        return response()->json($career);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function show(Career $career)
    {
        $career_details = $career->where('id' , $career->id)->with(
            'careerDetails' ,
            'item.files')->get();
        return response()->json($career_details[0]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function edit(Career $career)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $rules = [
            'career_title'=>'required',
            'career_description'=>'required',
            'instructions'=>'required',
            'career_id'=>'required'
        ];
        $this->validate($request , $rules);
        $career_detail_data = $request->only([
            'career_title',
            'career_description',
            'instructions',
        ]);
        $career_id = $request->get('career_id');

        $career_details = Career::where('id' , $career_id)->with(
            'careerDetails' ,
            'item.files')->get();

        CareerDetail::where('career_id' ,$career_id)->update($career_detail_data);
        $career_image = $career_details[0]->item->files[0]->name;
        $career = $career_details = Career::where('id' , $career_id)->with('item.files')->get()[0];
        $item_id = $career->item->id;

        if($request->has('image')){
            $image= $request->file('image');
            $ext = $request->file('image')->getClientOriginalExtension();
            $filename    = $image->getClientOriginalName();
            $unique_name = md5($filename. time()).'.'.$ext;
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(350, 542);
            $image_resize->save(public_path('img/' .$unique_name));
            File::where('item_id' , $item_id)->delete();
            if($career_image!="no_image_career.jpg"){
                Storage::delete($career_image);

            }
            File::create(['item_id'=>$item_id, 'name'=>$unique_name , 'file_type_id'=>1]);

        }else{
            File::create(['item_id'=>$item_id , 'name'=>'no_image_career.jpg' , 'file_type_id'=>1]);
        }
        $career = $career_details = Career::where('id' , $career_id)->with('item.files' , 'careerDetails')->get()[0];
        return response()->json($career);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function destroy(Career $career)
    {
        $file = File::where('item_id' , $career->item_id)->get();
        if(count($file)){
            $file_name = $file[0]->name;
            if($file_name !="no_image_career.jpg"){
                Storage::delete($file_name);
            }
        }
        Item::where('id' , $career->item_id)->delete();
        File::where('item_id' , $career->item_id)->delete();
        CareerDetail::where('career_id' , $career->id)->delete();
        $career->delete();
        return $career;
    }
}
