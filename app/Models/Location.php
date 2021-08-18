<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
	public function closestLocations()
	{
		return $this->belongsToMany(Location::class, 'locations_access', 'loc_id', 'access_loc_id')->select('locations.id', 'locations.name', 'locations.type');
	}

	public static function getById($id)
    {
        return Location::where('id', $id)
                ->with('closestLocations')
                ->select('id', 'name', 'type', 'image', 'locations_coords')
                ->first();
    }
}
