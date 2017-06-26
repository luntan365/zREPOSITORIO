-- inserir dado na tabela
INSERT INTO usuario (nome, email) VALUES('Dejota', 'dejota@a.com');

-- alterar dado da tabela
UPDATE usuario SET nome = 'Dejota Stormrage' WHERE id=1;

-- apaga informação que tenha id 3
DELETE FROM ususario WHERE id = 3;

-- retorna dados os campos da tabela
SELECT * FROM usuario;

-- selecionar dados dos campos da tabela;
SELECT nome, email FROM usuario;

-- traz categorias sem campos repetidos
SELECT DISTINCT categoria FROM usuario;

-- em ordem alfabetica do nome
SELECT * FROM usuario ORDER BY nome

-- orderm decrescente
SELECT * FROM usuario ORDER BY nome DESC

-- OU
SELECT * FROM usuario WHERE id=1 OR nome='dejota';
-- AND
SELECT * FROM usuario WHERE id=1 AND nome='dejota';

-- traz parte da lista de 10 elementos iniciando do 6;
SELECT nome FROM usuario LIMIT 5, 10;

-- traz o MÉDIA de todos os salarios;
SELECT AVG(salario) FROM usuario;

-- traz o numero de elemento q tem nesse campo;
SELECT COUNT(nome) FROM usuario;

-- traz o total de todos os salarios acima de 1000 reais;
SELECT SUM(salario) FROM usuario WHERE salario > 1000;

-- traz o maior de todos os salarios;
SELECT MAX(salario) FROM usuario;

-- traz o menor de todos os salarios;
SELECT MIN(salario) FROM usuario;

-- GROUP BY : usado para separar por um valor em comum
-- acessoria a COUNT, SUM, AVG, MAX, MIN
-- traz o cargo e a média de salario dos funcionarios desse cargo;
SELECT cargo , AVG(salario) FROM funcionarios GROUP BY cargo;
-- traz a quantidade de funcionarios de  cada cargo;
SELECT cargo , COUNT(nome) FROM funcionarios GROUP BY cargo;

-- HAVING é específico para GROUP BY no lugar do WHERE
-- traz o cargo e a média de salario dos funcionarios desse cargo se a media for maior que 1000;
SELECT cargo , AVG(salario) FROM funcionarios GROUP BY cargo HAVING AVG(salario) > 1000;

-- AS adiciona um apelido ao campo da tabela
SELECT nome AS usuario, email AS contato FROM usuario;

-----------------------JOINS-----------------------------------
-- Inner Join - INTERSERÇÃO - o que tem de comum entre as duas tabelas
SELECT a.Nome, b.Nome FROM TabelaA as A INNER JOIN TabelaB as B on a.Nome = b.Nome;

-- Left Join - TUDO DE A + INTERSEÇÃO COM B
SELECT a.Nome, b.Nome FROM TabelaA as A LEFT JOIN TabelaB as B on a.Nome = b.Nome;

-- Right Join - TUDO DE B + INTERSEÇÃO COM A
SELECT a.Nome, b.Nome FROM TabelaA as A RIGHT JOIN TabelaB as B on a.Nome = b.Nome;

-- Outer  Join - Tudo A a B
SELECT a.Nome, b.Nome FROM TabelaA as A FULL OUTER JOIN TabelaB as B on a.Nome = b.Nome;

-- Left Excluding Join - tudo de A removendo a interseção com B
SELECT a.Nome, b.Nome FROM TabelaA as A LEFT JOIN TabelaB as B
on a.Nome = b.Nome WHERE b.Nome is null;

-- Right Excluding Join - tudo de B removendo a interseção com A
SELECT a.Nome, b.Nome FROM TabelaA as A RIGHT JOIN TabelaB as B
on a.Nome = b.Nome WHERE a.Nome is null;

-- Outer Excluding Join - tudo de A e B removendo a INTERSERÇÃO
SELECT a.Nome, b.Nome FROM TabelaA as A FULL OUTER JOIN TabelaB as B
on a.Nome = b.Nome WHERE a.Nome is null or b.Nome is null
