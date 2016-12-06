-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Tempo de geração: 02/12/2016 às 20:12
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
(000001, 000002, 'Cliente Inicial', 'cliente@gmail.com'),
(000005, 000006, 'Anderson Santos', 'anderson@gmail.com'),
(000006, 000007, 'jean', 'jean@gmail.com');

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
(0000002, 001, 000001, 02, 'Computador', 100, 2, '04:00:00'),
(0000003, 003, 000001, 04, 'Ar Condicionado', 100, 3, '07:00:00'),
(0000008, 008, 000005, 01, 'Ar Condicionado', 1400, 1, '08:00:00'),
(0000009, 022, 000005, 01, 'Lâmpada', 15, 1, '03:00:00'),
(0000010, 017, 000005, 01, 'TV', 80, 1, '03:00:00'),
(0000011, 013, 000005, 02, 'Micro', 1500, 1, '00:05:00'),
(0000012, 011, 000005, 02, 'Geladeira', 100, 1, '23:59:59'),
(0000013, 022, 000005, 02, 'Lâmpada', 15, 1, '01:00:00'),
(0000014, 006, 000005, 03, 'Chuveiro', 3000, 1, '00:15:00'),
(0000015, 022, 000005, 03, 'Lâmpada', 15, 1, '00:45:00'),
(0000016, 014, 000005, 03, 'Secador', 900, 1, '00:10:00'),
(0000017, 022, 000005, 04, 'Lâmpada', 15, 1, '03:00:00'),
(0000018, 018, 000005, 04, 'TV', 200, 1, '03:00:00'),
(0000019, 019, 000005, 04, 'Ventilador', 60, 1, '01:00:00'),
(0000020, 020, 000005, 04, 'Meu game', 120, 1, '02:00:00'),
(0000021, 022, 000005, 10, 'Lâmpada', 15, 1, '00:15:00'),
(0000022, 005, 000005, 10, 'Máquina', 650, 1, '00:30:00'),
(0000023, 022, 000005, 12, 'Lâmpada', 15, 1, '02:00:00'),
(0000024, 001, 000005, 12, 'Meu PC', 450, 1, '02:00:00');

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
(001, 'Computador', 'http://www.blogolandialtda.com.br/img-upload/images/computador-de-mesa-desktop.jpg', 300, '03:00:00', 0, 'O tempo de consumo para este produto está bem abaixo do esperado. Continue utilizando-o dessa forma e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está dentro do esperado. Continue utilizando-o moderadamente e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está um pouco acima do esperado. Tente reduzir o tempo de uso para não ter problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está bem acima do esperado. Reduza o tempo de uso para alcançar seu consumo sustentável.', 'A potência deste produto é abaixo da média. Seu produto é de ótima qualidade econômica, utilize-o normalmente e não terá problemas em relação ao consumo sustentável.', 'A potência deste produto está dentro da média. Seu produto é de boa qualidade econômica, utilize-o moderadamente e não terá problemas em relação ao consumo sustentável.', 'A potência deste produto é bem acima da média. Seu produto não é econômico, portanto recomenda-se a troca do produto para evitar consumo excessivo.', '01:00:00', '03:00:00', '05:00:00', 250, 400),
(003, 'Ar Condicionado 7.500 BTU', 'http://multiar.vteximg.com.br/arquivos/icone-menu-piso-teto.png', 1000, '08:00:00', 0, 'O tempo de consumo para este produto está bem abaixo do esperado. Continue utilizando-o dessa forma e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está dentro do esperado. Continue utilizando-o moderadamente e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está um pouco acima do esperado. Tente reduzir o tempo de uso para não ter problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está bem acima do esperado. Reduza o tempo de uso para alcançar seu consumo sustentável.', 'A potência deste produto é abaixo da média. Seu produto é de ótima qualidade econômica, utilize-o normalmente e não terá problemas em relação ao consumo sustentável.', 'A potência deste produto está dentro da média. Seu produto é de boa qualidade econômica, utilize-o moderadamente e não terá problemas em relação ao consumo sustentável.', 'A potência deste produto é bem acima da média. Seu produto não é econômico, portanto recomenda-se a troca do produto para evitar consumo excessivo.', '04:00:00', '08:00:00', '12:00:00', 800, 1200),
(004, 'Geladeira 2 portas', 'http://www.casasbahia-imagens.com.br/Eletrodomesticos/GeladeiraeRefrigerador/2Portas/3384236/45252404/Refrigerador-Consul-Cycle-Defrost-Duplex-CRD36-com-Super-Freezer-334-L-Branco-3384187.jpg', 130, '23:59:59', 0, 'O tempo de consumo para este produto está bem abaixo do esperado. Continue utilizando-o dessa forma e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está dentro do esperado. Continue utilizando-o moderadamente e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está um pouco acima do esperado. Tente reduzir o tempo de uso para não ter problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está bem acima do esperado. Reduza o tempo de uso para alcançar seu consumo sustentável.', 'A potência deste produto é abaixo da média. Seu produto é de ótima qualidade econômica, utilize-o normalmente e não terá problemas em relação ao consumo sustentável.', 'A potência deste produto está dentro da média. Seu produto é de boa qualidade econômica, utilize-o moderadamente e não terá problemas em relação ao consumo sustentável.', 'A potência deste produto é bem acima da média. Seu produto não é econômico, portanto recomenda-se a troca do produto para evitar consumo excessivo.', '22:59:59', '23:59:59', '23:59:59', 110, 150),
(005, 'Máquina de Lavar Roupa', 'http://www.casasbahia-imagens.com.br/Eletrodomesticos/maquinadelavar/Acimade10kg/3986730/98331008/Lavadora-de-Roupas-Electrolux-15-kg-Turbo-Economia-LTD15-Branca-3986730.jpg', 500, '00:40:00', 0, 'O tempo de consumo para este produto está bem abaixo do esperado. Continue utilizando-o dessa forma e não terá problemas em relação ao consumo sustentável do mesmo.O tempo de consumo para este produto está bem abaixo do esperado. Continue utilizando-o dessa forma e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está dentro do esperado. Continue utilizando-o moderadamente e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está um pouco acima do esperado. Tente reduzir o tempo de uso para não ter problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está bem acima do esperado. Reduza o tempo de uso para alcançar seu consumo sustentável.', 'A potência deste produto é abaixo da média. Seu produto é de ótima qualidade econômica, utilize-o normalmente e não terá problemas em relação ao consumo sustentável.', 'A potência deste produto está dentro da média. Seu produto é de boa qualidade econômica, utilize-o moderadamente e não terá problemas em relação ao consumo sustentável.', 'A potência deste produto é bem acima da média. Seu produto não é econômico, portanto recomenda-se a troca do produto para evitar consumo excessivo.', '00:25:00', '00:40:00', '00:55:00', 420, 580),
(006, 'Chuveiro', 'https://images-americanas.b2w.io/produtos/01/00/item/6895/9/6895985GG.jpg', 3500, '00:40:00', 0, 'O tempo de consumo para este produto está bem abaixo do esperado. Continue utilizando-o dessa forma e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está dentro do esperado. Continue utilizando-o moderadamente e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está um pouco acima do esperado. Tente reduzir o tempo de uso para não ter problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está bem acima do esperado. Reduza o tempo de uso para alcançar seu consumo sustentável.', 'A potência deste produto é abaixo da média. Seu produto é de ótima qualidade econômica, utilize-o normalmente e não terá problemas em relação ao consumo sustentável.', 'A potência deste produto está dentro da média. Seu produto é de boa qualidade econômica, utilize-o moderadamente e não terá problemas em relação ao consumo sustentável.', 'A potência deste produto é bem acima da média. Seu produto não é econômico, portanto recomenda-se a troca do produto para evitar consumo excessivo.', '00:20:00', '00:40:00', '01:00:00', 3000, 4000),
(007, 'Ar Condicionado 10.000 BTU', 'http://multiar.vteximg.com.br/arquivos/icone-menu-piso-teto.png', 1350, '08:00:00', 0, 'O tempo de consumo para este produto está bem abaixo do esperado. Continue utilizando-o dessa forma e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está dentro do esperado. Continue utilizando-o moderadamente e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está um pouco acima do esperado. Tente reduzir o tempo de uso para não ter problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está bem acima do esperado. Reduza o tempo de uso para alcançar seu consumo sustentável.', 'A potência deste produto é abaixo da média. Seu produto é de ótima qualidade econômica, utilize-o normalmente e não terá problemas em relação ao consumo sustentável.', 'A potência deste produto está dentro da média. Seu produto é de boa qualidade econômica, utilize-o moderadamente e não terá problemas em relação ao consumo sustentável.', 'A potência deste produto é bem acima da média. Seu produto não é econômico, portanto recomenda-se a troca do produto para evitar consumo excessivo.', '04:00:00', '08:00:00', '12:00:00', 1150, 1550),
(008, 'Ar Condicionado 12.000 BTU', 'http://multiar.vteximg.com.br/arquivos/icone-menu-piso-teto.png', 1450, '08:00:00', 0, 'O tempo de consumo para este produto está bem abaixo do esperado. Continue utilizando-o dessa forma e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está dentro do esperado. Continue utilizando-o moderadamente e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está um pouco acima do esperado. Tente reduzir o tempo de uso para não ter problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está bem acima do esperado. Reduza o tempo de uso para alcançar seu consumo sustentável.', 'A potência deste produto é abaixo da média. Seu produto é de ótima qualidade econômica, utilize-o normalmente e não terá problemas em relação ao consumo sustentável.', 'A potência deste produto está dentro da média. Seu produto é de boa qualidade econômica, utilize-o moderadamente e não terá problemas em relação ao consumo sustentável.', 'A potência deste produto é bem acima da média. Seu produto não é econômico, portanto recomenda-se a troca do produto para evitar consumo excessivo.', '04:00:00', '08:00:00', '12:00:00', 1300, 1600),
(009, 'Ar Condicionado 15.000 BTU', 'http://multiar.vteximg.com.br/arquivos/icone-menu-piso-teto.png', 2000, '08:00:00', 0, 'O tempo de consumo para este produto está bem abaixo do esperado. Continue utilizando-o dessa forma e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está dentro do esperado. Continue utilizando-o moderadamente e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está um pouco acima do esperado. Tente reduzir o tempo de uso para não ter problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está bem acima do esperado. Reduza o tempo de uso para alcançar seu consumo sustentável.', 'A potência deste produto é abaixo da média. Seu produto é de ótima qualidade econômica, utilize-o normalmente e não terá problemas em relação ao consumo sustentável.', 'A potência deste produto está dentro da média. Seu produto é de boa qualidade econômica, utilize-o moderadamente e não terá problemas em relação ao consumo sustentável.', 'A potência deste produto é bem acima da média. Seu produto não é econômico, portanto recomenda-se a troca do produto para evitar consumo excessivo.', '04:00:00', '08:00:00', '12:00:00', 1800, 2200),
(010, 'Ar Condicionado 18.000 BTU', 'http://multiar.vteximg.com.br/arquivos/icone-menu-piso-teto.png', 2100, '08:00:00', 0, 'O tempo de consumo para este produto está bem abaixo do esperado. Continue utilizando-o dessa forma e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está dentro do esperado. Continue utilizando-o moderadamente e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está um pouco acima do esperado. Tente reduzir o tempo de uso para não ter problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está bem acima do esperado. Reduza o tempo de uso para alcançar seu consumo sustentável.', 'A potência deste produto é abaixo da média. Seu produto é de ótima qualidade econômica, utilize-o normalmente e não terá problemas em relação ao consumo sustentável.', 'A potência deste produto está dentro da média. Seu produto é de boa qualidade econômica, utilize-o moderadamente e não terá problemas em relação ao consumo sustentável.', 'A potência deste produto é bem acima da média. Seu produto não é econômico, portanto recomenda-se a troca do produto para evitar consumo excessivo.', '04:00:00', '08:00:00', '12:00:00', 1900, 2300),
(011, 'Geladeira 1 porta', 'http://www.casasbahia-imagens.com.br/Eletrodomesticos/GeladeiraeRefrigerador/2Portas/3384236/45252404/Refrigerador-Consul-Cycle-Defrost-Duplex-CRD36-com-Super-Freezer-334-L-Branco-3384187.jpg', 90, '23:59:59', 0, 'O tempo de consumo para este produto está bem abaixo do esperado. Continue utilizando-o dessa forma e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está dentro do esperado. Continue utilizando-o moderadamente e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está um pouco acima do esperado. Tente reduzir o tempo de uso para não ter problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está bem acima do esperado. Reduza o tempo de uso para alcançar seu consumo sustentável.', 'A potência deste produto é abaixo da média. Seu produto é de ótima qualidade econômica, utilize-o normalmente e não terá problemas em relação ao consumo sustentável.', 'A potência deste produto está dentro da média. Seu produto é de boa qualidade econômica, utilize-o moderadamente e não terá problemas em relação ao consumo sustentável.', 'A potência deste produto é bem acima da média. Seu produto não é econômico, portanto recomenda-se a troca do produto para evitar consumo excessivo.', '22:59:59', '23:59:59', '23:59:59', 75, 105),
(012, 'Aspirador de pó', 'http://www.madriferramentas.com.br/uploads/produtos/f22c1e9e-3f43-446e-94b2-6979cec49c4e_aspirador-smart-a10.jpg', 100, '00:20:00', 0, 'O tempo de consumo para este produto está bem abaixo do esperado. Continue utilizando-o dessa forma e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está dentro do esperado. Continue utilizando-o moderadamente e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está um pouco acima do esperado. Tente reduzir o tempo de uso para não ter problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está bem acima do esperado. Reduza o tempo de uso para alcançar seu consumo sustentável.', 'A potência deste produto é abaixo da média. Seu produto é de ótima qualidade econômica, utilize-o normalmente e não terá problemas em relação ao consumo sustentável. ', 'A potência deste produto está dentro da média. Seu produto é de boa qualidade econômica, utilize-o moderadamente e não terá problemas em relação ao consumo sustentável. ', 'A potência deste produto é bem acima da média. Seu produto não é econômico, portanto recomenda-se a troca do produto para evitar consumo excessivo.', '00:12:00', '00:20:00', '00:30:00', 80, 120),
(013, 'Forno microondas', 'http://www.pontofrio-imagens.com.br/Eletrodomesticos/FornodeMicroondas/4420009/103094304/Forno-de-Micro-ondas-Brastemp-Maxi-Flat-BMJ23AS-Preto-23-Litros-4420009.jpg', 1200, '00:20:00', 0, 'O tempo de consumo para este produto está bem abaixo do esperado. Continue utilizando-o dessa forma e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está dentro do esperado. Continue utilizando-o moderadamente e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está um pouco acima do esperado. Tente reduzir o tempo de uso para não ter problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está bem acima do esperado. Reduza o tempo de uso para alcançar seu consumo sustentável.', 'A potência deste produto é abaixo da média. Seu produto é de ótima qualidade econômica, utilize-o normalmente e não terá problemas em relação ao consumo sustentável. ', 'A potência deste produto está dentro da média. Seu produto é de boa qualidade econômica, utilize-o moderadamente e não terá problemas em relação ao consumo sustentável. ', 'A potência deste produto é bem acima da média. Seu produto não é econômico, portanto recomenda-se a troca do produto para evitar consumo excessivo.', '00:10:00', '00:20:00', '00:30:00', 1000, 1400),
(014, 'Secador de cabelo', 'http://www.casasbahia-imagens.com.br/BelezaSaude/cuidadosfemininos/secadoresdecabelo/8861/2663785/Secador-de-Cabelos-Taiff-Turbo-Ion-Motor-AC-Profissional-1900W-Preto-8861.jpg', 1400, '00:10:00', 0, 'O tempo de consumo para este produto está bem abaixo do esperado. Continue utilizando-o dessa forma e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está dentro do esperado. Continue utilizando-o moderadamente e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está um pouco acima do esperado. Tente reduzir o tempo de uso para não ter problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está bem acima do esperado. Reduza o tempo de uso para alcançar seu consumo sustentável.', 'A potência deste produto é abaixo da média. Seu produto é de ótima qualidade econômica, utilize-o normalmente e não terá problemas em relação ao consumo sustentável. ', 'A potência deste produto está dentro da média. Seu produto é de boa qualidade econômica, utilize-o moderadamente e não terá problemas em relação ao consumo sustentável. ', 'A potência deste produto é bem acima da média. Seu produto não é econômico, portanto recomenda-se a troca do produto para evitar consumo excessivo.', '00:05:00', '00:10:00', '00:15:00', 1000, 1700),
(015, 'TV de tubo até 20''''', 'http://thumbs.buscape.com.br/tv/toshiba-1453av-14-polegadas-crt-convencional_200x200-PU41b8d_1.jpg', 70, '05:00:00', 0, 'O tempo de consumo para este produto está bem abaixo do esperado. Continue utilizando-o dessa forma e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está dentro do esperado. Continue utilizando-o moderadamente e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está um pouco acima do esperado. Tente reduzir o tempo de uso para não ter problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está bem acima do esperado. Reduza o tempo de uso para alcançar seu consumo sustentável.', 'A potência deste produto é abaixo da média. Seu produto é de ótima qualidade econômica, utilize-o normalmente e não terá problemas em relação ao consumo sustentável. ', 'A potência deste produto está dentro da média. Seu produto é de boa qualidade econômica, utilize-o moderadamente e não terá problemas em relação ao consumo sustentável. ', 'A potência deste produto é bem acima da média. Seu produto não é econômico, portanto recomenda-se a troca do produto para evitar consumo excessivo.', '03:00:00', '05:00:00', '07:00:00', 50, 90),
(016, 'TV de tubo acima de 20''''', 'http://www.bonde.com.br/img/bondenews/2010/10/img_1_39_68.jpg', 110, '05:00:00', 0, 'O tempo de consumo para este produto está bem abaixo do esperado. Continue utilizando-o dessa forma e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está dentro do esperado. Continue utilizando-o moderadamente e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está um pouco acima do esperado. Tente reduzir o tempo de uso para não ter problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está bem acima do esperado. Reduza o tempo de uso para alcançar seu consumo sustentável.', 'A potência deste produto é abaixo da média. Seu produto é de ótima qualidade econômica, utilize-o normalmente e não terá problemas em relação ao consumo sustentável. ', 'A potência deste produto está dentro da média. Seu produto é de boa qualidade econômica, utilize-o moderadamente e não terá problemas em relação ao consumo sustentável. ', 'A potência deste produto é bem acima da média. Seu produto não é econômico, portanto recomenda-se a troca do produto para evitar consumo excessivo.', '03:00:00', '05:00:00', '07:00:00', 90, 130),
(017, 'TV de led até 30''''', 'https://static.wmobjects.com.br/hotsite/sku-content/LG/379629/images/379629_smart_tv_led_60ln5700_lg_01.png', 80, '05:00:00', 0, 'O tempo de consumo para este produto está bem abaixo do esperado. Continue utilizando-o dessa forma e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está dentro do esperado. Continue utilizando-o moderadamente e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está um pouco acima do esperado. Tente reduzir o tempo de uso para não ter problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está bem acima do esperado. Reduza o tempo de uso para alcançar seu consumo sustentável.', 'A potência deste produto é abaixo da média. Seu produto é de ótima qualidade econômica, utilize-o normalmente e não terá problemas em relação ao consumo sustentável. ', 'A potência deste produto está dentro da média. Seu produto é de boa qualidade econômica, utilize-o moderadamente e não terá problemas em relação ao consumo sustentável. ', 'A potência deste produto é bem acima da média. Seu produto não é econômico, portanto recomenda-se a troca do produto para evitar consumo excessivo.', '03:00:00', '05:00:00', '07:00:00', 65, 95),
(018, 'TV de led acima de 30''''', 'https://static.wmobjects.com.br/hotsite/sku-content/LG/379629/images/379629_smart_tv_led_60ln5700_lg_01.png', 160, '05:00:00', 0, 'O tempo de consumo para este produto está bem abaixo do esperado. Continue utilizando-o dessa forma e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está dentro do esperado. Continue utilizando-o moderadamente e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está um pouco acima do esperado. Tente reduzir o tempo de uso para não ter problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está bem acima do esperado. Reduza o tempo de uso para alcançar seu consumo sustentável.', 'A potência deste produto é abaixo da média. Seu produto é de ótima qualidade econômica, utilize-o normalmente e não terá problemas em relação ao consumo sustentável. ', 'A potência deste produto está dentro da média. Seu produto é de boa qualidade econômica, utilize-o moderadamente e não terá problemas em relação ao consumo sustentável. ', 'A potência deste produto é bem acima da média. Seu produto não é econômico, portanto recomenda-se a troca do produto para evitar consumo excessivo.', '03:00:00', '05:00:00', '07:00:00', 130, 190),
(019, 'Ventilador', 'http://c.mlcdn.com.br/1500x1500/ventilador-de-mesa-mondial-v-4540cm-3-velocidades-020415500.jpg', 65, '08:00:00', 0, 'O tempo de consumo para este produto está bem abaixo do esperado. Continue utilizando-o dessa forma e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está dentro do esperado. Continue utilizando-o moderadamente e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está um pouco acima do esperado. Tente reduzir o tempo de uso para não ter problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está bem acima do esperado. Reduza o tempo de uso para alcançar seu consumo sustentável.', 'A potência deste produto é abaixo da média. Seu produto é de ótima qualidade econômica, utilize-o normalmente e não terá problemas em relação ao consumo sustentável. ', 'A potência deste produto está dentro da média. Seu produto é de boa qualidade econômica, utilize-o moderadamente e não terá problemas em relação ao consumo sustentável. ', 'A potência deste produto é bem acima da média. Seu produto não é econômico, portanto recomenda-se a troca do produto para evitar consumo excessivo.', '05:00:00', '08:00:00', '12:00:00', 50, 80),
(020, 'Videogame', 'http://s2.glbimg.com/tk3m9E29tUAsGuQfGfzsNXXUXLo=/0x600/s.glbimg.com/po/tt2/f/original/2014/09/19/ps3.jpg', 100, '02:00:00', 0, 'O tempo de consumo para este produto está bem abaixo do esperado. Continue utilizando-o dessa forma e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está dentro do esperado. Continue utilizando-o moderadamente e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está um pouco acima do esperado. Tente reduzir o tempo de uso para não ter problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está bem acima do esperado. Reduza o tempo de uso para alcançar seu consumo sustentável.', 'A potência deste produto é abaixo da média. Seu produto é de ótima qualidade econômica, utilize-o normalmente e não terá problemas em relação ao consumo sustentável. ', 'A potência deste produto está dentro da média. Seu produto é de boa qualidade econômica, utilize-o moderadamente e não terá problemas em relação ao consumo sustentável. ', 'A potência deste produto é bem acima da média. Seu produto não é econômico, portanto recomenda-se a troca do produto para evitar consumo excessivo.', '01:00:00', '02:00:00', '03:00:00', 80, 120),
(021, 'Lâmpada fluorescente 11W', 'http://www.severoroth.com.br/media/catalog/product/cache/1/image/d5f7785a9e1c3ab0c4955606ff94c7df/7/9/79057.jpg', 11, '05:00:00', 0, 'O tempo de consumo para este produto está bem abaixo do esperado. Continue utilizando-o dessa forma e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está dentro do esperado. Continue utilizando-o moderadamente e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está um pouco acima do esperado. Tente reduzir o tempo de uso para não ter problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está bem acima do esperado. Reduza o tempo de uso para alcançar seu consumo sustentável.', 'A potência deste produto é abaixo da média. Seu produto é de ótima qualidade econômica, utilize-o normalmente e não terá problemas em relação ao consumo sustentável. ', 'A potência deste produto está dentro da média. Seu produto é de boa qualidade econômica, utilize-o moderadamente e não terá problemas em relação ao consumo sustentável. ', 'A potência deste produto é bem acima da média. Seu produto não é econômico, portanto recomenda-se a troca do produto para evitar consumo excessivo.', '03:00:00', '05:00:00', '07:00:00', 10, 12),
(022, 'Lâmpada fluorescente 15W', 'http://www.severoroth.com.br/media/catalog/product/cache/1/image/d5f7785a9e1c3ab0c4955606ff94c7df/7/9/79057.jpg', 15, '05:00:00', 0, 'O tempo de consumo para este produto está bem abaixo do esperado. Continue utilizando-o dessa forma e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está dentro do esperado. Continue utilizando-o moderadamente e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está um pouco acima do esperado. Tente reduzir o tempo de uso para não ter problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está bem acima do esperado. Reduza o tempo de uso para alcançar seu consumo sustentável.', 'A potência deste produto é abaixo da média. Seu produto é de ótima qualidade econômica, utilize-o normalmente e não terá problemas em relação ao consumo sustentável. ', 'A potência deste produto está dentro da média. Seu produto é de boa qualidade econômica, utilize-o moderadamente e não terá problemas em relação ao consumo sustentável. ', 'A potência deste produto é bem acima da média. Seu produto não é econômico, portanto recomenda-se a troca do produto para evitar consumo excessivo.', '03:00:00', '05:00:00', '07:00:00', 14, 16),
(023, 'Lâmpada fluorescente 23W', 'http://www.severoroth.com.br/media/catalog/product/cache/1/image/d5f7785a9e1c3ab0c4955606ff94c7df/7/9/79057.jpg', 23, '05:00:00', 0, 'O tempo de consumo para este produto está bem abaixo do esperado. Continue utilizando-o dessa forma e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está dentro do esperado. Continue utilizando-o moderadamente e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está um pouco acima do esperado. Tente reduzir o tempo de uso para não ter problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está bem acima do esperado. Reduza o tempo de uso para alcançar seu consumo sustentável.', 'A potência deste produto é abaixo da média. Seu produto é de ótima qualidade econômica, utilize-o normalmente e não terá problemas em relação ao consumo sustentável. ', 'A potência deste produto está dentro da média. Seu produto é de boa qualidade econômica, utilize-o moderadamente e não terá problemas em relação ao consumo sustentável. ', 'A potência deste produto é bem acima da média. Seu produto não é econômico, portanto recomenda-se a troca do produto para evitar consumo excessivo.', '03:00:00', '05:00:00', '07:00:00', 22, 24),
(024, 'Lâmpada incandescente 40W', 'https://www.konkero.com.br/revistawp/wp-content/uploads/2014/04/incandescente.jpg', 40, '05:00:00', 0, 'O tempo de consumo para este produto está bem abaixo do esperado. Continue utilizando-o dessa forma e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está dentro do esperado. Continue utilizando-o moderadamente e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está um pouco acima do esperado. Tente reduzir o tempo de uso para não ter problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está bem acima do esperado. Reduza o tempo de uso para alcançar seu consumo sustentável.', 'A potência deste produto é abaixo da média. Seu produto é de ótima qualidade econômica, utilize-o normalmente e não terá problemas em relação ao consumo sustentável. ', 'A potência deste produto está dentro da média. Seu produto é de boa qualidade econômica, utilize-o moderadamente e não terá problemas em relação ao consumo sustentável. ', 'A potência deste produto é bem acima da média. Seu produto não é econômico, portanto recomenda-se a troca do produto para evitar consumo excessivo.', '03:00:00', '05:00:00', '07:00:00', 39, 41),
(025, 'Lâmpada incandescente 60W', 'https://www.konkero.com.br/revistawp/wp-content/uploads/2014/04/incandescente.jpg', 60, '05:00:00', 0, 'O tempo de consumo para este produto está bem abaixo do esperado. Continue utilizando-o dessa forma e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está dentro do esperado. Continue utilizando-o moderadamente e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está um pouco acima do esperado. Tente reduzir o tempo de uso para não ter problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está bem acima do esperado. Reduza o tempo de uso para alcançar seu consumo sustentável.', 'A potência deste produto é abaixo da média. Seu produto é de ótima qualidade econômica, utilize-o normalmente e não terá problemas em relação ao consumo sustentável. ', 'A potência deste produto está dentro da média. Seu produto é de boa qualidade econômica, utilize-o moderadamente e não terá problemas em relação ao consumo sustentável. ', 'A potência deste produto é bem acima da média. Seu produto não é econômico, portanto recomenda-se a troca do produto para evitar consumo excessivo.', '03:00:00', '05:00:00', '07:00:00', 59, 61),
(026, 'Lâmpada incandescente 100W', 'https://www.konkero.com.br/revistawp/wp-content/uploads/2014/04/incandescente.jpg', 100, '05:00:00', 0, 'O tempo de consumo para este produto está bem abaixo do esperado. Continue utilizando-o dessa forma e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está dentro do esperado. Continue utilizando-o moderadamente e não terá problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está um pouco acima do esperado. Tente reduzir o tempo de uso para não ter problemas em relação ao consumo sustentável do mesmo.', 'O tempo de consumo para este produto está bem acima do esperado. Reduza o tempo de uso para alcançar seu consumo sustentável.', 'A potência deste produto é abaixo da média. Seu produto é de ótima qualidade econômica, utilize-o normalmente e não terá problemas em relação ao consumo sustentável. ', 'A potência deste produto está dentro da média. Seu produto é de boa qualidade econômica, utilize-o moderadamente e não terá problemas em relação ao consumo sustentável. ', 'A potência deste produto é bem acima da média. Seu produto não é econômico, portanto recomenda-se a troca do produto para evitar consumo excessivo.', '03:00:00', '05:00:00', '07:00:00', 99, 101);

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
(04, 'Sala de Estar'),
(09, 'Sala de Jantar'),
(10, 'Área de Serviço'),
(11, 'Sacada'),
(12, 'Escritório'),
(13, 'Circulação');

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
(000002, 'cliente', 'df235f4954e3d2bacac442ed1a5cd0f4', 1),
(000006, 'anderson', '53362244d4abc16fe289e6cf79539f1e', 1),
(000007, 'jean', 'df235f4954e3d2bacac442ed1a5cd0f4', 1);

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
  MODIFY `id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'ID do cliente.', AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de tabela `client_equipment`
--
ALTER TABLE `client_equipment`
  MODIFY `id` int(7) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'ID do equipamento.', AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de tabela `consumption`
--
ALTER TABLE `consumption`
  MODIFY `id` int(7) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'ID do consumo.';
--
-- AUTO_INCREMENT de tabela `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id` tinyint(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'ID do equipamento.', AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT de tabela `room`
--
ALTER TABLE `room`
  MODIFY `id` tinyint(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'ID do cômodo.', AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'ID do usuário.', AUTO_INCREMENT=8;
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
