</?php 
    session_start();
    if(!isset ($_SESSION['autenticado']) || $_SESSION['autenticado']  != 'SIM') {
        header('location: ../private/home.php');
        exit();
    } else {
        header('location: ../private/login.php?erro');
    }
?>