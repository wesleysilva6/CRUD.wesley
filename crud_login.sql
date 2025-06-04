-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03/06/2025 às 17:02
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
(1, '', ', loja1@admin.com', '$2y$10$g.GKnB1D1z82SEDnziUHLe/bTvOksuS7ljxEtr3BMP31KSOpgisau'),
(2, '', ', adm@teste.com.br', '$2y$10$OfX9YT2xrgMIg9Kn.4qdD.k5qR3G1t2XH9ImG1WjU3NTyFh/eaaN2'),
(3, 'wesley', 'wesley@gmail.com', '$2y$10$HJzkms4TAU1sNRtgm0i64ejVxRTsL8XgBHSvoXkHVNgQsc8hDovZG'),
(4, 'wesley', 'adm1@teste.com.br', '$2y$10$CHIU7c/Of4XKfEYSSZLo9eRmp27rNNLD00YwXdegc46Aj4ac5HgMW'),
(6, 'wesley', 'teste22@gmail.com', '$2y$10$o82vgjfwraf/t/tzgkcawOsg4NxHtDlESaRl8FHjqRtomny5SxZ66'),
(7, 'LOJA1', 'loja@gmail.com', '$2y$10$oIuN3obwuXrxpsDUOmJADuFzsgbn.4.ABozFMf.oFnFLNhPzdMvbG'),
(8, 'Loja Goti', 'lojagoti@gmail.com', '$2y$10$m8XtvHLkrAj98sHbtb5cx.SW/v6MdvtQr5RoMPkG.1UOjGitKATja'),
(9, 'Loja Goti', 'admGOTI@teste.com.br', '$2y$10$/lgg09K/PBYxzu5QyEwPC.XdbeUzCXRXzCHf7RYDDvKcXe/UVEkzq');

--
-- Índices para tabelas despejadas
--

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
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
