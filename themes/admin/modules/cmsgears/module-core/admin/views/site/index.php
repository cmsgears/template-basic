<?php
$coreProperties = $this->context->getCoreProperties();
$this->title 	= 'Dashboard | ' . $coreProperties->getSiteTitle();

// Breadcrumbs
$this->params[ 'breadcrumbs' ]		= [ 'label' => 'Dashboard' ];

// Sidebar
$this->params[ 'sidebar-parent' ]	= 'sidebar-dashboard';
$this->params[ 'sidebar-child' ]	= 'dashboard';
?>
