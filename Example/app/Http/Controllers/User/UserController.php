<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Http\Services\User\UserService;
use App\Models\Account;
use App\Models\Comment;
use App\Models\Disease;
use App\Models\Like;
use App\Models\Objects;
use App\Models\Seasons;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function showRegisterForm()
    {
        return view('user.register');
    }

    public function showLoginForm()
    {
        return view('user.login');
    }
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:accounts',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $this->userService->register($data);

        return redirect('/login')->with('success', 'Đăng ký thành công. Vui lòng đăng nhập.');
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if ($this->userService->login($credentials)) {
            return redirect()->route('userInterface');
        }

        return redirect()->back()->withErrors(['email' => 'Thông tin đăng nhập không đúng']);
    }

    public function logout()
    {
        $this->userService->logout();

        return redirect('/login');
    }
    public function index()
    {
        $seasons = $this->userService->getSeasons();
        $objects = $this->userService->getObjects();

        return view('user.gallary', [
            'seasons' => $seasons,
            'objects' => $objects,
        ]);
    }



    public function showDiseaseBySeason($id)
    {
        $diseases = $this->userService->getDiseasesBySeason($id);
        $seasons = Seasons::all();
        $commentCount = Comment::where('disease_id', $id)->count();
        return view('user.diseaseBySeason.post', compact('diseases', 'seasons', 'commentCount'));
    }

    public function showDiseaseByObject($id)
    {
        $diseases = $this->userService->getDiseasesByObject($id);
        $objects = Objects::all();
        $commentCount = Comment::where('disease_id', $id)->count();
        return view('user.diseaseByObject.posts', compact('diseases', 'objects', 'commentCount'));
    }

    public function detailPostSeason($id)
    {
        $postDiseases = $this->userService->detailPostSeason($id);
        $seasons = Seasons::all();
        $comments = Comment::where('disease_id', $id)->get();
        $commentCount = Comment::where('disease_id', $id)->count();
        return view('user.diseaseBySeason.detailPost' , compact('postDiseases', 'seasons', 'comments', 'commentCount'));
    }
    public function detailPostObject($id)
    {
        $postDiseases = $this->userService->detailPostObjects($id);
        $objects = Objects::all();
        $comments = Comment::where('disease_id', $id)->get();
        $commentCount = Comment::where('disease_id', $id)->count();
        return view('user.diseaseByObject.detailPost' , compact('postDiseases', 'objects', 'comments', 'commentCount'));
    }

    public function searching(Request $request)
    {
        $query = $request->input('query');
        $results = $this->userService->search($query);
        return view('user.header', compact('results'));
    }

    public function comments(Request $request)
    {
        // Validate dữ liệu đầu vào
        $data = $request->validate([
            'disease_id' => 'required|integer',
            'content' => 'required|string',
        ]);

        try {
            // Lấy thông tin người dùng hiện tại từ session hoặc bất kỳ cơ chế nào khác
            $userId = session()->get('user.id');

            // Kiểm tra xem người dùng có tồn tại trong bảng accounts hay không
            $account = Account::find($userId);
            if (!$account) {
                throw new \Exception('Người dùng không hợp lệ.');
            }

            // Tạo một comment mới và lưu vào cơ sở dữ liệu
            $comment = new Comment();
            $comment->user_id = $userId; // hoặc $account->id tùy vào cách bạn lưu trữ thông tin người dùng
            $comment->disease_id = $data['disease_id'];
            $comment->content = $data['content'];
            $comment->save();

            return redirect()->back()->with('success', 'Comment submitted successfully.');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function likes(Request $request)
    {
        $userId = \session()->get('user.id');

        if (!$userId){
            return response()->json(['error' => 'Bạn cần đăng nhập trước nha']);
        }

        $like = Like::where('user_id', $userId)
            ->where('disease_id', $request->disease_id)
            ->first();

        if ($like) {
            return response()->json(['error' => 'Bạn đã like bài viết này rồi.'], 400);
        }

        Like::create([
            'user_id' => $userId,
            'disease_id' => $request->disease_id,
        ]);

        return response()->json(['success' => 'Bạn đã like bài viết này']);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $diseases = Disease::where('disease_name', 'LIKE', "{$query}")->get();

        return view('user.header', compact('diseases', 'query'));
    }

}
