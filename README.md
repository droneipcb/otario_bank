# injection_tests
Pequeno website para demonstrar como funciona a injeção de SQL

Para criar este cenário em Ubuntu 22, correr os seguintes comandos:

sudo systemctl stop nginx

sudo apt install -y apache2 php libapache2-mod-php php-sqlite3 sqlite3

cd /var/www/html

sudo git clone https://github.com/droneipcb/injection_tests.git

sudo systemctl restart apache2

sudo ln -s /var/www/html/injection_tests ~/Desktop/

