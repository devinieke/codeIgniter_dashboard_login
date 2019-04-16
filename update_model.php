<?php

    class Update_Model extends CI_Model
    {
        function update_bank($id, $string)
        {
          $this->db->where('unique_ID', $id);
          $this->db->update('bank_details', $string);
          $query = $this->db->get('bank_details');

          if($query->num_rows() == 1)
          {
            return true;
          }
        }

        function update_contact($id, $string)
        {
          $this->db->where('unique_ID', $id);
          $this->db->update('contact_details', $string);
          $query = $this->db->get('contact_details');

          if($query->num_rows() == 1)
          {
            return true;
          }
        }

        function update_profile($id, $string)
        {
          $this->db->where('unique_ID', $id);
          $this->db->update('users', $string);
          $query = $this->db->get('users');

          if($query->num_rows() == 1)
          {
            return true;
          }
        }
    }