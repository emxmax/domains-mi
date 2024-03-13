<?php
class Carrito
{
    private $A_carrito;
    private $total;
    
    public function __construct()
    {
        $this->A_carrito = array();
    }

    public function __get($value)
    {
        switch ($value)
        {

            case 'contenidos':
                return $this->A_carrito;
                brake;
    
            case 'esVacio':
                return (count($this->A_carrito) == 0);
                break;
    
            case 'totalElementos':
                return count($this->A_carrito);
                break;
    
            case 'totalCantidad':
                $total=0;
                foreach($this->A_carrito as $id=>$cantidad) $total+= $this->A_carrito[$id]['cantidad'];
                return $total;
                break;

         }
    }

    public function agregar($pos,$cantidad = 1,array $datos)
    {
        if (!$cantidad)
        {
            $this->eliminar($pos);
        }
        else
        {
            $this->A_carrito[$pos]['id'] = $pos;
            $this->A_carrito[$pos]['cantidad']= $cantidad;
            $this->A_carrito[$pos]['talla'] = $datos[0];
            $this->A_carrito[$pos]['color'] = $datos[1];
        }
        
    }
    
    public function actualizar($pos,$cantidad)
    {
        if (!$cantidad)
        {
            $this->eliminar($pos);
        }
        else
        {
            $this->A_carrito[$pos]['cantidad']= $cantidad;
        }
        
    }

    public function cantidadElemento($pos)
    {
        if (!isset($this->A_carrito[$pos]['cantidad']))
        {
            return 0;
        }
        else
        {
            return $this->A_carrito[$pos]['cantidad'];
        }
    }

    public function eliminarTodo()
    {
        $this->A_carrito = array();
    }


    public function eliminar($pos)
    {
        unset($this->A_carrito[$pos]);
    }

}
?>
