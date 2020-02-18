<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * View Products listing.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        
        $products = Product::orderBy('id','DESC')->paginate(7);

        return view('products.list', compact('products'));
    }

    /**
     * View Create Form.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Create new Product.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'title' => 'required',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'description' => 'required',
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $product = new Product($request->input()) ;
     
         if($file = $request->hasFile('product_image')) {
            
            $file = $request->file('product_image') ;
            
            $fileName = $file->getClientOriginalName() ;
            $destinationPath = public_path().'/images/' ;
            $file->move($destinationPath,$fileName);
            $product->product_image = $fileName ;
        }
        $add=$product->save() ;

        
        if($add){
            return redirect('/product')
                ->with('flash_notification.message', 'New product created successfully')
                ->with('flash_notification.level', 'success');
        }else{
            return redirect('/product')
            ->with('flash_notification.message', 'Fail to create new product')
            ->with('flash_notification.level', 'danger');
        }
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

        return view('products.edit', compact('product', 'id'));
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
            'title' => 'required',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'description' => 'required',
            'product_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $product = Product::find($id);
        $product->title = $request->get('title');
        $product->price = $request->get('price');
        $product->description = $request->get('description');
        if($file = $request->hasFile('product_image')) {
            
            $file = $request->file('product_image') ;
            
            $fileName = $file->getClientOriginalName() ;
            $destinationPath = public_path().'/images/' ;
            $file->move($destinationPath,$fileName);
            $product->product_image = $fileName ;
        }
        if ($product->save()) {
            return redirect()
                ->route('product.index')
                ->with('flash_notification.message', 'Product updated successfully')
                ->with('flash_notification.level', 'success');
        } else {
            return redirect()
                ->route('product.index')
                ->with('flash_notification.message', 'Fail to update product')
                ->with('flash_notification.level', 'danger');
        }
    }
   

    /**
     * Delete Product.
     *
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product->delete()) {

            return redirect()
                ->route('product.index')
                ->with('flash_notification.message', 'Product deleted successfully')
                ->with('flash_notification.level', 'success');
        } else {
            return redirect()
                ->route('product.index')
                ->with('flash_notification.message', 'Fail to delete product')
                ->with('flash_notification.level', 'danger');
        }
    }
}
