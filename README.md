# UrlHashing

**UrlHashing** is a frontend layer for generate short url to overcome the risk of long URLs getting ruined by formatters. Objective is to design and implement a URL hashing system which would allow us to overcome these problems primarily.

## Architecture

- I used **Laravel Framework** to implement above system. Because it has native authentication and model-view-controller (MVC) architecture. These features make the framework easy to use and Laravel is a trendy web framework.
- Also the main reason is it's mention in JD.
- Php 7.4 version and Laravel version is ^8.

## Modules

- HashUrl module where user can input original url with click limit and expired dates. 
- Display list of all original url with hash urls. 
- While click on hash url link it will redirect to original url [long url].
- Validate the hash url before redirect with click count limit and expired days.
- Show expired page if url is expired or access limit over.

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
