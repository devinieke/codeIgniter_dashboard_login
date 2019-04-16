<?php

    class UpdateInfo extends CI_Controller
    {
        //place in controller with access to all views
        function __construct()
        {
            parent::__construct();
            $this->is_logged_in();
        }

        function is_logged_in()
        {
            $is_logged_in = $this->session->userdata('is_logged_in');

            if(!isset($is_logged_in) || $is_logged_in !== true)
            {
                redirect('logIn');
            }
        }

        public function index()
        {
            $info = $this->session->userData('unique_ID');
            $this->load->model('user_model');
            $data['details'] = $this->user_model->fetch($info);
            $data['bank'] = $this->user_model->fetch_bank($info);
            $data['contact'] = $this->user_model->fetch_contact($info);
            $this->load->view('updateView', $data);
        }

        public function updateProfile()
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
              $this->index();
          }
          else
          {
            $u_ID = $this->session->userData('unique_ID');
            $this->load->model('update_model');

            $data = array(
              'first_name' => $this->input->post('first_name'),
              'last_name' => $this->input->post('last_name'),
              'age' => $this->input->post('age'),
              'sex' => $this->input->post('sex'),
              'password' => sha1($this->input->post('password')),
              'image' => $img
            );

            $this->update_model->update_profile($u_ID, $data);

            redirect('home');
          }
        }

        public function updateContact()
        {
          $this->load->library('form_validation');
          $this->form_validation->set_rules('address', 'Address', 'required');
          $this->form_validation->set_rules('phone', 'Phone Number', 'required|is_numeric');
          $this->form_validation->set_rules('po_box', 'P.O. Box', 'required|is_numeric');
          $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

          if($this->form_validation->run() == FALSE)
          {
              $this->index();
          }
          else
          {
              $u_ID = $this->session->userData('unique_ID');
              $this->load->model('update_model');

              $conData = array(
                  'address' => $this->input->post('address'),
                  'phone' => $this->input->post('phone'),
                  'po_box' => $this->input->post('po_box'),
              );

              $this->update_model->update_contact($u_ID, $conData);

              redirect('home');
          }
        }
        public function updateBank()
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('bank_name', 'Bank Name', 'required');
            $this->form_validation->set_rules('bank_branch', 'Branch Name', 'required');
            $this->form_validation->set_rules('account_name', 'Account Name', 'required');
            $this->form_validation->set_rules('account_number', 'Account Number', 'required|is_numeric');
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

            if($this->form_validation->run() == FALSE)
            {
              $this->index();
            }
            else
            {
              $u_ID = $this->session->userdata('unique_ID');
              $this->load->model('update_model');

              $data = array(
                'bank_name' => $this->input->post('bank_name'),
                'bank_branch' => $this->input->post('bank_branch'),
                'account_name' => $this->input->post('account_name'),
                'account_number' => $this->input->post('account_number'),
              );

              $this->update_model->update_bank($u_ID, $data);

              redirect('home');
            }
        }
    }
