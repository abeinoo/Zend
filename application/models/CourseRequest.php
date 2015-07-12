<?php

class Application_Model_CourseRequest extends Zend_Db_Table_Abstract
{
    protected $_name= 'course_request' ;

    public function assignCourse($data)
    {
        $row = $this->createRow();
        $row->assign_date =$data['assign_date'];
        $row->uid =$data['uid'];
        $row->cid =$data['cid'];
        $row->save();
        return $row->id; 
    }

    public function deassignCourse($id)
    {
    $this->delete("id=$id");
    }



}

