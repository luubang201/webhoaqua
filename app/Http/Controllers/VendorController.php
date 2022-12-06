<?php

namespace App\Http\Controllers;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Vendor;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $data = Vendor::all(); // lấy toàn bộ dữ liệu
        // gọi đến view
        $vendor = Vendor::latest()->paginate(10);
        return view('Backend.vendor.index', [
            'data' => $vendor
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.vendor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000'
        ],[
            'name.required' => 'Bạn cần phải nhập tên nhà cung cấp',
            'image.image' => 'File ảnh phải có dạng jpeg,png,jpg,gif,svg',
        ]);

        $vendor = new Vendor();
        $vendor->name = $request->input('name');
        $vendor->slug = Str::slug($request->input('name'));
        $vendor->email = $request->input('email');
        $vendor->phone = $request->input('phone');
        if($request->hasFile('image')){
            $file = $request->file('image');
            $file_name = time().'_'.$file->getClientOriginalName();
            $path_upload = 'upload/product/';
            $file->move($path_upload,$file_name);
            $vendor->image = $path_upload.$file_name;
        }
        $vendor->website = $request->input('website');
        $vendor->address = $request->input('address');


        if ($request->has('is_active')){//kiem tra is_active co ton tai khong?
            $vendor->is_active = $request->input('is_active');
        }
        // Lưu
        $vendor->save();
        // Chuyển hướng trang về trang danh sách

        return redirect()->route('admin.vendor.index');
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
        $vendor = Vendor::find($id);
        return view('Backend.vendor.edit', [
            'data' => $vendor
        ]);
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
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:10000'
        ],[
            'title.required' => 'Bạn chưa nhập tiêu đề',
            'email.required' => 'Email không đúng định dạng',
            'avatar.mines' => 'File ảnh chưa đúng định dạng',
            'avatar.max' => 'Kích thước file quá lớn'
        ]);

        $name  = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $website = $request->input('website');
        $address = $request->input('address');
        $is_active = 0; // default
        if ($request->has('is_active')) {
            $is_active = (int)$request->input('is_active');
        }

        $vendor = Vendor::find($id);
        $vendor->name = $name;
        $vendor->slug = Str::slug($request->input('name')); // slug
        $vendor->email = $email;
        $vendor->phone = $phone;
        $vendor->website = $website;
        $vendor->address = $address;
        $vendor->is_active = $is_active;
        if ($request->hasFile('image')) {
            // get file
            $file = $request->file('image');
            // get ten
            $filename = $file->getClientOriginalName(); // lấy tên gốc của ảnh
            // duong dan upload
            $path_upload = 'upload/vendor/';
            // upload file
            $file->move($path_upload,$filename);
            $path_image = $path_upload.$filename;
            $vendor->image = $path_image;
        }
        $vendor->save();

        // Chuyển hướng trang về trang danh sách
        return redirect()->route('admin.vendor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $isDelete = Vendor::destroy($id); // true | false

        if ($isDelete) {
            return response()->json(['success' => 1,'message' => 'Thành công']); // { 'success':1, 'message' : 'Thành công' }
        } else {
            return response()->json(['success' => 0,'message' => 'Thất bại']);
        }
    }
}
