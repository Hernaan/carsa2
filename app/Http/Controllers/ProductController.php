<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Product;
use Excel;

class ProductController extends Controller
{
    public function list(){
        $products = Product::get();
        return view('products', compact('products'));
    }
 
    public function productsImport(Request $request){
        if($request->hasFile('products')){
            $path = $request->file('products')->getRealPath();
            $data = \Excel::load($path)->get();
            if($data->count()){
 
                foreach ($data as $key => $value) {
                    //print_r($value);
                    $product_list[] = ['name' => $value->name, 'description' => $value->description, 'price' => $value->price];
                }
                if(!empty($product_list)){
                    Product::insert($product_list);
                    \Session::flash('success','File improted successfully.');
                }
            }
        }else{
        	\Session::flash('warnning','There is no file to import');
        }
        return Redirect::back();
    } 
 
 
    public function productsExport($type){
        $products = Product::select('name','description','price')->get()->toArray();
        return \Excel::create('Products', function($excel) use ($products) {
            $excel->sheet('Product Details', function($sheet) use ($products)
            {
                $sheet->fromArray($products);
            });
        })->download($type);
    }
}
