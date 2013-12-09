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
        $this->load->helper('html');
        $this->load->library('form_validation');
        $this->load->model('survey_model');       
     
    }
    
    //controller for the main index page survey
    public function index()
	{
		$this->load->view('survey');
	}
        
        //survey form 
        public function add_survey(){
            
             if ($this->input->post('Submit')) {
                    
                $this->survey_model->insert_survey();
               $this->load->view('survey');
                 
            } else {          
         
                 
                $this->index();
            }
        
        }
        
        //get survey data
        public function view_survey(){
            
            $data['json'] = $this->survey_model->getsurvey();
            if(!$data['json']) show_404 ();
            
            $this->load->view('results', $data);
            
        }
        //get survey data
        public function form(){
            
            $data['json'] = $this->survey_model->getsuvery();
            if(!$data['json']) show_404 ();
            
            $this->load->view('results', $data);
            
        }
}

?>
