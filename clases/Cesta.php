<?php
//require '../clases/Bd.php';

class Cesta {

    private $productos = [];
    // $producto[$cod]['unidades']
    // $producto[$cod]['producto']['campoTabla']


    public function addProducto($cod, BD $bbdd) {
        if (array_key_exists($cod, $this->productos))
            // si ya existe, incrementamos una unidad
            $this->productos[$cod]['unidades']++;
        else
            $this->productos[$cod]['unidades'] = 1;

        $this->productos[$cod]['producto'] = $bbdd->obtenerProducto($cod);
    }

    public function quitarProducto($cod, BD $bbdd) {
        if (array_key_exists($cod, $this->productos)) {
            if ($this->productos[$cod]['unidades'] === 1) {
                unset($this->productos[$cod]);
            } else {
                $this->productos[$cod]['unidades']--;
            }

        }
    }

    public static function obtenerCesta() {
        // leo la cesta anterior (si existia)
        if (isset($_SESSION['cesta'])) {
            $cesta = unserialize($_SESSION['cesta']);
        } else {
            $cesta = new self(); // new Cesta()
        }
        return $cesta;
    }

    public function vaciarCesta(): void {
        $this->productos = [];
        //unset($_SESSION['cesta']);
    }

    public function guardarCesta(): void {
        $_SESSION['cesta'] = serialize($this);
    }

    public function getProductosCesta(): array {
        return $this->productos;
    }

    public function importe_total() {
        $total = 0;
        foreach ($this->productos as $producto) {
            $total += $producto['producto']['PVP'] * $producto['unidades'];
        }
        return $total;
    }

    public function cestaVacia() {
        return !(count($this->productos) === 0);
    }

    public function totalArticulos() {
        $articulos = 0;
        foreach ($this->productos as $producto) {
            $articulos += $producto['unidades'];
        }
        return $articulos;
    }

}