<?php

namespace App\Http\Services\User;

use App\Models\Account;
use App\Models\Comment;
use App\Models\Disease;
use App\Models\Menu;
use App\Models\Objects;
use App\Models\Seasons;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class UserService
{
    public function getListDisease()
    {
        return Disease::with(['seasons', 'objects'])
            ->orderbyDesc('id')
            ->paginate(20, ['*'],'page', request()->query('page', 1));
    }

    public function getSeasons()
    {
        $seasons = Seasons::all();
        return $seasons;
    }

    public function getObjects()
    {
        $objects = Objects::all();
        return $objects;
    }

    public function search($query)
    {
        return Disease::where('disease_name', 'like', '%' . $query . '%')
            ->orWhereHas('seasons', function ($seasonQuery) use ($query) {
                $seasonQuery->where('season_name', 'like', '%' . $query . '%');
            })
            ->orWhereHas('objects', function ($objectQuery) use ($query) {
                $objectQuery->where('object_name', 'like', '%' . $query . '%');
            })
            ->paginate(20);
    }

    public function getDiseasesBySeason($id)
    {
        $season = Seasons::findOrFail($id);

        $diseases = $season->diseases()->paginate(10);

        return $diseases;
    }

    public function getDiseasesByObject($id)
    {
        $object = Objects::findOrFail($id);
        $disease = $object->diseases()->paginate(10);

        return $disease;
    }

    public function detailPostSeason($id)
    {
        $diseasePosts = Disease::findOrFail($id);

        return $diseasePosts;
    }

    public function detailPostObjects($id)
    {
        $diseasePosts = Disease::findOrFail($id);

        return $diseasePosts;
    }

    public function register(array $data)
    {
        $data['password'] = Hash::make($data['password']);
        $data['role'] = 2;
        return Account::create($data);
    }

    public function login(array $credentials)
    {
        $user = Account::where('email', $credentials['email'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            session(['user' => $user]);
            return $user;
        }
        return null;
    }

    public function logout(): void
    {
        Session::flush();
    }
}
