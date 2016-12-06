-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Tempo de geração: 30/11/2016 às 19:17
-- Versão do servidor: 5.7.11-log
-- Versão do PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ambar_bd`
--
CREATE DATABASE IF NOT EXISTS `ambar_bd` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ambar_bd`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `clients`
--

CREATE TABLE `clients` (
  `id` int(6) UNSIGNED ZEROFILL NOT NULL COMMENT 'ID do cliente.',
  `users_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `name` varchar(50) NOT NULL COMMENT 'Nome completo do cliente.',
  `email` varchar(90) NOT NULL COMMENT 'E-mail do cliente.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Clientes que utilizam o software.';

--
-- Fazendo dump de dados para tabela `clients`
--

INSERT INTO `clients` (`id`, `users_id`, `name`, `email`) VALUES
(000001, 000002, 'client', 'jpfsantucci@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura para tabela `client_equipment`
--

CREATE TABLE `client_equipment` (
  `id` int(7) UNSIGNED ZEROFILL NOT NULL COMMENT 'ID do equipamento.',
  `equipment_id` tinyint(3) UNSIGNED ZEROFILL NOT NULL COMMENT 'ID do tipo de equipamento.',
  `clients_id` int(6) UNSIGNED ZEROFILL NOT NULL COMMENT 'ID do cliente.',
  `room_id` tinyint(2) UNSIGNED ZEROFILL NOT NULL COMMENT 'ID do cômodo que tem o equipamento.',
  `name` varchar(45) NOT NULL COMMENT 'Nome do equipamento.',
  `power` int(5) UNSIGNED NOT NULL COMMENT 'Potência do equipamento.',
  `number_of_people` tinyint(2) UNSIGNED NOT NULL COMMENT 'Número de pessoas que utilizam o equipamento.',
  `use_time` time NOT NULL COMMENT 'Tempo utilizado por dia por pessoa, em horas.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Equipamento pertencido ao cliente.';

--
-- Fazendo dump de dados para tabela `client_equipment`
--

INSERT INTO `client_equipment` (`id`, `equipment_id`, `clients_id`, `room_id`, `name`, `power`, `number_of_people`, `use_time`) VALUES
(0000001, 002, 000001, 01, 'Impressora', 100, 1, '04:21:56'),
(0000002, 001, 000001, 02, 'Computador', 100, 2, '04:00:00'),
(0000003, 003, 000001, 04, 'Ar Condicionado', 100, 3, '07:00:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `consumption`
--

CREATE TABLE `consumption` (
  `id` int(7) UNSIGNED ZEROFILL NOT NULL COMMENT 'ID do consumo.',
  `clients_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `year` int(4) UNSIGNED ZEROFILL NOT NULL COMMENT 'Ano do consumo.',
  `month` tinyint(2) UNSIGNED ZEROFILL NOT NULL COMMENT 'Mês do consumo.',
  `consumption` decimal(5,2) UNSIGNED NOT NULL COMMENT 'Consumo do mês, em kWh.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Registro dos consumos totais mensais dos clientes.';

-- --------------------------------------------------------

--
-- Estrutura para tabela `equipment`
--

CREATE TABLE `equipment` (
  `id` tinyint(3) UNSIGNED ZEROFILL NOT NULL COMMENT 'ID do equipamento.',
  `name` varchar(30) NOT NULL COMMENT 'Nome do equipamento (televisão, chuveiro, etc.)',
  `image_url` varchar(255) NOT NULL COMMENT 'URL de uma imagem do equipamento.',
  `power` int(5) UNSIGNED NOT NULL COMMENT 'Potência media do equipamento, em watts.',
  `use_time` time NOT NULL COMMENT 'Tempo medio utilizado por dia, em horas.',
  `consumption_type` tinyint(1) UNSIGNED NOT NULL COMMENT 'Tipo de consumo do equipamento.\n0 - compartilhado\n1 - individual',
  `sug_time_1` text NOT NULL,
  `sug_time_2` text NOT NULL,
  `sug_time_3` text NOT NULL,
  `sug_time_4` text NOT NULL,
  `sug_power_1` text NOT NULL,
  `sug_power_2` text NOT NULL,
  `sug_power_3` text NOT NULL,
  `normal_time_1` time NOT NULL,
  `normal_time_2` time NOT NULL,
  `normal_time_3` time NOT NULL,
  `normal_power_1` int(5) UNSIGNED NOT NULL,
  `normal_power_2` int(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Equipamentos cadastrados pelos administradores.';

--
-- Fazendo dump de dados para tabela `equipment`
--

INSERT INTO `equipment` (`id`, `name`, `image_url`, `power`, `use_time`, `consumption_type`, `sug_time_1`, `sug_time_2`, `sug_time_3`, `sug_time_4`, `sug_power_1`, `sug_power_2`, `sug_power_3`, `normal_time_1`, `normal_time_2`, `normal_time_3`, `normal_power_1`, `normal_power_2`) VALUES
(001, 'Computador', 'http://www.blogolandialtda.com.br/img-upload/images/computador-de-mesa-desktop.jpg', 100, '04:00:00', 0, 'O tempo de consumo para este produto está bem abaixo do esperado, continue utilizando-o dessa forma e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está dentro do esperado, continue utilizando-o moderadamente e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está um pouco acima do esperado, diminua o tempo de consumo senão você terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está um bem acima do esperado, diminua demasiadamente o tempo de consumo pois senão a proposta de consumo sustentável desse produto não está sendo atingida.', 'A potência para este produto é bem abaixo do esperado, seu produto é de ótima qualidade econômica, utilize-o moderadamente e não terá problemas em relação ao consumo sustentável. ', 'A potência para este produto é dentro do esperado, seu produto é de boa qualidade econômica, utilize-o moderadamente e não terá problemas em relação ao consumo sustentável. ', 'A potência para este produto é bem acima do esperado, seu produto é de qualidade econômica ruim, recomenda-se a troca do produto pois o produto leva a um consumo excessivo.', '01:00:00', '02:00:00', '03:00:00', 10, 20),
(002, 'Impressora', 'http://www.extra-imagens.com.br/Informatica/Impressoras/8663656/648119060/Impressora-Multifuncional-Hp-Deskjet-Ink-Advantage-3635-Wifi-8663656.jpg', 15, '01:00:00', 0, 'O tempo de consumo para este produto está bem abaixo do esperado, continue utilizando-o dessa forma e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está dentro do esperado, continue utilizando-o moderadamente e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está um pouco acima do esperado, diminua o tempo de consumo senão você terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está um bem acima do esperado, diminua demasiadamente o tempo de consumo pois senão a proposta de consumo sustentável desse produto não está sendo atingida.', 'A potência para este produto é bem abaixo do esperado, seu produto é de ótima qualidade econômica, utilize-o moderadamente e não terá problemas em relação ao consumo sustentável. ', 'A potência para este produto é dentro do esperado, seu produto é de boa qualidade econômica, utilize-o moderadamente e não terá problemas em relação ao consumo sustentável. ', 'A potência para este produto é bem acima do esperado, seu produto é de qualidade econômica ruim, recomenda-se a troca do produto pois o produto leva a um consumo excessivo.', '01:00:00', '02:00:00', '03:00:00', 6, 24),
(003, 'Ar Condicionado', 'http://multiar.vteximg.com.br/arquivos/icone-menu-piso-teto.png', 950, '08:00:00', 0, 'O tempo de consumo para este produto está bem abaixo do esperado, continue utilizando-o dessa forma e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está dentro do esperado, continue utilizando-o moderadamente e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está um pouco acima do esperado, diminua o tempo de consumo senão você terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está um bem acima do esperado, diminua demasiadamente o tempo de consumo pois senão a proposta de consumo sustentável desse produto não está sendo atingida.', 'A potência para este produto é bem abaixo do esperado, seu produto é de ótima qualidade econômica, utilize-o moderadamente e não terá problemas em relação ao consumo sustentável. ', 'A potência para este produto é dentro do esperado, seu produto é de boa qualidade econômica, utilize-o moderadamente e não terá problemas em relação ao consumo sustentável. ', 'A potência para este produto é dentro do esperado, seu produto é de boa qualidade econômica, utilize-o moderadamente e não terá problemas em relação ao consumo sustentável. ', '11:00:00', '05:00:00', '13:00:00', 123, 156),
(004, 'Geladeira 2 portas', 'http://www.casasbahia-imagens.com.br/Eletrodomesticos/GeladeiraeRefrigerador/2Portas/3384236/45252404/Refrigerador-Consul-Cycle-Defrost-Duplex-CRD36-com-Super-Freezer-334-L-Branco-3384187.jpg', 110, '15:00:00', 0, 'O tempo de consumo para este produto está bem abaixo do esperado, continue utilizando-o dessa forma e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está dentro do esperado, continue utilizando-o moderadamente e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está um pouco acima do esperado, diminua o tempo de consumo senão você terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está um bem acima do esperado, diminua demasiadamente o tempo de consumo pois senão a proposta de consumo sustentável desse produto não está sendo atingida.', 'A potência para este produto é bem abaixo do esperado, seu produto é de ótima qualidade econômica, utilize-o moderadamente e não terá problemas em relação ao consumo sustentável. ', 'A potência para este produto é dentro do esperado, seu produto é de boa qualidade econômica, utilize-o moderadamente e não terá problemas em relação ao consumo sustentável. ', 'A potência para este produto é bem acima do esperado, seu produto é de qualidade econômica ruim, recomenda-se a troca do produto pois o produto leva a um consumo excessivo.', '01:00:00', '02:00:00', '03:00:00', 10, 20),
(005, 'Máquina de Lavar Roupa', 'http://www.casasbahia-imagens.com.br/Eletrodomesticos/maquinadelavar/Acimade10kg/3986730/98331008/Lavadora-de-Roupas-Electrolux-15-kg-Turbo-Economia-LTD15-Branca-3986730.jpg', 500, '00:40:00', 0, 'O tempo de consumo para este produto está bem abaixo do esperado, continue utilizando-o dessa forma e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está dentro do esperado, continue utilizando-o moderadamente e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está um pouco acima do esperado, diminua o tempo de consumo senão você terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está um bem acima do esperado, diminua demasiadamente o tempo de consumo pois senão a proposta de consumo sustentável desse produto não está sendo atingida.', 'A potência para este produto é bem abaixo do esperado, seu produto é de ótima qualidade econômica, utilize-o moderadamente e não terá problemas em relação ao consumo sustentável. ', 'A potência para este produto é dentro do esperado, seu produto é de boa qualidade econômica, utilize-o moderadamente e não terá problemas em relação ao consumo sustentável. ', 'A potência para este produto é bem acima do esperado, seu produto é de qualidade econômica ruim, recomenda-se a troca do produto pois o produto leva a um consumo excessivo.', '01:00:00', '02:00:00', '03:00:00', 6, 24),
(006, 'Chuveiro', 'https://images-americanas.b2w.io/produtos/01/00/item/6895/9/6895985GG.jpg', 4500, '01:07:00', 0, 'O tempo de consumo para este produto está bem abaixo do esperado, continue utilizando-o dessa forma e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está dentro do esperado, continue utilizando-o moderadamente e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está um pouco acima do esperado, diminua o tempo de consumo senão você terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está um bem acima do esperado, diminua demasiadamente o tempo de consumo pois senão a proposta de consumo sustentável desse produto não está sendo atingida.', 'A potência para este produto é bem abaixo do esperado, seu produto é de ótima qualidade econômica, utilize-o moderadamente e não terá problemas em relação ao consumo sustentável. ', 'A potência para este produto é dentro do esperado, seu produto é de boa qualidade econômica, utilize-o moderadamente e não terá problemas em relação ao consumo sustentável. ', '--', '11:00:00', '05:00:00', '13:00:00', 123, 156);

-- --------------------------------------------------------

--
-- Estrutura para tabela `room`
--

CREATE TABLE `room` (
  `id` tinyint(2) UNSIGNED ZEROFILL NOT NULL COMMENT 'ID do cômodo.',
  `name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Cômodos da casa onde os equipamentos podem ser cadastrados.';

--
-- Fazendo dump de dados para tabela `room`
--

INSERT INTO `room` (`id`, `name`) VALUES
(01, 'Quarto'),
(02, 'Cozinha'),
(03, 'Banheiro'),
(04, 'Sala'),
(09, 'Sala de Jantar');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(6) UNSIGNED ZEROFILL NOT NULL COMMENT 'ID do usuário.',
  `user` varchar(20) NOT NULL COMMENT 'Nome do usuário.',
  `password` varchar(32) NOT NULL COMMENT 'Senha do usuário, hasheada em MD5 com salt.',
  `permission` tinyint(1) UNSIGNED NOT NULL COMMENT 'Permissão do usuário.\n0 - admin\n1 - cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Usuários do software.';

--
-- Fazendo dump de dados para tabela `users`
--

INSERT INTO `users` (`id`, `user`, `password`, `permission`) VALUES
(000001, 'adm', 'df235f4954e3d2bacac442ed1a5cd0f4', 0),
(000002, 'client', 'df235f4954e3d2bacac442ed1a5cd0f4', 1);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_clients_users_idx` (`users_id`);

--
-- Índices de tabela `client_equipment`
--
ALTER TABLE `client_equipment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_equipment_has_clients_clients1_idx` (`clients_id`),
  ADD KEY `fk_equipment_has_clients_equipment1_idx` (`equipment_id`),
  ADD KEY `fk_client_equipment_room1_idx` (`room_id`);

--
-- Índices de tabela `consumption`
--
ALTER TABLE `consumption`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_consumption_clients1_idx` (`clients_id`);

--
-- Índices de tabela `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'ID do cliente.', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de tabela `client_equipment`
--
ALTER TABLE `client_equipment`
  MODIFY `id` int(7) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'ID do equipamento.', AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `consumption`
--
ALTER TABLE `consumption`
  MODIFY `id` int(7) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'ID do consumo.';
--
-- AUTO_INCREMENT de tabela `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id` tinyint(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'ID do equipamento.', AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de tabela `room`
--
ALTER TABLE `room`
  MODIFY `id` tinyint(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'ID do cômodo.', AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'ID do usuário.', AUTO_INCREMENT=3;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `fk_clients_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `client_equipment`
--
ALTER TABLE `client_equipment`
  ADD CONSTRAINT `fk_client_equipment_room1` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_equipment_has_clients_clients1` FOREIGN KEY (`clients_id`) REFERENCES `clients` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_equipment_has_clients_equipment1` FOREIGN KEY (`equipment_id`) REFERENCES `equipment` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `consumption`
--
ALTER TABLE `consumption`
  ADD CONSTRAINT `fk_consumption_clients1` FOREIGN KEY (`clients_id`) REFERENCES `clients` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
