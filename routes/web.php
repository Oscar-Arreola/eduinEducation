<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::name('front.')->group(function(){
	// Route::get('index','FrontController@index')->name('index');
	Route::get('/','FrontController@index')->name('index');
	Route::get('subastas','FrontController@subastas')->name('subastas');
	Route::get('subasta/{id}','FrontController@subasta')->name('subasta');
	Route::get('nosotros','FrontController@aboutus')->name('aboutus');
	Route::get('espacio/{id}','FrontController@espacio')->name('espacio');
	Route::get('productos/{slug?}','FrontController@productos')->name('productos');
	Route::get('producto/{id}','FrontController@producto')->name('producto');
	Route::get('contacto','FrontController@contact')->name('contact');
	Route::post('contacto','FrontController@mailcontact')->name('mailcontact');
	Route::get('garantias','FrontController@garantias')->name('garantias');
	Route::get('aviso-de-privacidad','FrontController@aviso')->name('aviso');
	Route::get('metodos-de-pago','FrontController@pagos')->name('pagos');
	Route::get('devoluciones','FrontController@devoluciones')->name('devoluciones');
	Route::get('terminos-y-condiciones','FrontController@tyc')->name('tyc');
	Route::get('faq','FrontController@preguntas')->name('faq');
	Route::post('puja','PujaController@store')->name('puja.store');
	Route::post('newslatter','NewslatterController@store')->name('save');

	Route::get('colaboraciones','FrontController@colaboraciones')->name('colaboraciones');
	Route::get('colaborador/{id}','FrontController@colaborador')->name('colaborador');
});

// vistas del dashboard del usuario
Route::prefix('dashboard')->name('dash.')->group(function(){
	Route::get('/','HomeController@index')->name('index');
	Route::get('subastas','HomeController@subastas')->name('subastas');
	Route::get('subasta/detalle/{id}','HomeController@subastaDetail')->name('subastaDetail');
	Route::get('perfil','HomeController@perfil')->name('perfil');
	Route::post('update','HomeController@updatePass')->name('updatePass');

	Route::prefix('mis-compras')->name('compras.')->group(function(){
		Route::get('/','HomeController@compras')->name('index');
		Route::get('detalle/{id}','HomeController@detalle')->name('detalle');
	});

	Route::name('profile.')->group(function(){
		Route::post('store','DomicilioController@store')->name('store');
	});


	Route::get('orden/{uuid}','HomeController@orden')->name('orden');
	Route::get('orden-sub/{uuid}','HomeController@ordenSub')->name('ordenSub');
});

Route::prefix('paypal')->name('paypal.')->group(function(){
	Route::get('/pay/{uid}', 'PaymentController@payWithPayPal')->name('paypalpay');
	Route::get('/status', 'PaymentController@payPalStatus')->name('paypalstatus');
	Route::get('/paySub/{uid}', 'PaymentController@payWithPayPalSub')->name('paypalpay2');
	Route::get('/statusTwo', 'PaymentController@payPalStatusTwo')->name('paypalstatusSub');
});

Route::prefix('conekta')->name('conekta.')->group(function(){
	Route::get('/{uid}', 'Payment2Controller@getCard')->name('card');
	Route::post('payment', 'Payment2Controller@statusPay')->name('statusPay');
	Route::get('sub/{uid}', 'Payment2Controller@getCardSub')->name('card-sub');
	Route::post('sub/payment', 'Payment2Controller@statusPayTwo')->name('statusPay2');
	// Route::get('/pay/{uid}', 'PaymentController@payWithConekta')->name('conektapay');
	// Route::get('/status', 'PaymentController@conektaStatus')->name('conektastatus');
});

// rutas carrito
Route::prefix('carrito')->name('cart.')->group(function(){
	Route::post('addcart','CartController@addcart')->name('addcart');
	Route::get('emptycart','CartController@emptycart')->name('emptycart');
	Route::get('removecart','CartController@removecart')->name('removecart');
	Route::post('getcart','CartController@getcart')->name('getcart');

	Route::get('detalles','CartController@show')->name('show');
	Route::get('confirmar-pedido','CartController@confirm')->name('confirm');
	Route::post('pedido','PedidoController@store')->name('store');
	Route::get('confirmar-subasta/{uid}','CartController@confirmSub')->name('confirmSub');
	Route::post('subasta','PedidoSubastaController@store')->name('subStore');

	Route::post('direccion','DomicilioController@store')->name('storeDir');
});

