# Simple Url-shortener

This is simple url-shortener using Laravel, Redis, Mysql
Also, this project could be implemented only by Redis but for scalability reason we used MySQL too. 
due to business needs it can be scaled, for example if in future we need to implement dashboard for users it is better
to have relational tables.

##### why we get user_id in each request?

as you said in the task description, we want urls per users,
and we don't need Register/Login implementation, so that's why
we want user_id in each request.

### Run:
configure redis before using in your `.env`

`php artisan migrate`

`php artisan db:seed`

`php artisan serve`

### endpoints:

API:

Get all URLs per user:
```http
GET /api/urls
```

| Parameter | Type      | Description           |
|:----------|:----------|:----------------------|
| `user_id` | `integer` | **Required**. user_id |



Store new URL per user:
```http
POST /api/
```

| Parameter | Type         | Description                        |
| :--- |:-------------|:-----------------------------------|
| `user_id` | `integer`    | **Required**. user_id |
| `url` | `string-url` | **Required**. url                  |


Get top visits:
```http
GET /api/top
```

| Parameter | Type      | Description              |
| :--- |:----------|:-------------------------|
| `count` | `integer` | **Required**. top count  |


WEB:

Get top visits:
```http
GET /{code}
```

| Parameter | Type     | Description                              |
|:----------|:---------|:-----------------------------------------|
| `code`    | `string` | **Required**. redirect to mapped website |


### TODO:
- [ ] Write tests.
- [ ] Open Api documentation.
- [ ] Fix duplicated Key for url codes.
