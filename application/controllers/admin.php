<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class admin extends CI_Controller{
		public function index()
		{
			$data['title'] = "Sarilaya | Admin";

			$data['scripts'] = array('jquery.min','bootstrap.min');
				
			$data['styles'] = array('bootstrap','bootstrap-responsive.min','caritakathon');			

			$this->load->view('adminpage',$data);
		}

		public function userpass($str)
		{
			$this->load->model('user_model');

			if(($this->input->post('username')=="") && ($this->input->post('password') == ""))
			{
				$this->form_validation->set_message('userpass','Invalid username or password');
				return false;
			}
			else
			{
				$result = $this->user_model->check_user($this->input->post('username'),$this->input->post('password'));

				if($result)
				{
					$data = array(
							'username'	=> $this->input->post('username')
						);
					$this->session->set_userdata($data);
					return true;
				}
				else
				{
					$this->form_validation->set_message('userpass','Invalid username or password');
					return false;
				}
			}
		}

		public function check_login()
		{
			//loads the library for the form validation
			$this->load->library('form_validation');
			
			//the div where the error messages will appear
			$this->form_validation->set_error_delimiters('<div align = "left" class="alert-error alert" style = "font-size:12px">','</div>');  
			
			//the rules you set in this form validation first parameter is the name of the post, second parameter given name, 
			//third parameter the rule/s set 
			$this->form_validation->set_rules('username', 'Username', 'callback_userpass');
			
			//condition for the validation rules 
			if($this->form_validation->run()==FALSE)	
			{
				$data['title'] = "Sarilaya | Admin";

				$data['scripts'] = array('jquery.min','bootstrap.min');
				
				$data['styles'] = array('bootstrap','bootstrap-responsive.min','caritakathon');			

				$this->load->view('adminpage',$data);
			}			
			else
			{
				redirect('dashboard/articles/1');
			}
		}

	}	