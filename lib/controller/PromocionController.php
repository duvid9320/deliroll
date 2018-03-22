<?php

include_once 'lib/model/dao/PromocionDAO.php';
include_once 'lib/view/PromocionView.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PromocionController
 *
 * @author A. David Rodríguez C. <duvid9320@gmai.com>
 */
class PromocionController {
    
    public function showPromociones(){
        $promocionDAO = new PromocionDAO();
        $promocionView = new PromocionView();
        foreach ($promocionDAO->getPromociones() as $promocion) 
            $promocionView->showPromocion($promocion);
    }
}
