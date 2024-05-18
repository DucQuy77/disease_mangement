<?php

namespace App\Http\Services\Management;

use App\Http\Requests\Menu\CreateFormRequest;
use App\Models\Menu;
use App\Models\Objects;
use App\Models\Seasons;


class MenuService
{

    public function destroy($id)
    {
        $objects = Object::find($id);

        if($objects){
            $objects->delete();
            return true;
        }

        return false;
    }

    
}
