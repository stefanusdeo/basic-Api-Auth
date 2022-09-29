Langkah langkah:
1. composer install,
2. buat database dengan nama elemesdb
3. jalankan php artisan migrate --seed.

Auth
- login: POST http://localhost:8000/api/login
payload {
    "username":"admin@gmail.com"
    "password":"adminitbaru"
}

- register POST http://localhost:8000/api/users
payload {
    "name":"Grace Claudia",
    "email":"grace@gmail.com",
    "password":"adminitbaru",
    "role_id":2
}

- update PUT http://localhost:8000/api/users
payload {
    "id":2,
    "name":"Grace Claudia",
    "email":"grace@gmail.com",
    "password":"adminitbaru",
    "role_id":2
}

- delete Delete http://localhost:8000/api/users
payload {
    "id":2,
}
/* Role Id untuk mengidentifikasi role (Admin , User)

- get GET http://localhost:8000/api/course
bisa membawa params "most_popular", "id", "slug"

- POST http://localhost:8000/api/course
payload{
    "title":"course six edit",
    "category":"Education",
    "most_popular": 0,
    "desctiption": "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum",
        "price": 200000
}

- PUT http://localhost:8000/api/course
payload{
    "id":1,
    "title":"course six edit",
    "category":"Education",
    "most_popular": 0,
    "desctiption": "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum",
        "price": 200000
}

- Delete http://localhost:8000/api/course
payload {
    "id":2
}

