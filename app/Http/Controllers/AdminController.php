<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('login');
    }
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:6',
        ]); // validate false => tạo ra biến $errors để lưu toàn thông tin bị lỗi cho từng trường

        // validate thành công

        $dataLogin = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        $checkLogin = Auth::attempt($dataLogin, $request->has('remember'));
        // kiểm tra xem có đăng nhập thành công với email và password đã nhập hay không
        if(Auth::user()->role_id==1){
            return redirect()->route('admin.product.index');
        }
//        if(Auth::user()->role_id==2){
//            return view('Frontend.shop');
//       }
        return redirect()->back()->with('msg', ' Kiểm tra lại email hoặc mật khẩu mà bạn nhập');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
