<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Product;
use Excel;
use Image;
use Illuminate\Support\Facades\Input;

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

    public function agregarFoto(Request $request, $id) {
        // var_dump($request->id); die;
        $producto = Product::findOrFail($request->id);
        if(Input::hasFile('image')) {
            $file=Input::file('image');
            Image::make($request->file('image'))
                ->resize(244, 245)
                ->save(public_path().'/imagenes/productos/' . $file->getClientOriginalName());
            $producto->image=$file->getClientOriginalName();
        }
        if($producto->save()){
            return redirect("/product_list")->with('success', 'Imagen agregada correctamente!');
        }else{
            return redirect("/product_list")->with('warnning', 'No se puedo agregar el archivo!');
        }

    }

    public function activar_desactivar(Request $request, $id) {
        $producto = Product::find($request->id);

        if($producto->condicion==1){
            $producto->condicion=0;
        }else{
            $producto->condicion=1;
        }
        $producto->save();
        return redirect("/product_list");

    }
}
