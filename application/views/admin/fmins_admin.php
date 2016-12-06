<h1>Administradores</h1>
<div class="reg_wrapper">
    <div>
      <?php
      if(isset($userUpdate)){
                ?>

          <h2>Alterar administrador</h2>
          <?php echo form_open(SYSTEM_PATH.'Reg_Admin/update', 'name="update"');?>
              <input type="hidden" value="<?php echo  $userUpdate[0]->id; ?>" name="id">
              <input name="txt_username" value="<?php echo  $userUpdate[0]->user; ?>" type="Text" placeholder="Usuário">
              <?php echo form_error('txt_username');?>
              <input name="pwd_password" type="password" placeholder="Senha">
              <?php echo form_error('pwd_password');?>
              <input name="pwd_confirmpassword" type="password" placeholder="Confirmar senha">
              <?php echo form_error('pwd_confirmpassword');?>
              <a href="<?php echo SYSTEM_PATH?>Reg_Admin"><button type="button" class="neutral">Voltar</button></a>
              <button type="reset" class="warning">Limpar</button>
              <button type="submit">Alterar</button>
          <?php echo form_close();?>
        <?php
      }else{
      ?>
        <h2>Cadastrar administrador</h2>
        <?php echo form_open(SYSTEM_PATH.'Reg_Admin/register', 'name="register"');?>
            <input name="txt_username" type="Text" placeholder="Usuário">
            <?php echo form_error('txt_username');?>
            <input name="pwd_password" type="password" placeholder="Senha">
            <?php echo form_error('pwd_password');?>
            <input name="pwd_confirmpassword" type="password" placeholder="Confirmar senha">
            <?php echo form_error('pwd_confirmpassword');?>
            <button type="reset" class="warning">Limpar</button>
            <button type="submit">Cadastrar</button>
        <?php echo form_close();?>
      <?php } ?>
    </div>
    <div class="list_entries">
        <h2>Administradores cadastrados</h2>
        <table>
            <tr>
                <th width="20%">ID</th>
                <th width="60%">Usuário</th>
                <th width="10%">Editar</th>
                <th width="10%">Excluir</th>
            </tr>
            <?php
                foreach($admins as $admin){
                    ?>
                    <tr>
                        <td><?php echo $admin->id?></td>
                        <td><?php echo $admin->user?></td>
                        <td><a href="<?php echo SYSTEM_PATH?>Reg_Admin/update/<?php echo $admin->id?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
                        <td><a href="<?php echo SYSTEM_PATH?>Reg_Admin/delete/<?php echo $admin->id?>"><i class="fa fa-trash"  aria-hidden="true"></i></a></td>
                    </tr>
                    <?php
                }
            ?>
        </table>
    </div>
</div>
