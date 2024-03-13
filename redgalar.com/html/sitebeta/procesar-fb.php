<?php 

    if(!$fbUser){
        $fbUser = NULL;
        $loginURL = $facebook->getLoginUrl(array('redirect_uri'=>$redirectURL,'scope'=>$fbPermissions));  
    }else{
        //Get user profile data from facebook
        $fbUserProfile = $facebook->api('/me?fields=id,first_name,last_name,email,link,gender,locale,picture');
        
        //Initialize User class
        $user = new User();
        
        //Insert or update user data to the database
        $fbUserData = array(
            'oauth_provider'=> 'facebook',
            'oauth_uid'     => $fbUserProfile['id'],
            'first_name'     => $fbUserProfile['first_name'],
            'last_name'     => $fbUserProfile['last_name'],
            'email'         => $fbUserProfile['email'],
            'gender'         => $fbUserProfile['gender'],
            'locale'         => $fbUserProfile['locale'],
            'picture'         => $fbUserProfile['picture']['data']['url'],
            'link'             => $fbUserProfile['link']
        );
        $userData = $user->checkUser($fbUserData);

        $_SESSION['userData'] = $userData;

        $_SESSION['email'] = $userData['email'];

    }

 ?>