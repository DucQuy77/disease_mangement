<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\Account\CreateFormRequest;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Http\Services\Account\AccountService;
use App\Models\Account;
use Illuminate\Notifications\Action;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    protected  $accountService;

    public function __construct(AccountService $accountService)
    {
        $this->accountService = $accountService;

    }

    public function create()
    {
        return view('admin.account.add',[
           'title' => 'Thêm người dùng'
        ]);
    }
    public function store(CreateFormRequest $request)
{
    $result = $this->accountService->create($request);
    if ($result) {
        // Nếu tạo mới thành công, chuyển hướng người dùng với thông báo thành công
        return redirect()->route("listAccount")->with('success', 'Tạo mới tài khoản thành công!');
    } else {
        // Nếu có lỗi xảy ra, bạn có thể chuyển hướng với một thông báo lỗi
        return redirect()->route("listAccount")->with('error', 'Có lỗi xảy ra khi tạo mới tài khoản.');
    }
}

    public function index()
    {
        return view('admin.account.list',[
            'title' =>  'Danh sách người dùng',
            'accounts' =>  $this->accountService->getAll()
        ]);

    }
    public function show(Account $account)
    {

        return view('admin.account.edit',[
            'title' =>  'Chỉnh sửa thông tin người dùng ====> ' . $account->name,
            'account' =>  $account
        ]);

    }

    public function update(Account $account, CreateFormRequest $request)
    {
        $this->accountService->update($request, $account);


        return redirect()->route("listAccount")->with('success', 'Cập nhật người dùng thành công');
    }

    public function delete($id)
    {
        {
            if ($this->accountService->delete($id)) {
                return redirect()->route("listAccount")->with('success', 'Xóa người dùng thành công');
            }

            return back()->with('error', 'User not found');
        }
    }

    public function showChangePasswordForm(Account $account)
    {
        return view('admin.account.change-password.change-password', [
            'title' =>  'Thay đổi mật khẩu ' . $account->name,
            'account' =>  $account
        ]);
    }

    public function changePassword(Request $request, Account $account)
    {
        $request->validate([
            'new_password' => 'required|string|min:6|confirmed',
        ]);

        $account->password = bcrypt($request->new_password);
        $account->save();

        return redirect()->route('listAccount')->with('success', 'Mật khẩu đã được thay đổi thành công!');
    }
}
