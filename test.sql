-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2017 at 01:03 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `press`
--

CREATE TABLE `press` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `published_on` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `press`
--

INSERT INTO `press` (`id`, `slug`, `title`, `description`, `published_on`, `created_at`, `updated_at`) VALUES
(1, 'this-is-a-test-press-one', 'This is a Test Press One', 'Vel primis fastidii in, nec et enim nibh, pri cu ornatus consectetuer vituperatoribus. In his delenit appareat qualisque. Sit quas nonumy libris ea. Modo ocurreret cu duo, integre lobortis ea eam, nulla reformidans deterruisset no nec.\r\n\r\nNam ei vidisse intellegam. An electram accommodare est, per cu adhuc latine vivendo, debet ponderum voluptatibus at pri. Moderatius delicatissimi at has. Vim tritani vituperatoribus te, no suas omnesque duo.\r\n\r\nMunere putant habemus ea mel. Cu eum clita maiorum, vel ea sumo feugait prodesset, cum ferri graecis voluptaria ex. Ut ius aliquam omnesque inimicus, an vim quem adhuc. Quo amet dolorum assueverit te, mea natum invenire salutandi ut.\r\n\r\nEx putant euripidis persequeris ius, fabulas accusamus laboramus sit at, ad invenire persecuti mea. Agam aliquam minimum quo an, discere platonem ad mea. Sit dicit omittam et. Mazim audiam perpetua nam an, eam eu aliquip debitis constituam. Zril theophrastus ex sit, dicant qualisque nam te, his te vide dicam aeterno.\r\n\r\nEt mei brute tincidunt appellantur. Vel aeque offendit id, delenit meliore concludaturque vix et, fastidii noluisse tractatos quo no. Assum graecis vix ad, tantas labore labores vel et, sed hinc mollis deserunt an. Et vivendum oportere expetenda nec, ut adhuc malis torquatos ius.\r\n\r\nEx putant euripidis persequeris ius, fabulas accusamus laboramus sit at, ad invenire persecuti mea. Agam aliquam minimum quo an, discere platonem ad mea. Sit dicit omittam et. Mazim audiam perpetua nam an, eam eu aliquip debitis constituam. Zril theophrastus ex sit, dicant qualisque nam te, his te vide dicam aeterno.\r\n\r\nEt mei brute tincidunt appellantur. Vel aeque offendit id, delenit meliore concludaturque vix et, fastidii noluisse tractatos quo no. Assum graecis vix ad, tantas labore labores vel et, sed hinc mollis deserunt an. Et vivendum oportere expetenda nec, ut adhuc malis torquatos ius.', '2017-06-01 00:00:00', '2017-06-24 04:39:54', '0000-00-00 00:00:00'),
(2, 'this-is-a-test-press-two', 'This is a Test Press Two', 'Nam ei vidisse intellegam. An electram accommodare est, per cu adhuc latine vivendo, debet ponderum voluptatibus at pri. Moderatius delicatissimi at has. Vim tritani vituperatoribus te, no suas omnesque duo.\r\n\r\nLorem ipsum dolor sit amet, vel primis fastidii in, nec et enim nibh, pri cu ornatus consectetuer vituperatoribus. In his delenit appareat qualisque. Sit quas nonumy libris ea. Modo ocurreret cu duo, integre lobortis ea eam, nulla reformidans deterruisset no nec.\r\n\r\nNam ei vidisse intellegam. An electram accommodare est, per cu adhuc latine vivendo, debet ponderum voluptatibus at pri. Moderatius delicatissimi at has. Vim tritani vituperatoribus te, no suas omnesque duo.\r\n\r\nMunere putant habemus ea mel. Cu eum clita maiorum, vel ea sumo feugait prodesset, cum ferri graecis voluptaria ex. Ut ius aliquam omnesque inimicus, an vim quem adhuc. Quo amet dolorum assueverit te, mea natum invenire salutandi ut.\r\n\r\nEx putant euripidis persequeris ius, fabulas accusamus laboramus sit at, ad invenire persecuti mea. Agam aliquam minimum quo an, discere platonem ad mea. Sit dicit omittam et. Mazim audiam perpetua nam an, eam eu aliquip debitis constituam. Zril theophrastus ex sit, dicant qualisque nam te, his te vide dicam aeterno.\r\n\r\nEt mei brute tincidunt appellantur. Vel aeque offendit id, delenit meliore concludaturque vix et, fastidii noluisse tractatos quo no. Assum graecis vix ad, tantas labore labores vel et, sed hinc mollis deserunt an. Et vivendum oportere expetenda nec, ut adhuc malis torquatos ius.\r\n\r\nEx putant euripidis persequeris ius, fabulas accusamus laboramus sit at, ad invenire persecuti mea. Agam aliquam minimum quo an, discere platonem ad mea. Sit dicit omittam et. Mazim audiam perpetua nam an, eam eu aliquip debitis constituam. Zril theophrastus ex sit, dicant qualisque nam te, his te vide dicam aeterno.\r\n\r\nEt mei brute tincidunt appellantur. Vel aeque offendit id, delenit meliore concludaturque vix et, fastidii noluisse tractatos quo no. Assum graecis vix ad, tantas labore labores vel et, sed hinc mollis deserunt an. Et vivendum oportere expetenda nec, ut adhuc malis torquatos ius.', '2017-06-04 00:00:00', '2017-06-24 04:40:11', '0000-00-00 00:00:00'),
(3, 'this-is-a-test-press-three', 'This is a Test Press Three', 'Lorem ipsum dolor sit amet, vel primis fastidii in, nec et enim nibh, pri cu ornatus consectetuer vituperatoribus. In his delenit appareat qualisque. Sit quas nonumy libris ea. Modo ocurreret cu duo, integre lobortis ea eam, nulla reformidans deterruisset no nec.\r\n\r\nNam ei vidisse intellegam. An electram accommodare est, per cu adhuc latine vivendo, debet ponderum voluptatibus at pri. Moderatius delicatissimi at has. Vim tritani vituperatoribus te, no suas omnesque duo.\r\n\r\nMunere putant habemus ea mel. Cu eum clita maiorum, vel ea sumo feugait prodesset, cum ferri graecis voluptaria ex. Ut ius aliquam omnesque inimicus, an vim quem adhuc. Quo amet dolorum assueverit te, mea natum invenire salutandi ut.\r\n\r\nEx putant euripidis persequeris ius, fabulas accusamus laboramus sit at, ad invenire persecuti mea. Agam aliquam minimum quo an, discere platonem ad mea. Sit dicit omittam et. Mazim audiam perpetua nam an, eam eu aliquip debitis constituam. Zril theophrastus ex sit, dicant qualisque nam te, his te vide dicam aeterno.\r\n\r\nEt mei brute tincidunt appellantur. Vel aeque offendit id, delenit meliore concludaturque vix et, fastidii noluisse tractatos quo no. Assum graecis vix ad, tantas labore labores vel et, sed hinc mollis deserunt an. Et vivendum oportere expetenda nec, ut adhuc malis torquatos ius.\r\n\r\nEx putant euripidis persequeris ius, fabulas accusamus laboramus sit at, ad invenire persecuti mea. Agam aliquam minimum quo an, discere platonem ad mea. Sit dicit omittam et. Mazim audiam perpetua nam an, eam eu aliquip debitis constituam. Zril theophrastus ex sit, dicant qualisque nam te, his te vide dicam aeterno.\r\n\r\nEt mei brute tincidunt appellantur. Vel aeque offendit id, delenit meliore concludaturque vix et, fastidii noluisse tractatos quo no. Assum graecis vix ad, tantas labore labores vel et, sed hinc mollis deserunt an. Et vivendum oportere expetenda nec, ut adhuc malis torquatos ius.', '2017-06-06 00:00:00', '2017-06-24 03:40:25', '0000-00-00 00:00:00'),
(4, 'this-is-a-test-press-four', 'This is a Test Press Four', 'Nam ei vidisse intellegam. An electram accommodare est, per cu adhuc latine vivendo, debet ponderum voluptatibus at pri. Moderatius delicatissimi at has. Vim tritani vituperatoribus te, no suas omnesque duo.\r\n\r\nMunere putant habemus ea mel. Cu eum clita maiorum, vel ea sumo feugait prodesset, cum ferri graecis voluptaria ex. Ut ius aliquam omnesque inimicus, an vim quem adhuc. Quo amet dolorum assueverit te, mea natum invenire salutandi ut.\r\n\r\nEx putant euripidis persequeris ius, fabulas accusamus laboramus sit at, ad invenire persecuti mea. Agam aliquam minimum quo an, discere platonem ad mea. Sit dicit omittam et. Mazim audiam perpetua nam an, eam eu aliquip debitis constituam. Zril theophrastus ex sit, dicant qualisque nam te, his te vide dicam aeterno.\r\n\r\nEt mei brute tincidunt appellantur. Vel aeque offendit id, delenit meliore concludaturque vix et, fastidii noluisse tractatos quo no. Assum graecis vix ad, tantas labore labores vel et, sed hinc mollis deserunt an. Et vivendum oportere expetenda nec, ut adhuc malis torquatos ius.\r\n\r\nEx putant euripidis persequeris ius, fabulas accusamus laboramus sit at, ad invenire persecuti mea. Agam aliquam minimum quo an, discere platonem ad mea. Sit dicit omittam et. Mazim audiam perpetua nam an, eam eu aliquip debitis constituam. Zril theophrastus ex sit, dicant qualisque nam te, his te vide dicam aeterno.\r\n\r\nEt mei brute tincidunt appellantur. Vel aeque offendit id, delenit meliore concludaturque vix et, fastidii noluisse tractatos quo no. Assum graecis vix ad, tantas labore labores vel et, sed hinc mollis deserunt an. Et vivendum oportere expetenda nec, ut adhuc malis torquatos ius.', '2017-06-08 00:00:00', '2017-06-24 04:40:38', '0000-00-00 00:00:00'),
(5, 'this-is-a-test-press-five', 'This is a Test Press Five', 'Et mei brute tincidunt appellantur. Vel aeque offendit id, delenit meliore concludaturque vix et, fastidii noluisse tractatos quo no. Assum graecis vix ad, tantas labore labores vel et, sed hinc mollis deserunt an. Et vivendum oportere expetenda nec, ut adhuc malis torquatos ius.\r\n\r\nLorem ipsum dolor sit amet, vel primis fastidii in, nec et enim nibh, pri cu ornatus consectetuer vituperatoribus. In his delenit appareat qualisque. Sit quas nonumy libris ea. Modo ocurreret cu duo, integre lobortis ea eam, nulla reformidans deterruisset no nec.\r\n\r\nNam ei vidisse intellegam. An electram accommodare est, per cu adhuc latine vivendo, debet ponderum voluptatibus at pri. Moderatius delicatissimi at has. Vim tritani vituperatoribus te, no suas omnesque duo.\r\n\r\nMunere putant habemus ea mel. Cu eum clita maiorum, vel ea sumo feugait prodesset, cum ferri graecis voluptaria ex. Ut ius aliquam omnesque inimicus, an vim quem adhuc. Quo amet dolorum assueverit te, mea natum invenire salutandi ut.\r\n\r\nEx putant euripidis persequeris ius, fabulas accusamus laboramus sit at, ad invenire persecuti mea. Agam aliquam minimum quo an, discere platonem ad mea. Sit dicit omittam et. Mazim audiam perpetua nam an, eam eu aliquip debitis constituam. Zril theophrastus ex sit, dicant qualisque nam te, his te vide dicam aeterno.\r\n\r\nEx putant euripidis persequeris ius, fabulas accusamus laboramus sit at, ad invenire persecuti mea. Agam aliquam minimum quo an, discere platonem ad mea. Sit dicit omittam et. Mazim audiam perpetua nam an, eam eu aliquip debitis constituam. Zril theophrastus ex sit, dicant qualisque nam te, his te vide dicam aeterno.\r\n\r\nEt mei brute tincidunt appellantur. Vel aeque offendit id, delenit meliore concludaturque vix et, fastidii noluisse tractatos quo no. Assum graecis vix ad, tantas labore labores vel et, sed hinc mollis deserunt an. Et vivendum oportere expetenda nec, ut adhuc malis torquatos ius.', '2017-06-09 00:00:00', '2017-06-24 04:40:56', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `locked` tinyint(1) NOT NULL DEFAULT '0',
  `active_hash` varchar(255) DEFAULT NULL,
  `recover_hash` varchar(255) DEFAULT NULL,
  `remember_identifier` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email_address`, `first_name`, `last_name`, `mobile_number`, `password`, `token`, `active`, `locked`, `active_hash`, `recover_hash`, `remember_identifier`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, '517977', 'johndoe@domain.com', 'John', 'Doe', '+660000000000', '$2y$10$Jew19AururJc.CPvXEuUoeLOnmmBm12zBEbhrNnHt6W9XKQ/VVu2O', '', 1, 0, NULL, NULL, NULL, NULL, '2017-06-24 10:10:57', '2017-06-24 11:00:40'),
(6, '517978', 'jaynedoe@domain.com', 'Jayne', 'Doe', '+660000000000', '$2y$10$Jew19AururJc.CPvXEuUoeLOnmmBm12zBEbhrNnHt6W9XKQ/VVu2O', '', 1, 0, NULL, NULL, NULL, NULL, '2017-06-24 10:10:57', '2017-06-24 10:46:09');

-- --------------------------------------------------------

--
-- Table structure for table `users_permissions`
--

CREATE TABLE `users_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_administrator` tinyint(1) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `is_staff` tinyint(1) NOT NULL,
  `is_user` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_permissions`
--

INSERT INTO `users_permissions` (`id`, `user_id`, `is_administrator`, `is_admin`, `is_staff`, `is_user`, `created_at`, `updated_at`) VALUES
(5, 5, 1, 0, 0, 0, '2017-06-24 10:10:58', '2017-06-24 10:10:58'),
(6, 6, 0, 0, 0, 1, '2017-06-24 10:10:58', '2017-06-24 10:10:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `press`
--
ALTER TABLE `press`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_permissions`
--
ALTER TABLE `users_permissions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `press`
--
ALTER TABLE `press`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users_permissions`
--
ALTER TABLE `users_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
