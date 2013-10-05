<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class dashboard extends CI_Controller{

		public function __construct()
        {
            parent::__construct();
            // Your own constructor code
			if(($this->session->userdata('username') == null) OR ($this->session->userdata('username') == "") )
			{
				redirect('admin');
			}	
	
		}	

		public function files()
		{
			$this->load->model('file_model');

			$data['files'] = $this->file_model->get_all();

			$data['title'] = "Sarilaya | Files";

			$data['scripts'] = array('jquery.min','bootstrap.min','nav');
					
			$data['styles'] = array('bootstrap.min','bootstrap-responsive.min','caritakathon');			

			$this->load->view('filespage',$data);			
		}		
		
		public function delete_file()
		{
			$this->load->model('file_model');

			$this->load->helper("file");

			$image = $this->file_model->get_id(end($this->uri->segments));

			$result = $this->file_model->delete(end($this->uri->segments));

			if($result)
			{
				unlink(FCPATH . '/img/files/'.$image[0]->file_extension);	

				redirect('dashboard/files');				
			}	
			else
			{
				//you can calter here the message that will be showed 
				show_error('Database Error'.'<a style = "margin-left:20px" href = "'.base_url().'dashboard/articles/1'.'">Go back to Admin Homepage</a>'); 					
			}				

		}
		
		public function add_files()
		{
			$data['types'] = "video";

			$data['title'] = "Sarilaya | New Files";

			$data['scripts'] = array('jquery.min','bootstrap.min','nav');
					
			$data['styles'] = array('bootstrap.min','bootstrap-responsive.min','caritakathon');			

			$this->load->view('addfile',$data);
		}
		
		public function validate_files()
		{
			$this->load->model('file_model');

			if (isset($_POST['submit']))
			{
					$config['upload_path'] = './img/files/'; /* NB! create this dir! */
					$config['allowed_types'] = 'mp4|psd|xls|doc|docx|xlsx';
					$config['overwrite']  = TRUE;
					/* Load the upload library */
					$this->load->library('upload', $config);

					for($i = 1; $i < 5; $i++)
					{
						/* Handle the file upload */
						$upload = $this->upload->do_upload('file'.$i);
						/* File failed to upload - continue */
						if($upload === FALSE) continue;
						/* Get the data about the file */
						$data = $this->upload->data();
				 
						$text = $data['file_name'];

						if (strpos($text,'mp4') !== false) {
						   $test = "video";
						}
						else
						{
							$test = "file";
						}

						$uploadedFiles[$i] = $data;
						/* If the file is an image - create a thumbnail */
							
						$datas = array(
										'file_extension'	=> $data['file_name'],
										'file_category'		=> $test
									);
						$result = $this->file_model->insert($datas);			
					}				
					redirect('dashboard/files');
			}
			else
			{
				redirect('dashboard/logout');
			}						
		}

		public function news()
		{
			echo "a";
		}

		public function articles()
		{
			$this->load->model('article_model');

			$total = $this->article_model->record_count();

			$total_row = ceil($total/5);	
			
			$ctr = 0;

			for ($i=1; $i<=$total_row; $i++)
			{
				$array[$i] = $ctr;
				$ctr += 5;
			}

			$offset = end($this->uri->segments);			

			if(($offset >= 1) && ($offset<=$total_row))
			{
				$data['articles'] = $this->article_model->get_given($array[$offset]);

				$data['totals'] = $total_row;
				
				$data['totalrow'] = $array;

				//$data['articles'] = $this->article_model->get_all();

				$data['title'] = "Sarilaya | Dashboard";

				$data['scripts'] = array('jquery.min','bootstrap.min','caritakathon','nav');
					
				$data['styles'] = array('bootstrap.min','bootstrap-responsive.min','caritakathon');			

				$this->load->view('dashboardpage',$data);
			}
			else
			{
				//you can calter here the message that will be showed 
				show_error('Page does not exist'.'<a style = "margin-left:20px" href = "'.base_url().'admin">Go back to Login Page</a>'); 					
			}
		}

		public function gallery()
		{
			$this->load->model('gallery_model');

			$sample = $this->gallery_model->get_all();

			$count = count($sample)-1;
			$full_count = count($sample);

			if($count > 3)
			{
				$total_row = ceil($full_count/4);
				$ctr = 0;
				$new_array[] = null;
				foreach($sample as $row)
				{
					if($ctr < 3)
					{
						$arrs[] = $row->gallery_title;
						$cover[] = $row->gallery_cover;
						$album[] = $row->gallery_total;
						$ids[] = $row->gallery_id;
						$ctr ++;
					}
					else
					{	
						$ids[] = $row->gallery_id;
						$album[] = $row->gallery_total;
						$cover[] = $row->gallery_cover;
						$arrs[] = $row->gallery_title;
						$gallery_id[] = implode('@',$ids);
						$gallery_title[] = implode('@',$arrs);
						$gallery_cover[] = implode('@',$cover);
						$gallery_total[] = implode('@',$album);
						unset($ids);
						unset($cover);
						unset($arrs);
						unset($album);
						$ctr = 0;
					}
					
				}
			
				$last =  $total_row*4-4;

				for ($i = $last; $i <= $count; $i++) {
					$arr[] = $sample[$i]->gallery_title;
					$covers[] = $sample[$i]->gallery_cover;
					$albums[] = $sample[$i]->gallery_total;
					$id[] = $sample[$i]->gallery_id;
				}

				if($arr!=null)
				{
					$imploded_last[$total_row-1] = implode('@',$arr);
					$gallery_title = $gallery_title + $imploded_last;
					$imploded_cover[$total_row-1] = implode('@',$covers);
					$gallery_cover = $gallery_cover + $imploded_cover;
					$imploded_total[$total_row-1] = implode('@',$albums);
					$gallery_total = $gallery_total + $imploded_total;
					$imploded_id[$total_row-1] = implode('@',$id);
					$gallery_id = $gallery_id + $imploded_id;
				}	
				
				$combined_array = array_combine($gallery_title,$gallery_cover);	

				$data['totals'] = $gallery_total;
				
				$data['id'] = $gallery_id;
				
				$data['displays'] = $combined_array;

				$data['title'] = "Sarilaya | Gallery";

				$data['scripts'] = array('jquery.min','bootstrap.min','gallery','nav');
						
				$data['styles'] = array('bootstrap.min','bootstrap-responsive.min','caritakathon');			

				$this->load->view('gallerypage',$data);					
			}			

			elseif( ($count >= 0) && ($count <= 3))
			{
				foreach($sample as $row)
				{
					$gallery_title[] = $row->gallery_title;
					$gallery_cover[] = $row->gallery_cover;
					$gallery_totals[] = $row->gallery_total;
					$gallery_ids[] = $row->gallery_id;
				}
				$imploded_gallery_title[] = implode('@',$gallery_title);
				$imploded_gallery_cover[] = implode('@',$gallery_cover);
				$gallery_total[] = implode('@',$gallery_totals);
				$gallery_id[] = implode('@',$gallery_ids);
					
				$combined_array = array_combine($imploded_gallery_title,$imploded_gallery_cover);	

				$data['totals'] = $gallery_total;
				
				$data['id'] = $gallery_id;
				
				$data['displays'] = $combined_array;			

				$data['title'] = "Sarilaya | Gallery";

				$data['scripts'] = array('jquery.min','bootstrap.min','gallery','nav');
						
				$data['styles'] = array('bootstrap.min','bootstrap-responsive.min','caritakathon');			

				$this->load->view('gallerypage',$data);						
			}

			else
			{
				$gallery_total = null;
			
				$gallery_id = null;
				
				$combined_array = null;
			
				$data['totals'] = $gallery_total;
					
				$data['id'] = $gallery_id;	
					
				$data['displays'] = $combined_array;

				$data['title'] = "Sarilaya | Gallery";

				$data['scripts'] = array('jquery.min','bootstrap.min','gallery','nav');
						
				$data['styles'] = array('bootstrap.min','bootstrap-responsive.min','caritakathon');			

				$this->load->view('gallerypage',$data);					
			}
		
		}

		public function news_and_updates($action, $id) {
			$this->load->model('news_model');

			if(!isset($action)) {
				$data['title'] = 'Sarilaya | News & Updates';
				$data['scripts'] = array('jquery.min', 'bootstrap.min','nav');
				$data['styles'] = array('bootstrap.min', 'bootstrap-responsive.min', 'caritakathon');
				$data['news'] = $this->news_model->get_all();
				$this->load->view('newsandupdates', $data);
			} else {
				//render the edit form
				$data['title'] = 'Sarilaya | Edit News';
				$data['scripts'] = array('jquery.min', 'bootstrap.min', 'nav');
				$data['styles'] = array('bootstrap.min', 'bootstrap-responsive.min', 'caritakathon');
				$data['news'] = $this->news_model->get_news($id);
				$this->load->view('editnewsandupdates', $data);
			}
		}

		public function delete_news() {
			$id = end($this->uri->segments);
			$this->load->model('news_model');
			if($result = $this->news_model->delete_news($id)) {
				redirect("dashboard/news_and_updates");
			} else {
				show_error('Database error'.'<a style="margin-left:20px" href="'.base_url().'dashboard/articles/1'.'">Go back to admin dashboard</a>');
			}
		}

		public function validate_password()
		{
			$this->load->library('form_validation');
			
			//the div where the error messages will appear
			$this->form_validation->set_error_delimiters('<div align = "left" class="alert-error alert" style = "font-size:12px">','</div>');  
			
			//the rules you set in this form validation first parameter is the name of the post, second parameter given name, 
			//third parameter the rule/s set 
			$this->form_validation->set_rules('new_pass', 'New Password', 'required|matches[confirm_pass]');
			$this->form_validation->set_rules('confirm_pass', 'Confirm Password', 'required');

			//condition for the validation rules 
			if($this->form_validation->run()==FALSE)	
			{
				echo validation_errors();
			}
			else
			{
				$this->load->model('user_model');

				$data = array('user_password'=>$this->input->post('new_pass'));

				$result = $this->user_model->update($this->session->userdata('username'),$data);
				
				if($result)
				{
					echo "1";
				}
				else
				{
					//you can calter here the message that will be showed 
					show_error('Database Error'.'<a style = "margin-left:20px" href = "'.base_url().'dashboard'.'">Go back to Admin Dashboard</a>'); 																		
				}				
			}
		}

		public function validate_new_title() 
		{
			//echo $this->input->post('id');
			//echo $this->input->post('title');
			//loads the library for the form validation
			$this->load->library('form_validation');
			
			//the div where the error messages will appear
			$this->form_validation->set_error_delimiters('<div align = "left" class="alert-error alert" style = "font-size:12px">','</div>');  
			
			//the rules you set in this form validation first parameter is the name of the post, second parameter given name, 
			//third parameter the rule/s set 
			$this->form_validation->set_rules('title', 'Title', 'required');
			
			//condition for the validation rules 
			if($this->form_validation->run()==FALSE)	
			{
				echo validation_errors();
			}
			else
			{
				$this->load->model('gallery_model');

				$data = array('gallery_title'=>$this->input->post('title'));

				echo $this->gallery_model->update($this->input->post('id'),$data);	
			}	
		}

		public function edit_article()
		{
			$this->load->model('article_model');

			$data['articles'] = $this->article_model->get_id(end($this->uri->segments));

			$data['title'] = "Sarilaya | Edit Article";

			$data['scripts'] = array('jquery.min','bootstrap.min','editarticle','nav');
				
			$data['styles'] = array('bootstrap.min','bootstrap-responsive.min','caritakathon');			

			$this->load->view('editarticle',$data);
		}


		public function add_article()
		{
			$data['title'] = "Sarilaya | New Article";

			$data['scripts'] = array('jquery.min','bootstrap.min','addarticle','nav');
				
			$data['styles'] = array('bootstrap.min','bootstrap-responsive.min','caritakathon');			

			$this->load->view('addarticle',$data);			
		}

		public function validate_new_article()
		{
			$this->load->model('article_model');

			$title = $this->input->post('title');

			$content = $this->input->post('content');
		
			$data = array(
				'article_title'		=> strip_tags(htmlentities($title)),
				'article_content'	=> strip_tags(htmlentities($content)),
				'article_isActive'	=> 0
			);	

			$result = $this->article_model->insert($data);

			if($result)
			{
				echo "1";
			}
			else
			{
				//you can calter here the message that will be showed 
				show_error('Database Error'.'<a style = "margin-left:20px" href = "'.base_url().'dashboard'.'">Go back to Admin Dashboard</a>'); 																		
			}				
		}

		public function edit_cover($state = null, $message = null)
		{
			$this->load->model('gallery_model');

			$data['articles'] = $this->gallery_model->get_id(end($this->uri->segments));

			$data['validation'] = $state;
			
			$data['messages'] = $message;

			$data['id'] = end($this->uri->segments);

			$data['title'] = "Sarilaya | Edit Cover Photo";

			$data['scripts'] = array('jquery.min','bootstrap.min','bootstrap-fileupload.min','nav');
				
			$data['styles'] = array('bootstrap.min','bootstrap-responsive.min','caritakathon','bootstrap-fileupload.min');			

			$this->load->view('editcover',$data);
		}

		public function article_image($state = null, $message = null)
		{
			$this->load->model('article_model');

			$data['articles'] = $this->article_model->get_id(end($this->uri->segments));

			$data['validation'] = $state;
			
			$data['messages'] = $message;

			$data['id'] = end($this->uri->segments);

			$data['title'] = "Sarilaya | Image Article";

			$data['scripts'] = array('jquery.min','bootstrap.min','bootstrap-fileupload.min','nav');
				
			$data['styles'] = array('bootstrap.min','bootstrap-responsive.min','caritakathon','bootstrap-fileupload.min');			

			$this->load->view('imagearticle',$data);	
		}

		public function validate_cover_photo()
		{
			$config['upload_path'] = './img/cover/';
			
			$config['allowed_types'] = 'png|jpg';
			$config['max_size']	= '120';
			$config['overwrite']  = TRUE;
			
			$this->load->library('upload',$config);
		
			if (!$this->upload->do_upload())
			{
				$this->edit_cover($state = "error",$message =  $this->upload->display_errors());
			}
			else
			{	
				$this->load->model('gallery_model');
				$this->load->helper("file");
				
				$sample = $this->gallery_model->get_id(end($this->uri->segments));
			
				$upload_image = $this->upload->data();
				$now = time();
				$human = unix_to_human($now);
				
				$data = array('gallery_cover'=>$upload_image['file_name']);
				
				$result = $this->gallery_model->update(end($this->uri->segments),$data);
			
				if($result)
				{
					unlink(FCPATH . '/img/cover/'.$sample[0]->gallery_cover);
					$this->edit_cover($state = "success",$message = null);
				}
				else
				{
					//you can calter here the message that will be showed 
					show_error('Database Error'.'<a style = "margin-left:20px" href = "'.base_url().'dashboard/articles/1'.'">Go back to Admin Homepage</a>'); 					
				}
			}				
		}

		public function validate_article_image()
		{
			$config['upload_path'] = './img/article/';
			
			$config['allowed_types'] = 'png|jpg';
			$config['max_size']	= '120';
			$config['overwrite']  = TRUE;
			
			$this->load->library('upload',$config);
		
			if (!$this->upload->do_upload())
			{
				$this->article_image($state = "error",$message =  $this->upload->display_errors());
			}
			else
			{	
				$this->load->model('article_model');
				$this->load->helper("file");
				
				$sample = $this->article_model->get_id(end($this->uri->segments));
			
				$upload_image = $this->upload->data();
				$now = time();
				$human = unix_to_human($now);
				
				$data = array('article_image'=>$upload_image['file_name']);
				
				$result = $this->article_model->update(end($this->uri->segments),$data);
			
				if($result)
				{
					unlink(FCPATH . '/img/article/'.$sample[0]->article_image);
					$this->article_image($state = "success",$message = null);
				}
				else
				{
					//you can calter here the message that will be showed 
					show_error('Database Error'.'<a style = "margin-left:20px" href = "'.base_url().'dashboard/articles/1'.'">Go back to Admin Homepage</a>'); 					
				}
			}		
		}		

		public function validate_article()
		{
			$this->load->model('article_model');

			$title = $this->input->post('titles');

			$content = $this->input->post('contents');
			
			$data = array(
				'article_title'		=> strip_tags(htmlentities($title)),
				'article_content'	=> strip_tags(htmlentities($content))
			);	

			$result = $this->article_model->update(end($this->uri->segments),$data);

			if($result)
			{
				redirect('dashboard/articles/1');
			}
			else
			{
				//you can calter here the message that will be showed 
				show_error('Database Error'.'<a style = "margin-left:20px" href = "'.base_url().'dashboard'.'">Go back to Admin Dashboard</a>'); 																		
			}	

		}

		public function activate_article()
		{
			$this->load->model('article_model');

			//echo end($this->uri->segments);
			$data = array('article_isActive'=>1);

			$result = $this->article_model->update(end($this->uri->segments),$data);

			if($result)
			{
				redirect('dashboard/articles/1');
			}
			else
			{
				//you can calter here the message that will be showed 
				show_error('Database Error'.'<a style = "margin-left:20px" href = "'.base_url().'dashboard'.'">Go back to Admin Dashboard</a>'); 																		
			}			
		}

		public function deactivate_article()
		{
			$this->load->model('article_model');

			//echo end($this->uri->segments);
			$data = array('article_isActive'=>0);
		
			$result = $this->article_model->update(end($this->uri->segments),$data);

			if($result)
			{
				redirect('dashboard/articles/1');
			}
			else
			{
				//you can calter here the message that will be showed 
				show_error('Database Error'.'<a style = "margin-left:20px" href = "'.base_url().'dashboard'.'">Go back to Admin Dashboard</a>'); 																		
			}					
		}	

		public function delete_album()
		{
			echo end($this->uri->segments);
		}	

		public function add_coverphoto($state = null, $message = null)
		{
			$data['validation'] = $state;
			
			$data['messages'] = $message;

			$data['title'] = "Sarilaya | Add Cover";

			$data['scripts'] = array('jquery.min','bootstrap.min','bootstrap-fileupload.min','nav');
				
			$data['styles'] = array('bootstrap.min','bootstrap-responsive.min','caritakathon','bootstrap-fileupload.min');			

			$this->load->view('addcover',$data);
		}

		public function validate_cover()
		{
			$config['upload_path'] = './img/cover/';
			
			$config['allowed_types'] = 'png|jpg';
			$config['max_size']	= '120';
			$config['overwrite']  = TRUE;
			
			$this->load->library('upload',$config);
		
			if (!$this->upload->do_upload())
			{
				$this->add_coverphoto($state = "error",$message =  $this->upload->display_errors());
			}
			else
			{	
				$upload_image = $this->upload->data();				
				$configThumb['image_library'] = 'gd2';
				$configThumb['source_image']	= $upload_image['full_path'];
				$configThumb['new_image']	= './img/cover/';
				$configThumb['create_thumb'] = TRUE;
				$configThumb['maintain_ratio'] = FALSE;
				$configThumb['width']	 = 220;
				$configThumb['height']	= 190;

				$this->load->library('image_lib',$configThumb);
				$this->image_lib->resize();				

				if ( ! $this->image_lib->resize())
				{
				    $this->add_coverphoto($state = "error",$message =  $this->image_lib->display_errors());
				}

				else
				{
					$this->load->model('gallery_model');
					
					$data = array('gallery_cover'=>$upload_image['file_name']);
					
					$result = $this->gallery_model->insert($data);
				
					if($result)
					{
						$this->add_coverphoto($state = "success",$message = null);
					}
					else
					{
						//you can calter here the message that will be showed 
						show_error('Database Error'.'<a style = "margin-left:20px" href = "'.base_url().'dashboard/articles/1'.'">Go back to Admin Homepage</a>'); 					
					}
				}
			}		
		}

		public function validate_news()
		{
			$this->load->model('news_model');

			$title = $this->input->post('titles');

			$content = $this->input->post('contents');
			
			$data = array(
				'news_title'		=> strip_tags(htmlentities($title)),
				'news_content'	=> strip_tags(htmlentities($content))
			);	

			$result = $this->news_model->update(end($this->uri->segments),$data);

			if($result)
			{
				redirect('dashboard/news_and_updates');
			}
			else
			{
				//you can calter here the message that will be showed 
				show_error('Database Error'.'<a style = "margin-left:20px" href = "'.base_url().'dashboard'.'">Go back to Admin Dashboard</a>'); 																		
			}	

		}

		public function new_news() {
			$data['title'] = "Sarilaya | New Article";

			$data['scripts'] = array('jquery.min','bootstrap.min','addarticle','nav');
				
			$data['styles'] = array('bootstrap.min','bootstrap-responsive.min','caritakathon');			

			$this->load->view('addnews',$data);
		}

		public function validate_new_news()
		{
			$this->load->model('news_model');

			$title = $this->input->post('title');

			$content = $this->input->post('content');
		
			$data = array(
				'news_title'		=> strip_tags(htmlentities($title)),
				'news_content'	=> strip_tags(htmlentities($content)),
			);	

			$result = $this->news_model->insert($data);

			if($result)
			{
				echo "1";
			}
			else
			{
				//you can calter here the message that will be showed 
				show_error('Database Error'.'<a style = "margin-left:20px" href = "'.base_url().'dashboard'.'">Go back to Admin Dashboard</a>'); 																		
			}				
		}

		public function logout()
		{
			$this->session->sess_destroy();
			redirect('admin');				
		}
	}	
