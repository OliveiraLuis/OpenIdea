-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 04/12/2016 às 12:13
-- Versão do servidor: 5.7.16-0ubuntu0.16.04.1
-- Versão do PHP: 7.0.13-1+deb.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `openidea`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `Arquivos`
--

CREATE TABLE `Arquivos` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `endereco` varchar(45) NOT NULL,
  `projeto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `Arquivos`
--

INSERT INTO `Arquivos` (`id`, `nome`, `endereco`, `projeto_id`) VALUES
(1, 'index', 'arquivos/index.php', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `avaliacaoIdeia`
--

CREATE TABLE `avaliacaoIdeia` (
  `id` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `avaliacao` varchar(100) NOT NULL,
  `ideia_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `avaliacaoIdeia`
--

INSERT INTO `avaliacaoIdeia` (`id`, `valor`, `avaliacao`, `ideia_id`, `usuario_id`) VALUES
(1, 8, 'legal', 2, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `avaliacaoProjeto`
--

CREATE TABLE `avaliacaoProjeto` (
  `id` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `avaliacao` varchar(100) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `projeto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `avaliacaoProjeto`
--

INSERT INTO `avaliacaoProjeto` (`id`, `valor`, `avaliacao`, `usuario_id`, `projeto_id`) VALUES
(1, 10, 'muito bom', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoriaIdeia`
--

CREATE TABLE `categoriaIdeia` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `categoriaIdeia`
--

INSERT INTO `categoriaIdeia` (`id`, `nome`, `descricao`) VALUES
(1, 'categoria_de_ideia1', 'categoria para as ideias de teste'),
(2, 'categoria_de_ideia2', 'categoria para as ideias de teste');

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoriaProjeto`
--

CREATE TABLE `categoriaProjeto` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `categoriaProjeto`
--

INSERT INTO `categoriaProjeto` (`id`, `nome`, `descricao`) VALUES
(1, 'categoria-de-projeto1', 'categoria de teste'),
(2, 'categoria-de-projeto2', 'categoria de teste2');

-- --------------------------------------------------------

--
-- Estrutura para tabela `ideia`
--

CREATE TABLE `ideia` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `imagem` varchar(45) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `ideia`
--

INSERT INTO `ideia` (`id`, `nome`, `descricao`, `imagem`, `usuario_id`) VALUES
(1, 'ideiaa001', 'ideia para teste do sistema', 'imagens/Open-thinking-01.png', 1),
(2, 'ideia002', 'ideia de testes', 'im', 1),
(3, 'idea de teste', 'ideia para testar php', '../imagens/padrao.png', 1),
(4, 'popopo', 'ashdiuashd', '../imagens/padrao.png', 1),
(6, 'iDEIA FANTASTICA', 'essa ideia vai revolucionar o mundo', '../imagens/padrao.png', 2),
(7, 'mafuuba', 'poderzao para prender os inimigos no potinho', '../imagens/padrao.png', 2),
(9, 'kamehameha', 'poderzao loco', '../imagens/padrao.png', 14),
(10, 'final flash', 'vegeta faz', '../imagens/padrao.png', 14);

-- --------------------------------------------------------

--
-- Estrutura para tabela `ideia_has_categoriaIdeia`
--

CREATE TABLE `ideia_has_categoriaIdeia` (
  `ideia_id` int(11) NOT NULL,
  `categoriaIdeia_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `ideia_has_categoriaIdeia`
--

INSERT INTO `ideia_has_categoriaIdeia` (`ideia_id`, `categoriaIdeia_id`) VALUES
(2, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `projeto`
--

CREATE TABLE `projeto` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `readme` varchar(200) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `imagem` varchar(45) NOT NULL,
  `ideia_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `projeto`
--

INSERT INTO `projeto` (`id`, `nome`, `readme`, `usuario_id`, `imagem`, `ideia_id`) VALUES
(1, 'projeto001', 'arquivos/readme_projeto001.txt', 1, 'im', 1),
(5, 'projeto de teste', 'loren ipsilunera', 1, '../imagens/padrao.png', 1),
(6, 'luis project', 'paode batata', 2, '../imagens/padrao.png', 4),
(8, 'ProjetÃ£o', 'esse projeto vai projetar tudo ', 2, '../imagens/padrao.png', 4),
(11, 'essa eu faÃ§o', 'aksjdhkashdkajshd', 2, '../imagens/padrao.png', 1),
(13, 'locura', 'askjdaksjhd', 10, '../imagens/padrao.png', 4),
(14, 'como voar', 'asdajsdhk', 14, '../imagens/padrao.png', 7),
(16, 'tem que ser kamehameha', 'aisudha', 14, '../imagens/padrao.png', 2),
(17, 'kame', 'askjd', 14, '../imagens/padrao.png', 10),
(18, 'kamehame', 'haaa', 14, '../imagens/padrao.png', 9);

-- --------------------------------------------------------

--
-- Estrutura para tabela `projeto_has_categoriaProjeto`
--

CREATE TABLE `projeto_has_categoriaProjeto` (
  `projeto_id` int(11) NOT NULL,
  `categoriaProjeto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `projeto_has_categoriaProjeto`
--

INSERT INTO `projeto_has_categoriaProjeto` (`projeto_id`, `categoriaProjeto_id`) VALUES
(1, 1),
(5, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `login` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `facebook` varchar(45) DEFAULT NULL,
  `tweeter` varchar(45) DEFAULT NULL,
  `github` varchar(45) DEFAULT NULL,
  `imagem` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `login`, `senha`, `facebook`, `tweeter`, `github`, `imagem`) VALUES
(1, 'LUIS', 'oliveira1eduardo2luis3@gmail.com', 'luis123', 'luis123', NULL, NULL, NULL, 'imagens/Open-thinking-01.png'),
(2, 'luisao', 'oluis@gmail.com', 'root', '9eeab2d354a57c6122ac81af518be2b0', 'luis:aaak', 'pum', 'kakaka', '../imagens/padrao.png'),
(3, 'Luis', 'luis@@', 'l', '2db95e8e1a9267b7a1188556b2013b33', NULL, NULL, NULL, '../imagens/padrao.png'),
(4, '', '', 'root', 'a5e3d74b694da6deea9f7a796150c354', NULL, NULL, NULL, '../imagens/padrao.png'),
(5, 'luisao', 'luisao', 'luisao', '39c845d112994bb4fe6334ccefc81b42', NULL, NULL, NULL, '../imagens/padrao.png'),
(6, 'Trator da silva', 'Ts@hh.com', 'ttes', '502ff82f7f1f8218dd41201fe4353687', NULL, NULL, NULL, '../imagens/padrao.png'),
(7, 'lucas', 'lucas', 'lucas', 'dc53fc4f621c80bdc2fa0329a6123708', NULL, NULL, NULL, '../imagens/padrao.png'),
(8, 'asadh', 'kjh', 'kkj', 'fa5561a91ea0fdfd85354d389306da82', NULL, NULL, NULL, '../imagens/padrao.png'),
(9, 'asadh', 'kjh', 'kkj', 'fa5561a91ea0fdfd85354d389306da82', NULL, NULL, NULL, '../imagens/padrao.png'),
(10, 'alah', 'lalala', 'loco', '4c193eb3ec2ce5f02b29eba38621bea1', NULL, NULL, NULL, '../imagens/padrao.png'),
(11, 'alah', 'lalala', 'tiraa', 'a45c4ef1b3932641ea48adb8cf26bbdc', NULL, NULL, NULL, '../imagens/padrao.png'),
(12, 'alah', 'lalala', 'tiraa', 'a45c4ef1b3932641ea48adb8cf26bbdc', NULL, NULL, NULL, '../imagens/padrao.png'),
(13, 'alah', 'lalala', 'tiraa', 'a45c4ef1b3932641ea48adb8cf26bbdc', NULL, NULL, NULL, '../imagens/padrao.png'),
(14, 'Luis Eduardo Oliveira', 'oliveira1eduardo2luis3@gmail.com', 'luis', '502ff82f7f1f8218dd41201fe4353687', NULL, NULL, NULL, '../imagens/padrao.png');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `Arquivos`
--
ALTER TABLE `Arquivos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Arquivos_projeto1_idx` (`projeto_id`);

--
-- Índices de tabela `avaliacaoIdeia`
--
ALTER TABLE `avaliacaoIdeia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_avaliacao_ideia1_idx` (`ideia_id`),
  ADD KEY `fk_avaliacao_usuario1_idx` (`usuario_id`);

--
-- Índices de tabela `avaliacaoProjeto`
--
ALTER TABLE `avaliacaoProjeto`
  ADD PRIMARY KEY (`id`,`avaliacao`),
  ADD KEY `fk_avaliacaoProjeto_usuario1_idx` (`usuario_id`),
  ADD KEY `fk_avaliacaoProjeto_projeto1_idx` (`projeto_id`);

--
-- Índices de tabela `categoriaIdeia`
--
ALTER TABLE `categoriaIdeia`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `categoriaProjeto`
--
ALTER TABLE `categoriaProjeto`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `ideia`
--
ALTER TABLE `ideia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ideia_usuario1_idx` (`usuario_id`);

--
-- Índices de tabela `ideia_has_categoriaIdeia`
--
ALTER TABLE `ideia_has_categoriaIdeia`
  ADD PRIMARY KEY (`ideia_id`,`categoriaIdeia_id`),
  ADD KEY `fk_ideia_has_categoriaIdeia_categoriaIdeia1_idx` (`categoriaIdeia_id`),
  ADD KEY `fk_ideia_has_categoriaIdeia_ideia1_idx` (`ideia_id`);

--
-- Índices de tabela `projeto`
--
ALTER TABLE `projeto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_projeto_usuario1_idx` (`usuario_id`),
  ADD KEY `fk_projeto_ideia1_idx` (`ideia_id`);

--
-- Índices de tabela `projeto_has_categoriaProjeto`
--
ALTER TABLE `projeto_has_categoriaProjeto`
  ADD PRIMARY KEY (`projeto_id`,`categoriaProjeto_id`),
  ADD KEY `fk_projeto_has_categoriaProjeto_categoriaProjeto1_idx` (`categoriaProjeto_id`),
  ADD KEY `fk_projeto_has_categoriaProjeto_projeto1_idx` (`projeto_id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `Arquivos`
--
ALTER TABLE `Arquivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de tabela `avaliacaoIdeia`
--
ALTER TABLE `avaliacaoIdeia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de tabela `avaliacaoProjeto`
--
ALTER TABLE `avaliacaoProjeto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de tabela `categoriaIdeia`
--
ALTER TABLE `categoriaIdeia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de tabela `categoriaProjeto`
--
ALTER TABLE `categoriaProjeto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de tabela `ideia`
--
ALTER TABLE `ideia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de tabela `projeto`
--
ALTER TABLE `projeto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `Arquivos`
--
ALTER TABLE `Arquivos`
  ADD CONSTRAINT `fk_Arquivos_projeto1` FOREIGN KEY (`projeto_id`) REFERENCES `projeto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `avaliacaoIdeia`
--
ALTER TABLE `avaliacaoIdeia`
  ADD CONSTRAINT `fk_avaliacao_ideia1` FOREIGN KEY (`ideia_id`) REFERENCES `ideia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_avaliacao_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `avaliacaoProjeto`
--
ALTER TABLE `avaliacaoProjeto`
  ADD CONSTRAINT `fk_avaliacaoProjeto_projeto1` FOREIGN KEY (`projeto_id`) REFERENCES `projeto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_avaliacaoProjeto_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `ideia`
--
ALTER TABLE `ideia`
  ADD CONSTRAINT `fk_ideia_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `ideia_has_categoriaIdeia`
--
ALTER TABLE `ideia_has_categoriaIdeia`
  ADD CONSTRAINT `fk_ideia_has_categoriaIdeia_categoriaIdeia1` FOREIGN KEY (`categoriaIdeia_id`) REFERENCES `categoriaIdeia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ideia_has_categoriaIdeia_ideia1` FOREIGN KEY (`ideia_id`) REFERENCES `ideia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `projeto`
--
ALTER TABLE `projeto`
  ADD CONSTRAINT `fk_projeto_ideia1` FOREIGN KEY (`ideia_id`) REFERENCES `ideia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_projeto_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `projeto_has_categoriaProjeto`
--
ALTER TABLE `projeto_has_categoriaProjeto`
  ADD CONSTRAINT `fk_projeto_has_categoriaProjeto_categoriaProjeto1` FOREIGN KEY (`categoriaProjeto_id`) REFERENCES `categoriaProjeto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_projeto_has_categoriaProjeto_projeto1` FOREIGN KEY (`projeto_id`) REFERENCES `projeto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
