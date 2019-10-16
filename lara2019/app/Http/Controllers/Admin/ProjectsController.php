<?php

namespace App\Http\Controllers\Admin;

use App\Project;
use App\Product;
use App\GalleryProject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteClientImage($id)
{
    dd('мы здесь');
    Project::find($id)->remove_client_image();
    return redirect()->back();
}

    public function deleteImageGallery($id)
    {
        GalleryProject::find($id)->remove();
        return redirect()->back();
    }

    public function addImageForGallery(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'gallery_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $galleryproject = GalleryProject::add($request->all());
        $galleryproject->uploadImage($request->file('gallery_image'));
        return back()->with('success','Изображение сохранено!');
    }
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', ['projects'=>$projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Project::pluck('title', 'id')->all();
        $products = Product::pluck('title', 'id')->all();
        $galleryimages = GalleryProject::get();

        return view('admin.projects.create', compact(
            'projects',
            'products',
            'galleryimages'
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
            'client_image' =>  'nullable|image'
        ]);

        $project = Project::add($request->all());
        $project->uploadShortImage($request->file('short_image'));
        $project->uploadImage($request->file('image'));
        $project->uploadClientImage($request->file('client_image'));
        $project->setProducts($request->get('products'));
        $project->setGalleries($request->get('gallery_imageg'));
        return redirect()->route('projects.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $projects = Project::find($id);
        $products = Product::pluck('title', 'id')->all();
        $galleryimages = GalleryProject::get();
        $selectedProducts = $projects->products->pluck('id')->all();

        return view('admin.projects.edit', compact(
            'projects',
            'products',
            'galleryimages',
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

        $project = Project::find($id);
        $project->edit($request->all());
        $project->setProducts($request->get('products'));
        $project->uploadShortImage($request->file('short_image'));
        $project->uploadImage($request->file('image'));
        $project->uploadClientImage($request->file('client_image'));

        return redirect()->route('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Project::find($id)->remove();
        return redirect()->route('projects.index');
    }
}
