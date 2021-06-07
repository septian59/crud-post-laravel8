<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

##CRUD POST Laravel 8 ?
Merupakan projek pribadi saya, yang berupa CRUD simple blog post menggunakan Laravel 8

##Fitur 
- Autentikasi Penulis
- Add, Show, Edit Post
- Penulis
- Kategori
- Tag

##Release Date
**Relase 15 May 2021

##Install
1. **Clone Repository**
```bash
git clone https://github.com/septian59/crud-post-laravel8.git
cd crud-post-laravel8
composer install
```
2. **Edit dan tambahkan di baris ``.env``**
```
DB_PORT=3306
DB_DATABASE=<YOUR DATABASE NAME>
DB_USERNAME=<YOUR DATABASE USERNAME>
DB_PASSWORD=<YOUR DATABASE PASSWORD>

FILESYSTEM_DRIVER=public //tambahkan baris ini
```
3. **Migrate database dan seed**
```bash
php artisan refresh:database
```

4. **Jalankan Website**
``` bash
php artisan serve
```
    

## Contributing

Contributions, issues and feature requests di persilahkan.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
