<?php

class Application_Model_Requests extends Zend_Db_Table_Abstract
{
    protected $_name= 'requests' ;

    public function addRequest($request_data)
    {
        $row = $this->createRow();
        $row->body =$request_data['body'];
        $row->rdate =$request_data['rdate'];
        $row->uid =$request_data['uid'];
        $row->save();
        return $row->id; 
    }

    public function listRequests()
    {
    return $this->fetchAll()->toArray();
    }

    public function getRequestById($id)
    {
    return $this->find($id)->toArray();
    }

    public function editRequest($request_data,$id)
    {
    $this->update($request_data, "id=$id");
    }

    public function deleteRequest($id)
    {
    $this->delete("id=$id");
    }



}



