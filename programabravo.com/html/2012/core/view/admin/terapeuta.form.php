<?php
include("../core/include/admin/empleado_ficha.php");
?>
<script type="text/javascript">
function GetBackTo(){
	BackTo('log')
}
</script>
<input type="hidden" id="gerencia" name="gerencia" value="<?php echo $oItem->gerencia; ?>">
<input type="hidden" id="contentID" name="contentID" value="<?php echo $oItem->contentID; ?>">
