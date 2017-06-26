CREATE TABLE account (acct_num INT, amount DECIMAL(10,2));
CREATE TRIGGER ins_sum BEFORE INSERT ON account FOR EACH ROW SET @sum = @sum + NEW.amount;

-- =============================

DELIMITER $$;
CREATE TRIGGER baixaDeEstoque
AFTER UPDATE ON pedidos
FOR EACH ROW
if NEW.status <=> OLD.status AND NEW.status = 'pago'
BEGIN
   UPDATE estoque
   INNER JOIN itens ON estoque.id = itens.tamanho
   SET quantidade = quantidade-1
   WHERE itens.pedido = NEW.id;
END$$
