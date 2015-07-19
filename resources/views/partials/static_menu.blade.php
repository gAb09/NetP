	<!-- Static navbar -->
	<nav class="navbar navbar-default navbar-static-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/">Nature & Progrès Ariège</a>
			</div>


			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li>
						{!! HTML::linkRoute('adherent.index', 'Adhérents', null, null) !!}
					</li>
					<li>
						{!! HTML::linkRoute('adresse.index', 'Adresses', null, null) !!}
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Structures<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li>
								{!! HTML::linkRoute('structure.index', 'Liste', null, null) !!}
							</li>
							<li>
								{!! HTML::linkRoute('structure.create', 'Créer', null, null) !!}
							</li>
						</ul>
					</li>


					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Personnes<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
					<li>
						{!! HTML::linkRoute('personne.index', 'Liste', null, null) !!}
					</li>
							<li>
								{!! HTML::linkRoute('personne.create', 'Créer', null, null) !!}
							</li>
						</ul>
					</li>


					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Adhésions<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
					<li>
						{!! HTML::linkRoute('adhesion.index', 'Liste', null, null) !!}
					</li>
							<li>
								{!! HTML::linkRoute('adhesion.create', 'Créer une adhésion Conso', ['type' => 'conso'], null) !!}
							</li>
							<li>
								{!! HTML::linkRoute('adhesion.create', 'Créer une adhésion Couple', ['type' => 'couple'], null) !!}
							</li>
							<li>
								{!! HTML::linkRoute('adhesion.create', 'Créer une adhésion Pro pour une structure', ['type' => 'pro_structure'], null) !!}
							</li>
							<li>
								{!! HTML::linkRoute('adhesion.create', 'Créer une adhésion Pro pour une personne', ['type' => 'pro_personne'], null) !!}
							</li>
						</ul>
					</li>
					
				</ul>


				@if (Auth::check())
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<img src="https://www.gravatar.com/avatar/{{{ md5(strtolower(Auth::user()->email)) }}}?s=35" height="35" width="35" class="navbar-avatar">
							{{ Auth::user()->name }} <b class="caret"></b>
						</a>
						<ul class="dropdown-menu">
							<li><a href="/auth/logout"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
						</ul>
					</li>
				</ul>
				@else
				<ul class="nav navbar-nav navbar-right">
					<li><a href="/auth/login"><i class="fa fa-btn fa-sign-in"></i>Login</a></li>
					<li><a href="/auth/register"><i class="fa fa-btn fa-user"></i>Register</a></li>
				</ul>
				@endif
			</div>
		</div>
	</nav>
