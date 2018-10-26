<?php
if(!empty($_GET['delete'])){
    $queryString = "DELETE FROM carti WHERE id = {$_GET['id']}";
    if(mysqli_query($APP['connections']['default'], $queryString)) {
        $message = 'Delete success';
    }else{
        $message = 'Delete error';
    }
}

$queryString = "
    SELECT
        carti.id,
        carti.denumire,
        carti.anul_editie,
        carti.pagini,
        CONCAT(autori.nume, ' ', autori.prenume) as autor
    FROM
        carti
        JOIN autori on autori.id = carti.id
";

if(!empty($_POST['search']))
    $queryString .= "
    WHERE 
      carti.denumire LIKE '%{$_POST['search']}%'
    ";
$carti = dbSelect($queryString);
?>


<strong><?=$message;?></strong>

<form action="" method="post">
    <input type="text" name="search">
    <input type="submit" value="search">
</form>


<? if(count($carti)){?>
<table border="1">
    <thead>
        <tr>
            <th>Denumire</th>
            <th>Anul editie</th>
            <th>Pagini</th>
            <th>Autor(i)</th>
        </tr>
    </thead>
    <tbody>
        <? foreach ($carti as $carte) {?>
        <tr>
            <td><?=$carte['denumire'];?></td>
            <td><?=$carte['anul_editie'];?></td>
            <td><?=$carte['pagini'];?></td>
            <td><?=$carte['autor'];?></td>
            <td>
                <a href="?module=carti&action=update&id=<?=$carte['id'];?>">U</a>
                <a href="?module=carti&action=list&delete=1&id=<?=$carte['id'];?>">D</a>
            </td>
        </tr>
        <? }?>
    </tbody>
</table>
<? }else{?>
    <strong>No records</strong>
<? }?>