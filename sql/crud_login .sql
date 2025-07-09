-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09/07/2025 às 16:52
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `crud_login`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `itens_simulacao`
--

CREATE TABLE `itens_simulacao` (
  `id` int(11) NOT NULL,
  `id_simulacao` int(11) DEFAULT NULL,
  `produto_id` int(11) DEFAULT NULL,
  `nome_produto` varchar(255) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `preco` decimal(10,2) DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `itens_simulacao`
--

INSERT INTO `itens_simulacao` (`id`, `id_simulacao`, `produto_id`, `nome_produto`, `quantidade`, `preco`, `subtotal`) VALUES
(19, 28, 193, 'gotao', 6, 223.00, 1338.00),
(54, 62, 198, 'Mouse Logitech P34', 1, 33.00, 33.00),
(55, 63, 204, 'Mouse Logitech P34', 2, 87.94, 175.88),
(56, 64, 198, 'Mouse Logitech P34', 1, 33.00, 33.00),
(57, 65, 198, 'Mouse Logitech P34', 4, 33.00, 132.00),
(67, 75, 207, 'iPhone 16 Pro Max', 3, 3299.00, 9897.00),
(70, 78, 208, 'iPhone 13 Pro Max', 2, 2.00, 4.00);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome_produto` varchar(100) NOT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `atualizado_em` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `topico_id` int(11) DEFAULT NULL,
  `preco` float(10,2) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `criado_em` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome_produto`, `quantidade`, `descricao`, `atualizado_em`, `topico_id`, `preco`, `imagem`, `criado_em`) VALUES
(150, 'Mouse Logitech P34', 22, '22', '2025-06-23 11:20:31', 89, 87.94, '', '2025-06-23 11:20:31'),
(193, 'gotao', 22, 'gotao', '2025-07-02 09:39:40', 144, 223.00, '', '2025-07-02 09:39:40'),
(198, 'Mouse Logitech P34', 22, '22', '2025-07-07 09:43:37', 149, 33.00, '../../uploads/produto_686bc0f9b2259.png', '2025-07-07 09:43:37'),
(199, 'Mouse Logitech P34', 22, '22', '2025-07-07 09:43:47', 149, 22.00, '', '2025-07-07 09:43:47'),
(200, 'desc', 22, '1', '2025-07-07 09:44:07', 150, 22.00, '', '2025-07-07 09:44:07'),
(204, 'Mouse Logitech P34', 2, 'desc', '2025-07-08 10:48:36', 151, 87.94, '', '2025-07-08 10:48:36'),
(205, 'iPhone 13 Pro Max', 100, 'desc', '2025-07-08 12:13:53', 151, 2299.99, '', '2025-07-08 12:13:53'),
(207, 'iPhone 16 Pro Max', 120, '4GB DE RAM, 256GB DE ARMAZENAMENTO', '2025-07-09 09:04:31', 158, 3299.00, '', '2025-07-09 09:04:22'),
(208, 'iPhone 13 Pro Max', 22, 'dsec', '2025-07-09 09:08:51', 159, 2.00, '', '2025-07-09 09:08:51');

-- --------------------------------------------------------

--
-- Estrutura para tabela `simulacoes`
--

CREATE TABLE `simulacoes` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `cliente` varchar(255) DEFAULT NULL,
  `criada_em` datetime DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `simulacoes`
--

