<?php

namespace App\Http\Controllers;

use App\Components\Recusive;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    public function index()
    {
        $data = Category::latest()->paginate(10); // sắp sếp theo thứ tự mới nhất && phân trang

        return view('Backend.category.index', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $data = Category::all();
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive();
//        foreach ($data as $value) {
//            if ($value['parent_id'] == 0) {
//                echo "<option>" . $value['name']. "</option>";
//
//                foreach ($data as $value2) {
//                    if ($value2['parent_id'] == $value['id']) {
//                        echo "<option>" . '---' . $value2['name']. "</option>";
//
//                        foreach ($data as $value3) {
//                            if ($value3['parent_id'] == $value2['id']) {
//                                echo "<option>" . '---' . $value3['name']. "</option>";
//                            }
//                        }
//                    }
//                }
//            }
//        }
//        $htmlOption = $this->categoryRecusive(0);
        return view('Backend.category.create', compact('htmlOption'));
    }
//            }
//
//            return view('Backend.category.create', [
//                'data' => $data, //truyền data sang view
//
//            ]);
//        }
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
//    function categoryRecusive($id, $text = '')
//    {
//        $data = Category::all();
//        foreach ($data as $value) {
//            if ($value['parent_id'] == $id) {
//                $this->htmlSelect .= "<option>" . $value['name'] . "</option>";
//                $this->categoryRecusive($value['id'], $text. '-');
//            }
//        }
//        return $this->htmlSelect;
//    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000'
        ], [
            'name.required' => 'Tên không được để trống',
            'image.image' => 'Ảnh không đúng định dạng'
        ]);

        //luu vào csdl
        $category = new Category;
        $category->name = $request->input('name');
        $category->slug = Str::slug($request->input('name'));
        $category->parent_id = $request->input('parent_id');

        if ($request->hasFile('image')) {
            // get file
            $file = $request->file('image');
            // get ten
            $filename = time().'_'.$file->getClientOriginalName();
            // duong dan upload
            $path_upload = 'uploads/category/';
            // upload file
            $request->file('image')->move($path_upload,$filename);

            $category->image = $path_upload.$filename;
        }

        $is_active = 0;
        if ($request->has('is_active')) {//kiem tra is_active co ton tai khong?
            $is_active = $request->input('is_active');
        }

        $category->is_active = $is_active;

        $category->position = $request->input('position');
        $category->Type = $request->input('Type');
        $category->user_id = Auth::id();
        $category->save();

        // Chuyển hướng trang về trang danh sách
        return redirect()->route('admin.category.index');
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
        // get data from db
        $category = Category::find($id);
        $categoryAll = Category::all();
        return view('Backend.category.edit', [
            'data' => $category,
            'dataAll' => $categoryAll
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
        //dd($request);
        $request->validate([
            'name' => 'required|max:255',
            'type' => 'required|integer',
        ],[
            'name.required' => 'Bạn chưa nhập tên danh mục',
            'type.integer' => 'Bạn chưa chọn kiểu danh mục',
        ]);

        $name  = $request->input('name');
        $parent_id  = (int)$request->input('parent_id');
        $type = $request->input('type');
        $position = $request->input('position');

        $is_active = 0; // default
        if ($request->has('is_active')) {
            $is_active = (int)$request->input('is_active');
        }
        $category = Category::find($id);
        $category->name = $name;
        $category->slug = Str::slug($request->input('name'));
        if ($request->hasFile('image')) {
            // get file
            $file = $request->file('image');
            // get ten
            $filename = $file->getClientOriginalName(); // lấy tên gốc của ảnh
            // duong dan upload
            $path_upload = 'upload/category/';
            // upload file
            $file->move($path_upload, $filename);
            $path_image = $path_upload . $filename;
            $category->image = $path_image;
        }
        $category->parent_id = $parent_id;
        $category->type = $type;
        $category->is_active = $is_active;
        $category->position = $position;
        $category->user_id = Auth::id();
        $category->save();
        // chuyen dieu huong trang
        return redirect()->route('admin.category.index');
        //return redirect()->route('admin.category.index', ['id' => $id]);
        //return redirect()->route('admin.category.index', ['category' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $isDelete = Category::destroy($id); // true | false

        if ($isDelete) {
            return response()->json(['success' => 1,'message' => 'Thành công']); // { 'isSuccess':1, 'message' : 'Thành công' }
        } else {
            return response()->json(['success' => 0,'message' => 'Thất bại']);
        }

    }
}
