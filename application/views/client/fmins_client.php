<div class="reg_wrapper" style="justify-content: center">
    <div>
			<h1>Clientes</h1>
      <?php
      if(isset($userUpdate)){
                ?>

          <h2>Alterar cliente</h2>
        <?php echo form_open(SYSTEM_PATH.'Reg_Client/update', 'name="update"');?>
            <ul>
              <?php echo form_error('txt_fullname');?>
              <input name="txt_fullname" value="<?php echo  $clientUpdate[0]->name; ?>" type="Text" placeholder="Nome completo">
            </ul>
            <ul>
              <?php echo form_error('txt_email');?>
              <input name="txt_email" value="<?php echo  $clientUpdate[0]->email; ?>" type="Text" placeholder="E-mail">
            </ul>
            <ul>
              <?php echo form_error('txt_confirmemail');?>
              <input name="txt_confirmemail" value="<?php echo  $clientUpdate[0]->email; ?>" type="Text" placeholder="Confirmar E-mail">
            </ul>
              <input type="hidden" value="<?php echo  $userUpdate[0]->id; ?>" name="id">
              <input name="txt_username" value="<?php echo  $userUpdate[0]->user; ?>" type="Text" placeholder="Usuário">
              <?php echo form_error('txt_username');?>
              <input name="pwd_password" type="password" placeholder="Senha">
              <?php echo form_error('pwd_password');?>
              <input name="pwd_confirmpassword" type="password" placeholder="Confirmar senha">
              <?php echo form_error('pwd_confirmpassword');?>
              <a href="<?php echo SYSTEM_PATH?>Reg_Client/delete/<?php echo $userUpdate[0]->id?>"><button type="button" class="warning">Excluir</button></a>
              <button type="reset" class="neutral">Limpar</button>
              <button type="submit">Alterar</button>
				
          <?php echo form_close();?>
          <?php } ?>
        </table>
    </div>
</div>
