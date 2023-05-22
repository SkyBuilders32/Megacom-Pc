<div class="modal fade" id="nuevo" tabindex="-1" aria-labelledby="ModalLabel"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Nuevo cliente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="nuevo.php">
          <div class="mb-3 mostrar">
            <label class="col-sm-2 col-form-label">Cedula</label>
            <div class="mb-3">
              <input type="number" class="form-control" name="cedula" required>
            </div>
          </div>
          <div class="mb-3 mostrar">
            <label class="col-sm-2 col-form-label">Nombre</label>
            <div class="mb-3">
              <input type="text" class="form-control" name="nombre" required>
            </div>
          </div>
          <div class="mb-3 mostrar">
            <label class="col-sm-2 col-form-label">Apellido</label>
            <div class="mb-3">
              <input type="text" class="form-control" name="apellido" required>
            </div>
          </div>
          <div class="mb-3 mostrar">
            <label class="col-sm-2 col-form-label">Correo</label>
            <div class="mb-3">
              <input type="email" class="form-control" name="correo" required>
            </div>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="nuevo" class="btn btn-primary">Aceptar</a>
          </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="edit_<?php echo $mostrar['Cedula']; ?>" tabindex="-1" aria-labelledby="ModalLabel"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Editar Cliente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="edit.php?cedula=<?php echo $mostrar['Cedula']; ?>">
          <div class="mb-3 mostrar">
            <label class="col-sm-2 col-form-label">Cedula</label>
            <div class="mb-3">
              <input type="number" class="form-control" name="usuario" value="<?php echo $mostrar['Cedula']; ?>" required>
            </div>
          </div>
          <div class="mb-3 mostrar">
            <label class="col-sm-2 col-form-label">Nombre</label>
            <div class="mb-3">
              <input type="text" class="form-control" name="nombre" value="<?php echo $mostrar['nombre']; ?>" required>
            </div>
          </div>
          <div class="mb-3 mostrar">
            <label class="col-sm-2 col-form-label">Apellido</label>
            <div class="mb-3">
              <input type="text" class="form-control" name="apellido" value="<?php echo $mostrar['apellido']; ?>" required>
            </div>
          </div>
          <div class="mb-3 mostrar">
            <label class="col-sm-2 col-form-label">Correo</label>
            <div class="mb-3">
              <input type="email" class="form-control" name="correo" value="<?php echo $mostrar['correo']; ?>" required>
            </div>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="edit" class="btn btn-primary"> Update</a>
          </form>
      </div>
    </div>
  </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $mostrar['Cedula']; ?>" tabindex="-1" aria-labelledby="ModalLabel"
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
          Cedula: <?php echo  $mostrar['Cedula']; ?>
        </h2>
        <h2 class="text-center">
          Nombre: <?php echo  $mostrar['nombre']; ?>
        </h2>
        <h2 class="text-center">
          Apellido: <?php echo  $mostrar['apellido']; ?>
        </h2>
        <h2 class="text-center">
          Correo: <?php echo  $mostrar['correo']; ?>
        </h2>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="delete.php?cedula=<?php echo $mostrar['Cedula']; ?>" class="btn btn-danger"> Yes</a>
      </div>
    </div>
  </div>
</div>