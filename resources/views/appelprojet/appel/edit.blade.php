{{-- \resources\views\permissions\create.blade.php --}}
@extends('appelprojet.welcome')

@section('title', '| Modifier appel')

@section('content')

    <div class="content-wrapper">

        <div class="container">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-info">Modifier appel</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home.appel') }}" role="button" class="btn btn-primary">ACCUEIL</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('appel.index') }}" role="button" class="btn btn-primary">RETOUR</a></li>

                        </ol>
                    </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

        {!! Form::model($appel, ['method'=>'PATCH','route'=>['appel.update', $appel->id],'enctype'=>'multipart/form-data']) !!}
            @csrf
             <div class="card border-danger border-0">
                        <div class="card-header bg-info text-center">FORMULAIRE DE MODIFICATION D'une appel</div>
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Type</label>
                                            <select class="form-control" name="type_id" required>
                                                <option value="">Faites un choix</option>
                                                @foreach ($types as $type)
                                                <option value="{{ $type->id }}" {{ $appel->type_id==$type->id ? 'selected' :'' }}>{{ $type->nom }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Références Appel d’Offre</label>
                                            <input type="text" name="reference"  value="{{ $appel->reference }}" class="form-control"  required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Titre projet / programme / initiative</label>
                                            <textarea class="textarea" name="titre" placeholder="Place some text here"
                                            style="width: 100%; height: 240px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $appel->titre }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Thème/Secteur</label>
                                            <textarea class="textarea" name="theme" placeholder="Place some text here"
                                            style="width: 100%; height: 240px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $appel->theme }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Pays</label>
                                            <input type="text" name="pays"  value="{{ $appel->pays }}" class="form-control"  required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Région</label>
                                            <input type="text" name="region"  value="{{ $appel->region }}" class="form-control"  required>

                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>CT</label>
                                            <input type="text" name="ct"  value="{{ $appel->ct }}" class="form-control"  required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Organisation partenaire</label>
                                            <input type="text" name="association"  value="{{ $appel->association }}" class="form-control"  required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Budget prévu</label>
                                            <input type="text" name="montant"  value="{{ $appel->montant }}" class="form-control"  required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Bailleur</label>
                                            <input type="text" name="bailleur"  value="{{ $appel->bailleur }}" class="form-control"  required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Date Réception</label>
                                            <input type="date" name="dater"  value="{{ $appel->dater }}" class="form-control"  required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Date d’exploitation en ligne</label>
                                            <input type="date" name="datet"  value="{{ $appel->datet }}" class="form-control"  required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Reunion brainstorming</label>
                                            <input type="date" name="dateb"  value="{{ $appel->dateb }}" class="form-control"  required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Date de Soumission offre ou note</label>
                                            <input type="date" name="dates"  value="{{ $appel->dates }}" class="form-control"  required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Date limite de soumission</label>
                                            <input type="date" name="dateexp"  value="{{ $appel->dateexp }}" class="form-control"  required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>personnes impliquées</label>
                                            <input type="text" name="personne"  value="{{ $appel->personne }}" class="form-control"  required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label >Document appel ou manifestation interêt</label>
                                                <input name="docs[]" type="file" class="form-control" id="exampleInputFile">
                                                <input type="button" class="btn btn-info" value="ajouter un nouveau fichier" id="addfic">
                                                <div id="viafic">

                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Axes stratégiques : </label>
                                            <select class="form-control" name="axe" required>
                                                <option value="">Faites un choix</option>
                                                <option value="Axe 1 : Renforcement de la démocratie, de la gouvernance, de la participation et de l’engagement citoyen aux différentes échelles du local à l’international"
                                                {{ $appel->axe == "Axe 1 : Renforcement de la démocratie, de la gouvernance, de la participation et de l’engagement citoyen aux différentes échelles du local à l’international" ? 'selected' : ''  }}
                                                >
                                                    Axe 1 : Renforcement de la démocratie, de la gouvernance, de la participation et de l’engagement citoyen aux différentes échelles du local à l’international
                                                </option>
                                                <option value="Axe 2 : Renforcement de la sécurité, de la réponse aux changements climatiques, de la résilience et de l’attractivité des territoires"
                                                {{ $appel->axe == "Axe 2 : Renforcement de la sécurité, de la réponse aux changements climatiques, de la résilience et de l’attractivité des territoires" ? 'selected' : ''  }}
                                                >
                                                    Axe 2 : Renforcement de la sécurité, de la réponse aux changements climatiques, de la résilience et de l’attractivité des territoires
                                                </option>
                                                <option value="Axe 3 : Soutien à l’employabilité, à l’entreprenariat et à l’autonomisation des jeunes, femmes, personnes handicapées et autres groupes vulnérables"
                                                {{ $appel->axe == "Axe 3 : Soutien à l’employabilité, à l’entreprenariat et à l’autonomisation des jeunes, femmes, personnes handicapées et autres groupes vulnérables" ? 'selected' : ''  }}
                                                >
                                                    Axe 3 : Soutien à l’employabilité, à l’entreprenariat et à l’autonomisation des jeunes, femmes, personnes handicapées et autres groupes vulnérables
                                                </option>
                                                <option value="Axe 4 : Appui à la territorialisation des politiques publiques et des Agendas internationaux"
                                                {{ $appel->axe == "Axe 4 : Appui à la territorialisation des politiques publiques et des Agendas internationaux" ? 'selected' : ''  }}
                                                >
                                                    Axe 4 : Appui à la territorialisation des politiques publiques et des Agendas internationaux
                                                </option>
                                                <option value="Axe 5 : Accompagnement des dynamiques de transition pour un développement durable"
                                                {{ $appel->axe == "Axe 5 : Accompagnement des dynamiques de transition pour un développement durable" ? 'selected' : ''  }}
                                                >
                                                    Axe 5 : Accompagnement des dynamiques de transition pour un développement durable
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- LIGNES D'ACTION -->
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Ligne d’action</label>
                                            <select class="form-control" name="ligne" required>
                                                <option value="">Faites un choix</option>

                                                {{-- Axe 1 --}}
                                                <option value="Axe 1  LA 1: Accompagnement de la mise en œuvre et consolidation d’approches de participation et engagement citoyens dans les collectivités territoriales" {{ $appel->ligne == 'Axe 1  LA 1: Accompagnement de la mise en œuvre et consolidation d’approches de participation et engagement citoyens dans les collectivités territoriales' ? 'selected' : '' }}>Axe 1  LA 1: Accompagnement de la mise en œuvre et consolidation d’approches de participation et engagement citoyens dans les collectivités territoriales</option>

                                                <option value="Axe 1 LA 2: Accompagnement des collectivités territoriales pour renforcer les processus de dématérialisation des procédures administratives et fiscales, de transparence et de suivi budgétaire " {{ $appel->ligne == 'Axe 1 LA 2: Accompagnement des collectivités territoriales pour renforcer les processus de dématérialisation des procédures administratives et fiscales, de transparence et de suivi budgétaire ' ? 'selected' : '' }}>Axe 1 LA 2: Accompagnement des collectivités territoriales pour renforcer les processus de dématérialisation des procédures administratives et fiscales, de transparence et de suivi budgétaire </option>

                                                <option value="Axe 1 LA 3: Soutien aux initiatives de renforcement de la citoyenneté, de démocratie participative, de prévention et lutte contre la corruption dans les collectivités territoriales " {{ $appel->ligne == 'Axe 1 LA 3: Soutien aux initiatives de renforcement de la citoyenneté, de démocratie participative, de prévention et lutte contre la corruption dans les collectivités territoriales ' ? 'selected' : '' }}>Axe 1 LA 3: Soutien aux initiatives de renforcement de la citoyenneté, de démocratie participative, de prévention et lutte contre la corruption dans les collectivités territoriales </option>

                                                <option value="Axe 1 LA 4: Accompagnement des processus électoraux et consolidation de la démocratie en Afrique" {{ $appel->ligne == 'Axe 1 LA 4: Accompagnement des processus électoraux et consolidation de la démocratie en Afrique' ? 'selected' : '' }}>Axe 1 LA 4: Accompagnement des processus électoraux et consolidation de la démocratie en Afrique</option>

                                                {{-- Axe 2 --}}
                                                <option value="Axe 2 LA 5: Prévention, gestion des conflits et renforcement de la cohésion sociale" {{ $appel->ligne == 'Axe 2 LA 5: Prévention, gestion des conflits et renforcement de la cohésion sociale' ? 'selected' : '' }}>Axe 2 LA 5: Prévention, gestion des conflits et renforcement de la cohésion sociale</option>

                                                <option value="Axe 2 LA 6: Renforcement de la résilience aux vulnérabilités (climatiques, environnementales, etc.)  et la sécurité humaine" {{ $appel->ligne == 'Axe 2 LA 6: Renforcement de la résilience aux vulnérabilités (climatiques, environnementales, etc.)  et la sécurité humaine' ? 'selected' : '' }}>Axe 2 LA 6: Renforcement de la résilience aux vulnérabilités (climatiques, environnementales, etc.)  et la sécurité humaine</option>

                                                <option value="Axe 2 LA 7: Soutien aux initiatives de développement économique des territoires en renforçant les capacités de mobilisation de ressources propres, de réalisation d’infrastructures à haute portée économique et de valorisation des potentialités des territoires ; " {{ $appel->ligne == 'Axe 2 LA 7: Soutien aux initiatives de développement économique des territoires en renforçant les capacités de mobilisation de ressources propres, de réalisation d’infrastructures à haute portée économique et de valorisation des potentialités des territoires ; ' ? 'selected' : '' }}>Axe 2 LA 7: Soutien aux initiatives de développement économique des territoires en renforçant les capacités de mobilisation de ressources propres, de réalisation d’infrastructures à haute portée économique et de valorisation des potentialités des territoires ; </option>

                                                <option value="Axe 2 LA 8: Appui aux initiatives de développement de l’économie bleue et de l’économie verte à travers l’implication du secteur privé local ; " {{ $appel->ligne == 'Axe 2 LA 8: Appui aux initiatives de développement de l’économie bleue et de l’économie verte à travers l’implication du secteur privé local ; ' ? 'selected' : '' }}>Axe 2 LA 8: Appui aux initiatives de développement de l’économie bleue et de l’économie verte à travers l’implication du secteur privé local ; </option>

                                                <option value="Axe 2 LA 9: Amélioration du cadre de vie et de l’accès aux services sociaux de base" {{ $appel->ligne == 'Axe 2 LA 9: Amélioration du cadre de vie et de l’accès aux services sociaux de base' ? 'selected' : '' }}>Axe 2 LA 9: Amélioration du cadre de vie et de l’accès aux services sociaux de base</option>

                                                {{-- Axe 3 --}}
                                                <option value="Axe 3 LA 10: Appui à l’économie sociale et solidaire (ESS) dans les collectivités territoriales " {{ $appel->ligne == 'Axe 3 LA 10: Appui à l’économie sociale et solidaire (ESS) dans les collectivités territoriales ' ? 'selected' : '' }}>Axe 3 LA 10: Appui à l’économie sociale et solidaire (ESS) dans les collectivités territoriales </option>

                                                <option value="Axe 3 LA 11: Accompagnement des collectivités territoriales et des communautés à valoriser les filières porteuses de l’économie locale et les opportunités de la croissance durable " {{ $appel->ligne == 'Axe 3 LA 11: Accompagnement des collectivités territoriales et des communautés à valoriser les filières porteuses de l’économie locale et les opportunités de la croissance durable ' ? 'selected' : '' }}>Axe 3 LA 11: Accompagnement des collectivités territoriales et des communautés à valoriser les filières porteuses de l’économie locale et les opportunités de la croissance durable </option>

                                                <option value="Axe 3 LA 12: Développement d’offres de renforcement de capacités d’entreprenariat et d’autonomisation adaptées aux contextes locaux en relation avec les universités, les structures d’Enseignement Technique et de la Formation Professionnelle, les chambres consulaires, les associations faîtières des producteurs, etc" {{ $appel->ligne == 'Axe 3 LA 12: Développement d’offres de renforcement de capacités d’entreprenariat et d’autonomisation adaptées aux contextes locaux en relation avec les universités, les structures d’Enseignement Technique et de la Formation Professionnelle, les chambres consulaires, les associations faîtières des producteurs, etc' ? 'selected' : '' }}>Axe 3 LA 12: Développement d’offres de renforcement de capacités d’entreprenariat et d’autonomisation adaptées aux contextes locaux...</option>

                                                <option value="Axe 3 LA 13: Renforcement des capacités techniques, organisationnelles et institutionnelles des collectivités territoriales dans la formulation et la mise en œuvre de stratégies locales de promotion de l’emploi et d’autonomisation économique des jeunes, des femmes, des personnes handicapées et autres groupes vulnérables. " {{ $appel->ligne == 'Axe 3 LA 13: Renforcement des capacités techniques, organisationnelles et institutionnelles des collectivités territoriales dans la formulation et la mise en œuvre de stratégies locales de promotion de l’emploi et d’autonomisation économique des jeunes, des femmes, des personnes handicapées et autres groupes vulnérables. ' ? 'selected' : '' }}>Axe 3 LA 13: Renforcement des capacités techniques... (troncature suggérée pour lisibilité)</option>

                                                {{-- Axe 4 --}}
                                                <option value="Axe 4 LA 14: Renforcement des capacités d’intervention des acteurs locaux pour la territorialisation des politiques publiques et des Agendas internationaux " {{ $appel->ligne == 'Axe 4 LA 14: Renforcement des capacités d’intervention des acteurs locaux pour la territorialisation des politiques publiques et des Agendas internationaux ' ? 'selected' : '' }}>Axe 4 LA 14: Renforcement des capacités d’intervention des acteurs locaux...</option>

                                                <option value="Axe 4 LA 15: Appui à l’élaboration, la mise-en œuvre et le suivi évaluation des documents de planification des Collectivités Territoriales qui intègrent les politiques publiques et les Agendas internationaux pour une meilleure justice sociale et spatiale " {{ $appel->ligne == 'Axe 4 LA 15: Appui à l’élaboration, la mise-en œuvre et le suivi évaluation des documents de planification des Collectivités Territoriales qui intègrent les politiques publiques et les Agendas internationaux pour une meilleure justice sociale et spatiale ' ? 'selected' : '' }}>Axe 4 LA 15: Appui à l’élaboration... (troncature)</option>

                                                <option value="Axe 4 LA 16: Accompagnement des villes et territoires dans les stratégies et actions de mobilisation de ressources et l’expérimentation et la mise à l’échelle de mécanismes innovants de financement de leur développement. " {{ $appel->ligne == 'Axe 4 LA 16: Accompagnement des villes et territoires dans les stratégies et actions de mobilisation de ressources et l’expérimentation et la mise à l’échelle de mécanismes innovants de financement de leur développement. ' ? 'selected' : '' }}>Axe 4 LA 16: Accompagnement des villes...</option>

                                                {{-- Axe 5 --}}
                                                <option value="Axe 5 LA 17: Appui aux initiatives de transition numérique pour une transformation durable des villes et territoires en Afrique" {{ $appel->ligne == 'Axe 5 LA 17: Appui aux initiatives de transition numérique pour une transformation durable des villes et territoires en Afrique' ? 'selected' : '' }}>Axe 5 LA 17: Appui aux initiatives de transition numérique...</option>

                                                <option value="Axe 5 LA 18: Appui à la valorisation et gestion durables des ressources naturelles et foncières des villes et territoires d’Afrique " {{ $appel->ligne == 'Axe 5 LA 18: Appui à la valorisation et gestion durables des ressources naturelles et foncières des villes et territoires d’Afrique ' ? 'selected' : '' }}>Axe 5 LA 18: Appui à la valorisation...</option>

                                                <option value="Axe 5 LA 19: Accompagnement et consolidation des initiatives de transition écologique et énergétique dans les villes et territoires" {{ $appel->ligne == 'Axe 5 LA 19: Accompagnement et consolidation des initiatives de transition écologique et énergétique dans les villes et territoires' ? 'selected' : '' }}>Axe 5 LA 19: Accompagnement et consolidation des initiatives de transition écologique...</option>

                                                <option value="Axe 5 LA 20: Accompagnement des collectivités territoriales dans la valorisation du capital humain par la capture du dividende démographique pour une transformation sociale et sociétale durable en Afrique" {{ $appel->ligne == 'Axe 5 LA 20: Accompagnement des collectivités territoriales dans la valorisation du capital humain par la capture du dividende démographique pour une transformation sociale et sociétale durable en Afrique' ? 'selected' : '' }}>Axe 5 LA 20: Accompagnement des collectivités dans la valorisation du capital humain...</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Statut</label>
                                            <select class="form-control" name="etat" required>
                                                <option value="">Faites un choix</option>
                                                <option value="En cours" {{ $appel->etat=="En cours" ? 'selected' : '' }} >En cours</option>
                                                <option value="Approuve" {{ $appel->etat=="Approuve" ? 'selected' : '' }}>Approuve</option>
                                                <option value="Non approuve" {{ $appel->etat=="Non approuve" ? 'selected' : '' }}>Non approuve</option>
                                            </select>
                                        </div>
                                    </div>
                                                                    </div>

                                <div>
                                    <center>
                                        <button type="submit" class="btn btn-success btn btn-lg "> ENREGISTRER</button>
                                    </center>
                                </div>
                            </div>
                        </div>
    {!! Form::close() !!}
                </div>
        </div>

    </div>

@endsection
@section('script')
    <script>

      $("#addfic").click(function() {
            //find content of different elements inside a row.

            $("#viafic").append("<div class='viafic'>"+
            "<input type='file' class='form-control' name='docs[]' required>"+
            "<button type='button' class='btn btn-danger btn-sm  remove-doc'>Supprimer</button></div>");
            //alert(nameTxt);
        });

         $(document).on('click', '.remove-doc', function(){
            $(this).parent('div .viafic').remove();

        });
</script>
@endsection



