INSERT INTO `simulacoes` (`id`, `usuario_id`, `cliente`, `criada_em`, `total`) VALUES
(28, 23, 'gotao', '2025-07-02 09:39:57', 1338.00),
(30, 10, 'Cliente não informado', '2025-07-03 08:35:49', 0.00),
(31, 10, 'Wesley', '2025-07-03 08:40:00', 0.00),
(32, 10, 'Cliente não informado', '2025-07-03 08:42:36', 0.00),
(33, 10, 'Cliente não informado', '2025-07-03 08:43:13', 0.00),
(34, 10, 'Cliente não informado', '2025-07-03 08:43:24', 0.00),
(43, 10, 'Cliente não informado', '2025-07-07 12:23:09', 0.00),
(45, 10, 'TESTE', '2025-07-08 08:25:05', 16.00),
(46, 10, 'TESTE', '2025-07-08 08:25:35', 299.00),
(47, 10, 'TESTE', '2025-07-08 08:27:05', 674.00),
(48, 10, 'qwes', '2025-07-08 08:27:33', 276.00),
(49, 10, 'qwes', '2025-07-08 08:27:55', 610.00),
(50, 10, 'TESTE', '2025-07-08 08:28:21', 33.00),
(51, 10, 'wesy', '2025-07-08 08:28:27', 66.00),
(52, 10, 'Cliente X', '2025-07-08 08:28:34', 6.00),
(53, 10, 'CLIENTE TESTE', '2025-07-08 08:28:43', 6.00),
(54, 10, 'TESTE', '2025-07-08 08:30:15', 22.00),
(55, 10, 'CLIENTE TESTE', '2025-07-08 08:30:25', 22.00),
(56, 10, 'CLIENTE TESTE', '2025-07-08 08:31:07', 22.00),
(57, 10, 'wesy', '2025-07-08 08:31:17', 22.00),
(58, 10, 'Cliente X', '2025-07-08 08:31:48', 88.00),
(59, 10, 'nobre', '2025-07-08 10:49:07', 175.88),
(60, 10, 'CLIENTE TESTE', '2025-07-08 11:04:00', 175.88),
(61, 10, 'CLIENTE TESTE', '2025-07-08 11:04:11', 87.94),
(62, 9, 'TESTE', '2025-07-08 11:21:29', 33.00),
(63, 10, 'CLIENTE TESTE', '2025-07-08 12:01:46', 175.88),
(64, 9, 'CLIENTE TESTE', '2025-07-08 12:09:27', 33.00),
(65, 9, 'CLIENTE TESTE', '2025-07-08 12:10:01', 132.00),
(66, 10, 'TESTE', '2025-07-08 12:11:49', 175.88),
(67, 10, 'CLIENTE TESTE54646', '2025-07-08 12:12:48', 175.88),
(68, 10, 'TESTE12', '2025-07-08 12:14:21', 4599.98),
(69, 10, 'TESTE IPHONE 12', '2025-07-08 12:21:44', 27599.88),
(70, 10, 'wesy', '2025-07-08 12:24:34', 2299.99),
(71, 10, 'CLIENTE TESTE2', '2025-07-08 12:33:12', 22999.90),
(72, 10, 'CLIENTE TESTE33', '2025-07-08 12:35:41', 75899.67),
(73, 10, 'TESTE', '2025-07-08 12:42:15', 11499.95),
(74, 10, 'gotao', '2025-07-09 08:11:09', 4599.98),
(75, 20, 'Wesley', '2025-07-09 09:06:24', 9897.00),
(76, 24, 'wesy', '2025-07-09 09:09:04', 2.00),
(77, 24, 'Cliente X', '2025-07-09 09:12:59', 4.00),
(78, 24, 'Wesley', '2025-07-09 09:18:19', 4.00),
(79, 10, 'wesy', '2025-07-09 11:12:15', 0.00),
(80, 10, 'Cliente não informado', '2025-07-09 11:13:48', 0.00),
(81, 10, 'Cliente não informado', '2025-07-09 11:14:13', 0.00),
(82, 10, 'Cliente não informado', '2025-07-09 11:14:31', 0.00),
(83, 10, 'Cliente não informado', '2025-07-09 11:15:04', 0.00),
(84, 10, 'Cliente não informado', '2025-07-09 11:15:20', 0.00),
(85, 10, 'qwes', '2025-07-09 11:19:21', 87.94),
(86, 10, 'qwes', '2025-07-09 11:34:54', 87.94);

-- --------------------------------------------------------

--
-- Estrutura para tabela `topicos`
--

