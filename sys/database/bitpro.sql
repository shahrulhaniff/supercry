  DROP DATABASE bitpro;  
  CREATE DATABASE bitpro;  
 USE bitpro;
 -- id8215913_bitpro
 
 CREATE TABLE userpro (
  id 	VARCHAR(30) NOT NULL,
  fname VARCHAR(300) NOT NULL,
  emel 	VARCHAR(30) NOT NULL,
  pwd 	VARCHAR(70) NOT NULL,
  akaun VARCHAR(10) NULL,
  aktif VARCHAR(2),
  ipaddress VARCHAR(30),
  lastlogin TIMESTAMP NULL,
  created_date TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
);

INSERT INTO userpro (`id`, `emel`, `pwd`, `akaun`, `aktif`, `ipaddress`, `lastlogin`, `created_date`) VALUES 
('2', '222K@gmail.com', '2', 'MEMBER', 'Y', NULL, NULL, CURRENT_TIMESTAMP),
('shahrul8k', 'shahrul8k@gmail.com', '123', 'MASTER', 'Y', NULL, NULL, CURRENT_TIMESTAMP);

 CREATE TABLE wallet (
  id 	VARCHAR(30) NOT NULL,
  walletb 	VARCHAR(30)  NULL,
  walletc 	VARCHAR(30)  NULL,
  earning 	VARCHAR(30)  NULL,
  created_date TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
);

INSERT INTO wallet (id,walletb,earning, created_date) VALUES 
('1', '129', '12', CURRENT_TIMESTAMP),
('shahrul8k', '8000', '800', CURRENT_TIMESTAMP);

 CREATE TABLE affiliate (
  id 	VARCHAR(30) NOT NULL,
  aff_id 	VARCHAR(30)  NULL,
  created_date TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id,aff_id)
);

INSERT INTO affiliate (id,aff_id, created_date) VALUES 
('shahrul8k', '1',  CURRENT_TIMESTAMP);


 CREATE TABLE invest (
  sn 	 INT(10) NOT NULL,
  id 	 VARCHAR(30) NOT NULL,
  amount VARCHAR(30) NOT NULL,
  planroi VARCHAR(30) NOT NULL,
  planday VARCHAR(30) NOT NULL,
  stat VARCHAR(30) NOT NULL,
  created_date TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (sn,id)
);


 CREATE TABLE wd (
  sn 	 INT(10) NOT NULL,
  id 	 VARCHAR(30) NOT NULL,
  amount VARCHAR(30) NOT NULL,
  stat VARCHAR(30) NOT NULL,
  created_date TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (sn,id)
);

 CREATE TABLE masterctrl (
  sn  INT(10) AUTO_INCREMENT,
  mininv INT(10) NOT NULL,
  minwd  INT(10) NOT NULL,
  planroi VARCHAR(30) NOT NULL,
  planday VARCHAR(30) NOT NULL,
  created_date TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (sn)
);

INSERT INTO `bitpro`.`masterctrl` (`sn`, `mininv`, `minwd`, `planroi`, `planday`, `created_date`) VALUES ('1', '20', '0', '180', '7', CURRENT_TIMESTAMP);
