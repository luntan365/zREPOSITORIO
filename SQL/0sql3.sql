--  permitir senha acima de 18
CREATE TABLE Persons (
    ID int NOT NULL,
    LastName varchar(255) NOT NULL,
    FirstName varchar(255),
    Age int,
    CHECK (Age>=18)
);

--  Traz procutos com preço entre 10 e 12
SELECT * FROM Produtos WHERE preco BETWEEN 10 AND 12;


-- O operador ANY retorna verdadeiro se qualquer um dos valores subconsulta satisfazem a condição.
--  A seguinte instrução SQL retorna TRUE e lista as ProductNames se encontra todos os registros na tabela de OrderDetails essa quantidade> 99:
SELECT ProductName
FROM Products
WHERE ProductID = ANY (SELECT ProductID FROM OrderDetails WHERE Quantity > 99);

-- O operador ALL retorna true se todos os valores subconsulta satisfazem a condição.
-- A seguinte instrução SQL retorna TRUE e lista as ProductNames Se todos os registros na tabela OrderDetails tem quantidade = 10:
SELECT ProductName
FROM Products
WHERE ProductID = ALL (SELECT ProductID FROM OrderDetails WHERE Quantity = 10);
