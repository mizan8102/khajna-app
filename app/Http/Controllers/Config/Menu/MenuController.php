<?php

namespace App\Http\Controllers\Config\Menu;

use App\Http\Controllers\Controller;
use App\Repositories\Config\Menu\MenuRepository;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    protected MenuRepository $menuRepository;

    public  function __construct(MenuRepository $menuRepository)
    {
        $this->menuRepository = $menuRepository;
    }

    public  function  index(): \Illuminate\Http\JsonResponse
    {
        return api_response(msg: "success", data: $this->menuRepository->index(), status: 200);
    }
}
