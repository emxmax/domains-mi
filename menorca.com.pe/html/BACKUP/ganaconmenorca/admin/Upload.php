<?php
/* 
	Autor: Carlos Augusto Espinoza Galarza
	Descripcion: Generamos la clase Upload con la cual podemos subir cualquier archivo 
	a nuestro servidor incluso con caracteres extraños
	Fecha: 28/02/2009
	
*/ 
class Upload{
    private $ruta_carpeta; //--> el lugar en donde vamos a guardar las imagenes 'admin/img/modelo/'
    private $name; //--->nombre del archivo que vamos a guardar ej.: miimagen.jpg
    private $new_name; //-->nombre único que generamos y está limpio de caracteres extraños para guardar en la Base de datos
    private $nameMD5; //-->nombre para encriptar la ruta de la imagen
    /***En esta parte pasamos los valores a nuestras variables para luego hacer todo el proceso***/
    public function setRouteFolder($valor=NULL){
        $this->ruta_carpeta = $valor;
    }
    public function setName($valor=NULL){
       $this->name = $valor;
    }
    public function getNameFileUpload(){
        return $this->new_name;
    }
    public function getFolderUpload(){
        return $this->ruta_carpeta;
    }
    private function generateUniqueFileUpload(){
        $cadena = $this->name; //borramos los caracteres extraños y espacois en blanco
        $nombre_unico = preg_replace("[^.A-Za-z0-9]", "", $cadena);//pasamos todo el nombre a minusculas
        $nombre_unico = strtolower($nombre_unico);//finalmente genero el nombre único de la imagen
        $nombre_final = substr(md5(uniqid(rand())),0,6)."_".$nombre_unico;
        $this->new_name = $nombre_final;
        return  $nombre_final;
    }
    private function generateNameFileUpload(){
        $cadena = $this->name;//borramos los caracteres extraños y espacios en blanco
        $nombre_archivo  = $this->reemplazar($cadena);//pasamos todo el nombre a minusculas
        $nombre_archivo = strtolower($nombre_archivo); //finalmente genero el nombre único de la imagen
        $this->new_name = $nombre_archivo;
        return  $nombre_archivo;
    }
    /*
     funcion que nos ayda ala encriptacion del nombre del file
    */
    public function getNameFileMD5(){
        $fileNameMD5 = md5($this->getNameFileUpload());
        $this->nameMD5 = $fileNameMD5;
        return $this->nameMD5;
    }
    public function copyFile($pathFile=NULL,$pathTarget=NULL,$newName=NULL){
            $separator = DIRECTORY_SEPARATOR;//variable retorno
            $retorno  =  false;//Nombre del Archivo
            $nameFile = substr($pathFile,strrpos($pathFile,$separator)+1,strlen($pathFile));
            $pathFolderFile = substr($pathFile,0,strrpos($pathFile,$separator)+1);//Copiamos el archivo de la ruta inicio a la destino
            if(!empty($newName)){
                //rename :: renombrar un archivo o directorio
                if(rename($pathFolderFile.$nameFile, $pathTarget.$newName)){
                        $retorno = true;
                }
            }else{
                if(copy($pathFile,$pathTarget.$nameFile)){
                        $retorno = true;
                }
            }
            //Devolvemos el valor de retorno
            return $retorno;
    }
    public function moveFile($pathFile,$pathTarget,$newName=""){		
        //variable retorno
        $retorno  =  false;
        //Nombre del Archivo
        $nameFile = substr($pathFile,strrpos($pathFile,'/')+1,strlen($pathFile));
        $pathFolderFile = substr($pathFile,0,strrpos($pathFile,'/')+1);
        //Copiamos el archivo de la ruta inicio a la destino
        if(!empty($newName)){
            //rename :: renombrar un archivo o directorio
            if(rename($pathFolderFile.$nameFile, $pathTarget.$newName)){
                    $retorno = true;
            }
        }else{
            if(copy($pathFile,$pathTarget.$nameFile)){
                    //eliminamos el archivo copiado
                    unlink($pathFile);
                    $retorno = true;
            }
        }
        //Devolvemos el valor de retorno
        return $retorno;
    }
    public function removeFolder($pathFolder){
        //ELIMINAR UN DIRECTORIO
        rmdir($pathFolder);
    }
    /************Eliminamos el archivo del Servidor *********************************************/
    public function deleteFileUpload($nomb_archivo=NULL){
        $ruta = $this->ruta_carpeta; 
        if (file_exists($ruta."/".$nomb_archivo) and (!empty($nomb_archivo))){
            unlink($ruta."/".$nomb_archivo);
        }
    }
    /************Verificamos si el archivo existe en el servidor ********************************/
    public function validateExistsFile($nomb_archivo=NULL){
        $existe = 0; // 0--> no existe; 1-->existe
        $ruta = $this->ruta_carpeta;
        if (file_exists ($ruta."/".$nomb_archivo) and (!empty($nomb_archivo)))
                $existe = 1;
        return $existe;
    }   
    public function Upload($temporal=NULL,$detener_upload=NULL){
        $ruta = $this->ruta_carpeta;
        $archivo = $this->generateUniqueFileUpload();
        if (file_exists($ruta."/".$archivo)){
            return "existe";
        }else{
            move_uploaded_file($temporal,$ruta."/".$archivo);
        }
    }
    public function createFolder($name,$mode = 0777){
        //return $this->ruta_carpeta;
        $path = $this->ruta_carpeta.'/'.$name;
        //return $path;
        mkdir($path, $mode);
        return $path;
    }
    public function getFileListInFolder($directoryPath){
        $directorio=opendir($directoryPath);
        $listFiles = array();
        while ($archivo = readdir($directorio)){
            if($archivo != "." && $archivo != ".." ){
                $arrayFile = array();
                //$objFile = fopen ($directoryPath."/".$archivo,'r');
                $size = filesize ($directoryPath."/".$archivo);
                $type = filetype($directoryPath."/".$archivo);
                $extension = substr($archivo,strrpos($archivo,'.'),strlen($archivo));
                $name = substr($archivo,0,strrpos($archivo,'.'));
                $arrayFile['archivo'] = $archivo;
                $arrayFile['size'] = $size;
                $arrayFile['type'] = $type;
                $arrayFile['name'] = $name;
                $arrayFile['extension'] = $extension;
                //fclose($objFile);
                $listFiles[] = $arrayFile;
            }
        }
        closedir($directorio);
        return $listFiles;
    }
    /**
     * Create a directory structure recursively
     *
     * @author      Aidan Lister <aidan@php.net>
     * @version     1.0.2
     * @link        http://aidanlister.com/2004/04/recursively-creating-directory-structures/
     * @param       string   $pathname    The directory structure to create
     * @return      bool     Returns TRUE on success, FALSE on failure
     */
    public function mkdirr($pathname, $mode = 0777){
        // Check if directory already exists
        if (is_dir($pathname) || empty($pathname)){
            return true;
        }
        // Ensure a file does not already exist with the same name
        $pathname = str_replace(array('/', ''), DIRECTORY_SEPARATOR, $pathname);
        if (is_file($pathname)){
            trigger_error('mkdirr() File exists', E_USER_WARNING);
            return false;
        }
        // Crawl up the directory tree
        $next_pathname = substr($pathname, 0, strrpos($pathname, DIRECTORY_SEPARATOR));
        if (mkdirr($next_pathname, $mode)) {
            if (!file_exists($pathname)) {
                return mkdir($pathname, $mode);
            }
        }
        return false;
    }
}
?>