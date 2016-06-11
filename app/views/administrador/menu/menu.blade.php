@extends('layout.master')

@section('scripts')
{{ HTML::style('css/style.css')}}
{{ HTML::script('js/jquery.babylongrid.js')}}
@overwrite

@section('cuerpo')
<div class="contenedor" style="height:100%; overflow: scroll;">
            <div id="babylongrid">
                
                @foreach($platos as $platos)
                <article>
                    <div class="h3 title">{{ $platos->NOM_PLA }}
                    <a style="float: right;" onclick="ok({{ $platos->ID_PLA }})" class="btn btn-warning" id="{{ $platos->ID_PLA }}" href="#" role="button"><span class="glyphicon glyphicon-ok-sign" title="Agregar"></span></a>
                    <input type="hidden" class="id" value="{{ $platos->ID_PLA }}">
                    </div>
                    <a href="#" class="icon-cloud-download"></a>
                    <div class="desc">
                        {{ $platos->DES_PLA }}
                    </div>
                </article>
                @endforeach
            </div>
</div>
                <script>
            (function($){

                $('#babylongrid').babylongrid({
                    firstToRight: true
                });

                $('#babylongrid2').babylongrid({
                    scheme: [
                        {
                            minWidth: 960,
                            columns: 3
                        },
                        {
                            minWidth: 500,
                            columns: 2
                        },
                        {
                            minWidth: 0,
                            columns: 1
                        }
                    ],
                    afterRender: function() {
                        console.log('rendered');
                    }
                });

                $('#babylongrid3').babylongrid({
                    display: 'tower'
                });

                $('#babylongrid4').babylongrid({
                    display: 'city'
                });

            }(jQuery));
        </script>
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
/*DESDE AQUI EL CODIGO DE MENU*/
function ok($id)
    {
        _modal_menu = $('#menu');
        _plato = $id;
        console.log(_plato);
         $.ajax({
                
                url: "{{ 'ver' }}",
                data: {id:_plato},
                
                success:function(response){
                    _modal_menu.find('.modal-body').html(response);    
                    _modal_menu.find('.btn-guardar').unbind().bind('click',function(e){
                        e.preventDefault();
                        $.ajax({
                            type:'post',   
                            dataType: 'json',
                            url: "{{ url('guardar/plato') }}",
                            data: _modal_menu.find('#formPlato').serialize(),
                            success: function(response){
                                console.log(response);
                                _modal_menu.modal('hide');
                                location.reload(true);
                            }
                        });
                    });
                    _modal_menu.modal('show');     
                }
            });
    };


</script>
<!--MODAL LOGIN-->
<div id="Plato" class="modal fade" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">LOGIN</h4>
            </div>
            <div class="modal-body" >
                
                     
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary btn-guardar">Aceptar</button>
            </div>
        </div>
    </div>
</div>

<div id="menu" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">MENU</h4>

            </div>
            <div class="modal-body">
                

            </div>
            <div class="modal-footer">
              
                <button type="button" class="btn btn-primary aceptar">Continuar</button>
            </div>
        </div>
    </div>
</div>

@overwrite
@stop