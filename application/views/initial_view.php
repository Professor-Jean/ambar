<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <title>Âmbar | Inicial</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/layout/css/amb_reset_css.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/layout/css/amb_main_css.css">
    <link rel = "shortcut icon" type = "image/x-icon" href = "<?php echo IMG_PATH."favicon.png"; ?>"/>
    <script src="<?php echo base_url()?>assets/addons/js/jquery-3.1.0.min.js"></script>
    <script>
    $(document).ready(function(){
      $(".button_2").click(function(){
        $("#login_form").toggleClass("content_forms_close");
        $("#cad_form").toggleClass("content_forms_close");
      });

      $("#scroll_link").click(function(){
        $("html,body").animate({
          scrollTop: $("#scroll_start").offset().top},
        'slow');
      });
      <?php
      if(@$cad_errors == true){
        echo '$("#login_form").toggleClass("content_forms_close"); $("#cad_form").toggleClass("content_forms_close");';
      }
      ?>

    });
    </script>
  </head>
  <body>
    <noscript>
      <span>
        Você precisa do Javascript para utilizar esse website.<br>
        <a href="http://enable-javascript.com/pt/">Clique aqui para descobrir como habilitá-lo.</a>
      </span>
    </noscript>
    <div id="access_wrapper" class="content_page_window">
      <div id="access" class="center_absolute">

        <div id="logo">
          <div class="center_absolute">
            <img src="<?php echo base_url()?>assets/layout/images/ambar_logo.jpg">
              <a href="#" id="scroll_link">Saiba mais...</a>
          </div>
        </div>

        <div class="vertical_bar">
        </div>

        <div id="content_forms">
          <div id="login_form" class="center_absolute">
            <?php echo form_open('Initial/login', 'name="login"');?>
              <h1>Login</h1>
              <ul>
                <?php echo form_error('txt_usernamelog');?>
                <input name="txt_usernamelog" type="Text" placeholder="Usuário">
              </ul>
              <ul>
                <?php echo form_error('pwd_passwordlog');?>
                <input name="pwd_passwordlog" type="password" placeholder="Senha">
              </ul>
              <button class="button_1" type="submit"> Entrar </button>
              <a href="#">Esqueceu sua senha?</a>
              <button class="button_2" type="button"><i class="fa fa-plus-circle" aria-hidden="true"></i> Cadastro</button>
            <?php echo form_close();?>
          </div>
          <div id="cad_form" class="center_absolute">
            <?php echo form_open('Initial/registerUser', 'name="cad"');?>
              <h1>Cadastro</h1>
              <ul>
                <?php echo form_error('txt_fullname');?>
                <input name="txt_fullname" type="Text" placeholder="Nome completo">
              </ul>
              <ul>
                <?php echo form_error('txt_username');?>
                <input name="txt_username" type="Text" placeholder="Usuário">
              </ul>
              <ul>
                <?php echo form_error('pwd_password');?>
                <input name="pwd_password" type="password" placeholder="Senha">
              </ul>
              <ul>
                <?php echo form_error('pwd_confirmpassword');?>
                <input name="pwd_confirmpassword" type="password" placeholder="Confirmar senha">
              </ul>
              <ul>
                <?php echo form_error('txt_email');?>
                <input name="txt_email" type="Text" placeholder="E-mail">
              </ul>
              <ul>
                <?php echo form_error('txt_confirmemail');?>
                <input name="txt_confirmemail" type="Text" placeholder="Confirmar E-mail">
              </ul>
              <button class="button_1" type="submit"> Cadastrar </button>
              <button class="button_2" type="button"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</button>
            <?php echo form_close();?>
          </div>
        </div>
      </div>
    </div>
    <div class="content_row" id="scroll_start">
      <div>
        <h1>O "Âmbar" na História</h1>
          <blockquote>O âmbar é uma substância que, desde tempos ancestrais, fascina o Homem, levando-o a produzir joias e pequenas estátuas. Ele provém dos arbustos de outrora, que se erguiam sobre o solo há milhões de anos atrás e elaboravam uma matéria viscosa conhecida como resina. Eram pinheiros de regiões de climas temperados e leguminosas de campos tropicais. <span>Ana Lucia Santana</span></blockquote>
          <span class="right-img">
            <img src="<?php echo base_url()?>assets/layout/images/mosquito.jpg">
              <legend>O famoso inseto que aparece no filme Jurassic Park está conservado em um cristal de âmbar.</legend>
          </span>
          <p>Na Grécia antiga, Tales de Mileto descobriu que ao atritar partes da resina âmbar estas começavam a atrair pequenos objetos. Esse foi o primeiro experimento envolvendo eletricidade. Por isso, o termo eletricidade vem do grego "elektron" que significa âmbar.</p>
          <p>O estudo da eletricidade tomou um rumo lento na história humana, demorando muitos anos, depois dos experimentos de Tales, para ocorrer um avanço significativo. Somente no século XX, depois dos estudos de Tesla e de outros grandes pesquisadores, a eletricidade se tornou vital para o ser humano. Hoje, pode-se dizer que a eletricidade move o mundo e conecta as pessoas, sendo uma das mais preciosas criações humanas.</p>
      </div>
    </div>
    <footer>
      Copyright © - Escola Sistêmica - Projeto Sigma - 2016
    </footer>
  </body>
</html>
