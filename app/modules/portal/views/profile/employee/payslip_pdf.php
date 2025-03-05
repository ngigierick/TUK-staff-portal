<style>
/* printing */
body{
	font:78.25%/1.231  'Arial',tahoma,verdana,arial,sans-serif;
	font-size:11px;
}
table.payslipview{
	border:1px solid #888;
	border-spacing: 0;
}
table.payslipview td
{
	font:78.25%/1.231  'Arial',tahoma,verdana,arial,sans-serif;
	font-size:11px;
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
th.read, td.read{
	color:green;
}
th.unread, td.unread{
	color:brown;
}
span.num{
	color:#555;
	font-style:italic;
	font-size:10px;
	letter-spacing: 5px;
	
}
.wrapper{
	border:1px solid #fff;
}
#wrap {
    background: #fff url("https://media.tukenya.ac.ke/general/payslip.jpg") no-repeat  left center;
    margin: 0 auto;
    padding: 0 5px;

}

/* end print */
</style>


<div id="wrap"><center><?php echo $data;?></center></div>






