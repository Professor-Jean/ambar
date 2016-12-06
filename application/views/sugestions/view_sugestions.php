<!--
classes para tempo:
lowtime - representa tempo muito baixo
midlowtime - representa tempo médio-baixo
midhightime - representa tempo alto-baixo
hightime - representa tempo muito alto

classes para energia:
lowpower - representa consumo de energia baixo
midpower - representa consumo de energia médio
highpower - representa consumo de energia alto
-->
<style>

</style>

<h1>Sugestões</h1>
<div class="list_entries">
<h2>Legendas Tempo</h2>
<table>
  <tr>
    <td class="lowtime">Baixo</td>
    <td class="midlowtime">Médio-Baixo</td>
    <td class="midhightime">Médio-Alto</td>
    <td class="hightime">Alto</td>
</table>

<h2>Legendas Consumo</h2>
<table>
  <tr>
    <td class="lowpower">Baixo</td>
    <td class="midpower">Normal</td>
    <td class="highpower">Alto</td>
</table>

<?php
if ($sugestions){
  foreach ($sugestions as $sugestion){
    //verificando nível do tempo e sugestão
    if ($sugestion->unit_use_time <= $sugestion->normal_time_1){
      $time_class = "lowtime";
      $time_level = "Baixo";
      $time_suggestion = $sugestion->sug_time_1;
    }else if (($sugestion->unit_use_time > $sugestion->normal_time_1)&&($sugestion->unit_use_time < $sugestion->normal_time_2)){
      $time_class = "midlowtime";
      $time_level = "Médio-Baixo";
      $time_suggestion = $sugestion->sug_time_2;
    }else if (($sugestion->unit_use_time >= $sugestion->normal_time_2)&&($sugestion->unit_use_time < $sugestion->normal_time_3)){
      $time_class = "midhightime";
      $time_level = "Médio-Alto";
      $time_suggestion = $sugestion->sug_time_3;
    }else if ($sugestion->unit_use_time >= $sugestion->normal_time_3){
      $time_class = "hightime";
      $time_level = "Alto";
      $time_suggestion = $sugestion->sug_time_4;
    }
    //verificando nível da energia e sugestão
    if ($sugestion->unit_power <= $sugestion->normal_power_1){
      $power_class = "lowpower";
      $power_level = "Baixo";
      $power_suggestion = $sugestion->sug_power_1;
    }else if (($sugestion->unit_power > $sugestion->normal_power_1)&&($sugestion->unit_power < $sugestion->normal_power_2)){
      $power_class = "midpower";
      $power_level = "Normal";
      $power_suggestion = $sugestion->sug_power_2;
    }else if ($sugestion->unit_power >= $sugestion->normal_power_2){
      $power_class = "highpower";
      $power_level = "Alto";
      $power_suggestion = $sugestion->sug_power_3;
    }
    ?>
    <h2><i class="fa fa-arrow-down arrow-down-ambar" aria-hidden="true"></i><?php echo $sugestion->equip_name.' - '.$sugestion->unit_name; ?></h2>
    <table>
      <tr>
        <th>Tempo</th>
        <td width="10%" class="<?php echo $time_class; ?>"><?php echo $time_level; ?></td>
        <td><?php echo $time_suggestion; ?></td>
      </tr>
      <tr>
        <th>Energia</th>
        <td class="<?php echo $power_class; ?>"><?php echo $power_level; ?></td>
        <td><?php echo $power_suggestion; ?></td>
      </tr>
    </table>
  <?php
  }
}else{
  echo "Sem equipamentos registrados.";
}
 ?>
</div>
