#1) On commence par installer composer :
  * https://getcomposer.org/download/
  * Run Composer-Setup.exe

  
#2) On configure l'API :
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

 



# Autres
* **MCD**

![img.png](img.png)


* **Table Building**

![img_1.png](img_1.png)


* **Table Pièce**

![img_2.png](img_2.png)