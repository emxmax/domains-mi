<label>Seleccionar estado</label>
<div class="">
	<select class="form-control" id="pe_estado">
	<?php 
		foreach($estados as $ee){
			if($ee["es_name"]==$_POST["e"]){
			?>
				<option value="<?php echo $ee['es_id']?>" selected><?php echo utf8_encode($ee["es_name"])?></option>
			<?php
			}
			else{
			?>
				<option value="<?php echo $ee['es_id']?>"><?php echo utf8_encode($ee["es_name"])?></option>
			<?php
			}
		}
	?>
	</select>
	<input type="hidden" id="id_p" name="id_p" value="<?php echo $_POST["id"]?>">
	<div class="actualizar_e" style="display:none;margin-top: 2px;color: #e32a34;font-size: 13px;">Se actualizara el estado de todos los productos que contiene el pedido</div>
 </div>