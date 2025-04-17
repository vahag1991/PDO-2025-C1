# Préparation TI2 - Insertion et sélection

## Avec Bonus

## Web C1 2025

### Fichiers

Dupliquez `config.dev.php` en `config.php`

### Importation de données

Importez le fichier `datas/pdo_c1_exe_ti2.sql` via `phpMyAdmin` ou un autre outil de gestion de base de données vers `MySQL`.
Vous travaillerez sur la table `article`.

### Chemin

Le dossier public de l'application est `public` et le fichier d'entrée est `index.php`.

### Navigation

Dans le fichier de configuration, il existe 2 constantes pour la pagination

```php
# pour la pagination
const PAGINATION_NB = 3; // nombre d'articles par page
const PAGINATION_GET = "pg"; // nom de la variable GET pour la pagination
```

L'objectif est d'avoir maximum 3 articles par page, puis une pagination se met en place