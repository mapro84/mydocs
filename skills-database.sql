-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 22, 2023 at 09:18 PM
-- Server version: 8.0.31-0ubuntu0.22.04.1
-- PHP Version: 8.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skills`
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
  `description` varchar(3000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `item_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `demo`
--

INSERT INTO `demo` (`id`, `name`, `description`, `item_id`) VALUES
(8, 'Factory', 'Design pattern', 8),
(12, 'DIC', 'Dependency Injection Container Pattern\'', 69),
(14, 'Fluent', 'A fluent interface provides an easy-readable. Using this pattern results in code that can be read nearly as human language.', 55),
(15, 'Facade', 'Facade is a structural design pattern that provides a simplified interface to a library, a framework, or any other complex set of classes.', 77),
(16, 'Closure', 'Anonymous functions yield objects of this type. This class has methods that allow further control of the anonymous function after it has been created. ', 78),
(17, 'PhpNews', 'What\'s new in PHP from 7.0', 74),
(18, 'Docker', 'Docker cmds', 106);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int NOT NULL,
  `name` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `further` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'pdf, images, txt...',
  `skill_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `name`, `description`, `further`, `skill_id`) VALUES
(4, 'Foreign key', 'ALTER TABLE urls ADD CONSTRAINT fk_urls_skill_id FOREIGN KEY (skill_id) REFERENCES skill(id);', 'https://www.w3schools.com/sql/sql_ref_foreign_key.asp', 5),
(8, 'OOP: Factory Design pattern', 'The Factory Design Pattern provides a way to create objects.<br> The factory has a method that receives parameters and returns a class.', 'https://refactoring.guru/design-patterns/factory-method/php/example#lang-features', 4),
(11, 'PHP: PDF Cheat-Sheet', '', 'php-cheat-sheet.pdf', 1),
(16, 'SQL: Rename Table', 'RENAME TABLE old_table TO new_table;', 'https://mariadb.com/kb/en/rename-table/', 5),
(17, 'PHP: Current directory path', '__DIR__', 'https://www.tutorialspoint.com/how-to-use-dir-in-php', 1),
(18, 'PHP: Website root path', 'ROOTDIR', 'https://www.php.net/manual/en/reserved.variables.server.php', 1),
(19, 'AI: Reference website OpenAI', 'Text completion, Generate and edit text, Image generation, Train a model for your use case...', 'https://beta.openai.com/docs/quickstart/start-with-an-instruction', 6),
(20, 'IT: W3schools Tutorial', 'Php, Css, Html, SQL, AI, Javascript, Python, NodeJS, React, R,<br>JQuery, C, C++, C#, Typescript, Django, Mysql, Bootstrap, Java, Mysql, W3Css', 'https://www.w3schools.com/default.asp', 36),
(21, 'PHP: Website', 'php.net', 'https://www.php.net/', 1),
(22, 'IT: Grafikart', 'Tutorial Php, JS, TS, Html, Css, Vue', 'https://grafikart.fr', 36),
(23, 'IT: W3docs', 'Tutorial Html5, Css, Git, JS, PHP', 'https://www.w3docs.com/', 36),
(24, 'HTML: Icon library', 'Free icons library', 'https://icon-library.com/', 7),
(27, 'Git: Github', 'Git Versioning projects', 'https://github.com', 45),
(28, 'IT: jsfiddle', 'Html, css and javascript sandbox', 'http://jsfiddle.net', 36),
(29, 'IT: geeksforgeeks', 'Tutorials AI, Java, Python, C++, Data-Science, JS, Machine-learning', 'https://www.geeksforgeeks.org/', 36),
(31, 'Python: Python: Google Sandbox', 'Python Sandbox', 'https://colab.research.google.com/drive/1PZShdlNNsHHE__y1SiWB_EVh-EDBjMXS?authuser=1#scrollTo=C4HZx7Gndbrh', 2),
(35, 'HTML: Title attribute', 'Improve display', 'https://www.manalite.com/goodies/title.php', 7),
(36, 'IT: Udemy', 'Paid IT training', 'https://www.udemy.com', 36),
(37, 'IT: PluralSight', 'Paid IT training plateform', 'https://www.pluralsight.com', 36),
(38, 'English: SentenceChecker', 'Check english written sentences', 'https://sentencechecker.com/', 38),
(39, 'English: Wordtune', 'Checks Sentences, corrects and offers variants', 'https://app.wordtune.com/editor/', 38),
(42, 'English: grammar exercises', 'Grammer exercises, tests', 'https://www.englisch-hilfen.de/en', 38),
(43, 'Deepl Translation', 'Languages translations (English, Italian...)', 'https://www.deepl.com/translator', 38),
(44, 'Reverso Translation', 'Languages translations (English, Italian...)', 'https://www.reverso.net/text-translation', 38),
(46, 'Linguee Translation', 'Languages translations (English, Italian...)', 'https://www.linguee.fr/', 38),
(47, 'Quillbot Translation & variant', 'English Sentence Checker and variant', 'https://quillbot.com/', 38),
(48, 'IT: Roadmap', 'Guides and other educational content for developers', 'https://roadmap.sh', 36),
(50, 'Python: App.programiz.pro', 'Tutorial', 'https://app.programiz.pro/', 2),
(51, 'Python: OPenclassroom', 'Tutorial', 'https://openclassrooms.com/fr/courses/7771531-decouvrez-les-librairies-python-pour-la-data-science/7857178-creez-votre-premier-data-frame-avec-pandas', 2),
(52, 'Linux: Linode Cheat', 'Cheat in command line', 'https://www.linode.com/docs/guides/linux-cheat-command/', 3),
(53, 'Excel: Sheetformula', 'AI Excel Formula ', 'https://sheetformula.com/genformula.html', 40),
(54, 'HTML: Copocorp', 'Html Special characters', 'http://copocorp.free.fr/caracteresSpeciaux/', 7),
(55, 'OOP: Fluent Design Pattern', 'The Builder design pattern is not the same as the Fluent Interface idiom (that relies on method chaining), although Rust developers sometimes use those terms interchangeably.\r\nFluent Interface is a way to chain methods for constructing or modifying an object. \r\nWhile the Builder pattern also suggests constructing object step by step, it also lets you build different types of products using the same construction process.\r\n', 'https://designpatternsphp.readthedocs.io/en/latest/Structural/FluentInterface/README.html', 4),
(56, 'IT: Alwasdata', 'Web Hosting, Administration, Api', 'https://admin.alwaysdata.com/', 36),
(58, 'IT: Reqbin.com', 'Curl, Rest & SOAP API Online, Python, PHP, Javascript, Java, Xml, Json', 'https://reqbin.com/curl', 36),
(62, 'PHP: packagist.org Curl', 'Php Curl', 'https://packagist.org/packages/curl/curl', 1),
(63, 'IT: OpenClassRoom', 'Api Tutorial', 'https://openclassrooms.com/fr/courses/6573181-adoptez-les-api-rest-pour-vos-projets-web', 36),
(64, 'PHP: PHP version Switching', 'sudo a2dismod php8.1;\r\n<br>sudo a2enmod php8.2;', NULL, 3),
(66, 'PHP: waytolearnx', 'Rest Api Tutorial', 'https://waytolearnx.com/2019/07/creer-et-utiliser-une-api-rest-en-php.html', 1),
(67, 'PHP: waytolearnx', 'PHP Curl Tutorial', 'https://waytolearnx.com/2020/01/tutoriel-curl-en-php.html', 1),
(69, 'OOP: Dependency Injection', 'High-level classes shouldn’t depend on low-level classes. Both should depend on abstractions. ', 'https://php.developpez.com/tutoriels/php-la-bonne-pratique/?page=injection-de-dependances', 4),
(70, 'Linux: Chmod', 'Online Chmod Calculator', 'https://chmod-calculator.com/', 3),
(71, 'Chown', 'Chown marcus myfile.txt', 'https://www.computerhope.com/unix/uchown.htm\r\n', 3),
(72, 'PHP: Diplay errors', 'Diplay PHP errors', 'https://stackify.com/display-php-errors/', 1),
(73, 'Apache: Enable or disable an apache Module', 'a2enmod, a2dismod - enable or disable an apache2 module', 'https://manpages.ubuntu.com/manpages/trusty/man8/a2enmod.8.html', 44),
(74, 'PHP: PHP8 News', 'What\'s new in PHP8', 'https://kinsta.com/fr/blog/php-8', 1),
(75, 'PHP: mixed type', 'All of these types: object|resource|array|string|int|float|bool|null\r\nThe mixed type accepts every value. (equivalent to the union type) object|resource|array|string|float|int|bool|null. Available as of PHP 8.0.0. ', 'https://www.php.net/manual/en/language.types.mixed.php', 1),
(77, 'OOP: Facade Design Pattern', 'Facade is a structural design pattern that provides a simplified interface to a library, a framework, or any other complex set of classes.', 'https://refactoring.guru/design-patterns/facade/php/example', 4),
(78, 'OOP: Closure', 'Anonymous functions yield objects of this type. This class has methods that allow further control of the anonymous function after it has been created. ', 'https://www.php.net/manual/en/class.closure.php', 4),
(79, 'SQL: INNER JOIN', 'SELECT * FROM orders ON orders.customer_id=customers.id;', 'https://www.w3schools.com/sql/sql_join_inner.asp', 5),
(80, 'PHP: PHP Sandbox', 'Behavior looks like vscode environment ', 'https://phpsandbox.io/n/aqua-dorme-gtob0', 1),
(82, 'PHP7.2 News', 'What\'s new in PHP7.2', 'https://kinsta.com/fr/blog/php-7-2', 1),
(83, 'PHP: PHP7.4 News', 'What\'s new in php7.4', 'https://kinsta.com/fr/blog/php-7-4', 1),
(84, 'SQL: Optimization', 'optimization with Explain. Check also size, type and encoding of indexes. Should be equal. ', 'https://gafish.fr/explain-optimisation-de-requetes-mysql/', 5),
(85, 'SQL: Character_set_server', 'show variables like \'character_set_server\'; ', 'https://www.youtube.com/watch?v=kbevrZZpu1w', 5),
(86, 'HTML: Cookie, Session & Token', 'Difference between cookies, session and tokens', 'https://www.youtube.com/watch?v=GhrvZ5nUWNg', 7),
(87, 'SQL: Primary key, Unique key', 'Difference between Primary and Unique key', 'https://waytolearnx.com/2018/07/difference-entre-cle-primaire-et-cle-unique.html', 5),
(88, 'SQL: Workbench', 'If the following error appears when trying to connect to Mysql:<br>\r\n\"mysql workbench an apparmor policy prevents this sender [...]\"<br>\r\nRun following commands:<br>\r\n# snap connect mysql-workbench-community:password-manager-service<br>\r\n# snap connect mysql-workbench-community:ssh-keys<br>', 'https://linuxhint.com/installing_mysql_workbench_ubuntu/', 5),
(89, 'SQL: Collate', 'Set how to compare strings and in what order they will be displayed:<br>\r\n. \'é\' must appear before or after \'e\'?<br>\r\n. Upper characters must be treated in the same way than lower characters?', 'https://apical.xyz/fiches/jeux_de_caracteres_et_interclassements_collations/Qu_est-ce_qu_un_interclassement_collation', 5),
(90, 'SQL: Tutorial', 'W3Schools Mysql Learning', 'https://www.w3schools.com/sql/default.asp', 5),
(91, 'SQL: Fulltext index on 2 fields', 'ALTER TABLE `item` ADD FULLTEXT KEY `name_3` (`name`,`description`,`further`);', 'https://grafikart.fr/tutoriels/mysql-fulltext-2009', 5),
(92, 'SQL: Fulltext research', 'SELECT *, MATCH(name, description) against(\'tutorial\') as score FROM item<br>\r\nWHERE MATCH(name, description) against(\'tutorial\') ORDER BY `score` ASC; ', 'https://grafikart.fr/tutoriels/mysql-fulltext-2009', 5),
(93, 'SQL: Mysql: Users', 'Creation, Grant, Revoke', 'https://www.youtube.com/watch?v=VlF-XG1vVPU', 5),
(96, 'Linux: Symlink', 'A symbolic link points to another file or directory<br>\r\nln -s /mnt/my_drive/movies ~/my_movies', 'https://linuxize.com/post/how-to-create-symbolic-links-in-linux-using-the-ln-command/', 3),
(97, 'Linux: Disable a keyboard key on Ubuntu', '. xev -event keyboard<br>\r\n. Tip the key. Search and keep the keycode value displayed<br>\r\n. xmodmap -e \'keycode [keyboard_value]=NoSymbol\'', 'https://superuser.com/questions/775785/how-to-disable-a-keyboard-key-in-linux-ubuntu', 3),
(98, 'SQL: Equijointures', 'This type of join frequently involves the use of primary and foreign keys.<br> They are called simple joints or internal joints.<br>\n. SELECT s.name, i.name from item as i, skill as s WHERE i.skill_id = s.id;', 'https://www.abetari.com/les-jointures-sql/', 5),
(99, 'IT: Regex', 'Online Regex Match. Below PHP Example<br>\r\n$match = \"/^([a-zA-Z]+:\\s)(.*$)/m\";<br>\r\n$input = \'PHP: Amazing PHP\';<br>\r\n$res = preg_replace($match, \"idx0: $0 | idx1: $1 | idx2: $2;\", $input);<br>\r\n<u>idx0:</u> PHP: Amazing PHP | <u>idx1:</u> PHP: | <u>idx2:</u> Amazing PHP;', 'https://regex101.com/', 36),
(100, 'PHP: Memcached', 'high-performance, distributed memory object caching system, generic in nature,<br> but intended for use in speeding up dynamic web applications by alleviating database load. ', 'https://www.php.net/manual/en/book.memcached.php', 1),
(101, 'SQL: Tutorial', 'SQL Courses', 'https://sql.sh/', 5),
(102, 'IT: Multi-courses Tutorial', 'Python, Linux, NodeJS, Command line... Huge Library', 'https://linuxize.com/', 36),
(103, 'IT: Multi-tutorial', 'Php, WordPress, Laravel, JS, CSS, Html, React, Mac, Linux, Windows, Technologic Watch...', 'https://apical.xyz/', 36),
(104, 'Cache', 'Russian Doll Caching', 'https://grafikart.fr/tutoriels/russian-doll-caching-748', 1),
(105, 'AI: Video Creator', 'Own Video Designing', 'https://www.flexclip.com/fr/editor/app?ratio=landscape', 6),
(106, 'Docker Tutorial', 'Grafikart Learning', 'https://grafikart.fr/tutoriels/docker', 47),
(107, 'Docker: Docker Repositories', 'hub.docker.com', 'https://hub.docker.com/', 47),
(108, 'Docker: Login to Docker-hub', 'docker login -u [Username]<br>\npassword given by hub.docker.com/settings/security', 'https://hub.docker.com/settings/security', 47),
(109, 'Docker: Dockerfile', 'Build an image from Dockerfile<br>docker build -t [IMAGE_NAME]:[TAG_VERSION] .', 'https://www.youtube.com/watch?v=Ik_mC7JSJ-A', 47),
(110, 'Docker: Image History', 'docker history [IMAGE_NAME]:[TAG_VERSION]', NULL, 47),
(111, 'Docker: Run a container', 'docker run -tid [IMAGE_NAME]:[TAG_VERSION]', NULL, 47),
(112, 'Docker: Connect into a container ', 'docker exec -ti [CONTAINER_ID]  /bin/bash<br>CONTAINER_ID is given by docker run cmd', NULL, 47),
(113, 'Docker: Get active containers from an image', 'docker inspect --format=\'{{.Id}} {{.Parent}}\' $(docker images --filter since=[IMAGE_ID] -q)', NULL, 47),
(114, 'Docker: Delete container', 'docker rmi -f [CONTAINER_ID]', NULL, 47),
(115, 'Docker: List images', 'docker images [-q]', NULL, 47),
(116, 'Docker: Rename image and tag', 'docker tag [IMAGE_NAME]:[VERSION] php8:0.1', NULL, 47),
(117, 'Docker: Get image informations', 'docker inspect [IMAGE_ID]', NULL, 47),
(118, 'Docker: Docker-compose Tutorial', 'Api, Service, Persistent volumes...', 'https://www.youtube.com/playlist?list=PLn6POgpklwWqaC1pdx02SrrgOaL2ZL7G0', 47),
(119, 'Linux: make a directory and sub-directories', 'mkdir -p volumes/var/run/php', NULL, 3),
(120, 'Linux: Replace string into vi', ':%s/FindMe/ReplaceME/g', 'https://www.cyberciti.biz/faq/linux-unix-vim-find-replace-text-string-words/', 3),
(121, 'PHP: Get apt-get libraries', 'apt-cache search curl | grep php<br>\r\napt-cache search php-curl<br>\r\nphp -m | grep curl<br>\r\n\r\n\r\n\r\n', NULL, 1),
(122, 'AI: ChatGpt', 'Interactive chat taking account of history conversations', 'https://chat.openai.com/chat', 6),
(123, 'Docker: Cheat-sheet', 'PDF Cheat-sheet', 'docker-cheat-sheet.pdf', 47),
(124, 'AI: Creative tools', 'Artificially intelligent tools for naturally creative humans', 'https://deepai.org/', 6),
(125, 'Linux: find file containing a particular string', 'grep -w -R \'getMyData()\' ~/projects/', 'https://www.cyberciti.biz/faq/howto-search-find-file-for-text-string/', 3),
(143, 'IT: All', 'All Items', '', 36),
(145, 'Tools: Enhance resolution image', 'AI Image Enlarger & Enhancer Tools', 'https://imglarger.com/', 76),
(146, 'Remove Watermarks Images', 'Get rid of the watermarks from images using AI technology', 'https://www.watermarkremover.io/', 76),
(147, 'Remove video background', '', 'https://www.unscreen.com/', 76),
(148, 'Rmv unwanted items img', 'Remove unwanted things', 'https://magicstudio.com/magiceraser', 76),
(149, 'Windows: check disc', 'chkdsk c:', '', 78),
(150, 'Windows: remove malwares', 'mrt', '', 78),
(151, 'Tips: Generate images', 'AI Images generator from text', 'https://openai.com/dall-e-2/', 76),
(152, 'Microsoft: Microsoft learning', 'Microsoft learning', 'https://learn.microsoft.com/en-us/training/', 78),
(153, 'Tips: Get Books freely', 'Get Books freely', 'https://zlibrary.to', 76),
(154, 'Tips: Review text with better syntax', 'Pdf to Text, Text manipulation, Translation', 'https://smodin.io/chat', 76);

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `id` int NOT NULL,
  `name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `note`
