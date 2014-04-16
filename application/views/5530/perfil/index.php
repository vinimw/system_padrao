<div class="enquadraAlinhascroll">
	<div class="col-first">
		<h1><?php echo $TITULOINTERNO; ?></h1>
		<h5><?php echo $SUBTITULO; ?></h5>
	</div>

	<div class="alinhaCem">
		<div class="col-one">
			
			<?php 

				$attributes = array('class' => 'form', 'name' => 'form' , 'onsubmit' => 'return validar(this);');
				echo form_open('wbadmin/perfil/alterar/', $attributes); 

			?>
			

				<div class="alinhaCem">
					<div class="uncol-one">
						<label class="form-label">Nome Completo: <span class="label-required">*</span></label>
						<input class="form-input-one required" type="text" value="<?php echo $NOME; ?>" name="nome" placeholder="Digite um nome">
					</div>
				</div>

				<div class="alinhaCem">
					<div class="uncol-two">
						<label class="form-label">E-mail: <span class="label-required">*</span></label>
						<input class="form-input-two required" value="<?php echo $EMAIL; ?>" type="text" name="email" placeholder="Digite um email">
					</div>

					<div class="uncol-two">
						<label class="form-label">Senha:</label>
						<input class="form-input-two" type="password" name="pass" placeholder="Digite uma senha">
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