use FoodTracker

TEE /var/www/html/FoodTracker/resetDB.txt

DROP TABLE IF EXISTS 'user';

CREATE TABLE user
( user_id int not null AUTO_INCREMENT
, first_name varchar(30) not null
, middle_name varchar(30)
, last_name varchar(30) not null
, email varchar(30) not null unique
, pass varchar(30) not null
, token varchar(30)
, last_login date
, PRIMARY KEY ( user_id ));

insert into user 
( first_Name
, last_Name
, email
, pass
, token) 
values 
( 'Jared'
, 'Wadsworth'
, 'wad09007@byui.edu'
, 'password'
, 'aaaa');

NOTEE 