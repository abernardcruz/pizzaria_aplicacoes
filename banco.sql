drop database pizzaria;

create database pizzaria;

use pizzaria;

create table clientes(
	id int primary key auto_increment,
	nome varchar(30),
	email varchar(40),
	telefone varchar(15),
    sexo enum('M','F'),
    dtnasc date,
    logradouro varchar(30),
    numero int,
    complemento varchar(30),
    cidade varchar(20),
    uf varchar(2),
    cep varchar(30),
    pizza_id foreign key(pizza_id) references pizzas(id)
);

create table pizzas(
	id int primary key auto_increment,
	tipo varchar(30)
);