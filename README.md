# tsp
Aplikasi Monitoring Gangguan menggunakan Codeigniter

Dibuat menggunakan framework Codeigniter dan template AdminLte

fitur yang ada :

1. Input problem, dilakukan oleh user (Supervisor, admin)
2. Staff IT bisa melakukan analisa di menu inprogress dan bila sudah resolved bisa langsung di closed
3. Pencarian table yang responsive menggunakan Datatables
4. Terdapat info untuk mengetahui total tiket new, inprogress, dan closed

note :
login Supervisor, 
menggunakan user, adhi
password,
menggunakan rahasia

login Staff IT,
menggunakan admin, manajer
password,
menggunakan rahasia

###############################
create file .htaccess dan simpan di folder paling luar
-------------------------------
copy paste skrip berikut dan simpan dengan nama .htaccess

#Server Zend Mulai ---------------------
#DirectoryIndex index.php
#RewriteEngine on
#RewriteBase /
#RewriteCond %{REQUEST_FILENAME} !-f
#RewriteCond %{REQUEST_FILENAME} !-d
#RewriteCond $1 !^(index\.php|robots\.txt)
#RewriteRule ^(.*)$ index.php?/$1 [L]
#Server Zend Selesai ---------------------

#Server Biasa Mulai ---------------------
RewriteEngine on
RewriteCond $1 !^(index\.php|robots\.txt)
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php?/$1 [L]
#Server Biasa Selesai ---------------------

###################################
