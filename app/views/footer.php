</div>
<div class="footer">
	<div class="footer-inner container">
		<div class="w-row">
			<div class="w-col w-col-4">
				<a href="/"><img src="/pub/images/logo-footer-min.png" /></a>
			</div>
			<div class="w-col w-col-4">
				<div class="menu-footer">
				<h2>Menú</h2>
					<ul class="menu-footer-ul">
						<li><a href="/">Inicio</a></li>
						<li><a href="/fotografias/buscar-actividad-codigo">Buscar actividad por código</a></li>
						<li><a href="/contactenos">Contáctenos</a></li>
					</ul>
				</div>
			</div>
			<div class="w-col w-col-4">
				<div class="info-contacto">
					<h2>Información de Contacto</h2>
					<p><strong>Correos: </strong><br /><a href="mailto:info@rochadigital.co.cr">info@rochadigital.co.cr</a>
					<a href="mailto:rochadigital12@gmail.com">rochadigital12@gmail.com</a>
					
					<strong>Teléfonos: </strong><br /><a href="tel:+50688300706">+506 8830 0706</a>
					<a href="tel:+50689516801">+506 8951 6801</a>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="footer-creditos">
	<div class="footer-creditos-inner container">
		<p>Desarrollado por Keylor Mora Garro. Tel: <a href="tel:50686985372">+506 8698 5372</a>. Correo: <a href="mailto:khmg13@gmail.com">khmg13@gmail.com</a></p>
	</div>
</div>


  	<!--<script src="<?php echo base_url(); ?>pub/js/jquery-3.1.0.min.js"></script>-->

  	<?php if ($vista=='inicio'){ ?>
  		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
  		<script src="<?php echo base_url(); ?>pub/js/jquery.bxslider.min.js"></script>
  	<?php }else{ ?>
  		<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  	<?php } ?>
  	<script src="<?php echo base_url(); ?>pub/js/dropzone.min.js"></script>
  	<script src="<?php echo base_url(); ?>pub/js/jquery.colorbox-min.js"></script>
  	<script src="<?php echo base_url(); ?>pub/js/tinynav.min.js"></script>	
  	<script src="<?php echo base_url(); ?>pub/js/global.js"></script>

  
  	<?php if($vista=="admin/contenido/actividades/actividad_form" && $tipo_form=="editar"){ ?>
  		<script>

				Dropzone.autoDiscover = false;
				var myDropzone = new Dropzone("#my-dropzone", {
					url: "<?php echo site_url("actividad/upload/".$result[0]->id) ?>",
					acceptedFiles: "image/*",
					addRemoveLinks: true,
					removedfile: function(file) {
						var name = file.name;

						$.ajax({
							type: "post",
							url: "<?php echo site_url("actividad/remove/".$result[0]->id) ?>",
							data: { file: name },
							dataType: 'html'
						});

						// remove the thumbnail
						var previewElement;
						return (previewElement = file.previewElement) != null ? (previewElement.parentNode.removeChild(file.previewElement)) : (void 0);
					},
					init: function() {
						var me = this;
						$.get("<?php echo site_url("actividad/list_files/".$result[0]->id) ?>", function(data) {
							// if any files already in server show all here
							if (data.length > 0) {
								$.each(data, function(key, value) {
									var mockFile = value;
									me.emit("addedfile", mockFile);
									me.emit("thumbnail", mockFile, "<?php echo base_url(); ?>uploads/images/<?php echo $result[0]->id; ?>/thumbs/" + value.name.substring(0,value.name.length-4)+"_thumb_pequeno"+value.name.substring(value.name.length-4));
									me.emit("complete", mockFile);
								});
							}
						});
					}
				});
		</script>
  	<?php } ?>


  	<?php if($vista=="inicio"){ ?>
  		<script>

			$(document).ready(function(){
			  $('.bxslider').bxSlider({
				  auto: true,
				  autoHover: true,
				  pause: 6000
				});
			});
		</script>
  	<?php } ?>

  
  		
		<noscript><div class="noscript">Para disfrutar de una experiencia completa, active JavaScript en el navegador.</div></noscript>
	</body>
</html>