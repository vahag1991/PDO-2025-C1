# Exercice 6
## PDO - query

- Importez la base de données se trouvant dans `datas/pdo_sym_c1.sql` dans votre serveur de base de données en `MariaDB` (port `3307`, root sans mot de passe, ignorez les clefs étrangères) OK
- Copiez le dossier `formateur/06-exercice-query-3-tables` dans **votre dossier de travail** OK
- Travaillez sur une nouvelle branche `exercice-6` OK
- Créez le fichier `.gitignore` et mettez-y le fichier `config-prod.php` pour ne pas le versionner
- Dupliquez le fichier `config-dev.php` en `config-prod.php` (les valeurs sont les bonnes pour travailler en local)
- Suivez les instructions du fichier `public/index.php` pour créer des pages qui affichent des données
- Toutes les requêtes doivent être faites dans le controller frontal `public/index.php`
- Les résultats doivent être affichés dans les vues en utilisant la boucle `foreach`