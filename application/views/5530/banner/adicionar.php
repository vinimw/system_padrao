<div class="enquadraAlinhascroll">
	<div class="col-first">
		<h1><?php echo $TITULOINTERNO; ?></h1>
		<h5><?php echo $SUBTITULO; ?></h5>
	</div>

	<div class="alinhaCem">
		<div class="col-one">
			
			<?php 

				$attributes = array('class' => 'form', 'name' => 'form' , 'onsubmit' => 'return validar(this);');
				echo form_open_multipart('wbadmin/banner/add/', $attributes); 

			?>
				<div class="alinhaCem">
					<div class="uncol-two">
						<label class="form-label">Nome do banner: <span class="label-required">*</span></label>
						<input class="form-input-two required" type="text" name="banner_nome" placeholder="Digite um titulo">
					</div>

					<div class="uncol-two">
						<label class="form-label">Título do banner: <span class="label-required">*</span></label>
						<input class="form-input-two required" type="text" name="banner_titulo" >
					</div>
				</div>

				<div class="alinhaCem">
					<div class="uncol-two">
						<label class="form-label">Data de entrada: <span class="label-required">*</span></label>
						<input class="form-input-two required datepicker" type="text" name="banner_dataEntra">
					</div>

					<div class="uncol-two">
						<label class="form-label">Data de saída: <span class="label-required">*</span></label>
						<input class="form-input-two required datepicker" type="text" name="banner_dataSai" >
					</div>
				</div>

				<div class="alinhaCem">
					<div class="uncol-two">
						<label class="form-label">Imagem do banner: <span class="label-required">*</span></label>
						<input type="file" name="userfile" class="input-file required">
					</div>

					<div class="uncol-two">
						<label class="form-label">Ordem do banner: <span class="label-required">*</span></label>
						<input class="form-input-two required" type="text" name="banner_ordem" >
					</div>
					
				</div>

				<div class="alinhaCem">
					<div class="uncol-one">
						<label class="form-label">Texto de descrição do banner: <span class="label-required">*</span></label>
						<textarea rows="7" class="form-textarea required" name="banner_descricao"></textarea>
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