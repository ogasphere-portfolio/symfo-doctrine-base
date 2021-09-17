## Challenge Intro à Doctrine

Refaire les manips vues ce jour (depuis un projet Symfo vierge) :

- Configuration/Création Une BDD _blog_ via ligne de commande.
- Création d'une entité _Post_, exemple de propriétés pour commencer :
    - `title`, `body`, `nbLikes`, `publishedAt`, `createdAt`, `updatedAt`.
- Ajout des informations de mapping.
- Créer une migration.
- Appliquer la migration.
-  Créer quatre routes spécifiques pour :
   - Lire un Post via son id + lire tous les Posts
   - Bonus : Créer un Post depuis le contrôleur.
   - Bonus : Mettre à jour (mettez à jour la propriété `updatedAt`).
   - Bonus : Supprimer.
  
=> N'oubliez pas les redirections si besoin :wink:

=> [Fiche récap' (succinte)](https://github.com/O-clock-Alumnis/fiches-recap/blob/master/symfony/themes/S2J1-Doctrine.md)

=> [Documentation (dont infos à trier)](http://symfony.com/doc/current/doctrine.html)

### Bonus (facultatif :nerd_face:)

Créer un début d'interface d'admin permettant de :

- Lister les enregistrements.
- Afficher un enregistrement.
- Modifier (via un formulaire très simple si vous le faites, ne gérez pas forcément les erreurs, nous verrons comment intégrer cela avec Symfony de manière automatique).
- Supprimer (optionnel : avec un JS `confirm()` ou fenêtre modale Bootstrap).
- Ajouter une navigation pratique et les messages flash qui vont bien.
- Le tout avec Bootstrap histoire que ce soit un minimum joli, titres, tableau, boutons :wink:

### Bonus _lectures_

- [Conversion de paramètre automatique](https://symfony.com/doc/current/doctrine.html#automatically-fetching-objects-paramconverter)
- [Créer de fausses données (fixtures) **spoiler** pour la suite](https://symfony.com/doc/current/doctrine.html#dummy-data-fixtures)
