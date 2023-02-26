<?php

require '../db_conexion.php';
require '../clases/clsClientes.php';
$con = mysqli_connect($host, $user, $pass, $db);

if (isset($_POST['AddClienteModal'])) {
    $nombre = mysqli_real_escape_string($con, $_POST['add_nombre']);
    $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);

    $edad = mysqli_real_escape_string($con, $_POST['add_edad']);
    $edad = filter_var($edad, FILTER_SANITIZE_NUMBER_INT);

    $cedula = mysqli_real_escape_string($con, $_POST['add_cedula']);
    $cedula = filter_var($cedula, FILTER_SANITIZE_NUMBER_INT);

    $email = mysqli_real_escape_string($con, $_POST['add_email']);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    $direccion = mysqli_real_escape_string($con, $_POST['add_direccion']);
    $direccion = filter_var($direccion, FILTER_SANITIZE_STRING);

    $cliente = new Cliente(NULL, $nombre, $edad, $cedula, $email, $direccion);

    $mensaje = $cliente->Validacion();

    if ($mensaje !== '') {
        $res = [
            'status' => 422,
            'message' => $mensaje
        ];
        echo json_encode($res);
        return;
    }

    $query_run = $cliente->Agregar($con);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Cliente Registrado Exitosamente'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Cliente No Pudo Ser Registrado'
        ];
        echo json_encode($res);
        return;
    }
} else if (isset($_POST['UpdateClienteModal'])) {
    $id = mysqli_real_escape_string($con, $_POST['update_id']);

    $nombre = mysqli_real_escape_string($con, $_POST['update_nombre']);
    $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);

    $edad = mysqli_real_escape_string($con, $_POST['update_edad']);
    $edad = filter_var($edad, FILTER_SANITIZE_NUMBER_INT);

    $cedula = mysqli_real_escape_string($con, $_POST['update_cedula']);
    $cedula = filter_var($cedula, FILTER_SANITIZE_NUMBER_INT);

    $email = mysqli_real_escape_string($con, $_POST['update_email']);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    $direccion = mysqli_real_escape_string($con, $_POST['update_direccion']);
    $direccion = filter_var($direccion, FILTER_SANITIZE_STRING);

    $cliente = new Cliente($id, $nombre, $edad, $cedula, $email, $direccion);

    $mensaje = $cliente->Validacion();

    if ($mensaje !== '') {
        $res = [
            'status' => 422,
            'message' => $mensaje
        ];
        echo json_encode($res);
        return;
    }

    $query_run = $cliente->Modificar($con);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Cliente Modificado Exitosamente'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Cliente No Pudo Ser Modificado'
        ];
        echo json_encode($res);
        return;
    }
} else if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($con, $_GET['id']);

    $query = "SELECT * FROM clientes WHERE id='$id'";
    $query_run = mysqli_query($con, $query);

    if (mysqli_num_rows($query_run) == 1) {
        $student = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'Cliente Obtenido',
            'data' => $student
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 404,
            'message' => 'Cliente No Encontrado'
        ];
        echo json_encode($res);
        return;
    }
} else if (isset($_POST['DeleteClienteModal'])) {
    $id = mysqli_real_escape_string($con, $_POST['delete_id']);

    $cliente = new Cliente($id, NULL, NULL, NULL, NULL, NULL);

    $query_run = $cliente->Eliminar($con);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Cliente Eliminado Exitosamente'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Cliente No Pudo Ser Eliminado'
        ];
        echo json_encode($res);
        return;
    }
}
