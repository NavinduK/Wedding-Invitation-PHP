DROP TABLE IF EXISTS `invitees`;
CREATE TABLE `invitees` (
  `NIC` varchar(15) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Contact` varchar(15) DEFAULT NULL,
  `Nick` varchar(50) DEFAULT NULL,
  `Msg` varchar(255) DEFAULT NULL,
  `Num` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`NIC`),
  UNIQUE KEY `Num` (`Num`)
);