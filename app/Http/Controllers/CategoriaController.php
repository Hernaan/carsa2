<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Punto;
use Carbon\Carbon;
use Excel;


class CategoriaController extends Controller
{
    //
    public function disciplina(){
        $puntos = Punto::all();
        return view('categorias.disciplina', compact('puntos'));
    }

    public function productividad(){
        $puntos = Punto::all();
        return view('categorias.productividad', compact('puntos'));
    }

    public function gestion(){
        $puntos = Punto::all();
        return view('categorias.gestion', compact('puntos'));
    }

    public function merito_academico(){
        $puntos = Punto::all();
        return view('categorias.merito_academico', compact('puntos'));
    }

    public function bono_disciplina(){
        $puntos = Punto::all();
        return view('categorias.bono_disciplina', compact('puntos'));
    }

    public function bono_productividad(){
        $puntos = Punto::all();
        return view('categorias.bono_productividad', compact('puntos'));
    }

    public function bono_gestion(){
        $puntos = Punto::all();
        return view('categorias.bono_gestion', compact('puntos'));
    }
}
