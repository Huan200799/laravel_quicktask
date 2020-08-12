<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Http\Requests\AddUserRequest;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
class UserController extends Controller
{
    public function getLogin(){

        return view('backend.login');

    }
    public function postLogin(UserRequest $request)
    {
        // chổ này em sẽ dùng middleware để check đăng nhập đăng xuất
        $admin = [
            'email' => $request->email,
            'password' => $request->password,
            'level' => 0
        ];
        $login = [
            'email' => $request->email,
            'password' => $request->password,
            'level' => 1
        ];
        if (Auth::attempt($login)) {

            return redirect()->intended('CRUD/task');
        }
        if (Auth::attempt($admin)) {

            return redirect()->intended('admin/listaccout');
        }
        else
        {
            return back()->withErrors( __('message.email'));
        }
    }
    public function getLogout()
    {
        Auth::logout();

        return redirect()->intended('login');
    }

    public function getSignin(){
        return view('backend.signin');
    }

    public function postSignin(AddUserRequest $request){
        $user = new User;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->level = 1;
        $user->save();

        return redirect()->intended('login');
    }

    public function getAccout(){
        $count['user'] = User::count('id');
        if($count >= 8){
            $data['users'] = User::orderby('id', 'asc')->paginate(8);

            return view('backend.listaccout', $data);
        }
        else{
            $data['users'] = User::orderby('id', 'asc')->get();

            return view('backend.listaccout', $data);
        }
    }

    public function getEditAccout($id){
        if($id != null){
            $data['users'] = User::find($id);

            return view('backend.editaccout', $data);
        }
        else
        {
            return back()->withErrors( __('message.edit'));
        }
    }

    public function postEditAccout(Request $request, $id){
        if($id != null){
            $user = User::find($id);
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->level = $request->level;
            $user->save();

            return redirect()->intended('admin/listaccout');
         }
        else
        {
            return back()->withErrors( __('message.edit'));
        }

    }

    public function getDelAccout($id){
        if($id != null){
            User::destroy($id);

            return back();
        }
        else
        {
            return back()->withErrors( __('message.xoa'));
        }
    }
}
