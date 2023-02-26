<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Clientes</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive-xl">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Cliente</th>
                                        <th>Edad</th>
                                        <th>Cédula</th>
                                        <th>Correo</th>
                                        <th>Dirección</th>
                                        <th>Acciones
                                            <a data-toggle="modal" data-target="#AddModal" type="button" class="text-primary" title="Aregar Nuevo Cliente"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_assoc($res)) :
                                    ?>
                                        <tr>
                                            <td><?php echo $row['nombre'] ?></td>
                                            <td><?php echo $row['edad'] ?></td>
                                            <td><?php echo $row['cedula'] ?></td>
                                            <td><?php echo $row['email'] ?></td>
                                            <td><?php echo $row['direccion'] ?></td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-xl-4">
                                                        <a id="EditModalBtn" type="button" data-id="<?php echo $row['id']; ?>" title="Editar Cliente" class="EditModalBtn text-primary"> <i class="fas fa-edit"></i> </a>
                                                    </div>
                                                    <div class="col-xl-4">
                                                        <a id="DeleteModalBtn" type="button" data-id="<?php echo $row['id']; ?>" data-nombre="<?php echo $row['nombre']; ?>" title="Eliminar Cliente" class="DeleteModalBtn text-danger"> <i class="fas fa-trash"></i> </a>
                                                    </div>
                                                    <div class="col-xl-4">
                                                        <a id="ViewModalBtn" type="button" data-id="<?php echo $row['id']; ?>" title="Ver Cliente" class="ViewModalBtn text-success"><i class="fa fa-solid fa-eye" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>

