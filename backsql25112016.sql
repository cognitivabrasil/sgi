-- MySQL dump 10.13  Distrib 5.5.53, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: erpcei
-- ------------------------------------------------------
-- Server version	5.5.53-0ubuntu0.14.04.1

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
-- Table structure for table `erp_colaboradores`
--

DROP TABLE IF EXISTS `erp_colaboradores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `erp_colaboradores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `funcao` varchar(255) DEFAULT NULL,
  `vinculo` varchar(45) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `entrada` timestamp NULL DEFAULT NULL,
  `saida` timestamp NULL DEFAULT NULL,
  `sem_funcao` int(11) DEFAULT NULL,
  `em_atividade` int(11) DEFAULT NULL,
  `socio` int(11) DEFAULT NULL,
  `id_empreendimento` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `erp_colaboradores`
--

LOCK TABLES `erp_colaboradores` WRITE;
/*!40000 ALTER TABLE `erp_colaboradores` DISABLE KEYS */;
INSERT INTO `erp_colaboradores` VALUES (1,'Fulaninho de tal editado','testador','1','fulaninho@gmail.com','2010-11-10 02:00:00','0000-00-00 00:00:00',0,1,0,15),(2,'Fulaninho de tal','testador','1','fulaninho@gmail.com','2010-11-10 02:00:00','0000-00-00 00:00:00',0,1,0,15),(3,'Fulaninho de tal','testador','1','fulaninho@gmail.com','2010-11-10 02:00:00','0000-00-00 00:00:00',0,1,0,16);
/*!40000 ALTER TABLE `erp_colaboradores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `erp_empreendimentos`
--

DROP TABLE IF EXISTS `erp_empreendimentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `erp_empreendimentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `nome_fantasia` varchar(255) DEFAULT NULL,
  `vinculo` varchar(45) DEFAULT NULL,
  `razao_social` varchar(255) DEFAULT NULL,
  `site` varchar(255) DEFAULT NULL,
  `responsavel` varchar(255) DEFAULT NULL,
  `cpf_cnpj` varchar(255) DEFAULT NULL,
  `responsavel_email` varchar(45) DEFAULT NULL,
  `descricao` text,
  `logo` varchar(255) DEFAULT NULL,
  `canvas` varchar(255) DEFAULT NULL,
  `contador` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `erp_empreendimentos`
--

LOCK TABLES `erp_empreendimentos` WRITE;
/*!40000 ALTER TABLE `erp_empreendimentos` DISABLE KEYS */;
INSERT INTO `erp_empreendimentos` VALUES (1,'CEI','CEI','1','CEI','',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(15,'Cognitiva Brasil','Cognitiva Brasil','3','Cognitiva Brasil','www.cognitivabrasil.com.br','Marcos Nunes','19283719328','marcos@cognitivabrasil.com.br','Descricao da cog','/var/www/html/erpcei/uploads/logo.png','/var/www/html/erpcei/uploads/acai16.jpg','Joãozinho da Silva'),(16,'Bee IT','Bee IT','2','Bee IT','http://www.beeit.com.br/','Marcos Nunes','1029387102938','marcos@cognitivabrasil.com.br','descricao da beeIT','/var/www/html/erpcei/uploads/logo.png','/var/www/html/erpcei/uploads/acai16.jpg',NULL);
/*!40000 ALTER TABLE `erp_empreendimentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `erp_empreendimentos_contrato`
--

DROP TABLE IF EXISTS `erp_empreendimentos_contrato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `erp_empreendimentos_contrato` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_empreendimento` int(11) NOT NULL,
  `contrato` varchar(255) DEFAULT NULL,
  `data` timestamp NULL DEFAULT NULL,
  `ativo` smallint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `erp_empreendimentos_contrato`
--

LOCK TABLES `erp_empreendimentos_contrato` WRITE;
/*!40000 ALTER TABLE `erp_empreendimentos_contrato` DISABLE KEYS */;
INSERT INTO `erp_empreendimentos_contrato` VALUES (11,15,'/var/www/html/erpcei/uploads/loft.jpg','2007-11-10 02:00:00',NULL),(12,15,'/var/www/html/erpcei/uploads/challenger4.png','2009-11-10 02:00:00',NULL),(13,17,NULL,'0000-00-00 00:00:00',NULL);
/*!40000 ALTER TABLE `erp_empreendimentos_contrato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `erp_empreendimentos_ps`
--

DROP TABLE IF EXISTS `erp_empreendimentos_ps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `erp_empreendimentos_ps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_empreendimento` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `erp_empreendimentos_ps`
--

LOCK TABLES `erp_empreendimentos_ps` WRITE;
/*!40000 ALTER TABLE `erp_empreendimentos_ps` DISABLE KEYS */;
INSERT INTO `erp_empreendimentos_ps` VALUES (19,15,'produto 1','descricao do produto 1'),(20,15,'produto 2','descricao do produto 2'),(21,17,'',''),(22,17,'','');
/*!40000 ALTER TABLE `erp_empreendimentos_ps` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `erp_faturamento`
--

DROP TABLE IF EXISTS `erp_faturamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `erp_faturamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_empreendimento` int(11) DEFAULT NULL,
  `previsao` double DEFAULT NULL,
  `ano` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `erp_faturamento`
--

LOCK TABLES `erp_faturamento` WRITE;
/*!40000 ALTER TABLE `erp_faturamento` DISABLE KEYS */;
INSERT INTO `erp_faturamento` VALUES (1,1,89874,'2012'),(11,1,654654,'2013'),(12,1,0,'54'),(13,1,9182371982,'2015'),(14,1,-10293,'192837'),(15,15,1542,'2012');
/*!40000 ALTER TABLE `erp_faturamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `erp_faturamento_notas`
--

DROP TABLE IF EXISTS `erp_faturamento_notas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `erp_faturamento_notas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_empreendimento` varchar(45) DEFAULT NULL,
  `numero` bigint(20) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `valor` float DEFAULT NULL,
  `royalt` int(11) DEFAULT NULL,
  `data_royalt` datetime DEFAULT NULL,
  `arquivo_nota` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `erp_faturamento_notas`
--

LOCK TABLES `erp_faturamento_notas` WRITE;
/*!40000 ALTER TABLE `erp_faturamento_notas` DISABLE KEYS */;
INSERT INTO `erp_faturamento_notas` VALUES (1,'1',2309,'0000-00-00',562589,0,NULL,NULL),(2,'1',554,'0000-00-00',0,NULL,NULL,NULL),(3,'1',12,'0000-00-00',0,NULL,NULL,NULL),(4,'1',123,'0000-00-00',0,NULL,NULL,NULL),(5,'1',180213,'0000-00-00',9218370,NULL,NULL,NULL),(6,'1',12983,'0000-00-00',0,NULL,NULL,''),(7,'15',129873123,'2016-11-02',152,1,'2016-11-25 12:35:45','/var/www/html/erpcei/uploads/ponto_julho.pdf'),(8,'15',9182371,'2016-11-17',158.69,0,'2016-11-23 15:47:31','/var/www/html/erpcei/uploads/ponto_agosto.pdf');
/*!40000 ALTER TABLE `erp_faturamento_notas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `erp_patrimonio_sala`
--

DROP TABLE IF EXISTS `erp_patrimonio_sala`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `erp_patrimonio_sala` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_patrimonio` int(11) NOT NULL,
  `id_sala` int(11) NOT NULL,
  `data_atribuicao` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `erp_patrimonio_sala`
--

LOCK TABLES `erp_patrimonio_sala` WRITE;
/*!40000 ALTER TABLE `erp_patrimonio_sala` DISABLE KEYS */;
INSERT INTO `erp_patrimonio_sala` VALUES (1,1,1,'2016-10-31 00:00:00'),(2,2,3,'2016-09-13 00:00:00'),(3,3,3,'2016-10-21 00:00:00');
/*!40000 ALTER TABLE `erp_patrimonio_sala` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `erp_patrimonios`
--

DROP TABLE IF EXISTS `erp_patrimonios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `erp_patrimonios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `nrpatrimonio` varchar(255) DEFAULT NULL,
  `responsavel` varchar(255) DEFAULT NULL,
  `descricao` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `erp_patrimonios`
--

LOCK TABLES `erp_patrimonios` WRITE;
/*!40000 ALTER TABLE `erp_patrimonios` DISABLE KEYS */;
INSERT INTO `erp_patrimonios` VALUES (1,'Mesa de reuniões editada','102938','Ingrid','Mesa de reuniões redonda'),(2,'Computador HP','019382019','Luciana','Computador HP core i5 8gb ram com monitor 24 polegadas'),(3,'Computador HP Novo','88888888','Ingrid','Computador hp core i7 8gb ram');
/*!40000 ALTER TABLE `erp_patrimonios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `erp_pendencia_dados`
--

DROP TABLE IF EXISTS `erp_pendencia_dados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `erp_pendencia_dados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pendencia` int(11) NOT NULL,
  `situacao` int(11) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `data_modificada` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `erp_pendencia_dados`
--

LOCK TABLES `erp_pendencia_dados` WRITE;
/*!40000 ALTER TABLE `erp_pendencia_dados` DISABLE KEYS */;
INSERT INTO `erp_pendencia_dados` VALUES (1,1,3,'Pronto resolvida',1,'2016-11-16 00:00:00');
/*!40000 ALTER TABLE `erp_pendencia_dados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `erp_pendencias`
--

DROP TABLE IF EXISTS `erp_pendencias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `erp_pendencias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `situacao` varchar(45) DEFAULT NULL,
  `descricao` longtext,
  `id_usuario` int(11) DEFAULT NULL,
  `data_modificada` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `erp_pendencias`
--

LOCK TABLES `erp_pendencias` WRITE;
/*!40000 ALTER TABLE `erp_pendencias` DISABLE KEYS */;
INSERT INTO `erp_pendencias` VALUES (1,'Teste edicao','2','Estamos testando as pendencias edicao',1,'2016-10-06'),(2,'Trocar lâmpada na sala 107','1','A sala 107 está com duas lampadas queimadas',2,'2016-10-03'),(3,'Trocar lâmpada na sala 107','1','A sala 107 está com duas lampadas queimadas',3,'2016-10-02'),(4,'nova pendencia','1','Deu pau no meu pc',4,'2016-10-01'),(5,'agora com data','1','Eh isso ae',1,'2016-10-06'),(6,'Luz queimada na minha sala','1','Existe uma lampada queimada',1,'2016-10-25');
/*!40000 ALTER TABLE `erp_pendencias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `erp_releasing`
--

DROP TABLE IF EXISTS `erp_releasing`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `erp_releasing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `id_empreendimento` varchar(45) DEFAULT NULL,
  `data` datetime DEFAULT NULL,
  `descricao` text,
  `anexo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `erp_releasing`
--

LOCK TABLES `erp_releasing` WRITE;
/*!40000 ALTER TABLE `erp_releasing` DISABLE KEYS */;
INSERT INTO `erp_releasing` VALUES (4,'Mais um teste teste','15','2016-09-21 00:00:00','agora sim malandro asa','/var/www/html/erpcei/uploads/kona.jpg');
/*!40000 ALTER TABLE `erp_releasing` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `erp_reservas_salas`
--

DROP TABLE IF EXISTS `erp_reservas_salas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `erp_reservas_salas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sala` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `horario` varchar(45) DEFAULT NULL,
  `dia` date DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `erp_reservas_salas`
--

LOCK TABLES `erp_reservas_salas` WRITE;
/*!40000 ALTER TABLE `erp_reservas_salas` DISABLE KEYS */;
INSERT INTO `erp_reservas_salas` VALUES (2,2,1,'9_00','2016-05-10',NULL),(31,2,1,'9_30','2016-05-10',NULL),(32,2,1,'10_00','2016-05-10',NULL),(33,2,1,'17_00','2016-05-11',NULL),(34,2,1,'17_30','2016-05-11',NULL),(35,2,1,'16_00','2016-05-12',NULL),(36,2,1,'16_30','2016-05-12',NULL),(37,2,1,'8_30','2016-07-13',NULL),(38,6,1,'9_00','2016-08-10',NULL),(39,6,1,'9_30','2016-08-10',NULL),(40,6,1,'10_00','2016-08-10',NULL),(41,2,1,'14_00','2016-08-12',NULL),(42,2,1,'14_30','2016-08-12',NULL),(43,6,2,'9_00','2016-09-20',NULL),(44,6,2,'9_30','2016-09-20',NULL),(45,6,2,'10_00','2016-09-20',NULL),(46,6,1,'8_30','2016-09-22',NULL),(47,6,1,'9_00','2016-09-22',NULL),(48,6,1,'9_30','2016-09-22',NULL),(49,6,1,'10_00','2016-09-22',NULL),(50,6,1,'8_30','2016-10-05',NULL),(51,6,1,'9_00','2016-10-05',NULL),(52,6,1,'11_00','2016-10-07',NULL),(53,6,1,'11_30','2016-10-07',NULL),(54,6,1,'12_00','2016-10-07',NULL),(55,6,1,'12_00','2016-10-21',NULL),(56,6,1,'12_30','2016-10-21',NULL),(57,6,1,'13_00','2016-10-21',NULL),(58,2,1,'10_00','2016-10-25',NULL),(59,2,1,'10_30','2016-10-25',NULL),(60,2,1,'11_00','2016-10-25',NULL),(62,2,1,'9_30','2016-10-31',NULL),(63,2,1,'8_30','2016-11-25','Reunião BeeIT'),(64,2,1,'9_00','2016-11-25','Reunião BeeIT'),(65,2,1,'9_30','2016-11-25','Reunião BeeIT'),(66,2,1,'10_00','2016-11-25','Reunião BeeIT');
/*!40000 ALTER TABLE `erp_reservas_salas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `erp_salas`
--

DROP TABLE IF EXISTS `erp_salas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `erp_salas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nr_sala` varchar(45) DEFAULT NULL,
  `funcao` varchar(45) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `disponivel` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `erp_salas`
--

LOCK TABLES `erp_salas` WRITE;
/*!40000 ALTER TABLE `erp_salas` DISABLE KEYS */;
INSERT INTO `erp_salas` VALUES (1,'101','Empresa ','Empresa utilizando','0'),(2,'103','Sala de reuniões','Mesa de reuniões para 8 pessoas','1'),(3,'105','Cozinha e depósito','Cozinha e depósito','0'),(4,'107','Cognitiva Brasil','Empresa utilizando','0'),(5,'109','Administração','Administração do CEI','0'),(6,'111','Sala de reuniões','Sala com projetor, 1 computador e mesa de reuniões para 15 pessoas','1'),(7,'108','Empresa','Utilizado pela empresa BEE IT','0'),(8,'106','Empresa','Utilizada pela empresa Eawere','0'),(9,'102','Sala de Aula','Sala de aula com projetor e x lugares','0');
/*!40000 ALTER TABLE `erp_salas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `erp_servicos`
--

DROP TABLE IF EXISTS `erp_servicos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `erp_servicos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `empresa` varchar(255) DEFAULT NULL,
  `site` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefone` varchar(255) DEFAULT NULL,
  `atuacao` text,
  `eixo_cerne` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `erp_servicos`
--

LOCK TABLES `erp_servicos` WRITE;
/*!40000 ALTER TABLE `erp_servicos` DISABLE KEYS */;
INSERT INTO `erp_servicos` VALUES (4,'Alexandre Ercolani','Faraco Azevedo Advogados','','advogados@faracodeazevedo.com.br / alexandre@faracodeazevedo.com.br','(51) 9317 5679','Jurídica',0),(5,'Anderson Moreira Rodrigues','Anexo Tecnologia e Sistemas em Informática Ltda - ME','','suporte@anexotecnologia.com.br / atendimeno@anexotecnologia.com.br','(51) 34975088','Emissão de nota fiscal',0),(6,'Bruno Peroni','Semente Negócio Sustentável','','bruno@sementenegocios.com.br','(51) 84168666','Gestão Estratégica e Marketing',0),(7,'Cedrique da Silva Borgias','Cedrique da Silva Borgias - ME (Frame FX)','','cedriqueborgias@gmail.com','(51) 81177556','Marketing',0),(8,'Celso Correa','Junser Serviços Contábeis Ltda','','ccorrea.recepcao@via-rs.net','(51) 32271188 / (51)32272792','Contábil',0),(9,'Cristina Ribeiro','Comercial Porto Alegrense de Máquinas Calculadoras Ltda','','licitacao@portoalegrense-rs.com.br','(51) 32251888','Tecnologia e Informática',0),(10,'Daniel Savionek','Roner Guerra Fabris - Advogados Associados','','info@rgf-ip.com.br','(51) 3062 6622','Marcas e Patentes',0),(11,'Elaine Barro','Impresul Serviço Gráfico e Editora Ltda','','orcamento1@impresul.com.br','(51) 3334-1010','Serviços Gráficos',0),(12,'Fábio Brun','Fabio Brun - EPP','','fabio@brunvideo.com.br','(51) 33790770','Produção Audiovisual',0),(13,'Felipe Scherer','Innoscience Consultoria em Gestão da Inovação','','innoscience@innoscience.com.br','(51) 21031000','Gestão da Inovação',0),(14,'Felipe Spilari','Ativar Pessoas e Projetos','','felipe@ativar.net','(51) 9899 6255','Gestão Estratégica',0),(15,'Fernando Palmeiro','Longview Inovações em Tecnologia da Informação Ltda - ME','','contato@longview.com.br','(51) 21171880','Marketing',0),(16,'Gilberto Stürmer','Sturmer, Correa da Silva, Jaeger & Spindler dos Santos Advogados','','sturmer@sturmer.com.br','(51) 33883613','Jurídica',0),(17,'Jean Fadelli','Fadelli e Saupe LTDA - ME','','fadelli@fadelli.com.br','(51) 96268927','Sistemas de Segurança',0),(18,'João Batista Benvenutti Dorneles','Gráfica Benvenutti e Editora Ltda','','joao@graficabenvenutti.com.br','(51) 3013-9923','Serviços Gráficos',0),(19,'José Luis Tassi','P2B Treinamento e Informática Ltda','','comercial@p2btecnologia.com.br','(51) 35577999','Tecnologia e Informática',0),(20,'Leila Cristine Thomas','Thomas & Alberto Consultoria Ltda - ME (Dinâmica Consultoria e Treinamento)','','leilathomas@bol.com.br','(51) 99677348','Gestão',0),(21,'Luciano Gross','Info World Tecnologia e Informática Ltda','','infoworld@infoworld.com.br','(51) 6262262','Tecnologia e Informática',0),(22,'Marcos Goulart','Monica Kretschmann da Rosa - ME','','poabrasil@poabrasil.com.br','(51) 30616162','Sistemas de Segurança',0),(23,'Mariana Petersen Chaves','Jchaves Advocacia','','contato@jchavesadvocacia.com.br','(51) 33380100','Jurídica',0),(24,'Maurício Maschke','RM Comércio de Computadores e Suprimentos Ltda - ME','','mauricio@rminformatica.net.br','(51) 33250045','Tecnologia e Informática',0),(25,'Milton Leão','Leão Propriedade Intelectual - EPP','','leao@leao.adv.br','(51) 32247896','Marcas e Patentes',0),(26,'Rafael Oyarzábal','SKO Oyarzábal Marcas e Patentes S/C','','sko@sko.com.br','(51) 33429323','Marcas e Patentes',0),(27,'Renan Chagas','Growup Estretégia Empresarial S.S Ltda','','rchagas@gup.com.br','(51) 33331671 / (51) 99520944','Gestão Estratégica',0),(28,'Robinson Smidarle','Max System Sistemas Eletrônicos Ltda - ME','','rsmax@rsmax.com.br','(51) 30235102','Sistemas de Segurança',0),(29,'Rodrigo P. Oliva','Simplez Consultoria Ltda','','contato@simplez.com.br','(51) 30235051','Gestão da Inovação',0),(30,'Sérgio Jorcenei','Chiorri Consultoria e Sistemas Ltda','','contato@chiorri.com.br','(51) 32330616','Tecnologia e Informática',0),(31,'Vaniza Beilke','Vaniza Beilke Marcas ME','','vanizabeilke@hotmail.com','(51) 99986344','Marcas e Patentes',0),(32,'Victor Gasparoto Mabilia','Focus Logística','','victor.mabilia@focuslogistica.com.br','(51) 3308 6810','Marketing',0),(33,'Viviane Campos Godoy','Gráfica e Editora Copiart Ltda - EPP','','copiart@graficacopiart.com.br','(48) 36264481','Serviços Gráficos',0);
/*!40000 ALTER TABLE `erp_servicos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `erp_usuarios`
--

DROP TABLE IF EXISTS `erp_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `erp_usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `id_empreendimento` int(11) DEFAULT NULL,
  `id_acesso` int(11) DEFAULT NULL,
  `contato` varchar(45) DEFAULT NULL,
  `ultimo_login` timestamp NULL DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `erp_usuarios`
--

LOCK TABLES `erp_usuarios` WRITE;
/*!40000 ALTER TABLE `erp_usuarios` DISABLE KEYS */;
INSERT INTO `erp_usuarios` VALUES (1,'admin','21232f297a57a5a743894a0e4a801fc3',1,1,'89396972','0000-00-00 00:00:00','Alan Velasques Santos'),(2,'teste','698dc19d489c4e4db73e28a713eab07b',1,1,'89396972','0000-00-00 00:00:00','Teste'),(3,'testejoao','8e6f6f815b50f474cf0dc22d4f400725',16,3,'558988754',NULL,'Joãozinho da silva'),(4,'maisum','698dc19d489c4e4db73e28a713eab07b',16,2,'87987954',NULL,'Mais um pra garantir'),(5,'cognitiva','fed4bdcfcf6e30a8a71697773bbc5204',15,3,'',NULL,'Diretor Cognitiva');
/*!40000 ALTER TABLE `erp_usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-11-25 12:44:57
