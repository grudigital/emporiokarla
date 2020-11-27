-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Nov-2020 às 20:01
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `emporiokarla`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administradores`
--

CREATE TABLE `administradores` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `perfil` int(5) DEFAULT NULL COMMENT '1. administrador 2.caixa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `administradores`
--

INSERT INTO `administradores` (`id`, `nome`, `email`, `senha`, `perfil`) VALUES
(1, 'Felipe', 'felipe@grudigital.com.br', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'Netto', 'netto@grudigital.com.br', '21232f297a57a5a743894a0e4a801fc3', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `banners`
--

CREATE TABLE `banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(120) NOT NULL,
  `imagem` varchar(120) NOT NULL,
  `status` int(5) NOT NULL COMMENT '1.publicado 2.nao publicado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `banners`
--

INSERT INTO `banners` (`id`, `titulo`, `imagem`, `status`) VALUES
(3, 'Os melhores lanches', '1606316507.jpg', 1),
(4, 'Tortas saborosas', '1606316516.jpg', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(10) UNSIGNED NOT NULL,
  `categoria` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imagem` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `imagem`) VALUES
(7, 'Lanches', '1606317622.jpg'),
(8, 'Porções', '1606318521.jpg'),
(9, 'Comidas típicas', '1606318578.jpg'),
(10, 'Doces', '1606318600.jpg'),
(11, 'Bebidas Alcólicas', '1606318617.jpg'),
(12, 'Refrigerantes ', '1606318632.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `informacoes`
--

CREATE TABLE `informacoes` (
  `id` int(10) UNSIGNED NOT NULL,
  `facebook` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `instagram` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `funcsegsab` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `funcdom` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `informacoes`
--

INSERT INTO `informacoes` (`id`, `facebook`, `instagram`, `funcsegsab`, `funcdom`) VALUES
(1, 'https://www.facebook.com/EmporioKarla', 'https://www.instagram.com/emporiokarla', '6h às 21h', '6h às 19h');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens`
--

CREATE TABLE `itens` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `categoria` int(10) NOT NULL,
  `descricao` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `preco` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `loja1` int(11) DEFAULT NULL COMMENT '1.disponivel 2 indisponivel',
  `loja2` int(11) DEFAULT NULL COMMENT '1.disponivel 2 indisponivel',
  `loja3` int(11) DEFAULT NULL COMMENT '1.disponivel 2 indisponivel',
  `loja4` int(11) DEFAULT NULL COMMENT '1.disponivel 2 indisponivel'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `itens`
--

INSERT INTO `itens` (`id`, `titulo`, `categoria`, `descricao`, `preco`, `loja1`, `loja2`, `loja3`, `loja4`) VALUES
(2, 'titulo24', 1, '22224', '19.924', 1, 2, NULL, NULL),
(3, 'Refrigerante coca cola', 1, 'bebida refrescante', '19.00', 1, 2, 1, 1),
(4, 'Misto Quente', 7, 'Pão frances, presunto e queijo mussarela', '13.90', 1, 1, 1, 1),
(5, 'Bolo de Tapioca - 1Kg', 10, 'Bolo doce de tapioca com coco', '24.80', 1, 1, 1, NULL),
(6, 'Porção de Camarão GG', 8, 'Camarão GG, batata rústica e salada verde', '39.90', 1, 1, NULL, NULL),
(7, 'Tapioca com queijo', 9, 'Tapioca com queijo mussarela', '9.90', 1, 1, NULL, NULL),
(8, 'Chop Sol', 11, 'Chop Sol 500 Ml', '13.90', 1, 1, NULL, NULL),
(9, 'Coca cola zero ', 12, 'Refrigerante 350ml', '4.90', 1, 1, NULL, NULL),
(10, 'Pernil na Baguete', 7, 'Pernil, baguete e vinagrete', '19.90', 1, 1, NULL, NULL),
(11, 'Carne Seca com Macaxeira', 8, 'Carne seca com macaxeira', '34.80', 1, 1, NULL, NULL),
(12, 'Carne seca no pão Frances', 7, 'Queijo qualho e vinagrete', '13.90', 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(10) UNSIGNED NOT NULL,
  `pedido` int(10) DEFAULT NULL,
  `loja` int(5) DEFAULT NULL,
  `item` int(10) DEFAULT NULL,
  `quantidade` int(10) DEFAULT NULL,
  `valor` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(10) NOT NULL COMMENT '1. em andamento, 2. aguardando pagamento, 3. preparando item, 4. entregue',
  `datacadastro` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sugestoes`
--

CREATE TABLE `sugestoes` (
  `id` int(10) UNSIGNED NOT NULL,
  `loja` int(10) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `telefone` varchar(100) DEFAULT NULL,
  `mensagem` text DEFAULT NULL,
  `dataenvio` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `sugestoes`
--

INSERT INTO `sugestoes` (`id`, `loja`, `nome`, `telefone`, `mensagem`, `dataenvio`) VALUES
(1, 0, 'nome', 'telefone', 'mensagem inserida', '2020-11-24 20:30:10');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `informacoes`
--
ALTER TABLE `informacoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `itens`
--
ALTER TABLE `itens`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sugestoes`
--
ALTER TABLE `sugestoes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `informacoes`
--
ALTER TABLE `informacoes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `itens`
--
ALTER TABLE `itens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT de tabela `sugestoes`
--
ALTER TABLE `sugestoes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
