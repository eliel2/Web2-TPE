<?php
require_once("./model/comentariosmodel.php");
require_once("./api/api-view/JSONView.php");

class comentariosapicontroller(){
    private $model;
    private $view;
    private $data;
    
    public function __construct() {
        $this->view = new JSONView();
        $this->data = file_get_contents("php://input"); 
        $this->model = new ComentariosModel();
    }

    function getData(){ 
        return json_decode($this->data); 
    }  
    public function GetComentarios($params = null) {
        $comentarios = $this->model->GetComentarios();
        $this->view->response($comentarios, 200);
    }
    public function deletecomentario($params = []) {
        $comentario_id = $params[':ID'];
        $comentario = $this->model->GetComentario($comentario_id);

        if ($comentario) {
            $this->model->BorrarComentario($task_id);
            $this->view->response("comentario id=$comentario_id eliminado con éxito", 200);
        }
        else 
            $this->view->response("comentario id=$comentario_id not found", 404);
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