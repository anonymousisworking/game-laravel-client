<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();



    	// Add Admin user
        DB::table('users')->insert([
		    [
		    	'login' => 'Admin', 
		   		'email' => 'admin@game.test', 
		   		'password' => '$2y$10\$O8h8IC79WyN0cHQUHmeGlujPiDe.26U3hxGhnRngmMZ2PeIIxfcFe', 
		   		'sex' => 0
		   	],
		]);


        // Add Locations
        DB::table('locations')->insert([
		    [
		    	'id' => 1,
		    	'name' => 'Торговая площадь',
		    	'type' => 'location',
		    	'image' => 'area.jpg', 
		    	'locations_coords' => '
					{"2": "169,152 169,149 167,145 165,134 168,127 172,125 173,103 168,100 169,94 178,91 178,62 183,57 188,61 188,65 202,61 205,53 217,51 221,63 233,69 240,64 244,68 243,80 240,90 245,93 245,98 242,104 244,112 244,122 240,127 284,124 283,118 292,106 302,116 305,123 314,124 314,101 320,96 324,102 325,118 332,112 339,120 343,126 340,142 343,158 336,159 335,152 301,153 289,165 224,162 220,155 210,153 202,161 182,162 177,155",
					"3": "169,192 182,184 185,168 177,154 140,154 125,173 124,182 163,196",
					"4": "308,189 324,193 338,187 337,173 340,171 335,153 299,152 283,171 282,185 304,193",
					"5": "260,215 279,211 290,201 286,191 264,185 251,183 246,167 240,167 239,180 230,183 213,186 200,193 195,201 201,206 213,212 233,216",
					"6": "30,220 34,217 34,204 27,204 22,201 26,198 33,198 31,191 37,188 41,193 39,200 39,217 45,221 32,222",
					"7": "418,165 419,156 413,159 410,154 419,147 417,141 421,139 423,146 430,145 435,148 425,154 425,164 422,167"}
				'
		    ],
		    [
		    	'id' => 2,
		    	'name' => 'Башня сражений',
		    	'type' => 'location',
		    	'image' => null, 
		    	'locations_coords' => null
		    ],
		    [
		    	'id' => 3,
		    	'name' => 'Магазин',
		    	'type' => 'object',
		    	'image' => null, 
		    	'locations_coords' => null
		    ],
		    [
		    	'id' => 4,
		    	'name' => 'Банк',
		    	'type' => 'object',
		    	'image' => null, 
		    	'locations_coords' => null
		    ],
		    [
		    	'id' => 5,
		    	'name' => 'Фонтан',
		    	'type' => 'character',
		    	'image' => null, 
		    	'locations_coords' => null
		    ],
		    [
		    	'id' => 6,
		    	'name' => 'Озеро',
		    	'type' => 'location',
		    	'image' => 'lake.jpeg', 
		    	'locations_coords' => '{
					"1": "169,192 182,184 185,168 177,154 140,154 125,173 124,182 163,196"
				}'
		    ],
		    [
		    	'id' => 7,
		    	'name' => 'Лес',
		    	'type' => 'location',
		    	'image' => null, 
		    	'locations_coords' => null
		    ],
		]);

		// Add locations access
        DB::table('locations_access')->insert([
		    [
		    	'loc_id' => 1,
		    	'access_loc_id' => 2,
		   	],
		   	[
		    	'loc_id' => 1,
		    	'access_loc_id' => 3,
		   	],
		   	[
		    	'loc_id' => 1,
		    	'access_loc_id' => 4,
		   	],
		   	[
		    	'loc_id' => 1,
		    	'access_loc_id ' => 5,
		   	],
		   	[
		    	'loc_id' => 1,
		    	'access_loc_id ' => 6,
		   	],
		   	[
		    	'loc_id' => 1,
		    	'access_loc_id ' => 7,
		   	],

		   	[
		    	'loc_id' => 6,
		    	'access_loc_id ' => 1,
		   	],
		]);

    }
}
