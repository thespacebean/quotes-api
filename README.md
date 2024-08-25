
## Random Quote API

This is a random quote API which by default returns quotes in sets of 5 and uses kanye.rest as a data source. Through the config/env settings you can easily change the source and number of quotes returned if you're not a fan of kanye's deep wisdom, or need more/less at once.


## Requirements

- PHP 8.2
- Composer 2+
- Postman or other API client (if you want to access the API directly)
- Xdebug and/or PCOV extensions for PHP (if you want to generate code coverage report)

## Local Setup

This application uses no database and can be served locally through artisan, so to get your api working please run the following commands:

- `cp .env.example .env`
- `composer install`
- `php artisan serve`

If you now direct yourself to [http://127.0.0.1:8000](http://127.0.0.1:8000) you should see this readme!

## Running Tests

To run the suite of tests please run the following command: `php artisan test`

If you have the xdebug or PCOV extension enabled for php and would like to generate/view a code coverage report then please run the following: `php artisan test --coverage`. This should display coverage information on the command line, as well as txt and html results in a 

## Accessing the API

We have included a Postman collection if you would like to import it and test with default values. It is located at `Tests\Postman\QuoteAPICodeExample.postman_collection.json`.

If you would like to use another API client you can do so with the following information:

- Base URI: `http://127.0.0.1:8000/api`
- Authorization: `Bearer <API_TOKEN from .env>`

The following endpoints are accessible with a GET request:

- `/quotes` or `/quotes?page=#`: This will return a set of 5 random quotes, paginated. Each page is a unique set of 5 quotes, but you can return to a specific page to see the same quotes (this is refreshed nightly). 
- `/quotes/random`: This will return 5 random quotes which will change every time you refresh.

## Customising the API

You can change the API token required to access the quotes by updating the `API_KEY` in your .env file. If you want to view a different number of quotes per "page" of the API you can update `DATASOURCE_CHUNK_SIZE` and if you rather see latin nonsense than Kanye nonsense you can update `DATASOURCE_DEFAULT` to `lorem-ipsum`. 

If you update your API_KEY remember to update your Postman or other API connections.

Have fun!



