// SIDEBAR DROPDOWN
const allDropdown = document.querySelectorAll('#sidebar .side-dropdown');
const sidebar = document.getElementById('sidebar');

allDropdown.forEach(item=> {
	const a = item.parentElement.querySelector('a:first-child');
	a.addEventListener('click', function (e) {
		e.preventDefault();

		if(!this.classList.contains('active')) {
			allDropdown.forEach(i=> {
				const aLink = i.parentElement.querySelector('a:first-child');

				aLink.classList.remove('active');
				i.classList.remove('show');
			})
		}

		this.classList.toggle('active');
		item.classList.toggle('show');
	})
})





// SIDEBAR COLLAPSE
const toggleSidebar = document.querySelector('nav .toggle-sidebar');
const allSideDivider = document.querySelectorAll('#sidebar .divider');

if(sidebar.classList.contains('hide')) {
	allSideDivider.forEach(item=> {
		item.textContent = '-'
	})
	allDropdown.forEach(item=> {
		const a = item.parentElement.querySelector('a:first-child');
		a.classList.remove('active');
		item.classList.remove('show');
	})
} else {
	allSideDivider.forEach(item=> {
		item.textContent = item.dataset.text;
	})
}

toggleSidebar.addEventListener('click', function () {
	sidebar.classList.toggle('hide');

	if(sidebar.classList.contains('hide')) {
		allSideDivider.forEach(item=> {
			item.textContent = '-'
		})

		allDropdown.forEach(item=> {
			const a = item.parentElement.querySelector('a:first-child');
			a.classList.remove('active');
			item.classList.remove('show');
		})
	} else {
		allSideDivider.forEach(item=> {
			item.textContent = item.dataset.text;
		})
	}
})




sidebar.addEventListener('mouseleave', function () {
	if(this.classList.contains('hide')) {
		allDropdown.forEach(item=> {
			const a = item.parentElement.querySelector('a:first-child');
			a.classList.remove('active');
			item.classList.remove('show');
		})
		allSideDivider.forEach(item=> {
			item.textContent = '-'
		})
	}
})



sidebar.addEventListener('mouseenter', function () {
	if(this.classList.contains('hide')) {
		allDropdown.forEach(item=> {
			const a = item.parentElement.querySelector('a:first-child');
			a.classList.remove('active');
			item.classList.remove('show');
		})
		allSideDivider.forEach(item=> {
			item.textContent = item.dataset.text;
		})
	}
})




// PROFILE DROPDOWN
const profile = document.querySelector('nav .profile');
const imgProfile = profile.querySelector('img');
const dropdownProfile = profile.querySelector('.profile-link');

imgProfile.addEventListener('click', function () {
	dropdownProfile.classList.toggle('show');
})




// MENU
const allMenu = document.querySelectorAll('main .content-data .head .menu');

allMenu.forEach(item=> {
	const icon = item.querySelector('.icon');
	const menuLink = item.querySelector('.menu-link');

	icon.addEventListener('click', function () {
		menuLink.classList.toggle('show');
	})
})



window.addEventListener('click', function (e) {
	if(e.target !== imgProfile) {
		if(e.target !== dropdownProfile) {
			if(dropdownProfile.classList.contains('show')) {
				dropdownProfile.classList.remove('show');
			}
		}
	}

	allMenu.forEach(item=> {
		const icon = item.querySelector('.icon');
		const menuLink = item.querySelector('.menu-link');

		if(e.target !== icon) {
			if(e.target !== menuLink) {
				if (menuLink.classList.contains('show')) {
					menuLink.classList.remove('show')
				}
			}
		}
	})
})

//system of selling
 //dropdown the client buttom
$('.btn_new_cliente').click(function(e){
	e.preventDefault();
	$('#nom_cliente').removeAttr('disabled');
	$('#ap_cliente').removeAttr('disabled');
	$('#tel_cliente').removeAttr('disabled');
	$('#cor_cliente').removeAttr('disabled');

	$('#div_registro_cliente').slideDown();
});

//search for clients
$('#cedula_cliente').keyup(function (e){
	e.preventDefault();
	var cl = $(this).val();
	var action = 'searchCliente' ;
	
	$.ajax({
		url: 'ajax.php',
		type: 'POST' ,
		async: true, 
		data: {action:action,cliente:cl},
		success: function(response){
			
			if (response == 0) {
				$('#idcliente').val('');
				$('#nom_cliente').val('');
				$('#ap_cliente').val('');
				$('#tel_cliente').val('');
				$('#cor_cliente').val('');
	//show button add
				$('.btn_new_cliente').slideDown();
			} else{
				var data = $.parseJSON(response);
				$('#idcliente').val(data.Id);
				$('#nom_cliente').val(data.nombre);
				$('#ap_cliente').val(data.apellido);
				$('#tel_cliente').val(data.Telefono);
				$('#cor_cliente').val(data.correo);
	//ocult button add
				$('.btn_new_cliente').slideUp();
				
	//block fields
				$('#nom_cliente').attr('disabled','disabled');
				$('#ap_cliente').attr('disabled','disabled');
				$('#tel_cliente').attr('disabled','disabled');
				$('#cor_cliente').attr('disabled','disabled');
	//hide div save
				$('#div_registro_cliente').slideUp();
			}
		},
		error: function(error){
		}
	});		
});

