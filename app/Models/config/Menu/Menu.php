<?php

namespace App\Models\config\Menu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $primaryKey="id";
    protected $table="vms_menu";
    protected $guarded=[];
}
