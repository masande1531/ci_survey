<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of survey_model
 *
 * @author Masande
 */
class survey_model  extends CI_Model{
    
    public function __construct() {
        $this->load->database();
        $this->load->library('session');
    }
    
    //Insert data in mysql database
    public function insert_survey(){
        
         $data = array(
                'id' => 0,
                'name' => $this->input->post('name'),
               'company' => $this->input->post('company'),
               'contact' => $this->input->post('contact'),
               'email' => $this->input->post('email'),
               'name' => $this->input->post(),
               'r_subject' => $this->input->post('subject'),
            'r_location' => $this->input->post('location'),
            'r_details' => $this->input->post('details'),
            'r_status' => 0
        );

        return $this->db->insert('reports', $data);
    }

    public function getsuvery(){
        $query = $this->db->get("globalimsa_survey");
        return $query->result();
    }
}

?>
