


  	<script src="<?php echo base_url(); ?>pub/js/jquery-3.1.0.min.js"></script>
  	<script src="<?php echo base_url(); ?>pub/js/dropzone.min.js"></script>
  	<script src="<?php echo base_url(); ?>pub/js/jquery.colorbox-min.js"></script>

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
  		
		<noscript><div class="noscript">Para disfrutar de una experiencia completa, active JavaScript en el navegador.</div></noscript>
	</body>
</html>