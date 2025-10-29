<?php
include_once '../DAO/Departamento/DepartamentoDAO.php';
class CtrlDepartamento extends DepartamentoDAO
{
    public function read()
    {

        include_once '../view/Departamento/modalsdepartamento.php';
        include_once '../view/Departamento/viewDepartamento.php';

        viewDepartamento::getRead();

    }

    public function data()
    {
        $listDepto = [];
        $array = [];
        $listDepto = $this->getAll();
        foreach ($listDepto as $key => $rowDepto) {
            $array['data'][$key]['idDepartamento'] = $rowDepto['id'];
            $array['data'][$key]['nomDepartamento'] = $rowDepto['nombre'];


            $array['data'][$key]['buttons'] = '<ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDepto" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-edit fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDepto">
                        <li><a class="dropdown-item btnShowEdit" href="#!" data-bs-toggle="modal" data-bs-target="#modalEditDepto" data-url="' . getUrl('Departamento', 'Departamento', 'getData', array('idDepto' => $rowDepto['id']), 'ajax') . '" role="button">Editar</a></li>
                       <li><a class="dropdown-item btnShowDelete" href="#!" data-id="' . $rowDepto['id'] . '" data-name="' . $rowDepto['nombre'] . '">Eliminar</a></li>      
                        <li><hr class="dropdown-divider" /></li>
                        <l
                                             
                    </ul>
                </li>
            </ul>';

        }
        echo json_encode($array);

    }
    public function postNew()
    {
        $id = $_POST['idDepto'];
        $name = $_POST['nameDepto'];

        $rs = DepartamentoDAO::getInstance()->add($id, $name);

        if ($rs == 1) {
            // Redirecciona con mensaje de éxito
            messageSweetAlert("¡Éxito!", "Departamento creado correctamente.", "success", "#4CAF50", getUrl('Departamento', 'Departamento', 'read'));
        } else {
            // Redirecciona con mensaje de error
            messageSweetAlert("Advertencia!", "No fue posible crear el departamento", "warning", "#f7060d", getUrl('Departamento', 'Departamento', 'read'));
        }

    }
    public function getOption()
    {
        $listDepto = $this->getAll();
        $options = "";
        foreach ($listDepto as $rowDepto) {
            echo $options = '<option value="' . $rowDepto['id'] . '">' . $rowDepto['nombre'] . '</option>';
        }

    }
    public function getData()
    {
        $id = $_GET['idDepto'];
        $array = [];
        $rs = DepartamentoDAO::getInstance()->findById($id);
        foreach ($rs as $key => $rowDepto) {

            $array['id'] = $rowDepto['id'];
            $array['nombre'] = $rowDepto['nombre'];

        }
        echo json_encode($array);

    }
    public function postUpdate()
    {
        $id = $_POST['idDeptoEdit'];
        $name = $_POST['nomDeptoEdit'];
        $rs = DepartamentoDAO::getInstance()->update($id, $name);
        if ($rs == 1) {
            //Mensaje de registro Exitoso
            echo '<script>setTimeout(function(){ postCreate("\\u00A1Atenci\\u00f3n!", "Registro Exitoso !!!", "success", "#F57F17", "javascript:history.back()");}, 1000 );</script>';
        } else {
            //Mensaje de error
        }
        redirect(getUrl('Departamento', 'Departamento', 'read'));

    }
    public function postDelete()
    {
        $id = $_POST['idDepto'];

        $rs = DepartamentoDAO::getInstance()->delete($id);

        echo json_encode($rs);


    }




}