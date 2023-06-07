<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductGalleryRequest;
use App\Models\ProductGallery;
use App\Models\Products;
use App\Models\ProductsGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ProductGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Products $product)
    {
        if(request()->ajax()){
            $query = ProductGallery::query()->where('product_id',$product->id);
            return DataTables::of($query)->addColumn('action', function($item){
                return '
                <form class = "inline-block" method = "POST" action = "'. route('dashboard.gallery.destroy', $item) .'">
                '.method_field('delete'). csrf_field(). '
                <button class = "bg-indigo-400 hover:bg-white hover:text-indigo-500 text-white font-bold py-2 px-4 mx-2 row shadow-lg rounded py-1.5 " type = "submit" >Delete</button>
                </form>';
            })
            ->editColumn('url', function($item){
                return '<img style="max-width:150px" src="'.Storage::url($item->url_image).'" />';
            })->editColumn('is_featured', function($item){
                return $item->is_featured ? 'Yes': 'No';
            })->rawColumns(['action', 'url'])->make();
        }
        return view('pages.dashboard.gallery.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Products $product)
    {
        return view('pages.dashboard.gallery.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductGalleryRequest $request,Products $product)
    {
        $files = $request->file('files');

        if($request->hasFile('files')){
            foreach($files as $file){
                $path = $file->store('public/gallery');

                ProductGallery::create([
                    'product_id' => $product->id,
                    'url_image' => $path
                ]);
            }
        }

        return redirect()->route('dashboard.product.gallery.index', $product->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductGallery $gallery)
    {
        $gallery->delete();

        return redirect()->route('dashboard.product.gallery.index', $gallery->product_id);
    }
}