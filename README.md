# BookBus Laravel

## Description  
BookBus Laravel est une application web simplifiée de réservation de billets de bus inspirée de la plateforme marocaine marKoub.ma.
## Instructions d'installation  

### 1. Accés au projet  
```bash
cd bookbus-laravel
```
### 2. Copier le fichier d'environnement
```bash
cp .env.example .env
```
### 3. Générer la clé de l'application
```bash
php artisan key:generate
```
### 5. Configurer la base de données dans le fichier .env
```bash
DB_DATABASE=bookbus
DB_USERNAME=root
DB_PASSWORD=
```
### 6. Lancer le serveur
```bash
php artisan serve
```
### L'application sera accessible sur :
http://127.0.0.1:8000