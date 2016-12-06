<h1>Equipamentos</h1>
<div class="list_entries">
	<h2><a href="<?php echo SYSTEM_PATH?>Reg_Equipment/fm_register"><i class="fa fa-plus" aria-hidden="true"></i>Adicionar equipamento</a></h2>
	<table>
		<tr>
			<th width="25%">Tipo</th>
			<th width="10%">Potência</th>
			<th width="15%">Tempo de uso</th>
			<th width="10%">Compartilhado?</th>
			<th width="30%">Potência média</th>
			<th width="5%">Editar</th>
			<th width="5%">Excluir</th>
		</tr>
		<?php
			foreach($equipment as $single_equipment){
				?>
				<tr>
					<td><?php echo $single_equipment->name?></td>
					<td><?php echo $single_equipment->power?> W</td>
					<td><?php echo $single_equipment->use_time?> h/d</td>
					<td><?php echo $single_equipment->consumption_type == '0' ? 'Sim' : 'Não'?></td>
					<td><?php echo $single_equipment->normal_power_1 . " W - " . $single_equipment->normal_power_2 . " W"?></td>
					<td><a href="<?php echo SYSTEM_PATH?>Reg_Equipment/update/<?php echo $single_equipment->id?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
					<td><a href="<?php echo SYSTEM_PATH?>Reg_Equipment/delete/<?php echo $single_equipment->id?>"><i class="fa fa-trash"  aria-hidden="true"></i></a></td>
				</tr>
				<?php
			}
		?>
	</table>
</div>
