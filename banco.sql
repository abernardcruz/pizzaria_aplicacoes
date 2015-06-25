drop database pizzaria;

create database pizzaria;

use pizzaria;

create table clientes(
	id int primary key auto_increment,
	nome varchar(30),
	email varchar(40),
    senha varchar(8),
	telefone varchar(15),
    sexo enum('M','F'),
    dtnasc date,
    logradouro varchar(30),
    numero int,
    complemento varchar(30),
    cidade varchar(20),
    uf varchar(2),
    cep varchar(30)
);

create table pizzas(
	id int primary key auto_increment,
	name varchar(30),
    descricao varchar(100),
    url varchar(3000),
    valor_pequena float, 
    valor_media float,
    valor_grande float,
    valor_familia float
);

create table pedidos(
    id int primary key auto_increment,
    cliente_id int,
    foreign key(cliente_id) references clientes(id),
    status enum('cancel','pending','delivering','finished')
);

create table pedidos_pizzas(
    id int primary key auto_increment,
    pizza_id int,
    pedido_id int,
    foreign key(pizza_id) references pizzas(id),
    foreign key(pedido_id) references pedidos(id)
);

insert into clientes (nome, email, senha, telefone, sexo, dtnasc, logradouro, numero, complemento, cidade, uf, cep) values ('Alexander', 'alexanderbernard93@gmail.com', '12345678', '(21) 99898-7003', 'M', '2015-05-08', 'Avenida Lucio Costa', 101, 'apartamento', 'Rio de Janeiro', 'RJ', '22740-111');
insert into clientes (nome, email, senha, telefone, sexo, dtnasc, logradouro, numero, complemento, cidade, uf, cep) values ('Andre', 'andre@gmail.com', '12345678', '(21) 99897-7003', 'M', '2015-06-23', 'Rua monsenhor Marques', 135, 'apartamento', 'Rio de Janeiro', 'RJ', '22740-260');

insert into pizzas (name, descricao, url, valor_pequena, valor_media, valor_grande, valor_familia) values ('cheddar', 'Cheddar, cebola ao shoyu e carne moída especial', 'static/img/pizzas/cheddar.png', 34.4, 40, 49.8, 55.7);
insert into pizzas (name, descricao, url, valor_pequena, valor_media, valor_grande, valor_familia) values ('Mussarela', 'Mussarela especial, tomates frescos e azeitona preta portuguesa', 'static/img/pizzas/mussarela.png', 32.4, 38, 53, 52.7);
insert into pizzas (name, descricao, url, valor_pequena, valor_media, valor_grande, valor_familia) values ('Tradicional', 'Catupiry, mussarela especial e provolone', 'static/img/pizzas/tradicional.png', 34.4, 40, 49.8, 55.7);