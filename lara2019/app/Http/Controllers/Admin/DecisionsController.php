<?php

namespace App\Http\Controllers\Admin;

use App\Decision;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DecisionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteImage($id)
    {
        dd('мы здесь');
        Decision::find($id)->removeImage();
        return redirect()->back();
    }
    public function index()
    {
        $decisions = Decision::all();
        return view('admin.decisions.index', ['decisions'=>$decisions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $decisions = Decision::pluck('title', 'id')->all();
        $products = Product::pluck('title', 'id')->all();

        return view('admin.decisions.create', compact(
            '$decisions',
            'products'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' =>'required',
            'description'   =>  'required',
            'image' =>  'nullable|image'
        ]);

        $decision = Decision::add($request->all());
        $decision->uploadImage($request->file('short_image'));
        $decision->uploadBigImage($request->file('image'));
        $decision->setProducts($request->get('products'));
        return redirect()->route('decisions.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $decision = Decision::find($id);
        $products = Product::pluck('title', 'id')->all();
        $selectedProducts = $decision->products->pluck('id')->all();

        return view('admin.decisions.edit', compact(
            'decision',
            'products',
            'selectedProducts'
        ));

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
        $this->validate($request, [
            'title' =>'required',
            'description'   =>  'required',
            'image' =>  'nullable|image'
        ]);

        $decision = Decision::find($id);
        $decision->edit($request->all());
        $decision->setProducts($request->get('products'));
        $decision->uploadImage($request->file('short_image'));
        $decision->uploadBigImage($request->file('image'));
        //$decision->setProduct($request->get('product_id'));

        return redirect()->route('decisions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd($id);
        Decision::find($id)->remove();
        return redirect()->route('decisions.index');
    }
}
