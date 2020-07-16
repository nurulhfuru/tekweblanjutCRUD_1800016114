<?php
namespace App\Models;

use CodeIgniter\Model; 

class M_user extends Model 
{
	public function get_data($username, $password)
	{
        return $this->db->table('tb_user')
        ->where(array('id_username' => $username, 'id_password' => $password))
        ->get()->getRowArray();
	}
}