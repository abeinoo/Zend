<?php

class Application_Model_Categories extends Zend_Db_Table_Abstract
{
    protected $_name= 'categories' ;

    public function addCategory($Category_data)
    {
        $row = $this->createRow();
        $row->name =$Category_data['name'];
        $row->description = $Category_data['description'];
        $row->save();
        return $row->id; 
    }

    public function listCategories()
    {
    return $this->fetchAll()->toArray();
    }

    public function getCategoryById($id)
    {
    return $this->find($id)->toArray();
    }

    public function editCategory($Category_data,$id)
    {
    $this->update($Category_data, "id=$id");
    }

    public function deleteCategory($id)
    {
    $this->delete("id=$id");
    }



}

