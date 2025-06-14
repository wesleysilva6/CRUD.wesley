-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13/06/2025 às 17:19
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
(91, 'Mouse Logitech P34', 2, 'ddsc', '2025-06-13 11:57:45', 57, 10.00, '../../uploads/produto_684c3c61bc074.webp', '2025-06-13 11:57:37'),
(92, 'Mouse Logitech P34', 33, 'e', '2025-06-13 11:58:06', 57, 87.94, '../../uploads/produto_684c3c7766464.webp', '2025-06-13 11:57:59'),
(93, 'Mouse Logitech P34', 2, 'desc', '2025-06-13 12:04:54', 57, 2.00, '../../uploads/produto_684c3e16cd389.webp', '2025-06-13 12:04:54'),
(94, 'Mouse Logitech P34', 22, 'wesley', '2025-06-13 12:16:05', 57, 22.00, '', '2025-06-13 12:16:05'),
(95, 'DSDSA', 2, 'dedsc', '2025-06-13 12:17:40', 57, 22.00, '../../uploads/produto_684c41143cb51.webp', '2025-06-13 12:17:40');

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
(56, 'Teclados', '2025-06-13 11:50:06', 9),
(57, 'Teclados', '2025-06-13 11:57:05', 10);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'loja1admin', 'loja1@admin.com', '$2y$10$g.GKnB1D1z82SEDnziUHLe/bTvOksuS7ljxEtr3BMP31KSOpgisau'),
(2, 'admteste', 'adm@teste.com.br', '$2y$10$OfX9YT2xrgMIg9Kn.4qdD.k5qR3G1t2XH9ImG1WjU3NTyFh/eaaN2'),
(3, 'wesley', 'wesley@gmail.com', '$2y$10$HJzkms4TAU1sNRtgm0i64ejVxRTsL8XgBHSvoXkHVNgQsc8hDovZG'),
(4, 'wesley', 'adm1@teste.com.br', '$2y$10$CHIU7c/Of4XKfEYSSZLo9eRmp27rNNLD00YwXdegc46Aj4ac5HgMW'),
(6, 'wesley', 'teste22@gmail.com', '$2y$10$o82vgjfwraf/t/tzgkcawOsg4NxHtDlESaRl8FHjqRtomny5SxZ66'),
(7, 'LOJA1', 'loja@gmail.com', '$2y$10$oIuN3obwuXrxpsDUOmJADuFzsgbn.4.ABozFMf.oFnFLNhPzdMvbG'),
(8, 'Loja Goti', 'lojagoti@gmail.com', '$2y$10$m8XtvHLkrAj98sHbtb5cx.SW/v6MdvtQr5RoMPkG.1UOjGitKATja'),
(9, 'Loja Goti', 'admGOTI@teste.com.br', '$2y$10$/lgg09K/PBYxzu5QyEwPC.XdbeUzCXRXzCHf7RYDDvKcXe/UVEkzq'),
(10, 'LOJA FZZ', 'lojafzz@gmail.com', '$2y$10$gBFsnYonUMjRb2djafqlNe3FvYX5xrjRKD/DE1ej4SbjEkrCYt6OK'),
(11, 'LOJA', 'loja33@gmail.com', '$2y$10$2RumU55k6TRrRbNF0JWTxuxm/Fsq0bEs6HEvRwOib928d/kJ3.vea'),
(12, 'Administrador', 'administrador@gmail.com', '$2y$10$ltzft07ql6XFrzfQ0cmn4OGr66.aYUsDDj.LFremG0G6P7kzu5Wyu'),
(13, 'Wear Companyy', 'wear@gmail.com', '$2y$10$QlAB0OrA14mlNVCLp6O1u.WerVO7CrIr8XHd20TJkxm4QMAuhxocK'),
(14, 'Shop Perfumes', 'shopperfumes@gmail.com', '$2y$10$w6tPKuefE709R5yJvxdxmeudUdXNleNqNI3KStdq6DW2led1mcy6G'),
(15, 'wesley', 'wesley29999@gmail.com', '$2y$10$p8bm7zMgrMeKKrj6sf0R1u3zFvvEEs79HTdsMEWmCIC2MB0.quHXK'),
(16, 'Sr.Admin', 'senhoradmin@gmail.com', '$2y$10$q1MNstwwEmsyIB3YUM8DtelRjYQwbwKpV4RZ.jE9Mg3VZlySJ1Mdi'),
(17, 'wesley', 'wesleyadmin@gmail.com', '$2y$10$NdHSlwmrTIRL8oWw5SSNR.5t5DYbBqHyAk4341pVUfBEQz25dp8d6'),
(18, 'TESTE00', 'teste00@gmail.com', '$2y$10$ST0vPhlT1bfK5YOu8eS9vec3WeZKD9KKivOrp2qo2N0c9qP0M8O3y');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topico_id` (`topico_id`);

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
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT de tabela `topicos`
--
ALTER TABLE `topicos`
  MODIFY `id_topico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`topico_id`) REFERENCES `topicos` (`id_topico`);

--
-- Restrições para tabelas `topicos`
--
ALTER TABLE `topicos`
  ADD CONSTRAINT `topicos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
