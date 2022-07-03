<?php

use App\Seccion;
use App\Elemento;
use App\Configuracion;
use App\Nosotrosgaleria;
use App\GaleriaSubasta;
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;

class HomeController extends Controller
{
		/**
		 * Create a new controller instance.
		 *
		 * @return void
		 */
		public function __construct()
		{
				$this->middleware('auth:admin');
		}

		/**
		 * Show the application dashboard.
		 *
		 * @return \Illuminate\Http\Response
		 */
		 public function index()
     {
 			$cards = array(
 				array('icon' => 'fas fa-cogs', 'route' => 'config.general', 'text' => 'Config. general'),
 				array('icon' => 'fas fa-paper-plane', 'route' => 'config.contact', 'text' => 'Contacto'),
 				array('icon' => 'fas fa-palette', 'route' => 'config.color.index', 'text' => 'Colores'),
 				array('icon' => 'fas fa-ticket-alt', 'route' => 'config.cupons.index', 'text' => 'Cupones'),
 				array('icon' => 'fas fa-arrows-alt', 'route' => 'config.size.index', 'text' => 'Tamaños'),
 				array('icon' => 'fas fa-question', 'route' => 'config.faq.index', 'text' => 'FAQ'),
 				array('icon' => 'fas fa-images', 'route' => 'config.slider.index', 'text' => 'Sliders'),
                 array('icon' => 'fas fa-user-tie', 'route' => 'config.about', 'text' => 'Nosotros'),
 				array('icon' => 'fas fa-shield-alt', 'route' => 'config.politica.index', 'text' => 'Politicas'),
                 array('icon' => 'fas fa-couch', 'route' => 'config.space.index', 'text' => 'Por que nosotros'),
                 array('icon' => 'fas fa-quote-right', 'route' => 'config.textos', 'text' => 'Textos'),
                 array('icon' => 'fas fa-city', 'route' => 'config.sucursal.index', 'text' => 'Sucursal'),
                 array('icon' => 'far fa-images', 'route' => 'config.subastagal', 'text' => 'Sliders clientes'),

 			);

 			return view('configs.index',compact('cards'));
     }
}
