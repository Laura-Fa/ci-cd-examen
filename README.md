# Présentation du projet

Ce projet écrit en Symfony est une API permettant de gérer des entreprises. La liste des endpoints est la suivante :

`GET /api/companies` : spécifier le format attendu 'text/csv' ou 'application/json'

`GET /api/companies/{siren}`

`POST /api/companies`

Les deux routes suivantes sont protégées via une authentification basic dans le header. Pour les tests, le login est "demo" et le mot de passe "secret".

`PATCH /api/companies/{siren}`

`DELETE /api/companies/{siren}`

Le JSON attendu d'une entreprise est :

```
{
	Siren : « XXXX » //9 chiffres,
	Raison_sociale : « XX XXX XX »,//Non vide
	Adresse :{
		Num : 3,
		Voie : « XXXXX »
		Code_postale : « XXXXX » //5 chiffres,
		Ville : « XXXX »//Non vide
		GPS : {
			Latitude : « XX.XX »,
			Longitude : « XX.XX »
        }
    }
}
```

# Installation

Pour installer les dépendances, lancez la commande `composer install`.

Pour démarrer le serveur : `symfony server:start`

# CI/CD

## CI (Intégration continue)

-> Sur une pull request :

Les étapes du CI et les commandes associées sont les suivantes :

- Configuration de l'environnement php
- Installation des dépendances `composer install`
- Analyse statique des dossiers src et tests `./vendor/bin/phpstan analyse src tests`
- Exécution des tests `./vendor/bin/phpunit`

## Déploiement continu

-> Si le CI est un succès, le livrable est déployé (Mis en place pour la branche master uniquement) :

Le livrable du déploiement continu est une image Docker "latest" poussée sur DockerHub. Un fichier Dockerfile passant la validation hadolint est utilisé.

## CD (Livraison continue)

-> A la création d'un tag git et si le CI est un succès :

Le livrable de la livraison continue est une image Docker poussée sur DockerHub dont le tag est le tag git.
