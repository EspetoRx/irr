// Call the dataTables jQuery plugin

$(document).ready(function() { 
	var table = $('#dataTable').DataTable( {
		dom : "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4 text-center'B><'col-sm-12 col-md-4'f>>" +
          "<'row'<'col-sm-12'tr>>" +
          "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
		buttons : [
			{
				extend: 'copy',
               	exportOptions: {
               	columns: ':visible',
            	  rows: ':visible'
              	},
              	text: '<i class="fas fa-copy"></i>',
                className: 'btn btn-primary btn-sm',
                titleAttr: 'Copiar para a área de transferência.',
            },
            {
            	extend: 'print',
                exportOptions: {
                columns: ':visible',
                rows: ':visible'
            	},
            	text: '<i class="fas fa-print"></i>',
              className: 'btn btn-primary btn-sm',
              titleAttr: 'Imprimir.',
            },
            {
            	extend: 'csv',
                exportOptions: {
                columns: ':visible',
                rows: ':visible'
              	},
              	text: '<i class="fas fa-file-export"></i>',
                className: 'btn btn-primary btn-sm',
                titleAttr: 'Exportar como CSV.',
            },
            {
            	extend: 'pdf',
                pageSize: 'LEGAL',
                orientation: 'landscape',
                exportOptions: {
                columns: ':visible',
              	},
              	text: '<i class="fas fa-file-pdf"></i>',
                className: 'btn btn-primary btn-sm',
                titleAttr: 'Exportar como PDF.',
            },
            {
              extend: 'excelHtml5',
                exportOptions: {
                columns: ':visible',
                rows: ':visible',
                },
                text: '<i class="fas fa-file-excel"></i>',
                className: 'btn btn-primary btn-sm',
                titleAttr: 'Exportar como Excel.',
            },
            {
              extend: 'colvis',
                exportOptions: {
                columns: ':visible',
                rows: ':visible',
                },
                text: '<i class="fas fa-columns"></i>',
                className: 'btn btn-primary btn-sm',
                titleAttr: 'Colunas.',
            },
		],
		language: {
		    "decimal":        ",",
		    "emptyTable":     "Nenhum registro encontrado.",
		    "info":           "Mostrando de _START_ até _END_ de _TOTAL_ registros",
		    "infoEmpty":      "Mostrando 0 até 0 de 0 registros.",
		    "infoFiltered":   "(Filtrados de _MAX_ registros.)",
		    "infoPostFix":    "",
		    "thousands":      ".",
		    "lengthMenu":     "_MENU_ Resultados por página",
		    "loadingRecords": "Carregando...",
		    "processing":     "Processando...",
		    "search":         "<i class='fas fa-search'></i>",
		    "zeroRecords":    "Nao foram encontrados resultados.",
		    "paginate": {
		        "first":      "Primeiro",
		        "last":       "Último",
		        "next":       "Próximo",
		        "previous":   "Anterior"
		    },
		    "aria": {
		        "sortAscending":  ": Ordenar colunas de forma ascendente.",
		        "sortDescending": ": Ordenar colunas de forma descendente."
		    }
		}
	}); 
} );

