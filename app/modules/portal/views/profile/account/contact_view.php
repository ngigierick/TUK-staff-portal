<div class="span12">
	<h3>Contact & Related Information</h3>
	<table class="table account table-bordered">
	
	<tr><td class="lbl span3">Official Email Address:</td><td><?php echo $contact->office_email;?></td></tr>
	<tr><td class="lbl span3">Office Telephone:</td><td><?php echo $contact->office_telephone;?></td></tr>
	<tr><td class="lbl span3">Profession/Interest Areas:</td><td><?php echo $contact->interest_area;?></td></tr>
	<tr><td class="lbl span3">Personal Primary Telephone Number:</td><td><?php echo $contact->mobile;?></td></tr>
	<tr><td class="lbl span3">Personal Alternative Telephone Number:</td><td><?php echo $contact->mobile2;?></td></tr>
	<tr><td class="lbl span3">Personal Primary Email Address:</td><td><?php echo $contact->email;?></td></tr>
	<tr><td class="lbl span3">Personal Alternative Email Address:</td><td><?php echo $contact->email2;?></td></tr>
	<tr><td class="lbl span3">Postal Address:</td>
	<td><?php echo $contact->postal_address;?> <?php echo $contact->postal_code;?> <?php echo $contact->town;?></td>
	</tr>
	<tr> <td colspan="2">
	<h3><span class="unread">If you find these details to be wrong,
	<?php echo CHtml::link('<span id="btn btn-primary btn-large" > please correct them here...</span>  ', array('//portal/profile/contacts'));?>
	</span></h3>
	</td>
	</tr>
	</table>
</div>