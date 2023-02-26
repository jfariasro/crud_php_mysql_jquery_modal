<?php
class Cliente
{
    public $id;
    public $nombre;
    public $edad;
    public $cedula;
    public $email;
    public $direccion;

    function __construct($id, $nombre, $edad, $cedula, $email, $direccion)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->cedula = $cedula;
        $this->email = $email;
        $this->direccion = $direccion;
    }

    public function Agregar($con)
    {
        $insertar = "INSERT INTO clientes(id, nombre, edad, cedula, email, direccion)
        VALUES('$this->id', '$this->nombre', '$this->edad', '$this->cedula', '$this->email', '$this->direccion')";
        return mysqli_query($con, $insertar);
    }

    public function Modificar($con)
    {
        $modificar = "UPDATE clientes SET
        nombre = '$this->nombre', edad = '$this->edad', cedula = '$this->cedula',
        email = '$this->email', direccion = '$this->direccion'
        WHERE id = '$this->id'";
        return mysqli_query($con, $modificar);
    }

    public function Eliminar($con)
    {
        $eliminar = "DELETE FROM clientes WHERE id = '$this->id'";
        return mysqli_query($con, $eliminar);
    }

    public function Validacion()
    {
        $mensaje = '';
        if ($this->nombre == NULL) {
            $mensaje .= "Debes Ingresar el Nombre. ";
        }
        if ($this->edad == NULL) {
            $mensaje .= "Debes Ingresar la Edad. ";
        } else if ($this->edad < 0) {
            $mensaje .= "Debes Ingresar una Edad Correcta. ";
        }
        if ($this->cedula == NULL) {
            $mensaje .= "Debes Ingresar una Cédula Válida. ";
        } else if (strlen($this->cedula) !== 10) {
            $mensaje .= "La Cédula Debe Tener 10 Dígitos. ";
        }
        if ($this->email == NULL) {
            $mensaje .= "Debes Ingresar el Email. ";
        } else if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $mensaje .= "Debes Ingresar un Correo Válido. ";
        }
        if ($this->direccion == NULL) {
            $mensaje .= "Debes Ingresar la Direccion. ";
        }
        return $mensaje;
    }
}
