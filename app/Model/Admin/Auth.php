<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

use App\Model\Admin\AdminRole;
use App\Model\Admin\RoleAuth;

class Auth extends Model
{
    protected $table = 'auth';

    public $timestamps = false;
    
    public function create(array $data)
    {
        $resource = $data['resource'];
        unset($data['resource']);
        $data['createTime'] = time();
        if (!$resource) {
            return $this->insertGetId($data);
        }
        //存储信息
        $url = $data['url'];
        $name = $data['name'];
        $menu = config('admin.menu');

        //二级菜单
        $data['url'] = $url.'.index';
        $data['name'] = $name . '管理';
        $pId = $this->insertGetId($data);

        //三级菜单
        $lastId = 0;
        foreach ($menu[3] as $subUrl => $urlName) {
            $data['url']        = $url . $subUrl; 
            $data['name']       = $name . $urlName;
            $data['parentId']   = $pId;
            $data['isShow']     = 0;
            $lastId = $this->insertGetId($data);
        }
        return $lastId;
    }
    
    public function getAuthsByAdminId($adminId)
    {
        $adminRole  = new AdminRole();
        $roleAuth   = new RoleAuth(); 
        $roleIds    = $adminRole->roleIds($adminId);
        $authIds    = $roleAuth->authIds($roleIds);
        if(!$authIds){
            return false;
        }
        $rows = $this->getAuthByIds($authIds);
        return $rows;
    }
    
    public function getAuthIdsByAdminId($adminId)
    {
        $adminRole  = new AdminRole();
        $roleAuth   = new RoleAuth(); 
        $roleIds    = $adminRole->roleIds($adminId);
        $authIds    = $roleAuth->authIds($roleIds);
        if(!$authIds){
            return false;
        }
        $rows = $this->where('isDel', 0)->whereIn('id',$authIds)->select('id')->get();
        if(!$rows){
            return false;
        }
        $authIds = [];
        foreach ($rows as $item) {
            $authIds[$item->id] = $item->id;
        }
        return $authIds;
    }
    
    public function getAuthIdByRouteName($routeName)
    {
        if(!$routeName){
            return false;
        }
        $auth = $this->where('isDel', 0)->where('url',$routeName)->select('id')->first();
        if($auth){
            return $auth->id;
        }
        return false;
    }
    
    public function getAuthByIds($authIds)
    {
        if(!$authIds){
            return false;
        }
        return $this->where('isDel', 0)->whereIn('id',$authIds)->get();
    }
    /**
     * 获取菜单
     */
    public function getMenu($adminId)
    {
        $menus = $this->getAuthsByAdminId($adminId);
        if(!$menus){
            return false;
        }
        $findParent = array();
        foreach ($menus as $menu) {
            if($menu['isShow'] == 0){
                continue;
            }
            $findParent[$menu['parentId']][$menu['id']] = $menu;
        }
        if(!isset($findParent[0])){
            return false;
        }
        $menus = array();
        foreach ($findParent[0] as $parentId => $menu) {
            if(isset($findParent[$parentId])){
                $menu->next = $findParent[$parentId];
            }
            $menus[] = $menu;
        }
        return $menus;
    }
    
    public function createTree($treeArr)
    {
        if(!$treeArr) {
            return false;
        }
        $find = array();
        foreach ($treeArr as $item) {
            $find[$item['parentId']][] = [
                'id'        => $item->id,
                'parentId'  => $item->parentId,
                'name'      => $item->name,
            ];
        }
        return $this->findSon(0, $find);
    }
    
    private function findSon($pId, $find)
    {
        if(!isset($find[$pId])){
            return false;
        }
        $sonArr = array();
        foreach ( $find[$pId] as $item) {
            $son = $this->findSon($item['id'], $find);
            if($son){
                $item['next'] = $son;
            }
            $sonArr[] = $item;
        }
        return $sonArr;
    }

    public function  currentMenu($url){
        return $this->where([['url', $url],['isDel',0]])->first();
    }
    
    public function formatTree($tree, $selId, $tpls=array('<option value="{{$id}}" {{$selected}}>{{$name}}</option>'), $white=array('', '|-'), $num=0)
    {
        $str = '';
        foreach ($tree as $item) {
            $whiteStr    =  str_repeat('&nbsp;', $num*2);
            $whiteStr   .= isset($white[$num]) ? $white[$num] : end($white);
            $tplStr = isset($tpls[$num]) ? $tpls[$num] : end($tpls);
            $item['name'] = $whiteStr . $item['name'];
            $item['selected'] = $item['id'] == $selId ? 'selected' : '';
            $tmp = $tplStr;
            foreach ($item as $key => $value) {
                if($key == 'next'){
                    continue;
                }
                $tmp = preg_replace('/{{\$'.$key.'}}/', $value, $tmp);
            }
            $str .= $tmp;
            if(isset($item['next'])){
                $str .= self::formatTree($item['next'] , $selId, $tpls, $white, $num+1);
            }
        }
        return $str;
    }
    
    public function getAllAuths()
    {
        return $this->where('isDel',0)->get();
    }
}
