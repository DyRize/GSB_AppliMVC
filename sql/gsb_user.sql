CREATE USER userGsb'@'localhost' IDENTIFIED BY 'secret';

GRANT SHOW DATABASES ON *.* TO 'userGsb'@'localhost';

GRANT ALL PRIVILEGES ON `gsb_frais`.* TO 'userGsb'@'localhost';