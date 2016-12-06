<h1>Relatório de Consumo</h1>
<div class="list_entries">
	<table>
		<thead>
			<tr>
				<th width="15%">Cômodo</th>
				<th width="20%">Equipamento</th>
				<th width="20%">Nome</th>
				<th width="15%">Potência</th>
				<th width="10%">Tempo de uso</th>
				<th width="10%">Nº Pessoa</th>
				<th width="10%">kWh/Mês</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$kwhtotal = 0;
				$n_equipments = count($equipments);
				if($n_equipments>0){
					foreach($equipments as $equipment){
						$segments = explode(":", $equipment->use_time);
						$h = (isset($segments[0]))?$segments[0]:0;
						$m = (isset($segments[1]))?$segments[1]:0;
						$s = (isset($segments[2]))?$segments[2]:0;
						$h_t_m = $h*60;
						$m_t_s = ($m + $h_t_m) *60;
						$seconds = $m_t_s+$s;

						$kwh = (($equipment->power*($seconds/3600))/1000)*30;
						if($equipment->consumption_type==1){
							$kwh = $kwh * $equipment->number_of_people;
						}
						$kwhtotal+=$kwh;
						$kwh = number_format($kwh, '3', ',', '.');
				?>
						<tr>
							<td><?php echo $equipment->comodo;?></td>
							<td><?php echo $equipment->equipamento;?></td>
							<td><?php echo $equipment->name;?></td>
							<td><?php echo $equipment->power;?></td>
							<td><?php echo $equipment->use_time;?></td>
							<td><?php echo ($equipment->consumption_type==1)?"<span title='Individual: consumo com base em tempo e na quantidade de watts, multiplicado pelo número de pessoas.' style='cursor:help'>".$equipment->number_of_people."</span>":"<span title='Compartilhado: consumo é apenas baseado no tempo e na quantidade de watts.' style='cursor:help'>-</span>";?></td>
							<td align="right"><?php echo $kwh;?>kWh</td>
						</tr>
				<?php
					}
				?>
				<tr>
					<th colspan="6" align="right">Total Mensal:</th>
					<td align="right"><?php echo number_format($kwhtotal, '3', ',', '.'); ?>kWh</td>
				</tr>
				<?php
			}else{
				?>
				<tr>
					<td colspan="9">Nenhum equipamento registrado, faça os registros aqui: <a href="<?php echo SYSTEM_PATH?>Client_Equipment">Registro de Equipamentos</a></td>
				</tr>
				<?php
			}
				?>
		</tbody>
	</table>
</div>
