create database chepodb;
use chepodb;

CREATE TABLE IF NOT EXISTS `User`(
	id int(10) not null,
	firstname varchar(20),
	lastname varchar(20),
	username varchar(20),
	password varchar(50),
	primary key(id) 
);

insert into `User`(id,firstname,lastname,username,password) values 
(10,'Spongebob','Squarepants','spongey','gary'),
(11,'Squidward','Tenticles','squidy','clarinet'),
(12,'Patric','Star','Pat','rock'),
(13,'Sandy','Cheeks','squirrel','nuts');



CREATE TABLE IF NOT EXISTS Message(
	id int(10) not null,
	recipient_id int(10) not null,
	user_id varchar(20) not null,
	subject varchar(40) not null,
	`body` text not null,
	`date` varchar(10) ,
	primary key(id) 
);

insert into Message(id,recipient_id,user_id,subject,`date`,`body`) values
(20,'|11|12|13|',10,'December 3, 2008, 7:20 pm','Chepo MAIL','Hey  i discovered this cool mailing system, called chepo mail'),
(21,'|10|12|13|',11,'December 3, 2008, 7:24 pm','Chepo MAIL','Spongebob this is pretty cool, dont message me again'),
(22,'|11|10|13|',12,'December 3, 2008, 7:24 pm','Chepo MAIL','How does this thing work, spongebob are u trapped in this box computer thing'),
(23,'|11|12|10|',13,'December 3, 2008, 7:28 pm','Chepo MAIL','lol, I have been using this system to message my family back in Texas for months');


CREATE TABLE IF NOT EXISTS Message_read(
	id int (10) not null,
	message_id varchar(20) not null,
	reader_id varchar(20) not null,
	`date` varchar(10) not null,
	primary key(id) 
);

insert into Message_read (id,message_id,reader_id,`date`) values
(30,20,11,'December 3, 2008, 7:20 pm'),
(31,20,12,'December 3, 2008, 7:25 pm'),
(32,20,13,'December 3, 2008, 7:25 pm');
