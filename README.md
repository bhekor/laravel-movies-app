<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Mufis is a movie and tv shows streaming site (General Idea) built on the Laravel Framework using the TheMovieDB API and Stripe for the subscription aspect.

-   Completely Laravel (Blade).
-   Tailwind CSS for the layout (wt Laravel UI).
-   AlpineJS for the UI interactivity.
-   Laravel Cashier (Stripe).
-   Laravel Livewire (the dynamic search).
-   Tailwind Spinner (for search results indicator).

**_Let me know if I'm missing anything_**

## Using the Project

**Stripe Payment Gateway:** _https://stripe.com/en-gb-us (MUST BE REGISTERED TO GET YOUR PUBLISH KEY AND SECRET KEY AND TO CREATE SUBSCRIPTION)_

**TMDB API:** _https://www.themoviedb.org/settings/api (MUST BE REGISTERED TO VIEW THIS PAGE TO GET YOUR API KEY AND TOKEN)_

In your **`.env`** file

```php
# Your database details here
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=moviesapp
DB_USERNAME=root
DB_PASSWORD=

# Your API details
TMDB_TOKEN=***__***
TMDB_BEARER=***__***
STRIPE_KEY=pk_test_***__***
STRIPE_SECRET=sk_test_***__***
```

```php
>> composer update
>> php artisan migrate
```

```javascript
>> npm install
```

## Resources Used

**Laravel UI**: Authentication Scaffolding

> > **Main Docs:** _https://laravel.com/docs/7.x/frontend_

---

**Laravel Cashier**: For the payment/subscription (Easy integration with Stripe)

> > **Main Docs:** _https://laravel.com/docs/8.x/billing_

---

**Tailwind CSS**: Used for the Frontend UI

> > **Main Docs:** _https://tailwindcss.com/docs/installation_

```javascript
>> npm install tailwindcss postcss autoprefixer
```

**PostCSS 7 compatibility build**

```c
Error: PostCSS plugin tailwindcss requires PostCSS 8.
```

```javascript
>> npm uninstall tailwindcss postcss autoprefixer

>> npm install tailwindcss@npm:@tailwindcss/postcss7-compat postcss@^7 autoprefixer@^9
```

---

**Alpine.js**: For event handling on the search form (probably not necessary!) - I just like it.

```javascript
<script
    src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
    defer
></script>
```

## Contributing

This is a personal project, however you can contribute to it in any way see fit

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
