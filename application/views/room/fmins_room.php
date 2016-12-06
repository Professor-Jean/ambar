<h1>Cômodos</h1>
<div class="reg_wrapper">
	<div>
		<?php
		if(isset($roomUpdate)){
			?>
			
			<h2>Alterar cômodo</h2>
			<?php echo form_open(SYSTEM_PATH.'Reg_Room/update', 'name="update"');?>
			<input type="hidden" value="<?php echo  $roomUpdate[0]->id; ?>" name="id">
			<input name="txt_name" value="<?php echo  $roomUpdate[0]->name; ?>" type="Text" placeholder="Cômodo">
			<?php echo form_error('txt_name');?>
            <a href="<?php echo SYSTEM_PATH?>Reg_Room"><button type="button" class="neutral">Voltar</button></a>
			<button type="reset" class="warning">Limpar</button>
			<button type="submit">Alterar</button>
			<?php echo form_close();?>
			<?php
		}else{
			?>
			<h2>Cadastrar cômodo</h2>
			<?php echo form_open(SYSTEM_PATH.'Reg_Room/register', 'name="register"');?>
			<input name="txt_name" type="Text" placeholder="Nome">
			<?php echo form_error('txt_name');?>
			<button type="reset" class="warning">Limpar</button>
			<button type="submit">Cadastrar</button>
			<?php echo form_close();?>
		<?php } ?>
	</div>
	<div class="list_entries">
		<h2>Cômodos cadastrados</h2>
		<table>
			<tr>
				<th width="20%">ID</th>
				<th width="60%">Nome</th>
				<th width="10%">Editar</th>
				<th width="10%">Excluir</th>
			</tr>
			<?php
			foreach($rooms as $room){
				?>
				<tr>
					<td><?php echo $room->id?></td>
					<td><?php echo $room->name?></td>
					<td><a href="<?php echo SYSTEM_PATH?>Reg_Room/update/<?php echo $room->id?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
					<td><a href="<?php echo SYSTEM_PATH?>Reg_Room/delete/<?php echo $room->id?>"><i class="fa fa-trash"  aria-hidden="true"></i></a></td>
				</tr>
				<?php
			}
			?>
		</table>
	</div>
</div>
