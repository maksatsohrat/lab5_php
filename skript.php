<html>
 <head>
  <title>(php+=mysql) example 07</title>
  <meta charset="utf-8"/>
 </head>
 <body>
  <?php
   $sdb_name = "localhost";
   $user_name = "root";
   $user_password = "";
   $db_name = "php5lab";
   $link = mysqli_connect($sdb_name, $user_name, $user_password, $db_name);
   if(!$link) {
    echo "<br/>Не могу соединиться с сервером баз данных.<br/>";
    exit();
   }
   mysqli_query($link,"SET NAMES 'utf8mb4'");
   $str_sql_query = "SELECT * FROM table1";
   if(!$result = mysqli_query($link,$str_sql_query)) {
    echo "<br/>Не могу выполнить запрос.<br/>";
    exit();
   }
   echo "<table border = \"1\">";
   $myrow = mysqli_fetch_assoc($result);
   do {
    echo "<tr>";
    echo "<td>".$myrow['id']."</td>";
    echo "<td>".$myrow['avtor']."</td>";
    echo "<td>".$myrow['valuee']."</td>";
    echo "</tr>";
   } while($myrow = mysqli_fetch_assoc($result));
   echo "</table>";
   mysqli_close($link);
   echo "
   <form method=\"post\">
   <input type=\"text\" name=\"id\" value=\"id\">
   <input type=\"text\" name=\"avtor\" value=\"автор\">
   <input type=\"text\" name=\"text\" value=\"содержание\">
   <input type=\"submit\" name=\"enter\" value=\"Добавить\">
   <input type=\"submit\" name=\"izmenit\" value=\"Изменить\">

   </form>
   ";
   if (isset($_POST["enter"])){
    $link = mysqli_connect($sdb_name, $user_name, $user_password, $db_name);
   if(!$link) {
    echo "<br/>Не могу соединиться с сервером баз данных.<br/>";
    exit();
   }
   mysqli_query($link,"SET NAMES 'utf8mb4'");
$sql_query = "INSERT INTO table1 (id, avtor,
valuee) VALUES (NULL, 'avtor',
'privet mir');";
if(!mysqli_query($link, $str_sql_query)) {
  echo "<br/>Не могу выполнить запрос.";
  exit();
  }
   }
  ?>
 </body>
</html>