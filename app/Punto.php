<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Punto extends Model
{
    //
    protected $fillable = [
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
    ];
}
