# Gunakan image PHP resmi dengan Apache
FROM php:8.2-apache

# Salin semua file ke dalam direktori Apache
COPY . /var/www/html/

# Aktifkan modul mod_rewrite (buat .htaccess bisa jalan)
RUN a2enmod rewrite

# Atur direktori kerja
WORKDIR /var/www/html

# Set permission folder (opsional)
RUN chown -R www-data:www-data /var/www/html

# Expose port 80
EXPOSE 80
