<?php

namespace App\Http\Controllers;

use App\Facalty;
use App\Item;
use App\Varsity;
use App\VarsityDetail;
use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class VarsityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $varsities = Varsity::with(
                'varsityDetails.language' ,
                'item.alumnis.alumniDetails' ,
                'item.files' ,
                'division.divisionDetails',
                'district.districtDetails',
                'facalties.facaltyDetails',
                'departments.departmentDetails'
                )->get();
        return response()->json($varsities);
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
//            'language_id'=>'required',
//            'location'=>'required',
//            'number_of_student'=>'required',
//            'number_of_professor'=>'required',
//            'number_of_assistance_professor'=>'required',
//            'number_of_lecturer'=>'required',
//            'division_id'=>'required',
//            'district_id'=>'required',
//
//            'varsity_name'=>'required',
//            'study'=>'required',
//            'quality'=>'required',
//            'detail'=>'required',
//            'campus_life'=>'required',
//            'backround_and_history'=>'required',
//            'achievements'=>'required'
        ];
        $this->validate($request , $rules);
        $varsity_data = $request->only([
                    'location',
                    'number_of_student',
                    'number_of_professor',
                    'number_of_assistance_professor',
                    'number_of_lecturer',
                    'division_id',
                    'district_id'
                ]);

        $varsity_detail_data=$request->only([
                    'language_id',
                    'varsity_name',
                    'study',
                    'quality',
                    'detail',
                    'campus_life',
                    'backround_and_history',
                    'achievements'
                ]);
        $item = Item::create(['item_type_id'=>1]);
        $varsity_data['item_id']=$item->id;
        $varsity = Varsity::create($varsity_data);

        if($request->has('facalty_ids')){
            $facalty_ids = $request->get('facalty_ids');
            $varsity->facalties()->attach($facalty_ids);
        }
        if($request->has('department_ids')){
            $department_ids = $request->get('department_ids');
            $varsity->departments()->attach($department_ids);
        }
        if($request->has('image')){
            $image= $request->file('image');
            $ext = $request->file('image')->getClientOriginalExtension();
            $filename    = $image->getClientOriginalName();
            $unique_name = md5($filename. time()).'.'.$ext;
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(800, 550);
            $image_resize->save(public_path('img/' .$unique_name));
           //$image_name = $request->image->store('');
           File::create(['item_id'=>$item->id , 'name'=>$unique_name , 'file_type_id'=>1]);
        }else{
            File::create(['item_id'=>$item->id , 'name'=>'no_image.jpg' , 'file_type_id'=>1]);
        }

        $varsity_detail_data['varsity_id'] = $varsity->id;
        VarsityDetail::create($varsity_detail_data);
        return response()->json($varsity);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Varsity  $varsity
     * @return \Illuminate\Http\Response
     */
    public function show(Varsity $varsity)
    {
        $varsity_details = $varsity->where('id' , $varsity->id)->with(
            'varsityDetails.language' ,
            'item.alumnis.alumniDetails' ,
            'item.files' ,
            'item.notices' ,
            'division.divisionDetails',
            'district.districtDetails',
            'facalties.facaltyDetails',
            'departments.departmentDetails'
        )->get();
        return response()->json($varsity_details[0]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Varsity  $varsity
     * @return \Illuminate\Http\Response
     */
    public function edit(Varsity $varsity){
        echo "I am working";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Varsity  $varsity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)

    {

        $varsity_id = $request->get('varsity_id');

        $varsity_data = $request->only([
            'number_of_student',
            'number_of_professor',
            'number_of_assistance_professor',
            'number_of_lecturer',
            'division_id',
            'district_id'
        ]);
        Varsity::where('id' , $varsity_id)->update($varsity_data);
        $varsity_detail_data=$request->only([
            'language_id',
            'varsity_name',
            'study',
            'quality',
            'detail',
            'campus_life',
            'backround_and_history',
            'achievements'
        ]);
        VarsityDetail::where('varsity_id' , $varsity_id)->update($varsity_detail_data);
        $varsity = Varsity::find($varsity_id);
        if($request->has('facalty_ids')){
            $facalty_ids = $request->get('facalty_ids');
            $varsity->facalties()->detach();
            $varsity->facalties()->attach($facalty_ids);
        }
        if($request->has('department_ids')){
            $department_ids = $request->get('department_ids');
            $varsity->departments()->detach();
            $varsity->departments()->attach($department_ids);
        }
        if($request->has('image')){
            $image= $request->file('image');
            $ext = $request->file('image')->getClientOriginalExtension();
            $filename    = $image->getClientOriginalName();
            $unique_name = md5($filename. time()).'.'.$ext;
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(800, 550);
            $image_resize->save(public_path('img/' .$unique_name));
            File::where('item_id' , $varsity->item_id)->delete();
            File::create(['item_id'=>$varsity->item_id, 'name'=>$unique_name , 'file_type_id'=>1]);
        }
        $varsity_details = $varsity->where('id' , $varsity_id)->with(
            'varsityDetails.language' ,
            'item.alumnis.alumniDetails' ,
            'item.files' ,
            'division.divisionDetails',
            'district.districtDetails',
            'facalties.facaltyDetails',
            'departments.departmentDetails'
        )->get();
        return response()->json($varsity_details);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Varsity  $varsity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Varsity $varsity)
    {
        $file = File::where('item_id' , $varsity->item_id)->get();
        $file_name = $file[0]->name;
        Storage::delete($file_name);
        $varsity->departments()->detach();
        $varsity->facalties()->detach();
        Item::where('id' , $varsity->item_id)->delete();
        File::where('item_id' , $varsity->item_id)->delete();
        VarsityDetail::where('varsity_id' , $varsity->id)->delete();
        $varsity->delete();
        return $varsity;
    }
}
