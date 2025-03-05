<?php 
//component for managing links
class LinkManager extends CApplicationComponent
{
 	private $_mainLinks;
	private $_subLinks;
	//displays side bar navigation links
   public function displaySideBarLinks($controller){
	   $controller->widget('ext.verticalmenu2levels.VerticalMenu2Levels', $this->getLinks());
   }
   //get the links
   public function getLinks(){
	  return array('menu' => $this->setMenus() );                                                                       
   }
   public function homeLinks(){
		$user_id = empty(Yii::app()->user->id)?0:Yii::app()->user->id;
		$command = Yii::app()->db->createCommand("SELECT label_name, url, icon, pol_staff_menu_link.id,  COUNT(*) AS num FROM pol_staff_menu_access, pol_staff_menu_link WHERE menu_id=pol_staff_menu_link.id AND user_id=".$user_id." AND pol_staff_menu_link.id!=11 GROUP BY label_name, url, icon, pol_staff_menu_link.id ORDER BY num DESC LIMIT 5");
		$str = "";
		$ids[] = 0;
		foreach($command->queryAll() as $row) {
			$links = array();
			$links['url'] = Yii::app()->createUrl($row['url']);
			$links['label'] = $row['label_name'];
			$links['icon'] = $row['icon'];
			$ids[] = $row['id'];
			$str .= $this->setHomeLink($links);
		}
		
		$str .= $this->setOtherHomeLink($ids);
	   return $str;
   }
    //retrieve favourites
   public function favourites($opt=''){
		$user_id = empty(Yii::app()->user->id)?0:Yii::app()->user->id;
		$command = Yii::app()->db->createCommand("SELECT label_name, url, icon,  COUNT(*) AS num FROM pol_staff_menu_access, pol_staff_menu_link WHERE menu_id=pol_staff_menu_link.id AND user_id=".$user_id." AND pol_staff_menu_link.id!=11 GROUP BY label_name, url, icon ORDER BY num DESC LIMIT 5");
		if (empty($opt)) $mainLinks[] = array('label'=>'Favourite Links');
		else $mainLinks[] = array();
		foreach($command->queryAll() as $row) {
			$links = array();
			$links['url'] = Yii::app()->createUrl($row['url']);
			$links['label'] = $row['label_name'];
			if (empty($opt)) $links['icon'] = $row['icon'];
			$mainLinks[]  = $links;
			
		}
	   return $mainLinks;
   }
   public function quickLinks($opt=''){		
		$topLinks	= $this->queryLinks("parent_id=1 AND url!='#'");
		if (empty($opt)) $mainLinks[] = array('label'=>'Quick Links');
		else $mainLinks[] = array();
		for($i=0;$i<count($topLinks);$i++){
			$links = array();
			$links['url'] = Yii::app()->createUrl($topLinks[$i]->url);
			$links['label'] = $topLinks[$i]->label_name;
			if (empty($opt))$links['icon'] = $topLinks[$i]->icon;
			$mainLinks[]  = $links;
		}
		return $mainLinks;
   }
    public function services($opt=''){		
		$topLinks	= $this->queryLinks("parent_id=2 AND url!='#'");
		if (empty($opt)) $mainLinks[] = array('label'=>'Portal Services Links');
		else $mainLinks[] = array();
		for($i=0;$i<count($topLinks);$i++){
			$links = array();
			$links['url'] = Yii::app()->createUrl($topLinks[$i]->url);
			$links['label'] = $topLinks[$i]->label_name;
			if (empty($opt))$links['icon'] = $topLinks[$i]->icon;
			$mainLinks[]  = $links;
		}
		return $mainLinks;
   }
   public function webLinks($opt=''){	
		 $l = Yii::app()->utility->visitPageUrl(); 
		$topLinks	= $this->queryLinks("parent_id=3 AND url!='#'");
		if (empty($opt)) $mainLinks[] = array('label'=>'Special Sites');
		else $mainLinks[] = array();
		for($i=0;$i<count($topLinks);$i++){
			$links = array();
			$links['url'] = $l.$topLinks[$i]->url;
			$links['label'] = $topLinks[$i]->label_name;
			if (empty($opt))$links['icon'] = $topLinks[$i]->icon;
			$mainLinks[]  = $links;
		}
		return $mainLinks;
   }
   public function setHomeLink($links){
	   return  "<a href='".$links['url']."'>
				<div class='span2 icon'>
					<span class='icon-".$links['icon']."' ></span><br />".$links['label'].
				"</div></a>";
   }
   public function setOtherHomeLink($ids){
	   $topLinks	= $this->queryLinks("(parent_id=3 OR parent_id=4) AND url!='#'",$ids);
	   $str = '';
		for($i=0;$i<count($topLinks);$i++){
			$links = array();
			$links['url'] = $topLinks[$i]->url;
			$links['label'] = $topLinks[$i]->label_name;
			$links['icon'] = $topLinks[$i]->icon;
			$str .= $this->setHomeLink($links);
		}
		return $str;
   }
   public function queryLinks($condition,$array=''){
		$criteria=new CDbCriteria;
		$criteria->order = 'weight ASC';
		$criteria->condition = $condition;
		if (!empty($array)) $criteria->addNotInCondition('t.id',$array);
		return StaffMenuLink::model()->findAll($criteria);
   }
   //save access
   public function recordMenuAccess(){
		$menu =  $this->relativeUrl();
		SiteConfig::recordHeartBeat(5);
		if (empty(Yii::app()->user->id)) $user = -1;
		else $user = Yii::app()->user->id;
		if (isset($menu->id)){
			$access = new StaffMenuAccess();
		    $access->menu_id = $menu->id;
			$access->user_id = $user;
			$access->yr = date('Y');
			$access->mt = date('m');
			$access->dy = date('d');
			$access->hr = date('H');
			$access->mn = date('i');
			$access->se = date('s');
			$access->date_modified = time();
			if(!$access->save()) {echo CHtml::errorSummary($access);exit;}
			$details = "Accessed the link: ".$menu->label_name;
			UserActivity::record("view",$details);
		}
   }
   //extract relative path
   public function relativeUrl(){
		$app = Yii::app();
		$url = substr($app->request->url, strlen($app->baseUrl.'/index.php?r='));
		return StaffMenuLink::model()->find('lower(url)=?',array(strtolower($url)));
   }
  public function staffDocumentsFolder(){
		return 'staff/images/docs';
	}
  public function siteURL(){
		return 'https://staff.tukenya.ac.ke';
	}
  public function mediaBaseURL(){
		return 'https://media.tukenya.ac.ke';
	}
  public function staffMediaURL(){
		return 'https://media.tukenya.ac.ke/staff';
	}
  public function mediaUploadURL(){
		return 'https://media.tukenya.ac.ke/staff/documents';
	}
 public function staffPrivateFolder(){
		return Yii::app()->basePath.'/../../media/staff/';
	}
 public function staffPublicFolder(){
		return Yii::app()->basePath.'/../../public/staff/';
	}
 
  
}
?>

