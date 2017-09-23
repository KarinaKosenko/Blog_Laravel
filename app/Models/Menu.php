<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Menu - a Model to work with menu.
 */
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
