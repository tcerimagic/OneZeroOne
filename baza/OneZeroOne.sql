CREATE DATABASE  IF NOT EXISTS `onezeroone_shema` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_slovenian_ci */;
USE `onezeroone_shema`;
-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: onezeroone_shema
-- ------------------------------------------------------
-- Server version	5.7.12-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `autori`
--

DROP TABLE IF EXISTS `autori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `autori` (
  `username` varchar(30) COLLATE utf8_slovenian_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_slovenian_ci NOT NULL,
  `naziv` varchar(50) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8_slovenian_ci DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `autori`
--

LOCK TABLES `autori` WRITE;
/*!40000 ALTER TABLE `autori` DISABLE KEYS */;
INSERT INTO `autori` VALUES ('admin','c4ca4238a0b923820dcc509a6f75849b','Timur Cerimagic','tcerimagic@gmail.com'),('autor1','21232f297a57a5a743894a0e4a801fc3','Autor Autora','autor@etf.unsa.ba'),('timur','21232f297a57a5a743894a0e4a801fc3','Cera Sef','tcr@fdsa.com');
/*!40000 ALTER TABLE `autori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `komentari`
--

DROP TABLE IF EXISTS `komentari`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `komentari` (
  `id_komentara` int(11) NOT NULL AUTO_INCREMENT,
  `autor` varchar(30) COLLATE utf8_slovenian_ci NOT NULL DEFAULT 'gost',
  `tekst` text COLLATE utf8_slovenian_ci,
  `procitan` varchar(2) CHARACTER SET utf8 NOT NULL DEFAULT 'ne',
  `novost` int(11) NOT NULL,
  PRIMARY KEY (`id_komentara`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `komentari`
--

LOCK TABLES `komentari` WRITE;
/*!40000 ALTER TABLE `komentari` DISABLE KEYS */;
INSERT INTO `komentari` VALUES (2,'admin','neki tekst komentara','ne',3),(3,'admin','vfdfdasfas','ne',3);
/*!40000 ALTER TABLE `komentari` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `novosti`
--

DROP TABLE IF EXISTS `novosti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `novosti` (
  `id_novosti` int(11) NOT NULL AUTO_INCREMENT,
  `autor` varchar(30) CHARACTER SET utf8 NOT NULL,
  `naslov` varchar(45) COLLATE utf8_slovenian_ci NOT NULL,
  `tekst` mediumtext COLLATE utf8_slovenian_ci NOT NULL,
  `datum` datetime NOT NULL,
  `komentari` varchar(2) CHARACTER SET utf8 DEFAULT 'da',
  `slika` varchar(100) COLLATE utf8_slovenian_ci DEFAULT NULL,
  PRIMARY KEY (`id_novosti`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `novosti`
--

LOCK TABLES `novosti` WRITE;
/*!40000 ALTER TABLE `novosti` DISABLE KEYS */;
INSERT INTO `novosti` VALUES (3,'admin','Slusalice','In the software industry, \"Gadget\" refers to computer programs that provide services without needing an independent application to be launched for each one, but instead run in an environment that manages multiple gadgets. There are several implementations based on existing software development techniques, like JavaScript, form input, and various image formats.</br></br>Further information: Google Desktop, Google Gadgets, Microsoft Gadgets and Dashboard software Apple Widgets</br>The earliest[citation needed] documented use of the term gadget in context of software engineering was in 1985 by the developers of AmigaOS, the operating system of the Amiga computers (intuition.library and also later gadtools.library). It denotes what other technological traditions call GUI widget—a control element in graphical user interface. This naming convention remains in continuing use (as of 2008) since then.</br></br>The X11[6] windows system \'Intrinsics\'[7] also defines gadgets and their relationship to widgets (buttons, labels etc.). The gadget was a windowless widget which was supposed to improve the performance of the application by reducing the memory load on the X server. A gadget would use the Window id of its parent widget and had no children of its own</br></br>It is not known whether other software companies are explicitly drawing on that inspiration when featuring the word in names of their technologies or simply referring to the generic meaning. The word widget is older in this context. In the movie \"Back to School\" from 1986 by Alan Metter, there is a scene where an economics professor Dr. Barbay, wants to start for educational purposes a fictional company that produces \"widgets: It\'s a fictional product.\"','2016-06-04 11:04:02','da','slikeNovosti/do-be-do-be-do.jpg'),(4,'admin','Acer','In the software industry, \"Gadget\" refers to computer programs that provide services without needing an independent application to be launched for each one, but instead run in an environment that manages multiple gadgets. There are several implementations based on existing software development techniques, like JavaScript, form input, and various image formats.</br></br>Further information: Google Desktop, Google Gadgets, Microsoft Gadgets and Dashboard software Apple Widgets</br>The earliest[citation needed] documented use of the term gadget in context of software engineering was in 1985 by the developers of AmigaOS, the operating system of the Amiga computers (intuition.library and also later gadtools.library). It denotes what other technological traditions call GUI widget—a control element in graphical user interface. This naming convention remains in continuing use (as of 2008) since then.</br></br>The X11[6] windows system \'Intrinsics\'[7] also defines gadgets and their relationship to widgets (buttons, labels etc.). The gadget was a windowless widget which was supposed to improve the performance of the application by reducing the memory load on the X server. A gadget would use the Window id of its parent widget and had no children of its own</br></br>It is not known whether other software companies are explicitly drawing on that inspiration when featuring the word in names of their technologies or simply referring to the generic meaning. The word widget is older in this context. In the movie \"Back to School\" from 1986 by Alan Metter, there is a scene where an economics professor Dr. Barbay, wants to start for educational purposes a fictional company that produces \"widgets: It\'s a fictional product.\"','2016-06-04 11:04:38','da','slikeNovosti/946495.jpg'),(5,'admin','Ze jedan','In the software industry, \"Gadget\" refers to computer programs that provide services without needing an independent application to be launched for each one, but instead run in an environment that manages multiple gadgets. There are several implementations based on existing software development techniques, like JavaScript, form input, and various image formats.</br></br>Further information: Google Desktop, Google Gadgets, Microsoft Gadgets and Dashboard software Apple Widgets</br>The earliest[citation needed] documented use of the term gadget in context of software engineering was in 1985 by the developers of AmigaOS, the operating system of the Amiga computers (intuition.library and also later gadtools.library). It denotes what other technological traditions call GUI widget—a control element in graphical user interface. This naming convention remains in continuing use (as of 2008) since then.</br></br>The X11[6] windows system \'Intrinsics\'[7] also defines gadgets and their relationship to widgets (buttons, labels etc.). The gadget was a windowless widget which was supposed to improve the performance of the application by reducing the memory load on the X server. A gadget would use the Window id of its parent widget and had no children of its own</br></br>It is not known whether other software companies are explicitly drawing on that inspiration when featuring the word in names of their technologies or simply referring to the generic meaning. The word widget is older in this context. In the movie \"Back to School\" from 1986 by Alan Metter, there is a scene where an economics professor Dr. Barbay, wants to start for educational purposes a fictional company that produces \"widgets: It\'s a fictional product.\"','2016-06-04 12:51:12','da','slikeNovosti/images.jpg'),(6,'timur','Omen','In the software industry, \"Gadget\" refers to computer programs that provide services without needing an independent application to be launched for each one, but instead run in an environment that manages multiple gadgets. There are several implementations based on existing software development techniques, like JavaScript, form input, and various image formats.</br></br>Further information: Google Desktop, Google Gadgets, Microsoft Gadgets and Dashboard software Apple Widgets</br>The earliest[citation needed] documented use of the term gadget in context of software engineering was in 1985 by the developers of AmigaOS, the operating system of the Amiga computers (intuition.library and also later gadtools.library). It denotes what other technological traditions call GUI widget—a control element in graphical user interface. This naming convention remains in continuing use (as of 2008) since then.</br></br>The X11[6] windows system \'Intrinsics\'[7] also defines gadgets and their relationship to widgets (buttons, labels etc.). The gadget was a windowless widget which was supposed to improve the performance of the application by reducing the memory load on the X server. A gadget would use the Window id of its parent widget and had no children of its own</br></br>It is not known whether other software companies are explicitly drawing on that inspiration when featuring the word in names of their technologies or simply referring to the generic meaning. The word widget is older in this context. In the movie \"Back to School\" from 1986 by Alan Metter, there is a scene where an economics professor Dr. Barbay, wants to start for educational purposes a fictional company that produces \"widgets: It\'s a fictional product.\"','2016-06-04 12:57:01','da','slikeNovosti/437221.jpg'),(7,'timur','SSD','In the software industry, \"Gadget\" refers to computer programs that provide services without needing an independent application to be launched for each one, but instead run in an environment that manages multiple gadgets. There are several implementations based on existing software development techniques, like JavaScript, form input, and various image formats.</br></br>Further information: Google Desktop, Google Gadgets, Microsoft Gadgets and Dashboard software Apple Widgets</br>The earliest[citation needed] documented use of the term gadget in context of software engineering was in 1985 by the developers of AmigaOS, the operating system of the Amiga computers (intuition.library and also later gadtools.library). It denotes what other technological traditions call GUI widget—a control element in graphical user interface. This naming convention remains in continuing use (as of 2008) since then.</br></br>The X11[6] windows system \'Intrinsics\'[7] also defines gadgets and their relationship to widgets (buttons, labels etc.). The gadget was a windowless widget which was supposed to improve the performance of the application by reducing the memory load on the X server. A gadget would use the Window id of its parent widget and had no children of its own</br></br>It is not known whether other software companies are explicitly drawing on that inspiration when featuring the word in names of their technologies or simply referring to the generic meaning. The word widget is older in this context. In the movie \"Back to School\" from 1986 by Alan Metter, there is a scene where an economics professor Dr. Barbay, wants to start for educational purposes a fictional company that produces \"widgets: It\'s a fictional product.\"','2016-06-04 12:57:53','da','slikeNovosti/ssd.jpg'),(9,'autor1','Tipkovnica aka tEstetura','In the software industry, \"Gadget\" refers to computer programs that provide services without needing an independent application to be launched for each one, but instead run in an environment that manages multiple gadgets. There are several implementations based on existing software development techniques, like JavaScript, form input, and various image formats.</br></br>Further information: Google Desktop, Google Gadgets, Microsoft Gadgets and Dashboard software Apple Widgets</br>The earliest[citation needed] documented use of the term gadget in context of software engineering was in 1985 by the developers of AmigaOS, the operating system of the Amiga computers (intuition.library and also later gadtools.library). It denotes what other technological traditions call GUI widget—a control element in graphical user interface. This naming convention remains in continuing use (as of 2008) since then.</br></br>The X11[6] windows system \'Intrinsics\'[7] also defines gadgets and their relationship to widgets (buttons, labels etc.). The gadget was a windowless widget which was supposed to improve the performance of the application by reducing the memory load on the X server. A gadget would use the Window id of its parent widget and had no children of its own</br></br>It is not known whether other software companies are explicitly drawing on that inspiration when featuring the word in names of their technologies or simply referring to the generic meaning. The word widget is older in this context. In the movie \"Back to School\" from 1986 by Alan Metter, there is a scene where an economics professor Dr. Barbay, wants to start for educational purposes a fictional company that produces \"widgets: It\'s a fictional product.\"','2016-06-04 13:14:50','ne','slikeNovosti/6tag_181115-104916.jpg');
/*!40000 ALTER TABLE `novosti` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `odgovori`
--

DROP TABLE IF EXISTS `odgovori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `odgovori` (
  `id_odgovora` int(11) NOT NULL AUTO_INCREMENT,
  `autor` varchar(30) COLLATE utf8_slovenian_ci NOT NULL DEFAULT 'gost',
  `tekst` text COLLATE utf8_slovenian_ci NOT NULL,
  `komentar` int(11) NOT NULL,
  PRIMARY KEY (`id_odgovora`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `odgovori`
--

LOCK TABLES `odgovori` WRITE;
/*!40000 ALTER TABLE `odgovori` DISABLE KEYS */;
INSERT INTO `odgovori` VALUES (2,'admin','dsadsadsa',3),(4,'admin','fasdfasdfasd',3);
/*!40000 ALTER TABLE `odgovori` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-06-06 17:26:21
