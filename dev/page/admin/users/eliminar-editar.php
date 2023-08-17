<!-- Editar Usuario -->


<div class="modal fade" id="edit_<?php echo $mostrar['id']; ?>" tabindex="-1" aria-labelledby="ModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Editar Cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="edit.php?id=<?php echo $mostrar['id']; ?>">
                    <div class="mb-3 mostrar">
                        <label class="col-sm-2 col-form-label">Id:</label>
                        <div class="col-sm-13">
                            <input type="number" class="form-control" name="id"
                                value="<?php echo $mostrar['id']; ?>" required>
                        </div>
                    </div>
                    <div class="mb-3 mostrar">
                        <label class="col-sm-2 col-form-label">Usuario:</label>
                        <div class="col-sm-13">
                            <input type="text" class="form-control" name="usuario"
                                value="<?php echo $mostrar['usuario']; ?>" required>
                        </div>
                    </div>
                    <div class="mb-3 mostrar">
                        <label class="col-sm-2 col-form-label">Correo:</label>
                        <div class="col-sm-13">
                            <input type="text" class="form-control" name="correo"
                                value="<?php echo $mostrar['correo']; ?>" required>
                        </div>
                    </div>
                    <div class="mb-3 mostrar">
                        <label class="col-sm-2 col-form-label">Contraseña:</label>
                        <div class="col-sm-13">
                            <input type="text" class="form-control" name="contraseña"
                                value="<?php echo $mostrar['contraseña']; ?>" required>
                        </div>
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" name="edit" class="btn btn-primary">Actualizar</a>
                    </form>
            </div>
        </div>
    </div>
</div>


<!-- Eliminar Usuario -->


<div class="modal fade" id="delete_<?php echo $mostrar['id']; ?>" tabindex="-1" aria-labelledby="ModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Eliminar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-center">Estas seguro de que quieres borrar este usuario</p>
                <h2 class="text-center">
                    Id: <?php echo  $mostrar['id']; ?>
                </h2>
                <h2 class="text-center">
                    Usuario: <?php echo  $mostrar['usuario']; ?>
                </h2>
                <h2 class="text-center">
                    Correo: <?php echo  $mostrar['correo']; ?>
                </h2>
                <h2 class="text-center">
                    Contraseña: <?php echo  $mostrar['contraseña']; ?>
                </h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="delete.php?id=<?php echo $mostrar['id']; ?>" class="btn btn-danger"> Yes</a>
            </div>
        </div>
    </div>
</div>