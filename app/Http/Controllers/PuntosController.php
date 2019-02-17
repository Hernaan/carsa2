<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Punto;
use Carbon\Carbon;
use Excel;
use App\User;

class PuntosController extends Controller
{
    public function list(){
        $puntos = Punto::all();
        return view('puntos', compact('puntos'));

    }
    public function puntosImport(Request $request){
        if($request->hasFile('puntos')){
            $path = $request->file('puntos')->getRealPath();
            $data = \Excel::load($path)->get();
            $users = User::all();
            $mytime= Carbon::now('America/Asuncion');
            if($data->count()){
                foreach ($users as $key => $u) {
                    foreach ($data as $key => $value) {
                        if ($u->username == $value->username) {

                            $total_positivo = 
                                intval($value->disc_puntualidad_pos) + 
                                intval($value->productividad_pos + intval($value->gestion_pos) + 
                                intval($value->meritos_taller_curso) + intval($value->merito_univ) + 
                                intval($value->merito_espec) + intval($value->be_disc_puntualidad) + 
                                intval($value->be_disc_ausencia) + intval($value->be_disc_apercib) + 
                                intval($value->be_prod_fluor) + intval($value->be_prod_fluor_verde) + 
                                intval($value->be_prod_verde) + intval($value->be_gestion_excelente) + 
                                intval($value->be_gestion_exc_buena) + intval($value->be_gestion_buena));
                            // var_dump($total_positivo); die;
                            $puntos_list[] = [
                            	'username' => $value->username, 
                            	'first_name' => $value->first_name, 
                            	'last_name' => $value->last_name,
                            	'disc_puntualidad_pos' => $value->disc_puntualidad_pos,
                            	'disc_puntualidad_neg' => $value->disc_puntualidad_neg,
                            	'disc_marcacion_neg' => $value->disc_marcacion_neg,
                            	'disc_ausencia_neg' => $value->disc_ausencia_neg,
                            	'disc_apercibimiento_neg' => $value->disc_apercibimiento_neg,
                            	'disc_suspension_neg' => $value->disc_suspension_neg,
                            	'productividad_pos' => $value->productividad_pos,
                            	'productividad_neg' => $value->productividad_neg,
                            	'gestion_pos' => $value->gestion_pos,
                            	'gestion_neg' => $value->gestion_neg,
                            	'meritos_taller_curso' => $value->meritos_taller_curso,
                            	'merito_univ' => $value->merito_univ,
                            	'merito_espec' => $value->merito_espec,
                            	'be_disc_puntualidad' => $value->be_disc_puntualidad,
                            	'be_disc_ausencia' => $value->be_disc_ausencia,
                            	'be_disc_apercib' => $value->be_disc_apercib,
                            	'be_prod_fluor' => $value->be_prod_fluor,
                            	'be_prod_fluor_verde' => $value->be_prod_fluor_verde,
                            	'be_prod_verde' => $value->be_prod_verde,
                            	'be_gestion_excelente' => $value->be_gestion_excelente,
                            	'be_gestion_exc_buena' => $value->be_gestion_exc_buena,
                            	'be_gestion_buena' => $value->be_gestion_buena,
                                'total_puntos_positivos' => $total_positivo,
                                'user_id' => $u->id
                            ];
                        } else {
                            $puntos_no[] = [
                                'username' => $value->username, 
                                'first_name' => $value->first_name, 
                                'last_name' => $value->last_name
                            ];
                        }
                    }
                }
                if(!empty($puntos_list)){
                    Punto::insert($puntos_list);
                    \Session::flash('success','Archivo importado con exito!.');
                }
                if(!empty($puntos_no)){
                    \Session::flash('info','Algunos usuarios no fueron agregados por que no existe en la base de datos!.');
                }
            }
        }else{
        	\Session::flash('warnning','Error al subir archivo');
        }
        return Redirect::back();
    }

    public function puntosExport($type){
        $puntos = Punto::select(
        	'username',
			'first_name',
			'last_name',
			'disc_puntualidad_pos',
			'disc_puntualidad_neg',
			'disc_marcacion_neg',
			'disc_ausencia_neg',
			'disc_apercibimiento_neg',
			'disc_suspension_neg',
			'productividad_pos',
			'productividad_neg',
			'gestion_pos',
			'gestion_neg',
			'meritos_taller_curso',
			'merito_univ',
			'merito_espec',
			'be_disc_puntualidad',
			'be_disc_ausencia',
			'be_disc_apercib',
			'be_prod_fluor',
			'be_prod_fluor_verde',
			'be_prod_verde',
			'be_gestion_excelente',
			'be_gestion_exc_buena',
			'be_gestion_buena'
        )->get()->toArray();
        return \Excel::create('Puntos', function($excel) use ($puntos) {
            $excel->sheet('Puntos Details', function($sheet) use ($puntos)
            {
                $sheet->fromArray($puntos);
            });
        })->download($type);
    }
}
