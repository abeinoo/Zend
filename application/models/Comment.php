<?php

class Application_Model_Comment extends Zend_Db_Table_Abstract
{

protected $_name= 'comment' ;

public function addComment($comment_data)
{
$row = $this->createRow();
$row->username =$comment_data['mail'];
$row->body = $comment_data['commentbody'];
$row->post_id =$comment_data['post_id'];
return $row->save();
}

public function listComments()
{
return $this->fetchAll()->toArray();
}

public function getCommentById($id)
{
return $this->find($id)->toArray();
}

public function editComment($id,$comment_data)
{
$this->update($post_data, "id=$id");
}

public function deleteComment($id)
{
$this->delete("id=$id");
}

