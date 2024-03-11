<header>
	<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><?php echo "Hola: " . $_SESSION['nombre'];?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="visible-xs hidden-sm"><a href="<?php echo $urladmin;?>index.php">Boletines y Anuncios</a></li>
            <li class="visible-xs hidden-sm"><a href="<?php echo $urladmin;?>mod-documentos">Documentos Importantes</a></li>
            <li class="visible-xs hidden-sm"><a href="<?php echo $urladmin;?>mod-anexo">Anexos de Documentos</a></li>
            <li class="visible-xs hidden-sm"><a href="<?php echo $urladmin;?>mod-usuario">Usuarios</a></li>
            <li>
			<?php 
				if(isset($_SESSION['user'])){
					echo "<a href='" . $urladmin . "logout.php'>Cerrar Sesión</a>";
				}else{
					header("Location:" . $urladmin . "logout.php");
			}?>
			</li>
          </ul>
        </div>
      </div>
    </nav>
</header>