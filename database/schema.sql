create database pokemon default character set utf8 collate utf8_unicode_ci;
create user ash@localhost identified with mysql_native_password by 'Ketchup1.';
grant all on pokemon.* to ash@localhost;
flush privileges;