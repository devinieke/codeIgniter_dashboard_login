<?php
  class User_Model extends CI_Model
  {
    function get_users()
    {
      $query = $this->db->get('users');
      return $query->result();
    }

    function add_user($data)
    {
      $this->db->insert('users', $data);
    }

    function add_bank($string, $data)
    {
      //guard against double entry
      $this->db->select("*");
      $this->db->from('bank_details');
      $this->db->where('unique_ID', $string);
      $query = $this->db->get();

      if($query->num_rows() >= 1)
      {
        return false;
      }
      else
      {
        $this->db->insert('bank_details', $data);
      }

    }

    function add_contact($string, $data)
    {
      //guard against double entry
      $this->db->select("*");
      $this->db->from('contact_details');
      $this->db->where('unique_ID', $string);
      $query = $this->db->get();

      if($query->num_rows() >= 1)
      {
        return false;
      }
      else
      {
        $this->db->insert('contact_details', $data);
      }
    }

    function validate_log()
    {
      $this->db->where('first_name', $this->input->post('first_name'));
      $this->db->where('password', sha1($this->input->post('password')));

      $query = $this->db->get('users');

      if($query->num_rows() == 1)
      {
        return true;
      }

    }

    function getUser_id($user)
    {
      $this->db->select('unique_ID');
      $this->db->from('users');
      $this->db->where('first_name', $user);
      $query = $this->db->get();

      if($query->num_rows() == 1)
      {
        foreach($query->result() as $row)
        {
          $data[] = $row;
        }
        return $data;
      }
    }

    function fetch($string)
    {
      $this->db->select("*");
      $this->db->from('users');
      $this->db->where('unique_ID', $string);
      $query = $this->db->get();
      return $query->result();
    }

    function fetch_bank($string)
    {
      $this->db->select("*");
      $this->db->from('bank_details');
      $this->db->where('unique_ID', $string);
      $query = $this->db->get();
      return $query->result();
    }

    function fetch_contact($string)
    {
      $this->db->select("*");
      $this->db->from('contact_details');
      $this->db->where('unique_ID', $string);
      $query = $this->db->get();
      return $query->result();
    }
  }
 ?>
