<?php

class Application_Model_Comments extends Zend_Db_Table_Abstract
{
    protected $_name= 'comments' ;

    public function addComment($Comment_data)
    {
        $row = $this->createRow();
        $row->body =$Comment_data['body'];
        $row->cdate =$Comment_data['cdate'];
        $row->uid =$Comment_data['uid'];
        $row->mid =$Comment_data['mid'];
        $row->save();
        return $row->id; 
    }

    public function listComments()
    {
    return $this->fetchAll()->toArray();
    }

    public function getCommentById($id)
    {
    return $this->find($id)->toArray();
    }

    public function editComment($Comment_data,$id)
    {
    $this->update($Comment_data, "id=$id");
    }

    public function deleteComment($id)
    {
    $this->delete("id=$id");
    }
    public function getCommentsByMaterialId($mid)
    {
     $select = $this->select()->where("mid='".$mid."'")->order("id");
        
     return $this->fetchAll($select)->toArray();
    }
}
