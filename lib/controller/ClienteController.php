<?php
include_once 'lib/model/dao/ClienteDAO.php';
include_once 'lib/model/dto/Cliente.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ClienteController
 *
 * @author A. David Rodríguez C. <duvid9320@gmai.com>
 */
class ClienteController {

    private $dao;
    private $cliente;

    public function __construct($idCliente=NULL) {
        $this->setDao(ClienteDAO::getInstance());
        if (strlen($idCliente) > 0)
            $this->setCliente($this->getDao()->readClient($idCliente));
        else
            $this->setCliente(new Cliente());
    }

    public function showClientForm($total, $hasPromo) {
        ?>
        <h4 class="text-center">Cliente</h4>
        <form name="client-form" method="POST" action="pedido.php">
            <input type="hidden" name="type" value="Domicilio" />
             <div class="form-group row px-3">
                <label class="col-form-label col-xl-4 col-xs-12" for="location">Tipo de pedido:</label>
                <select name="type" class="custom-select col-xl-8 col-xs-12" id="type" required <?php echo boolval($hasPromo) ? "disabled" :""?>> 
                    <option></option>
                    <option value="Domicilio">Entrega a domicilio</option>
                    <option <?php echo boolval($hasPromo) ? "selected" : "";?> value="Apartado">Recoger o consumir en el local</option>
                </select>
            </div>
            <div class="form-group">
                <label class="sr-only" for="nombre">Nombre:</label>
                <input value="<?php echo $this->getCliente()->getNombre();?>" name="name" class="form-control" required="" id="nombre" type="text" placeholder="Nombre">
            </div>
            <div class="form-group">
                <label class="sr-only" for="telefono">Teléfono:</label>
                <input value="<?php echo $this->getCliente()->getTelefono();?>" minlength="10" pattern="[0-9]+"name="phone" class="form-control" required="" id="telefono" type="text" placeholder="Telefono">
            </div>
            
            
<!--            <div class="form-group row px-3">
                <label class="col-form-label col-xl-4 col-xs-12" for="location">Ubicación:</label>
                <select name="location" class="custom-select col-xl-8 col-xs-12" id="ciudad" required>
                    <option></option>
                    <option value="0">Otra</option>
                    <option value="1">Amacuzac</option>
                    <option value="2">Jojutla</option>
                    <option value="3">Puente de Ixtla</option>
                    <option value="4">Tlaltizapan</option>
                    <option value="5">Tlaquiltenango</option>
                    <option value="6">Xoxocotla</option>
                    <option value="7">Zacatepec</option>
                </select>
            </div>-->
            
            
            <div class="form-group">
                <label class="sr-only" for="domicilio">Dirección de entrega:</label>
                <textarea name="address" class="form-control" id="address" rows="8" cols="60" placeholder="Dirección de entrega. Municipio, Localidad, Calle, Fraccionamiento (si aplica), Departamento (si aplica), N° Exterior (Interior, si aplica)"><?php echo $this->getCliente()->getDireccion();?></textarea>
            </div>
            <div class="form-group">
                <label class="sr-only"  for="detail">Detalles:</label>
                <textarea name="detail" class="form-control" id="detai" rows="8" cols="60" placeholder="Aclaraciones (opcional)"></textarea>
            </div>
            <h1 class="text-center">Total $<?php echo $total ?> MXN</h1>
            <button class="btn btn-success form-control" type="submit" name="confirm-form" value="confirm" >
                <i class="fas fa-check-circle"> Confirmar</i>
            </button>
        </div>
        </form>
        <?php
    }

    public function createClient(Cliente &$client) {
        ClienteDAO::getInstance()->saveClient($client);
    }

    private function getDao(): ClienteDAO {
        return $this->dao;
    }

    function getCliente(): Cliente {
        return $this->cliente;
    }

    private function setDao(ClienteDAO $dao) {
        $this->dao = $dao;
    }

    private function setCliente(Cliente $cliente) {
        $this->cliente = $cliente;
    }

}
