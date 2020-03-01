<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class TDD_EXAMPLE_controller extends CI_Controller {

	public function __construct() 
    {
        parent::__construct();

        //Load Unit test library
        $this->load->library('unit_test');

        //Load session helper
        $this->load->library('session');
        
    }

    public function index()
    {
        $this->test_logged_in();
        $this->test_set_session();
        $this->test_get_session();
        $this->test_unset_session();
        $this->test_logout();
    }

     /**
     * 1.) Identify the requirement.
     */
    


    /**
     * 2.) Write a test for automation.
     * 3.) Execute tests and ensure that the newer tests fail (red color).
     */
    public function test_logged_in()
    {
        $this->unit->set_test_items(array('test_name', 'result'));

        echo $this->unit->run(
            $this->logged_in("Jino","Lacson"), 
            'is_bool', 
            'Check if logged in success'
        );
    }

    public function test_set_session()
    {
        $this->unit->set_test_items(array('test_name', 'result'));

        echo $this->unit->run(
            $this->add_session("Jino","Lacson"), 
            'is_true', 
            'Check if sessions exists'
        );
    }

    public function test_get_session()
    {
        $this->unit->set_test_items(array('test_name', 'result'));

        echo $this->unit->run(
            $this->get_session(), 
            'is_array', 
            'Check if has sessions'
        );
    }

    public function test_unset_session()
    {
        $this->unit->set_test_items(array('test_name', 'result'));

        echo $this->unit->run(
            $this->remove_session(), 
            'is_null', 
            'Check if session properly delete'
        );
    }

    public function test_logout()
    {
        $this->unit->set_test_items(array('test_name', 'result'));

        echo $this->unit->run(
            $this->logged_out(), 
            'is_true', 
            'Check if no session'
        );
    }


    /**
     * 4.) Write the code.
     * 5.) Ensure that all tests have run and passed.
     * 6.) Perform refactoring.
     */
    
    private function logged_in($username,$password) : bool {
        return ($username == 'Jino' && $password == "Lacson");
    }

    private function add_session($username,$password) {
        if($this->logged_in("Jino","Lacson")){
            $details = array(
                    'username'  => $username,
                    'password'     => $password,
                    'logged_in' => TRUE
            );

            $this->session->set_userdata($details);
        }

        return $this->session->has_userdata('logged_in');
    }


    private function get_session() : array {
        $obj = (array) array( 
            "username" => $this->session->userdata('username'),
            "password" => $this->session->userdata('password'),
            "logged_in" => $this->session->userdata('logged_in')
        );

        return $obj ;
    }

    private function remove_session() {
        if($this->session->has_userdata('logged_in')){
            unset(
                $_SESSION['username'],
                $_SESSION['password'],
                $_SESSION['logged_in'],
            );
        }

        return $this->session->userdata('logged_in');
    }


    private function logged_out() : bool {
        return empty($this->session->has_userdata('logged_in')) ?? TRUE;
    }
   

   /**
    * 7.) Repeat the process.
    */

   
}

