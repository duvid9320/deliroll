<?php
include_once 'lib/model/dto/Galeria.php';
include_once 'lib/model/dao/GaleriaDAO.php';


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SlideController
 *
 * @author Dave
 */
class GaleriaController {

    public function showGaleria() {
        $imagenes = GaleriaDAO::getInstance()->getAll();
        ?>
        <div class="row">
            <div class=" text-center col-md-12 col-xl-12 col-xs-12 tag bg-2">
                <h3>GALERIA</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-xl-12 col-xs-12  text-center prl-0">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php 
                                foreach ($imagenes as $imagen) {
                        ?>
                        <div class="carousel-item active">
                            <img class="d-block img-rs" src="<?php echo $this->castGaleria($imagen)->getRuta()?>" alt="slide<?php echo $this->castGaleria($imagen)->getOrden()?>">
                        </div>
                        <?php
                                }
                        ?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
        <?php
    }

    private function castGaleria($obj) : Galeria{
        return $obj;
    }
}
