<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * This is a results controller to display json data
 * 
 */

/**
 * Description of results
 *
 * @author Masande
 */
class Results extends CI_Controller{
    
    public function index()
	{
             $this->load->model('survey_model');      
            $data['json'] = $this->survey_model->getsuvery();
            if(!$data['json']) show_404 ();
            
            $this->load->view('results', $data);
	}
}

?>
