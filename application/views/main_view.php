<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <title>Âmbar | Admin</title>
    <meta charset="utf-8">
    <link rel = "shortcut icon" type = "image/x-icon" href = "<?php echo IMG_PATH."favicon.png"; ?>"/>
    <link rel="stylesheet" href="<?php echo CSS_PATH?>amb_reset_css.css">
    <link rel="stylesheet" href="<?php echo CSS_PATH?>jquery-ui.min.css">
    <link rel="stylesheet" href="<?php echo CSS_PATH?>amb_main_css.css">
    <script src="<?php echo JS_PATH?>jquery-3.1.0.min.js"></script>
    <script src="<?php echo JS_PATH?>jquery-ui.min.js"></script>
    <script src="<?php echo JS_PATH?>mask.js"></script>
    <script src="<?php echo JS_PATH?>main.js"></script>
    <script>
      var baseUrl;

      $(document).ready(function(){
        baseUrl = '<?php echo SYSTEM_PATH; ?>';
      });
    </script>
  </head>
  <body>

    <header>
      <div id="header_logo">
        <img style="width:210px; margin-left: 25px; height: 75px;" src="<?php echo IMG_PATH?>ambar_logo.jpg">
      </div>
      <?php
        switch($_SESSION['permission']) {
          case 0:
            ?>
            <nav>
              <a href="<?php echo SYSTEM_PATH?>Reg_Equipment">Equipamentos</a>
              <a href="<?php echo SYSTEM_PATH?>Reg_Admin">Administradores</a>
              <a href="<?php echo SYSTEM_PATH?>Reg_Room">Cômodos</a>
            </nav>
            <?php
            break;
          case 1:
            ?>
            <nav>
              <a href="<?php echo SYSTEM_PATH?>Client_Equipment">Equipamentos</a>
              <a href="<?php echo SYSTEM_PATH?>Sugestions">Sugestões</a>
              <a href="<?php echo SYSTEM_PATH?>Consumption">Relatórios</a>
            </nav>
            <?php
            break;
          default:
            session_destroy();
            redirect('initial');
            break;
        }
      ?>
      <div id="header_access">
        <table>
          <tr>
            <td colspan="2"><?php echo $_SESSION['username'] ?></td>
          </tr>
          <tr>
            <?php if ($_SESSION['permission']==1){ ?>
              <td><a href="<?php echo SYSTEM_PATH?>Reg_Client/update/<?php echo $_SESSION['id']?>">Editar</a></td>
            <?php
             };
             if ($_SESSION['permission']==0){ ?>
              <td><a href="<?php echo SYSTEM_PATH?>Reg_Admin/update/<?php echo $_SESSION['id']?>">Editar</a></td>
            <?php }; ?>
            <td><a href="<?php echo SYSTEM_PATH?>Initial/logout">Sair</a></td>
          </tr>
        </table>
      </div>
    </header>

    <div id="wrapper">
      <div id="content_wrapper">
        <?php  echo $this->session->flashdata('controller_message');?>
        <?= $contents ?>
      </div>
      <footer>
        Copyright © - Escola Sistêmica - Projeto Sigma - 2016
      </footer>
    </div>
  </body>
</html>
