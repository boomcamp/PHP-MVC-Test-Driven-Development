<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class TDD_controller extends CI_Controller {

	public function __construct() 
    {
        parent::__construct();

        //Load Unit test library
        $this->load->library('unit_test');

        //Load session helper
        $this->load->library('session');

        //Load TDD_model
        $this->load->model("TDD_model");
    }

    public function index()
    {
        $this->test_hello();
        $this->test_type();
    }

     /**
     * 1.) Identify the requirement.
     * 2.) Write a test for automation.
     * 3.) Execute tests and ensure that the newer tests fail (red color).
     * 4.) Write the code.
     * 5.) Ensure that all tests have run and passed.
     * 6.) Perform refactoring.
     * 7.) Repeat the process.
     */


    public function test_hello()
    {
        $this->unit->set_test_items(array('test_name', 'result'));

        echo $this->unit->run(
            $this->TDD_model->say_hello(), 
            'is_string', 
            'Check if display hello world string'
        );
    }

    public function test_type()
    {
        $this->unit->set_test_items(array('test_name', 'result'));

        echo $this->unit->run(
            $this->TDD_model->get_type(), 
            'is_object', 
            'Check if type is object'
        );
    }


    /**
     * ADD YOUR 10 test(s) BELOW..
     */
   
}

