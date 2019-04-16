<?php
    class Home extends CI_Controller
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
            $this->load->view('homeView', $data);
        }

        public function bankDetails()
        {
          $id = $this->session->userData('unique_ID');
          $this->load->model('user_model');
          $data['details'] = $this->user_model->fetch($id);
          $this->load->view('bankFormView', $data);
        }

        public function contactDetails()
        {
          $id = $this->session->userData('unique_ID');
          $this->load->model('user_model');
          $data['details'] = $this->user_model->fetch($id);
          $this->load->view('contactFormView', $data);
        }
        
        public function updateDetails()
        {
            $id = $this->session->userData('unique_ID');
            $this->load->model('user_model');
            $data['details'] = $this->user_model->fetch($id);
            $this->load->view('updateView', $data);
        }

        public function logOut()
        {
            $this->session->sess_destroy();
            redirect('logIn');
        }
    }
