<?php
$autori = dbSelect('SELECT id, nume, prenume FROM autori ORDER BY nume');

if(!empty($_POST['denumire']) && !empty($_POST['anul_editie']) && !empty($_POST['pagini'])){
    $queryString = "
      INSERT INTO carti 
        (Denumire, Anul_editie, pagini, autor_id) 
      VALUES 
        (
        '{$_POST['denumire']}', 
        '{$_POST['anul_editie']}', 
        {$_POST['pagini']},
        {$_POST['autor_id']}
        )";

    if(mysqli_query($APP['connections']['default'], $queryString)) {
        $message = 'Add success';
    }else{
        $message = 'Add error';
        
    }
}
?>
<? if(empty($message)){?>

<form action="" method="post">
    <table border="1">
        <tr>
            <td>Denumire</td>
            <td><input type="text" name="denumire"></td>
        </tr>
        <tr>
            <td>Anul editie</td>
            <td><input type="text" name="anul_editie"></td>
        </tr>
        <tr>
            <td>Pagini</td>
            <td><input type="text" name="pagini"></td></td>
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
            <td colspan="2">
                <input type="submit" value="add">
            </td>
        </tr>
    </table>
</form>
<? }else{?>
    <strong><?=$message;?></strong>
<? }?>