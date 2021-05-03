<?php
// CMG Imports
use cmsgears\widgets\popup\Popup;

use cmsgears\widgets\grid\DataGrid;

$coreProperties = $this->context->getCoreProperties();
$title			= $this->context->title;
$this->title	= "{$title}s | " . $coreProperties->getSiteTitle();
$apixBase		= $this->context->apixBase;
$baseUrl		= $this->context->baseUrl;

// View Templates
$moduleTemplates	= '@cmsgears/module-cms/admin/views/templates';
$themeTemplates		= '@themes/admin/views/templates';
?>
<?= DataGrid::widget([
	'dataProvider' => $dataProvider, 'baseUrl' => $baseUrl, 'add' => true, 'addUrl' => 'create', 'data' => [ ],
	'title' => $this->title, 'options' => [ 'class' => 'grid-data grid-data-admin' ],
	'searchColumns' => [
		'name' => 'Name', 'title' => 'Title', 'desc' => 'Description', 'content' => 'Content'
	],
	'sortColumns' => [
		'name' => 'Name', 'title' => 'Title', 'status' => 'Status',
		'visibility' => 'Visibility', 'order' => 'Order',
		'pinned' => 'Pinned', 'featured' => 'Featured', 'popular' => 'Popular',
		'cdate' => 'Created At', 'udate' => 'Updated At'
	],
	'filters' => [
		'status' => $filterStatusMap,
		'model' => [
			'pinned' => 'Pinned', 'featured' => 'Featured', 'popular' => 'Popular'
		]
	],
	'reportColumns' => [
		'name' => [ 'title' => 'Name', 'type' => 'text' ],
		'title' => [ 'title' => 'Title', 'type' => 'text' ],
		'desc' => [ 'title' => 'Description', 'type' => 'text' ],
		'content' => [ 'title' => 'Content', 'type' => 'text' ],
		'status' => [ 'title' => 'Status', 'type' => 'select', 'options' => $statusMap ],
		'visibility' => [ 'title' => 'Visibility', 'type' => 'select', 'options' => $visibilityMap ],
		'order' => [ 'title' => 'Order', 'type' => 'range' ],
		'pinned' => [ 'title' => 'Pinned', 'type' => 'flag' ],
		'featured' => [ 'title' => 'Featured', 'type' => 'flag' ],
		'popular' => [ 'title' => 'Popular', 'type' => 'flag' ]
	],
	'bulkPopup' => 'popup-grid-bulk', 'bulkActions' => [
		'status' => [
			'activate' => 'Activate', 'block' => 'Block',
			'terminate' => 'Terminate'
		],
		'model' => [
			'pinned' => 'Pinned', 'featured' => 'Featured', 'popular' => 'Popular',
			'delete' => 'Delete'
		]
	],
	'header' => false, 'footer' => true,
	'grid' => true, 'columns' => [ 'root' => 'colf colf15', 'factor' => [ null, null, 'x2', 'x2', 'x2', null, null, null, null, null, 'x2' ] ],
	'gridColumns' => [
		'bulk' => 'Action',
		'icon' => [ 'title' => 'Icon', 'generate' => function( $model ) {
			$icon = "<div class='align align-center'><i class=\"$model->icon\"></i></div>" ; return $icon;
		}],
		'name' => 'Name',
		'title' => 'Title',
		'template' => [ 'title' => 'Template', 'generate' => function( $model ) { return $model->getTemplateName(); } ],
		'visibility' => [ 'title' => 'Visibility', 'generate' => function( $model ) { return $model->getVisibilityStr(); } ],
		'status' => [ 'title' => 'Status', 'generate' => function( $model ) { return $model->getStatusStr(); } ],
		'pinned' => [ 'title' => 'Pinned', 'generate' => function( $model ) { return $model->getPinnedStr(); } ],
		'featured' => [ 'title' => 'Featured', 'generate' => function( $model ) { return $model->getFeaturedStr(); } ],
		'popular' => [ 'title' => 'Popular', 'generate' => function( $model ) { return $model->getPopularStr(); } ],
		'actions' => 'Actions'
	],
	'gridCards' => [ 'root' => 'col col12', 'factor' => 'x3' ],
	'templateDir' => "$themeTemplates/widget/grid",
	//'dataView' => "$moduleTemplates/grid/data/element",
	//'cardView' => "$moduleTemplates/grid/cards/element",
	'actionView' => "$moduleTemplates/grid/actions/element"
])?>

<?= Popup::widget([
	'title' => 'Apply Bulk Action', 'size' => 'medium',
	'templateDir' => Yii::getAlias( "$themeTemplates/widget/popup/grid" ), 'template' => 'bulk',
	'data' => [ 'model' => $title, 'app' => 'grid', 'controller' => 'crud', 'action' => 'bulk', 'url' => "$apixBase/bulk" ]
])?>

<?= Popup::widget([
	'title' => "Delete $title", 'size' => 'medium',
	'templateDir' => Yii::getAlias( "$themeTemplates/widget/popup/grid" ), 'template' => 'delete',
	'data' => [ 'model' => $title, 'app' => 'grid', 'controller' => 'crud', 'action' => 'delete', 'url' => "$apixBase/delete?id=" ]
])?>
