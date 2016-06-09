{{ Form::open(array('id'=>'formPlato')) }}
{{ Form::hidden('correlativo',$correlativo->nrocorrelativo) }}
<table>
	<fieldset>
		<legend>DATOS DEL PLATO</legend>
			<tr>
				<td>
				{{ Form::label('', 'Nombre :', array('class'=>'')) }}
				</td>
				<td>
				{{ Form::text('nomplato', '', array('class'=>'form-control')) }}
				
				</td>
			</tr>
			<tr>
				<td>
				{{ Form::label('', 'Descripcion :', array('class'=>'')) }}
				</td>
				<td>
				{{ Form::text('desplato', '', array('class'=>'form-control')) }}
				</td>
			</tr>
			<tr>
				<td>
				{{ Form::label('', 'Precio :', array('class'=>'')) }}
				</td>
				<td>
				{{ Form::text('preplato', '', array('class'=>'form-control')) }}
				</td>
			</tr>
			<tr>
				<td>
				{{ Form::label('', 'Tiempo de preparacion :', array('class'=>'')) }}
				</td>
				<td>
				{{ Form::text('tieplato', '', array('class'=>'form-control')) }}
				</td>
			</tr>
			<tr>
				<td>
				{{ Form::label('', 'Stock :', array('class'=>'')) }}
				</td>
				<td>
				{{ Form::text('stockplato', '', array('class'=>'form-control')) }}
				</td>
			</tr>			
		</table>
</fieldset>
{{ Form::close() }}
