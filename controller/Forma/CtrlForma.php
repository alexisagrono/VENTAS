<?php
include_once '../DAO/Forma/FormaDAO.php';
class CtrlForma extends FormaDAO
{
    public function read()
    {


        include_once '../view/Forma/ModalsForma.php';
        include_once '../view/Forma/viewForma.php';
        viewForma::getRead();

    }

    public function data()
    {
        $listForma = [];
        $array = [];
        $listForma = $this->getAll();
        foreach ($listForma as $key => $rowForma) {

            $array['data'][$key]['idForma'] = $rowForma['fp_id'];
            $array['data'][$key]['fpDescripcion'] = $rowForma['fp_descripcion'];
            $array['data'][$key]['fpEstado'] = $rowForma['fp_estado'];
            $array['data'][$key]['buttons'] = '<ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarForma" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-edit fa-fw"></i></a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarForma">
           <li><a class="dropdown-item btnShowEdit" href="#!" data-bs-toggle="modal"  data-bs-target="#modalEditForma"  data-url="' . getUrl('Forma', 'Forma', 'getData', array('idForma' => $rowForma['fp_id']), 'ajax') . '"  role="button"> Editar </a></li>
            <li><hr class="dropdown-divider" /></li>
             <li><a class="dropdown-item btnShowDelete" href="#!" data-id="' . $rowForma['fp_id'] . '" data-name="' . $rowForma['fp_descripcion'] . '">Eliminar</a></li>  
        </ul>
    </li>
</ul>';


        }
        echo json_encode($array);

    }

    public function postNew()
    {
        //dd($_POST);
        $fp_id = $_POST['idForma'];
        $fp_descripcion = $_POST['fpDescripcion'];
        $fp_estado = $_POST['fpEstado'];



        $rs = FormaDao::getInstance()->add($fp_id, $fp_descripcion, $fp_estado);

        if ($rs == 1) {
            // Redirecciona con mensaje de éxito
            messageSweetAlert("¡Éxito!", "Concepto de pago creado.", "success", "#4CAF50", getUrl('Forma', 'Forma', 'read'));
        } else {
            // Redirecciona con mensaje de error
            messageSweetAlert("Advertencia!", "No fue posible añadir este concepto de pago", "warning", "#f7060d", getUrl('Forma', 'Forma', 'read'));
        }

    }
    public function getData()
    {
        $fp_id = $_GET['idForma'];
        $array = [];
        $rs = FormaDAO::getInstance()->findById($fp_id);
        foreach ($rs as $key => $rowForma) {


            $array['fp_id'] = $rowForma['fp_id'];
            $array['fp_descripcion'] = $rowForma['fp_descripcion'];
            $array['fp_estado'] = $rowForma['fp_estado'];


        }
        echo json_encode($array);

    }
     public function postUpdate()
    {
        $fp_id = $_POST['idFormaEdit'];
        $fp_descripcion = $_POST['fpDescripcionEdit'];
        $fp_estado = $_POST['fpEstadoEdit'];
        $rs = FormaDAO::getInstance()->update($fp_id, $fp_descripcion, $fp_estado);
        if ($rs == 1) {
            //Mensaje de registro Exitoso
            echo '<script>setTimeout(function(){ postCreate("\\u00A1Atenci\\u00f3n!", "Registro Exitoso !!!", "success", "#F57F17", "javascript:history.back()");}, 1000 );</script>';
        } else {
            //Mensaje de error
        }
        redirect(getUrl('Forma', 'Forma', 'read'));

    }
    public function postDelete()
    {
          $fp_id = $_POST['idForma'];

        $rs = FormaDAO::getInstance()->delete($fp_id);

        echo json_encode($rs);


    }





}