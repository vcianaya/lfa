{{ Form::open(array('id'=>'formPlato')) }}
<table>
	<fieldset>
		<legend>DATOS DEL PLATO</legend>
			<tr>
				<td>
				{{ Form::label('', 'Nombre :', array('class'=>'')) }}
				</td>
				<td>
				{{ Form::text('nom_pla', '', array('class'=>'form-control')) }}
				
				</td>
			</tr>
			<tr>
				<td>
				{{ Form::label('', 'Descripcion :', array('class'=>'')) }}
				</td>
				<td>
				{{ Form::text('des_pla', '', array('class'=>'form-control')) }}
				
				</td>
			</tr>
			<tr>
				<td>
				{{ Form::label('', 'Precio :', array('class'=>'')) }}
				</td>
				<td>
				{{ Form::text('pre_pla', '', array('class'=>'form-control')) }}
				</td>
			</tr>
			<tr>
				<td>
				{{ Form::label('', 'Stock :', array('class'=>'')) }}
				</td>
				<td>
				{{ Form::text('sto_pla', '', array('class'=>'form-control')) }}
				</td>
			</tr>
</fieldset>					
		</table>

{{ Form::close() }}
