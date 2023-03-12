
CREATE DATABASE coprecy;

USE coprecy;


CREATE TABLE usuario (
  email varchar(50) NOT NULL,
  senha varchar(100) NOT NULL,
  nome varchar(50) PRIMARY KEY NOT NULL,
  perfil varchar(10) DEFAULT "comum"
);

INSERT INTO usuario (email, senha, nome, perfil) VALUES
('coprecy@gmail.com', 'coprecy', 'coprecy', 'adm'),
('anonimo1@gmail.com', '123', 'anonimo1', 'comum'),
('anonimo2@gmail.com', '123', 'anonimo2', 'comum'),
('anonimo3@gmail.com', '123', 'anonimo3', 'comum');


CREATE TABLE forum (
  id int PRIMARY KEY AUTO_INCREMENT NOT NULL,
  titulo varchar(100),
  texto varchar(1000),
  usuario varchar(50),
  data date,
  hora time,
  FOREIGN KEY (usuario) REFERENCES usuario(nome)
  ON DELETE CASCADE
);

INSERT INTO forum (id, titulo, texto, usuario, data, hora) VALUES
(1, 'Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'anonimo1', '2022-10-23', '05:37:30'),
(2, 'Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'anonimo2', '2022-10-23', '05:38:31');

CREATE TABLE respostas (
  id int PRIMARY KEY AUTO_INCREMENT NOT NULL,
  texto varchar(1000),
  usuario varchar(50),
  data date,
  hora time,
  idforum int,
  FOREIGN KEY (usuario) REFERENCES usuario(nome),
  FOREIGN KEY (idforum) REFERENCES forum(id)
  ON DELETE CASCADE
);
