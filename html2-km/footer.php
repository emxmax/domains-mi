 <footer class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-3">
                        <h4>INNOVACIÓN</h4>
                        <hr>
                        <?php
                            for ($i = 0; $i < $nInno; $i++) {
                                $no_titulo = mysql_result($rsInno, $i, "no_titulo");
                                $no_url = mysql_result($rsInno, $i, "no_url");
                        ?> 
                        <a href="<?php echo $url."noticias/".$no_url;?>"><p><?php echo $no_titulo;?></p></a>
                        <?php } ?>
                    </div>
                    <div class="col-lg-3 col-sm-3">
                        <h4>INDUSTRIA DEL GAS</h4>
                        <hr>
                        <?php
                            for ($i = 0; $i < $nIndus; $i++) {
                                $no_titulo = mysql_result($rsIndus, $i, "no_titulo");
                                $no_url = mysql_result($rsIndus, $i, "no_url");
                        ?> 
                        <a href="<?php echo $url."noticias/".$no_url;?>"><p><?php echo $no_titulo;?></p></a>
                        <?php } ?>
                    </div>
                    <div class="col-lg-3 col-sm-3">
                        <h4>SERVICIOS A LA MINERÍA</h4>
                        <hr>
                        <?php
                            for ($i = 0; $i < $nServ; $i++) {
                                $no_titulo = mysql_result($rsServ, $i, "no_titulo");
                                $no_url = mysql_result($rsServ, $i, "no_url");
                        ?> 
                        <a href="<?php echo $url."noticias/".$no_url;?>"><p><?php echo $no_titulo;?></p></a>
                        <?php } ?>
                    </div>
                    <div class="col-lg-3 col-sm-3">
                        <img src="http://www.karlmaslo.pe/img/logo-karl-footer.png"/>
                    </div>
                </div>
            </div>
    <div class="row">
        <hr id="grand-line">
    </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h6>KARLMASLO.PE TODOS LOS DERECHOS RESERVADOS 2016 - <span><a href="">POWERED BY MEDIA IMPACT</a></span></h6>
                    </div>
                </div>
            </div>
        </footer>

        <a href="http://www.beyondsecurity.com/vulnerability-scanner-verification/www.karlmaslo.pe" style="display:none"><img src="https://seal.beyondsecurity.com/verification-images/www.karlmaslo.pe/vulnerability-scanner-2.gif" alt="Website Security Test" border="0" /></a>