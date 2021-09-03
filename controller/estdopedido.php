<?php
class estadoPedido
{
    // se crean conctates para saber el estado de un pedido
    public $reserva = 1;
    public $procesoDePago = 2;
    public $pago = 3;
    public $procesoDeEntrega = 4;
    public $entregado = 5;
    public $cancelado = 6;
    // se cambian las constantes a texto para que el usuario vea 
    public $desc_reserva = "Reserva";
    public $desc_procesoDePago = "Preceso de pago";
    public $desc_pago = "Pago";
    public $desc_procesoDeEntrega = "proceso de entrega";
    public $desc_entregado = "Entregado";
    public $desc_cancelado = "Cancelado";

    public function descripcioDeEstado($estado)
    {
        switch ($estado) {
                // se llama la constante del estado por ejemplo se llama 1 y se devuelve reserva 
            case $this->reserva:
                return $this->desc_reserva;
                break;
            case $this->procesoDePago:
                return $this->desc_procesoDePago;
                break;
            case $this->pago:
                return $this->desc_pago;
                break;
            case $this->procesoDeEntrega:
                return $this->desc_procesoDeEntrega;
                break;
            case $this->entregado:
                return $this->desc_entregado;
                break;
            case $this->entregado:
                return $this->desc_entregado;
                break;
            case $this->cancelado:
                return $this->desc_cancelado;
                break;
        }
    }
}
