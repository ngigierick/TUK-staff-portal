<?php 
class WebUser extends CWebUser
{
    /**
     * Overrides a Yii method that is used for roles in controllers (accessRules).
     *
     * @param string $operation Name of the operation required (here, a role).
     * @param mixed $params (opt) Parameters for this operation, usually the object to access.
     * @return bool Permission granted?
     */
	 
	//public $this->profileUrl = Yii::app()->createUrl('/user/user',array('id'=>1));
	
    public function checkAccess($operation, $params=array())
    {
        if (empty($this->id)) {
            // Not identified => no rights
            return false;
        }
        $role = $this->getState("role");
        if ($role === 1) {
            return true; // admin role has access to everything
        }
        // allow access if the operation request is the current user's role
        return ($operation === $role);
    }
	
	
}