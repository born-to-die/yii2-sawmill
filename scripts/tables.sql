CREATE DATABASE sawmilldb;

USE sawmilldb;

CREATE TABLE Category (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  keywords varchar(255) DEFAULT NULL,
  description varchar(255) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE Post (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  category_id int(10) unsigned NOT NULL,
  title varchar(255) NOT NULL,
  excerpt varchar(255) NOT NULL,
  text text NOT NULL,
  keywords varchar(255) DEFAULT NULL,
  description varchar(255) DEFAULT NULL,
  created date NOT NULL,
  PRIMARY KEY (id),
  CONSTRAINT post_category_fk 
  FOREIGN KEY (category_id)  REFERENCES Category (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Jobs (
  id INT unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE Groups (
  id INT unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE Crew (
  id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  fullname VARCHAR(255) NOT NULL,
  birth DATE NOT NULL,
  address VARCHAR(255) NOT NULL,
  mobile VARCHAR(12) NOT NULL UNIQUE,
  registr VARCHAR(255) NOT NULL,
  group_id INT unsigned NOT NULL,
  job_id INT unsigned NOT NULL,
  CONSTRAINT crew_groups_fk
  FOREIGN KEY (group_id)  REFERENCES Groups (id),
  CONSTRAINT crew_jobs_fk 
  FOREIGN KEY (job_id)  REFERENCES Jobs (id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS user (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  username varchar(255) NOT NULL,
  password varchar(255) NOT NULL,
  crew_id INT UNSIGNED,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  CONSTRAINT user_crew_fk 
  FOREIGN KEY (crew_id)  REFERENCES Crew (id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE Wood (
  id INT unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE Vendor (
  id INT unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  address VARCHAR(255) NOT NULL,
  mobile VARCHAR(12) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE SupplyOrders (
  id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  date DATE NOT NULL,
  vendor_id INT unsigned NOT NULL,
  wood_id INT unsigned NOT NULL,
  price INT unsigned NOT NULL,
  length DOUBLE unsigned NOT NULL,
  diameter DOUBLE unsigned NOT NULL,  
  count INT unsigned NOT NULL,
  volume DOUBLE unsigned NOT NULL,
  arrived TINYINT unsigned DEFAULT NULL,
  CONSTRAINT supply_vendor_fk 
  FOREIGN KEY (vendor_id)  REFERENCES Vendor (id),
  CONSTRAINT supply_wood_fk
  FOREIGN KEY (wood_id)  REFERENCES Wood (id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE StockSupply (
  id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  wood_id INT unsigned NOT NULL,
  price INT unsigned NOT NULL,
  length DOUBLE unsigned NOT NULL,
  diameter DOUBLE unsigned NOT NULL,  
  count INT unsigned NOT NULL,
  volume DOUBLE unsigned NOT NULL,
  CONSTRAINT stocksupply_wood_fk
  FOREIGN KEY (wood_id)  REFERENCES Wood (id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE Materials (
  id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE Clients (
  id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  address VARCHAR(255) NOT NULL,
  mobile VARCHAR(12) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE StockProducts (
  id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  material_id INT unsigned NOT NULL,
  wood_id INT unsigned NOT NULL,
  length DOUBLE unsigned NOT NULL,
  height DOUBLE unsigned NOT NULL, 
  width DOUBLE unsigned NOT NULL,
  count INT unsigned NOT NULL,
  volume DOUBLE unsigned NOT NULL,
  price INT unsigned NOT NULL,
  CONSTRAINT stockproducts_materials_fk
  FOREIGN KEY (material_id)  REFERENCES Materials (id),
  CONSTRAINT stockproducts_wood_fk
  FOREIGN KEY (wood_id)  REFERENCES Wood (id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE ClientsOrders (
  id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  client_id INT UNSIGNED NOT NULL,
  date DATE NOT NULL,
  material_id INT unsigned NOT NULL,
  wood_id INT unsigned NOT NULL,
  length DOUBLE unsigned NOT NULL,
  height DOUBLE unsigned NOT NULL,
  width DOUBLE unsigned NOT NULL,
  count INT unsigned NOT NULL,
  volume DOUBLE unsigned NOT NULL,
  price INT unsigned NOT NULL,
  completed TINYINT unsigned DEFAULT NULL,
   CONSTRAINT clientorders_client_fk
  FOREIGN KEY (client_id)  REFERENCES Clients (id),
  CONSTRAINT clientorders_material_fk
  FOREIGN KEY (material_id)  REFERENCES Materials (id),
  CONSTRAINT clientorders_wood_fk
  FOREIGN KEY (wood_id)  REFERENCES Wood (id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE Shipments (
  id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  date date NOT NULL,
  order_id INT UNSIGNED NOT NULL,
  CONSTRAINT shipments_order_fk
  FOREIGN KEY (order_id)  REFERENCES ClientsOrders (id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE Shifts (
  id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  group_id INT unsigned NOT NULL,
  stocksupply_id INT unsigned NOT NULL,
  stocksupply_count INT unsigned NOT NULL,
  order_id INT UNSIGNED NOT NULL,
  date DATE NOT NULL,
  CONSTRAINT shifts_stocksupply_fk
  FOREIGN KEY (stocksupply_id) REFERENCES StockSupply (id),
  CONSTRAINT shifts_order_fk
  FOREIGN KEY (order_id) REFERENCES ClientsOrders (id),
  CONSTRAINT shifts_groups_fk
  FOREIGN KEY (group_id) REFERENCES Groups (id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
