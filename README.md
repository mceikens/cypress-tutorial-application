# Cypress Tutorial Test Application


## For what is this repository?
This repository is a test application for Cypress Tutorials.
You can pull it and use it for small and easy tests. Currently, are Cypress Tests with more complexity not possible with this application.

## Cypress Tutorial Link:
https://github.com/mceikens/cypress-tutorial

## Starting


### Installation
After clone

```bash
docker-compose up -d
```

```bash
docker-compose exec php composer install
```

```bash
docker-compose exec php cp .env-dist .env
```

```bash
docker-compose exec php php bin/console doctrine:migrations:migrate
```

```bash
docker-compose exec php php bin/console doctrine:fixtures:load --group=tutorial
```

### Using it
This application comes with "ready to use" containers. But the used containers not production ready. If you want to use containers for your application in production, please contact us.

You can use this application with following link:
http://localhost:8080



## Contact Data
### MCEikens Office
E-Mail: dialog@mceikens.de
Website: https://www.mceikens.de