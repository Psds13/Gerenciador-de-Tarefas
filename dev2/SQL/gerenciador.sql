-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Dez-2023 às 09:40
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `gerenciador`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tarefas`
--

CREATE TABLE `tarefas` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `prioridade` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `titulo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tarefas`
--

INSERT INTO `tarefas` (`id`, `id_usuario`, `descricao`, `prioridade`, `status`, `created_at`, `titulo`) VALUES
(1, 1, 'Comer biscoito é muito bom, mas modere', 'Baixa', 'concluida', '2023-12-06 20:09:53', 'Comer Biscoito'),
(6, 4, 'É necessário para saber dos detalhes da vida', 'Média', 'concluida', '2023-12-06 23:32:15', 'Entrar em contato'),
(7, 1, 'É MELHOR NÃO DESISTIR', 'Alta', 'pendente', '2023-12-06 23:45:13', 'Ih atrás'),
(10, 1, 'Sei lá meu amigo', 'Baixa', 'concluida', '2023-12-07 00:14:48', 'Sei la'),
(11, 1, 'É necessário estudar muito pra conseguir subir na vida', 'Alta', 'pendente', '2023-12-07 12:47:56', 'Estudar'),
(12, 1, 'Andar de Bicicleta faz bem pra saúde', 'Alta', 'concluida', '2023-12-07 20:20:39', 'Andar de Bicicleta'),
(13, 5, 'É muito bom pra saúde', 'Média', 'concluida', '2023-12-07 20:23:34', 'Andar de Bicicleta'),
(14, 5, 'Coma bem pouquinho pfv', 'Alta', 'pendente', '2023-12-07 20:24:05', 'Deixa ir'),
(15, 7, 'É bom passear e andar mais para perder peso, além de fazer bem pra saúde', 'Alta', 'pendente', '2023-12-07 23:20:05', 'Fazer caminhada'),
(18, 7, 'É legal comer pastel, mas modere por favor', 'Alta', 'concluida', '2023-12-08 12:35:57', 'Deve ser');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `login1` varchar(255) NOT NULL,
  `senha` varchar(2000) NOT NULL,
  `nome` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `login1`, `senha`, `nome`) VALUES
(1, 'edseg', '$2y$10$hUmqjRI4Dz5.PIsZ8fN6K.FJbjEZJqPjJlq3FeWJiQ9ZyWLoLQygG', 'Edmilson'),
(4, 'iris15', '$2y$10$1iVMvownq40Wi/t97kIw2.7D6YpzVhq.vttjgRN/nwz7hr.w3/5E.', 'Iris'),
(5, 'and123', '$2y$10$u1mg6H6PzLze2V515Q18t.JkP1yxyFsE.8fwJ766B.t2JWnLe4gJe', 'Andersson'),
(6, 'rod123', '$2y$10$v7Ey1REPoHcntzl1sr3mpu4h3DaOQCRBO.qAdxTALo87v9Zhle7TK', 'Rogerio'),
(7, 'will12', '$2y$10$m1/8Sya5QZ0wW9orgUl33O1u7So4/9CI2Rz94TUQVrrD21iH8G1o.', 'Willian'),
(8, 'real124', '$2y$10$LEM32/6pya0kuqA3LNJoueZhAOelCErV7S5a./ocICIhqYUdzMWL.', 'Reali');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tarefas`
--
ALTER TABLE `tarefas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tarefas`
--
ALTER TABLE `tarefas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tarefas`
--
ALTER TABLE `tarefas`
  ADD CONSTRAINT `tarefas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
