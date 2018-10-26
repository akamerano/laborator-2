<?
require_once 'config.php';
require_once 'functions.php';
dbConnect();
?>
<!doctype html>
<html>
<head>
    <title></title>
</head>
<body>
    <?
    include 'pages/blocks/menu.php';
    ?>
    <hr>
    <?
    $module = $_GET['module'] ?: 'default';
    $action = $_GET['action'] ?: 'home';
        if(file_exists("pages/{$module}/{$action}.php"))
            include "pages/{$module}/{$action}.php";
        else
            include "pages/error/404.php";
    ?>
</body>
</html>