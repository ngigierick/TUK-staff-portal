<?php

Yii::import('application.modules.setup.models._base.BaseSiteConfig');

class SiteConfig extends BaseSiteConfig
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	public static function recordHeartBeat($id){
		$site = SiteConfig::model()->findByPk($id);
		if (isset($site->id)){
			$site->last_heart_beat = time();
			$site->save();
		}
	}
	public static function toggleError($id,$st){
		$site = SiteConfig::model()->findByPk($id);
		if (isset($site->id)){
			$site->error = $st;
			$site->save();
		}
	}
	function pluralize( $count, $text ) { 
		return $count . ( ( $count == 1 ) ? ( " $text" ) : ( " ${text}s" ) );
	}
	
	public function status(){
		$dtm = new DateTime("@".$this->last_heart_beat); ;
		$interval = date_create('now')->diff( $dtm);
		$suffix = ( $interval->invert ? ' ago' : '' );
		if ( $interval->y >= 1 ) return '<span class="unread">Last accessed '.$this->pluralize( $interval->y, 'year' ) . $suffix." | there is a serious problem!</span>";
		if (  $interval->m >= 1 ) return '<span class="pending2">Last accessed '.$this->pluralize( $interval->m, 'month' ) . $suffix." | there is a problem!</span>";
		if (  $interval->d >= 1 ) return '<span class="pending2">Last accessed '.$this->pluralize( $interval->d, 'day' ) . $suffix." | there is a slight problem!</span>";
		if ( $interval->h >= 1 ) return '<span class="olive">Last accessed '.$this->pluralize( $interval->h, 'hour' ) . $suffix." | there maybe a slight problem!</span>";
		if ( $interval->i >= 1 ) return '<span class="teal">Last accessed '.$this->pluralize( $interval->i, 'minute' ) . $suffix." | system is somehow okay!</span>";
		return '<span class="read"> Last accessed '.$this->pluralize( $interval->s, 'second' ) . $suffix." | system is okay!</span>";
	}
	public static function heartBeats(){
		$systems = SiteConfig::model()->findAll(array('order'=>'id ASC'));
		$str ="<table class='table table-condensed table-stripped'>
		<tr><th class='right'>CURRENT TIME:</th><td colspan='3'>".date("g:i A - M j, Y ")."</td></tr>
		<tr><th>SYSTEM NAME</th><th>LAST HEART BEAT</th><th>STATUS</th><th>ERROR DISPLAY</th></tr>";
		for($i=0;$i<count($systems);$i++){
			$s = $systems[$i];
			$str .= "<tr><td class='navy bold'>".strtoupper($s->name)."</td><td>".date("g:i A | M j, Y ",$s->last_heart_beat)."</td><td>".$s->status()."</td><td>".$s->error()."</td></tr>";
		}
		$str .= EmailNotification::email();
		return $str . "</table>";
	}
	public function error(){
		if ($this->error==0)
			return "<span class='read'>Off</span>
			<a href='".Yii::app()->createUrl('//user/log/on',array('id'=>$this->id))."' class='btn-small btn-danger'>Activate</a>";
			return "<span class='unread'>On</span>
			<a href='".Yii::app()->createUrl('//user/log/off',array('id'=>$this->id))."' class='btn-small btn-success'>Deactivate</a>";
	}
	public static function testMode(){
		$ip = Yii::app()->getRequest()->getUserHostAddress();
		if ($ip=='127.0.0.1') return 'local';
		return 'live';
	}
	
}
