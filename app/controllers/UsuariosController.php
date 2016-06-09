<?php

class UsuariosController extends BaseController {


	public function login()
	{
		return View::make('usuarios.login');
	}
	public function agregarUsuario(){        
        $_datos = array();        
        $_datos['id'] = '';
        $_datos['email'] = '';       
        return View::make('usuarios.agregar',array('datos'=>$_datos));
    }
}
