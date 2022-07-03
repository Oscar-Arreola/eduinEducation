<footer class="uk-container-expand  ">
	<section class="uk-margion-remove bg-secondary padding-h-30" uk-grid>
					
					<div class="uk-width-1-3@m uk-margin-remove ">
						<div class="padding-10">
							<div class="uk-margin-remove uk-padding-small menu-title">
								NAVEGACIÓN
							</div>
							<div class="uk-margin-remove uk-padding-small menu-txt">
								<div> <a class="link-footer mar-pad-r" href="{{url('/')}}"> HOME </a> </div>
								<div> <a class="link-footer mar-pad-r" href="{{url()->route('front.aboutus')}}"> NOSOTROS </a> </div>
								<div> <a class="link-footer mar-pad-r" href="{{url('/')}}/#goEspacios"> ESPACIOS </a> </div>
								<div> <a class="link-footer mar-pad-r" href="{{url()->route('front.productos')}}"> PRODUCTOS </a> </div>
								<div> <a class="link-footer mar-pad-r" href="{{url()->route('front.subastas')}}"> SUBASTAS </a> </div>
								<div> <a class="link-footer mar-pad-r" href="{{url()->route('front.contact')}}"> CONTACTO </a> </div>
							</div>
						</div>
					</div>
					<div class="uk-width-1-3@m uk-margin-remove ">
						<div class="padding-10">
							<div class="uk-margin-remove uk-padding-small menu-title">
								SOCIAL
							</div>
							<div class="uk-margin-remove uk-padding-small menu-txt">
								<div> <a class="link-footer mar-pad-r" href="{{ $config->facebook }}" target="_black"> FACEBOOK </a> </div>
								<div> <a class="link-footer mar-pad-r" href="{{ $config->instagram }}" target="_black"> INSTAGRAM </a> </div>
								<div> <a class="link-footer mar-pad-r" href="{{ $config->youtube }}" target="_black"> PINTEREST </a> </div>
								<div> <a class="link-footer mar-pad-r" href="{{ $config->linkedin }}" target="_black"> LINKEDIN </a> </div>
							</div>
						</div>
					</div>
					<div class="uk-width-1-3@m uk-margin-remove ">
						<div class="padding-10">
							<div class="uk-margin-remove uk-padding-small menu-title">
								AYUDA
							</div>
							<div class="uk-margin-remove uk-padding-small menu-txt">
								<div> <a class="link-footer mar-pad-r" href="{{url()->route('front.faq')}}"> PREGUNTAS FRECUENTES </a> </div>
								<div> <a class="link-footer mar-pad-r" href="{{url()->route('front.aviso')}}"> AVISO DE PRIVACIDAD </a> </div>
								<div> <a class="link-footer mar-pad-r" href="{{url()->route('front.pagos')}}"> MÉTODO DE PAGO </a> </div>
								<div> <a class="link-footer mar-pad-r" href="{{url()->route('front.devoluciones')}}"> DEVOLUCIONES DE ENVÍO </a> </div>
								<div> <a class="link-footer mar-pad-r" href="{{url()->route('front.tyc')}}"> TÉRMINOS Y CONDICIONES </a> </div>
								<div> <a class="link-footer mar-pad-r" href="{{url()->route('front.garantias')}}"> GARANTÍA </a> </div>
						</div>
						</div>
					</div>
				<
	</section>
	<section class="mar-pad-r">
		<article class="mar-pad-r uk-grid-match" uk-grid>
			<div class="mar-pad-r col-izq uk-visible@m">&nbsp;</div>
			<div class="uk-width-expand uk-margin-remove cont-center" style="padding:10px 0">
				<!-- /* (header) CONTENIDO DE LA VISTA */ -->
				<div class="uk-text-center txt-10 bold500 space"> TODOS LOS DERECHOS RESERVADOS GROPIUS 2021 </div>
				<div class="uk-text-center txt-8 bold500 space"> DISEÑO POR WOZIAL MARKETING LOVERS </div>
				<!-- /* (header) CONTENIDO DE LA VISTA */ -->
			</div>
			<div class="mar-pad-r col-der uk-visible@m">&nbsp;</div>
		</article>
	</section>
</footer>
