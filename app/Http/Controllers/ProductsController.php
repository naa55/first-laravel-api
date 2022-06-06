<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //

    public function index() {
        return Products::all();
    }


    public function store() {

        request()->validate([
            'name' => 'required',
            'slug' => 'required',
            'price' => 'required'
        ]);

         return Products::create([
            'name' => request('name'),
            'slug' => request('slug'),
            'description' => request('description'),
            'price' => request('price')
        ]);
    }

    public function show($id) {
        return Products::find($id);
    }
    public function update($id) {
        $product = Products::find($id);
        $product->update(request()->all());
        return $product;
    }
    public function destroy($id) {
       return Products::destroy($id);

    }

    public function search($name) {
        return Products::where('name', 'like', '%'.$name.'%')->get();
    }
}
