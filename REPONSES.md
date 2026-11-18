## Réponses

# Palier 1 - Observer (ouvrir et lire)

1.  L'URL définie est la racine (la page d'accueil de base) qui retourne la vue (ici, il s'agit de la vue welcome) dans resources/views/welcome.blade.php.

2.  APP_ENV : local
    DB_CONNECTION : mariadb
    SESSION_DRIVER : database

3.  Les services définis sont fatih (anciennement laravel.test) et mariadb et fatih sert la page localhost, avec le port 80.

4.  Dans databse/migrations/, il y a 3 fichiers qui créer les tables users, password_reset_tokens, sessions, cache, cache_locks, jobs, job_batches, failed_jobs

La commande php artisan migrate:status (dans podman compose exec fatih bash)

# Palier 2 - Relier (suivre le fil entre deux fichiers)

5. Le premier fichier chargé est /../vendor/autoload.php, génèrer par Composer lors de l'installation des dépendances

6. Dans bootstrap/app.php, on retrouve les routes web(routes/web.php), commands (routes/console.php) et health (/up).

localhost:8080/up affiche "Application up, HTTP request received. Response rendered in 1294ms.

7. La commande php artisan route:list montre 4 routes :
    - web/php
    - 2 storage/{path} (un GET, un PUT)
    - up (health de la question 6)

8. Ligne 16 'name' => env('APP_NAME','Laravel') définit 'name'
   La fonction env() est utilisée pour lire la valeur et si elle était absente, elle utiliserais la deuxième valeur de la fonction 'Laravel'.

# Palier 3 : Raisonner (expliquer un choix du framework)

9.

app/Models/ contient un seul modèle. Lequel ? À quelle table de la base correspond-il ? Comment Laravel fait-il le lien entre le nom de la classe et le nom de la table ?

10. 10 app/Http/Controllers/ contient un fichier. Est-il utilisé par la route / ? Si non, comment la route produit-elle quand même une réponse ?

11. 11 Ouvrez .gitignore. Pourquoi .env y figure-t-il alors que .env.example n'y figure pas ? Pourquoi vendor/ y figure-t-il ? Quelle commande un collègue devra-t-il lancer après avoir cloné votre dépôt pour reconstituer ce dossier ?
12. 12 Le dossier public/ est le seul exposé au serveur web. Quel problème de sécurité cela évite-t-il par rapport à un projet PHP « from scratch » où tous les fichiers sont à la racine du site ?