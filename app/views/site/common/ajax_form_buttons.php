<div class="form-actions">
	<?php 	echo CHtml::ajaxSubmitButton(Yii::t('add','Add School Term'),
			CHtml::normalizeUrl(array('//main/schoolTerm/addNew','render'=>false)),
			array('beforeSend'=>'function(){$(".read").html("processing...")}','success'=>'js: function(data) { $(".read").html(""); $(".errors").html(data) }'),array('id'=>'closeJobDialog')); ?>
</div>