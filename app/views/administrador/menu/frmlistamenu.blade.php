<fieldset class="fieldcuerpo" align="left" >
	<legend>LISTA DE PLATOS</legend>

<a class="btn btn-success finalizar" href="#" role="button">FINALIZAR</a>
    <a style="float: right;" class="btn btn-warning vaciar" href="#" role="button">
    <span class="glyphicon glyphicon-trash"></span> Vaciar lista</a>
<div class="contenedor">
 <table id="lista" class="table table-hover">
        <thead>
        <tr>
            <th>NOMBRE</th>
            <th>PRECIO</th>
            <th>QUITAR</th>            
        </tr>
    </thead>
    <tbody style="font-size: 13px">
    @foreach($cart as $cart)
    	<tr id="{{ $cart->ID_PLA }}">
    		<td>{{ $cart->NOM_PLA }}</td>
    		<td>{{ $cart->DES_PLA }}</td>
    		<td align="center"><a class="btn btn-danger borrar"  style="font-size: 13px;" href="#" role="button"><span class="glyphicon glyphicon-remove-sign"></span></a></td>
    	</tr>
    @endforeach
    </tbody>
        </table>
    <script type="text/javascript">
        $('.borrar').unbind().bind('click',function(e){
        e.preventDefault();
        _fila = $(this).closest('tr');
            _fila_id = _fila.attr('id');
                $.ajax({
                    url: "{{ url('menu/quitar') }}",
                    data:{id:_fila_id},
                    
                    success: function(response){                    
                        _fila.remove(); 

                    }
                });
    });

        $('.vaciar').unbind().bind('click',function(e){
            e.preventDefault();
            
                $.ajax({
                    url: "{{ url('vaciar') }}",
                 success: function(response){                    
                         _modal_menu.modal('hide');

                    }
                });
    });
        $('.aceptar').unbind().bind('click', function(e){
            _modal_menu.modal('hide');
        });
        $('.finalizar').unbind().bind('click', function(e){
            $('#formulariOculto').css("display", "block");
            $('#lista').css("display", "none");
            $('.finalizar').remove();
            $('.vaciar').remove();
            $( ".vaciar" ).fadeOut( "slow" );

        });
    </script>
</div>
</fieldset>

<div id="formulariOculto" style="display: none;">
<form method="post" action="{{ url('menu/guardar') }}">
  <div class="form-group">
    <label>Nombre del Menu</label>
    <input type="text" class="form-control" name="nom_menu">
  </div>
  <div class="form-group">
    <label>Descripcion</label>
    <input type="text" class="form-control" name="des_menu">
  </div>
  <button type="submit" class="btn btn-default">GUARDAR</button>
</form>
</div>