<!-- Modal para Ingresar -->
<div class="modal fade" id="AddModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title" id="defaultModalLabel">Agregar Nuevo Cliente</h4>
            </div>
            <div class="modal-body">
                <form id="AddClienteModal">
                    <div id="errorMessage" class="alert alert-warning d-none"></div>
                    <div class="form-group">
                        <label for="add_nombre">Nombre</label>
                        <input type="text" name="add_nombre" id="add_nombre" placeholder="Nombre de Cliente" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="add_edad">Edad</label>
                        <input type="number" name="add_edad" id="add_edad" placeholder="Edad del Cliente" class="form-control" min="1" max="100">
                    </div>

                    <div class="form-group">
                        <label for="add_cedula">Cédula</label>
                        <input type="text" name="add_cedula" id="add_cedula" placeholder="Cédula del Cliente" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="add_email">Email</label>
                        <input type="email" name="add_email" id="add_email" placeholder="Email de Cliente" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="add_direccion">Dirección</label>
                        <input type="text" name="add_direccion" id="add_direccion" placeholder="Dirección del Cliente" class="form-control">
                    </div>

                    <input type="submit" Value="Registrar" class="btn btn-primary">

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal para Modificar -->
<div class="modal fade" id="EditModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title" id="defaultModalLabel">Editar Cliente</h4>
            </div>
            <div class="modal-body">

                <form id="UpdateClienteModal">
                    <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

                    <input type="hidden" name="update_id" id="update_id" value="">
                    <div class="form-group">
                        <label for="update_nombre">Nombre</label>
                        <input type="text" name="update_nombre" id="update_nombre" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="update_edad">Edad</label>
                        <input type="number" name="update_edad" id="update_edad" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="update_cedula">Cédula</label>
                        <input type="text" name="update_cedula" id="update_cedula" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="update_email">Email</label>
                        <input type="email" name="update_email" id="update_email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="update_direccion">Dirección</label>
                        <input type="text" name="update_direccion" id="update_direccion" class="form-control">
                    </div>

                    <input type="submit" Value="Actualizar" class="btn btn-primary">

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal para Eliminar -->
<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h4 class="modal-title" id="defaultModalLabel">Eliminar Cliente</h4>
            </div>
            <div class="modal-body">
                <form id="DeleteClienteModal">
                    <input type="hidden" name="delete_id" id="delete_id" value="">
                    <div class="form-group">
                        <label>¿Seguro que deseas eliminar este cliente?</label>
                        <input type="text" name="delete_nombre" id="delete_nombre" class="form-control" readonly>
                    </div>

                    <input type="submit" name="delete_cliente" Value="Eliminar" class="btn btn-danger">

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal para Visualizar -->
<div class="modal fade" id="ViewModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h4 class="modal-title" id="defaultModalLabel">Vista Cliente</h4>
            </div>
            <div class="modal-body">
                <form action="panel.php?modulo=clientes" id="ingresar" method="POST">
                    <div class="form-group">
                        <label for="view_nombre">Nombre</label>
                        <input type="text" name="view_nombre" id="view_nombre" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="view_edad">Edad</label>
                        <input type="number" name="view_edad" id="view_edad" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="view_cedula">Cédula</label>
                        <input type="text" name="view_cedula" id="view_cedula" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="view_email">Email</label>
                        <input type="email" name="view_email" id="view_email" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="view_direccion">Dirección</label>
                        <input type="text" name="view_direccion" id="view_direccion" class="form-control" readonly>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on('click', '.ViewModalBtn', function() {

        //var id_estudiante = $(this).val();
        var id = $(this).attr("data-id");
        $.ajax({
            type: "GET",
            url: "ajax/ajaxCliente.php?id=" + id,
            success: function(response) {

                var res = jQuery.parseJSON(response);
                if (res.status == 404) {

                    alert(res.message);
                } else if (res.status == 200) {

                    $('#view_nombre').val(res.data.nombre);
                    $('#view_edad').val(res.data.edad);
                    $('#view_cedula').val(res.data.cedula);
                    $('#view_email').val(res.data.email);
                    $('#view_direccion').val(res.data.direccion);

                    $('#ViewModal').modal('show');
                }
            }
        });
    });

    $(document).on('click', '.DeleteModalBtn', function() {

        //var id_estudiante = $(this).val();
        var id = $(this).attr("data-id");
        var nombre = $(this).attr("data-nombre");
        $('#delete_id').val(id);
        $('#delete_nombre').val(nombre);

        $('#DeleteModal').modal('show');
    });

    $(document).on('submit', '#AddClienteModal', function(e) {
        e.preventDefault();

        var formData = new FormData(this);
        formData.append("AddClienteModal", true);

        $.ajax({
            type: "POST",
            url: "ajax/ajaxCliente.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {

                var res = jQuery.parseJSON(response);
                if (res.status == 422) {
                    $('#errorMessage').removeClass('d-none');
                    $('#errorMessage').text(res.message);

                } else if (res.status == 200) {

                    $('#errorMessage').addClass('d-none');
                    $('#AddModal').modal('hide');
                    $('#AddClienteModal')[0].reset();

                    alertify.set('notifier', 'position', 'top-right');
                    alertify.success(res.message);

                    $('#example2').load(location.href + " #example2");

                } else if (res.status == 500) {
                    alert(res.message);
                }
            }
        });

    });

    $(document).on('click', '.EditModalBtn', function() {

        var id = $(this).attr("data-id");

        $.ajax({
            type: "GET",
            url: "ajax/ajaxCliente.php?id=" + id,
            success: function(response) {

                var res = jQuery.parseJSON(response);
                if (res.status == 404) {

                    alert(res.message);
                } else if (res.status == 200) {

                    $('#update_id').val(res.data.id);
                    $('#update_nombre').val(res.data.nombre);
                    $('#update_edad').val(res.data.edad);
                    $('#update_cedula').val(res.data.cedula);
                    $('#update_email').val(res.data.email);
                    $('#update_direccion').val(res.data.direccion);

                    $('#EditModal').modal('show');
                }

            }
        });

    });

    $(document).on('submit', '#UpdateClienteModal', function(e) {
        e.preventDefault();

        var formData = new FormData(this);
        formData.append("UpdateClienteModal", true);

        $.ajax({
            type: "POST",
            url: "ajax/ajaxCliente.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {

                var res = jQuery.parseJSON(response);
                if (res.status == 422) {
                    $('#errorMessageUpdate').removeClass('d-none');
                    $('#errorMessageUpdate').text(res.message);

                } else if (res.status == 200) {

                    $('#errorMessageUpdate').addClass('d-none');

                    alertify.set('notifier', 'position', 'top-right');
                    alertify.success(res.message);

                    $('#EditModal').modal('hide');
                    $('#UpdateClienteModal')[0].reset();

                    $('#example2').load(location.href + " #example2");

                } else if (res.status == 500) {
                    alert(res.message);
                }
            }
        });

    });

    $(document).on('submit', '#DeleteClienteModal', function(e) {
        e.preventDefault();

        var formData = new FormData(this);
        formData.append("DeleteClienteModal", true);

        $.ajax({
            type: "POST",
            url: "ajax/ajaxCliente.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {

                var res = jQuery.parseJSON(response);
                var res = jQuery.parseJSON(response);
                if (res.status == 500) {
                    alert(res.message);
                } else {
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.success(res.message);

                    $('#DeleteModal').modal('hide');
                    $('#DeleteClienteModal')[0].reset();

                    $('#example2').load(location.href + " #example2");
                }
            }
        });

    });
</script>