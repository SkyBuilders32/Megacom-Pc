function repet_registro() {
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
          
}

function correo_ok() {
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
}

function error_user() {
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
}

// inicio de sesion
function inicio_admin() {
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
}
function error_inicio() {
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
}
// cerrar sesion
function close_session() {
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
}
// error
function llenar() {
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
          text: 'Por favor, llene los campos'
        });
        
}