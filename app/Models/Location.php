<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
	public function closestLocations()
	{
		// return $this->belongsToMany(Location::class, 'loc_access', 'loc_id', 'access_loc_id')->select('locations.id', 'locations.name', 'locations.type');
	}

	public static function getById($id, $separate = true)
    {
    	// Location::where('id', 2)->update(['image' => 'battle-tower.jpg']);
    	// Location::where('id', 7)->update(['image' => 'forest.jpg']);
        $location = Location::where('id', $id)
                // ->with('closestLocations')
                ->select('id', 'name', 'type', 'image', 'loc_coords', 'loc_access')
                ->first();

        $closestLocations = Location::whereIn('id', json_decode($location->loc_access))
                    ->select('id', 'name', 'type', 'image')
                    ->get();
        // unset($location->closestLocations);
        // unset($location->closest_locations);

        return [
        	'location' => $location,
        	'closestLocations' => $closestLocations,
        ];
    }
}
