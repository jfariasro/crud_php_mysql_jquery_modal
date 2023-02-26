<?php
require_once 'clases/clsClientes.php';

if (isset($_POST['update_cliente'])) {
    $cliente = new Cliente($_POST['update_id'], $_POST['update_nombre'], $_POST['update_edad'], $_POST['update_cedula'], $_POST['update_email'], $_POST['update_direccion']);
    $cliente->Modificar($con);
} else if (isset($_POST['add_cliente'])) {
    $cliente = new Cliente(null, $_POST['add_nombre'], $_POST['add_edad'], $_POST['add_cedula'], $_POST['add_email'], $_POST['add_direccion']);
    $cliente->Agregar($con);
} else if(isset($_POST['delete_cliente'])){
    $cliente = new Cliente($_POST['delete_id'], '', '', '', '', '');
    $cliente->Eliminar($con);
}

$query = "SELECT * from clientes
ORDER BY nombre asc;";
$res = mysqli_query($con, $query);

require('views/clientes.view.php');
