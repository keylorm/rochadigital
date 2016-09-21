(function($){
	$(document).ready(function(){
		$(".fotografia").click(function(){
			$(".fotografia").each(function(){
				$(this).removeClass('selected');
			});
			$(this).addClass('selected');

			var image_id = $(this).find('img').data('fotografia-id');
			//console.log(image_id);
			$.ajax({
			  	method: "POST",
			  	url: "/fotografias/obtener-detalle-fotografia",
			  	data: { id_fotografia: image_id },
				dataType: "json",
				success: function(data){
					//console.log(data);
					$('.default-preview').css('display', 'none');
					var image_url_thumb = '/uploads/images/'+data[0].id_actividad+'/thumbs/'+data[0].filename.substring(0,data[0].filename.length-4)+'_thumb_mediano'+data[0].filename.substring(data[0].filename.length-4);
					var image_url = '/uploads/images/'+data[0].id_actividad+'/'+data[0].filename;
					$('.detalle-fotografia-img img').attr('src', image_url_thumb );
					$('.detalle-fotografia-img .colorbox').attr('href', image_url );
					$('input[name="imageid"]').val(image_id);
					$(".detalle-fotografia-img .colorbox").colorbox();
				}

			})
		});



		$("#form-add-pedido").submit(function(event){
			event.preventDefault();


			$.ajax({
			  	method: "POST",
			  	url: "/fotografias/add-photo-order",
			  	data: { imageid: $('input[name="imageid"]').val(), activityid: $('input[name="activityid"]').val(), cantidad: $('input[name="cantidad"]').val(), tamano: $('select[name="tamano"]').val() },
				dataType: "json",
				success: function(data){
					
					if($(".carrito").hasClass("hidden")){

						$(".carrito").removeClass("hidden");
					}

					var contador = 0;
					for (var prop in data) {
					 	contador=contador+1;					  
					}

					for (var prop in data) {
					  	if(prop==contador){
					  		var image_url_thumb = '/uploads/images/'+data[prop].image_data.id_actividad+'/thumbs/'+data[prop].image_data.filename.substring(0,data[prop].image_data.filename.length-4)+'_thumb_pequeno'+data[prop].image_data.filename.substring(data[prop].image_data.filename.length-4);
							$('.carrito-list').append('<div class="carrito-list-item carrito-list-item-'+(prop)+'"><img class="fotografia-img" data-fotografia-id="'+data[prop].image_data.id+'" src="'+image_url_thumb+'" /><div class="fotografia-detalle"><p><strong>ID de fotografía: </strong>'+data[prop].imageid+'<br /><strong>Cantidad: </strong>'+data[prop].cantidad+'<br /><strong>Tamaño: </strong> '+data[prop].tamano_string+'<br /></p></div></div>');
						}
					  
					}
					
				}

			})
		});

	});
})(jQuery);