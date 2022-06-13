<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Configuracion;
use App\Seccion;
use App\Elemento;
use App\Carrusel;
use App\Subasta;
use App\GaleriaSubasta;
use App\Sucursal;
use App\SubastasPhoto;
use App\Producto;
use App\Faq;
use App\Color;
use App\Espacio;
use App\Espacioproducto;
use App\ProductosPhoto;
use App\ProductoVersion;
use App\ProductoVersionPhoto;
use App\ProductoRelacion;
use App\Nosotrosgaleria;
use App\Politica;
use App\Colaborador;
use App\ColaboradorPhoto;
use Carbon\Carbon;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class FrontController extends Controller
{
		public function __construct(){
			// if (!session()->has('cart_id')) {
			// 	session(['cart_id' => rand(00000,99999)]);
			// }
			// echo "<pre>";
			// print_r(session());
			// echo "</pre>";

		}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
			if (!session()->has('cart_id')) {
				session(['cart_id' => rand(00000,99999)]);
			}

			$productos = Producto::where('inicio',1)->get();

			$elementos = Elemento::where('seccion',1)->get();

			$espacios = Espacio::take(9)->get();

			foreach ($productos as $prod) {
				$fphoto = ProductosPhoto::where('producto',$prod->id)->orderBy('orden','ASC')->get()->first();
				$prod->photo = (!empty($fphoto)) ? $fphoto['image'] : null ;
			}

			$hoy = Carbon::now('America/Mexico_city')->format('Y-m-d H:i:s');
			$subasta = Subasta::where('deadline', '>=', $hoy)->where('inicio', '=', 1)->inRandomOrder()->first();
			// $subasta = Subasta::where('deadline','<=',$hoy)->orderBy('deadline','desc')->first();
			// $fphoto = SubastasPhoto::where('subasta','=',$subasta->id)->get()->first();
			if (!empty($subasta)) {
				$fphoto = SubastasPhoto::where('subasta','=',$subasta->id)->get();
				// $fphoto = SubastasPhoto::where('subasta','=',$subasta->id)->limit(2)->get();
				$subasta->photo = $fphoto  ;
			}

			$sliders = Carrusel::orderBy('orden', 'ASC')->get();

			/*foreach ($sliders as $sli) {
				if ($sli->video) {
					if (Str::contains($sli->video, 'v=')) {
						$pos=strpos($sli->video, 'v');
						$videoPhoto=substr($sli->video, ($pos+2));
					}

					if (Str::contains($sli->video, 'youtu.be')) {
						$pos=strrpos($sli->video, '/');
						$videoPhoto=substr($sli->video, ($pos+1));
					}

					$sli->video = [
						'url' => $sli->video,
						'idVideo' => $videoPhoto
					];
				}
			}
			$this->debug($sliders);*/

			return view('front.index',compact('subasta','productos','sliders','espacios', 'elementos'));

		}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

		/**
		 * Display the specified resource.
		 *
		 * @param  int  $id
		 * @return \Illuminate\Http\Response
		 */
		public function subastas(){
			if (!session()->has('cart_id')) {
				session(['cart_id' => rand(00000,99999)]);
			}

			$hoy = Carbon::now('America/Mexico_city')->format('Y-m-d H:i:s');
			// $subastas = Subasta::orderBy('deadline','desc')->get();
			$subastas = Subasta::where('deadline','>=',$hoy)->orderBy('deadline','desc')->get();

			$subastas_old = Subasta::where('deadline','<=',$hoy)->orderBy('deadline','desc') ->limit(6)->get();
			foreach ($subastas as $sub) {
				$fphoto = SubastasPhoto::where('subasta',$sub->id)->get();
				$sub->photo = (!empty($fphoto)) ? $fphoto : null ;
			}

			foreach ($subastas_old as $sub) {
				$fphoto = SubastasPhoto::where('subasta','=',$sub->id)->get()->first();
				$sub->photo = (!empty($fphoto)) ? $fphoto['image'] : null ;
			}

			$elementos = Elemento::where('seccion',4)->get();

			$image = GaleriaSubasta::all();

			self::checkStatus();
			return view('front.subastas',compact('subastas','subastas_old', 'elementos', 'image'));
		}

		/**
		 * Display the specified resource.
		 *
		 * @param  int  $id
		 * @return \Illuminate\Http\Response
		 */
		public function subasta($id){
			if (!session()->has('cart_id')) {
				session(['cart_id' => rand(00000,99999)]);
			}

			$subasta = Subasta::find($id);
			$subasta->gallery = $subasta->fotos()->orderBy('orden','asc')->get();
			$subasta->pujas = $subasta->pujas()->get()->count();

			self::checkStatus();
			return view('front.subasta_detail',compact('subasta'));
		}

		/**
		 * Display the specified resource.
		 *
		 * @param  int  $id
		 * @return \Illuminate\Http\Response
		 */
		public function aboutus(){
			$images = Nosotrosgaleria::all();

			return view('front.aboutus',compact('images'));
		}

		/**
		 * Display the specified resource.
		 *
		 * @param  int  $id
		 * @return \Illuminate\Http\Response
		 */
		public function productos(Request $request, $slug = null){
			if (!session()->has('cart_id')) {
				session(['cart_id' => rand(00000,99999)]);
			}

			$cats = Categoria::where('parent',0)->get();
			$catsall = Categoria::all();

			$slugCat = (!empty($slug)) ? $slug : null ;
			$productos = Producto::where('activo',1);


			if (!empty($slugCat)) {
				$catProd = Categoria::where('slug',$slug)->get()->first();
				// $productos = $productos->where('categoria',$catProd->id);
				$productos = $productos->categoria($catProd->id);

				$catPar = Categoria::find($catProd->parent);
			}else {
				$catProd = null;
				$catPar = null;
			}
			// return $catProd;

			$productos->colaboradorCat($request->colab);

			$productos->ordenPrecio($request->price);

			$productos = $productos->get();

			foreach ($productos as $prod) {
				$fphoto = ProductosPhoto::where('producto',$prod->id)->orderBy('orden','ASC')->get()->first();
				$prod->photo = (!empty($fphoto)) ? $fphoto['image'] : null ;
				$prod->colaborador = (!empty($prod->colaborador)) ? Colaborador::where('categoria',$prod->colaborador)->get()->first() : null ;
			}

			return view('front.productos',compact('cats','catsall','productos','catProd','catPar'));

			// return $productos->get();
		}

		/**
		 * Display the specified resource.
		 *
		 * @param  int  $id
		 * @return \Illuminate\Http\Response
		 */
		public function producto($id){
			if (!session()->has('cart_id')) {
				session(['cart_id' => rand(00000,99999)]);
			}

			$prod = Producto::find($id);
			$prod->gallery = $prod->fotos()->orderBy('orden','asc')->get();
			$prod->categoria = Categoria::find($prod->categoria);

			if ($prod->colaborador) {
				$colab = Colaborador::where('categoria',$prod->colaborador)->get()->first();
			}else {
				$colab = null;
			}

			$productos_rel = $prod->relacionados()->get()->pluck('otroProducto');

			$productos_rel = Producto::whereIn('id', $productos_rel)->get();

			foreach ($productos_rel as $prodimg) {
				$fphoto = ProductosPhoto::where('producto',$prodimg->id)->orderBy('orden','ASC')->get()->first();
				$prodimg->photo = (!empty($fphoto)) ? $fphoto['image'] : null ;
			}

			$prod->colors = $prod->versiones()->orderBy('orden','asc')->get();
			foreach ($prod->colors as $col) {
				$color = Color::find($col->coltex);
				$col->coltex = $color;
				$col->photos = ProductoVersionPhoto::where('version',$col->id)->get();
			}

			return view('front.producto_detail',compact('prod','productos_rel','colab'));
		}

		/**
		 * Display the specified resource.
		 *
		 * @param  int  $id
		 * @return \Illuminate\Http\Response
		 */
		public function espacio($espacioId){
			if (!session()->has('cart_id')) {
				session(['cart_id' => rand(00000,99999)]);
			}
			//consultamos el espacio
			$espacio = Espacio::find($espacioId);
			//traemos los productos relacionados
			$productos_rel = $espacio->productos()->get()->pluck('producto');

			$productos = Producto::whereIn('id',$productos_rel)->get();

			foreach ($productos as $prod) {
				$fphoto = ProductosPhoto::where('producto',$prod->id)->orderBy('orden','ASC')->get()->first();
				$prod->photo = (!empty($fphoto)) ? $fphoto['image'] : null ;
			}
			//consutamos otros espacios
			$espaciosrel = Espacio::where('id','!=',$espacioId)->limit(9)->get();

			return view('front.espacio', compact('espacio','productos','espaciosrel'));
		}

		public function colaboraciones(Request $request){

			$colabs =	Colaborador::where('activo',1);

			if ($request->has('name')) {
				$colabs->ordenName($request->name);
			} else {
				$colabs->orderBy('orden','asc');
			}

			$colabs = $colabs->get();

			return view('front.colaboradores',compact('colabs'));
		}

		public function colaborador($colab){
			$colab = Colaborador::find($colab);

			if (empty($colab)) {
				\Toastr::error('Error al buscar colaborador, intente mas tarde');
				return redirect()->back();
			}

			if ($colab->website) {
				$colab->website = (Str::contains($colab->website, ['http', 'https'])) ? $colab->website : "http://$colab->website" ;
			}

			$colab->products = Producto::where('colaborador',$colab->categoria)->where('activo',1)->get();
			foreach ($colab->products as $prod ) {
				$fphoto = ProductosPhoto::where('producto',$prod->id)->orderBy('orden','ASC')->get()->first();
				$prod->photo = (!empty($fphoto)) ? $fphoto['image'] : null ;
				$prod->colaborador = (!empty($prod->colaborador)) ? Colaborador::where('categoria',$prod->colaborador)->get()->first() : null ;
			}
			$colab->gallery = ColaboradorPhoto::where('colaborador',$colab->id)->get();

			return view('front.colaborador',compact('colab'));
		}

		public function contact(){
			$sucursal = Sucursal::all();
			$elementos = Elemento::where('seccion',5)->get();
			return view('front.contact',compact('elementos','sucursal'));
		}

		public function garantias(){
			$politica = Politica::find(5);
			return view('front.politicas',compact("politica"));
		}

		public function aviso(){
			$politica = Politica::find(1);
			return view('front.politicas',compact("politica"));
		}

		public function pagos(){
			$politica = Politica::find(2);
			return view('front.politicas',compact("politica"));
		}

		public function devoluciones(){
			$politica = Politica::find(3);
			return view('front.politicas',compact("politica"));
		}

		public function tyc(){
			$politica = Politica::find(4);
			return view('front.politicas',compact("politica"));
		}

		public function preguntas(){
			$preguntas = Faq::orderBy('orden','asc')->get();
			return view('front.faq',compact("preguntas"));
		}

		public function mailcontact(Request $request){
			$validate = Validator::make($request->all(),[
				'nombre' => 'required',
				'correo' => 'required',
				'whatsapp' => 'required|numeric',
				'mensaje' => 'required',
			],[],[]);

			if ($validate->fails()) {
				\Toastr::error('Error, se requieren todos datos');
				return redirect()->back();
			}

			$data = array(
				'nombre' => $request->nombre,
				'correo' => $request->correo,
				'whatsapp' => $request->whatsapp,
				'mensaje' => $request->mensaje,
				'asunto' => 'Formulario de contacto',
				'hoy' => Carbon::now()->format('d-m-Y')
			);

			$html = view('front.mailcontact',compact('data'));

			$config = Configuracion::first();

			$mail = new PHPMailer;
			$mail->isSMTP();
			// $mail->SMTPDebug = SMTP::DEBUG_SERVER;
			$mail->Host = $config->remitentehost;
			$mail->Port = $config->remitenteport;
			$mail->SMTPAuth = true;
			$mail->Username = $config->remitente;
			$mail->Password = $config->remitentepass;
			$mail->SMTPSecure = $config->remitenteseguridad;
			$mail->SetFrom($config->remitente, $config->title);
			$mail->isHTML(true);

			$mail->addAddress($config->destinatario,$config->title);
			if (!empty($config->destinatario2)) {
				$mail->AddBCC($config->destinatario2,$config->title);
			}
			$mail->Subject = $data['asunto'];
			$mail->msgHTML($html);
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';


			if ($mail->send()) {
				\Toastr::success('Correo enviado Exitosamente!');
				return redirect()->back();
			} else {

				\Toastr::error('No se ha podido enviar el correo/ '. $mail->ErrorInfo);
				return redirect()->back();
			}
		}
		private function checkStatus() {
			$hoy = Carbon::now('America/Mexico_city')->format('Y-m-d H:i:s');

			$subastas = Subasta::where('deadline','<=',$hoy);

			foreach ($subastas as $sub) {
				$sub->activo = 0;
				$sub->save();
			}
		}
}
