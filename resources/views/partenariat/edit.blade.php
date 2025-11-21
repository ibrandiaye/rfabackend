@extends('layouts.partanariat')

@section('content')
<div class="container">
    <h2>Modifier un Partenariat</h2>

    <form action="{{ route('partenariat.update', $partenariat) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{  $partenariat->id   }}">

         <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="denomination_partenaire">Dénomination Partenaire *</label>
                    <input type="text" name="denomination_partenaire" class="form-control" value="{{ old('denomination_partenaire',$partenariat->denomination_partenaire) }}" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="volet_partenariat">Volet Partenariat</label>
                    <select name="volet_partenariat" class="form-control">
                        <option value="">-- Choisir --</option>
                        <option value="Collectivités Territoriales" {{ old('volet_partenariat',$partenariat->volet_partenariat) == 'Collectivités Territoriales' ? 'selected' : '' }}>Collectivités Territoriales</option>
                        <option value="Agences Projets et Programmes de l'Etat" {{ old('volet_partenariat',$partenariat->volet_partenariat) == "Agences Projets et Programmes de l'Etat" ? 'selected' : '' }}>Agences Projets et Programmes de l'Etat</option>
                        <option value="ONG" {{ old('volet_partenariat',$partenariat->volet_partenariat) == 'ONG' ? 'selected' : '' }}>ONG</option>
                        <option value="Universités et instituts de recherche" {{ old('volet_partenariat',$partenariat->volet_partenariat) == "Universités et instituts de recherche" ? 'selected' : '' }}>Universités et instituts de recherche</option>
                        <option value="Associations et mouvements" {{ old('volet_partenariat',$partenariat->volet_partenariat) == 'Associations et mouvements' ? 'selected' : '' }}>Associations et mouvements</option>
                        <option value="Secteur privé" {{ old('volet_partenariat',$partenariat->volet_partenariat) == "Secteur privé" ? 'selected' : '' }}>Secteur privé</option>
                        <option value="Autres" {{ old('volet_partenariat',$partenariat->volet_partenariat) == 'Autres' ? 'selected' : '' }}>Autres</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="personne_contact">Personne Contact</label>
                    <input type="text" name="personne_contact" class="form-control" value="{{ old('personne_contact',$partenariat->personne_contact) }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="fonction">Fonction</label>
                    <input type="text" name="fonction" class="form-control" value="{{ old('fonction',$partenariat->fonction) }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="telephone_email">Téléphone / Email</label>
                    <input type="text" name="telephone_email" class="form-control" value="{{ old('telephone_email',$partenariat->telephone_email) }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="signature_convention">Signature Convention</label>
                    <select name="signature_convention" class="form-control">
                        <option value="">-- Choisir --</option>
                        <option value="Oui" {{ old('signature_convention',$partenariat->signature_convention) == 'Oui' ? 'selected' : '' }}>Oui</option>
                        <option value="Non" {{ old('signature_convention',$partenariat->signature_convention) == 'Non' ? 'selected' : '' }}>Non</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="date_signature_convention">Date Signature Convention</label>
                    <input type="date" name="date_signature_convention" class="form-control" value="{{ old('date_signature_convention',$partenariat->date_signature_convention) }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="annee">Année</label>
                    <input type="number" name="annee" class="form-control" value="{{ old('annee',$partenariat->annee) }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="duree_partenariat">Durée (mois)</label>
                    <input type="number" name="duree_partenariat" class="form-control" value="{{ old('duree_partenariat',$partenariat->duree_partenariat) }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="feuille_de_route">Feuille de route</label>
                    <select name="feuille_de_route" class="form-control">
                        <option value="">-- Choisir --</option>
                        <option value="Oui" {{ old('feuille_de_route',$partenariat->feuille_de_route) == 'Oui' ? 'selected' : '' }}>Oui</option>
                        <option value="Non" {{ old('feuille_de_route',$partenariat->feuille_de_route) == 'Non' ? 'selected' : '' }}>Non</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="axes_collaboration">Axes de Collaboration</label>
                <textarea name="axes_collaboration" class="form-control" rows="2">{{ old('axes_collaboration',$partenariat->axes_collaboration) }}</textarea>
            </div>

            <div class="form-group">
                <label for="lignes_action_strategique">Lignes d’action stratégique</label>
                <textarea name="lignes_action_strategique" class="form-control" rows="2">{{ old('lignes_action_strategique',$partenariat->lignes_action_strategique) }}</textarea>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="axe_plan_strategique">Axe Plan Stratégique</label>
                    <input type="text" name="axe_plan_strategique" class="form-control" value="{{ old('axe_plan_strategique',$partenariat->axe_plan_strategique) }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="oddSelect">Choisissez un ou plusieurs ODD :</label>
                    <select class="form-control" id="oddSelect" name="odd_array[]" multiple size="10">
                    @php
                        $oldOdds = old('odd_array', json_decode($partenariat->odd) ?? []);
                    @endphp
                    <option value="1 - Pas de pauvreté" {{ in_array("1 - Pas de pauvreté", $oldOdds) ? 'selected' : '' }}>1 - Pas de pauvreté</option>
                    <option value="2 - Faim zéro" {{ in_array("2 - Faim zéro", $oldOdds) ? 'selected' : '' }}>2 - Faim zéro</option>
                    <option value="3 - Bonne santé et bien-être" {{ in_array("3 - Bonne santé et bien-être", $oldOdds) ? 'selected' : '' }}>3 - Bonne santé et bien-être</option>
                    <option value="4 - Éducation de qualité" {{ in_array("4 - Éducation de qualité", $oldOdds) ? 'selected' : '' }}>4 - Éducation de qualité</option>
                    <option value="5 - Égalité entre les sexes" {{ in_array("5 - Égalité entre les sexes", $oldOdds) ? 'selected' : '' }}>5 - Égalité entre les sexes</option>
                    <option value="6 - Eau propre et assainissement" {{ in_array("6 - Eau propre et assainissement", $oldOdds) ? 'selected' : '' }}>6 - Eau propre et assainissement</option>
                    <option value="7 - Énergie propre et d’un coût abordable" {{ in_array("7 - Énergie propre et d’un coût abordable", $oldOdds) ? 'selected' : '' }}>7 - Énergie propre et d’un coût abordable</option>
                    <option value="8 - Travail décent et croissance économique" {{ in_array("8 - Travail décent et croissance économique", $oldOdds) ? 'selected' : '' }}>8 - Travail décent et croissance économique</option>
                    <option value="9 - Industrie, innovation et infrastructure" {{ in_array("9 - Industrie, innovation et infrastructure", $oldOdds) ? 'selected' : '' }}>9 - Industrie, innovation et infrastructure</option>
                    <option value="10 - Inégalités réduites" {{ in_array("10 - Inégalités réduites", $oldOdds) ? 'selected' : '' }}>10 - Inégalités réduites</option>
                    <option value="11 - Villes et communautés durables" {{ in_array("11 - Villes et communautés durables", $oldOdds) ? 'selected' : '' }}>11 - Villes et communautés durables</option>
                    <option value="12 - Consommation et production responsables" {{ in_array("12 - Consommation et production responsables", $oldOdds) ? 'selected' : '' }}>12 - Consommation et production responsables</option>
                    <option value="13 - Lutte contre les changements climatiques" {{ in_array("13 - Lutte contre les changements climatiques", $oldOdds) ? 'selected' : '' }}>13 - Lutte contre les changements climatiques</option>
                    <option value="14 - Vie aquatique" {{ in_array("14 - Vie aquatique", $oldOdds) ? 'selected' : '' }}>14 - Vie aquatique</option>
                    <option value="15 - Vie terrestre" {{ in_array("15 - Vie terrestre", $oldOdds) ? 'selected' : '' }}>15 - Vie terrestre</option>
                    <option value="16 - Paix, justice et institutions efficaces" {{ in_array("16 - Paix, justice et institutions efficaces", $oldOdds) ? 'selected' : '' }}>16 - Paix, justice et institutions efficaces</option>
                    <option value="17 - Partenariats pour la réalisation des objectifs" {{ in_array("17 - Partenariats pour la réalisation des objectifs", $oldOdds) ? 'selected' : '' }}>17 - Partenariats pour la réalisation des objectifs</option>
                    </select>
                   {{--  <label for="odd">ODD</label>
                    <input type="text" name="odd" class="form-control" value="{{ old('odd',$partenariat->odd) }}"> --}}
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="point_focal_ecopop">Point Focal ECOPOP</label>
                    <input type="text" name="point_focal_ecopop" class="form-control" value="{{ old('point_focal_ecopop',$partenariat->point_focal_ecopop) }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="integrer_convention">Document Convention</label>
                    <input type="file" name="doc" class="form-control" >
                    {{-- <label for="integrer_convention">Intégrer Convention</label>
                    <select name="integrer_convention" class="form-control">
                        <option value="">-- Choisir --</option>
                        <option value="Oui" {{ old('integrer_convention',$partenariat->integrer_convention) == 'Oui' ? 'selected' : '' }}>Oui</option>
                        <option value="Non" {{ old('integrer_convention',$partenariat->integrer_convention) == 'Non' ? 'selected' : '' }}>Non</option>
                    </select> --}}
                </div>
            </div>

            <div class="form-group">
                <label for="etat_avancement">État d’Avancement</label>
                {{-- <input type="text" name="etat_avancement" class="form-control" value="{{ old('etat_avancement',$partenariat->etat_avancement) }}"> --}}
                 <select name="etat_avancement" class="form-control">
                    <option value="">-- Choisir --</option>
                    <option value="En cours" {{ old('etat_avancement',$partenariat->etat_avancement) == 'En cours' ? 'selected' : '' }}>En cours</option>
                    <option value="Achevée" {{ old('etat_avancement',$partenariat->etat_avancement) == 'Achevée' ? 'selected' : '' }}>Achevée</option>
                </select>
            </div>

            <div class="form-group">
                <label for="commentaire">Commentaire</label>
                <textarea name="commentaire" class="form-control" rows="3">{{ old('commentaire',$partenariat->commentaire) }}</textarea>
            </div>


        <button type="submit" class="btn btn-success">Mettre à jour</button>
        <a href="{{ route('partenariat.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
