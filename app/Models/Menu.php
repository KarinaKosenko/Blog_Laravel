<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public static function setMenuIsActive($menu, $item_name)
	{
		foreach($menu as $one) {
			if ($one->item_name === $item_name) {
				$one->is_active = 1;
			}
		}
		
		return $menu;
	}
}
