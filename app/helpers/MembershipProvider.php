<?php



//ACCESS FROM THE FRONT END PAGES


//is for users to start a session so they can stay loged in
class MembershipProvider {

  

  //checks if there is a session going, and returns true or false accordintly
    public function loggedIn(){

    

      //the $_SESSION is set in the Login class
	    if(isset($_SESSION['username']))

        if(!empty($_SESSION['username']))
                return true;
         
        else 
            return false;

    }	

    //starts a session
    public function startSession(){
      
		session_name("user_session");

		session_start() != FALSE or die("Could not start session");
  

    }

}

?>