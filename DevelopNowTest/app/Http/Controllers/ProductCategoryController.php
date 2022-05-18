<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use App\Http\Requests\StoreProductCategoryRequest;
use App\Http\Requests\UpdateProductCategoryRequest;
use App\Interfaces\ProductCategoryRepositoryInterface;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\ProductCategoryResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductCategoryController extends Controller
{

    private $productCategoryRepository;

    public function __construct(ProductCategoryRepositoryInterface $productCategoryRepository) 
    {
        $this->productCategoryRepository = $productCategoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,ProductCategory $productCategory)
    {


        if($request->wantsJson()) {
            $data = productCategory::latest()->get();
            return response()->json([productCategoryResource::collection($data)]);
        }
        else {
             $product_categories = ProductCategory::with('product')->paginate(10);
             return view('backend.product_categories.index', [
                'product_categories' => $product_categories 
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
        return view('backend.product_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ProductCategory $productCategory)
    {
        $request->validate([
            'name' => 'required'
        ]);


        ProductCategory::create([
            'name' => $request->name,
        ]);


        if($request->wantsJson()) {
             return response()->json(['Category created successfully.', new ProductCategoryResource($productCategory)]);
        }
        else {
            return  redirect()->route('product_categories.index')->with('success', 'new Category added!');
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategory $productCategory)
    {
         return view('backend.product_categories.show', [
            'productCategory' => $productCategory 
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCategory $productCategory)
    {

        return view('backend.product_categories.edit', [
            'productCategory' => $productCategory 
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductCategoryRequest  $request
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductCategory $productCategory)
    {

        $productCategory->name = $request->name;
        $productCategory->save();

         return  redirect()->route('product_categories.index')->with('success', 'new product updated!');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $productCategory, Request $request)
    {
        $productCategory->delete();

        if($request->wantsJson()) {
             
            return response()->json('Product Category deleted successfully');
        }
        else {
           return redirect()->route('product_categories.index')
            ->with('success', 'Product Category deleted successfully');
        
        }
    }
}
