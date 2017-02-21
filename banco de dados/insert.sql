use biblioteca;

INSERT INTO aluno (alu_id, alu_nome, alu_email, alu_fone) VALUES
  (1,'Fulano de Tal','fulano@email.com.br','33445577'),
  (2,'Beltrano de Tal','beltrano@email.com.br','44556677'),
  (3,'Cicrano de Tal','cicrano@email.com.br','55667788'),
  (4,'Gil Jader','gil.jader@gmail.com','33445566');
COMMIT;



INSERT INTO assunto (ass_id, ass_nome) VALUES
  (1,'PHP'),
  (2,'MySQL'),
  (3,'HTML'),
  (4,'CSS'),
  (5,'JAVASCRIPT'),
  (6,'Banco de Dados');
COMMIT;

#
# Data for the livro table  (LIMIT 0,500)
#

INSERT INTO livro (liv_id, ass_id, liv_titulo, liv_autor, liv_data_lancamento, liv_quant_copias) VALUES
  (1,1,'Introdução ao PHP','Autor1','2012-08-09',6),
  (2,2,'O Software MySQL','Autor2','2013-08-14',4),
  (3,2,'Dominando PHP e MySQL','Autor3','2011-08-24',5),
  (4,3,'Curso de HTML5','Autor4','2013-08-22',7),
  (8,6,'Álgebra Relacional','Autor6','2014-04-28',15);
COMMIT;

#
# Data for the emprestimo table  (LIMIT 0,500)
#

INSERT INTO emprestimo (emp_id, liv_id, alu_id, emp_data_retirada, emp_data_prev_devolucao, emp_data_devolucao, emp_multa) VALUES
  (1,1,1,'2013-08-22','2013-08-27','2013-09-17',25.50),
  (2,2,1,'2016-08-23','2016-08-30','2016-08-30',0.00),
  (3,3,2,'2013-08-20','2013-08-27','2013-10-22',35.50);
COMMIT;

INSERT INTO usuario (user_id, user_login, user_senha) VALUES (1,'admin','admin');

SELECT * FROM livro INNER JOIN assunto ON livro.ass_id=assunto.ass_id;
SELECT * FROM usuario;

