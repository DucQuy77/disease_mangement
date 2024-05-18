<?php


namespace App\Http\Services\Account;

use App\Models\Account;
use Illuminate\Support\Facades\Auth;

class AccountService
{

    public function getAll()
    {

        return Account::orderbyDesc('id')->paginate(20);
    }


    public function create($request){
        try {
            Account::create([
                'name' => (string) $request->input('name'),
                'email' => (string) $request->input('email'),
                'password' => (string) $request->input('password'),
                'role' => (string) $request->input('role'),
            ]);
        } catch(\Exception $err){
            return false;
        }
        return true;
    }

    public function update($request, $menu)
    {
        $menu->name = (string) $request->input('name');
        $menu->email = (string) $request->input('email');
        $menu->password = (string) $request->input('password');
        $menu->role = (int) $request->input('role');
        $menu-> save();
        return true;
    }

    public function delete($id)
    {
        $account = Account::find($id);

        if($account) {
            $account->delete();
            return true;
        }
        return false;
    }


}
