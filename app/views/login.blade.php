<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Sign in &middot; Twitter Bootstrap</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
    <link href="/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
  </head>

  <body>

    <div class="container">
      <form class="form-signin" action="login" method="POST">   
        @unless (!$error)
          <div class="alert alert-error">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
           <h4>Ошибка </h4>
          Неправильно указан адрес или пароль 
        </div>
      @endunless 


        <h2 class="form-signin-heading">Привейд </h2>
        <input type="text" name="email" class="input-block-level" placeholder="адрес электронной почты">
        <input type="password" name="password" class="input-block-level" placeholder="пароль">
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        <input class="btn btn-large btn-primary" type="submit" value="Войти" />
      </form>

    </div> <!-- /container -->

    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="/js/bootstrap.min.js"></script>

  </body>
</html>
