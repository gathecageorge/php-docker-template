# Setup

1. You need to have PHP and composer installed
2. Run composer install
    ```bash
    composer install
    ```
3. Copy .env_template to .env (`cp .env_template .env`) and edit as required
    ```bash
    # If the value of COMPOSE_FILE=docker-compose.yml:mount.yml
    # then (MOUNT_PATH) directory will be mounted to /var/www/html

    # If the value of COMPOSE_FILE=docker-compose.yml
    # then contents of (MOUNT_PATH) directory will be copied to /var/www/html. 
    # No mounting

    COMPOSE_PATH_SEPARATOR=:
    COMPOSE_FILE=docker-compose.yml:mount.yml

    WEB_SERVER_PORT=8081
    PHPMYADMIN_PORT=8082
    DATABASE_ROOT_PASSWORD=root
    DATABASE_USER=testinguser
    DATABASE_USER_PASSWORD=AveryHardPassword
    MYSQL_DATABASE=testingdatabase
    MYSQL_HOST=mysql
    MOUNT_PATH=./
    MYSQL_PORT=3306
    ```
3. Run docker compose
    ```bash
    docker-compose run -d
    ```

