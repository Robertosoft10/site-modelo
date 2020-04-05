CREATE DATABASE agroproduto;
USE agroproduto;

CREATE TABLE usuarios(
usuarioId int not null auto_increment primary key,
usuario varchar(255),
email varchar(255),
senha varchar(255)
);

CREATE TABLE usuario_compras(
usuarioId int not null auto_increment primary key,
nome varchar(255),
email varchar(255),
senha varchar(255)
);
CREATE TABLE contato_msg(
mensagemId int not null auto_increment primary key,
nome varchar(255),
email varchar(255),
objetivo varchar(255),
mensagem varchar(900)
);

CREATE TABLE produtos(
produtoId int not null auto_increment primary key,
produto varchar(255),
codigo varchar(255),
preco varchar(255),
imagem varchar(255),
descricao varchar(900)
);

CREATE TABLE pedidos(
pedidoId int not null auto_increment primary key,
cliente_cod int,
produto_cod int,
qtdProduto varchar(30),
somaValor varchar(30),
foreign key (cliente_cod) references usuario_compras (usuarioId),
foreign key (produto_cod) references produtos (produtoId)
);

CREATE TABLE pagamentos(
pagamentoId int not null auto_increment primary key,
usuario int,
endereco varchar(500),
formaPag varchar(20),
parcelas varchar(30),
ncartao varchar(20),
cpf varchar(30),
foreign key (usuario) references pedidos (cliente_cod)
);
