DROP database IF EXISTS barbearia;


CREATE TABLE tb_cidades (
    codcid int PRIMARY KEY AUTO_INCREMENT,
    nomecid varchar(50),
    estadocid varchar(2) check (estadocid IN ('AC','AL','AP','AM','BA','CE','DF','ES','GO','MA','MT','MS','MG','PA','PB','PR','PE','PI','RR','RO','RJ','RN','RS','SC','SP','SE','TO'))
);


CREATE TABLE tb_clientes (
    codcli int PRIMARY KEY AUTO_INCREMENT,
    nome varchar(120),
    email varchar(120),
    senha varchar(32) ZEROFILL,
    telefone bigint(11) ,
    ativo varchar(1) check(ativo in ('S','N')),
    tipo_cadastro varchar(1) check(tipo_cadastro in ('F','C')),
    codcid_fk int,
    FOREIGN KEY (codcid_fk) REFERENCES tb_cidades(codcid)
);


CREATE TABLE tb_servicos (
    codservico int PRIMARY KEY AUTO_INCREMENT,
    nome varchar(120),
    ativo varchar(1) DEFAULT 'S' check(ativo in ('S','N')),
    valor float(5,2)
);


CREATE TABLE tb_profissionais (
    codprof int PRIMARY KEY AUTO_INCREMENT,
    nome varchar(120),
    email varchar(120),
    telefone bigint(11) ZEROFILL,
    senha varchar(32),
    ativo varchar(1) DEFAULT 'S' check(ativo in ('S','N')),
    ck_cadastro varchar(1) DEFAULT 'F' check(ck_cadastro in ('F', 'A'))
);


CREATE TABLE tb_agendas (
    codaage int PRIMARY KEY AUTO_INCREMENT,
    hora time,
    datan date,
    codprof_fk int,
    codservico_fk int,
    codcli_fk int,
    FOREIGN KEY (codprof_fk) REFERENCES tb_profissionais(codprof),
    FOREIGN KEY (codservico_fk) REFERENCES tb_servicos(codservico),
    FOREIGN KEY (codcli_fk) REFERENCES tb_clientes(codcli)
);




CREATE TABLE tb_profissionais_servicos (
    valor float(5,2),
    codprof_fk int,
    codservico_fk int,
    PRIMARY KEY (codprof_fk, codservico_fk),
    FOREIGN KEY (codprof_fk) REFERENCES tb_profissionais(codprof),
    FOREIGN KEY (codservico_fk) REFERENCES tb_servicos(codservico)
);




CREATE TABLE tb_horarios (
    codhorario int PRIMARY KEY AUTO_INCREMENT,
    entradam date,
    saidam date,
    entradat date,
    saidat date,
    saidan date,
    entradan date,
    codprof_fk int,
    FOREIGN KEY (codprof_fk) REFERENCES tb_profissionais(codprof)
);






INSERT INTO tb_cidades (codcid, nome, estado) VALUES
INSERT INTO tb_cidades (codcid, nome, estado) VALUES
(2853, 'Cascavel', 'PR');commit;




INSERT INTO tb_clientes (codcli, nome, email, senha, telefone, ativo, tipo_cadastro) VALUES
(1,'thiago', 'arombado@gmail.com', '1', '45984326950', 'S', 'C');commit;




INSERT INTO tb_profissionais (codprof, nome, email, senha, telefone, ativo, ck_cadastro) VALUES
(1,'thiago mafra', 'thiago@gmail.com', 'videogame12', '45984326950', 'S', 'A');commit;




INSERT INTO tb_servicos (codservico, nome, valor, ativo) VALUES
(1,'coerte e cabelo', '20,00', 'S');commit;




INSERT INTO tb_servicos (codservico, nome, valor, ativo) VALUES
(2,'discoloração e cabelo', '120,00', 'S');commit;




INSERT INTO tb_servicos (codservico, nome, valor, ativo) VALUES
(3,'sombrancelha', '30,00', 'S');commit;




INSERT INTO tb_servicos (codservico, nome, valor, ativo) VALUES
(4,'navalha zero', '10,00', 'S');commit;




INSERT INTO tb_servicos (codservico, nome, valor, ativo) VALUES
(5,'corte de barba', '19,00', 'S');commit








INSERT INTO tb_horarios (codhorario, entradam, entradat, saidam, saidat) VALUES
(1,'06:00:00', '12:00:00', '13:00:00', '18:00:00');commit;




INSERT INTO tb_horarios (codhorario, entradam, entradat, saidam, saidat) VALUES
(2,'06:00:00', '12:00:00', '13:00:00', '18:00:00');commit;




INSERT INTO tb_horarios (codhorario, entradam, entradat, saidam, saidat) VALUES
(3,'06:00:00', '12:00:00', '13:00:00', '18:00:00');commit;




INSERT INTO tb_horarios (codhorario, entradam, entradat, saidam, saidat) VALUES
(4,'06:00:00', '12:00:00', '13:00:00', '18:00:00');commit;




INSERT INTO tb_horarios (codhorario, entradam, entradat, saidam, saidat) VALUES
(5,'06:00:00', '12:00:00', '13:00:00', '18:00:00');commit;



   


