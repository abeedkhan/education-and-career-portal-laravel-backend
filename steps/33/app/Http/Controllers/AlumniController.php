<?php

namespace App\Http\Controllers;

use App\Alumni;
use App\AlumniDetail;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Item $item)
    {
       $item_detail = $item->where('id' , $item->id)->with('alumnis.alumniDetails')->get();
       return response()->json($item_detail[0]->alumnis);
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
            'item_id'=>"required",
            'language_id'=>"required",
            'alumni_name'=>"required",
            'about'=>"required",
        ];
        $validation = $this->validate($request , $rules);
        $image_name = "alumni.png";
        if($request->has('image')){
            $image= $request->file('image');
            $ext = $request->file('image')->getClientOriginalExtension();
            $filename    = $image->getClientOriginalName();
            $unique_name = md5($filename. time()).'.'.$ext;
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(450, 450);
            $image_resize->save(public_path('img/alumni/' .$unique_name));
            $image_name = $unique_name;
        }
        $item_id = $request->get('item_id');
        $alumni = Alumni::create(['item_id'=>$item_id]);
        $alumni_id = $alumni->id;
        $data = $request->only('alumni_name' , 'language_id' , 'about');
        $data['alumni_id'] = $alumni_id;
        $data['alumni_image'] = $image_name;
        $alumni = AlumniDetail::create($data);
        return response()->json($alumni , 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Alumni  $alumni
     * @return \Illuminate\Http\Response
     */
    public function show($alumni_id)
    {
        $alumni = Alumni::where('id' , $alumni_id)->with('alumniDetails')->get();
        return response()->json($alumni[0]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alumni  $alumni
     * @return \Illuminate\Http\Response
     */
    public function edit(Alumni $alumni)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alumni  $alumni
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $rules = [
            'alumni_id'=>"required",
            'alumni_name'=>"required",
            'about'=>"required",
        ];
        $validation = $this->validate($request , $rules);
        $data = $request->only(
            'alumni_id',
            'alumni_name',
            'about'
        );
        $alumni_detail = AlumniDetail::where('alumni_id' , $data['alumni_id'])->get();
        $image_name = $alumni_detail[0]['alumni_image'];

        if($request->has('image')){
            if($image_name != "alumni.png"){
                Storage::delete('alumni/'.$image_name);
            }
            $image= $request->file('image');
            $ext = $request->file('image')->getClientOriginalExtension();
            $filename    = $image->getClientOriginalName();
            $unique_name = md5($filename. time()).'.'.$ext;
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(450, 450);
            $image_resize->save(public_path('img/alumni/' .$unique_name));
            $image_name = $unique_name;
        }

        $data['alumni_image'] = $image_name;
        AlumniDetail::where('alumni_id' , $data['alumni_id'])->update($data);
        $updated_alumni = AlumniDetail::where('alumni_id' , $data['alumni_id'])->get();
        return response()->json($updated_alumni);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alumni  $alumni
     * @return \Illuminate\Http\Response
     */
    public function destroy($alumni_id)
    {
        $alumni = Alumni::find($alumni_id);
        $alumni_detail = AlumniDetail::where('alumni_id' , $alumni_id)->get()[0];
        $alumni_image = $alumni_detail["alumni_image"];
        AlumniDetail::where('alumni_id' , $alumni_id)->delete();
        Alumni::where('id' , $alumni_id)->delete();
        if($alumni_image != "alumni.png"){
            Storage::delete('alumni/'.$alumni_image);
        }
       return response()->json($alumni_detail);
    }
}
