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
class survey_model extends CI_Model {

    public function __construct() {
        $this->load->database();
        $this->load->library('session');
    }

    //Insert data into mysql database
    public function insert_survey() {

        $data = array(
            'id' => 0,
            'name' => $this->input->post('name'),
            'company' => $this->input->post('company'),
            'contact' => $this->input->post('contact'),
            'email' => $this->input->post('email'),
            'consultant' => $this->input->post('consultant'),
            'p_communication' => $this->input->post('p_communication'),
            'p_money' => $this->input->post('p_money'),
            'p_company' => $this->input->post('p_company'),
            'recommend' => $this->input->post('recommend'),
            'feedback' => $this->input->post('feedback')
        );

        return $this->db->insert('globalimsa_survey', $data);
    }

    public function getsuvery() {
        $query = $this->db->get("globalimsa_survey");
        return $query->result();
    }

}

?>
