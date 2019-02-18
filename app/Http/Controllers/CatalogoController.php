<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Punto;
use App\User;
use Auth;
use App\Canjeo;

class CatalogoController extends Controller
{
    //
    public function index() {
    	$user_id = Auth::user()->id;
    	$puntos_acumulados_disponibles = DB::select(
    		'SELECT sum(total_puntos_positivos) as r from puntos where user_id ='. $user_id);
    	$catalogos = Product::where('condicion', '=', '1')->get();

    	return view('catalogo.index', compact('catalogos', 'puntos_acumulados_disponibles'));
    }

    public function canjear_producto(Request $request) {

        $condicion = $request->condicion;
    	$user_id = Auth::user()->id;

        $monto_a_canjear = $request->price_producto;

    	$id_producto = $request->id_producto;

    	$producto = DB::select("SELECT * FROM products where id = '$id_producto'");

    	$credito_disponible = $request->puntos_acumulados;

    	$acumulado = 0;

    	$registros = DB::select('SELECT id, total_puntos_positivos from puntos where user_id ='. $user_id);

    	$cantidad_registros = count($registros);

    	if ($credito_disponible >= $monto_a_canjear) {

    		if ($producto) {

                if ($condicion == 1) {
            
        			if ($monto_a_canjear > $acumulado) {

        				for ($i=0; $i < $cantidad_registros; $i++) {

        					if ($registros[$i]->total_puntos_positivos > 0) {
        						
        						if ($acumulado == $monto_a_canjear) {
       
        							// actualiza el registro del punto acumulado
                                    $punto = Punto::findOrFail($registros[$i]->id);
                                    $punto->total_puntos_positivos = 0;
                                    $punto->save();

                                    //registra el canjeo
                                    $canjeo = new Canjeo();
                                    $canjeo->monto_canjeo = $acumulado;
                                    $canjeo->id_producto = $id_producto;
                                    $canjeo->user_canjeo = $user_id;
                                    $canjeo->save();

                                    \Session::flash('success','La compra se realizo con exito');
                                    break;

        						}

        						if ($acumulado < $monto_a_canjear) {

        							$acumulado = $acumulado + $registros[$i]->total_puntos_positivos;
                                    $punto = Punto::findOrFail($registros[$i]->id);
                                    $punto->total_puntos_positivos = 0;
                                    $punto->save();
        							
        						}

        						if ($acumulado > $monto_a_canjear) {

        							$vuelto = $acumulado - $monto_a_canjear;
                                    // actualiza el registro
                                    $punto = Punto::findOrFail($registros[$i]->id);
                                    $punto->total_puntos_positivos = $vuelto;
                                    $punto->save();

                                    //registra el canjeo
                                    $canjeo = new Canjeo();
                                    $canjeo->monto_canjeo = $monto_a_canjear;
                                    $canjeo->id_producto = $id_producto;
                                    $canjeo->user_canjeo = Auth::user()->id;
                                    $canjeo->save();

                                    \Session::flash('success','La compra se realizo con exito');
                                    break;
    	
        						}
        					}
        				}	
        			}
                } else {
                    \Session::flash('warnning','El producto no esta disponible para ser canjeado!');
                }
    			
    		} else {
    			\Session::flash('warnning','El producto no existe en la base de datos!');
    		}
    	} else {
    		\Session::flash('warnning','No tienes la cantidad de creditos necesarios para comprar el articulo');
    	}

    	return redirect('/catalogo');

    }
}
