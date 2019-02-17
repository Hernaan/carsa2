<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Punto;
use App\User;
use App\Regalo;
use Illuminate\Support\Facades\DB;
use Auth;

class TransferenciaController extends Controller
{
    public function index() {
    	$user_id = Auth::user()->id;
    	$puntos_acumulados = DB::select(
    		'SELECT sum(total_puntos_positivos) as r from puntos where user_id ='. $user_id);
    	return view('transferencia.index', compact('puntos_acumulados'));
    }

    public function transferir(Request $request) {

        $user_id = Auth::user()->id;

        $monto_a_transferir = $request->monto;

        $puntos_acumulados = $request->punto_acumulado;

        $user_a_regalar = $request->cuenta;

        $user_a_transferir = DB::select("SELECT id, name FROM users WHERE id = '$request->cuenta'");

        $registros = DB::select('SELECT id, total_puntos_positivos from puntos where user_id ='. $user_id);

        $registro_a_sumar = DB::select("SELECT id, total_puntos_positivos from puntos where user_id ='$user_a_regalar' order by id desc limit 1");
        // var_dump($registro_a_sumar); die;

        $cantidad_registros = count($registros);

        $acumulado = 0;

        $col = 1;

        if ($monto_a_transferir <= $puntos_acumulados) {

            if ($user_a_transferir) {

                if ($monto_a_transferir > $acumulado) {

                    for ($i=0; $i < $cantidad_registros; $i++) {
                        
                        if ($registros[$i]->total_puntos_positivos > 0) {
                            
                            if ($acumulado ==  $monto_a_transferir) {
                                // var_dump('acumulado ya es igual al monto a transferir '.$acumulado);
                                // actualiza el registro
                                $punto = Punto::findOrFail($registros[$i]->id);
                                $punto->total_puntos_positivos = 0;
                                $punto->save();

                                // registra la transeferencia
                                $monto_transferencia = $registro_a_sumar[0]->total_puntos_positivos + $acumulado;
                                $punto_a_registrar = Punto::findOrFail($registro_a_sumar[0]->id);
                                $punto_a_registrar->total_puntos_positivos = $monto_transferencia;
                                $punto_a_registrar->save();

                                // crear registro de transferencia
                                $regalo = new Regalo();
                                $regalo->puntos = $acumulado;
                                $regalo->user_regalo = $user_id;
                                $regalo->user_recibio = $user_a_regalar;
                                $regalo->save();

                                // var_dump('se regalo');
                                \Session::flash('success','La transferencia se realizo con exito');
                                break;
                                // este break en la puta vida lo borres o se vuelve a repetir el ciclo a pesar de que ya la transferencia ya se realizo.

                            }

                            if ($acumulado <  $monto_a_transferir) {
                                // actualiza el registro
                                $acumulado = $acumulado + $registros[$i]->total_puntos_positivos;
                                $punto = Punto::findOrFail($registros[$i]->id);
                                $punto->total_puntos_positivos = 0;
                                $punto->save();

                                // var_dump('el acumulado quedo en '. $acumulado . ' y el monto a transferir es '. $monto_a_transferir);
                            }
                            if ($acumulado > $monto_a_transferir) {
                                // var_dump('el acumulado '. $acumulado . ' ya paso al monto a transferir '. $monto_a_transferir);

                                $vuelto = $acumulado - $monto_a_transferir;
                                // actualiza el registro
                                $punto = Punto::findOrFail($registros[$i]->id);
                                $punto->total_puntos_positivos = $vuelto;
                                $punto->save();
                                
                                // registra la transeferencia
                                $monto_transferencia = $registro_a_sumar[0]->total_puntos_positivos + $monto_a_transferir;
                                $punto_a_registrar = Punto::findOrFail($registro_a_sumar[0]->id);
                                $punto_a_registrar->total_puntos_positivos = $monto_transferencia;
                                $punto_a_registrar->save();


                                 // crear registro de transferencia
                                $regalo = new Regalo();
                                $regalo->puntos = $monto_a_transferir;
                                $regalo->user_regalo = $user_id;
                                $regalo->user_recibio = $user_a_regalar;
                                $regalo->save();

                                \Session::flash('success','La transferencia se realizo con exito');
                                break;
                                // este break en la puta vida lo borres o se vuelve a repetir el ciclo a pesar de que ya la transferencia ya se realizo.
                            }
                        }
                    }

                } else {
                    \Session::flash('warnning','Agregar un monto a transferir valido!');  
                }
            } else {
                \Session::flash('warnning','El numero de cuenta del destinatario no existe o a sido cambiado');  
            }
        } else {
            \Session::flash('warnning','El monto a transferir es superior al credito disponible');
        }
        return redirect('/transferencia');
    }
}
