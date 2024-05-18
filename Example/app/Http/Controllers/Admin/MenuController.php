<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use App\Models\Disease;
use App\Models\Objects;
use App\Models\Seasons;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Expr\FuncCall;
use App\Http\Services\Menu\MenuService;
use App\Models\Menu;

class MenuController extends Controller
{


    protected $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }


    public function create()
    {
        return view('admin.menu.add',[
            'seasons' => Seasons::all(),
            'objects' => Objects::all(),
            'title' => 'Thêm Danh Mục Mới'
        ]);
    }

    public function store(CreateFormRequest $request)
    {
        try {
            $menusData = $request->validated();
            $menusData['user_id'] = auth()->id();
//            $imageName ="";
//            if ($request->file('image')) {
//                $imagePath = $request->file('image');
//                $imageName = $imagePath->getClientOriginalName();
//
//                $request->file('image')->storeAs('/public/images', $imageName);
//              }
//            $menusData['image'] = $imageName;
            $this->menuService->create($menusData);

            return redirect()->route('index')->with('success', 'Tạo mới thành công!');
        } catch (\Exception $e) {
            Log::error('Lỗi : ' . $e->getMessage());

            return redirect()->back()->withInput()->with([
                'error' => 'Không thể tạo mới menu. Vui lòng thử lại.'
            ]);
        }
    }

    public function index()
    {
        $seasons = $this->menuService->getSeasons();
        $objects = $this->menuService->getObjects();
        return view('admin.menu.list',[
            'seasons' => $seasons,
            'objects' => $objects,
            'title' =>  'Danh Sách Bệnh Mới Nhất',
            'diseases' =>  $this->menuService->getAll()
        ]);

    }
//    Lọc theo Season
    public function filterBySeason(Request $request)
    {
        $objects = $this->menuService->getObjects();
        $seasons = $this->menuService->getSeasons();
        $filteredMenus = $this->menuService->filterBySeason($request);
        return view('admin.menu.list', [
            'diseases' => $filteredMenus,
            'title' => 'Danh Sách Bệnh Mới Nhất',
            'objects' => $objects,
            'seasons' => $seasons,
        ]);
    }
    public function filterByObject(Request $request)
    {
        $filteredMenus = $this->menuService->filterByObject($request);
        $objects = $this->menuService->getObjects();
        $seasons = $this->menuService->getSeasons();
        return view('admin.menu.list', [
            'diseases' => $filteredMenus,
            'title' => 'Danh Sách Bệnh Mới Nhất',
            'objects' => $objects,
            'seasons' => $seasons,
        ]);
    }
    public function searchByDiseaseName(Request $request)
    {
        $diseaseName = $request->input('disease_name');
        $filteredMenus = $this->menuService->searchByDiseaseName($diseaseName);
        $objects = $this->menuService->getObjects();
        $seasons = $this->menuService->getSeasons();
        return view('admin.menu.list' ,[
            'diseases' => $filteredMenus,
            'title' => 'Kết quả tìm kiếm',
            'objects' => $objects,
            'seasons' => $seasons,
        ]);
    }

    public function show(Disease $disease)
    {

        return view('admin.menu.edit',[
            'seasons' => Seasons::all(),
            'objects' => Objects::all(),
            'title' =>  'Chỉnh sửa thông tin bệnh ' . $disease->disease_name,
            'disease' =>  $disease
        ]);
    }

    public function update(Disease $disease, CreateFormRequest $request)
    {
        $menusData = $request->validated();
        $menusData['user_id'] = auth()->id();
        try{
            $disease->update($menusData);
            $disease->seasons()->sync($request->input('season_id'));
            $disease->objects()->sync($request->input('object_id'));
            return redirect()->route('index')->with('success', 'Cập nhật thành công!');
        } catch (\Exception $e){
            return redirect()->route('index')->with('error', 'Lỗi khi cập nhật menu: '. $e->getMessage());
        }
    }


    public function delete($id)
    {
        {
            if ($this->menuService->destroy($id)) {
                return redirect()->route("index")->with('success', 'Xóa thành phần bệnh thành công');
            }
            return back()->with('error', 'Not found');
        }
    }
}
