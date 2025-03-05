<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit', array(
	   //'heading'=>'TuSOFT - Technical University Software ',
	)); ?>		
		<?php /** @var BootActiveForm $form */
			$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
				'action'=>Yii::app()->createUrl('/site/search/'),
			    'id'=>'searchForm',
			     'method'=>'get',
			    'type'=>'search',
			)); 
			
			?>
			   <br />
			    <?php echo CHtml::textField('term','',array('id'=>'fullSearch','placeholder'=>'Find Staff By First Name, Surname or Middle Name',));?>
			    &nbsp;&nbsp;&nbsp;&nbsp;
			    	<?php $this->widget('bootstrap.widgets.TbButton', array(
					'buttonType'=>'submit',
					'type'=>'warning',
					'icon'=>'search',
					'label'=>'GO',
				)); ?>
			   
			  <?php
			$this->endWidget();
			?>
<?php $this->endWidget(); ?>