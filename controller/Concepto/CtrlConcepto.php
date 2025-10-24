<?php 
include_once '../DAO/Concepto/ConceptoDAO.php';
class CtrlConcepto extends ConceptoDAO{
        public function  read(){
       include_once '../view/Concepto/ModalsConcepto.php';
        include_once '../view/Concepto/ViewConcepto.php';
         

        viewConcepto::getRead();
    
     }

        public function data(){
         $listConcepto=[];
            $array=[];
            $listConcepto=$this->getAll();
            foreach($listConcepto as $key => $rowConcepto){    
              $array['data'][$key]['idConcepto'] = $rowConcepto['con_id'];
              $array['data'][$key]['descripcion'] = $rowConcepto['con_descripcion'];
              $array['data'][$key]['estado'] = $rowConcepto['con_estado'];  
              $array['data'][$key]['buttons'] = '<ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarConcepto" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-edit fa-fw"></i></a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarConcepto">
            <li><a class="dropdown-item btnShowEdit" href="#!" data-bs-toggle="modal" data-bs-target="#modalEditConcepto" data-url="'.getUrl('Concepto', 'Concepto', 'getData', array('idConcepto' => $rowConcepto['con_id']), 'ajax').'" role="button">Editar</a></li>
              <li><hr class="dropdown-divider" /></li>
              <li><a class="dropdown-item btnShowDelete" href="#!" data-id="'.$rowConcepto['con_id'].'" data-name="'.$rowConcepto['con_descripcion'].'">Eliminar</a></li>      
                    
                    
        </ul>
    </li>
</ul>';

              
            } 
            echo json_encode($array);

        }

         public function postNew()
    {
        $con_id = $_POST['idconcepto'];        
        $con_descripcion = $_POST['descripcion'];
        $con_estado= $_POST['estado'];           
      
       
       
        $rs = ConceptoDao::getInstance()->add($con_id,$con_descripcion,$con_estado);
 
        if ($rs == 1) {          
            // Redirecciona con mensaje de éxito
            messageSweetAlert("¡Éxito!", "Concepto de pago creado.", "success", "#4CAF50", getUrl('Concepto', 'Concepto', 'read'));          
        } else {
            // Redirecciona con mensaje de error
            messageSweetAlert("Advertencia!", "No fue posible añadir este concepto de pago", "warning", "#f7060d", getUrl('Concepto', 'Concepto', 'read'));
        }
       
    }
     public function getData(){
        $con_id= $_GET['idConcepto'];
        $array = [];
        $rs = ConceptoDAO::getInstance()->findById($con_id);
        foreach($rs as $key => $rowConcepto){          
           
            $array['idconcepto'] = $rowConcepto['idconcepto'];          
            $array['descripcion'] = $rowConcepto['descripcion'];    
            $array['estado'] = $rowConcepto['estado'];    
       
        }        
        echo json_encode($array);
       
    }

}
         