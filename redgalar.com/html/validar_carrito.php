<?php
	if (isset($_POST['submit'])) {
		if (empty($fecha)) {
			echo "<p class='error'>* Por favor complete el formulario";
		}else{
			if (empty($hora)) {
				echo "<p class='error'>* Por favor complete el formulario";
			}else{
				if (empty($distrito)) {
					echo "<p class='error'>* Por favor complete el formulario";
				}else{
					if (empty($distrito)) {
						echo "<p class='error'>* Por favor complete el formulario";
					}else{
						if (empty($email)) {
							echo "<p class='error'>* Por favor complete el formulario";
						}else{
							if (empty($direccion)) {
								echo "<p class='error'>* Por favor complete el formulario";
							}
							else{
								if (empty($per_referencia)) {
									echo "<p class='error'>* Por favor complete el formulario";
								}else{
									if (empty($telf_contacto)) {
										echo "<p class='error'>* Por favor complete el formulario";
									}else{
										if (empty($mi_telf)) {
											echo "<p class='error'>* Por favor complete el formulario";										
										}else{
											if (empty($persona_contacto)) {
												echo "<p class='error'>* Por favor complete el formulario";
											}else{
												if (empty($comentarios_conduc)) {
													echo "<p class='error'>* Por favor complete el formulario";
												}
											}
										}
									}
								}
							}
						}
					}
				}
			}
		}		
	}
?>
