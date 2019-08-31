<?php

class Certificate {
    private $template;
    private $cert;


    public function __construct(){
       $this->template = new AdminTemplate();
       $this->cert=new cert_printModel();
    }

    function indexAction() {
    	if(!isset($_SESSION['manager_id'])){
    		$this->template->render("login");
    	}else{
       $this->template->render("Home");
    }
  }
    
    function printAction(){
      if(!isset($_SESSION['manager_id'])){
        $this->template->render("login");
      }else{
      $this->template->render("cert/print");
    }}

     function active_printAction(){
      if(!isset($_SESSION['manager_id'])){
        $this->template->render("login");
      }else{
      $this->template->render("cert/active_print");
    }
}
    function exelAction(){
      if(!isset($_SESSION['manager_id'])){
        $this->template->render("login");
      }else{
      if (strtolower($_SERVER['REQUEST_METHOD']) == "post") {
        if (!empty($_FILES['exel_file']['name'])) {
          $this->cert->deleteAll();
           $file = $_FILES['exel_file']['tmp_name'];
            $file_open = fopen($file, 'r');
            $num = 0;
            while ($datafile = fgetcsv($file_open, 3000, ';')) {
                $num++;
                $this->cert->user = $datafile[0];
                $this->cert->cert = $datafile[1];
                $this->cert->code = $datafile[2];
                $t=strtotime($datafile[3]);
                $this->cert->date = date('Y-m-d',$t);
                $this->cert->duration = $datafile[4];
                $this->cert->inst = $datafile[5];
                $this->cert->insert();
           }

        }
        header("location:?rt=Certificate/print");
      }
      $this->template->render("cert/exel");
    }
  }
}
//     function searchAction(){
//        if(!isset($_SESSION['manager_id'])){
//         $this->template->render("login");
//       }else{
//  $data=cert_printModel::search("code",$_POST['search']);
// if(!empty($data)){
//   $cert=$data[0];
// $this->template->data=$cert;
// $this->template->render('cert/active_print_code');
// }else{
//   echo "not found";
// }
//       }
//     }
// }
