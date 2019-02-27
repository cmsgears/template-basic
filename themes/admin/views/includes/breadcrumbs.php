<?php
use yii\widgets\Breadcrumbs;

$breadcrumbs = Yii::$app->controller->getBreadcrumbs();
?>
<?= Breadcrumbs::widget([
	'tag' => 'div', 'homeLink' => false,
    'itemTemplate' => '<span class="wrap-link"><span class="link">{link}</span><em class="separator"></em></span>',
    'activeItemTemplate' => '<span class="current active">{link}</span>',
    'links' => isset( $breadcrumbs ) ? $breadcrumbs : []
]) ?>
