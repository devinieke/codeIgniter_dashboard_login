<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BankDetails extends CI_Controller{

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
    $this->load->view('bankFormView', $data);
  }

  public function add_bank_details()
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
      $this->load->model('user_model');

      $data = array(
        'bank_name' => $this->input->post('bank_name'),
        'bank_branch' => $this->input->post('bank_branch'),
        'account_name' => $this->input->post('account_name'),
        'account_number' => $this->input->post('account_number'),
        'unique_ID' => $u_ID
      );

      $this->user_model->add_bank($u_ID, $data);

      redirect('home');
    }
  }

}
