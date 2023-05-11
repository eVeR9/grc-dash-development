<?= 'Hola Mundo, soy basculas'; ?>

<?php foreach($get_data as $data):?>
<ul>
    <li><?= $data['id']?></li>
    <li><?= $data['fecha']?></li>
    <li><?= $data['valor']?></li>
<!--     
    <li><?//= $data['_NAME']?></li>
    <li><?//= $data['_NUMERICID']?></li>
    <li><?//= $data['_VALUE']?></li>
    <li><?//= $data['_TIMESTAMP']?></li>
    <li><?//= $data['_QUALITY']?></li> -->
</ul>
<?php endforeach;?>