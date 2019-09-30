<?php
	/*
	 *  Base Controller
	 *  Load the models and views
    */
    class Controller {
    	// Load model
    	public function model($model){
    		// Require model file
    		require_once '../app/models/' . $model . '.php';


    		// Instatiate model
    		return new $model();
    	}

    	// Load view
    	public function view($view, $data = []){
    		// Check for the view file
    		if(file_exists('../app/views/' . $view . '.php')){

                if(!isset($data['lang']['main'])){
                    require_once("../app/languages/" . LANGUAGE . "/_main.php");
                    /* $lang is an array that is defined in the language file. */
                    $data['lang']['main'] = $lang;
                 }
         
                /* require view specific lang file */ 
                if(!isset($data['lang'][$view])){
                    $viewName = end(explode('/', $view));
                    $viewFile = "../app/languages/" . LANGUAGE . "/". $viewName .".php";
                    if(file_exists($viewFile)){
                        require_once($viewFile);
                        $data['lang'][$viewName] = $lang;
                    }
                }

    			require_once '../app/views/' . $view . '.php';
    		}else{
    			// View does not exist
    			die('View does not exist');
    		}
    	}
    }
