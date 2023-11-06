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
			console.log(response)

		},
		error: function(error){
		}
	});	
});
