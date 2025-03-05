<script type="text/javascript">
		//CONFIGURATION SETTINGS
		var request = "GET";//GET method
		var cType = "application/json";//content type should be json
		var oAuthKey = "<?php echo $key;?>";//this is your private authentcation key
		var tuk_secure_api_url = "<?php echo $link;?>";//our api url 
		var dType = "jsonp";//exchanging json data 
		$(document).ready(	function(){ 
			getFile();
		});
		function getFile()
		{	
			$.ajax
			({
				type: request,	
				contentType: cType,	
				dataType: dType,	
				jsonp: oAuthKey,	
				url: tuk_secure_api_url,	
				data: {action:'query',url:'<?php echo $url;?>'},
				beforeSend: function(x)
				{
					if(	x && x.overrideMimeType	) 
					{	x.overrideMimeType("application/j-son;charset=UTF-8");	}
						$("<?php echo $div;?>").append("Connecting to the media site ...");
				},
				success: function(	data	)
				{				
					$("#st").html(data.statusMessage);  
				},
				error: function(	req,error	)
				{	$("<?php echo $div;?>").html("Error encountered while trying to connect to media site ! Error message: "+error); }
			});
		}	
		
</script>
