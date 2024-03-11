<div class="captcha">
	<?php
		require_once('recaptcha/recaptcha/recaptchalib.php');
		//$publickey = "6LfMnAwTAAAAAFNzFXdT23UHDhdgep_ggZ6wT1Zx";
		//$privatekey = "6LfMnAwTAAAAAG_brcdl-_PVKynFB8uqBrTe9A1A";
		$publickey = "6LfMnAwTAAAAAFNzFXdT23UHDhdgep_ggZ6wT1Zx";
		$privatekey = "6LduXRETAAAAADsDBsF2aII_K62l5QJbJ67pk4CP";
		$error = null;
		echo recaptcha_get_html($publickey, $error);
	?>
</div>