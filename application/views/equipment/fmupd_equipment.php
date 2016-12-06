<h1>Equipamentos</h1>
<h2>Alterar equipamento</h2>
<div class="reg_wrapper">
	<?php echo form_open(SYSTEM_PATH.'Reg_Equipment/update', 'name="register" style="width: 100%; display: flex; justify-content: space-between"');?>
		<div>
			<input value="<?php echo $equipment[0]->id ?>" name="hid_id" type="hidden">
			<input value="<?php echo $equipment[0]->name ?>" name="txt_type" type="text" placeholder="Tipo">
			<?php echo form_error('txt_type');?>
			<input value="<?php echo $equipment[0]->image_url ?>" name="txt_image" type="text" placeholder="URL da imagem">
			<?php echo form_error('txt_image');?>
			<input value="<?php echo $equipment[0]->power ?>" name="txt_power" type="text" placeholder="Potência padrão (watts)">
			<?php echo form_error('txt_power');?>

			<input value="<?php echo $equipment[0]->use_time;?>" name="txt_use_time"  class="maskhora" type="text" placeholder="Tempo padrão (horas/dia)">
			<?php echo form_error('txt_use_time');?>

			<select name="sel_type">
				<option value="">Tipo de consumo</option>
				<option value="0" <?php echo $equipment[0]->consumption_type == 0 ? 'selected' : ''?>>Compartilhado</option>
				<option value="1" <?php echo $equipment[0]->consumption_type == 1 ? 'selected' : ''?>>Individual</option>
			</select>
			<?php echo form_error('sel_type');?>
			<h2>Tempo de consumo normal</h2>
			1: <input value="<?php echo $equipment[0]->normal_time_1;?>" style="display: inline-block" class="maskhora" name="txt_normal_time_1" type="text" placeholder="(horas/dia)">
			<?php echo form_error('txt_normal_time_1');?><br>
			2: <input value="<?php echo $equipment[0]->normal_time_2;?>" style="display: inline-block" class="maskhora" name="txt_normal_time_2" type="text" placeholder="(horas/dia)">
			<?php echo form_error('txt_normal_time_2');?><br>
			3: <input value="<?php echo $equipment[0]->normal_time_3;?>" style="display: inline-block" class="maskhora" name="txt_normal_time_3" type="text" placeholder="(horas/dia)">
			<?php echo form_error('txt_normal_time_3');?>
			<h2>Potência normal</h2>
			<input value="<?php echo $equipment[0]->normal_power_1 ?>" style="display: inline-block; width: 130px;" name="txt_normal_power_1" type="text" placeholder="W">
			 Até <input value="<?php echo $equipment[0]->normal_power_2 ?>" style="display: inline-block; width: 130px;" name="txt_normal_power_2" type="text" placeholder="W">
			<?php echo form_error('txt_normal_power_1');?>
			<?php echo form_error('txt_normal_power_2');?>
		</div>
		<div>
			<h2>Sugestões tempo de consumo</h2>
			<textarea name="txt_sug_time_1" type="Text" placeholder="Baixo"><?php echo $equipment[0]->sug_time_1 ?></textarea>
			<?php echo form_error('txt_sug_time_1');?>
			<textarea name="txt_sug_time_2" type="Text" placeholder="Médio Baixo"><?php echo $equipment[0]->sug_time_2 ?></textarea>
			<?php echo form_error('txt_sug_time_2');?>
			<textarea name="txt_sug_time_3" type="Text" placeholder="Médio Alto"><?php echo $equipment[0]->sug_time_3 ?></textarea>
			<?php echo form_error('txt_sug_time_3');?>
			<textarea name="txt_sug_time_4" type="Text" placeholder="Alto"><?php echo $equipment[0]->sug_time_4 ?></textarea>
			<?php echo form_error('txt_sug_time_4');?>
		</div>
		<div>
			<h2>Sugestões potência</h2>
			<textarea name="txt_sug_power_1" type="Text" placeholder="Baixo"><?php echo $equipment[0]->sug_power_1 ?></textarea>
			<?php echo form_error('txt_sug_power_1');?>
			<textarea name="txt_sug_power_2" type="Text" placeholder="Médio"><?php echo $equipment[0]->sug_power_2 ?></textarea>
			<?php echo form_error('txt_sug_power_2');?>
			<textarea name="txt_sug_power_3" type="Text" placeholder="Alto"><?php echo $equipment[0]->sug_power_3 ?></textarea>
			<?php echo form_error('txt_sug_power_3');?>
			<a href="<?php echo SYSTEM_PATH?>Reg_Equipment"><button type="button" class="neutral">Voltar</button></a>
			<button type="reset" class="warning">Limpar</button>
			<button type="submit">Enviar</button>
		</div>
	<?php echo form_close();?>
</div>
