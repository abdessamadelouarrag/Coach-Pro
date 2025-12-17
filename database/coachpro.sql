-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 17, 2025 at 03:04 PM
-- Server version: 8.0.44
-- PHP Version: 8.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coachpro`
--

-- --------------------------------------------------------

--
-- Table structure for table `disponibilite`
--

CREATE TABLE `disponibilite` (
  `id_disponibilite` int NOT NULL,
  `date` date NOT NULL,
  `heure_debut` time NOT NULL,
  `heure_fin` time NOT NULL,
  `id_coach` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `disponibilite`
--

INSERT INTO `disponibilite` (`id_disponibilite`, `date`, `heure_debut`, `heure_fin`, `id_coach`) VALUES
(1, '2025-01-10', '09:00:00', '10:00:00', 2),
(2, '2025-01-11', '14:00:00', '15:00:00', 2),
(3, '2025-12-18', '09:00:00', '11:00:00', 1),
(4, '2025-12-18', '14:00:00', '16:00:00', 2),
(5, '2025-12-19', '08:00:00', '10:00:00', 3),
(6, '2025-12-19', '12:00:00', '14:00:00', 4),
(7, '2025-12-20', '15:00:00', '17:00:00', 5);

-- --------------------------------------------------------

--
-- Table structure for table `info_coach`
--

CREATE TABLE `info_coach` (
  `id_coach` int DEFAULT NULL,
  `specialite` varchar(50) DEFAULT NULL,
  `experiences` text,
  `certification` text,
  `bio` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `info_coach`
--

INSERT INTO `info_coach` (`id_coach`, `specialite`, `experiences`, `certification`, `bio`) VALUES
(1, 'Fitness', '5 ans experience', 'Certificat IFBB', 'Coach professionnel fitness'),
(2, 'Cardio', '3 ans experience', 'Certificat cardio', 'Specialiste cardio'),
(3, 'Yoga', '5 ans', 'Yoga Alliance', 'Coach passionné de Yoga, axé sur la relaxation et le bien-être.'),
(4, 'Fitness', '3 ans', 'Personal Trainer Certifié', 'Coach dynamique spécialisé dans le renforcement musculaire et la remise en forme.'),
(5, 'Natation', '7 ans', 'Certificat Natation Compétitive', 'Coach expérimenté en natation, formateur pour tous niveaux.');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id_reservation` int NOT NULL,
  `date_reservation` date NOT NULL,
  `id_sportif` int NOT NULL,
  `id_coach` int NOT NULL,
  `id_disponibilite` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id_reservation`, `date_reservation`, `id_sportif`, `id_coach`, `id_disponibilite`) VALUES
(1, '2025-01-10', 1, 2, 1),
(2, '2025-01-11', 1, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_user` int NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `mot_de_passe` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_user`, `nom`, `email`, `mot_de_passe`, `role`) VALUES
(1, 'Sed ea veritatis dol', 'quhusoga@mailinator.com', '$2y$10$SbGsqWXoRyNKAhtsSJVv/Oi256RLUrK47YdsvUtOYwfik47w3Uu1y', 'on'),
(2, 'Et eiusmod aliqua D', 'xusyry@mailinator.com', '$2y$10$BfBUFeRY8tLLYse2O5TMpOfAHmB.aMdiTt.mEQN1onAnb2AEqynPG', 'on'),
(3, 'elouarrag', 'AAAA4804@gmail.com', '$2y$10$/BKiYUgnPOqRseAnu5R.2e.QGsNNlnXe1ScoTBV0V3T5kzW0TbJUu', ''),
(4, 'Assumenda odio beata', 'topoxyhy@mailinator.com', '$2y$10$fozYNXdS.cPZlyFmOwcaPuqQqpTexREvp6UWMlis2rR/Cbh4lTjgu', 'Coach'),
(5, 'Assumenda odio beata', 'topoxyhy@mailinator.com', '$2y$10$ldgPeQlYl7RsNEhReCfRfum.nMkb9JGewpaTBdaejmuQYCHDbTIJm', 'Sportif'),
(6, '', '', '$2y$10$tgUL7k7qF/w1s/Qi0MV6dOfc.gr4fwzT0bhGftD8Kw6fZMpcMK8HK', ''),
(7, 'Non cumque tempor eo', 'cyjeqonu@mailinator.com', '$2y$10$BSji/cceRh9OpCId5JzSC.Cylx85t9YNcNalFgYeOUdRdmdxfT53i', 'Sportif'),
(8, 'Quidem maxime pariat', 'mehyzefez@mailinator.com', '$2y$10$QjUEh4PYP4s4w4lWPtKibe2pPJxN6hO2Sg3Jz.XN5v7o1yQVRprLC', 'test2'),
(9, 'Quod eiusmod duis mo', 'kaxibo@mailinator.com', '$2y$10$/xER2i..vC3J/opbcBKlveB31xtSZnWK9YSbOCRoRFvEMrsgZ/Wm.', 'Coach'),
(10, 'Quod eiusmod duis mo', 'kaxibo@mailinator.com', '$2y$10$yQChvtLJIVw/o/7iEebD4.tCAs3h61Oz4twUF/W6aP.HZt070u/.y', 'Sportif'),
(11, 'Mollitia totam offic', 'tacekyb@mailinator.com', '$2y$10$nACmMQL74LW9mpUv4sJ9i.oTkxM52DwShmfEqkOb9h0SMqk.up1Nq', 'Sportif'),
(12, 'Ali Sportif', 'ali@sport.com', '$2y$hash1', 'sportif'),
(13, 'Youssef Coach', 'youssef@coach.com', '$2y$hash2', 'coach'),
(14, 'Delenit333', 'busujebolo@mailinator.com', '$2y$10$8IFOvhO7QOEGpc8F4yqkZ.ZnEQQ9ee4DSKJZ.ojjcPJWfBOTs6/7S', 'Coach'),
(15, 'Com44', 'vecucytove@mailinator.com', '$2y$10$UBLPAOVxWAZKvJqJFq1t6eJA5U4JThFpzpK0EVZsEvFCOdFOVhE/O', 'Coach'),
(16, 'Doloremqu3', 'larykexe@mailinator.com', '$2y$10$vYd3lShHCdLlpA1f8prRy./9wJ0hoUeYu5idcfBOH47G8fhcBbrBK', 'Coach'),
(17, 'Aliqui22', 'nowodusad@mailinator.com', '$2y$10$rveE45mkxqp.FHiETnAdmuRMwyXGzc7tlFKBPCRbI/zvp7pWo01p2', 'Sportif'),
(18, 'Aliqui22', 'nowodusad@mailinator.com', '$2y$10$k8KoT8/UAlN13aBDwgfMXOQu6p4o8yGk/6MH1..5313E/8rRCC6Uq', 'Sportif'),
(19, 'Aliqui22', 'nowodusad@mailinator.com', '$2y$10$Dgr4NHPQ6HQL5Hn0u9u/V.8ygoMftda12dn0J1ShlGgid4a0hqO5G', 'Sportif'),
(20, 'Dolor et mollit omni', 'vijof@mailinator.com', '$2y$10$QAIZ4MzSYPt.yZoAAejPEeADiyoDdn3S0yGR.r0OYgqgmb6DQsLvG', 'Coach'),
(21, 'Doloremqu3', 'larykexe@mailinator.com', '$2y$10$dB9nX31qdw4sKB86zBQ9R.mWrLeA60X6SvIPhnkSYw2mtdIBKWRBW', 'Coach'),
(22, 'Vitae sit voluptate', 'hugypig@mailinator.com', '$2y$10$W51rSbz./.cUh7iZ2hZRd.z7pR8YHRItx1i0EbjH7.agv7ZA.qXI.', 'Coach'),
(23, 'Vitae222', 'hugypig@mailinator.com', '$2y$10$ifCnqd13jVJNV8Sy0ggyNOaY3RaN5Jpma5QQQtlOcaFPYAYgAzGNG', 'Coach'),
(24, 'Vitae222', 'hugypig@mailinator.com', '$2y$10$S8082EbxW8nOqfkq1QUpyOx7Q6jdKvEFycNIO3yyqPtPsDpjuT0Q6', 'Coach'),
(25, 'Aliquid333', 'vusuhoj@mailinator.com', '$2y$10$35Slff9cD7SDb3KNX58ZveLQj3KbHp287J2rg5b0NFKHoSVmIdJYS', 'Sportif'),
(26, '', '', '$2y$10$QXmg4FZpe4AMnWe6SfEQ5eYS16RZZKxH28hkb3UmXRD6vh7GIDkfS', ''),
(27, 'Reiciendis33', 'fesitinu@mailinator.com', '$2y$10$rkLbFpn4TOTGA7XH0H6T1u6bMqp5DzK.mbJmv0zZnDOYAWCYJ6mWq', 'Coach'),
(28, 'Beatae tenetur', 'ryxawawufa@mailinator.com', '$2y$10$Aa4phqmEwXer/D3pMY/Q0ebBHcPCq.waU8GwPbPlhbA0a04X.r1Sq', 'Coach'),
(29, 'Beatae tenetur', 'ryxawawufa@mailinatorcom', '$2y$10$EJqzh359XN8lOFrEBciZbeIoz7nJCkeoqY2GcflRLl6W1whIPK2Ei', 'Coach'),
(30, 'Essemmm rtr', 'vogakoroza@mailinatorc.om', '$2y$10$sGZRfnlB1nDNlCedSID0EubLLyRvY.BDsfrrCl6vN9rxeHRXvI5Oa', 'Sportif'),
(31, 'Essemmm rtr', 'vogakoroza@mailinatorc.om', '$2y$10$EEpT/SYcDM.rqab8pf0BKuxsHoyi3ww.pbKcKUj6DXpOmEuWbdhNW', 'Sportif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disponibilite`
--
ALTER TABLE `disponibilite`
  ADD PRIMARY KEY (`id_disponibilite`),
  ADD KEY `id_coach` (`id_coach`);

--
-- Indexes for table `info_coach`
--
ALTER TABLE `info_coach`
  ADD KEY `id_coach` (`id_coach`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_reservation`),
  ADD KEY `id_sportif` (`id_sportif`),
  ADD KEY `id_coach` (`id_coach`),
  ADD KEY `id_disponibilite` (`id_disponibilite`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disponibilite`
--
ALTER TABLE `disponibilite`
  MODIFY `id_disponibilite` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_reservation` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `disponibilite`
--
ALTER TABLE `disponibilite`
  ADD CONSTRAINT `disponibilite_ibfk_1` FOREIGN KEY (`id_coach`) REFERENCES `info_coach` (`id_coach`);

--
-- Constraints for table `info_coach`
--
ALTER TABLE `info_coach`
  ADD CONSTRAINT `info_coach_ibfk_1` FOREIGN KEY (`id_coach`) REFERENCES `utilisateurs` (`id_user`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`id_sportif`) REFERENCES `utilisateurs` (`id_user`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`id_coach`) REFERENCES `info_coach` (`id_coach`),
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`id_disponibilite`) REFERENCES `disponibilite` (`id_disponibilite`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
