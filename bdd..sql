create database login0106;

use login0106;

create table tblusuarios(
id int primary key auto_increment,
usuario varchar(50) not null,
senha varchar(255) not null
);

insert into tblusuarios(usuario, senha)
values('Admin','0000');