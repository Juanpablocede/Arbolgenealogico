$(document).ready(function()
{
	$("#guardar").click(function()
		{
				/*var nombres 		= $("#nombres").val();
				var apellidos 	= $("#apellidos").val();
				var direccion		= $("#direccion").val();*/
				if ($("#nombres").val() == "" || $("#apellidos").val() == "")
				{
							$("#nombres").css({ "background-color" : "red" , "border-bottom" : "solid #C6D0DA" });
							$("#apellidos").css({ "background-color" : "red" , "border-bottom" : "solid #C6D0DA" });
							alert("Algunos de los campos: Nombres o apellidos; no puede estar en blanco");
				}
				if ($("#sexo").val() == "" || $("#fecha_nacimiento").val() == "")
				{
							$("#sexo").css({ "background-color" : "red" , "border-bottom" : "solid #C6D0DA" });
							$("#fecha_nacimiento").css({ "background-color" : "red" , "border-bottom" : "solid #C6D0DA" });
							alert("Algunos de los campos: Sexo o fecha de nacimiento; no puede estar en blanco");
				}
				//if ($("#condicionvida").val() == "" || $("#id_decendencia").val() == "")
				if ($("#condicionvida").val() == "")
				{
							$("#condicionvida").css({ "background-color" : "red" , "border-bottom" : "solid #C6D0DA" });
							$("#id_decendencia").css({ "background-color" : "red" , "border-bottom" : "solid #C6D0DA" });
							alert("Algunos de los campos: Condiciòn de vida o decendencia; no puede estar en blanco");
				}
				if ($("#id_parentesco").val() == "" || $("#posee_decendencia").val() == "")
				{
							$("#id_parentesco").css({ "background-color" : "red" , "border-bottom" : "solid #C6D0DA" });
							$("#posee_decendencia").css({ "background-color" : "red" , "border-bottom" : "solid #C6D0DA" });
							alert("Algunos de los campos: Id Parentesco o posee decendencia?; no puede estar en blanco");
				}

				if ($("#nombres").val().trim().length > 70)
				{
						alert ("La longitud del campo nombres no puede tener mas de 70 caràcteres");
				}

				if ($("#apellidos").val().trim().length > 70)
				{
						alert ("La longitud del campo apellidos no puede tener mas de 70 caràcteres");
				}

				if ($("#direccion").val().trim().length > 200)
				{
						alert ("La longitud del campo direcciòn no puede tener mas de 20 caràcteres");
				}

		});


		const COLUMN_DEFS = () => [
  {
    className: "d-none",
    targets: [0]
  },
  {
    className: "col-2",
    targets: [1]
  },
  {
    className: "col-2",
    targets: [2]
  },
  {
    className: "col-1 d-none text-center",
    targets: [3]
  },
  {
    className: "col-1 text-center",
    targets: [4]
  },
  {
    className: "d-none",
    targets: [5]
  },
  {
    className: "col-1 text-center",
    targets: [6]
  },
  {
    className: "d-none",
    targets: [7]
  },
  {
    className: "col-4",
    targets: [8]
  },
  {
    className: "d-none",
    targets: [9]
  },
  {
    className: "col-1",
    targets: [10]
  },
  {
    className: "col-1",
    targets: [11]
  },
  {
    className: "col-1",
    targets: [12]
  },
  {
    className: "col-1",
    targets: [13]
  },
	{
		className: "col-1",
		targets: [14]
	}
];

		$('#ListarData').DataTable({
			"columnDefs": COLUMN_DEFS(),
			language: {
		    "decimal":        "",
				"emptyTable":     "No hay datos",
				"info":           "Mostrando _START_ a _END_ de _TOTAL_ registros",
				"infoEmpty":      "Mostrando 0 a 0 de 0 registros",
				"infoFiltered":   "(Filtro de _MAX_ total registros)",
				"infoPostFix":    "",
				"thousands":      ",",
				"lengthMenu":     "Mostrar _MENU_ registros",
				"loadingRecords": "Cargando...",
				"processing":     "Procesando...",
				"search":         "Buscar:",
				"zeroRecords":    "No se encontraron coincidencias",
				"paginate": {
				    "first":      "Primero",
				    "last":       "Ultimo",
				    "next":       "Próximo",
				    "previous":   "Anterior"
				},
				"aria": {
				    "sortAscending":  ": Activar orden de columna ascendente",
				    "sortDescending": ": Activar orden de columna desendente"
				}
		  }
		});

		/*$.fn.ListarData.isDataTable (),
		$('#ListarData').DataTable( {
		    paging: true,
		    searching: true,
				//dataTables_length: "Mostrar",
				//ListarData_length: "Mostrar",
		} );*/

		$("#prueba").hover(function()
		{
			    $(this).css({ "background-color" : "red" , "border-bottom" : "solid #C6D0DA" });
		}, function()
		{
			    $(this).css( {"background-color" : "white" , "border-bottom" : "none" });
		});

		setTimeout(function(){
			$(".alert-success").fadeOut();
		}, 3000);

		$('#resultado').prop('disabled', true);
		var fecha = new Date();
		var ano = fecha.getFullYear();

		var select = $('#ano');
		for(var i=1900;i<=ano;i++)
		{
			select.append('<option id="any" value="'+i+'" >'+i+'</option>');
	 	}

		var options =
		{
			url: "http://localhost:8000/sfp-acciones-especificas/buscar",

			getValue: "nombre_accion_especifica",

			list: {
				match: {
					enabled: true
				}
			}
		};


		//Rutina para agregar opciones a un <select> Año
		function cargar_ano(domElement)
		{
			var fecha = new Date();
			var ano = fecha.getFullYear();
			disable.text = 'Año';
			var select = document.getElementsByName(domElement)[0];
			for(var i=1900;i<=ano;i++)
			{
				var option = document.createElement("option");
				option.text = i;
				select.add(option);
			}
		}

		function cargar_dias()
		{
			//var month = document.getElementById('mes').value;

			var month = $('#mes').val();

			switch(month)
			{
				case 'enero':
				case 'marzo':
				case 'mayor':
				case 'julio':
				case 'agosto':
				case 'octubre':
				case 'diciembre':
					var valormes = 31;
					break;
				case 'febrero':
					var valormes = 28;
					break;
				case 'abril':
				case 'junio':
				case 'septiembre':
				case 'noviembre':
					valormes = 30;
					break;
				default:
					alert('El mes no esta definido '+month);
			}

			var select = $('#diasmes');
			for(var i=1;i<=valormes;i++)
			{
				select.append('<option id="diasmes" value="'+i+'" >'+i+'</option>');
		 	}
		}

});
