# Custom Resource Test

Custom resource with customized paginated data.

```sh
{
    "items":[
        {
            "uuid":"6377ccca96a334.85882172",
            "name":"Brionna Wintheiser"
        },
        ...
    ],
    "metadata":{
        "total":110,
        "pages":22,
        "current":1,
        "next":"http://localhost/test/public/user/a?page=2",
        "previous": null
    }
}
```

## Installation

1. Clone this project
2. Run command `composer install`
3. Add database credentials in `.env` file
4. Project setup url: `localhost/[project_folder]/public/setup`
5. Query user url: `localhost/[project_folder]/public/user/{query_string}`
6. Generate more user to test `localhost/[project_folder]/public/generate/100`
