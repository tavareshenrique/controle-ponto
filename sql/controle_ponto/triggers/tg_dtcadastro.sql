CREATE TRIGGER tg_dtcadastro BEFORE INSERT
ON usuario
FOR EACH ROW
SET new.data_cadastro = now();