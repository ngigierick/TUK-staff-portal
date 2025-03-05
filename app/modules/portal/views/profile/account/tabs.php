<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	$model->surname.' '.$model->firstname.' '.$model->othername,
);


?>
<?php
 $this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
        'fade'=>true, // use transitions?
        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
        'alerts'=>array( // configurations per alert type
            'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
			'error'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
			'warning'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
        ),
	)
); 

?>

<?php $count = $messages['count'];?>
<?php if ($count>0):?>
<?php echo $messages['txt'];?>
<?php endif;?>

<div class="profile">


<?php 
	
	//structure passport photo url
	if (empty($model->photo)){
		
		$photo = str_replace("/", "-", $model->reg_number).'.JPG';
		$photo = 'http://192.168.100.50/images/student/'.$photo;
	}	
	else{
		
		 $photo = $model->photo;
		 $photo = Yii::app()->getBaseUrl(true).'/images/passports/'.$photo;
	}
		
	echo CHtml::image($photo,'Passport photo not yet submitted',array('height'=>150,'class'=>'passport')); 

?>



</div>

<h1><?php echo GxHtml::valueEx($model->title).' '.GxHtml::encode($model->surname.' '.$model->firstname.' '.$model->othername); ?></h1>

<?php if ($model->semester_id==47):?>
<i class="icon-pencil"> </i> &nbsp;&nbsp;New passport photo?&nbsp;
<?php echo  CHtml::link('Upload here. ', array('//portal/profile/passport'));?>
<?php endif;?>
<?php if ($model->semester_id<47):?>
<?php $this->widget('bootstrap.widgets.TbButton', array(
			        'type'=>'danger',
			        'size'=>'small',
					'icon'=>'pencil',
			        'label'=>'APPLY FOR A POSITION IN SATUK 2014/2015 GENERAL ELECTIONS!',
					'url'=>array('//portal/studentAspirant/apply'),
)); ?>
<?php endif;?>
<hr />



<div class='btn-group'>
<?php 

$this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Update Profile Details',
    'type'=>'success', 
    'size'=>'medium', 
	'url'=>array('update'),
)); 

?>
</div>

		
<?php 
$string = "";
//process results
if (count($results)>0):?>

	<?php 
	$string = "<table class='results table bordered stripped'>";
	foreach($year as $y){

		$r = $results[$y];
		if (!empty($r[0]->id)){
			$string .= "<tr><td colspan='3' class='lbl2'>Year ".$y."</td></tr>";
			$string .= "<tr><td class='lbl2'>Course Code</td><td class='lbl2'>Course Description</td><td class='lbl2'>Grade</td></tr>";
			for($j=0;$j<count($r);$j++)
			$string .= "<tr><td>".$r[$j]->courseUnit->code."</td><td>".$r[$j]->courseUnit->name."</td><td>".$r[$j]->grade."</td></tr>";
		}

	}

	$string .= "</table>";
	?>
	
<?php endif;?>

