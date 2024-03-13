<?php

class Url{

    private $perfil;
    private $site;
    private $db;

    public function __construct($db,$site){
        $this->db=$db;
        $this->site=$site;
    }

    public function prepararUrl($cadena){

        $tabla = array('Š'=>'S', 'š'=>'s', 'Đ'=>'Dj', 'đ'=>'dj', 'Ž'=>'Z', 'ž'=>'z', 'Č'=>'C', 'č'=>'c', 'Ć'=>'C', 'ć'=>'c','À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E','Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O','Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss','à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e','ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o','ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b','ÿ'=>'y', 'Ŕ'=>'R', 'ŕ'=>'r');
        $cadena= strtr($cadena, $tabla);
        $patron = '#[^-a-zA-Z0-9_ ]#';
        $cadena = preg_replace($patron, '', strtolower($cadena));
        $cadena = trim($cadena);
        $cadena = preg_replace('#[-_ ]+#', '-', $cadena);

        return $cadena;

    }

    public function crearUrlSeo($perfil,$tipo=0,array $datos){
        $seccion = $datos['seccion'];

        if($tipo==0){
            $url = $this->site .'/'.$seccion.'/'.$perfil;

        }else if($tipo==1){
            $url = $this->site .'/'.$seccion.'/'.$perfil . '-'.$datos['id'];
            if(isset($datos['id_paginador'])) $url= $url. '-'.$datos['id_paginador'];
            if(isset($datos['nombre_detalle'])) {
                $nombre1 = $this->prepararUrl($datos['nombre_detalle']);
                $url= $url. '/'.$nombre1;
            }

        }else if($tipo==2){
            $nombre1 = $this->prepararUrl($datos['nombre_detalle']);
            $url = $this->site .'/'.$seccion.'/'.$perfil . '-' .$datos['id']. '-' .$datos['id_detalle']. '/' . $nombre1;

        }else if($tipo==3){
            $nombre1 = $this->prepararUrl($datos['nombre_detalle']);
            $url = $this->site .'/'.$seccion.'/'.$perfil . '-' .$datos['id']. '-' .$datos['id_detalle']. '-' . $datos['id_subdetalle']. '/' .$nombre1;

        }else if($tipo==4){
            $url = $this->site .'/'.$seccion.'/'.$perfil . '-' .$datos['id_registro'];

        }else if($tipo==5){
            $url = $this->site .'/'.$seccion.'/'.$perfil . '-' .$datos['id']. '-' .$datos['id_detalle'];
            if(isset($datos['id_paginador'])) $url= $url. '-'.$datos['id_paginador'];
            if(isset($datos['nombre_detalle'])) {
                $nombre1 = $this->prepararUrl($datos['nombre_detalle']);
                $url= $url. '/'.$nombre1;
            }

        }else if($tipo==6){
            $url = $this->site .'/'.$seccion.'/'.$perfil . '-' .$datos['id']. '-' .$datos['id_detalle']. '-' . $datos['id_subdetalle'];
            if(isset($datos['id_paginador'])) $url= $url. '-'.$datos['id_paginador'];
            if(isset($datos['nombre_detalle'])) {
                $nombre1 = $this->prepararUrl($datos['nombre_detalle']);
                $url= $url. '/'.$nombre1;
            }

        }else if($tipo==7){
            $url = $this->site .'/'.$perfil;

        }

        return $url;
    }

    /*private function datoContenido($db,$p,$id){
        return $db->categorias[array("id"=>$id,"perfil"=>$p)]["elemento_cod_mod"];
        //echo $this->db->categorias[array("id"=>$id,"perfil"=>$p)]["elemento_cod_mod"];
        //return $this->db->categorias()->where(array("id"=>$id,"perfil"=>$p));
        //return $db->categorias(array("id"=>$id,"perfil"=>$p));
        //var_dump($db);
    }*/

    public function tipoContenido($tipo,$url,$titulo,$id,$padre,$nivel,$p,$elemento_cod_mod){

        $seo_url="";

        if($tipo==0){

            $url = explode(".", $url);

            if($nivel > 1) {
                $datos_seo = array("seccion" => $url[0],"id" => $padre,"id_detalle" => $id , "nombre_detalle" => $titulo);
                $seo_url = $this->crearUrlSeo($p, 2,$datos_seo);
            }else{
                $datos_seo = array("seccion" => $url[0],"id" => $id, "nombre_detalle" => $titulo);
                $seo_url = $this->crearUrlSeo($p, 1,$datos_seo);
            }

        }else if($tipo==1){

            $seo_url = $url;

        }else if($tipo==2){

            $seo_url = "";

        }else if($tipo==3){

            $url = explode(".", $url);
            $datos_seo = array("seccion" => $url[0],"id" => $id);
            $seo_url = $this->crearUrlSeo($p, 1,$datos_seo);

        }else if($tipo==4){

            $url = explode(".", $url);

            if($elemento_cod_mod!=null){
                $datos_seo = array("seccion" => $url[0],"id" => $id,"nombre_detalle" => $titulo);
            }else{
                $datos_seo = array("seccion" => $url[0],"id" => $id);
            }

            $seo_url = $this->crearUrlSeo($p, 1,$datos_seo);

            /*$url = explode(".", $url);
            $datos_seo = array("seccion" => $url[0],"id" => $id);
            $seo_url = $this->crearUrlSeo($p, 1,$datos_seo);*/

        }else if($tipo==5){

            $url = explode(",", $url);
            $seo_url = $this->site.$url[1];

        }

        return $seo_url;
    }

};


?>