<?php

 session_start("USER");
  if(!isset($_SESSION['Login']))
  {echo "<script> alert('Usuario Não  autenticado'); location.href='../../index.php'</script>";
  } 


?>
