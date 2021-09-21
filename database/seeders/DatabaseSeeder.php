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
			   		'password' => '$2y$10$O8h8IC79WyN0cHQUHmeGlujPiDe.26U3hxGhnRngmMZ2PeIIxfcFe', 
			   		'sex' => 0,
			   		'access_level' => 1
			   	],
				]);

				DB::table('users')->insert([
			    [
			    	'login' => 'Tester', 
			   		'email' => 'tester@game.test', 
			   		'password' => '$2y$10$O8h8IC79WyN0cHQUHmeGlujPiDe.26U3hxGhnRngmMZ2PeIIxfcFe', 
			   		'sex' => 1
			   	],
				]);


        // Add Locations
        DB::table('locations')->insert([
		    [
		    	'id' => 1,
		    	'name' => 'Торговая площадь',
		    	'type' => 'location',
		    	'image' => 'area.jpg', 
		    	'loc_coords' => '
					{"2": "169,152 169,149 167,145 165,134 168,127 172,125 173,103 168,100 169,94 178,91 178,62 183,57 188,61 188,65 202,61 205,53 217,51 221,63 233,69 240,64 244,68 243,80 240,90 245,93 245,98 242,104 244,112 244,122 240,127 284,124 283,118 292,106 302,116 305,123 314,124 314,101 320,96 324,102 325,118 332,112 339,120 343,126 340,142 343,158 336,159 335,152 301,153 289,165 224,162 220,155 210,153 202,161 182,162 177,155",
					"3": "169,192 182,184 185,168 177,154 140,154 125,173 124,182 163,196",
					"4": "308,189 324,193 338,187 337,173 340,171 335,153 299,152 283,171 282,185 304,193",
					"5": "260,215 279,211 290,201 286,191 264,185 251,183 246,167 240,167 239,180 230,183 213,186 200,193 195,201 201,206 213,212 233,216",
					"6": "30,220 34,217 34,204 27,204 22,201 26,198 33,198 31,191 37,188 41,193 39,200 39,217 45,221 32,222",
					"7": "418,165 419,156 413,159 410,154 419,147 417,141 421,139 423,146 430,145 435,148 425,154 425,164 422,167"}
				',
				'loc_access' => '[2,3,4,5,6,7]'
		    ],
		    [
		    	'id' => 2,
		    	'name' => 'Башня сражений',
		    	'type' => 'location',
		    	'image' => 'battle-tower.jpg', 
		    	'loc_coords' => null,
				'loc_access' => '[1]'
		    ],
		    [
		    	'id' => 3,
		    	'name' => 'Магазин',
		    	'type' => 'object',
		    	'image' => null, 
		    	'loc_coords' => null,
				'loc_access' => '[1]'
		    ],
		    [
		    	'id' => 4,
		    	'name' => 'Банк',
		    	'type' => 'object',
		    	'image' => null, 
		    	'loc_coords' => null,
				'loc_access' => '[1]'
		    ],
		    [
		    	'id' => 5,
		    	'name' => 'Фонтан',
		    	'type' => 'character',
		    	'image' => null, 
		    	'loc_coords' => null,
				'loc_access' => '[1]'
		    ],
		    [
		    	'id' => 6,
		    	'name' => 'Озеро',
		    	'type' => 'location',
		    	'image' => 'lake.jpeg', 
		    	'loc_coords' => '{
					"1": "169,192 182,184 185,168 177,154 140,154 125,173 124,182 163,196"
				}',
				'loc_access' => '[1]'
		    ],
		    [
		    	'id' => 7,
		    	'name' => 'Лес',
		    	'type' => 'location',
		    	'image' => 'forest.jpg', 
		    	'loc_coords' => null,
				'loc_access' => '[1]'
		    ],
		]);

		DB::table('allitems')->insert([
			[
				'item_id' => 1,
				'name' => 'Шлем рыцаря',
				'item_type' => 'armor',
				'body_part' => 'head',
				'armor_type' => 'heavy',
				'material' => 'steel',
				'min_damage' => 0,
				'max_damage' => 0,
				'power' => 1,
				'critical' => 0,
				'evasion' => 0,
				'stamina' => 1,
				'hp' => 3,
				'image' => '1.jpg',
				'price' => 0,
			],[
				'item_id' => 2,
				'name' => 'Нагрудник рыцаря',
				'item_type' => 'armor',
				'body_part' => 'chest',
				'armor_type' => 'heavy',
				'material' => 'steel',
				'min_damage' => 0,
				'max_damage' => 0,
				'power' => 0,
				'critical' => 1,
				'evasion' => 0,
				'stamina' => 0,
				'hp' => 10,
				'image' => '2.jpg',
				'price' => 0,
			],[
				'item_id' => 3,
				'name' => 'Поножи рыцаря',
				'item_type' => 'armor',
				'body_part' => 'legs',
				'armor_type' => 'heavy',
				'material' => 'steel',
				'min_damage' => 0,
				'max_damage' => 0,
				'power' => 0,
				'critical' => 0,
				'evasion' => 0,
				'stamina' => 0,
				'hp' => 3,
				'image' => '3.jpg',
				'price' => 0,
			],[
				'item_id' => 4,
				'name' => 'Перчатки рыцаря',
				'item_type' => 'armor',
				'body_part' => 'gloves',
				'armor_type' => 'heavy',
				'material' => 'steel',
				'min_damage' => 0,
				'max_damage' => 0,
				'power' => 0,
				'critical' => 0,
				'evasion' => 0,
				'stamina' => 0,
				'hp' => 3,
				'image' => '4.jpg',
				'price' => 0,
			],[
				'item_id' => 5,
				'name' => 'Сапоги рыцаря',
				'item_type' => 'armor',
				'body_part' => 'feet',
				'armor_type' => 'heavy',
				'material' => 'steel',
				'min_damage' => 0,
				'max_damage' => 0,
				'power' => 0,
				'critical' => 0,
				'evasion' => 0,
				'stamina' => 0,
				'hp' => 3,
				'image' => '5.jpg',
				'price' => 0,
			],[
				'item_id' => 6,
				'name' => 'Кинжал рыцаря',
				'item_type' => 'weapon',
				'body_part' => 'rhand',
				'armor_type' => null,
				'material' => 'steel',
				'min_damage' => 5,
				'max_damage' => 5,
				'power' => 1,
				'critical' => 1,
				'evasion' => 0,
				'stamina' => 0,
				'hp' => 3,
				'image' => '6.jpg',
				'price' => 0,
			],[
				'item_id' => 7,
				'name' => 'Секира грозы',
				'item_type' => 'weapon',
				'body_part' => 'dblhand',
				'armor_type' => null,
				'material' => 'steel',
				'min_damage' => 10,
				'max_damage' => 20,
				'power' => 5,
				'power' => 5,
				'critical' => 5,
				'evasion' => 5,
				'stamina' => 0,
				'hp' => 100,
				'image' => 'storm_ax.gif',
				'price' => 9999,
			],[
				'item_id' => 8,
				'name' => 'example',
				'item_type' => null,
				'body_part' => null,
				'armor_type' => null,
				'material' => null,
				'min_damage' => 0,
				'max_damage' => 0,
				'power' => 0,
				'critical' => 0,
				'evasion' => 0,
				'stamina' => 0,
				'hp' => 0,
				'image' => null,
				'price' => 0,
			],[
				'item_id' => 9,
				'name' => 'Подарок',
				'item_type' => 'gift',
				'body_part' => null,
				'armor_type' => null,
				'material' => null,
				'min_damage' => 0,
				'max_damage' => 0,
				'power' => 0,
				'critical' => 0,
				'evasion' => 0,
				'stamina' => 0,
				'hp' => 0,
				'image' => 'klever.gif',
				'price' => 0,
			],[
				'item_id' => 10,
				'name' => 'Эликсир жизни',
				'item_type' => 'potion',
				'body_part' => null,
				'armor_type' => null,
				'material' => null,
				'min_damage' => 0,
				'max_damage' => 0,
				'power' => 0,
				'critical' => 0,
				'evasion' => 0,
				'stamina' => 0,
				'hp' => 0,
				'image' => 'life_potion.gif',
				'price' => 0,
			],[
				'item_id' => 11,
				'name' => 'Ботинок',
				'item_type' => 'trash',
				'body_part' => null,
				'armor_type' => null,
				'material' => null,
				'min_damage' => 0,
				'max_damage' => 0,
				'power' => 0,
				'critical' => 0,
				'evasion' => 0,
				'stamina' => 0,
				'hp' => 0,
				'image' => 'fishboot.gif',
				'price' => 0,
			],
		]);

		DB::table('items')->insert([
			[
				'owner_id' => 1,
				'item_id' => 1,
			],[
				'owner_id' => 1,
				'item_id' => 2,
			],[
				'owner_id' => 1,
				'item_id' => 3,
			],[
				'owner_id' => 1,
				'item_id' => 4,
			],[
				'owner_id' => 1,
				'item_id' => 5,
			],[
				'owner_id' => 1,
				'item_id' => 6,
			],[
				'owner_id' => 1,
				'item_id' => 9,
			],[
				'owner_id' => 1,
				'item_id' => 10,
			],[
				'owner_id' => 1,
				'item_id' => 11,
			],
		]);




        DB::table('npc')->insert([
            [
                'name' => 'Ящер', 
                'level' => 0,
                'sex' => 0,
                'curhp' => 18,
                'maxhp' => 18,
                'power' => 5,
                'critical' => 5,
                'evasion' => 5,
                'stamina' => 3,
                'image' => 'yashcher.jpg',
            ]
        ]);

        

        DB::table('spawnlist')->insert([
            [
                'npc_id' => 1, 
                'loc_id' => 1,
            ],[
                'npc_id' => 1, 
                'loc_id' => 1,
            ],[
                'npc_id' => 1, 
                'loc_id' => 6,
            ],
        ]);

		// Add locations access
        // DB::table('locations_access')->insert([
        	// // Торговая площадь
		    // [
		    	// 'loc_id' => 1,
		    	// 'access_loc_id' => 2,
		   	// ],
		   	// [
		    	// 'loc_id' => 1,
		    	// 'access_loc_id' => 3,
		   	// ],
		   	// [
		    	// 'loc_id' => 1,
		    	// 'access_loc_id' => 4,
		   	// ],
		   	// [
		    	// 'loc_id' => 1,
		    	// 'access_loc_id ' => 5,
		   	// ],
		   	// [
		    	// 'loc_id' => 1,
		    	// 'access_loc_id ' => 6,
		   	// ],
		   	// [
		    	// 'loc_id' => 1,
		    	// 'access_loc_id ' => 7,
		   	// ],

        	// // Башня сражений
		   	// [
		    	// 'loc_id' => 2,
		    	// 'access_loc_id ' => 1,
		   	// ],

        	// // Магазин
		   	// [
		    	// 'loc_id' => 3,
		    	// 'access_loc_id ' => 1,
		   	// ],

		   	// // Банк
		   	// [
		    	// 'loc_id' => 4,
		    	// 'access_loc_id ' => 1,
		   	// ],


			// // Фонтан
		   	// [
		    	// 'loc_id' => 5,
		    	// 'access_loc_id ' => 1,
		   	// ],

		   	// // Озеро
		   	// [
		    	// 'loc_id' => 6,
		    	// 'access_loc_id ' => 1,
		   	// ],

		   	// // Лес
		   	// [
		    	// 'loc_id' => 7,
		    	// 'access_loc_id ' => 1,
		   	// ],

		// ]);

    }
}
