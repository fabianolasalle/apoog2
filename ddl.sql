CREATE TABLE endereco (
	id int unsigned auto_increment primary key,
	logradouro varchar(90),
	cidade varchar(50),
	estado varchar(30),
    uf char(2),
    bairro varchar(40),
    cep varchar(9),
    latitude float,
    longitude float    
);