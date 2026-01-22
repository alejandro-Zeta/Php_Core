# Docker (Optional)

This directory contains OPTIONAL Docker configuration for local development.
Docker is NOT required to use the PHP Core Agent-Safe template.

## How it works

- `docker-compose.base.yml` defines the PHP web server
- One database compose file is added depending on the database you choose
- Docker Compose merges the files at runtime

## Usage

### MySQL
docker compose \
  -f docker/docker-compose.base.yml \
  -f docker/mysql/docker-compose.mysql.yml \
  up

### PostgreSQL
docker compose \
  -f docker/docker-compose.base.yml \
  -f docker/postgres/docker-compose.postgres.yml \
  up

### MongoDB
docker compose \
  -f docker/docker-compose.base.yml \
  -f docker/mongo/docker-compose.mongo.yml \
  up

## Environment variables

Configure your database connection in `.env`.

Example for MySQL:
DB_DRIVER=mysql  
DB_HOST=db  
DB_PORT=3306  
DB_NAME=app  
DB_USER=app  
DB_PASS=app  

## Notes

- Docker is for local development only
- The core does not depend on Docker
- The application works without Docker