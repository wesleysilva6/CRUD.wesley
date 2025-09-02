-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02/09/2025 às 16:59
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
-- Estrutura para tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cargo` enum('Vendedor','Estoquista','Gerente') NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `salario` decimal(10,2) NOT NULL,
  `data_admissao` datetime DEFAULT current_timestamp(),
  `status` enum('ativo','inativo') NOT NULL DEFAULT 'ativo',
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id`, `nome`, `cargo`, `email`, `telefone`, `salario`, `data_admissao`, `status`, `foto`) VALUES
(1, 'Vendedor Teste', 'Vendedor', 'vendedor.teste@estoque.com', '11 94543-9688', 1500.00, '2025-09-02 11:47:05', 'ativo', '../../../uploads/funcionario_68b70369e2371.png'),
(2, 'Estoquista Teste', 'Estoquista', 'estoquista.teste@estoque.com', '44 99742-2772', 1500.00, '2025-09-02 11:50:00', 'ativo', '../../../uploads/funcionario_68b70418c7067.png'),
(3, 'Gerente Teste', 'Gerente', 'gerente.teste@estoque.com', '11 98512-9993', 1500.00, '2025-09-02 11:50:55', 'ativo', '../../../uploads/funcionario_68b7044f978ce.png');

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
(53, 161, 20, 'Mouse Logitech P34', 1, 4000.00, 4000.00),
(54, 162, 22, 'iPhone 13 Pro Max', 1, 2899.00, 2899.00);

-- --------------------------------------------------------

--
-- Estrutura para tabela `itens_venda`
--

CREATE TABLE `itens_venda` (
  `id` int(11) NOT NULL,
  `venda_id` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `preco_unitario` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `itens_venda`
--

INSERT INTO `itens_venda` (`id`, `venda_id`, `produto_id`, `quantidade`, `preco_unitario`, `subtotal`) VALUES
(1, 1, 24, 1, 87.94, 87.94),
(2, 2, 22, 2, 2899.00, 5798.00),
(3, 3, 22, 1, 2899.00, 2899.00),
(4, 4, 22, 1, 2899.00, 2899.00);

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
(22, 'iPhone 13 Pro Max', 6, '128 GB DE ARMAZENAMENTO 3GB DE RAM\r\n', '2025-09-02 09:24:02', 204, 2899.00, '../../uploads/produto_68b1b22483523.png', '2025-08-26 10:58:08'),
(24, 'Mouse Logitech P34', 18, 'desc', '2025-09-01 10:34:54', 204, 87.94, '', '2025-09-01 10:20:19');

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
(161, 10, 'Cliente X', '2025-08-26 09:39:25', 4000.00),
(162, 10, 'Cliente X', '2025-09-01 10:39:30', 2899.00);

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
(204, 'SLAAAAAAAAAAA', '2025-08-21 11:38:52', 10);

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
(10, 'FZZ SHOP1', 'lojafzz@gmail.com', '$2y$10$x4/zswAF5KXNZjL.oFtcfefJ60vaUoyR91Y1tuitRyaEVfnrxODsy', 'user.png'),
(47, 'WESLEY GAZIN', 'wesley.wagner@gazin.com.br', '$2y$10$zwg/RiHOotaI4TZ/aarxN.W74gN1js7Eb8cXvum9l6zDV1Hlc76Jy', 'user.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `vendas`
--

CREATE TABLE `vendas` (
  `id` int(11) NOT NULL,
  `cliente` varchar(100) NOT NULL,
  `vendedor_id` int(11) NOT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `realizada_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `telefone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `vendas`
--

INSERT INTO `vendas` (`id`, `cliente`, `vendedor_id`, `total`, `realizada_em`, `telefone`) VALUES
(1, 'wesy', 1, 87.94, '2025-09-01 13:34:54', '11 94543-9688'),
(2, 'wesy', 1, 5798.00, '2025-09-01 13:37:08', '11 94543-9688'),
(3, 'wesy', 1, 2899.00, '2025-09-02 11:44:50', '44 99742-2772'),
(4, 'Wesley', 1, 2899.00, '2025-09-02 12:24:02', '44 99742-2772');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices de tabela `itens_simulacao`
--
ALTER TABLE `itens_simulacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_simulacao` (`id_simulacao`);

--
-- Índices de tabela `itens_venda`
--
ALTER TABLE `itens_venda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `venda_id` (`venda_id`),
  ADD KEY `produto_id` (`produto_id`);

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
-- Índices de tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendedor_id` (`vendedor_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `itens_simulacao`
--
ALTER TABLE `itens_simulacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de tabela `itens_venda`
--
ALTER TABLE `itens_venda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `simulacoes`
--
ALTER TABLE `simulacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT de tabela `topicos`
--
ALTER TABLE `topicos`
  MODIFY `id_topico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `itens_simulacao`
--
ALTER TABLE `itens_simulacao`
  ADD CONSTRAINT `id_simulacao` FOREIGN KEY (`id_simulacao`) REFERENCES `simulacoes` (`id`);

--
-- Restrições para tabelas `itens_venda`
--
ALTER TABLE `itens_venda`
  ADD CONSTRAINT `itens_venda_ibfk_1` FOREIGN KEY (`venda_id`) REFERENCES `vendas` (`id`),
  ADD CONSTRAINT `itens_venda_ibfk_2` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`);

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

--
-- Restrições para tabelas `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `vendas_ibfk_1` FOREIGN KEY (`vendedor_id`) REFERENCES `vendedores` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
