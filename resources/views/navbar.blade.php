<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ route('dashboard.index') }}">GoodMarket List Admin</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="{{ route('dashboard.index') }}"><i class="glyphicon glyphicon-home"></i> Inicio</a></li>
        @auth
          @if(auth()->user()->hasRole('admin'))
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-shopping-cart"></i> Mercados<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="{{ route('market-types.index') }}">Tipo de Mercados</a></li>
              <li><a href="{{ route('markets.index') }}">Mercados</a></li>
            </ul>
          </li>
          <li><a href="#"><i class="glyphicon glyphicon-gift"></i> Ofertas y Promociones</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-apple"></i> Categorias y Productos <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="{{ route('categories.index') }}">Categorias</a></li>
              <li><a href="{{ route('products.index') }}">Productos</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#">Subir Productos</a></li>
              <!-- <li role="separator" class="divider"></li>
              <li><a href="#">One more separated link</a></li> -->
            </ul>
          </li>
          <li><a href="{{ route('users.index') }}"><i class="glyphicon glyphicon-user"></i> Usuarios</a></li>
          <li><a href="#"><i class="glyphicon glyphicon-file"></i> Reportes</a></li>
          @endif
          
          @if(auth()->user()->hasRole('manager'))
          <li><a href="#"><i class="glyphicon glyphicon-gift"></i> Ofertas y Promociones</a></li>
          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-apple"></i> Categorias y Productos <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ route('categories.index') }}">Categorias</a></li>
            <li><a href="{{ route('products.index') }}">Productos</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Subir Productos</a></li>
            <!-- <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li> -->
          </ul>
        </li>
          @endif
        @endauth
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <!-- <li><a href="#">Link</a></li> -->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-user"></i> &nbsp {{ Auth::user()->name }} <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <!-- <li><a href="#">Action</a></li>
            <li role="separator" class="divider"></li> -->
            <li>
              <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  Salir
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
          </li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>