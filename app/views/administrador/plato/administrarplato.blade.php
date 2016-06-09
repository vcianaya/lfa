@extends('layout.master')
@section('scripts')
<script type="text/javascript">
$(document).ready(function(){
_modal_plato = $('#Plato');

        $('.registrarPlato').unbind().bind('click',function(e){
            e.preventDefault();
            $.ajax({
                url: "{{ url('agregar/plato') }}",
                
                success:function(response){
                    _modal_plato.find('.modal-body').html(response);    
                    _modal_plato.find('.btn-guardar').unbind().bind('click',function(e){
                        e.preventDefault();
                        $.ajax({
                            type:'post',   
                            dataType: 'json',
                            url: "{{ url('guardar/plato') }}",
                            data: _modal_plato.find('#formPlato').serialize(),
                            success: function(response){
                                console.log(response);
                                _modal_plato.modal('hide');
                                location.reload(true);
                            }
                        });
                    });
                    _modal_plato.modal('show');     
                }
            });
        });

        $('.editarPlato').unbind().bind('click',function(e){
            e.preventDefault();            
            _fila = $(this).closest('tr');
            _fila_id = _fila.attr('id');  

            $.ajax({
                url: "{{ url('editar/plato') }}",
                data:{ id: _fila_id },

                success:function(response){
                    _modal_plato.find('.modal-body').html(response);      
                    _modal_plato.find('.btn-guardar').unbind().bind('click',function(e){
                        e.preventDefault();
                        $.ajax({
                            type:'post',   
                            dataType: 'json',
                            url: "{{ url('editguarda/plato') }}",
                            data: _modal_plato.find('#formPlato').serialize(),
                            success: function(response){
                                console.log(response);
                                _modal_plato.modal('hide');
                                location.reload(true);
                            }
                        });
                    });
                    _modal_plato.modal('show');  
                               
                }
            });
        });

    $('.btn-eliminar').unbind().bind('click',function(e){
            e.preventDefault();
            _fila = $(this).closest('tr');
            _fila_id = _fila.attr('id');
            $.ajax({
               
                success:function(response){                    
                    
                        _modal_plato.find('.modal-title').html('Confirmaci&oacute;n');
                        _modal_plato.find('.modal-body').html('Esta seguro de eliminar este registro?');
                        _modal_plato.find('.modal-footer').find('.btn-primary').unbind().bind('click',function(e){
                            e.preventDefault();
                            _modal_plato.modal('hide');
                            $.ajax({
                                type:'post',                
                                dataType: 'json',
                                url: "{{ url('eliminar/plato') }}",
                                data: {idplato:_fila_id},
                                success: function(response){                    
                                    _fila.remove();                
                                }
                            });
                        });                    
                        _modal_plato.modal('show');                                     
                }
            });
        });


	});
</script>
@overwrite
@section('cuerpo')
<div style="border-radius:4px;-webkit-border-radius:4px;-moz-border-radius:4px;-ms-border-radius:4px;border:1px #036 solid;margin-top:4px;padding:4px 0 4px 0;overflow:auto;">
        <table id="lista" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>IdPlato</th>
            <th>Nombre</th>            
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Accion</th>

        </tr>
    </thead>
    <tbody>
    @foreach($platos as $platos)
    <tr id="{{ $platos->ID_PLA }}">
        <td> {{ $platos->ID_PLA }} </td>
        <td> {{ $platos->NOM_PLA }} </td>
        <td> {{ $platos->DES_PLA }} </td>       
        <td> {{ $platos->PRE_PLA }} </td> 
        <td> {{ $platos->STO_PLA }} </td> 
         

        <td class="text-right">
            <div class="btn-group" role="group" aria-label="...">
               
                <a href="#" class="btn btn-default editarPlato">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>                
                <a href="#" class="btn btn-large btn-danger btn-eliminar">
                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                
               
            </div>
        </td>
    </tr>
    @endforeach 
    </tbody>
        </table>

</div>


<!--MODAL LOGIN-->
<div id="Plato" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">LOGIN</h4>
            </div>
            <div class="modal-body">
                
                     
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary btn-guardar">Aceptar</button>
            </div>
        </div>
    </div>
</div>
@overwrite
@stop