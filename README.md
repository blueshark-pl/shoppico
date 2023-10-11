# Shoppico pre-alpha
web application for aggregating advertisements found on the Internet using any parser.

Are you looking for an apartment on advertising portals?
If you are looking for a new or used car or other thing that can be found on advertising portals, this application is for you.

## Installation

1. Download [Composer](https://getcomposer.org/doc/00-intro.md) or update `composer self-update`.

You can now either use your machine's webserver to view the default home page, or start
up the built-in webserver with:

```bash
bin/cake server -p 8763
```

Then visit `http://localhost:8763` to see the welcome page.


## Configuration

Read and edit the environment specific `config/app_local.php` and setup the 
`'Datasources'` and any other configuration relevant for your application.
Other environment agnostic settings can be changed in `config/app.php`.

## Preview
![Login Page](docs/preview.png "Login Page")
![Login Page](docs/preview2.png "App Dashboard")