<?php
$this->widget('bootstrap.widgets.TbTabs', array(
    'type'=>'tabs',
    'placement'=>'above', // 'above', 'right', 'below' or 'left'
    'tabs'=>array(
	array(
		'label'=>'Personal Details', 
		'content'=>
			
			"
			<table >
			<tr>
			<td style='vertical-align:top'>
			<table class='account'>
			<tr><td class='lbl'>Salutation:</td><td>".$model->title."</td></tr>
			<tr><td class='lbl'>Surname:</td><td>".$model->surname."</td></tr>
			<tr><td class='lbl'>First Name:</td><td>".$model->firstname."</td></tr>
			<tr><td class='lbl'>Other Names:</td><td>".$model->othername."</td></tr>
			<tr><td class='lbl'>Gender:</td><td>".$model->gender."</td></tr>
			<tr><td class='lbl'>Date of Birth:</td><td>".$model->dob."</td></tr>
			<tr><td class='lbl'>ID Number:</td><td>".$model->id_number."</td></tr>
			<tr><td class='lbl'>Religion:</td><td>".$model->religion."</td></tr>
			<tr><td class='lbl'>Nationality:</td><td>".$model->nationality."</td></tr>
			<tr><td class='lbl'>County:</td><td>".$model->county."</td></tr>
			<tr><td class='lbl'>District:</td><td>".$model->district."</td></tr>
			<tr><td class='lbl'>Having disability:</td><td>".$model->disability."</td></tr>
			<tr><td class='lbl'>Extra Info:</td><td>".$model->extra_info."</td></tr>
			</table>
			</td>
			<td width='350' align='right' style='vertical-align:top;padding-left:30px;border-left:1px dotted #efefef'>
			<h3>Useful Information Links</h3><hr/>
			<ul style='list-style:none'>
			<li class='icon-globe' >&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://tukenya.ac.ke' target='_blank'>University Main Website</a></li><br />
			<li class='icon-book'>&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://library.tukenya.ac.ke' target='_blank'>University Library Website</a></li><br />
			<li class='icon-briefcase'>&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://ar.tukenya.ac.ke' target='_blank'>Students' Fees Portal</a></li><br />
			<li class='icon-download-alt'>&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://tukenya.ac.ke/dean_of_students' target='_blank'>Students' Important Downloads</a></li><br />
			<li class='icon-envelope'>&nbsp;&nbsp;&nbsp;&nbsp;<a href='https://sites.google.com/a/students.tukenya.ac.ke' target='_blank'>Students Official Email through Google</a></li><br />
			</ul>".'<br/><br/>
			<h3>Join our Social Network </h3><hr/>
		<div id="social-bar" class="<?=$this->style;?>-align clearfix" style="top:<?=$this->top;?>%">
		  <div class="social-media-icon <?=$this->style;?>-align">
			<a class="icon-facebook" target="_blank" href="http://www.facebook.com/pages/Technical-University-of-Kenya/521080071256112?ref=hl"></a><a class="icon-twitter" target="_blank" href="http://www.twitter.com/TU_Kenya"></a><a class="icon-google-plus" target="_blank" href="http://www.youtube.com/channel/UCIXSdHCnWl8DIzvyjzFuMJw"></a>  </div>
		</div>'."	
			</td>
			</tr>
			</table>
			"
		,
		'active'=>true),
      
        array(
		'label'=>'Academic Information', 
		'content'=>
			"<table class='account'>
			<tr><td class='lbl'>Registration Number:</td><td>".$model->reg_number."</td></tr>
			<tr><td class='lbl'>Course name:</td><td>".$model->programme."</td></tr>
			<tr><td class='lbl'>Class Code:</td><td>".$model->class_code."</td></tr>
			<tr><td class='lbl'>University semester of admission:</td><td>".$model->semester."</td></tr>
			<tr><td class='lbl'>Current year of study:</td><td>".$model->current_year_of_study."</td></tr>
			<tr><td class='lbl'>Current semester/term of study:</td><td>".$model->current_sem_of_study."</td></tr>
			<tr><td class='lbl'>Expected date of completion:</td><td>".$model->expected_completion_date."</td></tr>
			</table>"
		),
		
        array(
		'label'=>'Contact Details', 
		'content'=>
			"<table class='account'>
			<tr><td class='lbl'>Postal Address:</td><td>".$model->postal_address." ".$model->postcode." ".$model->town."</td></tr>
			<tr><td class='lbl'>Mobile phone number:</td><td>".$model->mobile."</td></tr>
			<tr><td class='lbl'>Personal Email:</td><td>".$model->email."</td></tr>
			<tr><td class='lbl'>Official Email:</td><td>".$email."</td></tr>
			
			
			</table>
			<hr />
			<table class='account'>
			<tr><td class='lbl'>Email Address:</td><td style='color:green'>".$email."</td></tr>
			<tr><td class='lbl'>Default Password:</td><td style='color:red'>".$password."</td></tr>
			
			<tr><td></td><td><i class='icon-envelope'> &nbsp;</i>&nbsp;&nbsp;&nbsp;<a target='_blank' href='https://mail.google.com/a/students.tukenya.ac.ke'>Login to your Student's Official Email Account </a></td></tr>
			
			</table>"
		),
		array(
		'label'=>'Next of Kin', 
		'content'=>
			"<table class='account'>
			<tr><td class='lbl'>Next of Kin Name:</td><td>".$model->nokTitle." ".$model->nok_surname." ".$model->nok_firstname." ".$model->nok_othername."(".$model->nokRelation.")</td></tr>
			<tr><td class='lbl'>Next of Kin Postal Address:</td><td>".$model->nok_postal_address." ".$model->nok_postcode." ".$model->nok_town."</td></tr>
			<tr><td class='lbl'>Next of Kin Phone number:</td><td>".$model->nok_mobile."</td></tr>
			<tr><td class='lbl'>Next of Kin Email address:</td><td>".$model->nok_email."</td></tr>
			</table>"
		),
		array(
		'label'=>'Employment', 
		'content'=>
			"<table class='account'>
			<tr>
			<td>".$model->occupation." - ".$model->employer."
			<br/>".$model->employer_address." 
			<br />".$model->employer_telephone."
			<br />".$model->employer_email."
			<br />".$model->employer_otherinfo."
			</td></tr>
			</table>"
		),
		array(
		'label'=>'Exam Results', 
		'content'=>
			"<table class='account'>
			<tr><td><span class='notes'>Kindly confirm with your faculty if you are unable to see your Examination results</td></tr>
			<tr><td><span class='errors'>".$string."</td></tr>		
			</table>"
		)
    ),
)); ?>

<br/><br/><br/>
