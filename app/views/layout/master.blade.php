

<!DOCTYPE HTML>
<html>
<head>
<title>COMA y. (, .)</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

{{ HTML::style('plantilla/css/style.css')}}
{{ HTML::style('plantilla/css/slider.css')}}
{{ HTML::script('plantilla/js/modernizr.custom.28468.js') }}
{{ HTML::style('bootstrap/css/bootstrap.min.css')}}
{{ HTML::style('bootstrap/css/bootstrap-theme.min.css')}}
{{ HTML::script('plantilla/js/jquery.min.js') }}
{{ HTML::script('bootstrap/js/jquery.js')}}
{{ HTML::script('plantilla/js/jquery.cslider.js') }}
{{ HTML::script('bootstrap/js/bootstrap.min.js')}}
<!-- DATATABLE SCRIPSTS
{{ HTML::script('datatables/datatables.min.js') }}
{{ HTML::style('datatables/datatables.min.css') }}
{{ HTML::style('datatables/tables/css/dataTables.bootstrap.min.css') }}
{{ HTML::style('datatables/tables/css/dataTables.bootstrap.css') }}-->
@yield('scripts')
	

</head>
<body>
<div class="wrap">
	<div class="main"><!-- start main -->
		<div class="grid1_of_1"><!-- start grid1_of_1 -->
		<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Brand</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="../../../menu">Registar Menu</a></li>
            <li><a href="{{url('administrar/plato')}}">Listar Plato</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Platos <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a class="registrarPlato" href="#">Registar Plato</a></li>
            <li><a href="{{url('administrar/plato')}}">Listar Plato</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

		<div class="grids_of_2"><!-- start grids_of_2 -->	
@yield('cuerpo')<!--aqui todo el contenido del cuerpo-->
						<div class="clear"></div>
<!--			<div  class="grid_bottom">
				<h2>algun contenido de pie</h2>
			</div>-->
		</div><!-- end grids_of_2 -->	
		</div><!-- end grid1_of_1 -->
		<div class="grid1_of_2"><!-- start grid1_of_2 -->
			<div class="grid1_of_list1"><!-- start grid1_of_list1 -->
				<div class="grid_img">
					{{ HTML::image('plantilla/images/pic1.jpg') }}
				</div>
				<div class="grid_text">
					<div class="grid_text1">
						<h4>prawns</h4>
						<h5>garlic & pepper</h5>
					</div>
					<ul class="list1">
						<li class="active"><a href="#">prawns <span>3lb</span> </a></li>
						<li><a href="#">salmon<span>2pcs</span> </a></li>
						<li class="active"><a href="#">green salad<span>2pcs</span> </a></li>
						<li><a href="#">onions <span>0,5lb</span> </a></li>
						<div class="clear"></div>
					</ul>
				</div>
			</div>
			<div class="grid1_of_list2"><!-- start grid1_of_list2 -->
				<div class="grid1_of_list">
					{{ HTML::image('plantilla/images/pic2.jpg') }}
					<h4>roasted chicken</h4>
				</div>
				<ul class="list2">
					<li><p>Kcal</p><span>230</span></li>
					<li><p>prawns</p> <span>12%</span></li>
					<div class="clear"></div>
				</ul>
			</div><!-- end grid1_of_list2 -->
		</div><!-- end grid1_of_2 -->
	</div><!-- end main -->
</div>
</body>
</html>