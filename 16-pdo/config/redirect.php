<?php
    if(isset($_SESSION['uid'])) {
        $_SESSION['error'] = "Por favor, debe iniciar sesión!";
        echo "<script> window.location.replace('pages/dashboard.php') </script>";
    }