<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

protected function _initSession()
	{
	Zend_Session::start();
	$session = new Zend_Session_Namespace( 'Zsession_1' );
	$session->setExpirationSeconds( 1800 );
	}

}

