<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TDD_model extends CI_Model{
    
    public function __construct() 
    {
        parent::__construct();

        //Load the database helper
        $this->load->database();
    }

 
    public function say_hello() : int {
    	return (int) "Hello World";
    }

    public function get_type() : string {
        return (string) gettype($this->db->get("students"));
    }

    /**
     * ADD YOUR 10 test(s) BELOW..
     */

}