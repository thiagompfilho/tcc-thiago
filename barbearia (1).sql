-- Tabela de cidades
CREATE TABLE tb_cidades (
    codcid int PRIMARY KEY AUTO_INCREMENT, -- ID único da cidade
    nomecid varchar(50), -- Nome da cidade
    estadocid varchar(2) check (estadocid IN ('AC','AL','AP','AM','BA','CE','DF','ES','GO','MA','MT','MS','MG','PA','PB','PR','PE','PI','RR','RO','RJ','RN','RS','SC','SP','SE','TO')) -- Estado da cidade (com validação)
);

-- Tabela de clientes
CREATE TABLE tb_clientes (
    codcli int PRIMARY KEY AUTO_INCREMENT, -- ID único do cliente
    nome varchar(120), -- Nome do cliente
    email varchar(120), -- Endereço de e-mail do cliente
    senha varchar(32), -- Senha do cliente
    telefone bigint(11)ZEROFILL, -- Número de telefone do cliente (com preenchimento com zeros)
    ativo varchar(1) check(ativo in ('S','N')), -- Ativo ou inativo (com validação)
    codcid_fk int, -- Chave estrangeira que se relaciona com a tabela de cidades
    FOREIGN KEY (codcid_fk) REFERENCES tb_cidades(codcid) -- Chave estrangeira
);

-- Tabela de serviços
CREATE TABLE tb_servicos (
    codservico int PRIMARY KEY AUTO_INCREMENT, -- ID único do serviço
    nome varchar(120), -- Nome do serviço
    ativo varchar(1) DEFAULT 'S' check(ativo in ('S','N')), -- Ativo ou inativo (com valor padrão e validação)
    valor float(5,2) -- Valor do serviço
);

-- Tabela de profissionais
CREATE TABLE tb_profissionais (
    codprof int PRIMARY KEY AUTO_INCREMENT, -- ID único do profissional
    nome varchar(120), -- Nome do profissional
    email varchar(120), -- Endereço de e-mail do profissional
    telefone bigint(11) ZEROFILL, -- Número de telefone do profissional (com preenchimento com zeros)
    senha varchar(32), -- Senha do profissional
    ativo varchar(1) DEFAULT 'S' check(ativo in ('S','N')), -- Ativo ou inativo (com valor padrão e validação)
    ck_cadastro varchar(1) DEFAULT 'F' check(ck_cadastro in ('F', 'A')) -- Verificação do estado do cadastro (com valor padrão e validação)
);

-- Tabela de agendas
CREATE TABLE tb_agendas (
    codaage int PRIMARY KEY AUTO_INCREMENT, -- ID único da agenda
    hora time, -- Hora da agenda
    datan date, -- Data da agenda
    statu varchar(1) DEFAULT 'A' check(statu in ('A', 'M')), -- Correção na cláusula check
    codprof_fk int, -- Chave estrangeira que se relaciona com a tabela de profissionais
    codservico_fk int, -- Chave estrangeira que se relaciona com a tabela de serviços
	diai date,
    diaf date,
    FOREIGN KEY (codprof_fk) REFERENCES tb_profissionais(codprof), -- Chave estrangeira para profissionais
    FOREIGN KEY (codservico_fk) REFERENCES tb_servicos(codservico) -- Chave estrangeira para serviços


);

-- Tabela de associação entre profissionais e serviços
CREATE TABLE tb_profissionais_servicos (
    valor float(5,2), -- Valor do serviço oferecido pelo profissional
    codprof_fk int, -- Chave estrangeira que se relaciona com a tabela de profissionais
    codservico_fk int, -- Chave estrangeira que se relaciona com a tabela de serviços
    PRIMARY KEY (codprof_fk, codservico_fk), -- Chave primária composta
    FOREIGN KEY (codprof_fk) REFERENCES tb_profissionais(codprof), -- Chave estrangeira para profissionais
    FOREIGN KEY (codservico_fk) REFERENCES tb_servicos(codservico) -- Chave estrangeira para serviços
);

-- Tabela de horários
CREATE TABLE tb_horarios (
    codhorario int PRIMARY KEY AUTO_INCREMENT, -- ID único do horário
    entradam date, -- Data de entrada da jornada de trabalho
    saidam date, -- Data de saída da jornada de trabalho
    entradat date, -- Data de entrada da jornada de trabalho (tarde)
    saidat date, -- Data de saída da jornada de trabalho (tarde)
       codprof_fk int, -- Chave estrangeira que se relaciona com a tabela de profissionais
    FOREIGN KEY (codprof_fk) REFERENCES tb_profissionais(codprof) -- Chave estrangeira para profissionais
);