// Route::get('/', function () {
//     return view('layouts.front');
// });

// rutas al admin
Route::namespace("Admin")->prefix('admin')->group(function(){
	Route::name('admin.')->group(function(){

		Route::get('/', 'HomeController@index')->name('home');
		Route::namespace('Auth')->group(function(){
			Route::get('/login', 'LoginController@showLoginForm')->name('login');
			Route::post('/login', 'LoginController@login');
			Route::post('logout', 'LoginController@logout')->name('logout');
		});

	});

// rutas al admin configuraciones
// controllers dentro de Controllers/Admin/
	Route::prefix('config')->name('config.')->group(function(){
		Route::get('index','ConfiguracionController@index')->name('index');
		Route::get('general','ConfiguracionController@general')->name('general');
		Route::get('contacto','ConfiguracionController@contact')->name('contact');
		Route::get('textos','ConfiguracionController@textos')->name('textos');
		Route::get('nosotros','ConfiguracionController@about')->name('about');
		Route::put('nosotros/{id}','ConfiguracionController@aboutimg')->name('aboutimg');
		Route::post('nosotros','ConfiguracionController@aboutgal')->name('aboutgal');
		Route::get('subasta','ConfiguracionController@subastagal')->name('subastagal');
		Route::post('subasta','ConfiguracionController@savesubastagal')->name('savesubastagal');
		Route::post('subasta/del','ConfiguracionController@deletesubastagal')->name('deletesubastagal');

	});
	// Route::prefix('config')->name('config.')->group(function(){
	// 	Route::get('index','ConfiguracionController@index')->name('index');
	// });
});

