/*
SQLyog Ultimate v10.42 
MySQL - 5.6.17 : Database - pushsms
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`pushsms` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;

USE `pushsms`;

/*Table structure for table `customer` */

DROP TABLE IF EXISTS `customer`;

CREATE TABLE `customer` (
  `customerID` varchar(100) COLLATE utf8_bin NOT NULL,
  `customerName` varchar(64) COLLATE utf8_bin NOT NULL,
  `customerSurname` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(64) COLLATE utf8_bin NOT NULL,
  `password` text COLLATE utf8_bin NOT NULL,
  `customerPhone` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `active` tinyint(1) DEFAULT '0',
  `rememberTokenActivate` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`customerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `customer` */

insert  into `customer`(`customerID`,`customerName`,`customerSurname`,`email`,`password`,`customerPhone`,`active`,`rememberTokenActivate`,`created_at`,`updated_at`) values ('58663165e395b5d6eaa6b9d685d9b6970087c924','talla clovis',NULL,'clovis.dassi@gmail.com','7c29fd10e3f452730fc327885f47ab1357a915e1','694422852',1,0,'2020-08-03 11:33:22','2020-08-03 11:33:57'),('7fe64d1d0f1e12d6d9d4fdb1725755d27f64f323','ondobo mvolo rapha',NULL,'raphaondobo@gmail.com','1f82ea75c5cc526729e2d581aeb3aeccfef4407e','94148904',1,0,'2020-08-01 20:14:35','2020-08-01 20:17:30'),('dfa4bb3e4de1e3ec8368dff4ec76e740e355e685','Rapha Ondobo',NULL,'raphaelgloire@yahoo.fr','1f82ea75c5cc526729e2d581aeb3aeccfef4407e','695633802',0,0,'2020-08-03 11:34:33','2020-08-03 11:34:33');

/*Table structure for table `forfais` */

DROP TABLE IF EXISTS `forfais`;

CREATE TABLE `forfais` (
  `forfais_id` int(11) NOT NULL AUTO_INCREMENT,
  `forfais_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `smsQte` bigint(20) NOT NULL,
  `taux` double DEFAULT NULL,
  `statusForfais` enum('expired','valide','over') COLLATE utf8_bin DEFAULT NULL,
  `remainingSMS` bigint(20) NOT NULL,
  `created_at` varchar(64) COLLATE utf8_bin NOT NULL,
  `updated_at` varchar(64) COLLATE utf8_bin NOT NULL,
  `customerReff` varchar(64) COLLATE utf8_bin NOT NULL,
  `seuilAlert` varchar(44) COLLATE utf8_bin DEFAULT '25%',
  PRIMARY KEY (`forfais_id`),
  KEY `fk_customer_forfaits` (`customerReff`),
  CONSTRAINT `fk_customer_forfaits` FOREIGN KEY (`customerReff`) REFERENCES `customer` (`customerID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `forfais` */

insert  into `forfais`(`forfais_id`,`forfais_name`,`smsQte`,`taux`,`statusForfais`,`remainingSMS`,`created_at`,`updated_at`,`customerReff`,`seuilAlert`) values (1,'New Customer Deal',5,15,'valide',5,'','','7fe64d1d0f1e12d6d9d4fdb1725755d27f64f323','25%'),(8,'New Customer Deal',5,15,'valide',2,'2020-08-03','2020-08-03','58663165e395b5d6eaa6b9d685d9b6970087c924','25%'),(9,'New Customer Deal',5,15,'valide',5,'2020-08-03','2020-08-03','dfa4bb3e4de1e3ec8368dff4ec76e740e355e685','25%');

/*Table structure for table `message` */

DROP TABLE IF EXISTS `message`;

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` varchar(64) COLLATE utf8_bin NOT NULL,
  `receiver` varchar(64) COLLATE utf8_bin NOT NULL,
  `statusMessage` enum('send','wait','fail') COLLATE utf8_bin DEFAULT NULL,
  `content` text COLLATE utf8_bin NOT NULL,
  `created_at` varchar(64) COLLATE utf8_bin NOT NULL,
  `updated_at` varchar(64) COLLATE utf8_bin NOT NULL,
  `customerReff` varchar(64) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`message_id`),
  KEY `fk_customer_message` (`customerReff`),
  CONSTRAINT `fk_customer_message` FOREIGN KEY (`customerReff`) REFERENCES `customer` (`customerID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `message` */

insert  into `message`(`message_id`,`sender`,`receiver`,`statusMessage`,`content`,`created_at`,`updated_at`,`customerReff`) values (1,'RAPHA','695633802','send','UN PEUT DE TEXT','2020-08-01 23:11:27','2020-08-01 23:11:27','7fe64d1d0f1e12d6d9d4fdb1725755d27f64f323'),(2,'RAPHA','650786923','send','UN PEUT DE TEXT','2020-08-01 23:11:28','2020-08-01 23:11:28','7fe64d1d0f1e12d6d9d4fdb1725755d27f64f323'),(3,'HBethesda','650786923','send','Vous avez render vous merci','2020-08-01 23:12:38','2020-08-01 23:12:38','7fe64d1d0f1e12d6d9d4fdb1725755d27f64f323'),(4,'HBethesda','695633802','send','Voila nous vous faisons des messages aux deux numeros','2020-08-01 23:16:27','2020-08-01 23:16:27','7fe64d1d0f1e12d6d9d4fdb1725755d27f64f323'),(5,'HBethesda','650786923','send','Voila nous vous faisons des messages aux deux numeros','2020-08-01 23:16:28','2020-08-01 23:16:28','7fe64d1d0f1e12d6d9d4fdb1725755d27f64f323'),(6,'HBethesda','695633802','send','ON test le nombre de mes sms','2020-08-03 11:43:11','2020-08-03 11:43:11','7fe64d1d0f1e12d6d9d4fdb1725755d27f64f323'),(7,'HBethesda','','send','ON test le nombre de mes sms','2020-08-03 11:43:11','2020-08-03 11:43:11','7fe64d1d0f1e12d6d9d4fdb1725755d27f64f323'),(8,'J.V.Samson','655223128','send','ELECTIONS DU CNOPC. \r\nPlus que 8 jours pour payer sa cotisation et pouvoir voter nos représentants. \r\nAvec Samson Ndombo, une nouvelle dynamique.','2020-08-03 11:51:05','2020-08-03 11:51:05','58663165e395b5d6eaa6b9d685d9b6970087c924'),(9,'J.V.Samson','694422852','send','ELECTIONS DU CNOPC. \r\nPlus que 8 jours pour payer sa cotisation et pouvoir voter nos représentants. \r\nAvec Samson Ndombo, une nouvelle dynamique.','2020-08-03 11:51:06','2020-08-03 11:51:06','58663165e395b5d6eaa6b9d685d9b6970087c924'),(10,'J.V.Samson','652031665','send','ELECTIONS DU CNOPC. \r\nPlus que 8 jours pour payer sa cotisation et pouvoir voter nos représentants. \r\nAvec Samson Ndombo, une nouvelle dynamique.','2020-08-03 11:51:09','2020-08-03 11:51:09','58663165e395b5d6eaa6b9d685d9b6970087c924'),(11,'El RAPHA','695633802','send','Bonsoir jeune dame, parce vous est précieuse pour lui Rapha nous charges de vous transmettre de passer une bonne et agréable nuit.','2020-08-03 21:41:06','2020-08-03 21:41:06','7fe64d1d0f1e12d6d9d4fdb1725755d27f64f323'),(12,'El RAPHA','655130865','send','Bonsoir jeune dame, parce vous est précieuse pour lui Rapha nous charges de vous transmettre de passer une bonne et agréable nuit.','2020-08-03 21:42:44','2020-08-03 21:42:44','7fe64d1d0f1e12d6d9d4fdb1725755d27f64f323'),(13,'El RAPHA','655077049','send','Bonsoir jeune dame, parce vous est précieuse pour lui Rapha nous charges de vous transmettre de passer une bonne et agréable nuit.','2020-08-03 21:42:47','2020-08-03 21:42:47','7fe64d1d0f1e12d6d9d4fdb1725755d27f64f323'),(14,'El RAPHA','656506836','send','Bonsoir jeune dame, parce vous est précieuse pour lui Rapha nous charges de vous transmettre de passer une bonne et agréable nuit.','2020-08-03 21:42:51','2020-08-03 21:42:51','7fe64d1d0f1e12d6d9d4fdb1725755d27f64f323');

/*Table structure for table `project` */

DROP TABLE IF EXISTS `project`;

CREATE TABLE `project` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `api_key` varchar(64) COLLATE utf8_bin NOT NULL,
  `project_label` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `created_at` varchar(64) COLLATE utf8_bin NOT NULL,
  `updated_at` varchar(64) COLLATE utf8_bin NOT NULL,
  `customerReff` varchar(64) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`project_id`),
  KEY `fk_customer` (`customerReff`),
  CONSTRAINT `fk_customer` FOREIGN KEY (`customerReff`) REFERENCES `customer` (`customerID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `project` */

insert  into `project`(`project_id`,`project_name`,`api_key`,`project_label`,`created_at`,`updated_at`,`customerReff`) values (1,'TEST APP','lsdghsdkhsdkgh','RAPHA','','','7fe64d1d0f1e12d6d9d4fdb1725755d27f64f323');

/*Table structure for table `provider` */

DROP TABLE IF EXISTS `provider`;

CREATE TABLE `provider` (
  `providerID` int(11) NOT NULL AUTO_INCREMENT,
  `providerName` varchar(64) COLLATE utf8_bin NOT NULL,
  `providerUsername` varchar(64) COLLATE utf8_bin NOT NULL,
  `providerPassword` varchar(64) COLLATE utf8_bin NOT NULL,
  `smsCapacity` int(11) DEFAULT '0',
  PRIMARY KEY (`providerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `provider` */

/*Table structure for table `repertoire` */

DROP TABLE IF EXISTS `repertoire`;

CREATE TABLE `repertoire` (
  `Repert_id` int(11) NOT NULL AUTO_INCREMENT,
  `Repert_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `Repert_desciption` text COLLATE utf8_bin,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `customerReff` varchar(64) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`Repert_id`),
  KEY `fk_customer_repertoire` (`customerReff`),
  CONSTRAINT `fk_customer_repertoire` FOREIGN KEY (`customerReff`) REFERENCES `customer` (`customerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `repertoire` */

/* Trigger structure for table `customer` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `after_insert_customer` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `after_insert_customer` AFTER INSERT ON `customer` FOR EACH ROW begin 
	insert into forfais(forfais_name, smsQte, taux, statusForfais, remainingSMS, customerReff, created_at, updated_at ) 
	value('New Customer Deal', 5, 15, 'valide', 5, NEW.customerID, curdate(), curdate());
end */$$


DELIMITER ;

/* Trigger structure for table `message` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `after_insert_message` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `after_insert_message` AFTER INSERT ON `message` FOR EACH ROW BEGIN 
	update forfais set remainingSMS = (remainingSMS -1) where forfais.`customerReff` =  NEW.customerReff;
	UPDATE provider SET smsCapacity = (smsCapacity -1);
END */$$


DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
