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
                'clan' => 1,
    	   		'super_hits' => generateSuperHit(),
    	   		'access_level' => 1,
                'curhp' => 100,
                'maxhp' => 100,
                'power' => 15,
                'level' => 8,
    	   	],
		]);

		DB::table('users')->insert([
    	    [
    	    	'login' => 'Tester',
    	   		'email' => 'tester@game.test',
    	   		'password' => '$2y$10$O8h8IC79WyN0cHQUHmeGlujPiDe.26U3hxGhnRngmMZ2PeIIxfcFe',
    	   		'sex' => 1,
    	   		'super_hits' => generateSuperHit(),
    	   	],
		]);

        DB::table('clans')->insert([
            'name' => 'Developers',
            'tendency' => 1,
            'img' => 'developers.png'
        ]);

        DB::table('tendencies')->insert([
            'name' => 'Neutral',
            'img' => 'neutral.gif',
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
		    	'name' => 'Статуя древнего воина',
		    	'type' => 'character',
		    	'image' => 'warrior-statue.jpg',
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
                'name' => 'Золото',
                'item_type' => 'money',
                'stackable' => 1,
            ]
        ]);

		DB::table('allitems')->insert([
			[
				'item_id' => 20,
				'name' => 'Шлем рыцаря',
				'item_type' => 'armor',
				'body_part' => 'head',
				'armor_type' => 'heavy',
				'material' => 'steel',
				'need_level' => 5,
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
				'item_id' => 21,
				'name' => 'Нагрудник рыцаря',
				'item_type' => 'armor',
				'body_part' => 'chest',
				'armor_type' => 'heavy',
				'material' => 'steel',
				'need_level' => 1,
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
				'item_id' => 22,
				'name' => 'Поножи рыцаря',
				'item_type' => 'armor',
				'body_part' => 'legs',
				'armor_type' => 'heavy',
				'material' => 'steel',
				'need_level' => 1,
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
				'item_id' => 23,
				'name' => 'Перчатки рыцаря',
				'item_type' => 'armor',
				'body_part' => 'gloves',
				'armor_type' => 'heavy',
				'material' => 'steel',
				'need_level' => 5,
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
				'item_id' => 24,
				'name' => 'Сапоги рыцаря',
				'item_type' => 'armor',
				'body_part' => 'feet',
				'armor_type' => 'heavy',
				'material' => 'steel',
				'need_level' => 3,
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
				'item_id' => 28,
				'name' => 'example',
				'item_type' => null,
				'body_part' => null,
				'armor_type' => null,
				'material' => null,
				'need_level' => 0,
				'min_damage' => 0,
				'max_damage' => 0,
				'power' => 0,
				'critical' => 0,
				'evasion' => 0,
				'stamina' => 0,
				'hp' => 0,
				'image' => null,
				'price' => 0,
			],
		]);

        DB::table('allitems')->insert([
            [
                'item_id' => 25,
                'name' => 'Кинжал рыцаря',
                'item_type' => 'weapon',
                'body_part' => 'rhand',
                'armor_type' => null,
                'material' => 'steel',
                'need_level' => 2,
                'min_damage' => 5,
                'max_damage' => 5,
                'power' => 1,
                'critical' => 1,
                'evasion' => 0,
                'stamina' => 0,
                'hp' => 3,
                'image' => '6.jpg',
                'price' => 0,
                'enchantable' => 1,
            ]
        ]);

        DB::table('allitems')->insert([
            [
                'item_id' => 26,
                'name' => 'Подарок',
                'item_type' => 'gift',
                'image' => 'klever.gif',
                'sellable' => 0,
                'stackable' => 0,
            ],[
                'item_id' => 10,
                'name' => 'Эликсир жизни',
                'item_type' => 'potion',
                'image' => 'life_potion.jpg',
                'sellable' => 1,
                'stackable' => 1,
            ],[
                'item_id' => 27,
                'name' => 'Ботинок',
                'item_type' => 'trash',
                'image' => 'fishboot.gif',
                'sellable' => 0,
                'stackable' => 1,
            ],[
                'item_id' => 29,
                'name' => 'Алебарда ящера',
                'item_type' => 'quest',
                'image' => 'spear.jpg',
                'sellable' => 0,
                'stackable' => 1,
            ],
        ]);

		DB::table('items')->insert([
			[
				'owner_id' => 1,
				'item_id' => 20,
			],[
				'owner_id' => 1,
				'item_id' => 21,
			],[
				'owner_id' => 1,
				'item_id' => 22,
			],[
				'owner_id' => 1,
				'item_id' => 23,
			],[
				'owner_id' => 1,
				'item_id' => 24,
			],[
				'owner_id' => 1,
				'item_id' => 25,
			],[
				'owner_id' => 1,
				'item_id' => 26,
			],[
				'owner_id' => 1,
				'item_id' => 27,
			],
		]);

        DB::table('items')->insert([
            [
                'owner_id' => 1,
                'item_id' => 10,
                'count' => 3,
            ],
            [
                'owner_id' => 1,
                'item_id' => 1,
                'count' => 1055,
            ],
            [
                'owner_id' => 1,
                'item_id' => 29,
                'count' => 8,
            ],
        ]);


        DB::table('npc')->insert([
            [
                'id' => 1,
                'name' => 'Ящер',
                'level' => 1,
                'sex' => 0,
                // 'type' => 'monster',
                'curhp' => 18,
                'maxhp' => 18,
                'power' => 5,
                'critical' => 5,
                'evasion' => 5,
                'stamina' => 3,
                'image' => 'yashcher.jpg',
            ],
            [
                'id' => 2,
                'name' => 'Волк',
                'level' => 1,
                'sex' => 0,
                // 'type' => 'monster',
                'curhp' => 18,
                'maxhp' => 18,
                'power' => 5,
                'critical' => 5,
                'evasion' => 5,
                'stamina' => 3,
                'image' => 'wolf.jpg',
            ],
            [
                'id' => 3,
                'name' => 'Скелет',
                'level' => 2,
                'sex' => 0,
                // 'type' => 'monster',
                'curhp' => 30,
                'maxhp' => 30,
                'power' => 10,
                'critical' => 10,
                'evasion' => 10,
                'stamina' => 10,
                'image' => 'skeleton.jpg',
            ],
        ]);



        DB::table('spawnlist')->insert([
            ['npc_id' => 1,'loc_id' => 1],
            ['npc_id' => 1,'loc_id' => 1],
            ['npc_id' => 1,'loc_id' => 1],
        ]);
        DB::table('spawnlist')->insert([
            ['npc_id' => 2,'loc_id' => 7],
            ['npc_id' => 2,'loc_id' => 7],
            ['npc_id' => 2,'loc_id' => 7],
        ]);

        DB::table('spawnlist')->insert([
            ['npc_id' => 3,'loc_id' => 6],
            ['npc_id' => 3,'loc_id' => 6],
        ]);

