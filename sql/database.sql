create database if not exists mybooks character set utf8 collate utf8_unicode_ci;
use mybooks;

grant all privileges on mybooks.* to 'mybooks_user'@'localhost' identified by 'secret';

-- Hi everyone, after complaining about the creation of a new user with all the privileges on this table, i've
-- choose to use "root" "" during this exercice in my database, that's just my vision of développement, of course,
-- i higly recommend to use a separate user during the production phase in order to secure the database.

