-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07/07/2025 às 13:08
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
(21, 35, 197, 'Mouse Logitech P34', 3, 33.00, 99.00);

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
(197, 'Mouse Logitech P34', 33, 'frdv', '2025-07-04 11:48:03', 148, 33.00, '', '2025-07-04 11:48:03');

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
(35, 10, 'Wesley', '2025-07-04 11:48:20', 99.00);

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
(148, 'MOUSE', '2025-07-04 11:47:55', 10);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `foto`) VALUES
(1, 'loja1admin', 'wesleywagner999@gmail.com', '$2y$10$xkOW9qpedXhYBcgDrRXSBe0Q5w4oXAUEqdGJM5Ew.4KBeGJSIRJp.', 'default.png'),
(2, 'admteste', 'adm@teste.com.br', '$2y$10$OfX9YT2xrgMIg9Kn.4qdD.k5qR3G1t2XH9ImG1WjU3NTyFh/eaaN2', 'default.png'),
(3, 'wesley', 'wesley@gmail.com', '$2y$10$HJzkms4TAU1sNRtgm0i64ejVxRTsL8XgBHSvoXkHVNgQsc8hDovZG', 'default.png'),
(4, 'wesley', 'adm1@teste.com.br', '$2y$10$CHIU7c/Of4XKfEYSSZLo9eRmp27rNNLD00YwXdegc46Aj4ac5HgMW', 'default.png'),
(6, 'wesley', 'teste22@gmail.com', '$2y$10$o82vgjfwraf/t/tzgkcawOsg4NxHtDlESaRl8FHjqRtomny5SxZ66', 'default.png'),
(7, 'LOJA1', 'loja@gmail.com', '$2y$10$oIuN3obwuXrxpsDUOmJADuFzsgbn.4.ABozFMf.oFnFLNhPzdMvbG', 'default.png'),
(8, 'Loja Goti', 'lojagoti@gmail.com', '$2y$10$m8XtvHLkrAj98sHbtb5cx.SW/v6MdvtQr5RoMPkG.1UOjGitKATja', 'default.png'),
(9, 'Loja Goti', 'admGOTI@teste.com.br', '$2y$10$/lgg09K/PBYxzu5QyEwPC.XdbeUzCXRXzCHf7RYDDvKcXe/UVEkzq', 'foto_user_9_1751640644.png'),
(10, 'FZZ SHOP', 'lojafzz@gmail.com', '$2y$10$HiuysyiGxEs6MvOfeX.kbu4X5IzxeteQ8bw48e2huPvbrKo10VETi', 'foto_user_10_1751641126.png'),
(11, 'LOJA', 'loja33@gmail.com', '$2y$10$2RumU55k6TRrRbNF0JWTxuxm/Fsq0bEs6HEvRwOib928d/kJ3.vea', 'default.png'),
(12, 'Administrador', 'administrador@gmail.com', '$2y$10$ltzft07ql6XFrzfQ0cmn4OGr66.aYUsDDj.LFremG0G6P7kzu5Wyu', 'default.png'),
(13, 'Wear Companyy', 'wear@gmail.com', '$2y$10$QlAB0OrA14mlNVCLp6O1u.WerVO7CrIr8XHd20TJkxm4QMAuhxocK', 'default.png'),
(14, 'Shop Perfumes', 'shopperfumes@gmail.com', '$2y$10$w6tPKuefE709R5yJvxdxmeudUdXNleNqNI3KStdq6DW2led1mcy6G', 'default.png'),
(15, 'wesley', 'wesley29999@gmail.com', '$2y$10$p8bm7zMgrMeKKrj6sf0R1u3zFvvEEs79HTdsMEWmCIC2MB0.quHXK', 'default.png'),
(16, 'Sr.Admin', 'senhoradmin@gmail.com', '$2y$10$q1MNstwwEmsyIB3YUM8DtelRjYQwbwKpV4RZ.jE9Mg3VZlySJ1Mdi', 'default.png'),
(17, 'wesley', 'wesleyadmin@gmail.com', '$2y$10$NdHSlwmrTIRL8oWw5SSNR.5t5DYbBqHyAk4341pVUfBEQz25dp8d6', 'default.png'),
(18, 'TESTE00', 'teste00@gmail.com', '$2y$10$ST0vPhlT1bfK5YOu8eS9vec3WeZKD9KKivOrp2qo2N0c9qP0M8O3y', 'default.png'),
(19, 'neymktg', 'neymktg@gmail.com', '$2y$10$4BT51sKOuJy0Pj/Ipu2KF.pOFOuHUN.Vc/Ah8njrSwoZRAjJFBxAS', 'default.png'),
(20, 'wesley', 'wesley.wagner@gazin.com.br', '$2y$10$nO9W2GM/vfifJgykroAdt.IAH7YKkZAUI7ZGV3Rac9URiUxyOVvuq', 'foto_user_20_1751639644.png'),
(21, 'teste', 'engajamentofzz6@gmail.com', '$2y$10$xRBw74ubZ2cNR7QMED0ZO.d55LaBB4dtdGumzzx8jowq7EWrufB1u', 'default.png'),
(22, 'TESTE', 'testador@gmail.com', '$2y$10$hjLjZtMau3ZtXogIAIG0WucRbdkrcSoNp86GCxhTnsGuaDRxrT7Tq', 'default.png'),
(23, 'gotao', 'gotao@gmail.com', '$2y$10$rxpdZvLjSdmAaVRfS.OyGO4jeM1jApN3CCqZ4NrRuwrdWANReWvqq', 'default.png');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT de tabela `simulacoes`
--
ALTER TABLE `simulacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de tabela `topicos`
--
ALTER TABLE `topicos`
  MODIFY `id_topico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
