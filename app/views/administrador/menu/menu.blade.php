@extends('layout.master')
@section('scripts')
<script type="text/javascript">
	function agregar(data1,data2,data3){
		$('#idproducto').val(data1);
		$('#producto').val(data2);
		$('#pre_pro').val(data3);
	}
</script>

@overwrite
@section('cuerpo')
<fieldset>
<legend class="alert alert-success">Registrar Menu</legend>
<div style="padding:15px;">
<script type="text/javascript">
              $(document).ready(function() { setTimeout(function(){ $(".mensajewarning").fadeIn(2500); },0000); });
              $(document).ready(function() { setTimeout(function(){ $(".mensajewarning").fadeOut(2500); },5000); });
            </script>
         <?php if (Session::has('mensaje2')):
            ?>
                  <div class="mensajewarning alert alert-danger" ><label><?php echo Session::get('mensaje2');?></label></div>
         <?php endif;?>
         <?php if (Session::has('mensaje')):
            ?>
                  <div class="mensajewarning alert alert-success"><label><?php echo Session::get('mensaje');?></label></div>
         <?php endif;?>
       @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
	 <form class="form-horizontal" action="registrarcliente" method="POST">

    <div class="form-group">
    <label for="ejemplo_email_3" class="col-lg-3 control-label">Nombre del menu</label>
    <div class="col-lg-9">
      <input type="email" name="ema_usu" value="" class="form-control" id="ejemplo_email_3"
             placeholder="Nombre del menu">

    </div>
    </div>

    <div class="form-group">
    <label for="ejemplo_email_3" class="col-lg-3 control-label">Descripcion</label>
    <div class="col-lg-9">
    <textarea type="text" name="dir_usu" value="" class="form-control" id="ejemplo_email_3"
             placeholder="Descripcion de menu"></textarea>
    </div>
    </div>
    <fieldset class="">
    	<legend>PLATOS</legend>
    	
	<button class="btn btn-success" id="agregar" type="button" data-toggle = "modal" data-target = "#myModal"><span class="glyphicon glyphicon-shopping-cart"></span> Agregar producto</button>
				<br/>
				</br>
    	<table id="tabla" style=" margin-left:5%;" class="table table-responsive table-hover">
	<!-- Cabecera de la tabla -->
						<thead>
							<tr class="active">
								
								<th>Producto</th>
								<th>Precio</th>
								
								<th>&nbsp;</th>
							</tr>
						</thead>
 
	<!-- Cuerpo de la tabla con los campos -->
						<tbody class="table-hover">
		<!-- fila base para clonar y agregar al final -->
							<tr> 
								
								<td><input type="text" class="form-control" id="producto" name="producto[]" style="width:280px;" readonly="readonly"/></td>
								<input type="hidden" class="form-control" id="idproducto" name="idproducto[]" style="width:280px;" readonly="readonly"/>
								<input type="hidden" class="form-control" id="pro_pin" name="pro_pin[]" style="width:280px;" readonly="readonly"/>
								<td><input type="text" class="form-control" id="pre_pro" name="pre_pro[]" style="width:80px;" readonly="readonly"/></td>
                
							  
								<td class="eliminar btn btn-danger" ><span class="glyphicon glyphicon-remove"></span>Eliminar</td>								
							</tr>
		<!-- fin de código: fila base -->
 
		<!-- Fila de ejemplo -->
							
		<!-- fin de código: fila de ejemplo -->
 
						</tbody>
					</table>
    </fieldset>
    <div class = "modal-footer">
            <button type = "submit" class = "btn btn-success" data-dismiss = "modal"><span class="glyphicon glyphicon-check"></span>
              Registrar Menu
            </button>
            
            <button type = "button" class = "btn btn-danger"><span class="glyphicon glyphicon-trash"></span>
               Limpiar datos
            </button>
         </div>
</form>

<div class = "modal fade" id = "myModal" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog">
      <div class = "modal-content">
         
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            
            <h4 class = "modal-title" id = "myModalLabel">
               Platos disponibles
            </h4>
         </div>
         
         <div class = "modal-body">
         <div style="padding-left:20px;" class="table table-responsive">
        <table id="example" class="table table-hover" cellspacing="5" width="100%" style="">
        <thead>
        <tr class="info">
            <th>IdPlato</th>
            <th>Nombre</th>            
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Tiempo Preparacion</th>
            <th>Stock</th>
            <th>Accion</th>

        </tr>
    </thead>
    <tbody>
    @foreach($platos as $platos)
    <tr id="{{ $platos->idplato }}">
        <td> {{ $platos->idplato }} </td>
        <td> {{ $platos->nomplato }} </td>
        <td> {{ $platos->desplato }} </td>       
        <td> {{ $platos->preplato }} </td> 
        <td> {{ $platos->tieplato }} </td> 
        <td> {{ $platos->stockplato }} </td> 

        <td class="text-right">
            <div class="btn-group" role="group" aria-label="...">
               <?php $id = "'".$platos->idplato."'";
               		 $prod = "'".$platos->nomplato."'";
               		 $pre = "'".$platos->preplato."'";?>
                <button onClick="javascript:agregar(<?php echo $id.','.$prod.','.$pre;?>);" data-dismiss = "modal" class="btn btn-success editar-medidor">
                <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></button>                
               
            </div>
        </td>
    </tr>
    @endforeach 
    </tbody>
        </table>

</div>

         </div>
         
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
  
</div><!-- /.modal -->
  </div>
</div>
 @overwrite
@stop