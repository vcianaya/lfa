@extends('layout.master')
@section('scripts')
<script type="text/javascript">
$(document).ready(function(){
_modal_plato = $('#Plato');

        $('.login').unbind().bind('click',function(e){
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
                                window.location="{{URL::to('administrar/plato')}}";
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