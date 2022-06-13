<div id="slide-out" class="side-nav sn-bg-5 fixed">
	<ul class="custom-scrollbar">
	<li class="logo-sn waves-effect py-3">
			<div class="text-center">
				<a href="#" class="pl-0">
					<img class="img-fluid h-100" src="{{asset('img/design/logo_woz.png')}}">
				</a>
			</div>
		</li>
		{{-- <li>
			<ul class="collapsible collapsible-accordion">
				<li class="{{ (request()->is('admin/config')) ? 'active' : '' }}">
					<a class="collapsible-header waves-effect arrow-r {{ (request()->is('admin/config')) ? 'active' : '' }}">
						<i class="w-fa fas fa-cog"></i>
						Configuración
						<i class="fas fa-angle-down rotate-icon"></i>
					</a>
					<div class="collapsible-body">
						<ul>
							<li>
								<a href="../dashboards/v-1.html" class="waves-effect">Version 1</a>
							</li>
						</ul>
					</div>
				</li>
				<li class="{{ (request()->is('admin/productos')) ? 'active' : '' }}">
					<a class="collapsible-header waves-effect arrow-r {{ (request()->is('admin/productos')) ? 'active' : '' }}">
						<i class="fas fa-box-open"></i>
						Productos
						<i class="fas fa-angle-down rotate-icon"></i>
					</a>
					<div class="collapsible-body">
						<ul>
							<li>
								<a href="{{route('productos.create')}}" class="waves-effect">Nuevo</a>
							</li>
						</ul>
					</div>
				</li>
				<li>
					<a class="collapsible-header waves-effect arrow-r">
						<i class="w-fa fas fa-map"></i>Maps<i class="fas fa-angle-down rotate-icon"></i>
					</a>
					<div class="collapsible-body">
						<ul>
							<li>
								<a href="../maps/google.html" class="waves-effect">Google Maps</a>
							</li>
							<li>
								<a href="../maps/full.html" class="waves-effect">Full screen map</a>
							</li>
							<li>
								<a href="../maps/vector.html" class="waves-effect">Vector world map</a>
							</li>
						</ul>
					</div>
				</li>
			</li> --}}
			<li>
				<ul class="collapsible collapsible-accordion">
					<li>
						<a href="{{ route('pedidos.index') }}" class="collapsible-header waves-effect {{ (request()->is('admin/pedidos')) ? 'active' : '' }}"><i class="w-fa fas fa-file-invoice-dollar"></i>Pedidos</a>
					</li>
					<li class="{{ (request()->is('admin/config')) ? 'active' : '' }}">
						<a class="collapsible-header waves-effect arrow-r">
							<i class="fas fa-gavel"></i>
							Subastas
							<i class="fas fa-angle-down rotate-icon"></i>
						</a>
						<div class="collapsible-body">
							<ul>
								<li>
									<a href="{{ route('subastas.orden.index') }}" class="collapsible-header waves-effect {{ (request()->is('admin/subastas/ordenes')) ? 'active' : '' }}"> Panel subastas</a>
								</li>
								<li>
									<a href="{{ route('subastas.index') }}" class="collapsible-header waves-effect {{ (request()->is('admin/subastas')) ? 'active' : '' }}"> Subastas</a>
								</li>
							</ul>
						</div>
					</li>
					{{-- <li>
						<a href="{{ route('subastas.index') }}" class="collapsible-header waves-effect {{ (request()->is('admin/subastas')) ? 'active' : '' }}"> <i class="fas fa-gavel"></i>Subastas</a>
					</li> --}}
					<li>
						<a href="{{ route('productos.index') }}" class="collapsible-header waves-effect {{ (request()->is('admin/productos')) ? 'active' : '' }}"><i class="fas fa-box-open"></i>Productos</a>
					</li>
					<li>
						<a href="{{ route('config.space.index') }}" class="collapsible-header waves-effect {{ (request()->is('admin/config/spaces')) ? 'active' : '' }}"><i class="fas fa-couch"></i>Espacios</a>
					</li>
					<li>
						<a href="{{ route('colaboradores.index') }}" class="collapsible-header waves-effect {{ (request()->is('admin/colaboradores')) ? 'active' : '' }}"> <i class="fas fa-handshake"></i>Colaboradores</a>
					</li>
					{{-- <li class="{{ (request()->is('admin/config')) ? 'active' : '' }}">
						<a class="collapsible-header waves-effect arrow-r">
							<i class="fas fa-handshake"></i>
							Colaboraciones
							<i class="fas fa-angle-down rotate-icon"></i>
						</a>
						<div class="collapsible-body">
							<ul>
								<li>
									<a href="{{ route('colaboradores.index') }}" class="collapsible-header waves-effect {{ (request()->is('admin/colaboradores')) ? 'active' : '' }}"> Colaboradores</a>
								</li>
								<li>
									<a href="{{ route('colaboradores.index') }}" class="collapsible-header waves-effect {{ (request()->is('admin/colaboraciones')) ? 'active' : '' }}"> Colaboraciones</a>
								</li>
							</ul>
						</div>
					</li> --}}
					<li>
						<a href="{{ route('clientes.index') }}" class="collapsible-header waves-effect {{ (request()->is('admin/clientes')) ? 'active' : '' }}"><i class="w-fa fas fa-users"></i>Clientes</a>
					</li>
					<li>
						<a href="{{ route('newslatters.index') }}" class="collapsible-header waves-effect {{ (request()->is('admin/newslatters')) ? 'active' : '' }}"><i class="fab fa-mailchimp"></i>Newslatter</a>
					</li>

					<li>
						<a href="{{ route('config.index') }}" class="collapsible-header waves-effect {{ (request()->is('admin/config')) ? 'active' : '' }}"><i class="w-fa fas fa-cog"></i>Configuración</a>
					</li>

				</ul>
			</li>
		</ul>

	<div class="sidenav-bg mask-strong"></div>

	<div class="fixed-action-btn clearfix d-none" style="bottom: 45px; right: 24px;">
		<a class="btn-floating btn-lg red">
			<i class="fas fa-pencil-alt"></i>
		</a>
		<ul class="list-unstyled">
			<li><a class="btn-floating red"><i class="fas fa-star"></i></a></li>
			<li><a class="btn-floating yellow darken-1"><i class="fas fa-user"></i></a></li>
			<li><a class="btn-floating green"><i class="fas fa-envelope"></i></a></li>
			<li><a class="btn-floating blue"><i class="fas fa-shopping-cart"></i></a></li>
		</ul>
	</div>
</div>
