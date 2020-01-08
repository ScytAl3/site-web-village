Site web pour un village
========================

## _But :_

Développer un site web pour un village avec PHP et Symfony:

* **Création des pages accueil  et histoire**. 

* **Création d'une page pour afficher des événements**.

* **Création d'une page avec un formulaire de contact**.

* **Mise en place d'un login pour administrer les événements**.

* **Gestion des images associées aux événements**.

* **Utilisation d'une API de localisation**.

* **Permettre le choix de la langue**.


## _Principe :_

* Création d'un projet Symfony en utilisant PHP et Composer.
* Création des controllers et des routes en utilisant les annotations.
* Utilisation de bibliothèque Doctrine via ORM pack pour travailler avec la base de données.
* Création des entités Evenement, Picture et User pour enregistrer et interroger ces objets dans les tables correspondantes dans la base de données.
* Login d'authentification pour gérer les événements.
* Utilisation de la bibliothèque Swift Mailer et de Maildev pour taiter et tester le formulaire de contact.
* Utlisation de VichUploaderBundle pour faciliter le téléchargement de fichiers avec des entités ORM.
* Utilisation de LiipImagineBundle pour la manipulation des images.
* Utilisation d'un carousel pour afficher les images d'un événement.
* Auto-complétion de l'adresse pour la création ou la modification d'un événement : bibliothèque JavaScript Algolia Places.
* Affichage de la carte interactive d'un événement ou de la page "Nous trouver" :  bibliothèque JavaScript.
* Création des fichiers de translation (en - fr) pour permettre à l'utilisateur de changer la langue du site.

## _Screenshots :_

* Homepage and navbar :

![Image of homepage](https://github.com/ScytAl3/site-web-village/blob/master/screenshots/01-HomePage_and_navbar.png|width=50%)
___

* Homepage, calendar - current events :

![Image of event](https://github.com/ScytAl3/site-web-village/blob/master/screenshots/02-HomePage_currentEvents.png)

* Homepage, calendar - events to come :

![Image of event](https://github.com/ScytAl3/site-web-village/blob/master/screenshots/03-HomePage_toComeEvents.png)

* Events - show details part1 :

![Image of event](https://github.com/ScytAl3/site-web-village/blob/master/screenshots/04-Event_show_details_part1.png)

* Events - show details part2 :

![Image of event](https://github.com/ScytAl3/site-web-village/blob/master/screenshots/05-Event_show_details_part2.png)

* Find us page :

![Image of event](https://github.com/ScytAl3/site-web-village/blob/master/screenshots/06-FindusPage.png)

* Contact us page :

![Image of event](https://github.com/ScytAl3/site-web-village/blob/master/screenshots/07-ContactPage.png)

* Login page :

![Image of event](https://github.com/ScytAl3/site-web-village/blob/master/screenshots/08-LoginPage.png)

* Admin CRUD event page part1 :

![Image of event](https://github.com/ScytAl3/site-web-village/blob/master/screenshots/09-Admin_Event_CRUD_part1.png)

* Admin CRUD event page part2 :

![Image of event](https://github.com/ScytAl3/site-web-village/blob/master/screenshots/10-Admin_Event_CRUD_part2.png)

* Admin CRUD event page part3 :

![Image of event](https://github.com/ScytAl3/site-web-village/blob/master/screenshots/11-Admin_Event_CRUD_part3.png)

* Translation part1 :

![Image of event](https://github.com/ScytAl3/site-web-village/blob/master/screenshots/12-translation_part1.png)

* Translation part2 :

![Image of event](https://github.com/ScytAl3/site-web-village/blob/master/screenshots/13-translation_part2.png)

* Translation part3 :

![Image of event](https://github.com/ScytAl3/site-web-village/blob/master/screenshots/14-translation_part3.png)
