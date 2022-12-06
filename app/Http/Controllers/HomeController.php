<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Models\Vendor;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::where(['is_hot'=>1])
                                ->orderBy('id','desc')
//                                ->orderBy('position','ASC')
                                ->limit(4)
                                ->get();
        $vendor = Vendor::where(['is_active'=>1])
                                ->orderBy('id','desc')
                                ->limit(6)
                                ->get();
        $category = Category::where('parent_id', 0)->get();
        //return view('Frontend.shop', compact('hot_Product'));
        return view('Frontend.shop', [
            'newProduct'=>$product,
            'newvendor'=>$vendor,
            'categorys'=>$category,
        ]);
    }

    public function blog()
    {
        return view('Frontend.blog');
    }

    public function blog_single()
    {
        return view('Frontend.blog_single');
    }

    public function about()
    {
        return view('Frontend.about');
    }

    public function checkout()
    {
        return view('Frontend.checkout');
    }

    public function product()
    {
        $product = Product::where(['is_hot'=>1])
            ->orderBy('price','ASC')
            ->limit(15)
            ->get();
        return view('Frontend.product', [
            'newProduct'=>$product,
        ]);
    }


    public function cart()
    {
        return view('Frontend.cart');
    }

    public function product_single()
    {
        return view('Frontend.product_single');
    }

    public function wishlist()
    {
        return view('Frontend.wishlist');
    }

    public function contact()
    {
        return view('Frontend.contact');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
