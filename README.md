# 1) On commence par installer composer :
* https://getcomposer.org/download/
* Run Composer-Setup.exe


# 2) On configure l'API :
```bash
git clone https://github.com/mena0018/Test-Technique-IVS.git
cd Test-Technique-IVS/api/
c/c le .env en .env.local
composer install
php bin/console make:migration => On éxécute les migrations pour créer les tables.
php bin/console doctrine:migrations:migrate
bin/console doctrine:fixture:load => On génère des données factices pour alimenter les tables.
```
Remplir manuellement le champs building_id de la table pièce directement depuis la bd

# 3) On lance l'API :

```bash
composer start
http://localhost:8000/api
```

# 4) On installe Node.js :
* https://practicalprogramming.fr/tuto-install-node-js-windows


# 5) On lance notre Front  
```bash
cd Test-Technique-IVS/front/
npm install
npm start
```


# Capture d'écran

## Base de données
* **Table Building**

![Capture d’écran 2022-04-20 185148](https://user-images.githubusercontent.com/89834824/164284999-41dbdf64-7cc2-483f-886f-2059e46393e8.png)

* **Table Pièce**

![Capture d’écran 2022-04-20 185225](https://user-images.githubusercontent.com/89834824/164285002-ae7deb2b-4237-4e9c-b85a-c8c90d8e4f31.png)
