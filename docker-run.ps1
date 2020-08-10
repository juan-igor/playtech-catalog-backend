Write-Host " "
Write-Host "[+] Uploading Application Container"
docker-compose up -d

Write-Host " "
Write-Host "[+] Copying the configuration example file"
docker exec -it playtech-catalog-backend cp .env.example .env

Write-Host " "
Write-Host "[+] Installing the dependencies"
docker exec -it playtech-catalog-backend composer install

Write-Host " "
Write-Host "[+] Generating key"
docker exec -it playtech-catalog-backend php artisan key:generate

Write-Host " "
Write-Host "[+] Generating jwt secret key"
docker exec -it playtech-catalog-backend php artisan jwt:secret

Write-Host " "
Write-Host "[+] Creating database if not exist"
docker exec -it playtech-catalog-db bash -c "psql -U postgres -tc \"SELECT 1 FROM pg_database WHERE datname = 'playtech'\" | grep -q 1 || psql -U postgres -c \"CREATE DATABASE playtech\""

Write-Host " "
Write-Host "[+] Making migrations"
docker exec -it playtech-catalog-backend php artisan migrate

Write-Host " "
Write-Host "[+] Making seeds"
docker exec -it playtech-catalog-backend php artisan db:seed

Write-Host " "
Write-Host "[+] Installing Busybox Suid to crontab"
docker exec -it playtech-catalog-backend sudo apk add busybox-suid

Write-Host " "
Write-Host "[+] Defining crontab of API Container"
docker exec -it playtech-catalog-backend bash -c "echo 'ambientum' | sudo tee /etc/crontabs/cron.update"
docker exec -it playtech-catalog-backend bash -c "echo '* * * * * cd /var/www/app && php artisan schedule:run >> /dev/null 2>&1' | sudo tee /etc/crontabs/ambientum"
docker exec -it playtech-catalog-backend bash -c "sudo chown root:ambientum /etc/crontabs/ambientum /etc/crontabs/cron.update"

Write-Host " "
Write-Host "[+] Initializing crontab of API Container"
docker exec -it playtech-catalog-backend bash -c "sudo crond -c /etc/crontabs"

Write-Host " "
Write-Host "[+] Information of new containers"
docker ps

Write-Host " "