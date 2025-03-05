<h1>Help Desk - Staff e-Portal</h1>
<ul>
<li><a href="#signin">How to login</a></li>
<li><a href="#updateprofile">How to update public profile</a></li>
<li><a href="#profileviews">Who is viewing your profile?</a></li>
<li><a href="#profilephoto">Changing profile photo</a></li>
<li><a href="#services">Links to staff services</a></li>
<li><a href="#websites">Links to special websites</a></li>
</ul>

<h2 id="signin">How to login</h2>
<p>Any staff member of TUK can sign in to his/ her account using <b>Payroll number</b> as username and <b>National ID number</b> as password.</p>
<p>You can change your password once you are logged into your account. </p>
<p>THOSE WHO ARE UNABLE TO LOGIN SHOULD INQUIRE WITH THE HUMAN RESOURCES OFFICE.</p>
<?php if(!isset(Yii::app()->user->id)):?>
<i class="icon-lock"> </i> <?php echo  CHtml::link(' Recover password here.', array('//portal/profile/recoverPassword'));?> | <i class="icon-user"> </i> <?php echo  CHtml::link('You can sign in here', array('//site/login'));?> | <i class="icon-home"> </i> <?php echo  CHtml::link('Go to home.', array('//portal/profile/home'));?>
<br />
<hr />
<?php endif;?>
<h2 id="updateprofile">How to update public profile</h2>
<p>Always make your profile up-to-date! This is because, your public profile is visible to search engine like Google, Bing, Yahoo!, among others. People who search for you will definitely access the information available 
on your profile.</p>
<p>In order to update your profile, first you must be logged in. The procedure for logging in is outlined on the <a href="#signin">Sign In </a> section.</p>
<p>Once logged in, you will seee various tabs showing different sections of your profile that you can edit. <span class="unread">Kindly note that your personal and academic qualifications can ONLY be updated at the Human Resource office.</span>
<img src="<?php echo Yii::app()->linkManager->staffMediaURL().'/profile-1.png';?>"/>
</p>
<p>After updates, you can always confirm how the public views your profile!
<img src="<?php echo Yii::app()->linkManager->staffMediaURL().'/profile-2.jpg';?>"/>
</p>
<h2 id="profileviews">Who is viewing your profile?</h2>
<p>You can always track how the public views your profile. To access this page, click on the tab 'Profile Views' once you are logged in.
 <img src="<?php echo Yii::app()->linkManager->staffMediaURL().'/profile-3.jpg';?>"/>
 </p>
 
 <h2 id="profilephoto">Changing profile photo</h2>
<p>You can also replace a photo that you do not want to appear on your public profile.
 <img src="<?php echo Yii::app()->linkManager->staffMediaURL().'/profile-4.jpg';?>"/>
 </p>
<h2 id="services">Links to Staff Services</h2>
<p>In order to quicly access various services pertaining to staff in TUK, this portal brings all the links together. These links are:</p>
 <table class="table table-condensed table-stripped">
  <tr>
    <td valign="top">
		<ul>
			<li>
				<a href='index.php?r=portal/ictServiceRequest/admin'> <span class='icon-book' ></span>&nbsp;&nbsp;&nbsp;ICT Service Request</a>: 
				This is a link that enables you to send support requests to the Directorate of ICT Services (DICTS). You can check status of your request from the page.
			</li>
			<li><a href='https://mail.tukenya.ac.ke/owa' target='_blank'> <span class='icon-envelope' ></span>&nbsp;&nbsp;&nbsp;Staff Office Email(@tukenya.ac.ke)</a>:
				This links to the new mail server for emails <b>*@tukenya.ac.ke</b>
			</li>
			<li><a href='http://ar.tukenya.ac.ke/class-list/' target='_blank'> <span class='icon-list' ></span>&nbsp;&nbsp;&nbsp;Class Lists</a>:
				This is a link to download student class lists.
				<?php if(!isset(Yii::app()->user->id)):?>
				KINDLY LOGIN TO SEE USERNAME AND PASSWORD FOR ACCESSING CLASS LISTS.
				<?php else:?>
				LOGIN CREDENTIALS: <span class="unread">EMAIL:<i>your email address</i> and PASSWORD:<i>acadreg</i></span>
				<?php endif;?>
				</li>
			<li><a href='https://staff.tukenya.ac.ke/index.php?r=portal/profile/documents' target='_blank'> <span class='icon-download-alt' ></span>&nbsp;&nbsp;&nbsp;Staff Official Documents</a>:
				This is a link to the official staff documents.
				<?php if(!isset(Yii::app()->user->id)):?>
				KINDLY LOGIN TO VIEW OFFICIAL STAFF DOCUMENTS.
				<?php endif;?>
				</li>
			<li><a href='index.php?r=portal/ictServiceRequest/suggestion'> <span class='icon-thumbs-up' ></span>&nbsp;&nbsp;&nbsp;Compliment/Complaint</a>:
				The Directorate of ICT Services is committed to satisfying users' expectations. Feel free to send a compliment or a complaint to the Directorate.
				</li>
			<li><a href='index.php?r=portal/profile/help' > <span class='icon-flag' ></span>&nbsp;&nbsp;&nbsp;Help Desk</a>:
				This links to the page you are currently viewing. You are able to access help tips on how maximize using the portal.
				</li>
		</ul>
	 </td>
	</tr>
</table>
<hr />
<h2 id="websites">Links to Special Websites</h2>
<table class="table table-condensed table-stripped">
	<tr>
	<td>
		<ul>
			<li><a href='http://tukenya.ac.ke' target='_blank'> <span class='icon-globe' ></span>&nbsp;&nbsp;&nbsp;&nbsp;University Main Website</a></li>
			<li><a href='http://library.tukenya.ac.ke' target='_blank'> <span class='icon-book' ></span>&nbsp;&nbsp;&nbsp;&nbsp;University Library Services</a></li>
			<li><a href='http://repository.tukenya.ac.ke:8080/' target='_blank'> <span class='icon-search' ></span>&nbsp;&nbsp;&nbsp;&nbsp;Institution Digital Repository</a></li>
		</ul>
	</td></tr>
	
</table>

	
	