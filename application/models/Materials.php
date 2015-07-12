<?php

class Application_Model_Materials extends Zend_Db_Table_Abstract
{
   
    protected $_name= 'materials' ;

    public function addMaterial($material_data)
    {
        $row = $this->createRow();
        $row->name =$material_data['name'];
        $row->path =$material_data['path'];
        $row->cid = $material_data['cid'];
        $row->tid =$material_data['tid'];
        $row->save();
        return $row->id; 
    }

    public function listMaterials()
    {
    return $this->fetchAll()->toArray();
    }

    public function getMaterialById($id)
    {
    return $this->find($id)->toArray();
    }

    public function editMaterial($material_data,$id)
    {
    $this->update($material_data, "id=$id");
    }

    public function deleteMaterial($id)
    {
    $this->delete("id=$id");
    }
    public function getMaterialsByUserId($uid)
    {
     $select = $this->select()->from($this)->where("material_request.uid='".$uid."'")->setIntegrityCheck(false)
                    ->join("material_request","material_request.mid = materials.id");
                    
                    
           
    return $this->fetchAll($select)->toArray();
   }


}

