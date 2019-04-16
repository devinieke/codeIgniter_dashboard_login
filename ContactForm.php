<?php

/**
 * Created by PhpStorm.
 * User: oto inieke
 * Date: 01/04/2016
 * Time: 16:48
 */
class ContactForm extends CI_Controller
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
      $this->load->view('contactFormView', $data);
    }

    public function add_contact()
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
            $this->load->model('user_model');

            $conData = array(
                'address' => $this->input->post('address'),
                'phone' => $this->input->post('phone'),
                'po_box' => $this->input->post('po_box'),
                'unique_ID' => $u_ID
            );

            $this->user_model->add_contact($u_ID, $conData);

            redirect('home');
        }
    }
}
