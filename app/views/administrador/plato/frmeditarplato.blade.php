{{ Form::open(array('id'=>'formPlato')) }}
{{ Form::hidden('correlativo') }}
<table>
	<fieldset>
		<legend>DATOS DEL PLATO</legend>
			<tr>
				<td>
				{{ Form::label('', 'ID :', array('class'=>'')) }}
				</td>
				<td>
				{{ Form::text('idplato', $datos['idplato'], array('class'=>'form-control','readonly'=>'')) }}
				
				</td>
			</tr>
			<tr>
				<td>
				{{ Form::label('', 'Nombre :', array('class'=>'')) }}
				</td>
				<td>
				{{ Form::text('nomplato', $datos['nomplato'], array('class'=>'form-control')) }}
				
				</td>
			</tr>
			<tr>
				<td>
				{{ Form::label('', 'Descripcion :', array('class'=>'')) }}
				</td>
				<td>
				{{ Form::text('desplato', $datos['desplato'], array('class'=>'form-control')) }}
				</td>
			</tr>
			<tr>
				<td>
				{{ Form::label('', 'Precio :', array('class'=>'')) }}
				</td>
				<td>
				{{ Form::text('preplato', $datos['preplato'], array('class'=>'form-control')) }}
				</td>
			</tr>
			<tr>
				<td>
				{{ Form::label('', 'Tiempo de preparacion :', array('class'=>'')) }}
				</td>
				<td>
				{{ Form::text('tieplato', $datos['tieplato'], array('class'=>'form-control')) }}
				</td>
			</tr>
			<tr>
				<td>
				{{ Form::label('', 'Stock :', array('class'=>'')) }}
				</td>
				<td>
				{{ Form::text('stockplato', $datos['stockplato'], array('class'=>'form-control')) }}
				</td>
			</tr>			
		</table>
</fieldset>
{{ Form::close() }}
