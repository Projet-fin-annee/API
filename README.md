# API

## Installation

1 - Clôner ce repository 

2 - Dans le shell, mettez vous sur le projet et lancer la commande `composer install`

3 - Lancer le projet sur Mamp/Wamp (Passer par les préférences du logiciel et sélectionner le dossier public/ du repository)

3 - Aller sur http://localhost:8888/phpMyAdmin/?lang=en

4 - Créer une nouvelle base de donnée en appuyant sur `new`

5 - La nommer webdoc

6 - Aller dans l'onglet import et appuyer sur parcourir => Sélectionner la base de donnée ce trouvant dans  `data/` 

5 - Dans le front, faites les fetch que vous voulez.

`Exemple : fetch("http://localhost:8888/countries/france")`

## Les routes 

Les différentes routes possible sont : 

`/countries/{nomdupays}` => pour récupérer les données d'un pays en particulier

`/countries` => pour récupérer la liste de tout les pays

`/definition` => pour récupérer la liste de toutes les définitions
