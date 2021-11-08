@extends('layouts.app')

@section('content')

    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route("dmPatients.index")}}">List DMs</a></li>
                        <li class="breadcrumb-item"><a href="{{route("dmPatients.show",['dmPatient'=>$dmPatient])}}">DM
                                Patient</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Cahier d'Observation
                            [{{$dmPatient->identification}}]
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"
                                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                    class="bi bi-plug me-50"></i>Se déconnecter</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="page-content">
        <div class="col-xl-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{route('crfs.store',['dmPatient'=>$dmPatient])}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <hr>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h6>
                                        Critères d’inclusion
                                    </h6>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-6 mb-1">
                                    <h6>
                                        Age > 19 ans
                                    </h6>
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q1"
                                               id="q11" value="oui">
                                        <label class="form-check-label" for="q11">
                                            Oui
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q1"
                                               id="q12" value="non">
                                        <label class="form-check-label" for="q12">
                                            Non
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6 mb-1">
                                    <h6>
                                        Patient diabétique type 1 ou 2
                                    </h6>
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q2"
                                               id="q21" value="oui">
                                        <label class="form-check-label" for="q21">
                                            Oui
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q2"
                                               id="q22" value="non">
                                        <label class="form-check-label" for="q22">
                                            Non
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6 mb-1">
                                    <h6>
                                        Patient suivi pour son diabète dans le secteur public (consultations au niveau
                                        des CHU ou des maisons de diabétiques)
                                    </h6>
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q3"
                                               id="q31" value="oui">
                                        <label class="form-check-label" for="q31">
                                            Oui
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q3"
                                               id="q32" value="non">
                                        <label class="form-check-label" for="q32">
                                            Non
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6 mb-1">
                                    <h6>
                                        Patient ayant signé son consentement pour participer à l’étude
                                    </h6>
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q4"
                                               id="q41" value="oui">
                                        <label class="form-check-label" for="q41">
                                            Oui
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q4"
                                               id="q42" value="non">
                                        <label class="form-check-label" for="q42">
                                            Non
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h6>
                                        Critères de non inclusion
                                    </h6>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-6 mb-1">
                                    <h6>
                                        Pathologies associées graves : Cancer ou toute autre pathologie mettant en jeu
                                        le pronostic vital du patient (Syndrome coronarien, AVC/AIT)
                                    </h6>
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q5"
                                               id="q51" value="oui">
                                        <label class="form-check-label" for="q51">
                                            Oui
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q5"
                                               id="q52" value="non">
                                        <label class="form-check-label" for="q52">
                                            Non
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6 mb-1">
                                    <h6>
                                        Grossesse : recherchée à l’interrogatoire
                                    </h6>
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q6"
                                               id="q61" value="oui">
                                        <label class="form-check-label" for="q61">
                                            Oui
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q6"
                                               id="q62" value="non">
                                        <label class="form-check-label" for="q62">
                                            Non
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6 mb-1">
                                    <h6>
                                        Patient présentant un handicap physique à l’utilisation du lecteur Vital Check®
                                        (ex : maladie de parkinson)
                                    </h6>
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q7"
                                               id="q71" value="oui">
                                        <label class="form-check-label" for="q71">
                                            Oui
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q7"
                                               id="q72" value="non">
                                        <label class="form-check-label" for="q72">
                                            Non
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6 mb-1">
                                    <h6>
                                        Patient présentant une atteinte psychologique ou psychiatrique
                                    </h6>
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q8"
                                               id="q81" value="oui">
                                        <label class="form-check-label" for="q81">
                                            Oui
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q8"
                                               id="q82" value="non">
                                        <label class="form-check-label" for="q82">
                                            Non
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6 mb-1">
                                    <h6>
                                        Patient illettré
                                    </h6>
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q9"
                                               id="q91" value="oui">
                                        <label class="form-check-label" for="q91">
                                            Oui
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q9"
                                               id="q92" value="non">
                                        <label class="form-check-label" for="q92">
                                            Non
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h6>
                                        CONSENTEMENT ECLAIRE
                                    </h6>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-6 mb-1">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="q10">Date de la visite :</span>
                                        <input type="date" class="form-control" placeholder="..."
                                               aria-label="q10" aria-describedby="q10" required
                                               name="q10">
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-1">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text"
                                              id="q11">Date de signature du consentement :</span>
                                        <input type="date" class="form-control" placeholder="..."
                                               aria-label="q11" aria-describedby="q11" required
                                               name="q11">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h6>
                                        DEMOGRAPHIE
                                    </h6>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-6 mb-1">
                                    <h6>
                                        Sexe
                                    </h6>
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q12"
                                               id="q121" value="male">
                                        <label class="form-check-label" for="q121">
                                            Homme
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q12"
                                               id="q122" value="female">
                                        <label class="form-check-label" for="q122">
                                            Femme
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-12 mb-1">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="q13">Date de naissance :</span>
                                        <input type="date" class="form-control" placeholder="..."
                                               aria-label="q13" aria-describedby="q13" required
                                               name="q13">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h6>
                                        HISTORIQUE MEDICAL
                                    </h6>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-5 mb-1">
                                    <h6>
                                        Ancienneté du diabète :
                                    </h6>
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="q141">Ans :</span>
                                        <input type="number" class="form-control" placeholder="..."
                                               aria-label="q141" aria-describedby="q141"
                                               name="q141">
                                    </div>
                                </div>
                                <div class="col-lg-1 mb-1">
                                    <h6>
                                        Ou
                                    </h6>
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="q142">Mois :</span>
                                        <input type="number" class="form-control" placeholder="..."
                                               aria-label="q142" aria-describedby="q142"
                                               name="q142">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6 mb-1">
                                    <h6>
                                        Sexe
                                    </h6>
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q15"
                                               id="q151" value="DT1">
                                        <label class="form-check-label" for="q151">
                                            DT1
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q15"
                                               id="q152" value="DT2">
                                        <label class="form-check-label" for="q152">
                                            DT2
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h6>
                                        TRAITEMENT DU DIABETE
                                    </h6>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-6 mb-1">
                                    <h6>
                                        Traitement Oral :
                                    </h6>
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q16"
                                               id="q161" value="oui">
                                        <label class="form-check-label" for="q161">
                                            Oui
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q16"
                                               id="q162" value="non">
                                        <label class="form-check-label" for="q162">
                                            Non
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6 mb-1">
                                    <h6>
                                        Insulinothérapie :
                                    </h6>
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q17"
                                               id="q171" value="oui">
                                        <label class="form-check-label" for="q171">
                                            Oui
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q17"
                                               id="q172" value="non">
                                        <label class="form-check-label" for="q172">
                                            Non
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <h6>
                                Si oui,
                            </h6>
                            <div class="row">
                                <div class="col-lg-4 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q18"
                                               id="q181" value="Insuline Lente">
                                        <label class="form-check-label" for="q181">
                                            Insuline Lente
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q18"
                                               id="q182" value="Insuline Semi Lente">
                                        <label class="form-check-label" for="q182">
                                            Insuline Semi Lente
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q18"
                                               id="q183" value="Insuline rapide">
                                        <label class="form-check-label" for="q183">
                                            Insuline rapide
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <h6>
                                Si oui, nombre d’injection d’insuline par jour :
                            </h6>
                            <div class="row">
                                <div class="col-lg-3 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q19"
                                               id="q191" value="1 injection">
                                        <label class="form-check-label" for="q191">
                                            1 injection
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q19"
                                               id="q192" value="2 injections">
                                        <label class="form-check-label" for="q192">
                                            2 injections
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q19"
                                               id="q193" value="3 injections">
                                        <label class="form-check-label" for="q193">
                                            3 injections
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q19"
                                               id="q194" value=">3 injections">
                                        <label class="form-check-label" for="q194">
                                            >3 injections
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6 mb-1">
                                    <h6>
                                        Nombre de points de surveillance glycémqiue :
                                    </h6>
                                </div>
                                <div class="col-lg-1 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q19b"
                                               id="q19b1" value="1">
                                        <label class="form-check-label" for="q19b1">
                                            1
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-1 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q19b"
                                               id="q19b2" value="2">
                                        <label class="form-check-label" for="q19b2">
                                            2
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-1 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q19b"
                                               id="q19b3" value="3">
                                        <label class="form-check-label" for="q19b3">
                                            3
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-1 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q19b"
                                               id="q19b4" value="4">
                                        <label class="form-check-label" for="q19b4">
                                            4
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-1 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q19b"
                                               id="q19b5" value=">4">
                                        <label class="form-check-label" for="q19b5">
                                            >4
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h6>
                                        UTILISATION DU GLUCOMETRE
                                    </h6>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-6 mb-1">
                                    <h6>
                                        Utilisation antérieure du lecteur Vital Check
                                    </h6>
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q20"
                                               id="q201" value="oui">
                                        <label class="form-check-label" for="q201">
                                            Oui
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q20"
                                               id="q202" value="non">
                                        <label class="form-check-label" for="q202">
                                            Non
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-12 mb-1">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text"
                                              id="q21">Si oui, date de début d’utilisation :</span>
                                        <input type="date" class="form-control" placeholder="..."
                                               aria-label="q21" aria-describedby="q21"
                                               name="q21">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6 mb-1">
                                    <h6>
                                        Utilisation d’une autre lecteur glycémique
                                    </h6>
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q21b"
                                               id="q21b1" value="oui">
                                        <label class="form-check-label" for="q21b1">
                                            Oui
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q21b"
                                               id="q21b2" value="non">
                                        <label class="form-check-label" for="q21b2">
                                            Non
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-12 mb-1">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="q22">N° de lot du glucomètre remis au patient pour les besoins de l’étude :</span>
                                        <input type="number" class="form-control" placeholder="..."
                                               aria-label="q22" aria-describedby="q22"
                                               name="q22">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-12 mb-1">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="q23">N° de lot de la bandelette :</span>
                                        <input type="number" class="form-control" placeholder="..."
                                               aria-label="q23" aria-describedby="q23"
                                               name="q23">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h6>
                                        MESURE DE LA GLYCEMIE
                                    </h6>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-12 mb-1">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text"
                                              id="q24">Date de prélèvement au laboratoire :</span>
                                        <input type="date" class="form-control" placeholder="..."
                                               aria-label="q24" aria-describedby="q24"
                                               name="q24">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6 mb-1">
                                    <h6>
                                        Le patient a-t-il suivi une période de jeûne entre 8 à 12h ?
                                    </h6>
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q25"
                                               id="q251" value="oui">
                                        <label class="form-check-label" for="q251">
                                            Oui
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q25"
                                               id="q252" value="non">
                                        <label class="form-check-label" for="q252">
                                            Non
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h6 style="font-style: initial">
                                        Prélèvement capillaire
                                    </h6>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-12 mb-1">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="q26">Heure de prélèvement capillaire :</span>
                                        <input type="time" class="form-control" placeholder="..."
                                               aria-label="q26" aria-describedby="q26"
                                               name="q26">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-12 mb-1">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text"
                                              id="q27">Glycémie capillaire lue avec lecteur <strong> VITAL CHECK® MM-1200</strong> : </span>
                                        <input type="number" class="form-control" placeholder="..."
                                               aria-label="q27" aria-describedby="q27"
                                               name="q27">
                                        <span class="input-group-text">g/l</span>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h6 style="font-style: initial">
                                        Echantillon du tube 01 (analyse immédiate)
                                    </h6>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-12 mb-1">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text"
                                              id="q28">Heure de prélèvement capillaire  :</span>
                                        <input type="time" class="form-control" placeholder="..."
                                               aria-label="q28" aria-describedby="q28"
                                               name="q28">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-12 mb-1">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text"
                                              id="q29">Glycémie capillaire lue avec lecteur <strong> VITAL CHECK® MM-1200</strong> : </span>
                                        <input type="number" class="form-control" placeholder="..."
                                               aria-label="q29" aria-describedby="q29"
                                               name="q29">
                                        <span class="input-group-text">g/l</span>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-12 mb-1">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="q30">Heure de l’analyse sur l’automate YSI 2300 : </span>
                                        <input type="time" class="form-control" placeholder="..."
                                               aria-label="q30" aria-describedby="q30"
                                               name="q30">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-12 mb-1">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="q31">Glycémie plasmatique , après centrifugation, avec l’automate YSI : </span>
                                        <input type="number" class="form-control" placeholder="..."
                                               aria-label="q31" aria-describedby="q31"
                                               name="q31">
                                        <span class="input-group-text">g/l</span>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h6 style="font-style: initial">
                                        Echantillon du tube 02 (analyse différée pour les hypoglycémies ou
                                        hyperglycémies sévères)
                                    </h6>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6 mb-1">
                                    <h6>
                                        L’échantillon du tube 02 a-t-il été analysé ?
                                    </h6>
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q32"
                                               id="q321" value="oui">
                                        <label class="form-check-label" for="q321">
                                            Oui
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q32"
                                               id="q322" value="non">
                                        <label class="form-check-label" for="q322">
                                            Non
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="col-lg-6 mb-1">
                                <h6>
                                    Si oui, merci de remplir l’une des sections suivantes :
                                </h6>
                            </div>
                            <br>
                            <ol>
                                <li>
                                    <h6>
                                        En cas d’hypoglycémie sévère
                                    </h6>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-12 mb-1">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="q33">Glycémie veineuse (sang total) lue avec lecteur <strong>VITAL CHECK® MM-1200</strong> : </span>
                                                <input type="number" class="form-control" placeholder="..."
                                                       aria-label="q33" aria-describedby="q33"
                                                       name="q33">
                                                <span class="input-group-text">g/l</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 mb-1">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="q34">Glycémie veineuse mesurée, après centrifugation, avec l’automate du laboratoire : </span>
                                                <input type="number" class="form-control" placeholder="..."
                                                       aria-label="q34" aria-describedby="q34"
                                                       name="q34">
                                                <span class="input-group-text">g/l</span>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                </li>
                                <li>
                                    <h6>
                                        En cas d’hyperglycémie sévère
                                    </h6>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-12 mb-1">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="q35">Glycémie veineuse (sang total) lue avec lecteur <strong>VITAL CHECK® MM-1200</strong> : </span>
                                                <input type="number" class="form-control" placeholder="..."
                                                       aria-label="q35" aria-describedby="q35"
                                                       name="q35">
                                                <span class="input-group-text">g/l</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 mb-1">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="q36">Glycémie veineuse mesurée, après centrifugation, avec l’automate du laboratoire : </span>
                                                <input type="number" class="form-control" placeholder="..."
                                                       aria-label="q36" aria-describedby="q36"
                                                       name="q36">
                                                <span class="input-group-text">g/l</span>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                </li>
                            </ol>
                            <hr>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h6>
                                        EVALUATION DE LA TOLERANCE
                                    </h6>
                                </div>
                            </div>
                            <hr>
                            <br>
                            <div class="row">
                                <div class="col-lg-6 mb-1">
                                    <h6>
                                        Y a-t-il eu un / des effet(s) indésirable(s) lié(s) à l’utilisation de la
                                        bandelette réactive MS-2 ?
                                    </h6>
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q37"
                                               id="q371" value="oui">
                                        <label class="form-check-label" for="q371">
                                            Oui
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q37"
                                               id="q372" value="non">
                                        <label class="form-check-label" for="q372">
                                            Non
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6 mb-1">
                                    <h6>
                                        Y a-t-il eu un / des effet(s) indésirable(s) lié(s) à l’utilisation du lecteur
                                        <strong>VITAL CHECK®</strong> ?
                                    </h6>
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q38"
                                               id="q381" value="oui">
                                        <label class="form-check-label" for="q381">
                                            Oui
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q38"
                                               id="q382" value="non">
                                        <label class="form-check-label" for="q382">
                                            Non
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h6>
                                        CONFIRMATION DE L’AUTHENTICITE DES DONNEES
                                    </h6>
                                </div>
                            </div>
                            <hr>
                            <br>
                            <div class="row">
                                <div class="col-lg-12 mb-1">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text"
                                              id="investigator_name">Nom de l’Investigateur :</span>
                                        <input type="text" class="form-control" placeholder="..."
                                               aria-label="investigator_name" aria-describedby="investigator_name"
                                               name="investigator_name">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-12 mb-1">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="signature_date">Date :</span>
                                        <input type="date" class="form-control" placeholder="..."
                                               aria-label="signature_date" aria-describedby="signature_date"
                                               name="signature_date">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <div class="col-sm-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection()

@section("scripts")

    <script>

        function acceptConsent() {
            var x = document.getElementById('consent_accepted');
            var y = document.getElementById('consent_refused');

            x.style.display = 'block';
            y.style.display = 'none';

        }

        function refuseConsent() {

            var x = document.getElementById('consent_accepted');
            var y = document.getElementById('consent_refused');

            x.style.display = 'none';
            y.style.display = 'block';

        }

    </script>

@endsection
