<?php


session_start();
if (isset($_POST['login'])) {
    if (isset($_SESSION['uid'])) {
        echo "Voce já está logado";
    } else {
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];
        $login_check = mysqli_query($conn, "SELECT id_usuario FROM usuario WHERE usuario = '$usuario' AND senha = '".md5($senha)."'") or die(mysqli_error($conn));
        if (mysqli_num_rows($login_check) == 0) {
            echo "Usuario e/ou senha inválido";
        } else {
            $pegar_id = mysqli_fetch_assoc($login_check);
            $_SESSION['uid'] = $pegar_id['id_usuario'];
            header("Location: main.php");
            exit;
        }
    }
} else {
    echo "Voce nao pode estar aqui!";
}








?>
