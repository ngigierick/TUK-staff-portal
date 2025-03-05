<style>
table.payslipview{
	width:400px;
}
table th{
	border-top:0px solid;
}
#sidebar{
	display:none;
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
	'action'=>Yii::app()->createUrl('//portal/profile/xzy5677G/'),
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
	var tuk_secure_api_url = "https://intake.tukenya.ac.ke/index.php?r=thirdParty/api/p9";//our api url 
	$("#submit").click(	function()	{ process();});
	function process(){	
		$.ajax
		({
			type: request,	
			contentType: cType,	
			dataType: dType,	
			jsonp: oAuthKey,	
			url: tuk_secure_api_url,	
			data: {pf: $( "#pf_number" ).val(),year: $( "#year" ).val() },
			beforeSend: function(x)
			{
				if(	x && x.overrideMimeType	) 
				{	x.overrideMimeType("application/j-son;charset=UTF-8");	}
					
					$("#st").html("<progress value='0' max='60' id='progressBar'></progress><br/><div style='color:navy;font-weight:bold'>Processing P9 for "+$( '#year' ).val()+". Please wait and be patient as this may take over 1 minute to complete.<b/></div> ");
			},
			success: function(	data	)
			{		
				str = data.statusMessage;
				if (str.length<100){ $("#st").html( str );  $("#download").html('');}		
				else{
					$("#xzy5677G").val(str);
					label = "Download Your P9 for "+$( "#year" ).val();
					//if display option is enabled
					if ($("#display").attr('checked')) 	$("#st").html(str);
					else 	$("#st").html("<span class='icon-ok'>&nbsp;</span><span class='read'>P9 Form generated but not displayed.</span>");
					$("#download").html('<input type="submit"  value="'+label+'" class="btn btn-danger btn-small"/>');
				} 
			},
			error: function(jqXHR, textStatus, errorThrown) { alert(errorThrown); alert(textStatus);}
		});
	}
	var timeleft = 60;
	var downloadTimer = setInterval(function(){
	  if(timeleft <= 0){
	    clearInterval(downloadTimer);
	  }
	  document.getElementById("progressBar").value = 60 - timeleft;
	  timeleft -= 1;
	}, 1000);

</script>
<h1>GENERATE P9 FORM</h1>
<table class="table table-condensed payslip">
	<tr class="header">
		<input type="hidden" name="pf_number" id="pf_number" value="<?php echo $model->pf_number;?>" />
		<input type="hidden" name="xzy5677G" id="xzy5677G" />
		<td>
			YEAR: <input type="text" name="year" id="year" value="<?php echo (date('Y')-1);?>"/>
		</td>
		<td>
			OPTION: <input type="checkbox" name="display" id="display" checked> Display 
		</td>
		<td>
			<input type="button" id="submit" onclick="process()" value="Submit" class="btn btn-success btn-medium"/>
			
		</td>
	</tr>
</table><br/>
<div id="st" > </div><br/>
<div id="download" > </div><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<?php $this->endWidget(); ?>