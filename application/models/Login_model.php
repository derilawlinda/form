<?php

class Login_model extends CI_Model
{
    private $_table = "users";

    public function doLogin(){
		$post = $this->input->post();

        // cari user berdasarkan email dan username
        $this->db->where('email', $post["email"])
                ->or_where('username', $post["email"]);
        $user = $this->db->get($this->_table)->row();

        // jika user terdaftar
        if($user){
            // periksa password-nya
            $isPasswordTrue = password_verify($post["password"], $user->password);
            // periksa role-nya
            // $isAdmin = $user->role == "admin";

            // jika password benar dan dia admin
            if($isPasswordTrue){ 
                // login sukses yay!
    			$data_session = array(
                    'user_id' => $user->user_id,
    				'email' => $post["email"],
    				'user_logged' => $user,
    				'full_name' => $user->full_name,
    				'role' => $user->role,
    				'sn' => $user->sn,
    				'no_pekerja' => $user->no_pekerja
    				);
     
    			$this->session->set_userdata($data_session);
     
                // $this->session->set_userdata(['user_logged' => $user]);
                $this->_updateLastLogin($user->user_id);
                return true;
            }
        }
        
        // login gagal
		return false;
    }

    public function isNotLogin(){
        return $this->session->userdata('user_logged') === null;
    }
    
    public function isLogin(){
        $user = $this->db->get($this->_table)->row();
        return $this->session->userdata('user_logged') === $user;
    }

    private function _updateLastLogin($user_id){
        $sql = "UPDATE {$this->_table} SET last_login=now() WHERE user_id={$user_id}";
        $this->db->query($sql);
    }

}