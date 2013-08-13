<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
</head>
<body>
	<div class="header">
 		<ul>
			
			 <li><a href="#">Home</a></li>
			 <li><a href="#">Blog</a></li>
			@yield('navigation')
		</ul>
	</div>
@yield('content')
</body>
</html> 
