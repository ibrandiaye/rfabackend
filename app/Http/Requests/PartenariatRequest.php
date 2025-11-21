<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartenariatRequest extends FormRequest
{
    public function authorize()
    {
        return true; // autoriser tous les utilisateurs (à adapter si besoin)
    }

    public function rules()
    {
        return [
            'denomination_partenaire'   => 'required|string|max:255',
            'volet_partenariat'        => 'nullable|string|max:255',
            'personne_contact'         => 'nullable|string|max:255',
            'fonction'                 => 'nullable|string|max:255',
            'telephone_email'          => 'nullable|string|max:255',
            'signature_convention'     => 'nullable|in:Oui,Non',
            'date_signature_convention'=> 'nullable|date',
            'annee'                    => 'nullable|digits:4',
            'duree_partenariat'        => 'nullable|integer|min:0',
            'feuille_de_route'         => 'nullable|in:Oui,Non',
            'axes_collaboration'       => 'nullable|string',
            'axe_plan_strategique'     => 'nullable|string|max:255',
            'lignes_action_strategique'=> 'nullable|string',
            'odd_array'                => 'nullable',
            'point_focal_ecopop'       => 'nullable|string|max:255',
            'integrer_convention'      => 'nullable|string|',
            'etat_avancement'          => 'nullable|string|max:255',
            'commentaire'              => 'nullable|string',
            'odd'                => 'nullable',
            'date_fin'                => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'denomination_partenaire.required' => 'Le champ "Dénomination Partenaire" est obligatoire.',
            'date_signature_convention.date'   => 'La date de signature doit être une date valide.',
            'annee.digits'                     => 'L\'année doit contenir exactement 4 chiffres.',
            'duree_partenariat.integer'        => 'La durée doit être un nombre entier.',
            'signature_convention.in'          => 'La valeur du champ "Signature convention" doit être Oui ou Non.',
            'feuille_de_route.in'              => 'La valeur du champ "Feuille de route" doit être Oui ou Non.',
            'integrer_convention.in'           => 'La valeur du champ "Intégrer convention" doit être Oui ou Non.',
        ];
    }
}
