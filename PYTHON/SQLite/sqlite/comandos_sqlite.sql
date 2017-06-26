--deletar tabela
drop table agenda();

--criar tabela
create table agenda(
id integer primary key autoincrement not null, --chave primaria
nome text, --tipo generico texto
email text unique, --campo unico
imagem blob --seuqencia longa de binarios
);

create table contato(
id integer primary key autoincrement not null,
numero text,
agenda_id integer not null,
foreign key (agenda_id) references agenda(id)
on delete cascade on update cascade
);

--renomera tabela
alter table nome rename to novo_nome;

--add coluna na tabela
alter table nome add column nova_coluna int not null;

--selecionando primeiros 3 registos
select * from agenda limit 3;

--select entre duas tabelas
select nome,numero from agenda, contato where agenda.id=contato.agenda_id;

--inserindo dados coluna
insert into agenda (nome, email) values ('dejota', 'a@a.com');

--alterando dados com seguraça
update agenda set nome='taynan' where id=1 limit 1

--excluindo com segurança
delete from agenda where id=5 limit 1