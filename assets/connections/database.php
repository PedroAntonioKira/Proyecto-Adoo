<?php
  $host = 'localhost';
  $user = 'root';
  $pwd = '';
  $base = 'ceg';
  $puerto = '3306';
  $con = new mysqli($host,$user,$pwd,$base,$puerto);
  if($con->connect_errno){
    echo "<div class='msg-error-db'>";
    echo "Fallo al conectar a MySQL: (" . $con->connect_errno . ")" . $con->connect_error;
    echo "</div>";
  }
?>
