<?php
session_start();
require_once '../config.php';
require_once ROOT_DIR . '/conexion.php';


print_r($_POST);
print_r($_GET);

// Si es logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: " . ROOT_URL . "?message=Sesión cerrada");
    exit();
}

// Si es login
if (isset($_POST['username']) && isset($_POST['password']) && !isset($_POST['email'])) {
    $correo = $_POST['username'];
    $pass = $_POST['password'];
    echo "aqui";

    $sql = "SELECT id, name, password_hash FROM users WHERE email = '$correo'";
    echo $sql;
    $res = $conn->query($sql);

    if ($res && $res->num_rows === 1) {
        $user = $res->fetch_assoc();

        if (password_verify($pass, $user['password_hash'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            header("Location: ".ROOT_URL."?message=Bienvenido " . $user['name']);
            exit();
        } else {
            header("Location: " . ROOT_URL ."?type=error&message=Credenciales incorrectas&sql=$sql");
            exit();
        }
    } else {
        header("Location: " . ROOT_URL ."?type=error&message=Credenciales incorrectas");
        exit();
    }
}

// Si es registro
elseif (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['name']) && isset($_POST['confirm_password'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $confirm = $_POST['confirm_password'];

    if ($pass != $confirm) {
        header("Location: " . ROOT_URL ."?type=error&message=Las contraseñas no coinciden");
        exit();
    }

    // Validar si ya existe
    $check = $conn->query("SELECT id FROM users WHERE email = '$email'");
    if ($check && $check->num_rows > 0) {
        header("Location: " . ROOT_URL ."?type=error&message=El correo ya está registrado");
        exit();
    }

    $hashed = password_hash($pass, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (name, email, password_hash) VALUES ('$name', '$email', '$hashed')";

    if ($conn->query($sql)) {
        $_SESSION['user_id'] = $conn->insert_id;
        $_SESSION['user_name'] = $name;
        header("Location: ".ROOT_URL ."?message=Usuario registrado con éxito");
        exit();
    } else {
        header("Location: " . ROOT_URL ."?type=error&message=Error al registrar el usuario");
        exit();
    }
} else {
    header("Location: " . ROOT_URL ."?type=error&message=Acceso inválido");
    exit();
}

