<?php
$userAdmin=AdmLogin::getUserSession();
?>
  <h2>Bienvenido al M&oacute;dulo de Administraci&oacute;n</h2>
<p>
  En la siguiente lista se muestran todos los m&oacute;dulos del sistema. Estas opciones tambi&eacute;n estar&aacute;n disponibles en el men&uacute; superior.<br />
  Recuerde que en las p&aacute;ginas interiores s&oacute;lo se podr&aacute; acceder usando el menu superior.<br />
  <br />
</p>

<table id="tblPanel" cellpadding="0" cellspacing="2" border="0" width="600">
<tr>
<?php
	$lMenu=AdmMenu::getList_ParentMenu(0, $userAdmin["userMenu"] );
	foreach($lMenu as $oMenu){
		$menuID=$oMenu->menuID;
		$menuName=$oMenu->menuName;
		
		$lSMenu=AdmMenu::getList_ParentMenu($menuID, $userAdmin["userMenu"] );
		if($lSMenu->getLength()==0) continue;
?>
	<td valign="top" class="tdPanel">
		<div style="padding:5px;" class="divHeader">
			<span style="font-weight:bold;"><?php echo $menuName;?></span>
		</div>
        <table cellpadding="0" cellspacing="0" border="0" width="100%">
			        <tr><td valign="top">
			<?php
			foreach($lSMenu as $oSMenu){
				$submenuID=$oSMenu->menuID;
				$menuName =$oSMenu->menuName;

				$lModulo=AdmModule::getList_UserModule($submenuID, $userAdmin["userModule"] );
				if($lModulo->getLength()==0) continue;
			?>
                <div style="padding:10px 10px 5px 10px;">
                  <span style="font-weight:bold;"><?php echo $menuName;?></span>
                    <br />
                    <table cellpadding="2" cellspacing="0" border="0" width="100%">
					<tr>
						<td style="padding-left: 10px;">
						<?php
                        foreach($lModulo as $oModule){
                            $moduleID	=$oModule->moduleID;
							$moduleName	=$oModule->moduleName;
							$moduleURL="index.php?moduleID=$moduleID".($oModule->moduleParams!="" ? ("&".$oModule->moduleParams) : "");
                        ?>
                        <div style="padding-bottom: 3px;">
                        <a href="<?php echo $moduleURL;?>"><?php echo $moduleName;?></a>
                        </div>
						<?php
                            }
                        ?>
                        </td></tr>
                    </table>
                </div>
				<br />
			<?php
                }
            ?>
                    </td></tr>
        </table>
	</td>
<?php
	}
?>
</tr>
</table>
