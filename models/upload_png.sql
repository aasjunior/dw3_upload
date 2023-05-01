create database upload_png
use upload_png

create table imagesPNG(
	id int(11) auto_increment not null,
    dir varchar(255) not null unique,
    primary key(id)
)