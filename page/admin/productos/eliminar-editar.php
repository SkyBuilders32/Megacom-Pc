<!-- Nuevo Producto -->

<?php  $consult = mysqli_query($con, "SELECT * FROM proveedores");?>
<?php  $consulta = mysqli_query($con, "SELECT * FROM proveedores");?>
<div class="modal fade" id="nuevo" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Nueva Venta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="nuevo.php" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="floatingSelect">Selecciona el Proveedor</label>
                                <select class="form-select" id="floatingSelect" aria-label="Proveedor" name="proveedor">
                                    <?php
                                    while ($pr = mysqli_fetch_array($consult)){
                                        echo "<option value=".$pr[0].">".$pr[1]." / ".$pr[2]." / ".$pr[7]."</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Marca</label>
                                <input type="text" class="form-control" name="marca" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Modelo</label>
                                <input type="text" class="form-control" name="modelo" required>
                            </div>
                            
                        
                        <div class="col-md-6">
                        <div class="mb-3">
                                <label class="form-label">Imagen</label>
                                <input type="file" accept="image/*" class="form-control" name="imagen" required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Descripcion</label>
                                <input type="text" class="form-control" name="descripcion" required>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" name="nuevo" class="btn btn-primary">Aceptar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Editar -->
<div class="modal fade" id="edit_<?php echo $mostrar['id_producto']; ?>" tabindex="-1" aria-labelledby="ModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Editar Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="edit.php?id_producto=<?php echo $mostrar['id_producto']; ?>"
                    enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="floatingSelect">Selecciona el Id Proveedor</label>
                                <select class="form-select" id="floatingSelect"
                                    aria-label="Floating label select example" name="proveedor">
                                    <?php
                                        while ($proe = mysqli_fetch_array($consulta)){
                                            echo "<option value=".$proe[0]."> ".$proe[0]." / ".$proe[1]." / ".$proe[2]." / ".$proe[3]." </option>"; 
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">ID Producto</label>
                                <input type="number" class="form-control" name="id_producto"
                                    value="<?php echo $mostrar['id_producto']; ?>">
                            </div>

                            <div class="mb-3">
                                <label class="col-form-label">Marca</label>
                                <input type="text" class="form-control" name="marca"
                                    value="<?php echo $mostrar['marca']; ?>">
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Modelo</label>
                                <input type="text" class="form-control" name="modelo"
                                    value="<?php echo $mostrar['modelo']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 mostrar">
                                <label class="col-sm-2 col-form-label">Imagen</label>
                                <div class="col-sm-13">
                                    <input type="file" accept="image/*" class="form-control" name="imagen">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Precio Base</label>
                                <input type="number" class="form-control" name="precio_base"
                                    value="<?php echo $mostrar['precio_base']; ?>">
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Existencias</label>
                                <input type="number" class="form-control" name="existencias"
                                    value="<?php echo $mostrar['existencias']; ?>">
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Descripcion</label>
                                <input type="text" class="form-control" name="descripcion"
                                    value="<?php echo $mostrar['descripcion']; ?>">
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" name="edit" class="btn btn-primary">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delet_<?php echo $mostrar['id_producto']; ?>" tabindex="-1" aria-labelledby="ModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Delete Membe</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-center">Are you sure you want to Delete</p>
                <h2 class="text-center">
                    <?php echo  $mostrar['id_producto']; ?>
                </h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="delete.php?id_producto=<?php echo $mostrar['id_producto']; ?>" class="btn btn-danger"> Yes</a>
            </div>
        </div>
    </div>
</div>