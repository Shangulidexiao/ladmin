<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class AdminRole extends Model
{
    protected $table = 'admin_role';

    public $timestamps = false;
    
    public function addRole($adminId, $roleIds, $adder){
        if(!$adminId || !$roleIds || !$adder){
            return false;
        }
        $addData = array();
        foreach ($roleIds as $roleId) {
            $addData[] = [
                'adminId'=> $adminId,
                'roleId' => $roleId,
                'createId' => $adder,
                'createTime' => time(),
                ];
        }
        $this->insert($addData);
    }
    
    public function updateRole($adminId, $roleIds, $adder){
        $this->where('adminId',$adminId)->delete();
        $this->addRole($adminId, $roleIds, $adder);
    }
    
    /**
     * 删除管理员角色
     */
    public function deleteRole($adminId){
        $this->where('adminId',$adminId)->delete();
    }
    
    public function roleIds($adminId){
        $roles = $this->where([['isDel', 0], ['adminId',$adminId]])->select('roleId')->get();
        $roleIds = [];
        if(!$roles){
            return $roleIds;
        }
        foreach($roles as $role){
            $roleIds[] = $role['roleId'];
        }
        return $roleIds;
    }
}
