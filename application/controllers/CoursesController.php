<?php

class CoursesController extends Zend_Controller_Action
{

    public function init()
    {
            $authorization =Zend_Auth::getInstance();
            $identity=$authorization->getIdentity();
             $this->view->identity=$identity;
    }

    public function indexAction()
    {
        echo "The page not allowed for normal user.";
    }

    public function addAction()
    {
        //$this->view->page_title = "Add Course";
        $authorization =Zend_Auth::getInstance();
        $identity=$authorization->getIdentity();
        if($identity->user_type=="admin")
        {
                $form=new Application_Form_Course();
                $category_model = new Application_Model_Categories();
                $categories= $category_model->listCategories();
                for($i=0;$i<count($categories);$i++ )
                {
                    $options[$categories[$i]['id']]=$categories[$i]['name'];
                }
                $form->getElement('catid')->setMultiOptions($options);
                if($this->getRequest()->isPost())
                    {
                        if($form->isValid($_POST))
                            {
                                $model = new Application_Model_Courses();
                                $this->view->success = $model->addCourse($form->getValues());
                                $form->reset();
                            }
                    }
                $this->view->form=$form;
                
                
        }
        else 
            {
                $this->redirect("cources/index");
            }
    }

    public function listAction()
    {        
        $authorization =Zend_Auth::getInstance();
        $identity=$authorization->getIdentity();
                $course_model = new Application_Model_Courses();
                $courses  = $course_model->listCourses();
                $category_model = new Application_Model_Categories();
                for($i=0;$i<count($courses);$i++ )
                {
                    $categories[$i]=$category_model->getCategoryById($courses[$i]['catid'])[0]['name'];
                }
                //$page=$this->_getParam('page',1);
                //$paginator = Zend_Paginator::factory($courses);
               // $paginator->setItemCountPerPage(10);
                //$paginator->setCurrentPageNumber($page);

                $this->view->courses=$courses;
                $this->view->categories=$categories;
                $this->view->identity=$identity;
       
        
    }

    public function editAction()
    {
        $authorization =Zend_Auth::getInstance();
        $identity=$authorization->getIdentity();
        if($identity->user_type=="admin")
        {
            $form=new Application_Form_Course();
            $model = new Application_Model_Courses();
            $id = $this->getRequest()->getParam('id');
            $course_data = $model->getCourseById($id);
            $category_model = new Application_Model_Categories();
            $categories= $category_model->listCategories();
            for($i=0;$i<count($categories);$i++ )
               {
                    $options[$categories[$i]['id']]=$categories[$i]['name'];
               }
            $form->getElement('catid')->setMultiOptions($options);
            var_dump($course_data);
            $form->populate($course_data[0]);
            if($this->getRequest()->isPost()){

                if($form->isValid($this->getRequest()->getParams())){
                    $model = new Application_Model_Courses();
                    $model->editCourse($form->getValues(),$id);//$this->view->identity->id
                    $this->redirect("/courses/list");
                }
            }
            $this->view->form = $form;
            $this->render("add");
        }
        else 
            {
                $this->redirect("cources/index");
            }

    }
    public function deleteAction()
    {
        $authorization =Zend_Auth::getInstance();
        $identity=$authorization->getIdentity();
        if($identity->user_type=="admin")
        {
            $id=$this->getRequest()->getParam('id');
            if($id)
            {
                $model = new Application_Model_Courses();
                $model->deleteCourse($id);
            }
            $this->redirect("courses/list");
        }
        else 
            {
                $this->redirect("cources/index");
            }
    }
    
}





