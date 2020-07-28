<?php
use cmsgears\widgets\aform\AjaxFormWidget;
?>
<div class="padding padding-top-xlarge">
<?= AjaxFormWidget::widget([
	'slug' => 'contact-us', 'labels' => true,
	
	'templateDir' => '@themeTemplates/widget', 'template' => 'aform'
])?>
</div>