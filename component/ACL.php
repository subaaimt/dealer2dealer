<?php

Class ACL {

    public function __construct($reqeuestedaction, $action_access) {
        if (isset($action_access['anon'])) {
            if (in_array($reqeuestedaction, $action_access['anon'])) {
                if (isset($_SESSION['userdata'])) {
                    redirect('site/accessdenied');
                }
            }
        }

        if (isset($action_access['regis'])) {
            if (in_array($reqeuestedaction, $action_access['regis'])) {
                if (!isset($_SESSION['userdata'])) {
                    redirect('site');
                }
            }
        }
    }
    
    
    function expirestatus(){
        $user = new User;
        $userresult = $user->getUserProfile($_SESSION['userdata']['id']);
        if($userresult['memberExpiryDate'] <= time()){
        redirect('user/expired');
    }
    }

 

}

?>
