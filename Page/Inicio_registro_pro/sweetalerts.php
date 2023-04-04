<?php
// registro
$repet_registro = " 
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
                didOpen: (toast) => {
                  toast.addEventListener('mouseenter', Swal.stopTimer)
                  toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
              Toast.fire({
                icon: 'error',
                title: 'Oops..',
                text: '¡Este correo ya existe!'
              });
              
    </script>
";

$correo_ok = "
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
              didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
              }
            })
                Toast.fire({
                  icon: 'success',
                  title: 'Registro Existoso',
                  text: '¡Correo almacenado exitosamente!'
                });
    </script>
";

$error_user = "
<script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 5000,
                timerProgressBar: true,
                didOpen: (toast) => {
                  toast.addEventListener('mouseenter', Swal.stopTimer)
                  toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
              })
              Toast.fire({
                icon: 'warning',
                title: 'Usuario no almacenado',
                text: '¡Intentalo de nuevo!'
              });
              
            </script>
";
// inicio de sesion
$inicio_admin = "
<script>
Swal.fire({
  title: 'Has accedido como administrador',
  icon: 'success',
  timer: 1700,
  didOpen: () => {
    Swal.showLoading();
  },
  willClose: () => {
    window.location.href = '../admin/index.php';
  }
});
</script>";

$error_inicio = "
<script>
Swal.fire({
  icon: 'error',
  title: 'Usuario no existe',
  text: 'Por favor, verifique los datos introducidos',
  timer: 3000,
  timerProgressBar: true,
  didOpen: () => {
    Swal.showLoading();
  },
  willClose: () => {
    window.location.href = 'index.php';
  }
});
</script>";
// cerrar sesion
$close_session = "
<script>
Swal.fire({
  icon: 'success',
  title: 'Se ha cerrado sesion',
  timer: 1600,
  timerProgressBar: true,
  didOpen: () => {
    Swal.showLoading();
  },
  willClose: () => {
    window.location.href = 'index.php';
  }
});
</script>";
?>
