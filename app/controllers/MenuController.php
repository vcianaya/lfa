<?php

class MenuController extends \BaseController {

	public function index()
	{	
		$platos = DB::table('plato')->where('EST_PLA', '1')->get();
		return View::make('administrador.menu.menu',array('platos'=>$platos));
	}	
	public function __construct()
	{
		if(!\Session::has('cart'))\Session::put('cart', array());
	}

	public function show()
	{
		return \Session::get('cart');

	}

	public function menuLista()
	{	
		return View::make('administrador.menu.frmlistamenu');
	}

	public function quitarplato()
	{
		$cart = \Session::get('cart');
	$id = Input::get('id'); 
	unset($cart[$id]); 	
	\Session::put('cart', $cart);
	}

	public function vaciarMenu()
	{
		\Session::forget('cart');
	}

	protected function guradarMemu()
	{
			$menu=DB::table('menu')->insert(
  		array('NOM_MENU' => Input::get('nom_menu'), 
  			  'DES_MENU' => Input::get('des_menu'),
  			  ));  
		$cart = \Session::get('cart');
		foreach ($cart as $plato) {
			$this->saveOrderItem($plato, $menu);
		}
		\Session::forget('cart');
	}

	protected function saveOrderItem($plato, $menu)
	{
	DB::table('menuitem')->insert(
    array('NOM_PLA' => $plato->NOM_PLA,
    	  'PRE_PLA' => $plato->PRE_PLA,
    	  'ID_MENU' => $menu->ID_MENU,
    	  ));
	}
}
