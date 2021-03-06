<?php

class Application_Model_Post extends Zend_Db_Table_Abstract
{
protected $_name= 'post' ;

public function addPost($post_data)
{
$row = $this->createRow();
$row->title =$post_data['title'];
$row->body = $post_data['postbody'];
$row->s_id =1;
$row->save();
return $row->id; 
}

public function listPosts()
{
return $this->fetchAll()->toArray();
}

public function getPostById($id)
{
return $this->find($id)->toArray();
}

public function editPost($id,$post_data)
{
$this->update($post_data, "id=$id");
}

public function deletePost($id)
{
$this->delete("id=$id");
}



}

