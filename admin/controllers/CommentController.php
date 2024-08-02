<?php
class CommentController extends BaseController{
    public $route;
    public $commentModel;
    public function loadModels()
    {
        $this -> route = new Route();
        $this-> commentModel = new comment();
    }
  
    public function list(){
        $comment = $this->commentModel->allTable();
        $this->viewApp->requestView('comment.list',['comment' => $comment]);

    }
    public function ban(){
        $id = $_GET['id'];
        $this -> commentModel->updateIdTable(['status' => 2 ],$id);
        $this -> route -> redirectAdmin('comment');
    }
    public function unban(){
        $id = $_GET['id'];
        $this -> commentModel->updateIdTable(['status' => 1 ],$id);
        $this -> route -> redirectAdmin('comment');
    }
}
