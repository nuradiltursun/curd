create database students;
 use students;

 create table person(
     id int(11) auto_increment primary key,
     name varchar(30) not null,
     email varchar(30) not null
 );

 SELECT * FROM person;
 DELETE FROM person WHERE id=:id
 INSERT INTO person (username,email) VALUES(:username,:email)