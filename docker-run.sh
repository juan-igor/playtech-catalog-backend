#!/bin/bash

echo " "
echo "[+] Uploading Application Container"
docker-compose up -d

echo " "
echo "[+] Copying the configuration example file"
docker exec -it playtech-catalog-backend cp .env.example .env

echo " "
echo "[+] Installing the dependencies"
docker exec -it playtech-catalog-backend composer install

echo " "
echo "[+] Generating key"
docker exec -it playtech-catalog-backend php artisan key:generate

echo " "
echo "[+] Generating jwt secret key"
docker exec -it playtech-catalog-backend php artisan jwt:secret

echo " "
echo "[+] Creating database if not exist"
docker exec -it playtech-catalog-db bash -c "psql -U postgres -tc \"SELECT 1 FROM pg_database WHERE datname = 'playtech'\" | grep -q 1 || psql -U postgres -c \"CREATE DATABASE playtech\""

echo " "
echo "[+] Making migrations"
docker exec -it playtech-catalog-backend php artisan migrate

echo " "
echo "[+] Making seeds"
docker exec -it playtech-catalog-backend php artisan db:seed

echo " "
echo "[+] Installing Busybox Suid to crontab"
docker exec -it playtech-catalog-backend sudo apk add busybox-suid

echo " "
echo "[+] Defining crontab of API Container"
docker exec -it playtech-catalog-backend bash -c "echo 'ambientum' | sudo tee /etc/crontabs/cron.update"
docker exec -it playtech-catalog-backend bash -c "echo '* * * * * cd /var/www/app && php artisan schedule:run >> /dev/null 2>&1' | sudo tee /etc/crontabs/ambientum"
docker exec -it playtech-catalog-backend bash -c "sudo chown root:ambientum /etc/crontabs/ambientum /etc/crontabs/cron.update"

echo " "
echo "[+] Initializing crontab of API Container"
docker exec -it playtech-catalog-backend bash -c "sudo crond -c /etc/crontabs"

echo " "
echo "[+] Information of new containers"
docker ps

echo " "
