<!-- Nuevo Proveedor -->

<!-- Modal con más espacio entre los campos -->
<div class="modal fade" id="nuevo" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Nuevo Proveedor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="nuevo.php">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>Nit:</label>
                            <input type="number" class="form-control" name="nit" required>
                        </div>
                        <div class="col-md-6">
                            <label>Nombre:</label>
                            <input type="text" class="form-control" name="nombre" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>Correo:</label>
                            <input type="email" class="form-control" name="correo" required>
                        </div>
                        <div class="col-md-6">
                            <label>Direccion:</label>
                            <input type="text" class="form-control" name="direccion" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>Ciudad:</label>
                            <input type="text" class="form-control" name="ciudad" required>
                        </div>
                        <div class="col-md-6">
                            <label>Telefono:</label>
                            <input type="number" class="form-control" name="telefono" required>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" name="nuevo" class="btn btn-primary">Aceptar</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Editar Proveedor -->

<!-- Modal con más espacio entre campos y disposición horizontal -->
<div class="modal fade" id="edit_<?php echo $mostrar['nit']; ?>" tabindex="-1" aria-labelledby="ModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Editar Proveedor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="edit.php?nit=<?php echo $mostrar['nit']; ?>">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>Nit:</label>
                            <input type="number" class="form-control" name="nit"
                                value="<?php echo $mostrar['nit']; ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label>Nombre:</label>
                            <input type="text" class="form-control" name="nombre"
                                value="<?php echo $mostrar['nombre']; ?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>Correo:</label>
                            <input type="email" class="form-control" name="correo"
                                value="<?php echo $mostrar['correo']; ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label>Direccion:</label>
                            <input type="text" class="form-control" name="direccion"
                                value="<?php echo $mostrar['direccion']; ?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>Ciudad:</label>
                            <input type="text" class="form-control" name="ciudad"
                                value="<?php echo $mostrar['ciudad']; ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label>Telefono:</label>
                            <input type="number" class="form-control" name="telefono"
                                value="<?php echo $mostrar['telefono']; ?>" required>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" name="edit" class="btn btn-primary">Actualizar</button>
            </div>
            </form>
        </div>
    </div>
</div>


<!-- Eliminar Proveedor -->


<div class="modal fade" id="delete_<?php echo $mostrar['nit']; ?>" tabindex="-1" aria-labelledby="ModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Eliminar Proveedor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-center">Estas seguro de que quieres borrar este proveedor</p>
                <h2 class="text-center">
                    Nit: <?php echo  $mostrar['nit']; ?>
                </h2>
                <h2 class="text-center">
                    Nombre: <?php echo  $mostrar['nombre']; ?>
                </h2>
                <h2 class="text-center">
                    Correo: <?php echo  $mostrar['correo']; ?>
                </h2>
                <h2 class="text-center">
                    Telefono: <?php echo  $mostrar['telefono']; ?>
                </h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="delete.php?nit=<?php echo $mostrar['nit']; ?>" class="btn btn-danger"> Yes</a>
            </div>
        </div>
    </div>
</div>