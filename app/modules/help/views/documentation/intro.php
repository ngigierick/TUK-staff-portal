<fieldset class="tusoft">

<h1>Introducing... TuSOFT Management System</h1>


<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id' => 'documentation-grid',
	'dataProvider' => $intro,
	//'filter' => $model,
	'type'=>'condensed',
	'summaryText'=>'',
	'columns' => array(
		//'id',
		
		
		'content:html',
	),
)); ?>
</fieldset>