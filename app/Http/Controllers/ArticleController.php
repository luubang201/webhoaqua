<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = Article::latest()->paginate(10);
        return view('Backend.article.index', [
            'data' => $article
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('Backend.article.create');
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
            'title' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000'
        ],[
            'name.required' => 'Bạn cần phải nhập vào tiêu đề',
            'image.image' => 'File ảnh phải có dạng jpeg,png,jpg,gif,svg',
        ]);

        $article = new Article();
        $article->title = $request->input('title');
        $article->slug = Str::slug($request->input('title'));
        $article->position = $request->input('position');
        $article->summary = $request->input('summary');
        $article->description = $request->input('description');
        if($request->hasFile('image')){
            $file = $request->file('image');
            $file_name = time().'_'.$file->getClientOriginalName();
            $path_upload = 'upload/product/';
            $file->move($path_upload,$file_name);
            $article->image = $path_upload.$file_name;
        }
        $article->type = $request->input('type');
        if ($request->has('is_active')){//kiem tra is_active co ton tai khong?
            $article->is_active = $request->input('is_active');
        }
        // Lưu
        $article->save();
        // Chuyển hướng trang về trang danh sách

        return redirect()->route('admin.article.index');
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
        $article = Article::find($id);
        return view('Backend.article.edit', [
            'data' => $article
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
            'title' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000'
        ],[
            'name.required' => 'Bạn cần phải nhập vào tiêu đề',
            'image.image' => 'File ảnh phải có dạng jpeg,png,jpg,gif,svg',
        ]);

        $title  = $request->input('title');
        $type = $request->input('type');
        $position = $request->input('position');
        $summary = $request->input('summary');
        $description = $request->input('description');
        $is_active = 0; // default
        if ($request->has('is_active')) {
            $is_active = (int)$request->input('is_active');
        }

        $article = Article::find($id);
        $article->title = $title;
        $article->slug = str_slug($request->input('title'));
        $article->type = $type;
        $article->position = $position;
        $article->summary = $summary;
        $article->description = $description;
        $article->is_active = $is_active;

        if ($request->hasFile('image')) {
            // get file
            $file = $request->file('image');
            // get ten
            $filename = $file->getClientOriginalName(); // lấy tên gốc của ảnh
            // duong dan upload
            $path_upload = 'upload/article/';
            // upload file
            $file->move($path_upload,$filename);
            $path_image = $path_upload.$filename;
            $article->image = $path_image;
        }
        $article->save();

        // chuyen dieu huong trang
        return redirect()->route('admin.article.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $isDelete = Article::destroy($id);
        if ($isDelete) {
            return response()->json(['success' => 1, 'message' => 'Thành công']);
        } else {
            return response()->json(['success' => 0, 'message' => 'Thất bại']);
        }
    }
}
