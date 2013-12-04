<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        //DataTables rendering...
    }
    
    public function dtAction()
    {
        $aColumns = array('id', 'fname', 'lname');
        
        $output = Application_Model_Datatables::dt('sample', $aColumns);
        
        echo $this->getHelper('json')->sendJson($output);
    }
    
    public function newAction()
    {
        $db = Zend_Db_Table::getDefaultAdapter();
        
        $fname = $this->_request->getParam('fname');
        $lname = $this->_request->getParam('lname');
                
        $data = array(
                'fname' => $fname,
                'lname' => $lname
        );
                
        $result = $db->insert('sample', $data);
        echo $this->getHelper('json')->sendJson($result);
    }
    
    public function editAction()
    {
        $db = Zend_Db_Table::getDefaultAdapter();
        
        $id = $this->_request->getParam('id');
        $fname = $this->_request->getParam('fname');
        $lname = $this->_request->getParam('lname');
                
        $data = array(
                'fname' => $fname,
                'lname' => $lname
        );
                
        $result = $db->update('sample', $data, 'id='.$id);
        echo $this->getHelper('json')->sendJson($result);
    }
    
    public function deleteAction()
    {
        $db = Zend_Db_Table::getDefaultAdapter();
        
        $id = $this->_request->getParam('id');
                
        $result = $db->delete('sample', 'id='.$id);
        echo $this->getHelper('json')->sendJson($result);
    }

}

