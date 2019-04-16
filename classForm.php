<?php

    class ClassForm extends CI_Controller
    {
        public function index()
        {
            $this->load->view('classFormView');
        }

        public function signup()
        {
            $config = array(
                'upload_path' => 'images',
                'allowed_types' => 'gif|jpg|png|jpeg',
                'max_size' => 250,
                'max_width' => 1920,
                'max_height' => 1080,
              );
            $this->load->library('upload', $config);
            $this->upload->do_upload('image');
            $img_upload = $this->upload->data();

            $img = $img_upload['file_name'];

            //form_validation
            $this->load->library('form_validation');
            $this->form_validation->set_rules('first_name', 'First Name', 'required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required');
            $this->form_validation->set_rules('age', 'Age', 'required|is_numeric');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

            if ($this->form_validation->run() == FALSE)
            {
                $this->load->view('classFormView');

                //alternative: load index method
                //$this->index();
            }
            else
            {
              $u_ID = time();
              $this->load->model('user_model');

              $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'age' => $this->input->post('age'),
                'sex' => $this->input->post('sex'),
                'password' => sha1($this->input->post('password')),
                'image' => $img,
                'unique_ID' => sha1($u_ID)
              );

              $this->user_model->add_user($data);

              $this->load->view('signUpSuccess');
            }
            //form_validation
        }

        public function proceed()
        {
            $this->load->view('logInView');
        }
    }
