<?php

class Application_Model_MaterialReuest extends Zend_Db_Table_Abstract
{
    protected $_name= 'material_request' ;

    public function assignMaterial($data)
    {
        $row = $this->createRow();
        $row->assign_date =$data['assign_date'];
        $row->uid =$data['uid'];
        $row->mid =$data['mid'];
        $row->save();
        return $row->id; 
    }
    public function deassignMaterial($id)//more than one paramerter
    {
    $this->delete("id=$id");
    }
}

