

create table user
( user_id int not null AUTO_INCREMENT
, email varchar(30) not null
, pass varchar(30) not null
, token varchar(30)
, last_login date
, PRIMARY KEY ( user_id ));