<?php

namespace App\Http\Services\Menu;

use App\Http\Requests\Menu\CreateFormRequest;
use App\Models\Disease;
use App\Models\Menu;
use App\Models\Objects;
use App\Models\Seasons;
use Brick\Math\BigInteger;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use PhpParser\Builder\Function_;
use PhpParser\Node\Expr\FuncCall;

class MenuService
{

    public function getAll()
    {

        return Disease::with(['seasons', 'objects'])
        ->orderbyDesc('id')
            ->paginate(20, ['*'],'page', request()->query('page', 1));
    }

    public function create(array $data)
    {
        try {
            DB::beginTransaction();
            $disease = new Disease();
            $disease->fill($data);
            $disease->save();

            if (isset($data['season_id'])){
                $disease->seasons()->attach($data['season_id']);
            }

            if (isset($data['object_id'])){
                $disease->objects()->attach($data['object_id']);
            }

            DB::commit();
            return $disease;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Lỗi: ' . $e->getMessage());
            throw new \Exception('Không thể tạo mới bệnh. Vui lòng thử lại.', 1);
        }
    }


    public function destroy($id)
    {
        $disease = Disease::find($id);

        if($disease){
            $disease->delete();
            return true;
        }

        return false;
    }

    public function getSeasons()
    {
        $cacheKey = 'seasons';

        $cacheTime = 60 * 60;

        return Cache::remember($cacheKey, $cacheTime, function (){
            return Seasons::all();
        });
    }

    public function getObjects()
    {
        $cacheKey = 'objects';

        $cacheTime = 60 * 60;

        return Cache::remember($cacheKey, $cacheTime, function (){
            return Objects::all();
        });
    }

    //Lọc theo Season

    public function filterBySeason(Request $request)
    {
        $season_id = $request->input('season_id');
        $query = Disease::query();
        if ($season_id && $season_id != 0) {
            // Lọc các bài viết dựa trên mùa được chọn
            $query->whereHas('seasons', function ($subquery) use ($season_id) {
                $subquery->where('season_id', $season_id);
            });
        }
        $query->orderByDesc('id');
        $filteredMenus = $query->paginate(20);
        return $filteredMenus;
    }

    //Lọc theo đối tượng
    public function filterByObject(Request $request)
    {
        $object_id = $request->input('object_id');
        $query = Disease::query();
        if ($object_id && $object_id != 0) {
            // Lọc các bài viết dựa trên mùa được chọn
            $query->whereHas('objects', function ($subquery) use ($object_id) {
                $subquery->where('object_id', $object_id);
            });
        }
        $query->orderByDesc('id');
        $filteredMenus = $query->paginate(20);
        return $filteredMenus;

    }

    //Tìm kiếm theo tên bệnh
    public function searchByDiseaseName($disease_name)
    {
        return Disease::where('disease_name', 'like', '%' . $disease_name . '%')->paginate(20);
    }
}
