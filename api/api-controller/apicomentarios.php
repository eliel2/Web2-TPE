<?php
require_once("./model/comentariosmodel.php");
require_once("./api-view/JSONView.php");

class apicomentarios {
    private $view;
    private $data;
    private $model;

    public function __construct() {
        $this->view = new JSONView();
        $this->data = file_get_contents("php://input"); 
        $this->model = new comentariosmodel();
    }

    private function getData() {
        return json_decode($this->data);
    }

    public function GetComentarios($params = null){
        $id = $params[':ID'];
        $comentarios = $this->model->GetComentarios($id);
        $this->view->response($comentarios,200);
    }
  
   public function AddComentarios($params = []) {     
        $comentarios = $this->getData(); 
        $ComentariosId = $this->model->InsertarComentarios($comentarios->comentarios);

       
        $ComentarioNuevo = $this->model->GetComentario($ComentariosId);
        
        if ($ComentarioNuevo)
            $this->view->response($ComentarioNueva, 200);
            //header("Location: " . URL_COMENT);
        else
            $this->view->response("Error al insertar comentario", 500);

    }
}