@extends('layouts.app')

@section('content')
<div id="welcome">
    <div class="jumbotron">
        <div class="container">
            <h1 class="jumbotron__header">Prochaine version du site Nature & Progrès Ariège.</h1>

            <p class="jumbotron__body">
                Nature & Progrès, la bio associative et solidaire.
            </p>
        </div>
    </div>

    <div class="container">
        <ol class="steps">
            <li class="steps__item">
                <div class="body">
                    <h2>Les adhérents</h2>

                    <p>
                        Retrouvez nos meilleurs producteurs et nos consommateurs les plus affutés !.
                    </p>
                    <ul>
                        <li><a href="">Les producteurs</a></li>
                        <li><a href="personne">Les adhérents</a></li>
                    </ul>

                </div>
            </li>

            <li class="steps__item">
                <div class="body">
                    <h2>Consultez l’agenda</h2>

                    <p>
                        Prêt à venir vous informer ou mettre la main à la pâte ?
                    </p>

                    <ul>
                        <li><a href="adresse">Les manifestations</a></li>
                        <li><a href="">Les visites</a></li>
                    </ul>
                </div>
            </li>

            <li class="steps__item">
                <div class="body">
                    <h2>Adhérent, vous souhaitez entrez chez vous ?</h2>
                        <a href="auth/login">Sésame, ouvres toi !!!</a>
                </div>
            </li>
        </ol>
    </div>
</div>
@stop
