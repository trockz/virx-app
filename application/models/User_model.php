<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

        public $firstname; 
        public $lastname; 
        public $age; 
        public $city; 
        public $country; 
        public $yearly_income; 
        public $monthly_expenses;

        
        public function __construct()
        {
            parent::__construct();
        }

        public function geAll()
        {
                $query = $this->db->get('users');
                return $query->result();
        }

        public function get($user)
        {
                $this->db->where('id', $user);
                return $this->db->get('users')->row();
        }

        public function insert($input)
        {

                $this->db->insert('users', $input);

                $insert_id = $this->db->insert_id();

                return $this->get($insert_id);
        }

        public function update($user, $input)
        {
                $this->db->update('users', $input, array('id' => $user));
                
                return $this->get($user);
        }

}