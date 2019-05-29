<?php
require 'Smarty.class.php';

class Plantilla {
    private $plantilla;
    public function __construct() {
        $this->plantilla = new Smarty();
        // la ruta es desde index.php, por el require ('./clases/Plantilla.php');
        $this->plantilla->template_dir = '/var/www/phpStorm/tienda/vistas/plantillas';
        $this->plantilla->compile_dir = '/var/www/phpStorm/tienda/vistas/plantillas_compiladas';

    }

    public function getPlantilla() {
        return $this->plantilla;
    }

    public function mostrar($fichero) {
        $this->plantilla->display($fichero);
    }


    /**
     * @param string $variable_plantilla, nombre de la variable en la vista
     * @param $valor que le quiero dar a esa variable
     */
    public function compartir(string $variable_plantilla, $valor) {
        $this->plantilla->assign($variable_plantilla, $valor);
    }
}