// rutas al admin configuraciones
// controllers dentro de Controllers/
Route::prefix('admin')->group(function(){
	Route::prefix('config')->name('config.')->group(function(){
		Route::prefix('colores')->name('color.')->group(function(){
			Route::get('/','ColorController@index')->name('index');
			Route::post('/','ColorController@store')->name('store');
			Route::get('editar/{id}','ColorController@edit')->name('edit');
			Route::put('{id}','ColorController@update')->name('update');
			Route::delete('/','ColorController@destroy')->name('delete');
		});

		Route::prefix('sliders')->name('slider.')->group(function(){
			Route::get('/','CarruselController@index')->name('index');
			Route::post('/','CarruselController@store')->name('store');
			Route::delete('/','CarruselController@destroy')->name('delete');
		});

		Route::prefix('spaces')->name('space.')->group(function(){
			Route::get('/','EspacioController@index')->name('index');
			Route::get('detalle/{id}','EspacioController@show')->name('show');
			Route::post('/','EspacioController@store')->name('store');
			Route::delete('/','EspacioController@destroy')->name('delete');

		});

		Route::prefix('sucursales')->name('sucursal.')->group(function(){
			Route::get('/','SucursalController@index')->name('index');
			Route::get('nueva','SucursalController@create')->name('create');
			Route::post('/','SucursalController@store')->name('store');
			Route::get('{id}','SucursalController@edit')->name('edit');
			Route::put('{id}','SucursalController@update')->name('update');
			Route::delete('/','SucursalController@destroy')->name('delete');

		});


		Route::name('rel.')->group(function(){
			Route::put('rel/{id}','EspacioproductoController@update')->name('update');
			// Route::delete('rel/','ProductoRelacionController@destroy')->name('delete');
		});

		Route::prefix('politicas')->name('politica.')->group(function(){
			Route::get('/','PoliticaController@index')->name('index');
			Route::put('/{id}','PoliticaController@update')->name('update');
		});

		Route::prefix('faq')->name('faq.')->group(function(){
			Route::get('/','FaqController@index')->name('index');
			Route::get('nueva','FaqController@create')->name('create');
			Route::post('/','FaqController@store')->name('store');
			Route::get('{id}','FaqController@edit')->name('edit');
			Route::put('{id}','FaqController@update')->name('update');
			Route::delete('/','FaqController@destroy')->name('delete');
		});

		Route::prefix('dimension')->name('size.')->group(function(){
			Route::get('/','CategTamanoController@index')->name('index');
			Route::post('/','CategTamanoController@store')->name('store');
			Route::delete('/','CategTamanoController@destroy')->name('delete');

			Route::name('dimension.')->group(function(){
				Route::get('{slug}','SizeController@index')->name('index');
				Route::post('t','SizeController@store')->name('store');
				Route::delete('t','SizeController@destroy')->name('delete');
			});
		});

		Route::prefix('cupones')->name('cupons.')->group(function(){
			Route::get('/','CuponController@index')->name('index');
		});

		Route::prefix('secciones')->name('seccion.')->group(function(){
			Route::get('/','SeccionController@index')->name('index');
			Route::get('/{slug}','SeccionController@show')->name('show');
			Route::put('/{id}','ElementoController@update')->name('update');
			Route::put('/portada/{id}', 'SeccionController@update')->name('updatePortada');
		});
	});

	Route::prefix('productos')->name('productos.')->group(function(){
		Route::get('/','ProductoController@index')->name('index');
		Route::get('nuevo','ProductoController@create')->name('create');
		Route::post('nuevo','ProductoController@store')->name('store');
		Route::get('detalle/{id}','ProductoController@show')->name('show');
		Route::get('{id}','ProductoController@edit')->name('edit');
		Route::put('{id}','ProductoController@update')->name('update');
		Route::post('delete','ProductoController@destroy')->name('delete');

		Route::name('pic.')->group(function(){
			Route::post('newpic/{id}','ProductosPhotoController@store')->name('store');
			Route::delete('/','ProductosPhotoController@destroy')->name('delete');
		});

		Route::name('version.')->group(function(){
			Route::post('newpv/{id}','ProductoVersionPhotoController@store')->name('store');
			Route::delete('pv/','ProductoVersionPhotoController@destroy')->name('delete');
		});

		Route::name('rel.')->group(function(){
			Route::put('rel/{id}','ProductoRelacionController@update')->name('update');
			// Route::delete('rel/','ProductoRelacionController@destroy')->name('delete');
		});
	});


	Route::prefix('galeriasub')->name('galeriasub.')->group(function(){
		Route::delete('/','GaleriaSubastaController@destroy')->name('delete');
	});

	/*Route::prefix('config2')->name('config2.')->group(function(){
		Route::get('/','Configuracion2Controller@index')->name('index');
		Route::get('nuevo','Configuracion2Controller@create')->name('create');
		Route::post('/','Configuracion2Controller@store')->name('store');
		Route::get('/{id}','Configuracion2Controller@show')->name('show');
	});*/

	Route::prefix('categorias')->name('categ.')->group(function(){
		Route::get('/','CategoriaController@index')->name('index');
		Route::post('/','CategoriaController@store')->name('store');
		Route::get('/{id}','CategoriaController@show')->name('show');
		Route::post('/delete','CategoriaController@destroy')->name('delete');
	});

	Route::prefix('subastas')->name('subastas.')->group(function(){
		Route::get('/','SubastaController@index')->name('index');
		Route::get('nueva','SubastaController@create')->name('create');
		Route::post('nueva','SubastaController@store')->name('store');
		Route::get('detalle/{id}','SubastaController@show')->name('show');
		Route::get('editar/{id}','SubastaController@edit')->name('edit');
		Route::put('{id}','SubastaController@update')->name('update');
		Route::post('delete','SubastaController@destroy')->name('delete');

		Route::prefix('ordenes')->name('orden.')->group(function(){
			Route::get('/','PedidoSubastaController@index')->name('index');
			Route::post('changeStatusSub', 'PedidoSubastaController@changeStatus')->name('changeStatusSub');

		});

		Route::name('pic.')->group(function(){
			Route::post('newpic/{id}','SubastasPhotoController@store')->name('store');
			Route::delete('/','SubastasPhotoController@destroy')->name('delete');
		});
	});

	Route::prefix('clientes')->name('clientes.')->group(function(){
		Route::get('/','UserController@index')->name('index');
		Route::get('detalle/{id}','UserController@show')->name('show');
		Route::post('delele','UserController@destroy')->name('delete');
	});

	Route::prefix('newslatters')->name('newslatters.')->group(function(){
		Route::get('/','NewslatterController@index')->name('index');
	});

	Route::prefix('pedidos')->name('pedidos.')->group(function(){
		Route::get('/','PedidoController@index')->name('index');
		Route::get('detalle/{id}','PedidoController@show')->name('show');
		Route::post('changeStatus', 'PedidoController@changeStatus')->name('changeStatus');
		Route::delete('/','PedidoController@destroy')->name('delete');
	});

	Route::name('subastapic.')->group(function(){
		Route::post('newpic/{id}','SubastasPhotoController@store')->name('store');
	});

	Route::prefix('colaboradores')->name('colaboradores.')->group(function(){
		Route::get('/','ColaboradorController@index')->name('index');
		Route::get('nuevo','ColaboradorController@create')->name('create');
		Route::post('nuevo','ColaboradorController@store')->name('store');
		Route::get('detalle/{id}','ColaboradorController@show')->name('show');
		Route::get('editar/{id}','ColaboradorController@edit')->name('edit');
		Route::put('edit/{id}','ColaboradorController@update')->name('update');
		// Route::post('changeStatus', 'ColaboradorController@changeStatus')->name('changeStatus');
		Route::delete('del/','ColaboradorController@destroy')->name('delete');

		Route::name('pic.')->group(function(){
			Route::post('newpic/{id}','ColaboradorPhotoController@store')->name('store');
			Route::delete('/','ColaboradorPhotoController@destroy')->name('delete');
		});
	});

	Route::prefix('colaboraciones')->name('colaboraciones.')->group(function(){
		Route::get('/','PedidoController@index')->name('index');
		// Route::get('detalle/{id}','PedidoController@show')->name('show');
		// Route::post('changeStatus', 'PedidoController@changeStatus')->name('changeStatus');
		// Route::delete('/','PedidoController@destroy')->name('delete');
	});
});