DB::table('quests')->insert([
    ['id' => 1, 'name' => 'Нашествие ящеров', 'level' => 1, 'npc_id' => 5, 'data' => '{"steps":{"0":{"text":"Здравствуй, храбрый воин. Наш город поддался нашествию этих враждебных ящеров и нам нужна любая помощь в борьбе с ними. Присоединишься к борьбе?","answers":{"1":"Да, я постараюсь помочь с нашествием ящеров.","abort":"Не сейчас"}},"1":{"text":"Это поднимает наш общий боевой дух. Принеси мне 5 алебард этих злобных ящеров и я отблагодарю тебя."},"abort":{"text":"Мы будем ждать твоей помощи, когда ты будешь готов."}},"do":{"text":"Ты еще не собрал 5 алебард ящеров."},"done":{"text":"Ты славно дрался, воин. Ты заслужил награду. Возьми эти эликсиры жизни, пускай они тебе пригодятся в нелегком бою.","take_reward":"Забрать награду","reward":[{"id":10,"count":2}]},"condition":{"done":[{"id":29,"count":5}]},"description":{"text": "В городе появилось много враждебных ящеров, воин, душа древнего воина просит тебя о помощи, освободить город от нежданных гостей.","condition":"Побеждая ящеров, собери пять алебард и вернись к статуе."}}'],
]);

DB::table('drops')->insert([
    ['npc_id' => 1,'item_id' => 1, 'min' => 2, 'max' => 5, 'chance' => 1000, 'category' => 0],
    ['npc_id' => 1,'item_id' => 29, 'min' => 1, 'max' => 1, 'chance' => 1000, 'category' => 2],
]);
    }
}

function generateSuperHit()
{
	$level = 1;
	$existingSuperHits = [];
	$superHitSteps = [
		1 => 2,
		2 => 3,
		3 => 4,
		4 => 4,
		5 => 5,
		6 => 5,
		7 => 6,
		8 => 6,
		9 => 7,
		10 => 7,
	];

	$generatedSuperHit = [];
	$needSteps = $superHitSteps[$level];
	$step = 1;
	$duplicate = true;
	$requiredSteps = 0;

	do {
		for ($i = 0; $i < $needSteps; $i++) {
			$generatedSuperHit[$i] = mt_rand(1, 3);
		}

		$duplicate = false;
		$superHitLength = count($generatedSuperHit);

		foreach ($existingSuperHits as $hitLevel => $sh) {
			// Проверяем по кускам. Пример: [1, 2, 3] разбиваем по [1, 2] & [2, 3] и сверяем
			for ($chunkOffset = 0; $superHitSteps[$hitLevel] + $chunkOffset <= $superHitLength; $chunkOffset++) {
				$checkSteps = array_slice($generatedSuperHit, $chunkOffset, $superHitSteps[$hitLevel]);

				if (join('.', $checkSteps) == join('.', $existingSuperHits[$hitLevel]['hit'])) {
					// d('duplicate: ' . json_encode($generatedSuperHit));
					$duplicate = true;
					break 2;
				}
			}
		}

		if ($requiredSteps > 500) {
			d('Too many attempts for generating super hit!');
			return;
		}
		$requiredSteps++;

	} while ($duplicate);

	$existingSuperHits[$level] = [
		'hit' => $generatedSuperHit,
		'open' => false
	];

	return json_encode($existingSuperHits);
}
