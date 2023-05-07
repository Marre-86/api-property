[![author-check](https://github.com/Marre-86/api-property/actions/workflows/author-check.yml/badge.svg)](https://github.com/Marre-86/api-property/actions/workflows/author-check.yml)
[![Maintainability](https://api.codeclimate.com/v1/badges/3fd61770aa68deabdd2e/maintainability)](https://codeclimate.com/github/Marre-86/api-property/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/3fd61770aa68deabdd2e/test_coverage)](https://codeclimate.com/github/Marre-86/api-property/test_coverage)

# Desription

["Villa Verify"](https://villa-verify-production.up.railway.app/) is a public API that enables its users to send and retrieve data for the property objects ('houses') and a single-page application where such features as property search and adding new property object are implemented.

# About this project

This project has been accomplished as a pre-employment test for a PHP developer position. According to the task, it was required to build an API for the following proveded data:


| Name         | Price  | Bedrooms | Bathrooms | Storeys | Garages |
|--------------|--------|----------|-----------|---------|---------|
| The Victoria | 374662 | 4        | 2         | 2       | 2       |
| The Xavier   | 513268 | 4        | 2         | 1       | 2       |
| The Como     | 454990 | 4        | 3         | 2       | 3       |
| The Aspen    | 384356 | 4        | 2         | 2       | 2       |
| The Lucretia | 572002 | 4        | 3         | 2       | 2       |
| The Toorak   | 521951 | 5        | 2         | 1       | 2       |
| The Skyscape | 263604 | 3        | 2         | 2       | 2       |
| The Clifton  | 386103 | 3        | 2         | 1       | 1       |
| The Geneva   | 390600 | 4        | 3         | 2       | 2       |

A RESTful API has been created for the resourses of this structure in Laravel framework. There are two API endpoints and four HTTP methods available at the server url https://villa-verify-production.up.railway.app/api/v1:

- **GET /houses** - returns a list of houses.
- **POST /houses** - adds a new house.
- **GET /houses/{houseId}** - returns a house by ID.
- **PUT /houses/{houseId}** - updates chosen house.
- **DELETE /houses/{houseId}** - deletes chosen house.

Also a bunch of search parameters has been implemented, enabling users to query the API with pre-set filters by name, price, number of bedrooms, bathrooms, storeys and garages.

The API operates on data in the standard JSON format. 

[An OpenAPI file](https://github.com/Marre-86/villa-verify/blob/main/public/openapi.yaml) has been written, meticulously describing the entire API.

All data is stored and updated in the **PostgreSQL database**. Operations of storing and extracting data are implemented through Laravel's built-in ORM. Migrations and seeders are written for populating the database with initial entities.

Controller methods processing API requests are covered by automated tests (feature tests) based on PHPUnit and Laravel built-in assertion methods. [Additional package](https://github.com/kirschbaum-development/laravel-openapi-validator) has been integrated into these tests, it checks incoming requests and outcoming responses for compliance with aforementioned OpenAPI spec. A test coverage report from **Codeclimate** was added to this project.

A single-page application with search form, post form and rendering retrieved API query responses has been developed in **Vue.js**.

**GitHub Actions** CI/CD workflow for this project was also created and tuned in a way that every commit is instantly being built, tested and deployed if no errors were found. **Railway** deployment platform [hosts](https://villa-verify-production.up.railway.app/) this web app. Also it is linked to the real-time error tracking platform **Rollbar**.