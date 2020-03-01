<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Imodel extends CI_Model{
    
    public function __construct() 
    {
        parent::__construct();

        //Load the database helper
        $this->load->database();
    }

    public function roleExist($username, $password) : bool
    {
        $this->db->where('username',$username);
        $this->db->where('password', sha1($password));
        $query = $this->db->get('users');
        return $query->num_rows() > 0 ;
    }

    public function get_course() : array
    {
        $this->db->select('id, name');
        $this->db->from('course');
        return $this->db->get()->result();
    }

    public function get_students() : array
    {
        $this->db->select('users.id as user_id, 
                           users.username as username, 
                           users.password as password, 
                           students.id, 
                           students.fullname, 
                           students.email, 
                           students.contact, 
                           course.name as course, 
                           course.id as course_id');

        $this->db->from('students');
        $this->db->join('users', 'users.id = students.user_id');
        $this->db->join('course', 'course.id = students.course_id');
        $this->db->order_by('users.id', 'ASC');
        return $this->db->get()->result();
    }

    public function get_student_by_id($user_id) : array
    {
        $this->db->select('users.id as user_id, 
                           users.username as username, 
                           users.password as password, 
                           students.id, 
                           students.fullname, 
                           students.email, 
                           students.contact, 
                           course.name as course, 
                           course.id as course_id');
        
        $this->db->from('students');
        $this->db->join('users', 'users.id = students.user_id');
        $this->db->join('course', 'course.id = students.course_id');
        $this->db->where('users.id', $user_id);
        return $this->db->get()->result();
    }



    /************************************************
    ************************************************
    *   COMPLETE THE CODEIGNITER QUERIES BELOW
    * **********************************************
    ***********************************************/

    public function add_students($post)
    {   
        # Documentation: https://codeigniter.com/userguide3/database/query_builder.html#inserting-data
        # Documentation last inserted id: https://codeigniter.com/userguide3/database/helpers.html
        
         # Set $users as array of $post['username'] and sha1($post['password'])
        $users = array(
                'username' => $post['username'],
                'password' => sha1($post['password'])
        );

        # Perform insert for 'users' table for $users array
        $this->db->insert('users', $users);

        # Assign $users as array user_id as $this->db->insert_id(), $post['course'], $post['fullname'], $post['email'] and $post['contact']
        $users = array(
                'user_id' => $this->db->insert_id(),
                'course_id' => $post['course'],
                'fullname' => $post['fullname'],
                'email' => $post['email'],
                'contact' => $post['contact']
        );

        # Perform insert query for $users array
        $this->db->insert('students', $users);
    }

    public function update_students($post)
    {    

        # Documentation : https://codeigniter.com/user_guide/database/query_builder.html#updating-data
        
        # Set $users as array of $post['username'] and sha1($post['password'])
        $users = array(
                'username' => $post['username'],
                'password' => sha1($post['password'])
        );

        # Perform update for `users` table where `id` is equal to $post['user_id']
        $this->db->where('id', $post['user_id']);
        $this->db->update('users', $users);

        # Set $users as array of $post['course_id'], $post['fullname'], $post['email'] and $post['contact']
        $users = array(
                'course_id' => $post['course_id'],
                'fullname' => $post['fullname'],
                'email' => $post['email'],
                'contact' => $post['contact']
        );

        # Perform update for `students` table where `user_id` is equal to $post['user_id']
        $this->db->where('user_id', $post['user_id']);
        $this->db->update('students', $users);
    }

    public function delete_students($user_id)
    {
        
        # Documentation: https://codeigniter.com/user_guide/database/query_builder.html#deleting-data
        
        # Delete users table where `id` is equal to $user_id
        $this->db->where('id', $user_id);
        $this->db->delete('users');

        # Delete students table where `user_id` is equal to $user_id
        $this->db->where('user_id', $user_id);
        $this->db->delete('students');
    }
}
?>

