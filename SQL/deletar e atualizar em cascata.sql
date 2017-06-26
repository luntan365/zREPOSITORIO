-- adicionar ao final da chave estrangeita 
--ON DELETE CASCADE ON UPDATE CASCADE

ALTER TABLE `12`
  ADD CONSTRAINT `fk_table1_has_table2_table1` FOREIGN KEY (`table1_id`) REFERENCES `table1` (`id`)ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_table1_has_table2_table21` FOREIGN KEY (`table2_id`) REFERENCES `table2` (`id`)ON DELETE CASCADE ON UPDATE CASCADE;

-