-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 15, 2022 at 12:04 PM
-- Server version: 8.0.31
-- PHP Version: 7.4.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itcheatsheets`
--

-- --------------------------------------------------------

--
-- Table structure for table `appuser`
--

CREATE TABLE `appuser` (
  `id` int NOT NULL,
  `username` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `privilege_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appuser`
--

INSERT INTO `appuser` (`id`, `username`, `password`, `privilege_id`) VALUES
(1, 'admin', 'a29c57c6894dee6e8251510d58c07078ee3f49bf', 1),
(2, 'invited', '6d8f3b24c09682ee9dfef083cffda71534735f11', 2);

-- --------------------------------------------------------

--
-- Table structure for table `demo`
--

CREATE TABLE `demo` (
  `id` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(3000) COLLATE utf8mb4_general_ci NOT NULL,
  `item_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int NOT NULL,
  `name` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `further` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'pdf, images, txt...',
  `skill_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `name`, `description`, `further`, `skill_id`) VALUES
(4, 'Foreign key', 'ALTER TABLE urls\\r\\nADD CONSTRAINT fk_urls_skill_id\\r\\nFOREIGN KEY (skill_id)\\r\\nREFERENCES skill(id);', 'https://www.w3schools.com/sql/sql_ref_foreign_key.asp', 5),
(8, 'Factory Design pattern', 'The Factory Design Pattern is a creational design pattern that provides a way to create objects without having to specify the exact class of the object that will be created. It involves a factory class that has a method that receives parameters and returns an object of a class that is specified by the parameters. The Factory Design Pattern is useful when there is a need to create objects of different types.', 'https://www.geeksforgeeks.org/factory-method-design-pattern-in-java/', 4),
(11, 'Cheat-Sheet', '', 'php-cheat-sheet.pdf', 1),
(16, 'Rename Table', 'RENAME TABLE old_table TO new_table;', 'https://mariadb.com/kb/en/rename-table/', 5),
(17, 'Current directory path', '__DIR__', 'https://www.tutorialspoint.com/how-to-use-dir-in-php', 1),
(18, 'Website root path', 'ROOTDIR', 'https://www.php.net/manual/en/reserved.variables.server.php', 1),
(19, 'Reference website OpenAI', 'Text completion, Generate and edit text, Image generation, Train a model for your use case...', 'https://beta.openai.com/docs/quickstart/start-with-an-instruction', 6),
(20, 'W3schools', 'Php, Css, Html, SQL, AI, Javascript...', 'https://www.w3schools.com/default.asp', 36),
(21, 'php.net', 'Only PHP', 'https://www.php.net/', 36),
(22, 'Grafikart', 'Tutorial Php, JS, TS, Html, Css, Vue', 'https://grafikart.fr', 36),
(23, 'W3docs', 'Tutorial Html5, Css, Git, JS, PHP', 'https://www.w3docs.com/', 36),
(24, 'Icon library', 'Free icons library', 'https://icon-library.com/', 7),
(26, 'Icon library', 'Free icons library', NULL, 7);

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `id` int NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(300) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `note`
--

INSERT INTO `note` (`id`, `name`, `description`) VALUES
(1, 'English', 'practice one hour each day.'),
(2, 'R&D', 'review the Java part project architecture'),
(3, 'PHP', 'Project Tips&Notes, OOP Grafikart, Udemy OOP'),
(11, 'Exercise', 'Do physical exercise each day, at least half an hour');

-- --------------------------------------------------------

--
-- Table structure for table `privilege`
--

CREATE TABLE `privilege` (
  `id` int NOT NULL,
  `name` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(40) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `privilege`
--

INSERT INTO `privilege` (`id`, `name`, `description`) VALUES
(1, 'master', 'All Privileges'),
(2, 'Invited', 'Reading Only');

-- --------------------------------------------------------

--
-- Table structure for table `skill`
--

CREATE TABLE `skill` (
  `id` int NOT NULL,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `logo` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skill`
--

INSERT INTO `skill` (`id`, `name`, `logo`) VALUES
(1, 'PHP', 'php.png'),
(2, 'Python', 'python.png'),
(3, 'Linux', 'linux.png'),
(4, 'OOP', 'oop.webp'),
(5, 'MySQL', 'mysql.png'),
(6, 'AI', 'ai.png'),
(7, 'HTML', 'html-logo.svg'),
(36, 'IT', 'IT.png'),
(37, 'Java', 'java.png');

-- --------------------------------------------------------

--
-- Table structure for table `url`
--

CREATE TABLE `url` (
  `id` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `url` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `item_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `url`
--

INSERT INTO `url` (`id`, `name`, `url`, `item_id`) VALUES
(1, 'SQL Foreign Key', 'https://www.folkstalk.com/2022/09/create-foreign-key-phpmyadmin-with-code-examples.html', 4),
(2, 'AI OpenAI', 'https://beta.openai.com/docs/quickstart/start-with-an-instruction', 11),
(6, 'Python Sandbox in Google Colab', 'https://colab.research.google.com/drive/1PZShdlNNsHHE__y1SiWB_EVh-EDBjMXS?authuser=1', 8),
(13, 'Php Sandbox onlinePhp Url', 'https://onlinephp.io/', 16);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appuser`
--
ALTER TABLE `appuser`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_appuser_privilege_id` (`privilege_id`);

--
-- Indexes for table `demo`
--
ALTER TABLE `demo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_demo_item_id` (`item_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `skill_id` (`skill_id`);

--
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privilege`
--
ALTER TABLE `privilege`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `url`
--
ALTER TABLE `url`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_url_item_id` (`item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appuser`
--
ALTER TABLE `appuser`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `demo`
--
ALTER TABLE `demo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `privilege`
--
ALTER TABLE `privilege`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `skill`
--
ALTER TABLE `skill`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `url`
--
ALTER TABLE `url`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appuser`
--
ALTER TABLE `appuser`
  ADD CONSTRAINT `fk_appuser_privilege_id` FOREIGN KEY (`privilege_id`) REFERENCES `privilege` (`id`);

--
-- Constraints for table `demo`
--
ALTER TABLE `demo`
  ADD CONSTRAINT `fk_demo_item_id` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`);

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`skill_id`) REFERENCES `skill` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `url`
--
ALTER TABLE `url`
  ADD CONSTRAINT `fk_url_item_id` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
