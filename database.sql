CREATE TABLE `appuser` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(300) NOT NULL,
  `privilege_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appuser`
--

INSERT INTO `appuser` (`id`, `username`, `password`, `privilege_id`) VALUES
(1, 'admin', '93b59e78d71c90641c143369fb19dfadabdb69d7', 1);

-- --------------------------------------------------------

--
-- Table structure for table `connection`
--

CREATE TABLE `connection` (
  `id` int(11) NOT NULL,
  `user` text NOT NULL,
  `state` tinyint(1) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `connection`
--

INSERT INTO `connection` (`id`, `user`, `state`, `date`) VALUES
(1, 'admin', 1, '2023-02-02');

-- --------------------------------------------------------

--
-- Table structure for table `demo`
--

CREATE TABLE `demo` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(3000) NOT NULL,
  `item_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `description` text DEFAULT NULL,
  `further` varchar(300) DEFAULT NULL COMMENT 'pdf, images, txt...',
  `skill_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `name`, `description`, `further`, `skill_id`) VALUES
(4, 'Foreign key', 'ALTER TABLE urls ADD CONSTRAINT fk_urls_skill_id FOREIGN KEY (skill_id) REFERENCES skill(id);', 'https://www.w3schools.com/sql/sql_ref_foreign_key.asp', 5),
(8, 'Factory Design pattern', 'The Factory Design Pattern provides a way to create objects.<br> The factory has a method that receives parameters and returns a class.', 'https://refactoring.guru/design-patterns/factory-method/php/example#lang-features', 4),
(11, 'PDF Cheat-Sheet', '', 'php-cheat-sheet.pdf', 1),
(16, 'Rename Table', 'RENAME TABLE old_table TO new_table;', 'https://mariadb.com/kb/en/rename-table/', 5),
(17, 'Current directory path', '__DIR__', 'https://www.tutorialspoint.com/how-to-use-dir-in-php', 1),
(18, 'Website root path', 'ROOTDIR', 'https://www.php.net/manual/en/reserved.variables.server.php', 1),
(19, 'Reference website OpenAI', 'Text completion, Generate and edit text, Image generation, Train a model for your use case...', 'https://beta.openai.com/docs/quickstart/start-with-an-instruction', 6),
(20, 'W3schools Tutorial', 'Php, Css, Html, SQL, AI, Javascript, Python, NodeJS, React, R,<br>JQuery, C, C++, C#, Typescript, Django, Mysql, Bootstrap, Java, Mysql, W3Css', 'https://www.w3schools.com/default.asp', 36),
(21, 'Website', 'php.net', 'https://www.php.net/', 1),
(22, 'Grafikart', 'Tutorial Php, JS, TS, Html, Css, Vue', 'https://grafikart.fr', 36),
(23, 'W3docs', 'Tutorial Html5, Css, Git, JS, PHP', 'https://www.w3docs.com/', 36),
(24, 'Icon library', 'Free icons library', 'https://icon-library.com/', 7),
(27, 'Github', 'Git Versioning projects', 'https://github.com', 45),
(28, 'jsfiddle', 'Html, css and javascript sandbox', 'http://jsfiddle.net', 36),
(29, 'geeksforgeeks', 'Tutorials AI, Java, Python, C++, Data-Science, JS, Machine-learning', 'https://www.geeksforgeeks.org/', 36),
(31, 'Google Sandbox', 'Python Sandbox', 'https://colab.research.google.com/drive/1PZShdlNNsHHE__y1SiWB_EVh-EDBjMXS?authuser=1#scrollTo=C4HZx7Gndbrh', 2),
(35, 'Title attribute', 'Improve display', 'https://www.manalite.com/goodies/title.php', 7),
(36, 'Udemy', 'Paid IT training', 'https://www.udemy.com', 36),
(37, 'PluralSight', 'Paid IT training plateform', 'https://www.pluralsight.com', 36),
(38, 'SentenceChecker', 'Check english written sentences', 'https://sentencechecker.com/', 38),
(39, 'Wordtune', 'Checks Sentences, corrects and offers variants', 'https://app.wordtune.com/editor/', 38),
(42, 'grammar exercises', 'Grammer exercises, tests', 'https://www.englisch-hilfen.de/en', 38),
(43, 'Deepl Translation', 'Languages translations (English, Italian...)', 'https://www.deepl.com/translator', 38),
(44, 'Reverso Translation', 'Languages translations (English, Italian...)', 'https://www.reverso.net/text-translation', 38),
(46, 'Linguee Translation', 'Languages translations (English, Italian...)', 'https://www.linguee.fr/', 38),
(47, 'Quillbot Translation & variant', 'English Sentence Checker and variant', 'https://quillbot.com/', 38),
(48, 'Roadmap', 'Guides and other educational content for developers', 'https://roadmap.sh', 36),
(50, 'App.programiz.pro', 'Tutorial', 'https://app.programiz.pro/', 2),
(51, 'OPenclassroom', 'Tutorial', 'https://openclassrooms.com/fr/courses/7771531-decouvrez-les-librairies-python-pour-la-data-science/7857178-creez-votre-premier-data-frame-avec-pandas', 2),
(52, 'Linode Cheat', 'Cheat in command line', 'https://www.linode.com/docs/guides/linux-cheat-command/', 3),
(53, 'Sheetformula', 'AI Excel Formula ', 'https://sheetformula.com/genformula.html', 40),
(54, 'Copocorp', 'Html Special characters', 'http://copocorp.free.fr/caracteresSpeciaux/', 7),
(55, 'Fluent Design Pattern', 'The Builder design pattern is not the same as the Fluent Interface idiom (that relies on method chaining), although Rust developers sometimes use those terms interchangeably.\r\nFluent Interface is a way to chain methods for constructing or modifying an object. \r\nWhile the Builder pattern also suggests constructing object step by step, it also lets you build different types of products using the same construction process.\r\n', 'https://designpatternsphp.readthedocs.io/en/latest/Structural/FluentInterface/README.html', 4),
(56, 'Alwasdata', 'Web Hosting, Administration, Api', 'https://admin.alwaysdata.com/', 36),
(58, 'Reqbin.com', 'Curl, Rest & SOAP API Online, Python, PHP, Javascript, Java, Xml, Json', 'https://reqbin.com/curl', 36),
(62, 'packagist.org Curl', 'Php Curl', 'https://packagist.org/packages/curl/curl', 1),
(63, 'OpenClassRoom', 'Api Tutorial', 'https://openclassrooms.com/fr/courses/6573181-adoptez-les-api-rest-pour-vos-projets-web', 36),
(64, 'PHP version Switching', 'sudo a2dismod php8.1;\r\n<br>sudo a2enmod php8.2;', NULL, 3),
(66, 'waytolearnx', 'Rest Api Tutorial', 'https://waytolearnx.com/2019/07/creer-et-utiliser-une-api-rest-en-php.html', 1),
(67, 'waytolearnx', 'PHP Curl Tutorial', 'https://waytolearnx.com/2020/01/tutoriel-curl-en-php.html', 1),
(69, 'Dependency Injection', 'High-level classes shouldn’t depend on low-level classes. Both should depend on abstractions. ', 'https://php.developpez.com/tutoriels/php-la-bonne-pratique/?page=injection-de-dependances', 4),
(70, 'Chmod', 'Online Chmod Calculator', 'https://chmod-calculator.com/', 3),
(71, 'Chown', 'Chown marcus myfile.txt', 'https://www.computerhope.com/unix/uchown.htm\r\n', 3),
(72, 'Diplay errors', 'Diplay PHP errors', 'https://stackify.com/display-php-errors/', 1),
(73, 'Enable or disable an apache Module', 'a2enmod, a2dismod - enable or disable an apache2 module', 'https://manpages.ubuntu.com/manpages/trusty/man8/a2enmod.8.html', 44),
(74, 'PHP8 News', 'What\'s new in PHP8', 'https://kinsta.com/fr/blog/php-8', 1),
(75, 'mixed type', 'All of these types: object|resource|array|string|int|float|bool|null\r\nThe mixed type accepts every value. (equivalent to the union type) object|resource|array|string|float|int|bool|null. Available as of PHP 8.0.0. ', 'https://www.php.net/manual/en/language.types.mixed.php', 1),
(77, 'Facade Design Pattern', 'Facade is a structural design pattern that provides a simplified interface to a library, a framework, or any other complex set of classes.', 'https://refactoring.guru/design-patterns/facade/php/example', 4),
(78, 'Closure', 'Anonymous functions yield objects of this type. This class has methods that allow further control of the anonymous function after it has been created. ', 'https://www.php.net/manual/en/class.closure.php', 4),
(79, 'INNER JOIN', 'SELECT * FROM orders ON orders.customer_id=customers.id;', 'https://www.w3schools.com/sql/sql_join_inner.asp', 5),
(80, 'PHP Sandbox', 'Behavior looks like vscode environment ', 'https://phpsandbox.io/n/aqua-dorme-gtob0', 1),
(82, 'PHP7.2 News', 'What\'s new in PHP7.2', 'https://kinsta.com/fr/blog/php-7-2', 1),
(83, 'PHP7.4 News', 'What\'s new in php7.4', 'https://kinsta.com/fr/blog/php-7-4', 1),
(84, 'Optimization', 'optimization with Explain. Check also size, type and encoding of indexes. Should be equal. ', 'https://gafish.fr/explain-optimisation-de-requetes-mysql/', 5),
(85, 'Character_set_server', 'show variables like \'character_set_server\'; ', 'https://www.youtube.com/watch?v=kbevrZZpu1w', 5),
(86, 'Cookie, Session & Token', 'Difference between cookies, session and tokens', 'https://www.youtube.com/watch?v=GhrvZ5nUWNg', 7),
(87, 'Primary key, Unique key', 'Difference between Primary and Unique key', 'https://waytolearnx.com/2018/07/difference-entre-cle-primaire-et-cle-unique.html', 5),
(88, 'Workbench', 'If the following error appears when trying to connect to Mysql:<br>\r\n\"mysql workbench an apparmor policy prevents this sender [...]\"<br>\r\nRun following commands:<br>\r\n# snap connect mysql-workbench-community:password-manager-service<br>\r\n# snap connect mysql-workbench-community:ssh-keys<br>', 'https://linuxhint.com/installing_mysql_workbench_ubuntu/', 5),
(89, 'Collate', 'Set how to compare strings and in what order they will be displayed:<br>\r\n. \'é\' must appear before or after \'e\'?<br>\r\n. Upper characters must be treated in the same way than lower characters?', 'https://apical.xyz/fiches/jeux_de_caracteres_et_interclassements_collations/Qu_est-ce_qu_un_interclassement_collation', 5),
(90, 'Tutorial', 'W3Schools Mysql Learning', 'https://www.w3schools.com/sql/default.asp', 5),
(91, 'Fulltext index on 2 fields', 'ALTER TABLE `item` ADD FULLTEXT KEY `name_3` (`name`,`description`,`further`);', 'https://grafikart.fr/tutoriels/mysql-fulltext-2009', 5),
(92, 'Fulltext research', 'SELECT *, MATCH(name, description) against(\'tutorial\') as score FROM item<br>\r\nWHERE MATCH(name, description) against(\'tutorial\') ORDER BY `score` ASC; ', 'https://grafikart.fr/tutoriels/mysql-fulltext-2009', 5),
(93, 'Users', 'Creation, Grant, Revoke', 'https://www.youtube.com/watch?v=VlF-XG1vVPU', 5),
(96, 'Symlink', 'A symbolic link points to another file or directory<br>\r\nln -s /mnt/my_drive/movies ~/my_movies<br>\r\nCheck if exists symlink:  If [  -h ./link ] ...\r\n', 'https://linuxize.com/post/how-to-create-symbolic-links-in-linux-using-the-ln-command/', 3),
(97, 'Disable a keyboard key on Ubuntu', '. xev -event keyboard<br>\r\n. Tip the key. Search and keep the keycode value displayed<br>\r\n. xmodmap -e \'keycode [keyboard_value]=NoSymbol\'', 'https://superuser.com/questions/775785/how-to-disable-a-keyboard-key-in-linux-ubuntu', 3),
(98, 'Equijointures', 'This type of join frequently involves the use of primary and foreign keys.<br> They are called simple joints or internal joints.<br>\n. SELECT s.name, i.name from item as i, skill as s WHERE i.skill_id = s.id;', 'https://www.abetari.com/les-jointures-sql/', 5),
(99, 'Regex', 'Online Regex Match. Below PHP Example<br>\r\n$match = \"/^([a-zA-Z]+:\\s)(.*$)/m\";<br>\r\n$input = \'PHP: Amazing PHP\';<br>\r\n$res = preg_replace($match, \"idx0: $0 | idx1: $1 | idx2: $2;\", $input);<br>\r\n<u>idx0:</u> PHP: Amazing PHP | <u>idx1:</u> PHP: | <u>idx2:</u> Amazing PHP;', 'https://regex101.com/', 36),
(100, 'Memcached', 'high-performance, distributed memory object caching system, generic in nature,<br> but intended for use in speeding up dynamic web applications by alleviating database load. ', 'https://www.php.net/manual/en/book.memcached.php', 1),
(101, 'Tutorial', 'SQL Courses', 'https://sql.sh/', 5),
(102, 'Multi-courses Tutorial', 'Python, Linux, NodeJS, Command line... Huge Library', 'https://linuxize.com/', 36),
(103, 'Multi-tutorial', 'Php, WordPress, Laravel, JS, CSS, Html, React, Mac, Linux, Windows, Technologic Watch...', 'https://apical.xyz/', 36),
(104, 'Cache', 'Russian Doll Caching', 'https://grafikart.fr/tutoriels/russian-doll-caching-748', 1),
(105, 'Video Creator', 'Own Video Designing', 'https://www.flexclip.com/fr/editor/app?ratio=landscape', 6),
(106, 'Docker Tutorial', 'Grafikart Learning', 'https://grafikart.fr/tutoriels/docker', 47),
(107, 'Docker Repositories', 'hub.docker.com', 'https://hub.docker.com/', 47),
(108, 'Login to Docker-hub', 'docker login -u [Username]<br>\npassword given by hub.docker.com/settings/security', 'https://hub.docker.com/settings/security', 47),
(109, 'Dockerfile', 'Build an image from Dockerfile<br>docker build -t [IMAGE_NAME]:[TAG_VERSION] .', 'https://www.youtube.com/watch?v=Ik_mC7JSJ-A', 47),
(110, 'Image History', 'docker history [IMAGE_NAME]:[TAG_VERSION]', NULL, 47),
(111, 'Run a container', 'docker run -tid [IMAGE_NAME]:[TAG_VERSION]', NULL, 47),
(112, 'Connect into a container ', 'docker exec -ti [CONTAINER_ID]  /bin/bash<br>CONTAINER_ID is given by docker run cmd', NULL, 47),
(113, 'Get active containers from an image', 'docker inspect --format=\'{{.Id}} {{.Parent}}\' $(docker images --filter since=[IMAGE_ID] -q)', NULL, 47),
(114, 'Delete container', 'docker rmi -f [CONTAINER_ID]', NULL, 47),
(115, 'List images', 'docker images [-q]', NULL, 47),
(116, 'Rename image and tag', 'docker tag [IMAGE_NAME]:[VERSION] php8:0.1', NULL, 47),
(117, 'Get image informations', 'docker inspect [IMAGE_ID]', NULL, 47),
(118, 'Docker-compose Tutorial', 'Api, Service, Persistent volumes...', 'https://www.youtube.com/playlist?list=PLn6POgpklwWqaC1pdx02SrrgOaL2ZL7G0', 47),
(119, 'make a directory and sub-directories', 'mkdir -p volumes/var/run/php', NULL, 3),
(120, 'Replace string into vi', ':%s/FindMe/ReplaceME/g', 'https://www.cyberciti.biz/faq/linux-unix-vim-find-replace-text-string-words/', 3),
(121, 'Get apt-get libraries', 'apt-cache search curl | grep php<br>\r\napt-cache search php-curl<br>\r\nphp -m | grep curl<br>\r\n\r\n\r\n\r\n', NULL, 1),
(122, 'ChatGpt', 'Interactive chat taking account of history conversations', 'https://chat.openai.com/chat', 6),
(123, 'Cheat-sheet', 'PDF Cheat-sheet', 'docker-cheat-sheet.pdf', 47),
(124, 'Creative tools', 'Artificially intelligent tools for naturally creative humans', 'https://deepai.org/', 6),
(125, 'find file containing a particular string', 'grep -w -R \'getMyData()\' ~/projects/', 'https://www.cyberciti.biz/faq/howto-search-find-file-for-text-string/', 3),
(143, 'All', 'All Items', '', 36),
(145, 'Enhance resolution image', 'AI Image Enlarger & Enhancer Tools', 'https://imglarger.com/', 76),
(146, 'Remove Watermarks Images', 'Get rid of the watermarks from images using AI technology', 'https://www.watermarkremover.io/', 76),
(147, 'Remove video background', '', 'https://www.unscreen.com/', 76),
(148, 'Rmv unwanted items img', 'Remove unwanted things', 'https://magicstudio.com/magiceraser', 76),
(149, 'check disc', 'chkdsk c:', '', 78),
(150, 'remove malwares', 'mrt', '', 78),
(151, 'Generate images', 'AI Images generator from text', 'https://openai.com/dall-e-2/', 76),
(152, 'Microsoft learning', 'Microsoft learning', 'https://learn.microsoft.com/en-us/training/', 78),
(153, 'Get Books freely', 'Get Books freely', 'https://zlibrary.to', 76),
(154, 'Review text with better syntax', 'Pdf to Text, Text manipulation, Translation', 'https://smodin.io/chat', 76),
(156, 'Special characters command lines', 'use convertion for special characters like @ become %40', 'https://fabianlee.org/2016/09/07/git-calling-git-clone-using-password-with-special-character/', 3),
(157, 'Npm server on localhost', 'npm run server', '', 80),
(158, 'Build code', 'npm run build', '', 80),
(159, 'Cookie', 'Http Only (JS Reading forbidden)<br>Https<br>Samesite - Lax or Strict<br>Forms Frontend Crypt: Web Crypto API, AES256', '', 81),
(160, 'XSS', 'XSS', '', 81),
(161, 'SQL Injection', 'SQL Injection', '', 81),
(162, 'NIST', 'National Institute of Standards and Technology', 'https://www.nist.gov/', 81),
(164, 'OWASP', 'OWASP Application Security Verification Standard', 'https://owasp.org/', 81),
(166, 'JWT', 'Example of code', 'https://developer.okta.com/blog/2019/05/07/php-token-authentication-jwt-oauth2-openid-connect', 1),
(167, 'REGEX REPLACE', 'SELECT REGEXP_REPLACE(name, \'.*: \',\'\') FROM `item`; <br>UPDATE `item` SET name = REGEXP_REPLACE(name, \'.*: \',\'\');', 'https://way2tutorial.com/sql/sql-regexp_replace-function.php', 5),
(168, 'Json SQL', 'Json SQL request', 'https://mariadb.com/kb/en/json_extract/', 5),
(169, 'Find tables with a specific field name', 'SELECT * FROM INFORMATION_SCHEMA.COLUMNS <br>WHERE `COLUMNS`.`COLUMN_NAME` like \'%car%\' <br>AND `COLUMNS`.`TABLE_NAME` like \'%vehicle%\' <br>GROUP BY `COLUMNS`.`TABLE_NAME` \r\n<br>ORDER BY `COLUMNS`.`TABLE_NAME` ASC;', '', 5),
(170, 'Clean untracked files', 'git clean [-f]', 'https://git-scm.com/book/fr/v2/Utilitaires-Git-Remisage-et-nettoyage', 45),
(171, 'PDF, Image, Video and File Tools', 'Converter tools for PDF, Image, Video and files', 'https://tinywow.com/', 6),
(172, 'JWT PHP Authorization', 'PHP Authorization with JWT', 'https://www.sitepoint.com/php-authorization-jwt-json-web-tokens/', 1),
(173, 'Find a file containing a string', 'find . -name \'*.html\' | grep app\r\n<br>Astuce: le /dev/null obligera la commande grep à spécifier<br> dans quel fichier elle a trouvé la correspondance<br>\r\nfind . -type f -exec grep \'contract.id\' /dev/null {} \';\'\r\n', '', 3),
(174, 'Grant user to project/Directory', '1. ls -als to display permission details\r\n<br>\r\n2. Grant Group permission\r\n<br>sudo chgrp cips -R [DIR_NAME]\r\n<br>\r\n3. User permission \r\n<br>sudo chown root  -R [DIR_NAME]\r\n<br>\r\n4. Directory permission:<br>\r\nsudo chmod 775 -R eforum\r\n', '', 3),
(175, 'Find a file in a directory', 'sudo find / -type d -name php | sudo find / -name error.log', '', 3),
(176, 'Cron', 'TODO: To improve', 'cron.docx', 3),
(177, 'Restart', 'sudo /etc/init.d/apache2 restart<br>\r\nsudo service apache2 restart', 'https://www.cyberciti.biz/faq/star-stop-restart-apache2-webserver/', 44),
(178, 'Delete stash', 'git stash list<br>\r\ngit stash drop stash@{1}<br>\r\ngit stash clear (All stashes)', 'https://www.tempertemper.net/blog/deleting-a-stash-in-git', 45),
(179, 'Bachelor Developer PHP/Symfony', 'Bachelor Developer PHP/Symfony', 'https://www.studi.com/fr/formation/developpement/bachelor-developpeur-phpsymfony', 106),
(180, 'Advanced PHP Course', 'Advanced PHP Course', 'https://www.linkedin.com/learning/advanced-php', 106),
(181, 'Advanced PHP Course', 'Advanced PHP Course', 'https://www.linkedin.com/learning/advanced-php', 106),
(182, 'Routes list', 'php api/bin/console debug:router', 'https://symfony.com/doc/current/routing.html', 107),
(183, 'Column mode', 'Alt + Mouse selection', 'https://npp-user-manual.org/docs/editing/', 108),
(184, 'Unminify Js, css...', 'Unminify Js, css, Json, Html and Xml code', 'https://unminify.com/', 109),
(185, 'Var, let et const', 'var sert à définir une variable globale<br>\r\nlet sert à définir une variable locale<br>\r\nconst sert à déclarer une référence constante', 'https://code-garage.fr/blog/quelles-sont-les-differences-entre-var-let-et-const-en-javascript/#:~:text=Si%20l\'on%20devait%20r%C3%A9sumer,%C3%A0%20d%C3%A9clarer%20une%20r%C3%A9f%C3%A9rence%20constante', 109),
(186, 'Diff file between two different branches', 'git diff branch_provider preprod api/src/provider.php', '', 45),
(187, 'PhpCS', 'PHP_CodeSniffer checks that your code remains clean and consistent.', 'https://les-enovateurs.com/php-codesniffer-loutil-ultime-pour-valider-et-corriger-votre-code-php', 77),
(188, 'Sonarlint', 'clean code begining in IDE', 'https://www.sonarsource.com/products/sonarlint/', 77),
(189, 'top', 'processes view', '', 3),
(190, 'reset git from nothing', 'git init<br>\r\ngit remote add origin git@pvngit.mydocs.com:mydocs/plateform.git', '', 45),
(191, 'git force', 'git checkout --force', '', 45),
(192, 'squash 3 last commits', 'git rebase -i HEAD~3', '', 45),
(193, 'cancel git rebase', 'rm -fr \".git/rebase-merge\"', '', 45),
(194, 'Routine created by path', 'Ex: https://mydocs.com/index.php/linux/index/index/level/3048<br>\r\n/linux/index/index/ ==> Module / Controlleur  /  Action <br>\r\ncorresponding view path:<br>\r\napp/linux/views/scripts/index/index.phtml', '', 112),
(195, 'Justify columns', 'div class=\"row container d-flex mr-auto ml-auto align-items-center justify-content-center\"', '', 113),
(196, 'Cmd: Open Program Files', 'cd %programfiles%', '', 114),
(197, 'scan and repair files', 'sfc -scannow', '', 114),
(198, 'General Advise', '<pre class=\"text-break\">\r\nL\'éco-conception en programmation consiste à concevoir et à développer des logiciels de manière à minimiser leur impact sur l\'environnement et à améliorer leur efficacité énergétique. Voici quelques règles à suivre pour respecter l\'éco-conception en programmation à partir de zéro :\r\n\r\n    Concevoir une architecture efficace : Conception d\'une architecture efficace et économe en énergie, qui prend en compte les ressources matérielles et logicielles. Éviter les systèmes monolithiques et favoriser les architectures microservices ou orientées services.\r\n\r\n    Optimiser les algorithmes : Optimiser les algorithmes et les structures de données pour minimiser l\'utilisation des ressources matérielles, notamment le processeur et la mémoire. Éviter les algorithmes récursifs ou coûteux en temps de calcul.\r\n\r\n    Éviter les requêtes excessives : Éviter les requêtes excessives à la base de données ou aux services tiers. Utiliser des techniques de mise en cache et de préchargement pour minimiser les requêtes et les temps d\'attente.\r\n\r\n    Minimiser les échanges de données : Minimiser les échanges de données entre les composants du système, en évitant les transferts de données inutiles et en utilisant des formats de données efficaces.\r\n\r\n    Optimiser le code : Optimiser le code pour minimiser la consommation de ressources. Utiliser des techniques telles que la suppression de code mort, l\'optimisation de la mémoire et la gestion des exceptions.\r\n\r\n    Gérer les ressources énergétiques : Gérer les ressources énergétiques en utilisant des outils de surveillance et de gestion de la consommation d\'énergie.\r\n\r\n    Concevoir une interface utilisateur efficace : Concevoir une interface utilisateur efficace qui utilise des graphismes simples et des interactions efficaces pour minimiser l\'utilisation de la batterie et du processeur.\r\n\r\n    Utiliser des logiciels open-source : Utiliser des logiciels open-source qui sont économes en énergie et qui ont été développés dans le cadre de l\'éco-conception.\r\n\r\nEn suivant ces règles, les développeurs peuvent concevoir des logiciels plus efficaces, plus rapides et plus respectueux de l\'environnement. Cela peut également aider à réduire les coûts d\'exploitation et à améliorer l\'expérience utilisateur.\r\n\r\n\r\nDe façon générale voici quelques suggestions qui nous aident à créer un code qui respecte les chartes de l\'éco-conception:\r\n\r\nUtilisez des variables d\'environnement pour stocker les valeurs de configuration qui peuvent différer entre les environnements. \r\nPar exemple, les identifiants de base de données ou les clés d\'API.\r\n\r\nÉvitez de coder en dur les chemins ou les URL dans votre code. \r\nUtilisez plutôt des chemins relatifs ou des URL de base qui peuvent être configurés pour chaque environnement.\r\n\r\nUtilisez un système de contrôle de version comme Git pour suivre les modifications de votre code et de vos configurations. \r\nCela vous aidera à revenir facilement en arrière si quelque chose ne va pas en production.\r\n\r\nTestez votre code dans différents environnements, y compris le développement, la pré-production et la production, \r\npour vous assurer qu\'il fonctionne comme prévu.\r\n</pre>\r\n', '', 115);

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `note`
--

