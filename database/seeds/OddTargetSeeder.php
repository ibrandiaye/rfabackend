<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OddTargetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $targets = [
            // ODD 1
            [1, '1.1', 'Éliminer l\'extrême pauvreté'],
            [1, '1.2', 'Réduire la pauvreté de moitié'],
            // ODD 2
            [2, '2.1', 'Éliminer la faim'],
            [2, '2.2', 'Mettre fin à la malnutrition'],
            // ODD 3
            [3, '3.1', 'Réduire la mortalité maternelle'],
            [3, '3.2', 'Mettre fin aux décès évitables de nouveau-nés'],
            // ODD 4
            [4, '4.1', 'Enseignement primaire et secondaire gratuit'],
            [4, '4.2', 'Accès à des services de développement de la petite enfance'],
            // ODD 5
            [5, '5.1', 'Mettre fin à la discrimination à l\'égard des femmes'],
            [5, '5.2', 'Éliminer la violence à l\'égard des femmes'],
            // ODD 13
            [13, '13.1', 'Renfort de la résilience face aux catastrophes climatiques'],
            [13, '13.2', 'Intégration du changement climatique dans les politiques'],
        ];

        foreach ($targets as $target) {
            $oddId = DB::table('odds')->where('number', $target[0])->value('id');
            if ($oddId) {
                DB::table('odd_targets')->insert([
                    'odd_id' => $oddId,
                    'number' => $target[1],
                    'description' => $target[2],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
