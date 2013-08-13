<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<head>
	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	
	{{ HTML::style('css/style.css') }}
	
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="script.js"></script>
	<!–[if lt IE ]><style media=”screen” type=”text/css”>.main {height:100%;}</style><![endif]–>
</head>

<body>
<div id="wrapper">
<div id="header">
	@yield('header')
</div>
<div id="premium">
	@include('sitepages.premium')
</div>
<div id="content">
<div id="sidebar_left">
	@yield('sidebar_left')
</div>
<div class="cont">
	@yield('content') 
</div>
</div>
</div>
<div id="footer">
	@yield('footer')
</div>
</body>