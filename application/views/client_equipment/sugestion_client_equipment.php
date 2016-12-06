<?php
foreach ($equips as $equip) {
?>
<div class="list_entries">
    <h2>Sugestão</h2>
    <table>
        <tr>
            <th width="20%">Potência Watts:</th>
            <td width="60%" style="background-color:#fff; border:1px solid #131313;"><?php echo number_format($equip->power, 0, ',', '.'); ?> W</td>
        </tr>
        <tr>
            <th width="20%">Tempo Médio <br/> (1 pessoa):</th>
            <td width="60%" style="background-color:#fff; border:1px solid #131313;"><?php echo $equip->normal_time_2; ?></td>
        </tr>
        <tr>
            <th width="20%" valing="top">Imagem:</th>
            <td width="60%" style="background-color:#fff; border:1px solid #131313;"><img src="<?php echo $equip->image_url; ?>" height="250px" width="300px"></td>
        </tr>
    </table>
</div>

<?php
}
?>
