-- NOME DO BANCO CLASSE

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL PRIMARY KEY,
  `nome` varchar(255) CHARACTER SET utf8 NOT NULL,
  `login` varchar(15) CHARACTER SET utf8 NOT NULL,
  `senha` varchar(15) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) DEFAULT '1'
);

