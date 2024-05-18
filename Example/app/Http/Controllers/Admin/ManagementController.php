<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ObjectRequest;
use App\Http\Requests\SeasonRequest;
use App\Models\Objects;
use App\Models\Seasons;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ManagementController extends Controller
{
    //
    public function listSeason()
    {
        $seasons = Seasons::all();
        return view('admin.seasons.season',[
            'title' => 'Các mùa phổ biến'
        ], compact('seasons'));
    }

    public function addSeasonForm()
    {
        return view('admin.seasons.create',[
            'title' => 'Thêm mùa'
        ]);
    }

    public function handleAddSeasonForm(SeasonRequest $request)
    {
        $imageName ="";
        if ($request->file('pictures')) {
            $imagePath = $request->file('pictures');
            $imageName = $imagePath->getClientOriginalName();
  
            $request->file('pictures')->storeAs('/public/images', $imageName);
          }
         // $request->validated()['pictures'] = $imageName;

        //dd($request->validated());

        $data = [
            'pictures'=> $imageName
        ];

        $result = array_merge($request->validated(), $data);

        Seasons::create($result);
        ;

        return redirect()->route('season')->with('success', 'Thêm mới thành công');
    }

    public function deleteSeason($id)
    {
        $seasons = Seasons::find($id);
    
        if($seasons){
            $seasons->delete();
            return redirect()->route("season")->with('success', 'Xóa mùa thành công');
        }
    
        return back()->with('error', 'Not found');
    }

    public function listObject()
    {
        $objects = Objects::all();
        return view('admin.objects.object',[
            'title' => 'Các đối tượng phổ biến'
        ], compact('objects'));
    }
    public function addObjectForm()
    {
        return view('admin.objects.create',[
            'title' => 'Thêm đối tượng'
        ]);
    }
    
    public function handleAddObject(ObjectRequest $request)
    {
        
        $imageName ="";
        if ($request->file('pictures')) {
            $imagePath = $request->file('pictures');
            $imageName = $imagePath->getClientOriginalName();
            
            $request->file('pictures')->storeAs('/public/images', $imageName);
          }
        $data = [
            'pictures'=> $imageName
        ];
        
        $result = array_merge($request->validated(), $data);
        
        Objects::create($result);
        
        
        return redirect()->route('object')->with('success', 'Thêm mới thành công');
    }

    public function deleteObject($id)
    {
        $objects = Objects::find($id);
    
        if($objects){
            $objects->delete();
            return redirect()->route("object")->with('success', 'Xóa đối tượng thành công');
        }
    
        return back()->with('error', 'Not found');
    }
}
