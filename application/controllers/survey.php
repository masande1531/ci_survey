<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of survey
 *
 * @author Masande
 */
class Survey extends CI_Controller {

    //Constructor that calls everything we our going to need
    public function __construct() {

        parent::__construct();

        $this->load->helper(array('form', 'url'));
        $this->load->helper('html');
        $this->load->library('form_validation');
        $this->load->model('survey_model');
    }

    //controller for the main index page survey
    public function index() {
        $this->load->view('survey');
    }

    //survey form 
    public function add_survey() {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('company', 'Company', 'required');
        $this->form_validation->set_rules('contact', 'Contact', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('consultant', 'Consultant', 'required');
        $this->form_validation->set_rules('p_communication', 'P_communication', 'required');
        $this->form_validation->set_rules('p_money', 'P_money', 'required');
        $this->form_validation->set_rules('p_company', 'P_company', 'required');
        $this->form_validation->set_rules('p_money', 'P_money', 'required');
        $this->form_validation->set_rules('p_company', 'P_company', 'required');
        $this->form_validation->set_rules('recommend', 'Recommend', 'required');
        $this->form_validation->set_rules('feedback', 'Feedback', 'required');
        
        /*Validate the form
         * If the are errors redirect to survey page and print errors
         * Else insert into the database
         */
        if ($this->form_validation->run() == FALSE) {
            echo 'Error not inserted';
            $this->index();
        } else {
            echo 'You have inserted your survey';
            $this->survey_model->insert_survey();
            $this->load->view('survey');
        }
    }
     
    /*Function
     */
    //get survey data
    public function view_survey() {

        $data['json'] = $this->survey_model->getsurvey();
        if (!$data['json'])
            show_404();

        $this->load->view('results', $data);
    }

    //get survey data
    public function form() {

        $data['json'] = $this->survey_model->getsuvery();
        if (!$data['json'])
            show_404();

        $this->load->view('results', $data);
    }

}

?>
