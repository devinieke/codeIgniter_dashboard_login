<?php
    class LogIn extends CI_Controller
    {
        public function index()
        {
            $this->load->view('logInView');
        }

        public function check_log()
        {
            //validate input
            $this->load->library('form_validation');
            $this->form_validation->set_rules('first_name', 'First Name', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

            if($this->form_validation->run() == FALSE)
            {
                $this->index();
            }
            else
            {
                $this->load->model('user_model');
                $query = $this->user_model->validate_log();

                $user = $this->input->post('first_name');

                //if validate_log() wins
                if($query)
                {
                    //check username match
                    if($test = $this->user_model->getUser_id($user))
                    {
                        $run = $test;
                        foreach ($run as $r)
                        {
                            $id = $r->unique_ID;
                        }

                        //set session with username
                        $data = array(
                            'unique_ID' => $id,
                            'first_name' => $user,
                            'is_logged_in' => true
                        );
                        $this->session->set_userdata($data);

                        redirect('home');
                    }
                }
                else
                {
                    $this->index();
                }
            }
        }
    }
