@extends('layouts.partanariat')

@section('content')
<div class="card">
    <div class="card-header bg-success text-white">
        <h4 class="mb-0">➕ Ajouter un Partenariat</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('partenariat.store') }}" method="POST"  enctype="multipart/form-data">
            @csrf

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="denomination_partenaire">Dénomination Partenaire *</label>
                    <input type="text" name="denomination_partenaire" class="form-control" value="{{ old('denomination_partenaire') }}" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="volet_partenariat">Volet Partenariat</label>
                    <select name="volet_partenariat" class="form-control">
                        <option value="">-- Choisir --</option>
                        <option value="Collectivités Territoriales" {{ old('volet_partenariat') == 'Collectivités Territoriales' ? 'selected' : '' }}>Collectivités Territoriales</option>
                        <option value="Agences Projets et Programmes de l'Etat" {{ old('volet_partenariat') == "Agences Projets et Programmes de l'Etat" ? 'selected' : '' }}>Agences Projets et Programmes de l'Etat</option>
                        <option value="ONG" {{ old('volet_partenariat') == 'ONG' ? 'selected' : '' }}>ONG</option>
                        <option value="Universités et instituts de recherche" {{ old('volet_partenariat') == "Universités et instituts de recherche" ? 'selected' : '' }}>Universités et instituts de recherche</option>
                        <option value="Associations et mouvements" {{ old('volet_partenariat') == 'Associations et mouvements' ? 'selected' : '' }}>Associations et mouvements</option>
                        <option value="Secteur privé" {{ old('volet_partenariat') == "Secteur privé" ? 'selected' : '' }}>Secteur privé</option>
                        <option value="Autres" {{ old('volet_partenariat') == 'Autres' ? 'selected' : '' }}>Autres</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="personne_contact">Personne Contact</label>
                    <input type="text" name="personne_contact" class="form-control" value="{{ old('personne_contact') }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="fonction">Fonction</label>
                    <input type="text" name="fonction" class="form-control" value="{{ old('fonction') }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="telephone_email">Téléphone / Email</label>
                    <input type="text" name="telephone_email" class="form-control" value="{{ old('telephone_email') }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="signature_convention">Signature Convention</label>
                    <select name="signature_convention" class="form-control">
                        <option value="">-- Choisir --</option>
                        <option value="Oui" {{ old('signature_convention') == 'Oui' ? 'selected' : '' }}>Oui</option>
                        <option value="Non" {{ old('signature_convention') == 'Non' ? 'selected' : '' }}>Non</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="date_signature_convention">Date Signature Convention</label>
                    <input type="date" name="date_signature_convention" class="form-control" value="{{ old('date_signature_convention') }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="annee">Année de Signature</label>
                    <input type="number" name="annee" class="form-control" value="{{ old('annee') }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="duree_partenariat">Durée (mois)</label>
                    <input type="number" name="duree_partenariat" class="form-control" value="{{ old('duree_partenariat') }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="feuille_de_route">Existence de Feuille de route</label>
                    <select name="feuille_de_route" class="form-control">
                        <option value="">-- Choisir --</option>
                        <option value="Oui" {{ old('feuille_de_route') == 'Oui' ? 'selected' : '' }}>Oui</option>
                        <option value="Non" {{ old('feuille_de_route') == 'Non' ? 'selected' : '' }}>Non</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="axes_collaboration">Axes de Collaboration</label>
                <textarea name="axes_collaboration" class="form-control" rows="2">{{ old('axes_collaboration') }}</textarea>
            </div>

            <div class="form-row">
                 <div class="form-group col-md-6">
                   <label for="oddSelect"> Lien Avec les ODD (plusieurs réponses possibles) :</label>
                    <select class="form-control" id="oddSelect" name="odd_array[]" multiple size="10">
                    @php
                        $oldOdds = old('odd_array', []);
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
                    {{-- <label for="odd">ODD</label>
                    <input type="text" name="odd" class="form-control" value="{{ old('odd') }}"> --}}
                </div>
                <div class="form-group col-md-6">
                    <label for="axe_plan_strategique">Axes Plan Stratégique 22-26</label>
                    {{-- <input type="text" name="axe_plan_strategique" class="form-control" value="{{ old('axe_plan_strategique') }}"> --}}
                    <select class="form-control" name="axe_plan_strategique" required>
                        <option value="">Faites un choix</option>
                        <option value="Axe 1 : Renforcement de la démocratie, de la gouvernance, de la participation et de l’engagement citoyen aux différentes échelles du local à l’international">
                            Axe 1 : Renforcement de la démocratie, de la gouvernance, de la participation et de l’engagement citoyen aux différentes échelles du local à l’international
                        </option>
                        <option value="Axe 2 : Renforcement de la sécurité, de la réponse aux changements climatiques, de la résilience et de l’attractivité des territoires"
                        >
                            Axe 2 : Renforcement de la sécurité, de la réponse aux changements climatiques, de la résilience et de l’attractivité des territoires
                        </option>
                        <option value="Axe 3 : Soutien à l’employabilité, à l’entreprenariat et à l’autonomisation des jeunes, femmes, personnes handicapées et autres groupes vulnérables">
                            Axe 3 : Soutien à l’employabilité, à l’entreprenariat et à l’autonomisation des jeunes, femmes, personnes handicapées et autres groupes vulnérables
                        </option>
                        <option value="Axe 4 : Appui à la territorialisation des politiques publiques et des Agendas internationaux">
                            Axe 4 : Appui à la territorialisation des politiques publiques et des Agendas internationaux
                        </option>
                        <option value="Axe 5 : Accompagnement des dynamiques de transition pour un développement durable">
                            Axe 5 : Accompagnement des dynamiques de transition pour un développement durable
                        </option>
                    </select>
                </div>

            </div>

            <div class="form-group">
                <label for="lignes_action_strategique">Lignes d’action stratégique 22-26</label>
                <select class="form-control" name="lignes_action_strategique" required>
                    <option value="">Faites un choix</option>
                    <!-- Axe 1 -->
                    <option value="Axe 1  LA 1: Accompagnement de la mise en œuvre et consolidation d’approches de participation et engagement citoyens dans les collectivités territoriales">Axe 1 LA 1: Accompagnement de la mise en œuvre et consolidation d’approches de participation et engagement citoyens dans les collectivités territoriales</option>
                    <option value="Axe 1 LA 2: Accompagnement des collectivités territoriales pour renforcer les processus de dématérialisation des procédures administratives et fiscales, de transparence et de suivi budgétaire ">Axe 1 LA 2: Accompagnement des collectivités territoriales pour renforcer les processus de dématérialisation des procédures administratives et fiscales, de transparence et de suivi budgétaire </option>
                    <option value="Axe 1 LA 3: Soutien aux initiatives de renforcement de la citoyenneté, de démocratie participative, de prévention et lutte contre la corruption dans les collectivités territoriales ">Axe 1 LA 3: Soutien aux initiatives de renforcement de la citoyenneté, de démocratie participative, de prévention et lutte contre la corruption dans les collectivités territoriales </option>
                    <option value="Axe 1 LA 4: Accompagnement des processus électoraux et consolidation de la démocratie en Afrique">Axe 1 LA 4: Accompagnement des processus électoraux et consolidation de la démocratie en Afrique</option>
                    <!-- Axe 2 -->
                    <option value="Axe 2 LA 5: Prévention, gestion des conflits et renforcement de la cohésion sociale">Axe 2 LA 5: Prévention, gestion des conflits et renforcement de la cohésion sociale</option>
                    <option value="Axe 2 LA 6: Renforcement de la résilience aux vulnérabilités (climatiques, environnementales, etc.)  et la sécurité humaine">Axe 2 LA 6: Renforcement de la résilience aux vulnérabilités (climatiques, environnementales, etc.)  et la sécurité humaine</option>
                    <option value="Axe 2 LA 7: Soutien aux initiatives de développement économique des territoires en renforçant les capacités de mobilisation de ressources propres, de réalisation d’infrastructures à haute portée économique et de valorisation des potentialités des territoires ; ">Axe 2 LA 7: Soutien aux initiatives de développement économique des territoires en renforçant les capacités de mobilisation de ressources propres, de réalisation d’infrastructures à haute portée économique et de valorisation des potentialités des territoires ; </option>
                    <option value="Axe 2 LA 8: Appui aux initiatives de développement de l’économie bleue et de l’économie verte à travers l’implication du secteur privé local ; ">Axe 2 LA 8: Appui aux initiatives de développement de l’économie bleue et de l’économie verte à travers l’implication du secteur privé local ; </option>
                    <option value="Axe 2 LA 9: Amélioration du cadre de vie et de l’accès aux services sociaux de base">Axe 2 LA 9: Amélioration du cadre de vie et de l’accès aux services sociaux de base</option>
                    <!-- Axe 3 -->
                    <option value="Axe 3 LA 10: Appui à l’économie sociale et solidaire (ESS) dans les collectivités territoriales ">Axe 3 LA 10: Appui à l’économie sociale et solidaire (ESS) dans les collectivités territoriales </option>
                    <option value="Axe 3 LA 11: Accompagnement des collectivités territoriales et des communautés à valoriser les filières porteuses de l’économie locale et les opportunités de la croissance durable ">Axe 3 LA 11:Accompagnement des collectivités territoriales et des communautés à valoriser les filières porteuses de l’économie locale et les opportunités de la croissance durable </option>
                    <option value="Axe 3 LA 12: Développement d’offres de renforcement de capacités d’entreprenariat et d’autonomisation adaptées aux contextes locaux en relation avec les universités, les structures d’Enseignement Technique et de la Formation Professionnelle, les chambres consulaires, les associations faîtières des producteurs, etc">Axe 3 LA 12: Développement d’offres de renforcement de capacités d’entreprenariat et d’autonomisation adaptées aux contextes locaux en relation avec les universités, les structures d’Enseignement Technique et de la Formation Professionnelle, les chambres consulaires, les associations faîtières des producteurs, etc</option>
                    <option value="Axe 3 LA 13: Renforcement des capacités techniques, organisationnelles et institutionnelles des collectivités territoriales dans la formulation et la mise en œuvre de stratégies locales de promotion de l’emploi et d’autonomisation économique des jeunes, des femmes, des personnes handicapées et autres groupes vulnérables. ">Axe 3 LA 13: Renforcement des capacités techniques, organisationnelles et institutionnelles des collectivités territoriales dans la formulation et la mise en œuvre de stratégies locales de promotion de l’emploi et d’autonomisation économique des jeunes, des femmes, des personnes handicapées et autres groupes vulnérables. </option>
                    <!-- Axe 4 -->
                    <option value="Axe 4 LA 14: Renforcement des capacités d’intervention des acteurs locaux pour la territorialisation des politiques publiques et des Agendas internationaux ">Axe 4 LA 14: Renforcement des capacités d’intervention des acteurs locaux pour la territorialisation des politiques publiques et des Agendas internationaux </option>
                    <option value="Axe 4 LA 15: Appui à l’élaboration, la mise-en œuvre et le suivi évaluation des documents de planification des Collectivités Territoriales qui intègrent les politiques publiques et les Agendas internationaux pour une meilleure justice sociale et spatiale ">Axe 4 LA 15: Appui à l’élaboration, la mise-en œuvre et le suivi évaluation des documents de planification des Collectivités Territoriales qui intègrent les politiques publiques et les Agendas internationaux pour une meilleure justice sociale et spatiale </option>
                    <option value="Axe 4 LA 16: Accompagnement des villes et territoires dans les stratégies et actions de mobilisation de ressources et l’expérimentation et la mise à l’échelle de mécanismes innovants de financement de leur développement. ">Axe 4 LA 16: Accompagnement des villes et territoires dans les stratégies et actions de mobilisation de ressources et l’expérimentation et la mise à l’échelle de mécanismes innovants de financement de leur développement. </option>
                    <!-- Axe 5 -->
                    <option value="Axe 5 LA 17: Appui aux initiatives de transition numérique pour une transformation durable des villes et territoires en Afrique">Axe 5 LA 17: Appui aux initiatives de transition numérique pour une transformation durable des villes et territoires en Afrique</option>
                    <option value="Axe 5 LA 18: Appui à la valorisation et gestion durables des ressources naturelles et foncières des villes et territoires d’Afrique ">Axe 5 LA 18: Appui à la valorisation et gestion durables des ressources naturelles et foncières des villes et territoires d’Afrique </option>
                    <option value="Axe 5 LA 19: Accompagnement et consolidation des initiatives de transition écologique et énergétique dans les villes et territoires">Axe 5 LA 19: . Accompagnement et consolidation des initiatives de transition écologique et énergétique dans les villes et territoires</option>
                    <option value="Axe 5 LA 20: Accompagnement des collectivités territoriales dans la valorisation du capital humain par la capture du dividende démographique pour une transformation sociale et sociétale durable en Afrique">Axe 5 LA 20: Accompagnement des collectivités territoriales dans la valorisation du capital humain par la capture du dividende démographique pour une transformation sociale et sociétale durable en Afrique</option>
                </select>
            </div>



            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="point_focal_ecopop">Point Focal ECOPOP</label>
                    <input type="text" name="point_focal_ecopop" class="form-control" value="{{ old('point_focal_ecopop') }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="integrer_convention">Document Convention</label>
                    <input type="file" name="doc" class="form-control" >

                    {{-- <select name="integrer_convention" class="form-control">
                        <option value="">-- Choisir --</option>
                        <option value="Oui" {{ old('integrer_convention') == 'Oui' ? 'selected' : '' }}>Oui</option>
                        <option value="Non" {{ old('integrer_convention') == 'Non' ? 'selected' : '' }}>Non</option>
                    </select> --}}
                </div>
            </div>
{{--
            <div class="form-group">
                <label for="etat_avancement">État d’Avancement</label>
                <select name="etat_avancement" class="form-control">
                    <option value="">-- Choisir --</option>
                    <option value="En cours" {{ old('etat_avancement') == 'En cours' ? 'selected' : '' }}>En cours</option>
                    <option value="Achevée" {{ old('etat_avancement') == 'Achevée' ? 'selected' : '' }}>Achevée</option>
                </select>
                <input type="text" name="etat_avancement" class="form-control" value="{{ old('etat_avancement') }}">
            </div> --}}

            <div class="form-group">
                <label for="commentaire">Commentaire</label>
                <textarea name="commentaire" class="form-control" rows="3">{{ old('commentaire') }}</textarea>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('partenariat.index') }}" class="btn btn-secondary btn-custom">⬅️ Retour</a>
                <button type="submit" class="btn btn-success btn-custom">💾 Enregistrer</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section("script")
<script>
    $(document).ready(function () {
        const allOptions = $('select[name="ligne"] option').clone();

        $('select[name="axe"]').on('change', function () {
            const selectedAxe = $(this).val();
            const $ligneSelect = $('select[name="ligne"]');
            $ligneSelect.empty().append('<option value="">Faites un choix</option>');

            if (!selectedAxe) return;

            // Extraire "Axe 1", "Axe 2", etc.
            const axePrefixMatch = selectedAxe.match(/Axe \d+/);
            if (!axePrefixMatch) return;

            const axePrefix = axePrefixMatch[0];

            // Filtrer les lignes d'action contenant cet axe
            allOptions.each(function () {
                const text = $(this).text().trim();
                if (text.startsWith(axePrefix)) {
                    $ligneSelect.append($(this).clone());
                }
            });
        });
    });
</script>
@endsection
