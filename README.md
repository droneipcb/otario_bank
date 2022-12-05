# otario_bank, pequeno website para demonstrar vulnerabilidades em aplicações Web

autor: Osvaldo Santos, Instituto Politécnico de Castelo Branco


Instruções para instalar o website numa VM com Uubuntu 22

#update dos repositórios de software

sudo apt update


#parar o nginx, caso esteja ativo

sudo systemctl stop nginx


#instalar os diversos softwares

sudo apt install -y git mysql-server apache2 php libapache2-mod-php php-mysql


#ir para o documento root do apache

cd /var/www/html


#clonar o website a partir do git-hub

sudo git clone https://github.com/droneipcb/otario_bank.git


#ir para a pasta do website

cd /var/www/html/otario_bank


#abrir a consola do mysql

sudo mysql


#criar a base de dados a partir de um script

mysql> source create_database.sql

mysql> exit


#alterar as permissoes da pasta para os uploads

sudo chown -R www-data:www-data uploads


#arrancar o apache

sudo systemctl restart apache2


#e criar um shortcut no desktop

sudo ln -s /var/www/html/otario_bank ~/Desktop/

