---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#general


<!-- START_fc1e4f6a697e3c48257de845299b71d5 -->
## api/users
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/users`


<!-- END_fc1e4f6a697e3c48257de845299b71d5 -->

<!-- START_e1cee30d0e2ae26edf26bc692956cbb4 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/vendors" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/vendors"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/v1/vendors`


<!-- END_e1cee30d0e2ae26edf26bc692956cbb4 -->

<!-- START_8d9994a0f18e0e5ebbf340d505bcda56 -->
## api/v1/vendors/{vendorId}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/vendors/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/vendors/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/v1/vendors/{vendorId}`


<!-- END_8d9994a0f18e0e5ebbf340d505bcda56 -->

<!-- START_b7f8f95481d9f532588d6c9690d39252 -->
## api/v1/vendors/{tagName}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/vendors/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/vendors/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/v1/vendors/{tagName}`


<!-- END_b7f8f95481d9f532588d6c9690d39252 -->

<!-- START_3828cff9a39755106f385f8d18193cd5 -->
## api/v1/tags
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/tags" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/tags"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/v1/tags`


<!-- END_3828cff9a39755106f385f8d18193cd5 -->

<!-- START_27797371b51932a8bd59406f69868947 -->
## api/v1/tags/{tagId}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/tags/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/tags/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/v1/tags/{tagId}`


<!-- END_27797371b51932a8bd59406f69868947 -->

<!-- START_1cab9382e79f48e52d0fd0d89989af6b -->
## api/v1/dishes/{dishId}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/dishes/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/dishes/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/v1/dishes/{dishId}`


<!-- END_1cab9382e79f48e52d0fd0d89989af6b -->

<!-- START_d5bf85ba73b74fd96f7161a75d7e5ab9 -->
## api/v1/vendors/create
> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/vendors/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/vendors/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/v1/vendors/create`


<!-- END_d5bf85ba73b74fd96f7161a75d7e5ab9 -->

<!-- START_bdfb6be1ae95b2e1cf02877bdfd10ea7 -->
## api/v1/tags/create
> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/tags/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/tags/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/v1/tags/create`


<!-- END_bdfb6be1ae95b2e1cf02877bdfd10ea7 -->

<!-- START_10c1972035d23b5a55c5b94d10a509bd -->
## api/v1/orders/create
> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/orders/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/orders/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/v1/orders/create`


<!-- END_10c1972035d23b5a55c5b94d10a509bd -->

<!-- START_3602db9dac96eb2827feb8c41b26df47 -->
## api/v1/tags/{tagId}/update
> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/tags/1/update" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/tags/1/update"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/v1/tags/{tagId}/update`


<!-- END_3602db9dac96eb2827feb8c41b26df47 -->

<!-- START_d52cea345b217a75c6362d1d7321e185 -->
## api/v1/dishes/{dishId}/update
> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/dishes/1/update" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/dishes/1/update"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/v1/dishes/{dishId}/update`


<!-- END_d52cea345b217a75c6362d1d7321e185 -->

<!-- START_874a5dd20c29dcb10c80b6d5918bd988 -->
## api/v1/vendors/{vendorId}/update
> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/vendors/1/update" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/vendors/1/update"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/v1/vendors/{vendorId}/update`


<!-- END_874a5dd20c29dcb10c80b6d5918bd988 -->

<!-- START_ab7ba0b5b9a0a4b93b7f69cfd8b95ec2 -->
## api/v1/orders/{orderId}/update
> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/orders/1/update" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/orders/1/update"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/v1/orders/{orderId}/update`


<!-- END_ab7ba0b5b9a0a4b93b7f69cfd8b95ec2 -->

<!-- START_7dc7f1999bc3d8758cda2b5465f450f4 -->
## api/v1/vendors/{vendorId}/delete
> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/vendors/1/delete" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/vendors/1/delete"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/v1/vendors/{vendorId}/delete`


<!-- END_7dc7f1999bc3d8758cda2b5465f450f4 -->

<!-- START_1a1f08e49fbb43ca9595c169e82cdad1 -->
## api/v1/tags/{tagId}/delete
> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/tags/1/delete" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/tags/1/delete"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/v1/tags/{tagId}/delete`


<!-- END_1a1f08e49fbb43ca9595c169e82cdad1 -->

<!-- START_9d6346f1e6f3c4939813cf22bd4b5f8a -->
## api/v1/dishes/{dishId}/delete
> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/dishes/1/delete" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/dishes/1/delete"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/v1/dishes/{dishId}/delete`


<!-- END_9d6346f1e6f3c4939813cf22bd4b5f8a -->

<!-- START_932469d9952e66c5ed5c371d03a74cd7 -->
## api/v1/orders/{orderId}/delete
> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/orders/1/delete" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/orders/1/delete"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/v1/orders/{orderId}/delete`


<!-- END_932469d9952e66c5ed5c371d03a74cd7 -->

<!-- START_c3fa189a6c95ca36ad6ac4791a873d23 -->
## api/login
> Example request:

```bash
curl -X POST \
    "http://localhost/api/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/login`


<!-- END_c3fa189a6c95ca36ad6ac4791a873d23 -->