--

INSERT INTO `note` (`id`, `name`, `description`) VALUES
(1, 'English', 'practice one hour each day.'),
(2, 'R&D', 'review the Java part project architecture'),
(11, 'Exercise', 'Do physical exercise each day, at least half an hour'),
(15, 'Program', '<ul><li>Microservices</li><li>New in Php8</li><li>Patterns</li><li>Router</li><li>Dependance container</li><li>Api Authentication</li><li>SOLID</li></ul>');

-- --------------------------------------------------------

--
-- Table structure for table `privilege`
--

CREATE TABLE `privilege` (
  `id` int NOT NULL,
  `name` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
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
(37, 'Java', 'java.png'),
(38, 'English', 'english-learning.png'),
(40, 'Excel', 'excel.png'),
(44, 'Apache', 'apache.png'),
(45, 'GIT', 'git.png'),
(47, 'Docker', 'docker.png'),
(69, 'testmario23', 'test.png'),
(76, 'Tips', 'tips.png'),
(77, 'Tools', 'tools.png'),
(78, 'Microsoft', 'microsoft.png');

-- --------------------------------------------------------

--
-- Table structure for table `url`
--

CREATE TABLE `url` (
  `id` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `url` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `url`
--

INSERT INTO `url` (`id`, `name`, `url`) VALUES
(1, 'Dependency Injection Design Pattern', 'https://connect.ed-diamond.com/GNU-Linux-Magazine/glmf-208/demystifier-l-injection-de-dependances-en-php'),
(2, 'Dependency Injection Design Pattern Php-DI', 'https://php-di.org/'),
(3, 'Closure', 'https://tuto2.dev/tutoriel/qu-est-ce-qu-une-closure'),
(4, 'Design Patterns', 'https://refactoring.guru/design-patterns'),
(5, 'SQL Optimization', 'https://sql.sh/optimisation'),
(6, 'Qcms sur Mysql', 'https://waytolearnx.com/2018/07/qcm-mysql-corrige-optimisation-de-requetes.html'),
(7, 'Query ToolBox', 'https://dataedo.com/kb/query/mysql'),
(8, 'Tutorial', 'https://apical.xyz/formations/le_systeme_de_gestion_de_bases_de_donnees_mysql'),
(9, 'Foreign Key', 'https://www.dynamic-mess.com/sql/les-clefs-etrangeres-avec-mysql/'),
(10, 'Memcached', 'https://www.malekal.com/comment-installer-et-configurer-memcached/#Utiliser_memcached_avec_WordPress'),
(12, 'Docker cheat-sheet Online', 'https://collabnix.com/docker-cheatsheet/'),
(13, 'Docker cheatsheet', 'https://collabnix.com/docker-cheatsheet/'),
(27, 'name', 'name'),
(40, 'OOP: Dependency Injection Yii Framework', 'https://www.yiiframework.com/doc/guide/2.0/fr/concept-di-container'),
(41, 'Service Locator Yii Framework', 'https://www.yiiframework.com/doc/guide/2.0/fr/concept-service-locator'),
(42, 'Service Locator Yii Framework', 'https://www.yiiframework.com/doc/guide/2.0/fr/concept-service-locator'),
(43, 'Dependency Injection and service locator article', 'https://martinfowler.com/articles/injection.html'),
(44, 'Java: Java Sandbox', 'https://www.tutorialspoint.com/online_java_compiler.php'),
(45, 'Java: Java Sandbox', 'https://www.tutorialspoint.com/online_java_compiler.php'),
(46, 'Inversion des conteneurs de contrôle et du modèle d\'injection de dépendance', 'public/doc/Inversion_of_Control_Containers_and_DI_pattern_fr.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `url_skill_item`
--

CREATE TABLE `url_skill_item` (
  `id` int NOT NULL,
  `url_id` int NOT NULL,
  `skill_id` int DEFAULT NULL,
  `item_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `url_skill_item`
--

INSERT INTO `url_skill_item` (`id`, `url_id`, `skill_id`, `item_id`) VALUES
(3, 3, 1, NULL),
(4, 1, 4, NULL),
(5, 2, 4, NULL),
(6, 1, 1, NULL),
(7, 2, 1, NULL),
(8, 4, 4, NULL),
(9, 5, 5, 84),
(10, 6, 5, 84),
(11, 7, 5, 90),
(12, 8, 5, NULL),
(13, 9, 5, 4),
(14, 10, 1, 100),
(17, 12, 47, NULL),
(18, 13, 47, 123),
(36, 40, 1, 8),
(37, 42, 1, 8),
(38, 43, 4, 8),
(39, 45, 37, 143),
(40, 46, 4, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appuser`
--
ALTER TABLE `appuser`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `fk_appuser_privilege_id` (`privilege_id`);

--
-- Indexes for table `demo`
--
ALTER TABLE `demo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_demo_item_id` (`item_id`);
ALTER TABLE `demo` ADD FULLTEXT KEY `name` (`name`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `skill_id` (`skill_id`);
ALTER TABLE `item` ADD FULLTEXT KEY `name` (`name`);
ALTER TABLE `item` ADD FULLTEXT KEY `description` (`description`);
ALTER TABLE `item` ADD FULLTEXT KEY `name_2` (`name`,`description`);
ALTER TABLE `item` ADD FULLTEXT KEY `name_3` (`name`,`description`,`further`);

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
ALTER TABLE `skill` ADD FULLTEXT KEY `name` (`name`);

--
-- Indexes for table `url`
--
ALTER TABLE `url`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `url` ADD FULLTEXT KEY `name` (`name`);

--
-- Indexes for table `url_skill_item`
--
ALTER TABLE `url_skill_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_url_skill_item_skill_id` (`skill_id`),
  ADD KEY `fk_url_skill_item_item_id` (`item_id`),
  ADD KEY `fk_url_skill_item_url_id` (`url_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appuser`
--
ALTER TABLE `appuser`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `demo`
--
ALTER TABLE `demo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `privilege`
--
ALTER TABLE `privilege`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `skill`
--
ALTER TABLE `skill`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `url`
--
ALTER TABLE `url`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `url_skill_item`
--
ALTER TABLE `url_skill_item`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

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
-- Constraints for table `url_skill_item`
--
ALTER TABLE `url_skill_item`
  ADD CONSTRAINT `fk_url_skill_item_item_id` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`),
  ADD CONSTRAINT `fk_url_skill_item_skill_id` FOREIGN KEY (`skill_id`) REFERENCES `skill` (`id`),
  ADD CONSTRAINT `fk_url_skill_item_url_id` FOREIGN KEY (`url_id`) REFERENCES `url` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
