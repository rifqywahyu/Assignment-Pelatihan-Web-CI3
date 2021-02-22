<?php

class User_model extends CI_Model {
    public function register() {
        $data = [
            'name' => $this->input->post('name', true),
            'email' => $this->input->post('email', true),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'is_active' => 0,
            'date_created' => time()
        ];
        $this->db->insert('users', $data);
    }

    public function getUserByEmail($email) {
        return $this->db->get_where('users', ['email' => $email])->row_array();
    }

    public function createVerification($data) {
        $this->db->insert('verification', $data);
    }

    public function getUserToken($token) {
        return $this->db->get_where('verification', ['token' => $token])->row_array();
    }

    public function activate($email) {

        $this->db->set('is_active', 1)
            ->where('email', $email)
            ->update('users');
        $this->db->delete('verification', ['email' => $email]);
    }

    public function deleteUserToken($email) {
        $this->db->delete('verification', ['email' => $email]);
        $this->db->delete('users', ['email' => $email]);
    }
}
