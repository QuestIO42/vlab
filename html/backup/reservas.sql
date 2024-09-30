use mysql;
DROP USER 'reservas';
CREATE USER 'reservas' IDENTIFIED BY 'secret';
GRANT ALL ON *.* TO 'reservas'@'%';
flush privileges;