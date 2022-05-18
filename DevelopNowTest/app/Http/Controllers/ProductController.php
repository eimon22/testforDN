<?php

namespace App\Http\Controllers;

use App\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\JsonResponse;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{

    private $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository) 
    {
        $this->productRepository = $productRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->wantsJson()) {
        $data = Product::latest()->get();
        return response()->json([ProductResource::collection($data)]);
        }
        else {
             $products = Product::with('productCategory')->paginate(10);
             return view('backend.products.index', [
                'products' => $products 
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_categories = ProductCategory::all();
        return view('backend.products.create', [
            'product_categories' => $product_categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Product $product)
    {

         $request->validate([
            'name' => 'required',
            'image' => 'required | mimes:jpg,jpeg,png',
            'category_id' => 'required'
        ]);

        

         if($request->image->getClientOriginalName()){
            $ext = $request->image -> getClientOriginalExtension();
            // dd($ext);
            $file = date('YmdHis').rand(1, 99999).'.'.$ext;
            // dd($file);
            $a=$request->image->storeAs('public/news', $file);
            // dd($a);
        }
        else{
            $file ='';
        }


        $product->name = $request->name;
        $product->price = $request->price;
        $product->image = $file;
        $product->category_id = $request->category_id;
        $product->save();

        if($request->wantsJson()) {
             return response()->json(['Product created successfully.', new ProductResource($product)]);
        }
        else {
             return  redirect()->route('products.index')->with('success', 'new product created!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product_categories = ProductCategory::all();
        return view('backend.products.show', [
            'product_categories' => $product_categories,
            'products' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $product_categories = ProductCategory::all();
        return view('backend.products.edit', [
            'product_categories' => $product_categories,
            'products' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        if(isset($request->image) && $request->image->getClientOriginalName()){
            $ext = $request->image -> getClientOriginalExtension();
            $file = date('YmdHis').rand(1, 99999).'.'.$ext;
            $a=$request->image->storeAs('public/news', $file);
            // dd($a);
        }
        else{
            if(!$product->image)
            $file ='';
        else
            $file = $product->image;
        
        }
        $product->name = $request->name;
        $product->price = $request->price;
        $product->image = $file;
        $product->category_id = $request->category_id;
        $product->save();

         return  redirect()->route('products.index')->with('success', 'new product updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, request $request)
    {

        $product->delete();

        if($request->wantsJson()) {
             
            return response()->json('Product deleted successfully');
        }
        else {
           return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
        
        }

            
    }
}
