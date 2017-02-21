CREATE database biblioteca;
use biblioteca;
CREATE TABLE IF NOT EXISTS assunto(
	ass_id int NOT NULL PRIMARY KEY auto_increment,
    ass_nome varchar(50)
);

CREATE TABLE IF NOT EXISTS usuario (
	user_id int NOT NULL PRIMARY KEY ,
	user_login VARCHAR(30) NOT NULL,  
	user_senha VARCHAR(50) NOT NULL,
    user_nivel int(40) 

);

CREATE TABLE IF NOT EXISTS aluno(
	alu_id int NOT NULL PRIMARY KEY auto_increment, 
    alu_nome varchar(50),
	alu_email varchar(50),
	alu_fone int(30),
    user_id int NOT NULL,
    CONSTRAINT fk_usuario_aluno FOREIGN KEY (user_id) REFERENCES usuario(user_id)
);

CREATE TABLE IF NOT EXISTS livro(	
	liv_id int NOT NULL PRIMARY KEY auto_increment,
    liv_titulo varchar(50) NOT NULL,
    liv_autor varchar(40) NOT NULL,
	liv_data_lancamento timestamp,
    liv_quant_copias int(7),
    ass_id int NOT NULL,
    CONSTRAINT fk_assunto_livro FOREIGN KEY (ass_id) REFERENCES assunto(ass_id)
);


CREATE TABLE IF NOT EXISTS emprestimo(
	emp_id int NOT NULL PRIMARY KEY auto_increment,
    emp_data_retirada timestamp,
    emp_data_prev_devolucao timestamp,
    emp_data_devolucao timestamp,
	emp_multa float(5),
    liv_id int NOT NULL,
    alu_id int NOT NULL,
    CONSTRAINT fk_livro_emprestimo FOREIGN KEY (liv_id)
	REFERENCES livro(liv_id),
    CONSTRAINT fk_aluno_emprestimo FOREIGN KEY (alu_id) REFERENCES aluno(alu_id)
);

