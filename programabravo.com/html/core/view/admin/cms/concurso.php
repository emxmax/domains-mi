<?php
if(!isset($oItem->media['imagen'])) $oItem->media['imagen']=NULL;
if(!isset($oItem->parameter['empleado'])) $oItem->parameter['empleado']=NULL;
if(!isset($oItem->parameter['gerencia'])) $oItem->parameter['gerencia']=NULL;
?>
<script type="text/javascript">
$(document).ready(function() {
	CMSFileManager('imagen', {title: 'Seleccione una imagen', groupID:  <?php echo $media_group["concurso_foto"];?>, fileExt: '*.jpg;*.gif;*.png'} ); //'userfiles/cms/concurso/foto/'
});
</script>
                      <tr>
                        <td>Imagen</td>
                      <td><input name="media[imagen]" type="text" class="hidden" id="imagen" value="<? echo $oItem->media['imagen']['Id']; ?>"></td>
                      </tr>
                      <tr>
                        <td>De</td>
                        <td><input type="text" name="parameter[empleado]" id="empleado" value="<? echo $oItem->parameter['empleado']; ?>" size="50" />
						</td>
                      </tr>
                      <tr>
                        <td>Mundo</td>
                        <td><input type="text" name="parameter[gerencia]" id="gerencia" value="<? echo $oItem->parameter['gerencia']; ?>" size="50" />
						</td>
                      </tr>
