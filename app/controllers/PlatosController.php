<?php

class PlatosController extends BaseController {

	public function administrarPlatos(){ 
        
        return View::make('administrador.platos.platos');
    }

 	public function guardarPlato()
	{
    $_plato = array();
    $_plato['NOM_PLA'] = Input::get('nom_pla');
    $_plato['DES_PLA'] = Input::get('des_pla');
    $_plato['PRE_PLA'] = Input::get('pre_pla');
    $_plato['STO_PLA'] = Input::get('sto_pla');
   
    $insert = DB::table('plato')->insert($_plato);
        
    return json_encode(array('plato'=>$_plato));
	}

    public function eguardarPlato()
  {
    $id = Input::get('idplato');  
    $_plato = array();
    $_plato['nomplato'] = Input::get('nomplato');
    $_plato['desplato'] = Input::get('desplato');
    $_plato['preplato'] = Input::get('preplato');
    $_plato['tieplato'] = Input::get('tieplato');
    $_plato['stockplato'] = Input::get('stockplato');
    DB::table('plato')->where('idplato','=',$id)->update($_plato);   
    return json_encode(array('plato'=>$_plato));
  }






  public function agregarPlato()
  {
    
    return View::make('administrador.plato.frmagregarplato');
  }
  public function listarPlatos()
  {
    $platos = DB::table('plato')->get();
    return View::make('administrador.plato.administrarplato',array('platos'=>$platos));
  }

   public function editar(){
        $id = Input::get('id');
        $_plato = DB::table('plato')->where('idplato','=',$id)->first();        
        $_datos = array();
        $_datos['idplato'] = $id;
        $_datos['nomplato'] = $_plato->nomplato;
        $_datos['desplato'] = $_plato->desplato; 
        $_datos['preplato'] = $_plato->preplato;        
        $_datos['tieplato'] = $_plato->tieplato; 
        $_datos['stockplato'] = $_plato->stockplato; 
        return View::make('administrador.plato.frmeditarplato',array('datos'=>$_datos));
    }
        public function eliminar(){
        $id = Input::get('id');
        $_plato = DB::table('plato')->where('idplato','=',$id)->delete();
        return json_encode(array('plato'=>$_plato));
    }

}
