<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class RoleAuth extends Model
{
    protected $table = 'role_auth';

    public $timestamps = false;
    
    public function authIds($roleIds)
    {
        if(!$roleIds || !is_array($roleIds)){
            return false;
        }
        
        $rows = $this->where('isDel', 0)->whereIn('roleId',$roleIds)->select('authId')->get();
        
        $authIds = array();
        if(!$rows){
            return $authIds;
        }
        foreach ($rows as $item) {
            $authIds[$item->authId] = $item->authId;
        }
        return $authIds;
    }
    
    public function authIdsByRoleId($roleId)
    {
        if(!$roleId){
            return false;
        }
        
        $rows = $this->where('isDel', 0)->where('roleId',$roleId)->select('authId')->get();
        $authIds = array();
        if(!$rows){
            return $authIds;
        }
        foreach ($rows as $item) {
            $authIds[$item->authId] = $item->authId;
        }
        return $authIds;
    }
    
    public function insertAuthIds($roleId, $authIds)
    {
        if(!$roleId || !$authIds){
            return false;
        }
        $this->where('roleId',$roleId)->delete();
        $insertArr = [];
        foreach ($authIds as $authId) {
            $insertArr[] = [
                'roleId' => $roleId,
                'authId' => $authId,
            ];
        }
        $this->insert($insertArr);
    }
    public function deleteAuthIds($roleId)
    {
        if(!$roleId){
            return false;
        }
        $this->where('roleId',$roleId)->delete();
        return true;
    }
}
