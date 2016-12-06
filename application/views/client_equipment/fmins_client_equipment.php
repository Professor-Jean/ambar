<?php
	$this->db->from('equipment');
	$this->db->order_by("name", "asc");
	$query_type = $this->db->get();

	$this->db->from('room');
	$this->db->order_by("name", "asc");
	$query_room = $this->db->get();
?>
	<div class="reg_wrapper" style="display: block">
	<h2>Cadastrar equipamento</h2>
	<?php echo form_open('Client_Equipment/register', 'name="register"');?>
	<select name="sel_type" id="sel_equip">
		<option value="">Selecione</option>
			<?php foreach($query_type->result_array() as $type) { ?>
		<option value="<?php echo $type['id']; ?>"><?php echo $type['name']; ?></option>
		<?php } ?>
	</select>
	<?php echo form_error('sel_type');?>
	<input name="txt_name" type="Text" placeholder="Nome">
	<?php echo form_error('txt_name');?>
	<select name="sel_room">
		<option value="">Selecione</option>
		<?php foreach($query_room->result_array() as $room) { ?>
			<option value="<?php echo $room['id']; ?>"><?php echo $room['name']; ?></option>
		<?php } ?>
	</select>
	<?php echo form_error('sel_type');?>
	<input name="txt_npeople" type="text" id="inputShared" placeholder="Nº de Pessoas que utilizam">
	<?php echo form_error('txt_npeople');?>
	<input name="txt_power" type="text" placeholder="Potência">
	<?php echo form_error('txt_power');?>
	<input name="txt_time" type="text" class="maskhora" placeholder="Tempo de uso (hh:mm:ss)">
	<?php echo form_error('txt_time');?>
	<select name="sel_format">
		<option value="d">Dia</option>
		<option value="s">Semana</option>
		<option value="m">Mês</option>
	</select>
	<?php echo form_error('sel_format');?>
	<a href="<?php echo SYSTEM_PATH?>Client_Equipment"><button type="button" class="neutral">Voltar</button></a>
	<button type="reset" class="warning">Limpar</button>
	<button type="submit">Cadastrar</button>
	<?php echo form_close();?>
	</div>
	<div id="sugestion_area" style="position: absolute; width:600px; top:170px;right:150px;"></div>
	<script src=<?php echo JS_PATH."client_equipment.js";?> ></script>
