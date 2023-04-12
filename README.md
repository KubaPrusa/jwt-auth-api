# Testovací úkol - Jednoduché RESTové API + JWT Autentizace
<br />

## Použité technologie:

PHP, MariaDB, Apache, Symfony, Doctrine DBAL/ORM, CORS, GIT, Postman
<br /><br />

## DataFixtures:
- DataFixtures obsahuje 20 unikátních uživatelů (nastavené heslo: **heslo1234**)
<br /><br />

## API Volání:

### /api/login_check [POST]
  - autentizace (public) pomocí **uživatelského jména** a **hesla**, která vrátí/nastaví **JWT token**
  <br />
  vstupní hodnoty:
  
  ```json
  {
    "username":"<uživatelské jméno>",
    "password":"<heslo>"
  }
  ```
  <hr><br />
  
### /api/register [POST]
  - registrace (public) nového uživatele (**email, uživatelské jméno, heslo**)
  <br />
  vstupní hodnoty:
  
  ```json
  {
    "email":"<emailová adresa>",
    "username":"<uživatelské jméno>",
    "password":"<heslo>"
  }
  ```
  <hr><br />
 
### /api/all [GET]
  - výpis informací všech existujících uživatelů (**id, email, uživatelské jméno, role**) + api informace
### Syntaxe Volání:
  * /api/**all**  - výpis informací všech uživatelů
  * /api/all/**<třídění>** - třídění lze nastavit dle **id, emailu, uživatelského jména, role** - defaultní hodnota třídění: **id**
  * /api/all/<třídění>/**<řazení>** - řazení lze nastavit **asc** (vzestupně) nebo **desc** (sestupně) - defaultní hodnota řazení: **asc** (vzestupně)
 <br />
 výstupní hodnoty:
 
 ```json
 {
    "api_info": [
        {
            "total_items": ...
        }
    ],
    "api_items": [
        {
            "id": ...,
            "username": ...,
            "email": ...,
            "roles": [
                ...,
            ]
        },
        ...
    ] 
 }
 ```
 <hr><br />
 
 ### /api/users [GET]
  - stránkovatelný výpis informací všech existujících uživatelů (**id, email, uživatelské jméno, role**) + api informace
 ### Syntaxe Volání:
  * /api/**users**  - výpis informací všech uživatelů
  * /api/users/**<číslo stránky>** - číslo stránky, které chcete zobrazit (pouze čísla) - defaultní hodnota: **1**. stránka
  * /api/users/<číslo stránky>/**<počet položek na stránku>** - počet položek, které chcete na stránce zobrazit (pouze čísla) - defaultní hodnota: **10** položek
  * /api/users/<číslo stránky>/<počet položek na stránku>/**<třídění>** - třídění lze nastavit dle **id, emailu, uživatelského jména, role** - defaultní hodnota třídění: **id**
  * /api/users/<číslo stránky>/<počet položek na stránku>/<třídění>/**<řazení>** - řazení lze nastavit **asc** (vzestupně) nebo **desc** (sestupně) - defaultní hodnota řazení: **asc** (vzestupně)
 <br />
 výstupní hodnoty:
 
 ```json
 {
    "api_info": [
        {
            "total_page": 1,
            "current_page": 1,
            "total_items": ...,
            "items_per_page": 10,
            "displayed_items": 10
        }
    ],
    "api_items": [
        {
            "id": ...,
            "username": ...,
            "email": ...,
            "roles": [
                ...,
            ]
        },
        ...
    ]
 }
 ```
  
