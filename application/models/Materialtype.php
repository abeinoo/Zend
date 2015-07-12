<?php

class Application_Model_Materialtype extends Zend_Db_Table_Abstract
{
    protected $_name= 'material_type' ;

    public function addType($Type_data)
    {
        $row = $this->createRow();
        $row->type_name =$Type_data['type_name'];
        $row->save();
        return $row->id; 
    }

    public function listTypes()
    {
    return $this->fetchAll()->toArray();
    }

    public function getTypeById($id)
    {
    return $this->find($id)->toArray();
    }

    public function editType($Type_data,$id)
    {
    $this->update($Type_data, "id=$id");
    }

    public function deleteType($id)
    {
    $this->delete("id=$id");
    }



}