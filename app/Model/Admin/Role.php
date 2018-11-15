<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';

    public $timestamps = false;
    
    public function exist($name)
    {
        return $this->where([['name', '=' , $name],['isDel',0]])->first();
    }
    
    public function create(array $data)
    {
        $data['createTime'] = time();
        return $this->insertGetId($data);
    }
    
    public function idNames(){
        $roles = $this->where('isDel',0)->get();
        $idNames = array();
        if(!$roles){
            return $idNames;
        }
        foreach ($roles as $role) {
            $idNames[$role['id']] = $role['name'];
        }
        return $idNames;
    }
    
    public function getAuthIds($roleId)
    {
        if(!$roleId){
            return false;
        }
        $roleAuth = new RoleAuth();
        return $roleAuth->authIdsByRoleId($roleId);
    }
    
    
    public function getZTreeData($roleId = 0) 
    {
        $auth = new Auth();
        $auths = $auth->getAllAuths();
        
        $roleAuths = $this->getAuthIds($roleId);
        $zAuths = [];
        foreach ($auths as $item) {
            if($roleAuths && is_array($roleAuths) && in_array($item->id, $roleAuths)){
               $isChecked =  true;
            }else{
               $isChecked =  false;
            }
            $zAuths[] = [
                'id'        => $item->id,
                'pId'       => $item->parentId,
                'name'      => $item->name,
                'checked'   => $isChecked,
            ];
        }
        
        return $zAuths;
    }
}
