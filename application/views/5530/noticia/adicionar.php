<div class="enquadraAlinhascroll">
	<div class="col-first">
		<h1><?php echo $TITULOINTERNO; ?></h1>
		<h5><?php echo $SUBTITULO; ?></h5>
	</div>

	<div class="alinhaCem">
		<div class="col-one">
			
			<?php 

				$attributes = array('class' => 'form', 'name' => 'form' , 'onsubmit' => 'return validar(this);');
				echo form_open_multipart('wbadmin/noticia/add/', $attributes); 

			?>
				<div class="alinhaCem">
					<div class="uncol-two">
						<label class="form-label">Titulo: <span class="label-required">*</span></label>
						<input class="form-input-two required" type="text" name="noticia_titulo" placeholder="Digite um titulo">
					</div>

					<div class="uncol-two">
						<label class="form-label">Data: <span class="label-required">*</span></label>
						<input class="form-input-two required datepicker" type="text" name="noticia_data" >
					</div>
				</div>

				<div class="alinhaCem">
					<div class="uncol-one">
						<label class="form-label">Imagem de capa: <span class="label-required">*</span></label>
						<input type="file" name="userfile" class="input-file required">
					</div>

					
				</div>

				<div class="alinhaCem">
					<div class="uncol-one">
						<label class="form-label">Descrição curta: <span class="label-required">*</span></label>
						<textarea rows="7" class="form-textarea required" name="noticia_temp"></textarea>
					</div>

					
				</div>

				<div class="alinhaCem">
							<div class="uncol-one">
								<label class="form-label">Notícia: <span class="label-required">*</span></label>
								<div class="alinhaCem">
								 	<textarea class="" name="noticia_descricao" id="noticia"></textarea>
								</div>
							</div>
						</div>

				<div class="alinhaCem">
					<div class="uncol-one">
						<button type="submit" class="button-green">Enviar</button>
					</div>
				</div>

			</form>
			
		</div>
		
	</div>

</div>

<script type="text/javascript">
			//<![CDATA[

				CKEDITOR.replace( 'noticia',
					{
						skin : 'kama',
						

					});
					CKEDITOR.config.toolbar = [
   ["Source"],
 ["Bold","Italic","Underline","StrikeThrough","-","Undo","Redo","-","Cut",
"Copy","Paste","PasteText","PasteFromWord","Find","Replace","-",
"Outdent","Indent","NumberedList","BulletedList"],
   ["-","JustifyLeft","JustifyCenter","JustifyRight","JustifyBlock"],
   ["Image","Table","-","Link","TextColor","FontSize"],
 ];


			//]]>
			</script>