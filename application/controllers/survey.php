<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of survey
 *
 * @author Masande
 */
class Survey extends CI_Controller{
   
    
    //Constructor that calls everything we our going to need
      public function __construct(){
          
          parent::__construct(); 

        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('survey_model');       
     
    }
    
    //controller for the main index page survey
    public function index()
	{
		$this->load->view('survey');
	}
        
        //survey form 
        public function survey(){
            
        }
        
        //get survey data
        public function view_survey(){
            
            $data['json'] = $this->survey_model->getsurvey();
            if(!$data['json']) show_404 ();
            
            $this->load->view('results', $data);
            
        }
}

?>