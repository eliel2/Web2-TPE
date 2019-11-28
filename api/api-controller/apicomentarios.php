<?php
require_once("./model/comentariosmodel.php");
require_once("./api/api-view/JSONView.php");

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

    public function deletecomentario($params = []) {
        $comentario_id = $params[':ID'];

        if ($comentario_id) {
            $this->model->BorrarComentario($comentario_id);
            $this->view->response("comentario id=$comentario_id eliminado con éxito", 200);
        }
        else 
            $this->view->response("comentario id=$comentario_id not found", 404);
    }

  
   public function AddComentarios($params = []) {     
        $comentarios = $this->getData();

        $ComentariosId = $this->model->InsertarComentarios($comentarios->comentarios,$comentarios->puntaje,$comentarios->id_peliculafk);

        $nuevoComentario = $this->model->GetComentario($ComentariosId);

        if ($nuevoComentario)
            $this->view->response($nuevoComentario, 200);
        else
            $this->view->response("Error al insertar comentario", 500);

    }

}