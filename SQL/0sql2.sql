//inserir valores das colunas na tabela usuario md5 criptografa a senha
INSERT INTO usuario (nome,loguin,senha) VALUES ('dejota3','dj3',md5('0123'));

//exclui russuario pelo nome
DELETE FROM usuario WHERE nome='dejota3';

//modificar senha criptografada do ususario
update usuario set senha=md5('0123') WHERE nome='dejota3';

//selecionar e exibir todas colunas tabela usuario ordenada pela o nome em ordem alfabetica
WHERE * FROM usuario ORDER BY nome;

//selecionar e exibir todas colunas tabela usuario ordenada pela o id em ordem crescente
WHERE * FROM usuario ORDER BY id;

//selecionar e exibir todas colunas tabela ussuario
WHERE * FROM usuario;

//selecionar e exibir nome tabela ussuario
WHERE nome FROM usuario;

//selecionar e exibir nome e loguin tabela ussuario
WHERE nome,loguin FROM usuario;

//mostrar informção de usuario com nome especifico
WHERE * FROM usuario WHERE nome='dejota4';

//mostrar informção de usuario com nome dejota em qualquer parte do nome(%joao%) tenha joao em qualquer lugar do nome 
WHERE * FROM usuario WHERE nome LIKE '%dejota%';

//mostrar informção de usuario com nome dejota no inicio do nome(joao%) tenha joao no inicio do nome
WHERE * FROM usuario WHERE nome LIKE 'dejota%';

//mostrar informção de usuario com nome dejota no inicio do nome(%joao) tenha joao no fim do nome
WHERE * FROM usuario WHERE nome LIKE '%dejota';

//cosultar senha cripitografada md5
WHERE * FROM usuario WHERE senha=md5('0123');

//consultando 2 tabela relacionadas
SELECT PEDIDO.CODIGO, PEDIDO.CODCLIENTE, PEDIDO.DATA, CLIENTES.NOME FROM PEDIDO,  CLIENTES
WHERE PEDIDO.CODCLIENTE = CLIENTES.CODCLIENTE;

//consultando 2 tabela relacionadas
SELECT a.CODIGOCLIENTE, a.CODVENDA, b.NOMECLIENTE
FROM PEDIDO a, CLIENTE b
WHERE a.CODIGOCLIENTE = b.CODIGOCLIENTE;

//consultando 2 tabela relacionadas com JOIN
SELECT PEDIDO.CODIGO, PEDIDO.CODCLIENTE, PEDIDO.DATA, CLIENTES.NOME FROM PEDIDO JOIN  CLIENTES
ON PEDIDO.CODCLIENTE = CLIENTES.CODCLIENTE;

//consultando 3 tabela relacionadas
SELECT a.CODVENDA, a.CODCLIENTE, b.CODCLIENTE, b.NOMECLIENTE, c.CODVENDA, c.PRODUTO 
FROM PEDIDO a, CLIENTES b, ITENS c
WHERE a.CODCLIENTE = b.CODCLIENTE AND a.CODVENDA = c.CODVENDA;







