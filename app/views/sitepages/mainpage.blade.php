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
<a href="catalog/1">
<div class="items">
<div class="item_name">
<h3>Название товара</h3>
</div>
<div class="item_img">
<img src="/img/12.png" width="170px" height="auto"/>
</div>
<div class="item_desc">
Бкутишутиутиутилкиту
</div>
</div>
</a>

<a href="catalog/2">
<div class="items">
<div class="item_name">
<h3>Название товара</h3>
</div>
<div class="item_img">
<img src="/img/12.png" width="170px" height="auto"/>
</div>
<div class="item_desc">
Бкутишутиутиутилкиту
</div>
</div>
</a>


<a href="catalog/3">
<div class="items">
<div class="item_name">
<h3>Название товара</h3>
</div>
<div class="item_img">
<img src="/img/12.png" width="170px" height="auto"/>
</div>
<div class="item_desc">
Бкутишутиутиутилкиту
</div>
</div>
</a>


<a href="catalog/4">
<div class="items">
<div class="item_name">
<h3>Название товара</h3>
</div>
<div class="item_img">
<img src="/img/12.png" width="170px" height="auto"/>
</div>
<div class="item_desc">
Бкутишутиутиутилкиту
</div>
</div>
</a>


<a href="catalog/5">
<div class="items">
<div class="item_name">
<h3>Название товара</h3>
</div>
<div class="item_img">
<img src="/img/12.png" width="170px" height="auto"/>
</div>
<div class="item_desc">
Бкутишутиутиутилкиту
</div>
</div>
</a>

<a href="catalog/1">
<div class="items">
<div class="item_name">
<h3>Название товара</h3>
</div>
<div class="item_img">
<img src="/img/12.png" width="170px" height="auto"/>
</div>
<div class="item_desc">
Бкутишутиутиутилкиту
</div>
</div>
</a>
@endsection