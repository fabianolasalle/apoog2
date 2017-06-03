CREATE TABLE endereco (
	id int unsigned auto_increment primary key,
	logradouro varchar(90),
	cidade varchar(50),
    numero varchar(5),
    complemento varchar(10),
	estado varchar(30),
    uf char(2),
    bairro varchar(40),
    cep varchar(9),
    latitude float,
    longitude float    
);


CREATE TABLE cliente(
	id int unsigned auto_increment primary key,
    id_endereco int unsigned not null,
    data_nascimento date,
    sexo tinyint(1) not null, 
    nome varchar(40) not null,
    cpf char(11),
	telefone varchar(12),
	data_criacao date not null,
    constraint foreign key (id_endereco) references endereco (id)
);

CREATE TABLE item(
	id int unsigned auto_increment primary key,
	codigo varchar(4),
    descricao varchar(40) not null,
    valor float not null,
    excluido tinyint(1) not null default 0
);


CREATE TABLE pedido(
	id int unsigned auto_increment primary key,
    codigo varchar(10),
    data_hora_pedido datetime not null,
    data_hora_entrega datetime not null,
    id_cliente int unsigned,
    id_usuario int unsigned,
    total float unsigned not null,
    constraint foreign key (id_cliente) references cliente (id)
);


CREATE TABLE pedido_item (
	id int unsigned auto_increment primary key,
    id_pedido int unsigned,
    id_item int unsigned,
    constraint foreign key (id_pedido) references pedido (id),
    constraint foreign key (id_item) references item (id)
);

CREATE TABLE usuario (
	id int unsigned auto_increment primary key,
	usuario varchar(20),
    senha varchar(64),
    nivel_acesso int,
    excluido tinyint(1) not null default 0
);


-- DML
insert into item (codigo, descricao, valor) values ("X0001", "Xis Salada", 14.90);
insert into item (codigo, descricao, valor) values ("X0002", "Xis Frango", 16.90);
insert into item (codigo, descricao, valor) values ("X0003", "Xis Bacon", 22.90);
insert into item (codigo, descricao, valor) values ("X0004", "Xis Mega Tudo", 27.90);
insert into item (codigo, descricao, valor) values ("H0001", "Hamburguer Gourmet", 18.90);
insert into item (codigo, descricao, valor) values ("HV001", "Hamburguer Vegetariano", 25.90);
insert into item (codigo, descricao, valor) values ("P0001", "Pizza Calabresa", 18.90);
insert into item (codigo, descricao, valor) values ("P0002", "Pizza Frango", 18.90);
insert into item (codigo, descricao, valor) values ("P0003", "Pizza Lombo Canadense", 18.90);