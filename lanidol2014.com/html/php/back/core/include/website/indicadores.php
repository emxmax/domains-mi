<?php
$fileInd='../userfiles/cotizaciones/Indices.txt';
$arr_valor=array('IGBVL', 'ISBVL', 'INCA');
$arr_ind=array();

$f_info=file_get_contents($fileInd); //Actualizado x ftp
$fecha_last=file_exists($fileInd)? date ("H:i:s", filemtime($fileInd)): '';

if($f_info){
	$arr_tmp=explode("\n", $f_info);
	foreach($arr_tmp as $row){
		$tmp_row	=explode("|", $row);
		if($row=='' || !in_array($tmp_row[1], $arr_valor)) continue;
		$indice		=$tmp_row[1];
		$ultima		=$tmp_row[5];
		$var		=floatval($tmp_row[6]);
		$arr_ind[]	=array($indice, $ultima, $var);
	}
}
//var_dump($arr_ind);
foreach($arr_cotiza as $row){
	if(!$row['indice']) continue;
    $valor		=$row[0];
    $ultima		=$row[6];
    $var		=$row[19];
	$arr_ind[]	=array($valor, $ultima, $var);
}

$url_cotiza='#';
$lCotiza=CmsContentLang::getWebList_Scheme(30, $PAGE->langID, $PAGE->minisiteID);
if($lCotiza->getLength()>0){
	$oItem=$lCotiza->getItem(0);
	$url_cotiza=SEO::get_URLContent($oItem);
}

$divInfo =(isset($oSectionLang) || isset($oContentLang))? "section-info-int": "section-info";
?>
<!-- section-info -->
<script type="text/javascript">
$(document).ready(function(){
	$('marquee').marquee('pointer').mouseover(function () {
		$(this).trigger('stop');
	}).mouseout(function () {
		$(this).trigger('start');
	}).mousemove(function (event) {
		if ($(this).data('drag') == true) {
			this.scrollLeft = $(this).data('scrollX') + ($(this).data('x') - event.clientX);
		}
	}).mousedown(function (event) {
		$(this).data('drag', true).data('x', event.clientX).data('scrollX', this.scrollLeft);
	}).mouseup(function () {
		$(this).data('drag', false);
	});
	$('#info-buscar a').click(function(){
		SearchQute();
	});
	$('#quote').keypress(function(e) {
		if(e.which == 13) SearchQute();
	});
	function SearchQute(){
		var url='<?php echo $url_cotiza;?>';
		location.href= url+'?valor='+$('#quote').val();
	}
});
</script>
<div class="<?php echo $divInfo;?>">
	<div class="section">
    	<div id="info-buscar"><a href="#"><img src="<?php echo $URL_BASE;?>images/lupa.png" /></a><input id="quote" placeholder="Quotes" /></div>
        <div id="indicadores">
        <marquee behavior="scroll" scrollamount="2" direction="left" width="750">
        <table border="0" cellspacing="0" cellpadding="5">
          <tr>
<?php
$nrows=count($arr_ind);
$i=0;
foreach($arr_ind as $row){
$indice	=$row[0];
$ultima	=$row[1];
$var	=$row[2];

$css_indica=($i==0)? 'primero': ((($i+1)==$nrows) ? 'ultimo' :'normal');
$css_mov=($var>0)? 'verde': (($var<0)? 'rojo': 'raya');
$var_lbl=($var>0)? '+': '';
?>
        	<td nowrap>
          <div class="<?php echo $css_mov;?> indicador-<?php echo $css_indica;?>">
                <span class="indicador-normal"><?php echo $indice.' '.$ultima;?></span><br>
                <span>(<?php echo $var_lbl.number_format($var, 2);?>%)</span>
            </div>
            </td>
<?php
$i++;
}
?>
		  </tr>
    	</table>
        </marquee>
    	</div>
    </div>
</div>
<!-- section-cotizaciones -->
<div class="section-cotizaciones">
	<div class="section">
    	<div class="cotizacion">
        	<span>Información actualizada cada 20 minutos. Última actualización <?php echo $fecha_last;?></span>
        </div>
	</div>
</div>