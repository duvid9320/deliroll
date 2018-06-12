<?php
include_once 'lib/model/dto/Slide.php';
include_once 'lib/model/dao/SlideDAO.php';
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
class SlideController {

    public function showSlide() {
        ?>
        <div class = "carousel slide " data-ride = "carousel" data-interval = "4500" data-pause = "false" >
            <div class = "carousel-inner">
                <?php
                $imagenesSlide = SlideDAO::getInstance()->getImages();
                $i = 0;
                foreach ($imagenesSlide as $imagen) {
                    if (++$i == 0) {
                        ?>
                        <div class="carousel-item active">
                            <img class="d-block img-rs " src="<?php echo "backend" . substr($this->castSlide($imagen)->getRuta(), 5) ?>">
                        </div>

                <?php
            } else {
                ?>
                        <div class="carousel-item">
                            <img class="d-block img-rs " src="<?php echo "backend" . substr($this->castSlide($imagen)->getRuta(), 5) ?>">
                        </div>

                <?php
            }
        }
        ?>
            </div>
        </div>
                <?php
            }

            private function castSlide($object): Slide {
                return $object;
            }

        }
        