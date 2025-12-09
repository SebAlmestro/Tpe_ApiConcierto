# Tpe_ApiConcierto

##Descripción

Esta API tiene como proposito acceder a los conciertos que tiene una determinada banda.
La dirección base de la API es la siguiente:

{ruta_servidor_apache}/api
---
##Requerimientos
Contar con la base de datos importada en PhpMyAdmin para poder realizar las pruebas de la Api.
---
##Endpoints

- GET:/api/bandas
- este endpoint devuelve todas las bandas cargadas en la base de datos.

- GET:/api/banda/:id
- este endpoint devuelve una cancha especifica buscada por su id.

- POST:/api/banda
- Se encarga de crear una nueva banda.
- Este endpoint recibe un formData en el body del HTTP Request del siguiente formato:

//Json para copiar en body raw en postman y chequear

    {
        "nombre": "Metallica",
        "pais": "Estados Unidos",
        "genero": "Heavy Metal",
        "imagen": "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTcuBwXj11CPsYF0hiknUIpLMr4FslKFgPOgA&s"
    }

PUT:/api/banda/:id
- Se encarga de editar los campos de una banda ya creada.
Este endpoint recibe la informacion con la siguiente estructura, con las mismas explicaciones del endpoint anterior de post banda.

//Json para copiar en body raw en postman y chequear

{
        "nombre": "AC/DC",
        "pais": "Australia",
        "genero": "Hard Rock",
        "imagen": "https://upload.wikimedia.org/wikipedia/en/6/6f/ACDC_logo.png"
    }


GET:/api/conciertos
- este endpoint devuelve todos los conciertos cargados en la base de datos

- GET:/api/conciertos?sort=fecha
- Este endpoint devuelve todos los conciertos ordenado de forma Ascendente dependiendo de la fecha.
- Si quisieramos listarlo al reves podemos agregar a este endpoint &order=desc quedando asi de la siguiente forma
 GET:/api/conciertos?sort=fecha&order=desc
 este endpoint devuelve los conciertos ordenados de forma descendente por la fecha.


- GET:/api/concierto/:id
- este endpoint devuelve un concierto determinado por ID.




POST:/api/concierto
- Se encarga de crear un nuevo concierto.
- Este endpoint recibe un formData en el body del HTTP Request del siguiente formato:

 //Json para copiar en body raw en postman y chequear

    {
        "fecha": "2025-12-10",
        "horario": "21:00",
        "lugar": "Luna Park",
        "ciudad": "Buenos Aires",
        "id_banda": 1
    }

PUT:/api/concierto/:id
- Se encarga de editar los campos de un concierto ya creado.
- Este endpoint recibe un formData en el body del HTTP Request del siguiente formato:

 //Json para copiar en body raw en postman y chequear
    
    {
        "fecha": "2026-01-15",
        "horario": "20:30",
        "lugar": "Teatro Gran Rex",
        "ciudad": "Buenos Aires",
        "id_banda": 2
    }

-Aclaracion de uso de endpoints desde Postman o similares: Si la carpeta donde se encuentra alojada la api esta dentro de 
htdocs y otra carpeta llamada "entrega", un ejemplo de endpoint correcto para que el consumo de las funcionalidades de la API
ocurra sin problemas es.
Metodo GET : http://localhost/entrega/api/conciertos/sortedByDate
