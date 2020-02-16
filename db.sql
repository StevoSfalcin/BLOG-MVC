
--CRIA TABELA postagem
CREATE TABLE postagem(
    id INT(11) NOT NULL AUTO_INCREMENT,
    titulo VARCHAR(200) NOT NULL,
    conteudo TEXT NOT NULL,
    PRIMARY KEY (id)
) CHARSET=utf8;

--CRIANDO ALGUMAS POSTAGENS
INSERT INTO `postagem` (`id`,`titulo`,`conteudo`) VALUES 
(1,'Primeira Postagem','Conteudo da Primeira Postagem'),
(2,'Segunda Postagem','Conteudo da Segunda Postagem'),
(3,'Terceira Postagem','Terceira da Terceira Postagem');