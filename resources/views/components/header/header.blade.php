<div class="header">
	<div class="header__logo">
		<a href="/">HardwareForum.ua</a>
	</div>
	<div class="header__auth">
		@guest
			<div>
				<div class="header__register">
					<a href="/register">Реєстрація</a>
				</div>
				<div class="header__login">
					<a href="/login">Вхід</a>
				</div>
			</div>
		@else
			<div>
				@if(Auth::user()->role === 'admin')
					<div class="header__login">
						<a href="{{route("admin.index")}}">Адмін-панель</a>
					</div>
				@endif
				<div class="header__login">
					<a href="{{route("profile.index", Auth::user()->id)}}">{{Auth::user()->name}}</a>
				</div>
			    <div class="header__login">
			    	<a class="dropdown-item header__auth-login" href="{{ route('logout') }}"
		            	onclick="event.preventDefault();
		                document.getElementById('logout-form').submit();">
		                    {{ __('Вийти') }}
		        	</a>
		        	<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
		            	@csrf
		        	</form>
			    </div>
			</div>
		@endguest
		
		<div onclick="searchForm()" id="searchButton">
			<div class="header__button">
				Пошук
			</div>
		</div>
	</div>
</div>
<div class="search" id="searchForm" >
	<div class="search__form">
		<input type="text" class="search__input">
		<button type="submit" class="search__button">Пошук</button>
	</div>
</div>