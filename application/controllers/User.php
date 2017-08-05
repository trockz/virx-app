<?php
defined('BASEPATH') OR exit('No direct script access allowed');






class User extends CI_Controller {
	
	
	
	
	
	
	public function index()
	{
		$this->load->view('users');
		
		
	}
	
	
	
	public function ulist()
	{
		$this->load->view('user-list');		
	}
	
	
	
	
	
	
	public function addUser()
	{
		
		
		$this->load->model('User_model');
		
		
		$input = $this->input->post(array('firstname', 'lastname', 'age', 'city', 'country', 'yearly_income', 'monthly_expenses'));
		
		
		$user_data = $this->User_model->insert($input);
		
		$this->getuser($user_data->id);
		
		
	}
	
	
	
	
	
	
	public function getUser($user)
	{
		
		
		$this->load->model('User_model');
		
		
		$user_data = $this->User_model->get($user);
		
		
		if($user_data){
			
			$sm = 0;
			$exp_table = "<table class='table table-stripped'>
				<tr>
					<td>Month</td>
					<td>Monthly Expenses</td>
					<td>Total Spending</td>
				</tr>
			";

			for($i=0; $i<12; $i++){
				$sm = $sm+$user_data->monthly_expenses;
				$exp_table .= "<tr>";
					$exp_table .= "<td>".($i+1)."</td><td>".$user_data->monthly_expenses."</td><td>".$sm."</td>";
				$exp_table .= "</tr>";
			}
			$exp_table .= "</table>";

			if($sm>$user_data->yearly_income){
				$exp_table.="
								
				<div class='alert alert-danger'>
				<strong>Danger!</strong> You are spending more than your income. You are short of ".($sm - $user_data->yearly_income)." at the end of the year.
				</div>
				";
			}else{
				$exp_table.="
								
				<div class='alert alert-success'>
				<strong>Contratz!</strong> You are saving " .($user_data->yearly_income-$sm). " at the end of the year.
				</div>
				";
			}

			$user_data->spending_table = $exp_table;
			
			return $this->output
			->set_status_header('200')
			->set_content_type('application/json')
			->set_output(json_encode($user_data));
			
			
		}
		
		else{
			
			
			return $this->output
			->set_status_header('404')
			->set_content_type('application/json')
			->set_output(null);
			
			
		}
		
		
		
		
		
	}
	
	
	
	
	
	
	public function getUsers()
	{
		
		
		$this->load->model('User_model');
		
		
		$user_data = $this->User_model->geAll();
		
		
		return $this->output
		->set_status_header('200')
		->set_content_type('application/json')
		->set_output(json_encode($user_data));
		
		
	}
	
	
	
	
	
	
	
	
	
}





