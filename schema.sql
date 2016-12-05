create database Cheapo;
use Cheapo;



/*======================= CREATING TABLES ===================================================*/

CREATE TABLE User (
   id int auto_increment not null,
   first_name VARCHAR(32),
   last_name VARCHAR(32),
   username VARCHAR(32),
   password VARCHAR(64),
   PRIMARY KEY(id)
 );
 

CREATE TABLE Message (
    id int auto_increment not null,
    recipient_ids int,
    user_id int,
    subject VARCHAR(32),
    body VARCHAR(400),
    date_sent timestamp,
    PRIMARY KEY(id)
  );

CREATE TABLE IF NOT EXISTS Message_read(
	id int (10) not null,
	message_id varchar(20) not null,
	reader_id varchar(20) not null,
	date_read timestamp, not null,
	primary key(id) 
);

  
