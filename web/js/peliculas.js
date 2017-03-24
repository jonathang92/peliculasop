


			$(document).ready(function(){
        // $("#sumar").click(function(){
        //   var count = $("#asientos .asiento").length;
        //   count = count+1;
				// 	$.get('includes/asiento.php?count='+count+'', function(data){
				// 	    content= data;
				// 	    $('#asientos').append(content);
				// 	});
        // });
        $("#restar").click(function(){
          var count = $("#asientos .asiento").length;
          if(count<=1){
            alert("Debe terner al menos un asiento");
          } else {
            $( "#asientos .asiento:last-child").remove();
          }

        });

				$( function() {
			    $( "#fecha" ).datepicker();
			  } );

				$(function($){
					$.datepicker.regional['es'] = {
						closeText: 'Cerrar',
						prevText: '&#x3c;Ant',
						nextText: 'Sig&#x3e;',
						currentText: 'Hoy',
						monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
						'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
						monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
						'Jul','Ago','Sep','Oct','Nov','Dic'],
						dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
						dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
						dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
						weekHeader: 'Sm',
						dateFormat: 'yy-mm-dd',
						firstDay: 1,
						isRTL: false,
						showMonthAfterYear: false,
						maxDate: "+0d",
						yearSuffix: ''};
					$.datepicker.setDefaults($.datepicker.regional['es']);
				});

			});
