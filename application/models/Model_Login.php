<?php 
class Model_Login extends CI_Model 
{
	
	// public function __construct()
	// {
    //     parent::__construct();
	// }
 
	function login($nis_nip,$password)
	{
        $query = $this->db->get_where('tb_akun',array('nis_nip'=>$nis_nip));
        $user = $query->row();

        if (!$user) {
            return false;
        }
    
        if (password_verify($password, $user->password)) {
            return $user;
        } else {
            return false;
        }
	}
	
    function cek_login()
    {
        if(empty($this->session->userdata('is_login')))
        {
			redirect('login');
		}
    }
}
?>