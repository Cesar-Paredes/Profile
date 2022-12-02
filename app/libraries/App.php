<?php



class App{

    protected $currentController = 'Home'; 
    protected $currentMethod = 'index'; 
    protected $params = [];    


    //CONSTRUCTOR //////////////////////////////////////////////////////////
    public function __construct(){
        $url = $this->parseURL(); //calls the parseURL method that belongs in this class,
        //it will make the $url an array and ready
      
        //checks the first element of the $url array
        if(file_exists('../app/controllers/'.$url[0].'.php')){ 
            $this->currentController = $url[0]; //store the url first element in currentController variable
          
            unset($url[0]); //now destroys the first element
           
        }

     
        //Require the controller class 
        require_once '../app/controllers/'. $this->currentController.'.php';
        
        //Instantiate the currentController class
        $this->currentController = new $this->currentController; // Home = new Home
       
        if(isset($url[1])){
       
            if(method_exists($this->currentController,$url[1])){
                $this->currentMethod = $url[1];
              
                unset($url[1]);
               
            }
        }
       
        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }


    public function parseURL(){

        if(isset($_GET['url'])){
           
            $url = rtrim($_GET['url'],'/');//it will take all the "/" in the url
           
            $url = filter_var($url, FILTER_SANITIZE_URL); 
            $url = explode('/',$url);
           
            return $url; 
        }
    }
}

