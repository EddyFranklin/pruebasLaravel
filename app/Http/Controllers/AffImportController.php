<?php

namespace App\Http\Controllers;
use App\Afiliados;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class AffImportController extends Controller
{
    public function importaffiliate(){
      Excel::load('D:\Aportes\APORTES ACTIVOS - FILE MAKER.xlsx',function($reader){
        foreach ($reader -> get() as $affiliate) {
           $afiliado = Affiliate::where('identity_card','=',$affiliate->ci)->first();
           if($afiliado){
          Afiliados::create([
            'nro_afi'=>$affiliate->nro_afi,
            'ci'=>$affiliate->ci,
            'matricula'=>$affiliate->matricula,
            'nombre'=>$affiliate->nombre,
            'paterno'=>$affiliate->paterno,
            'materno'=>$affiliate->materno,
            'grado'=>$affiliate->grado,
            'año'=>2003,
            'mes'=>$affiliate->mes,
            'cod_afi'=>$affiliate->cod_afi,
            'fecha'=>'1900-01-01 00:00:00',
            'recibo'=>$affiliate->recibo,
            'monto'=>$affiliate->monto,
            'obs'=>'Sin obs'
          ]);
        }
        }
      });
      return Afiliados::all();
    }
}
