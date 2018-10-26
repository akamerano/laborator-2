<?php
$autori = dbSelect('SELECT id, nume, prenume FROM autori ORDER BY nume');

$carte = dbSelect("
    SELECT
        carti.id,
        carti.Denumire, 
        carti.Anul_editie,
        carti.pagini,
        CONCAT(autori.nume, ' ', autori.prenume) AS autor
    FROM
        carti
        JOIN autori ON autori.id = carti.autor_id
");
$carte = current($carte);
if(!empty($_POST['denumire']) && !empty($_POST['anul_editie']) && !empty($_POST['pagini'])){
    $queryString = "
      UPDATE carti 
      SET 
        denumire = '{$_POST['denumire']}', 
        anul_editie = '{$_POST['anul_editie']}', 
        pagini = {$_POST['pagini']}
      WHERE id = {$_GET['id']}
        ";
    if(mysqli_query($APP['connections']['default'], $queryString)) {
        $message = 'Update success';
    }else{
        $message = 'Update error';
    }
}
?>
<? if(empty($message)){?>

<form action="" method="post">
    <table border="1">
        <tr>
            <td>Denumire</td>
            <td><input type="text" name="denumire" value='<?=$carte['Denumire']?>'></td>
        </tr>
        <tr>
            <td>Anul editie</td>
            <td><input type="text" name="anul_editie" value='<?=$carte['Anul_editie']?>'></td>
        </tr>
        <tr>
            <td>Pagini</td>
            <td><input type="text" name="pagini" value='<?=$carte['pagini']?>'></td></td>
        </tr>
        <tr>
            <td>Autor</td>
            <td>
                Selectati autor
                <br>
                <select name="autor_id">
                    <? foreach ($autori as $autor) {?>
                        <option value="<?=$autor['id'];?>"><?=$autor['nume'] . ' ' . $autor['prenume']?></option>
                    <?}?>
                </select>
            </td>
        <tr>
        <tr>
            <td colspan="2">
                <input type="submit" value="save">
            </td>
        </tr>
    </table>
</form>
<? }else{?>
    <strong><?=$message;?></strong>
<? }?>