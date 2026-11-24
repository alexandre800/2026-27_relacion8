<?php
class RegistroTexto{
    
    //Propiedades privadas
    private string $_cadena;
    private DateTime $_fechaHora;

    /**
     * Inicializa las variables, le llega obligatoriamente una
     * cadena como parámetro y a la fecha/hora se le asigna la
     * de hoy
     *
     * @param string $cadena
     */
    public function __construct(string $cadena)
    {
        $this->_cadena=$cadena;
        $this->_fechaHora=new DateTime();
    }

    /**
     * Obtiene el valor de la variable privada $_cadena
     *
     * @return string
     */
    public function getCadena(): string{
        return $this->_cadena;
    }

    /**
     * Obtiene el valor de la variable privada $_fechaHora
     *
     * @return DateTime
     */
    public function getFechaHora(): DateTime{
        return $this->_fechaHora;
    }

}