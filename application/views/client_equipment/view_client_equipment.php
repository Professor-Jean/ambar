<script>
	$( function() {
		$( "#tabs" ).tabs();
	});

</script>
<?php
	$query_room = $this->db->get('room');
?>
<h1>Equipamentos</h1>
<div id="tabs" class="table_tabs">
	<ul>
		<?php
		$i=0;
			foreach($query_room->result_array() as $room) {
				$i++;
		?>
				<li><a href="#tabs-<?php echo $room['id']; ?>"><?php echo $room['name']; ?></a></li>
		<?php
				if($i>9){
					$i=0;
					?>
					<br/>
					<?php
				}
			}
		?>
		<a class="add_link" id="create-equipment" href="Client_Equipment/formIns" ><i class="fa fa-plus" aria-hidden="true"></i> Adicionar equipamento</a>
	</ul>
	<?php
		foreach($query_room->result_array() as $room) {

		$query_equipment = $this->db->query("SELECT client_equipment.id AS c_e_id, client_equipment.name AS equipamento, client_equipment.power AS potencia, client_equipment.use_time AS tempo_uso, client_equipment.number_of_people AS n_pessoas, clients.id, equipment.id, equipment.consumption_type ,equipment.name AS tipo, room.name, room.id FROM client_equipment INNER JOIN clients ON client_equipment.clients_id = clients.id INNER JOIN room ON client_equipment.room_id = room.id INNER JOIN equipment ON client_equipment.equipment_id = equipment.id WHERE client_equipment.room_id='".$room['id']."' AND clients.users_id='".$_SESSION['id']."' ORDER BY client_equipment.name");
	?>
	<div id="tabs-<?php echo $room['id']; ?>">
		<table>
			<tr>
				<th>Tipo</th>
				<th>Nome</th>
				<th>Potência</th>
				<th>Tempo de uso (diário)</th>
				<th>Nº de Pessoas</th>
				<th>Editar</th>
				<th>Excluir</th>
				<th>Clonar</th>
			</tr>
			<?php
				if($query_equipment->num_rows()==0){
					?>
					<tr>
						<td colspan="8">Nenhum equipamento cadastrado.</td>
					</tr>
					<?php
				}else{
				foreach($query_equipment->result_array() as $equipment){
		 	?>
			<tr>
				<td><?php echo $equipment['tipo']; ?></td>
				<td><?php echo $equipment['equipamento']; ?></td>
				<td><?php echo $equipment['potencia']; ?></td>
				<td><?php echo $equipment['tempo_uso']; ?></td>

				<td><?php echo ($equipment['consumption_type']==1)?"<span title='Individual: consumo com base em tempo e na quantidade de watts, multiplicado pelo número de pessoas.' style='cursor:help'>".$equipment['n_pessoas']."</span>":"<span title='Compartilhado: consumo é apenas baseado no tempo e na quantidade de watts.' style='cursor:help'>-</span>";?></td>
				<td><a href="<?php echo SYSTEM_PATH?>Client_Equipment/update/<?php echo $equipment['c_e_id']?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
				<td><a href="<?php echo SYSTEM_PATH?>Client_Equipment/delete/<?php echo $equipment['c_e_id']?>"><i class="fa fa-trash"  aria-hidden="true"></i></a></td>
				<td><a href="<?php echo SYSTEM_PATH?>Client_Equipment/cloneEquip/<?php echo $equipment['c_e_id']?>"><i class="fa fa-clone" aria-hidden="true"></i></a></td>
			</tr>
			<?php
				}
			}
 			?>
		</table>
	</div>
	<?php
		}
	?>
</div>
