<?php

class Home extends Controller{
    public function __construct(){
        
    }

    public function index(){
       

        $membershipProvider = new MembershipProvider();

        $membershipProvider->startSession();

        $this->view('Home/home_view');
    }
}

?>