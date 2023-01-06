# API Development PHP example

## API App

This is an example of object oriented programming in MVC but without the view to be able to practice in PHP without using frameworks or libraries, our example API is organized as follows, we have a Config folder that contains the database connection class, the Controllers folder that contains each view file (Read, Create, Update and Delete a student, the other Model folder that contains all the classes from the database.

Here are the main features of this API in object-oriented programming, fully operational:

1. Read and display data from the controller;
2. Create the student in a secure way
3. Updating data on the specific student 
4. Deleting a specific student

>**Note** In the future, we will always improve it. 


## Getting Started

### Pre-requisites and Local Development

Developers using this project should already have:

- WAMPServer 3.2.3
- POSTMAN 

#### Tests

1. Read and display data from the controller

Sample:[`http://localhost/PHP_API_REST/Controllers/readAll.php`]

```
  [
    [
        {
            "nom": "Doe",
            "prenom": "Djino",
            "age": "20",
            "id": "1",
            "niveau_id": "1",
            "niveau_nom": "Licence_1"
        },
        {
            "nom": "Mate",
            "prenom": "Emilie",
            "age": "19",
            "id": "2",
            "niveau_id": "2",
            "niveau_nom": "Licence_2"
        },
        {
            "nom": "Kaye",
            "prenom": "Gentil",
            "age": "23",
            "id": "4",
            "niveau_id": "2",
            "niveau_nom": "Licence_2"
        },
        {
            "nom": "Test",
            "prenom": "Test Don",
            "age": "25",
            "id": "5",
            "niveau_id": "2",
            "niveau_nom": "Licence_2"
        },
        {
            "nom": "Banyi",
            "prenom": "Donatien",
            "age": "25",
            "id": "3",
            "niveau_id": "3",
            "niveau_nom": "Master_1"
        }
    ]
]
```

2. Create the student in a secure way

Sample:[`http://localhost/PHP_API_REST/Controllers/create.php`]

```
{
    "nom": "Banyi",
    "prenom": "Donatien",
    "age": "25",
    "id": "3",
    "niveau_id": "3",
    "niveau_nom": "Master_1"
}
```
3. Updating data on the specific student 

Sample:[`http://localhost/PHP_API_REST/Controllers/update.php`]

```
{
    "nom": "Banyi",
    "prenom": "Donatien",
    "age": "25",
    "id": "3",
    "niveau_id": "3",
    "niveau_nom": "Master_1",
    "id":"3"
}
```

4. Deleting a specific student

Sample:[`http://localhost/PHP_API_REST/Controllers/delete.php`]

```
{
    "id": "3"
}
```
