<?php

namespace App\Http\Services\config\Menu;

use App\Repositories\Config\Menu\MenuRepository;
use \App\Models\config\Menu\Menu;
class MenuRepositoryServices implements MenuRepository
{

    public function index()
    {

       $menu=Menu::select('vms_menu.id','vms_menu.menu_name as name','icon_name as icon','route_name as href','menu_parent_id')
//            ->leftJoin('cs_users_menus','cs_users_menus.menu_id','vms_menu.id')
//            ->where('cs_users_menus.user_id',Auth::user()->id)
//            ->groupBy('vms_menu.id')
           ->get();
        $result=array();
        $i=0;
        foreach($menu as $item) {
            $result[$i]['id']=$item->id;
            $result[$i]['label']=$item->name;
            $result[$i]['icon']= $item->icon;
            if(  $item->href !== null  ) {
                $result[$i]['to']= $item->href;
            }
            $result[$i]['menu_parent_id']=$item->menu_parent_id;
            $i++;
        }
        /** @var TYPE_NAME $result */
        return $this->organizeMenu($result);
    }

    /**
     * @param array $data
     * @param $parentId
     * @return array
     */
    public function organizeMenu(array $data, $parentId = null): array
    {
        $result = array();
        foreach ($data as $item) {
            if ($item['menu_parent_id'] == $parentId) {
                $children = $this->organizeMenu($data, $item['id']);
                if ($children) {
                    $item['items'] = $children;
                }
                $result[] = $item;
            }
        }
        return $result;
    }
}
