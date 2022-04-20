# 1) On commence par installer composer :
  * https://getcomposer.org/download/
  * Run Composer-Setup.exe

  
# 2) On configure l'API :
```bash
git clone https://github.com/mena0018/Test-Technique-IVS.git
cd IVS/api/
c/c le .env en .env.local
php bin/console make:migration
php bin/console doctrine:migrations:migrate => On éxécute les migrations qui sont dans migrations/
composer install
bin/console doctrine:fixture:load => On génère des données
```

# 3) On lance l'API :

```bash
composer start
http://localhost:8000/api
```

 



# Base de données

* **Table Building**

![Capture d’écran 2022-04-20 185148](https://user-images.githubusercontent.com/89834824/164284999-41dbdf64-7cc2-483f-886f-2059e46393e8.png)


* **Table Pièce**

![Capture d’écran 2022-04-20 185225](https://user-images.githubusercontent.com/89834824/164285002-ae7deb2b-4237-4e9c-b85a-c8c90d8e4f31.png)
