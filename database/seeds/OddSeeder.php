<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OddSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $odds = [
            [1, 'Pas de pauvreté', 'Éliminer la pauvreté sous toutes ses formes et partout dans le monde.'],
            [2, 'Faim « zéro »', 'Éliminer la faim, assurer la sécurité alimentaire, améliorer la nutrition et promouvoir l’agriculture durable.'],
            [3, 'Bonne santé et bien-être', 'Permettre à tous de vivre en bonne santé et promouvoir le bien-être de tous à tout âge.'],
            [4, 'Éducation de qualité', 'Assurer l’accès de tous à une éducation de qualité, sur un pied d’égalité, et promouvoir les possibilités d’apprentissage tout au long de la vie.'],
            [5, 'Égalité entre les sexes', 'Parvenir à l’égalité des sexes et autonomiser toutes les femmes et les filles.'],
            [6, 'Eau propre et assainissement', 'Garantir l’accès de tous à l’eau et à l’assainissement et assurer une gestion durable des ressources en eau.'],
            [7, 'Énergie propre et d\'un coût abordable', 'Garantir l’accès de tous à des services énergétiques fiables, durables et modernes, à un coût abordable.'],
            [8, 'Travail décent et croissance économique', 'Promouvoir une croissance économique soutenue, partagée et durable, le plein emploi productif et un travail décent pour tous.'],
            [9, 'Industrie, innovation et infrastructure', 'Bâtir une infrastructure résiliente, promouvoir une industrialisation durable qui profite à tous et encourager l’innovation.'],
            [10, 'Inégalités réduites', 'Réduire les inégalités dans les pays et d’un pays à l’autre.'],
            [11, 'Villes et communautés durables', 'Faire en sorte que les villes et les établissements humains soient ouverts à tous, sûrs, résilients et durables.'],
            [12, 'Consommation et production responsables', 'Instaurer des modes de consommation et de production durables.'],
            [13, 'Mesures relatives à la lutte contre les changements climatiques', 'Prendre d’urgence des mesures pour lutter contre les changements climatiques et leurs répercussions.'],
            [14, 'Vie aquatique', 'Conserver et exploiter de manière durable les océans, les mers et les ressources marines aux fins du développement durable.'],
            [15, 'Vie terrestre', 'Préserver et restaurer les écosystèmes terrestres, en veillant à les exploiter de façon durable, gérer durablement les forêts, lutter contre la désertification, enrayer et inverser le processus de dégradation des sols et mettre fin à l’appauvrissement de la biodiversité.'],
            [16, 'Paix, justice et institutions efficaces', 'Promouvoir l’avènement de sociétés pacifiques et inclusives aux fins du développement durable, assurer l’accès de tous à la justice et mettre en place, à tous les niveaux, des institutions efficaces, responsables et ouvertes à tous.'],
            [17, 'Partenariats pour la réalisation des objectifs', 'Renforcer les moyens de mettre en œuvre le Partenariat mondial pour le développement durable et le revitaliser.'],
        ];

        foreach ($odds as $odd) {
            DB::table('odds')->insert([
                'number' => $odd[0],
                'title' => $odd[1],
                'description' => $odd[2],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
