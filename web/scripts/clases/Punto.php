<?php

class Punto
{

    //constante pública de clase COLORES
    public const COLORES = [
        "black" => ["nombre" => "negro", "rgb" => [0, 0, 0]],
        "red" => ["nombre" => "rojo", "rgb" => [255, 0, 0]],
        "blue" => ["nombre" => "azul", "rgb" => [0, 0, 255]],
        "green" => ["nombre" => "verde", "rgb" => [0, 255, 0]]
    ];

    //constante pública de clase GROSORES
    public const GROSORES = [
        1 => "fino",
        2 => "medio",
        3 => "grueso"
    ];

    //propiedades privadas
    private int $_x;
    private int $_y;
    private string $_color;
    private int $_grosor;

    /**
     * Inicializa las propiedades usando set, si algún set da false,
     * lanza una excepción
     *
     * @param integer $x
     * @param integer $y
     * @param string $color
     * @param integer $grosor
     */
    public function __construct(int $x, int $y, string $color, int $grosor)
    {
        if (!$this->setX($x))
            throw new Exception("Fallo en coordenada X");
        if (!$this->setY($y))
            throw new Exception("Fallo en coordenada Y");
        if (!$this->setColor($color))
            throw new Exception("Color no válido");
        if (!$this->setGrosor($grosor))
            throw new Exception("Grosor no válido");
    }

    //Métodos get

    /**
     * Devuelve el valor de la variable correspondiente a 
     * la coordenada X
     *
     * @return int
     */
    public function getX(): int
    {
        return $this->_x;
    }
    public function getY(): int
    {
        return $this->_y;
    }
    public function getColor(): string
    {
        return $this->_color;
    }
    public function getGrosor(): int
    {
        return $this->_grosor;
    }

    //Métodos set

    /**
     * Valida y asigna la coordenada X, asegurando que
     * sea un entero entre 0 y 20000
     *
     * @param int $x
     * @return bool True si es válida, false en caso contrario
     */
    public function setX(int $x): bool
    {
        if (validaEntero($x, 0, 20000, 0)) {
            $this->_x = $x;
            return true;
        }

        return false;
    }
    public function setY(int $y): bool
    {
        if (validaEntero($y, 0, 20000, 0)) {
            $this->_y = $y;
            return true;
        }

        return false;
    }
    public function setColor(string $color): bool
    {
        if (array_key_exists($color, self::COLORES)) {
            $this->_color = $color;
            return true;
        }

        return false;
    }
    public function setGrosor(int $grosor): bool
    {
        if (array_key_exists($grosor, self::GROSORES)) {
            $this->_grosor = $grosor;
            return true;
        }

        return false;
    }

    //Métodos para controlar la creación de propiedades dinámicas
    //(no se pueden crear)
    public function __get(string $name)
    {
        throw new \Exception("La propiedad " . $name . "no existe");
    }
    public function __set(string $name, mixed $value): void
    {
        throw new \Exception("La propiedad " . $name . "no existe");
    }
    public function __isset(string $nombre): bool
    {
        return false;
    }
}
