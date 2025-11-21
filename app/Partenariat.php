<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partenariat  extends Model
{
        protected $fillable = [
        'numero',
        'volet_partenariat',
        'denomination_partenaire',
        'personne_contact',
        'fonction',
        'telephone_email',
        'signature_convention',
        'date_signature_convention',
        'annee',
        'duree_partenariat',
        'feuille_de_route',
        'axes_collaboration',
        'axe_plan_strategique',
        'lignes_action_strategique',
        'odd',
        'point_focal_ecopop',
        'integrer_convention',
        'etat_avancement',
        'commentaire',
        'date_fin'
    ];

    protected $casts = [
    'odd' => 'array',
    'date_signature_convention' => 'date',
    'date_fin' => 'date'
];

}
