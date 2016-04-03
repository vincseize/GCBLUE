<?php

/*    echo $_SERVER['SERVER_NAME'];*/

    $HOST=$_SERVER['SERVER_NAME'];


/*    @$db = mysql_connect('localhost', 'root', ''); 
    @mysql_select_db('owl',$db); 
*/

    if ( $HOST == "127.0.0.1" || $HOST == "localhost") {
        @$db = mysql_connect('localhost', 'root', ''); 
        @mysql_select_db('owl',$db); 
    }

    if ( $HOST == "www.vincseize.net" || $HOST == "vincseize.net") {
        @$db = mysql_connect('db569638194.db.1and1.com', 'dbo569638194', 'lesinvisible'); 
        @mysql_select_db('db569638194',$db); 
    }



    if(isset($_POST) && !empty($_POST['login']) && !empty($_POST['pass'])) {
      extract($_POST);
      // on recupère le password de la table qui correspond au login du visiteur
      $sql = "select pwd from gdc_users where login='".$login."'";
      @$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

      $data = mysql_fetch_assoc($req);

      if($data['pwd'] != $pass) {
        echo '<p>NIET!!!</p>';
        include('index.php'); // On inclut le formulaire d'identification
        exit;
      }
      else {
        session_start();
        $_SESSION['login'] = $login;
        
            header("location: home.php?pwd=OK");
      }    
    }
    else {
/*      echo '<p>Vous avez oublié de remplir un champ.</p>';*/
       include('index.php'); // On inclut le formulaire d'identification
       exit;
    }


?>