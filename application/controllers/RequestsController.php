<?php

class RequestsController extends Zend_Controller_Action
{

    public function init()
    {
        $authorization =Zend_Auth::getInstance();
        if($authorization->hasIdentity()) 
        {
            echo "hghj";
            $identity=$authorization->getIdentity();
            echo $identity->username;
       		 $authorization =Zend_Auth::getInstance();
            $identity=$authorization->getIdentity();
             $this->view->identity=$identity;
          
        }
        else
        {
            echo "hhhh";
            //$this->redirect("index/index");
        }
    }

    public function indexAction()
    {
        // action body
    }

    public function addAction()
    {
        //$this->view->page_title = "Add Course";
            //if($this->view->identity)            {
                $form=new Application_Form_Requests();
               
                
                if($this->getRequest()->isPost())
                    {
                        if($form->isValid($_POST))
                            {
                                $model = new Application_Model_Requests();
                                $form->getElement("uid")->setValue(2);
                                $form->getElement("rdate")->setValue(date('Y-m-d'));
                                $this->view->success = $model->addRequest($form->getValues());
                            }
                    }
                $this->view->form=$form;
            //}
    }

    public function listAction()
    {  
        echo "hgh";
        if($this->view->identity) {echo"jjjj"; var_dump($this->view->identity->username);};
        echo "kkk";
        
        
        // if($this->view->identity)            {
                $model = new Application_Model_Requests();
                $requests  = $model->listRequests();
                //$page=$this->_getParam('page',1);
                //$paginator = Zend_Paginator::factory($courses);
               // $paginator->setItemCountPerPage(10);
                //$paginator->setCurrentPageNumber($page);

                $this->view->requests=$requests;         
                
                $course_request_form=new Application_Form_CourseReuest();
                $material_request_form=new Application_Form_MaterialReuest(); 
                $user_model = new Application_Model_Users();
                $users= $user_model->listUsers();
                for($i=0;$i<count($users);$i++ )
                   {
                        $options[$users[$i]['id']]=$users[$i]['username'];
                   }
                $course_request_form->getElement('uid')->setMultiOptions($options);
                $material_request_form->getElement('uid')->setMultiOptions($options);
                $options=NULL;
                $course_model = new Application_Model_Courses();
                $courses= $course_model->listCourses();
                for($i=0;$i<count($courses);$i++ )
                   {
                        $options[$courses[$i]['id']]=$courses[$i]['name'];
                   }
                $course_request_form->getElement('cid')->setMultiOptions($options);
                           
                $options=NULL;
                $material_model = new Application_Model_Materials();
                $materials= $material_model->listMaterials();
                for($i=0;$i<count($materials);$i++ )
                   {
                        $options[$materials[$i]['id']]=$materials[$i]['name'];
                   }
                $material_request_form->getElement('mid')->setMultiOptions($options);
                
                if($this->getRequest()->isPost())
                    {
                        if($form->isValid($_POST))
                            {
                                $model = new Application_Model_Requests();
                                $form->getElement("uid")->setValue(2);//session 
                                $form->getElement("rdate")->setValue(date('Y-m-d'));
                                $form->reset();
                            }
                    }
                $this->view->course_request_form=$course_request_form;
                $this->view->material_request_form=$material_request_form;
            //}
        //else { $this->_redirect("/user/login"); }
        
   }

    public function editAction()
    {
        $form=new Application_Form_Course();
        $model = new Application_Model_Courses();
        //$this->view->courses  = $model->editCourse();
        $id = $this->getRequest()->getParam('id');
        $course_data = $model->getCourseById($id);
        $form->populate($course_data);
        if($this->getRequest()->isPost()){
            
            if($form->isValid($this->getRequest()->getParams())){
                $model = new Application_Model_Courses();
                $model->editCourse($form->getValues(),1);//$this->view->identity->id
                $this->_redirect("/courses/list");
            }
        }
        $this->view->$form = $form;
        $this->render('add');

    }
    public function deleteAction()
    {
        $id=$this->getRequest()->getParam('id');
        if($id)
        {
            $model = new Application_Model_Courses();
            $this->view->courses  = $model->deleteCourse($id);
        }
        $this->render('list');
    }

}