INSERT INTO `note` (`id`, `name`, `description`) VALUES
(15, 'Program', '<ul><li>Microservices</li><li>New in Php8</li><li>Patterns</li><li>Router</li><li>Dependance container</li><li>Api Authentication</li><li>SOLID</li></ul>'),
(46, 'Skill Project', '<ul><li> Improve Render: <ul><li>Only objects and not Array</li><li>Settle a container DI</li></ul></li></ul>'),
(47, 'PVT', '. Cherry Pick<br>\r\n. Associations, dépendance, héritage UML');

-- --------------------------------------------------------

--
-- Table structure for table `privilege`
--

CREATE TABLE `privilege` (
  `id` int(11) NOT NULL,
  `name` varchar(15) NOT NULL,
  `description` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `logo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(78, 'Microsoft', 'microsoft.png'),
(80, 'NodeJs', 'nodejs.png'),
(81, 'Security', 'security.png'),
(106, 'Study', 'study.png'),
(107, 'Symfony', 'symfony.png'),
(108, 'Notepad++', 'notapad++.png'),
(109, 'JavaScript', 'javascript.png'),
(110, 'Sonarlint', 'sonarlint.png'),
(111, 'PhpCS', 'phpcs.png'),
(112, 'Zend', 'zend.png'),
(113, 'Bootstrap', 'bootstrap.png'),
(114, 'Windows', 'windows.png'),
(115, 'eco-conception', 'eco-conception.png');

-- --------------------------------------------------------

--
-- Table structure for table `url`
--

CREATE TABLE `url` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `url` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(46, 'Inversion des conteneurs de contrôle et du modèle d\'injection de dépendance', 'public/doc/Inversion_of_Control_Containers_and_DI_pattern_fr.pdf'),
(47, 'Stored Procedure', 'https://www.youtube.com/watch?v=5gJ0Xxa6390'),
(48, 'Stored Procedure', 'https://www.youtube.com/watch?v=5gJ0Xxa6390'),
(49, 'Json to Csv conversion', 'https://www.cyberciti.biz/faq/how-to-convert-json-to-csv-using-linux-unix-shell/'),
(50, 'Json to Csv conversion', 'https://www.cyberciti.biz/faq/how-to-convert-json-to-csv-using-linux-unix-shell/'),
(51, 'Json to Csv conversion', 'https://www.cyberciti.biz/faq/how-to-convert-json-to-csv-using-linux-unix-shell/'),
(52, 'Json to Csv conversion', 'https://www.cyberciti.biz/faq/how-to-convert-json-to-csv-using-linux-unix-shell/'),
(53, 'Json to Csv conversion', 'https://www.cyberciti.biz/faq/how-to-convert-json-to-csv-using-linux-unix-shell/'),
(54, 'Json to Csv conversion', 'https://www.cyberciti.biz/faq/how-to-convert-json-to-csv-using-linux-unix-shell/'),
(55, 'Json to Csv conversion', 'https://www.cyberciti.biz/faq/how-to-convert-json-to-csv-using-linux-unix-shell/'),
(56, 'Security : Validating and escaping', 'https://dev.to/anastasionico/good-practices-how-to-sanitize-validate-and-escape-in-php-3-methods-139b'),
(57, 'News of IT Technologies', 'https://news.humancoders.com/'),
(58, 'Refactoring, Design patterns, SOLID principes ...', 'https://refactoring.guru/fr/refactoring/techniques'),
(59, 'Equivalent of ChatGpt', 'https://app.writesonic.com/'),
(60, 'IT Courses (Symfony, Vue, PHP, Python, Javascript, Angular ...)', 'https://dyma.fr/developer/list/chapters/core'),
(61, 'Sonarlint', 'https://www.sonarsource.com/products/sonarlint/'),
(62, 'PhpCS', 'https://les-enovateurs.com/php-codesniffer-loutil-ultime-pour-valider-et-corriger-votre-code-php'),
(63, 'Sonarlint', 'https://www.sonarsource.com/products/sonarlint/'),
(64, 'Computer Science courses with video lectures', 'https://github.com/Developer-Y/cs-video-courses/blob/master/README.md'),
(65, 'All SQL Engines', 'https://www.javatpoint.com/');

-- --------------------------------------------------------

--
-- Table structure for table `url_skill_item`
--

CREATE TABLE `url_skill_item` (
  `id` int(11) NOT NULL,
  `url_id` int(11) NOT NULL,
  `skill_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(40, 46, 4, 8),
(42, 48, 5, 169),
(49, 55, 3, NULL),
(50, 56, 1, NULL),
(51, 57, 36, NULL),
(52, 58, 4, NULL),
(53, 59, 6, NULL),
(54, 60, 36, NULL),
(55, 61, 110, NULL),
(56, 62, 111, NULL),
(57, 63, 77, NULL),
(58, 64, 36, NULL),
(59, 65, 5, NULL);

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
-- Indexes for table `connection`
--
ALTER TABLE `connection`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `demo`
--
ALTER TABLE `demo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `privilege`
--
ALTER TABLE `privilege`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `skill`
--
ALTER TABLE `skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `url`
--
ALTER TABLE `url`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `url_skill_item`
--
ALTER TABLE `url_skill_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

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

