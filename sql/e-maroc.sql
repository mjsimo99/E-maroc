-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2022 at 05:40 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `electramaroc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `catégorie`
--

CREATE TABLE `catégorie` (
  `IdCat` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `IdCl` int(11) NOT NULL,
  `nom complet` varchar(50) NOT NULL,
  `numéro de téléphone` int(11) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `ville` int(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `IdCmnd` int(11) NOT NULL,
  `date de création` date NOT NULL,
  `date d’envoi` date NOT NULL,
  `date de livraison` date NOT NULL,
  `id client` int(11) NOT NULL,
  `produits composant` int(11) NOT NULL,
  `prix unitaire` int(11) NOT NULL,
  `quantité` int(11) NOT NULL,
  `prix total` int(11) NOT NULL,
  `prix total de la commande` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE `produit` (
  `IdPrd` int(11) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  `code barre` varchar(50) NOT NULL,
  `prix d’achat` int(11) NOT NULL,
  `prix final` int(11) NOT NULL,
  `Prix offre` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `catégorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produits composant`
--

CREATE TABLE `produits composant` (
  `IdPrd` int(11) NOT NULL,
  `IdCmnd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `login` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `TYPEACC` varchar(50) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`login`, `Password`, `email`, `TYPEACC`, `id`) VALUES
('mama', 'mama', 'mama', '0', 1),
('', '', '', '0', 2),
('', '', '', '0', 3),
('', '', '', '0', 4),
('jjkjdskjds', 'kjdsksdsjkd', 'sdsqdqjsd@sqqkjsdq.com', '0', 5),
('', '', 'sjdjqksdqkjd', '0', 6),
('marwaneaitelhaj001', 'WACwac123', 'marwaneaitelhaj001@gmail.com', '0', 7),
('admin', 'admin', 'admin', 'admin', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catégorie`
--
ALTER TABLE `catégorie`
  ADD PRIMARY KEY (`IdCat`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`IdCl`);

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`IdCmnd`),
  ADD KEY `id client` (`id client`);

--
-- Indexes for table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`IdPrd`),
  ADD KEY `catégorie` (`catégorie`);

--
-- Indexes for table `produits composant`
--
ALTER TABLE `produits composant`
  ADD KEY `IdPrd` (`IdPrd`),
  ADD KEY `IdCmnd` (`IdCmnd`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catégorie`
--
ALTER TABLE `catégorie`
  MODIFY `IdCat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `IdCl` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
  MODIFY `IdCmnd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produit`
--
ALTER TABLE `produit`
  MODIFY `IdPrd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`id client`) REFERENCES `client` (`IdCl`);

--
-- Constraints for table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`catégorie`) REFERENCES `catégorie` (`IdCat`);

--
-- Constraints for table `produits composant`
--
ALTER TABLE `produits composant`
  ADD CONSTRAINT `produits composant_ibfk_1` FOREIGN KEY (`IdPrd`) REFERENCES `produit` (`IdPrd`),
  ADD CONSTRAINT `produits composant_ibfk_2` FOREIGN KEY (`IdCmnd`) REFERENCES `commande` (`IdCmnd`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