// rutas funciones generales
Route::prefix('varios')->name('func.')->group(function(){
	Route::post('editarajax','FuncGenController@editajax')->name('editajax');
	Route::post('orderajax','FuncGenController@orderajax')->name('orderajax');
	Route::post('toggleajax','FuncGenController@toggleajax')->name('toggleajax');

	Route::post('addcart','CartController@addcart')->name('addcart');
	Route::get('emptycart','CartController@emptycart')->name('emptycart');
	Route::post('getcart','CartController@getcart')->name('getcart');
	Route::get('updatecart','CartController@updatecart')->name('updatecart');
});

// rutas test
Route::prefix('test')->group(function(){
	Route::get('strand',function(){
		return Str::random(10);
	});
	Route::get('rand',function(){
		return rand(000000,9999999999);
	});
	Route::get('uuid',function(){
		return Str::uuid();
	});
	Route::get('invoiceSub',function(){
		return view('admin.subastas.invoice');
	});
	Route::get('invoice',function(){
		return view('admin.pedidos.invoice');
	});
});

//Clear Cache facade value:
Route::get('/clear-cache', function() {
	$exitCode = Artisan::call('cache:clear');
	return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function() {
	$exitCode = Artisan::call('optimize');
	return '<h1>Reoptimized class loader</h1>';
});

//Route cache:
Route::get('/route-cache', function() {
	$exitCode = Artisan::call('route:cache');
	return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function() {
	$exitCode = Artisan::call('route:clear');
	return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function() {
	$exitCode = Artisan::call('view:clear');
	return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function() {
	$exitCode = Artisan::call('config:cache');
	return '<h1>Clear Config cleared</h1>';
});

// Route::namespace("Admin")->prefix('admin')->prefix('config')->name('config.')->group(function(){
// 	Route::get('/','ConfiguracionController@index')->name('index');
// });

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
