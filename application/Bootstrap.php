<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initDatabase()
    {
        $config = $this->getOptions();

        $db = Zend_Db::factory($config['resources']['db']['adapter'], $config['resources']['db']['params']);

        Zend_Db_Table::setDefaultAdapter($db);
    }

}

