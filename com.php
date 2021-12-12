<?php
$db = mysqli_connect('localhost', 'root', 'root') or 
    die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));
?>
<html>
 <head>
  <title>Commit</title>
  <link rel="stylesheet" href="estilo.css" />
 </head>
 <body>
<?php
switch ($_GET['action']) {
case 'add':
    switch ($_GET['type']) {
    case 'people':
        $query = 'INSERT INTO
            people
                (people_fullname, people_isactor, people_isdirector)
            VALUES
                ("' . $_POST['people_fullname'] . '",
                 ' . $_POST['people_isactor'] . ',
                 ' . $_POST['people_isdirector'] . ')';
                
        break;
    }
    break;
case 'edit':
    switch ($_GET['type']) {
    case 'people':
        $query = 'UPDATE people SET
                people_fullname = "' . $_POST['people_fullname'] . '",
                people_isactor = ' . $_POST['people_isactor'] . ',
                people_isdirector = ' . $_POST['people_isdirector'] . '
            WHERE
                people_id = ' . $_POST['people_id'];
        break;
    }
    break;
}

if ($_GET['action'] == 'edit') {
    echo '<h1 id="b">Cambios editados</h1>';
  }else if($_GET['action'] == 'add') {
    echo '<h1 id="c">Persona añadida</h1>';
  }

if (isset($query)) {
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
}
?>
  <h2><a href="admin.php">Return to Index</a></h2>
 </body>
</html>


