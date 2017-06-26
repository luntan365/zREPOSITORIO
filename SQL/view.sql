-- usando view
SELECT campos FROM nome_view

-- criando a view
CREATE VIEW nome_view
AS SELECT colunas
FROM tabela
WHERE condicao

-- alterar view
ALTER VIEW nome_view
AS SELECT colunas
FROM tabela
WHERE condicao

-- excluir view
DROP VIEW nome_view

-- exemplos
CREATE TABLE tabela (quantidade INT, preco INT);
INSERT INTO tabela VALUES(3, 50);
CREATE VIEW visao AS SELECT quantidade, preco, quantidade*preco AS total FROM tabela;
SELECT * FROM visao;
