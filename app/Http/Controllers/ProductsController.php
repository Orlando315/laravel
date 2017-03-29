<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Requests\ProductsRequest;
use App\Product;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view("products.index",["products" => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product;
        return view("products.create", ["title" => "Add","product" => $product,"url" => "/products", "method" => "POST"]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductsRequest $request)
    {
        $product = new Product;

        $product->user_id = Auth::user()->id;
        $product->stock = $request->stock;
        $product->title = $request->title;
        $product->price = $request->price;
        $product->description = $request->description;

        if(input::hasFile('image')){
            $file = Input::file('image');
            $file->move(public_path().'/images/products/',$file->getClientOriginalName());
            $product->photo = $file->getClientOriginalName();
        }

        if(false){
            return redirect("/products")->with([
                'flash_message' => 'Product added successfully.',
                'flash_class' => 'alert-success'
                ]);
        }else{

            abort(404,'Algo paso',['products/create']);
/*
            Session()->flash('flash_message', 'An error has ocurred');
            Session()->flash('flash_class', 'alert-danger');
            Session()->flash('flash_important',true);
            return view("products.create", ["title" => "Add","product" => $product,"url"=> "/products","method" => 'POST']);
  */      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view("products.view", ["product" => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view("products.create", ["title" => "Edit","product" => $product,"url"=> "/products/{$id}/","method" => 'PATCH']);
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
        $product = Product::findOrFail($id);

        $product->title = $request->title;
        $product->price = $request->price;
        $product->description = $request->description;

        if(input::hasFile('image')){
            $file = Input::file('image');
            $file->move(public_path().'/images/products/',$file->getClientOriginalName());
            $product->photo = $file->getClientOriginalName();
        }

        if($product->save()){
            Session()->flash('flash_message', 'Changes has beeen saved.');
            Session()->flash('flash_class', 'alert-success');
            return redirect("/products");
        }else{
            Session()->flash('flash_message', 'An error has ocurred.');
            Session()->flash('flash_class', 'alert-danger');
            Session()->flash('flash_important',true);
            return view("products.create", ["title" => "Add","product" => $product,"url"=> "/products","method" => 'POST']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        Session()->flash('flash_message', 'Product deleted.');
        Session()->flash('flash_class', 'alert-success');
        return redirect('/products');
    }

    public function storeView($id)
    {
        $product = Product::findOrFail($id);
        return view("store.product", ["product" => $product]);
    }
}
