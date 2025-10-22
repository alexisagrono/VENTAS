<?php 
include_once '../DAO/Ciudad/CiudadDAO.php';
class CtrlCiudad extends CiudadDAO{
        public function  read(){
        include_once '../controller/Departamento/CtrlDepartamento.php';
    
        include_once '../view/Ciudad/ModalsCiudad.php';
        include_once '../view/Ciudad/viewCiudad.php';

          viewCiudad::getRead();
    
     }

        public function data(){
         $listDepto=[];
            $array=[];
            $listDepto=$this->getAll();
            foreach($listDepto as $key => $rowDepto){    
              $array['data'][$key]['idCiudad'] = $rowDepto['id'];  
              $array['data'][$key]['nomCiudad'] = $rowDepto['nombre'];
             $array['data'][$key]['habitantes'] = $rowDepto['habitantes']; 
             $array['data'][$key]['idDepartamento'] = $rowDepto['id'];  
              $array['data'][$key]['Departamento'] = $rowDepto['nomDepto'];    
              $array['data'][$key]['buttons'] = '<ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDepto" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-edit fa-fw"></i></a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDepto">
            <li><a class="dropdown-item btnShowEdit" href="#!" data-bs-toggle="modal" data-bs-target="#modalEditCiudad" data-url="'.getUrl('Ciudad', 'Ciudad', 'getData', array('idCiudad' => $rowDepto['id']), 'ajax').'" role="button">Editar</a></li>
            <li><hr class="dropdown-divider" /></li>
            <li><a class="dropdown-item" href="#!">Eliminar</a></li>
        </ul>
    </li>
</ul>';

              
            } 
            echo json_encode($array);

        }

         public function postNew()
    {
        $id = $_POST['idCiudad'];
        $name = $_POST['nameCiudad']; 
        $idD =$_POST['idDepartamento']; 
         $habitantes=$_POST['habitantes'];
       
       
        $rs = CiudadDao::getInstance()->add($id, $name,$idD,$habitantes);
 
        if ($rs == 1) {          
            // Redirecciona con mensaje de éxito
            messageSweetAlert("¡Éxito!", "Ciudad creada correctamente.", "success", "#4CAF50", getUrl('Ciudad', 'Ciudad', 'read'));          
        } else {
            // Redirecciona con mensaje de error
            messageSweetAlert("Advertencia!", "No fue posible crear la Ciudad", "warning", "#f7060d", getUrl('Ciudad', 'Ciudad', 'read'));
        }
       
    }
     public function getData(){
        $id = $_GET['idCiudad'];
        $array = [];
        $rs = CiudadDAO::getInstance()->findById($id);
        foreach($rs as $key => $rowCiudad){          
           
            $array['id'] = $rowCiudad['id'];          
            $array['Nombre'] = $rowCiudad['nombre'];    
            $array['depto'] = $rowCiudad['idDepto'];    
            $array['habitantes'] = $rowCiudad['habitantes'];    
 
        }        
        echo json_encode($array);
       
    }

}