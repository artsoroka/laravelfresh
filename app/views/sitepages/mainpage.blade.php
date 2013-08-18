@extends('sitepages.template')


@section('header')

<a href="/"><div id="logo">
FRESH IDEAS
</div></a>
<div id="reg">
	<form method="POST" action="">
		<a href="signup">РЕГИСТРАЦИЯ</a>
		Логин: <input type="text" name="login">
		Пароль: <input type="password" name="password">
	</form>
</div>
<div id="menu_top">
	<ul>
		<li><a href="">Категория</a></li>
		<li><a href="">Категория</a></li>
		<li><a href="">Категория</a></li>
		<li><a href="">Категория</a></li>
		<li><a href="">Категория</a></li>
		<li><a href="">Категория</a></li>
		<li><a href="">Категория</a></li>
	</ul>
</div>

@endsection


@section('content')
	@foreach ($items as $item)

		<a href="catalog/{{ $item->id }}">
		<div class="items">
		<div class="item_name">
		<h3>{{ $item->title }}</h3>
		</div>
		<div class="item_img">
		<img src="/img/12.png" width="170px" height="auto"/>
		</div>
		<div class="item_desc">
		{{ $item->description }}
		</div>
		</div>
		</a>

	@endforeach

@endsection