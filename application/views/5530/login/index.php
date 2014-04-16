<div class="login">
		<div class="alinhaCem back-login">
			<div class="login-title"><img class="logo-img" width="23px" src="<?php echo base_url('assets/images/logo.png'); ?>"> <?php echo NAME_CLIENT; ?></div>

			<?php 
				echo form_open('wbadmin/login/logar', array('class' => 'form-login', 'name' => 'login', 'onsubmit' => 'return validar(this);')); ?>
				<h3>Digite seu login e senha</h3>
				<label class="login-label">
					<div class="login-img"><img src="<?php echo base_url('assets/images/login.png'); ?>"></div><input type="text" name="email" maxlength="100" placeholder="E-mail" class="login-input required">
				</label>
				
				<label class="login-label">
					<div class="login-img"><img src="<?php echo base_url('assets/images/password.png'); ?>"></div><input type="password" name="pass" maxlength="20" placeholder="Senha" class="login-input required">
				</label>

				<button type="submit" class="login-submit">Logar</button>

			</form>
		</div>
	</div>

