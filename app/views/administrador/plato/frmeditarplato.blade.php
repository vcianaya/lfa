{{ Form::open(array('id'=>'formPlato')) }}

<table>
	<fieldset>
		<legend>DATOS DEL PLATO</legend>
			<tr>
				<td>
				{{ Form::label('', 'ID :', array('class'=>'')) }}
				</td>
				<td>
				{{ Form::text('id_pla', $datos['id_pla'], array('class'=>'form-control','readonly'=>'')) }}
				
				</td>
			</tr>
			<tr>
				<td>
				{{ Form::label('', 'Nombre :', array('class'=>'')) }}
				</td>
				<td>
				{{ Form::text('nom_pla', $datos['nom_pla'], array('class'=>'form-control')) }}
				
				</td>
			</tr>
			<tr>
				<td>
				{{ Form::label('', 'Descripcion :', array('class'=>'')) }}
				</td>
				<td>
				{{ Form::text('des_pla', $datos['des_pla'], array('class'=>'form-control')) }}
				</td>
			</tr>
			<tr>
				<td>
				{{ Form::label('', 'Precio :', array('class'=>'')) }}
				</td>
				<td>
				{{ Form::text('pre_pla', $datos['pre_pla'], array('class'=>'form-control')) }}
				</td>
			</tr>
			
			<tr>
				<td>
				{{ Form::label('', 'Stock :', array('class'=>'')) }}
				</td>
				<td>
				{{ Form::text('sto_pla', $datos['sto_pla'], array('class'=>'form-control')) }}
				</td>
			</tr>			
		</table>
</fieldset>
{{ Form::close() }}
