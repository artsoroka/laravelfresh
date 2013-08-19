    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="/home">Fresh Ideas </a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Мой профиль <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="/home/profile">Редактировать анкету</a></li>
                  <li><a href="/home/notifications">Мои Уведомления</a></li>
                  <li class="divider"></li>
                  <li class="nav-header">Корзина</li>
                  <li><a href="/home/cart">Мои заказы </a></li>
                  <li><a href="/home/notifications">Уведомления </a></li>
                  <li class="divider"></li>
                  <li class="nav-header">Платежи</li>
                  <li><a href="/home/billing">Состояние счёта </a></li>
                  <li><a href="/home/billing">Посмотреть отчёт </a></li>
                </ul>
              </li>

              <li><a href="#">Bonus </a></li>

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Управление <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li class="nav-header">Организация</li>
                  <li><a href="/home/company">Мои компании</a></li>
                  <li><a href="/home/company/new">Добавить компанию</a></li>
                  <li class="divider"></li>
                  <li class="nav-header">Сертификаты</li>
                  <li><a href="/home/certificate">Мои сертификаты </a></li>
                  <li><a href="/home/certificate/pending">Ожидают подтверждения </a></li>
                  <li><a href="/home/certificate/new">Новый сертификат </a></li>
                </ul>
              </li>

            </ul>
            <div class="navbar-form pull-right">
              
              <div class="btn-group">
                <button class="btn dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i> {{ Auth::user()->email }} <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="/logout">Выйти</a></li>
                </ul>
              </div>

              <a href="/logout" type="submit" class="btn btn-primary">Выйти</a>


            </div>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>