//create cliente from ventas
$('#form_new_cliente_venta').submit(function (e) {
	e.preventDefault();
	$.ajax({
		url: 'ajax.php',
		type: 'POST' ,
		async: true, 
		data: $('#form_new_cliente_venta').serialize(),

		success: function(response){
			if (response != 'error') {
				//add id to input hidden
				$("#idcliente").val(response);
				//block fields
				$('#nom_cliente').attr('disabled','disabled');
				$('#ap_cliente').attr('disabled','disabled');
				$('#tel_cliente').attr('disabled','disabled');
				$('#cor_cliente').attr('disabled','disabled');
				//hide button add
				$(".btn_new_cliente").fadeOut("slow");
				//hide div new cliente
				$('#div_registro_cliente').slideUp();

			}
		},
		error: function(error){
		}
	});	

});

//get producto
$('.edit_product').click(function(e) {
	e.preventDefault();
	var producto = $(this).attr('product');
	var action = 'infoProducto';
	
	$.ajax({
		url: '../ventas/ajax.php',
		type: 'POST',
		async: true,
		data:{action:action, producto:producto},
		success: function(response){
			if (response != 'error') {
				var info = JSON.parse(response);
				console.log(info);
				$('#producto_id').val(info.id_producto);	
			}
			
			},
			error: function(error){
			}
	});
});

//search products
$('#txt_cod_producto').keyup(function(e){
	e.preventDefault();
	var producto = $(this).val();
	var action = 'infoProducto';
	if(producto !=''){ 
	$.ajax({
		url: 'ajax.php',
		type: "POST",
		async: true,
		data:{action:action, producto:producto},
		success: function(response){
			if (response != 'error') {
				var info = JSON.parse(response);
				$("#txt_descripcion").html(info.modelo);
				$("#txt_existencia").html(info.existencias);
				$("#txt_cant_producto").val('1');
				$("#txt_precio").html(info.precio_de_venta);
				$("#txt_precio_total").html(info.precio_de_venta);

				//acivate field cantidad
				$("#txt_cant_producto").removeAttr('disabled');

				//show button add
				$('#add_product_venta').slideDown();

				}else{
				$("#txt_descripcion").html('-');
				$("#txt_existencia").html('-');
				$("#txt_cant_producto").val('0');
				$("#txt_precio").html('0.00');
				$("#txt_precio_total").html('0.00');
				
				//disable field cantidad
				$("#txt_cant_producto").attr('disabled','disabled');
				
				//hide button add
				$("#add_product_venta").slideUp();
				}
		},
		error: function(error){
			}
	});
}
});

//validate amount of the product before add
$("#txt_cant_producto").keyup(function(e){
	e.preventDefault();
	var precio_total = $(this).val() * $('#txt_precio').html();
	var existencia = parseInt($('#txt_existencia').html());
	$("#txt_precio_total").html(precio_total);

//hide the button add if the amount is less than one
if(  ($(this).val() < 1 || isNaN($(this).val())) || ( $(this).val() > existencia)  ) {
	$("#add_product_venta").slideUp();
	} else {
		$("#add_product_venta").slideDown();
	}
});

//add product to detail
$('#add_product_venta').click(function(e){
	e.preventDefault();
if($('#txt_cant_producto').val() > 0){
	var id_producto = $('#txt_cod_producto').val();
	var cantidad = $('#txt_cant_producto').val();
	var action = 'addProductoDetalle';
	$.ajax({
		url: 'ajax.php',
		type: 'POST',
		async: true,
		data: {action:action, producto:id_producto,cantidad:cantidad},
		success: function(response){
			if(response != 'error'){ 
				var info = JSON.parse(response);
				$('#detalle_venta').html(info.detalle);
				$('#detalle_totales').html(info.totales);
				//reset fields
				$('#txt_cod_producto').val('');
				$('#txt_descripcion').html('');
				$('#txt_existencia').html('');
				$('#txt_cant_producto').val('0');
				$('#txt_precio').html('0.00');
				$('#txt_precio_total').html('0.00');

				//lock amount
				$("#txt_cant_producto").prop("disabled",true);

				//hide button add
				$("#add_product_venta").fadeOut();

				}else{
					console.log('no data');
				}
			}, 
			error: function (error) {
			}
		});
	}
}); 
//delete producto 
function del_product_detalle(correlativo) {
	var action = 'delproductodetalle';
	var id_detalle = correlativo;

	$.ajax({
		url: 'ajax.php',
		type: 'POST',
		async: true,
		data: {action:action, id_detalle:id_detalle},
		success: function(response){
			console.log(response);
			}, 
			error: function (error) {
			}
		});
}

function searchfordetalle(id) {
	var action = 'searchfordetalle';
	var user = id;

	$.ajax({
		url: 'ajax.php',
		type: 'POST',
		async: true,
		data: {action:action, user:id},
		success: function(response){
			if(response != 'error'){ 
				var info = JSON.parse(response);
				$('#detalle_venta').html(info.detalle);
				$('#detalle_totales').html(info.totales);
				}else{
					console.log('no data');
				}
			}, 
			error: function (error) {
			}
		});
}

  
