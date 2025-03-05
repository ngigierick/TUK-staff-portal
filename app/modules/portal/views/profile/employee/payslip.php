<style>
table.payslipview{
	width:400px;
}
#page table.payslipview td,
#page table.payslipview th
{
	font:78.25%/1.231  'Arial',tahoma,verdana,arial,sans-serif;
	font-size:12px;
	padding:2px 7px;
	border-top:1px solid #888 !important;
}
#page td.right{
	text-align: right;
}
th.olive, td.olive{
	color:olive;
	font-size:14px;
}
th.navy, td.navy{
	color:navy;
}
th.teal, td.teal{
	color:teal;
}
</style>
<?php 
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl('//portal/profile/xzy5677/'),
    'id'=>'searchForm',
    'type'=>'search',
     'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); 
?>
<?php $this->renderPartial("//site/common/notifications"); ?>

<script type="text/javascript">
	var request = "GET";//GET method
	var cType = "application/json";//content type should be json
	var dType = "jsonp";//exchanging json data 
	var oAuthKey = "999connxEquity3102key172tuk";//this is your private authentcation key
	var tuk_secure_api_url = "https://intake.tukenya.ac.ke/index.php?r=thirdParty/api/payslip";//our api url 
	$("#submit").click(	function()	{ process();});
	function process(){	
		$.ajax
		({
			type: request,	
			contentType: cType,	
			dataType: dType,	
			jsonp: oAuthKey,	
			url: tuk_secure_api_url,	
			data: {pf: $( "#pf_number" ).val(),  month: $( "#month" ).val(), year: $( "#year" ).val() },
			beforeSend: function(x)
			{
				if(	x && x.overrideMimeType	) 
				{	x.overrideMimeType("application/j-son;charset=UTF-8");	}
					
					$("#st").html("<div id='progressbar' style='color:navy;font-weight:bold'><div class='grid-view-loading progress-label'> &nbsp;</div> Processing Payslip for "+$( '#month' ).val()+" "+$( '#year' ).val()+"...Please wait.</div> ");
			},
			success: function(	data	)
			{		
				str = data.statusMessage;
				if (str.length<100){ $("#st").html( str );  $("#download").html('');}		
				else{
					$("#xzy5677").val(str);
					label = "Download Your Payslip for "+$( "#month" ).val()+" "+$( "#year" ).val();
					//if display option is enabled
					if ($("#display").attr('checked')) 	$("#st").html(str);
					else 	$("#st").html("<span class='icon-ok'>&nbsp;</span><span class='read'>Payslip generated but not displayed.</span>");
					$("#download").html('<input type="submit"  value="'+label+'" class="btn btn-danger btn-small"/>');
				} 
			},
			error: function(jqXHR, textStatus, errorThrown) { alert(errorThrown); alert(textStatus);}
		});
	}
</script>
<?php	 $months = array("JANUARY","FEBRUARY","MARCH","APRIL","MAY","JUNE","JULY","AUGUST","SEPTEMBER","OCTOBER","NOVEMBER","DECEMBER"); ?>
<h1>PAYSLIP INFORMATION</h1>
<table class="table table-condensed payslip">
	<tr class="header">
		<td>MONTH 
			<select name="month" id="month">
				<?php for ($m=0;$m<count($months);$m++): $selected=''; if ($months[$m] == strtoupper(date('F'))) $selected="selected='selected'"; ?>
					<option <?php echo $selected;?> value="<?php echo $months[$m];?>"><?php echo $months[$m];?></option>
				<?php endfor;?>
			</select>
			<input type="hidden" name="pf_number" id="pf_number" value="<?php echo $model->pf_number;?>" />
			<input type="hidden" name="xzy5677" id="xzy5677" />
			
		</td>
		<td>
			YEAR <input type="text" name="year" id="year" value="<?php echo date('Y');?>"/>
		</td>
		<td>
			OPTION <input type="checkbox" name="display" id="display"> Display 
		</td>
		<td><br />
			<input type="button" id="submit" onclick="process()" value="Submit" class="btn btn-success btn-medium"/>
			
		</td>
	</tr>
	<tr><td colspan="2"><div id="st" > </div></td><td><div id="download" > </div></td></tr>
</table>
<?php $this->endWidget(); ?>

<a href="index.php?r=/portal/profile/p9">
	<?php echo StaffHelper::kraPic();?>
	Download P9 Form
</a>