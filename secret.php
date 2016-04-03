<?php
    @session_destroy();

    // $password_admin = 'kangourou';

    $PATH = dirname($_SERVER['PHP_SELF']);

    function is_session_started(){
        if ( php_sapi_name() !== 'cli' ) {
            if ( version_compare(phpversion(), '5.4.0', '>=') ) {
                return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
            } else {
                return session_id() === '' ? FALSE : TRUE;
            }
        }
        return FALSE;
    }


    function session_disconnect(){
        $_SESSION['login'] = "";
        //clear session from globals
        $_SESSION = array();
        //clear session from disk
        @session_destroy();
        @session_unset();
        
    }


    if (isset($_POST['mot_de_passe']) AND $_POST['mot_de_passe'] ==  "kangourou"){
        if (is_session_started() === FALSE) {
            session_start();
            $_SESSION['login'] = $_POST['mot_de_passe'];
            // header('Location: '.$PATH.'/admin/index.php?login='.$_POST['mot_de_passe']);



//$url = 'http://server.com/path';
$url = 'http://127.0.0.1/owl2/admin/index.php';
$data = array('login' => $_POST['mot_de_passe']);

// use key 'http' even if you send the request to https://...
$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data),
    ),
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);

var_dump($result);







            // exit();
        }
    }
    else{
        session_disconnect();
        header('Location: '.$PATH.'/index.php');
    }



?>
    
