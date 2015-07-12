<?php

class Application_Model_Courses extends Zend_Db_Table_Abstract
{
    protected $_name= 'courses' ;

    public function addCourse($course_data)
    {
        $row = $this->createRow();
        $row->name =$course_data['name'];
        $row->hours =$course_data['hours'];
        $row->description = $course_data['description'];
        $row->catid =$course_data['catid'];
        $row->save();
        return $row->id; 
    }

    public function listCourses()
    {
    return $this->fetchAll()->toArray();
    }

    public function getCourseById($id)
    {
    return $this->find($id)->toArray();
    }

    public function editCourse($course_data,$id)
    {
    $this->update($course_data, "id=$id");
    }

    public function deleteCourse($id)
    {
    $this->delete("id=$id");
    }



}

