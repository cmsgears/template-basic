<?php
// Yii Imports
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

// Template options
$template		= $model->template;
$tclass			= isset( $template ) ? "page-{$template->slug}" : null;
$htmlOptions	= isset( $template ) && !empty( $template->htmlOptions ) ? json_decode( $template->htmlOptions, true ) : [];

// Page Options
$options = [ "data-slug" => $model->slug, "cmt-block" => "block-half-auto" ];
$options = !empty( $htmlOptions ) ? ArrayHelper::merge( $options, $htmlOptions ) : $options;

$optionClass = $options[ 'class' ] ?? null;

$options[ 'class' ] = isset( $options[ 'class' ] ) ? "page {$optionClass} $tclass page-model-{$template->type} page-{$model->slug}" : "page page-basic page-default $tclass page-model-{$template->type} page-{$model->slug}";

$options = Html::renderTagAttributes( $options );
