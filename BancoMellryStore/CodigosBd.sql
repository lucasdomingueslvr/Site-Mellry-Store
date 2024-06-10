
CREATE TABLE tab_modaintima (
                id_modaintima BIGINT AUTO_INCREMENT NOT NULL,
                nomeproduto VARCHAR(50) NOT NULL,
                valor float NOT NULL,
                promocao float NOT NULL,
                tamanho VARCHAR(10) NOT NULL,
                imagem VARCHAR(255) NOT NULL,
                PRIMARY KEY (id_modaintima)
);


CREATE TABLE tab_shorts (
                id_shorts BIGINT AUTO_INCREMENT NOT NULL,
                valor float NOT NULL,
                promocao float NOT NULL,
                nomeproduto VARCHAR(50) NOT NULL,
                imagem VARCHAR(255) NOT NULL,
                tamanho VARCHAR(10) NOT NULL,
                PRIMARY KEY (id_shorts)
);


CREATE TABLE tab_camiseta (
                id_camiseta BIGINT AUTO_INCREMENT NOT NULL,
                nomeproduto VARCHAR(50) NOT NULL,
                valor float NOT NULL,
                promocao float NOT NULL,
                tamanho VARCHAR(10) NOT NULL,
                imagem VARCHAR(255) NOT NULL,
                PRIMARY KEY (id_camiseta)
);


CREATE TABLE tab_vestidos (
                id_vestidos BIGINT AUTO_INCREMENT NOT NULL,
                valor float NOT NULL,
                promocao float NOT NULL,
                nomeproduto VARCHAR(50) NOT NULL,
                tamanho VARCHAR(10) NOT NULL,
                imagem VARCHAR(255) NOT NULL,
                PRIMARY KEY (id_vestidos)
);


CREATE TABLE cadastro (
                id_cliente BIGINT AUTO_INCREMENT NOT NULL,
                nome CHAR(50) NOT NULL,
                dtnascimento DATE NOT NULL,
                email VARCHAR(50) NOT NULL,
                senha VARCHAR(50) NOT NULL,
                telefone VARCHAR(11) NOT NULL,
                PRIMARY KEY (id_cliente)
);


CREATE TABLE carrinho (
                id_carrinho BIGINT AUTO_INCREMENT NOT NULL,
                id_cliente BIGINT NOT NULL,
                nomeproduto VARCHAR(50) NOT NULL,
                valor float NOT NULL,
                promocao float NOT NULL,
                PRIMARY KEY (id_carrinho)
);


ALTER TABLE carrinho ADD CONSTRAINT cadastro_carrinho_fk
FOREIGN KEY (id_cliente)
REFERENCES cadastro (id_cliente)
ON DELETE NO ACTION
ON UPDATE NO ACTION;
