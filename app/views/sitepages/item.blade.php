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
	<div class="item_header">
		<div class="item_pic">
		<img src="/img/10.png" width="400" height="auto" />
		<img src="/img/12.png" width="400" height="auto"/>
		</div>
		<div class="i_name">
		{{ $item->title }}
		</div>
		<div class="i_info">
		Сертификат на покупку<br>
		Цена: <span class="red"> {{ $item->price }} руб.</span><br>
		<div class="icons">
		<img src="/img/new.png" width="50" height="auto"/>
		<img src="/img/sale.png" width="50" height="auto"/>
		</div>
		</div>
		</div>
		<div class="i_desc">
		Описание сертификата<br>
		{{ $item->description }}
		</div>
		<div class="buy">
		<a href="">Купить</a>
		</div>
		<div class="i_company">э
		похожие товары
	</div>
		<script type="text/javascript">

		$(".item_pic img").hide();
		$(".item_pic img").eq(0).show();

		</script>
@endsection