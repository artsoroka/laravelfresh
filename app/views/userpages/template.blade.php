<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>@yield('page_name')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    <link href="/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

  </head>

  <body>

    @include('userpages.navbar') 

    <div class="container">

     @yield('content')  

      <hr>

      <footer>
        <p>&copy; Company 2013</p>
      </footer>

    </div> <!-- /container -->



    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="/js/bootstrap.min.js"></script>


    <!-- Modal -->
    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Удаление записи</h3>
      </div>
      <div class="modal-body">
        <p>Вы уверены, что хотите удалить запись? </p>
      </div>
      <div class="modal-footer">
        <button id="cancel" class="btn" data-dismiss="modal" aria-hidden="true">Отменить </button>
        <button id="confirm" class="btn btn-danger">Удалить </button>
      </div>
    </div>


    <script type="text/javascript">

    var remove_category_id; 

    $('.remove_item').click(function(){
        
        remove_category_id = $(this).attr('href'); 

        $('#myModal').modal('show');        
      
        return false; 

    }); 

    $('#cancel').click(function(){
        //alert('canceled!'); 
        remove_category_id = false;  

    }); 
    
    $('#confirm').click(function(){
        //alert('Confirmed!'); 
        window.open( remove_category_id, '_self' );
        
    }); 
    </script>
  </body>
</html>
