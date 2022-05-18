<?php

namespace App\Http\Controllers;

use App\Models\CarItem;
use App\Http\Requests\StoreCarItemRequest;
use App\Http\Requests\UpdateCarItemRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\JsonResponse;

use App\Http\Resources\CarItemResource;
class CarItemController extends Controller
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
            $data = CarItem::latest()->get();
            return response()->json([CarItemResource::collection($data)]);
        }
        else {
             $car_items = CarItem::with('product')->paginate(10);
             return view('backend.car_items.index', [
                'car_items' => $car_items 
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
        $products = Product::all();
        return view('backend.car_items.create', [
            'products' => $products
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCarItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CarItem $carItem)
    {
        $request->validate([
            'product_id' => 'required'
        ]);
        

        $carItem->product_id = $request->product_id;
        $carItem->save();


        if($request->wantsJson()) {
             return response()->json(['Car Item created successfully.', new CarItemResource($carItem)]);
        }
        else {
           return  redirect()->route('car_items.index')->with('success', 'new Car Items added!');
        }

         

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CarItem  $carItem
     * @return \Illuminate\Http\Response
     */
    public function show(CarItem $carItem, Request $request)
    {
         $products = Product::all();


         if($request->wantsJson()) {
             return response()->json([new CarItemResource($carItem)]);
        }
        else {
           return view('backend.car_items.show', [
            'carItems' => $carItem,
            'products' => $products
        ]);
        }

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CarItem  $carItem
     * @return \Illuminate\Http\Response
     */
    public function edit(CarItem $carItem)
    {
         $products = Product::all();
        return view('backend.car_items.edit', [
            'carItems' => $carItem,
            'products' => $products
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCarItemRequest  $request
     * @param  \App\Models\CarItem  $carItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CarItem $carItem)
    {
        $carItem->product_id = $request->product_id;
        $carItem->save();

         return  redirect()->route('car_items.index')->with('success', 'new CarItem updated!');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CarItem  $carItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarItem $carItem, Request $request)
    {
         $carItem->delete();

        if($request->wantsJson()) {
             
            return response()->json('CarItem deleted successfully');
        }
        else {
           return redirect()->route('car_items.index')
            ->with('success', 'Car Item deleted successfully');
    
        }        
    }
}
