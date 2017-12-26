<?php

/* @var $this yii\web\View
 * @var $entity yii2lab\domain\BaseEntity
 */

use yii\data\ArrayDataProvider;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii2lab\helpers\yii\Html;

$columns = [
	[
		'label' => Yii::t('main', 'message'),
		'format' => 'raw',
		'value' => function($data) use($entity){
			$tagHtml = '';
			foreach($entity->tags as $tag) {
				if($tag->sha == $data['sha']) {
					$tagHtml =  " <small class='text-muted'>" . Html::fa('tag') . " {$tag->name}</small>";
				}
			}
			return Html::a($data['message'], "https://github.com/{$entity->package}/commit/{$data['sha']}", [
				'target' => '_blank',
			]) . SPC . $tagHtml;
		},
	],
	[
		'label' => Yii::t('main', 'sha'),
		'format' => 'raw',
		'value' => function($data) {
			return Html::tag('span', substr($data['sha'], 0, 8), ['title' => $data['sha']]);
		},
	],
];
$dataProvider = new ArrayDataProvider([
	'models' => ArrayHelper::toArray($entity->commits),
]);
?>

<?= GridView::widget([
	'dataProvider' => $dataProvider,
	'layout' => '{items}',
	'columns' => $columns,
]); ?>
