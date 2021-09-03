<?php
class metodoPago
{
    // se crean conctates para saber el estado de un pedido
    public $efectivo = 1;
    public $wompi = 2;
    // se cambian las constantes a texto para que el usuario vea 
    public $desc_efectivo = "efectivo";
    public $desc_wompi = "Wompi";
    public function descripcioDePago($metodo)
    {
        switch ($metodo) {
                
            case $this->efectivo:
                return $this->desc_efectivo;
                break;
            case $this->wompi:
                return $this->desc_wompi;
                break;
        }
    }
}
