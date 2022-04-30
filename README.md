# Comment installer "Mon Blog"

## À propos de "Mon Blog"

"Mon Blog" est un projet réalisé pour la formation OpenClassRooms.

- **Language:** PHP, HTML, CSS, JavaScript
- **Framwork:** Bootstrap 5
- **Template:** [knight](https://bootstrapmade.com/knight-free-bootstrap-theme/) de [BootstrapMade](https://bootstrapmade.com/)

## Étape d'installation du projet

1. Cloner le repositories.
2. Importer le fichier [blog_oc.sql](DATABASE/blog_oc.sql), situé dans le dossier /DATABASE/, dans votre base de données.
3. Modifier l'accès à la base de données dans le fichier [DbModel.php](model/DbModel.php), situé dans le dossier /model/.

	> const HOST = '*nom de votre serveur*';
	> 
	> const DBNAME = '*nom de la base de données*';
	> 
	> const USERNAME = '*nom de l'utilisateur*';
	> 
	> const PASSWORD = '*mot de passe*';

4. Créer votre compte sur le site et valider votre compte.
5. Allez dans la base de données, dans la table User, et sur votre ligne dans status modifié le en admin.

Et voila votre blog est pret à fonctionner.