CREATE TABLE `topicos` (
  `id_topico` int(11) NOT NULL,
  `nome_topico` varchar(100) NOT NULL,
  `criado_em` datetime DEFAULT current_timestamp(),
  `usuario_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `topicos`
--

INSERT INTO `topicos` (`id_topico`, `nome_topico`, `criado_em`, `usuario_id`) VALUES
(89, 'MOUSE', '2025-06-23 11:20:21', 19),
(144, 'gotao', '2025-07-02 09:39:27', 23),
(149, 'MOUSE', '2025-07-07 09:43:25', 9),
(150, 'MOUSE', '2025-07-07 09:43:56', 9),
(151, 'MOUSE', '2025-07-08 10:04:07', 10),
(157, 'S', '2025-07-08 12:41:24', 10),
(158, 'iPhone', '2025-07-09 09:03:21', 20),
(159, 'SLAAAAAAAAAAA', '2025-07-09 09:08:35', 24);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT 'user.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `foto`) VALUES
(1, 'loja1admin', 'wesleywagner999@gmail.com', '$2y$10$xkOW9qpedXhYBcgDrRXSBe0Q5w4oXAUEqdGJM5Ew.4KBeGJSIRJp.', 'user.png'),
(2, 'admteste', 'adm@teste.com.br', '$2y$10$OfX9YT2xrgMIg9Kn.4qdD.k5qR3G1t2XH9ImG1WjU3NTyFh/eaaN2', 'user.png'),
(3, 'wesley', 'wesley@gmail.com', '$2y$10$HJzkms4TAU1sNRtgm0i64ejVxRTsL8XgBHSvoXkHVNgQsc8hDovZG', 'user.png'),
(4, 'wesley', 'adm1@teste.com.br', '$2y$10$CHIU7c/Of4XKfEYSSZLo9eRmp27rNNLD00YwXdegc46Aj4ac5HgMW', 'user.png'),
(6, 'wesley', 'teste22@gmail.com', '$2y$10$o82vgjfwraf/t/tzgkcawOsg4NxHtDlESaRl8FHjqRtomny5SxZ66', 'user.png'),
(7, 'LOJA1', 'loja@gmail.com', '$2y$10$oIuN3obwuXrxpsDUOmJADuFzsgbn.4.ABozFMf.oFnFLNhPzdMvbG', 'user.png'),
(8, 'Loja Goti', 'lojagoti@gmail.com', '$2y$10$m8XtvHLkrAj98sHbtb5cx.SW/v6MdvtQr5RoMPkG.1UOjGitKATja', 'user.png'),
(9, 'LOJA GOTI', 'admGOTI@teste.com.br', '$2y$10$aj7UM1bcYzYYavU/MRtnbevIr2rK5E5WZsEMNMhRiktyR5DcjWuLK', 'foto_user_9_1751893024.png'),
(10, 'FZZ SHOP', 'lojafzz@gmail.com', '$2y$10$rpEjAJua/UXfM/b3DBQuFeV1V9PaHp.B7PDaiuBBfphp84SSbZ84K', 'user.png'),
(11, 'LOJA', 'loja33@gmail.com', '$2y$10$2RumU55k6TRrRbNF0JWTxuxm/Fsq0bEs6HEvRwOib928d/kJ3.vea', 'user.png'),
(12, 'Administrador', 'administrador@gmail.com', '$2y$10$ltzft07ql6XFrzfQ0cmn4OGr66.aYUsDDj.LFremG0G6P7kzu5Wyu', 'user.png'),
(13, 'Wear Companyy', 'wear@gmail.com', '$2y$10$QlAB0OrA14mlNVCLp6O1u.WerVO7CrIr8XHd20TJkxm4QMAuhxocK', 'user.png'),
(14, 'Shop Perfumes', 'shopperfumes@gmail.com', '$2y$10$w6tPKuefE709R5yJvxdxmeudUdXNleNqNI3KStdq6DW2led1mcy6G', 'user.png'),
(15, 'wesley', 'wesley29999@gmail.com', '$2y$10$p8bm7zMgrMeKKrj6sf0R1u3zFvvEEs79HTdsMEWmCIC2MB0.quHXK', 'user.png'),
(16, 'Sr.Admin', 'senhoradmin@gmail.com', '$2y$10$q1MNstwwEmsyIB3YUM8DtelRjYQwbwKpV4RZ.jE9Mg3VZlySJ1Mdi', 'user.png'),
(17, 'wesley', 'wesleyadmin@gmail.com', '$2y$10$NdHSlwmrTIRL8oWw5SSNR.5t5DYbBqHyAk4341pVUfBEQz25dp8d6', 'user.png'),
(18, 'TESTE00', 'teste00@gmail.com', '$2y$10$ST0vPhlT1bfK5YOu8eS9vec3WeZKD9KKivOrp2qo2N0c9qP0M8O3y', 'user.png'),
(19, 'neymktg', 'neymktg@gmail.com', '$2y$10$4BT51sKOuJy0Pj/Ipu2KF.pOFOuHUN.Vc/Ah8njrSwoZRAjJFBxAS', 'user.png'),
(20, 'wesley', 'wesley.wagner@gazin.com.br', '$2y$10$.G5DRYExEngWf7eaR4NdKOwZqNqa6QaiQccxI69kNiDhdtdVTMRuG', 'foto_user_20_1751889598.png'),
(21, 'teste', 'engajamentofzz6@gmail.com', '$2y$10$xRBw74ubZ2cNR7QMED0ZO.d55LaBB4dtdGumzzx8jowq7EWrufB1u', 'user.png'),
(22, 'TESTE', 'testador@gmail.com', '$2y$10$hjLjZtMau3ZtXogIAIG0WucRbdkrcSoNp86GCxhTnsGuaDRxrT7Tq', 'user.png'),
(23, 'gotao', 'gotao@gmail.com', '$2y$10$rxpdZvLjSdmAaVRfS.OyGO4jeM1jApN3CCqZ4NrRuwrdWANReWvqq', 'user.png'),
(24, 'teste2', 'teste2@gmail.com', '$2y$10$KplUc0uC3X51j2GwRQFLh.XcMiJTu2NxKyDvE0t0656i1QmTL47ua', 'user.png');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `itens_simulacao`
--
ALTER TABLE `itens_simulacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_simulacao` (`id_simulacao`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topico_id` (`topico_id`);

--
-- Índices de tabela `simulacoes`
--
ALTER TABLE `simulacoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`) USING BTREE;

--
-- Índices de tabela `topicos`
--
ALTER TABLE `topicos`
  ADD PRIMARY KEY (`id_topico`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `itens_simulacao`
--
ALTER TABLE `itens_simulacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT de tabela `simulacoes`
--
ALTER TABLE `simulacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT de tabela `topicos`
--
ALTER TABLE `topicos`
  MODIFY `id_topico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `itens_simulacao`
--
ALTER TABLE `itens_simulacao`
  ADD CONSTRAINT `id_simulacao` FOREIGN KEY (`id_simulacao`) REFERENCES `simulacoes` (`id`);

--
-- Restrições para tabelas `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`topico_id`) REFERENCES `topicos` (`id_topico`);

--
-- Restrições para tabelas `simulacoes`
--
ALTER TABLE `simulacoes`
  ADD CONSTRAINT `fk_usuario_simulacao` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Restrições para tabelas `topicos`
--
ALTER TABLE `topicos`
  ADD CONSTRAINT `topicos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
