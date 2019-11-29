<?php
require_once ('config/database.php');
define('DB_NAME', 'Cama');

    $err = myPDO::init_db(DB_NAME, "mysql", "root", "rootpass");
if ($err == '1049') {
    try {
        $db = new PDO('mysql:host=mysql;charset=utf8', 'root', 'rootpass', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        $db->query('CREATE DATABASE '.DB_NAME);
        $db->query('use ' .DB_NAME);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

}
try
{
    $sql = "
             CREATE TABLE IF NOT EXISTS commentaire (
        `id` int(11) NOT NULL,
          `like_pict` int(11) NOT NULL,
          `commentaire` varchar(500) NOT NULL,
          `login` varchar(255) NOT NULL,
          `picture_id` varchar(500) NOT NULL,
          `mois` varchar(500) NOT NULL,
          `heure` varchar(500) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
        
        CREATE TABLE IF NOT EXISTS`like_button` (
        `id` int(11) NOT NULL,
          `login` varchar(500) NOT NULL,
          `picture_id` varchar(500) NOT NULL,
          `picture_like` tinyint(1) NOT NULL DEFAULT '0'
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
        
        CREATE TABLE IF NOT EXISTS `pictures` (
        `id` int(11) NOT NULL,
          `content` longblob NOT NULL,
          `key_user` varchar(500) NOT NULL,
          `valid` tinyint(1) NOT NULL DEFAULT '0',
          `filtre` longtext NOT NULL,
          `id_unique` mediumtext NOT NULL,
          `login` varchar(500) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
        
        CREATE TABLE IF NOT EXISTS `users` (
        `id` int(11) NOT NULL,
          `login` varchar(20) NOT NULL,
          `fname` varchar(20) NOT NULL,
          `lname` varchar(20) NOT NULL,
          `phone` varchar(10) DEFAULT NULL,
          `pic` varchar(255) NOT NULL DEFAULT 'https://bootdey.com/img/Content/avatar/avatar1.png',
          `mail` varchar(254) NOT NULL,
          `password` varchar(254) NOT NULL,
          `date` date NOT NULL,
          `token` varchar(254) DEFAULT NULL COMMENT ' mail link',
          `status` varchar(1) DEFAULT NULL COMMENT 'u = user et a = admin',
          `notif` tinyint(1) NOT NULL,
          `key_user` varchar(500) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
        --
-- Indexes for dumped tables
--

--
-- Indexes for table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `like_button`
--
ALTER TABLE `like_button`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `LOGIN` (`login`),
  ADD UNIQUE KEY `MAIL` (`mail`),
  ADD KEY `status` (`status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `like_button`
--
ALTER TABLE `like_button`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;
";

    $db = myPDO::getdb();
    $db->exec($sql);
}
 catch(PDOException $e) {
     echo $e->getMessage();
     die();
}
  ?>