<div class="modal fade" id="edit_<?php echo $mostrar['id']; ?>" tabindex="-1" aria-labelledby="ModalLabel"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Editar Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="edit.php?id=<?php echo $mostrar['id']; ?>">
          <div class="mb-3 mostrar">
            <label class="col-sm-2 col-form-label">Usuario</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="usuario" value="<?php echo $mostrar['usuario']; ?>">
            </div>
          </div>
          <div class="mb-3 mostrar">
            <label class="col-sm-2 col-form-label">Correo</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="correo" value="<?php echo $mostrar['correo']; ?>">
            </div>
          </div>
          <div class="mb-3 mostrar">
            <label class="col-sm-2 col-form-label">Contraseña</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="contraseña" value="<?php echo $mostrar['contraseña']; ?>">
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
<div class="modal fade" id="delete_<?php echo $mostrar['id']; ?>" tabindex="-1" aria-labelledby="ModalLabel"
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
          <?php echo  $mostrar['correo']; ?>
        </h2>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="delete.php?id=<?php echo $mostrar['id']; ?>" class="btn btn-danger"> Yes</a>
      </div>
    </div>
  </div>
</div>