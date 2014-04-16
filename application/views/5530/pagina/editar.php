<div class="enquadraAlinhascroll">
	<div class="col-first">
		<h1><?php echo $TITULOINTERNO; ?></h1>
		<h5><?php echo $SUBTITULO; ?></h5>
	</div>

	<div class="alinhaCem">
		<div class="col-one">
			
			<?php 

				$attributes = array('class' => 'form', 'name' => 'form' , 'onsubmit' => 'return validar(this);');
				echo form_open('wbadmin/pagina/alterar/'.$IDALTERA, $attributes); 

			?>
				<div class="alinhaCem">
					<div class="uncol-two">
						<label class="form-label">Nome da página: <span class="label-required">*</span></label>
						<input value="<?php echo $page_titulo; ?>" class="form-input-two required" type="text" name="page_titulo" placeholder="Digite o nome da página">
					</div>

					<div class="uncol-two">
						<label class="form-label">Ordem da página: <span class="label-required">*</span></label>
						<input value="<?php echo $page_ordem; ?>" class="form-input-two required" type="text" name="page_ordem" >
					</div>
				</div>

				
				<div class="alinhaCem">
					<div class="uncol-two">
						<label class="form-label">Sub página de: <span class="label-required">*</span></label>
						<select name="page_sub" class="form-select-two">
							<option value="0">Nenhuma</option>
							<?php echo $select; ?>
						</select>
					</div>

					<div class="uncol-two">
						<label class="form-label">Esta página abre um link externo?</label>
						<input value="<?php echo $page_linkfora; ?>" class="form-input-two" type="text" name="page_linkfora" >
					</div>

					
				</div>

				<div class="alinhaCem">
							<div class="uncol-one">
								<label class="form-label">HTML da página: <span class="label-required">*</span></label>
								<div class="alinhaCem">
								 	<textarea class="" name="page_html" id="noticia"><?php echo $page_html; ?></textarea>
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