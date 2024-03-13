<script src="js/vistas/Pagina.js" type="text/javascript"></script>
<ul id="myTab" class="nav nav-pills nav-justified">
   <li id="opRepPagina" class="active"><a href="#reportePagina" data-toggle="tab">Reporte</a></li>
   <li id="opNewPagina"><a href="#nuevaPagina" data-toggle="tab">Nuevo</a></li>
</ul>
<div id="myTabContent" class="tab-content">
   <div class="tab-pane fade in active" id="reportePagina">
      	<table id="tblPagina" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
			<thead>
				<tr>
				    <th width="40">Item</th>
				    <th width="40">Código</th>
				    <th>Título</th>
				    <th>Item-Menú</th>
				    <th width="70">Acciones</th>
				</tr>
			</thead>
			<tbody>
				                				                    
			</tbody>
		</table>
   </div>
   <div class="tab-pane fade" id="nuevaPagina">
		<div class="form-horizontal" role="form">                     
            <div class="panel panel-primary">
                <div class="panel-heading">Datos</div>
                <div class="panel-body" id="panelChecks">
                    <div class="form-group">
                        <label for="txtTituloPagina" class="col-sm-1 control-label">Título</label>
                        <div class="col-sm-11">
                            <input type="text" class="form-control mayus" id="txtTituloPagina">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-1 control-label" for="lstItemMenu">Item Menú</label>
                    	<div class="col-sm-11">
                            <select class="form-control" id="lstItemMenu">

                            </select>
                        </div>
                    </div>
                    <div class="row botonera">
                    	<button type="button" class="btn btn-primary" id="btnGrabarPagina">Grabar</button>
                		<button type="button" class="btn btn-info limpiar" id="btnLimpiarPagina" data-section="nuevaPagina">Limpiar</button>
                    </div>                                                             
                </div>
            </div>
        </div>
   </div>
</div>
<script>
	var page=new Pagina();
	$(function(){
		page.iniciar();
	})
</script>