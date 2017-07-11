/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.21-MariaDB : Database - futsal_itats
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


/*Table structure for table `book_hour_types` */

DROP TABLE IF EXISTS `book_hour_types`;

CREATE TABLE `book_hour_types` (
  `book_hour_type_int` int(11) NOT NULL AUTO_INCREMENT,
  `book_hour_type_name` varchar(200) DEFAULT NULL,
  `book_hour_type_value` int(11) DEFAULT NULL,
  PRIMARY KEY (`book_hour_type_int`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `book_hour_types` */

/*Table structure for table `book_payment` */

DROP TABLE IF EXISTS `book_payment`;

CREATE TABLE `book_payment` (
  `book_payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_payment_code` varchar(200) DEFAULT NULL,
  `building_booking_code` varchar(200) DEFAULT NULL,
  `book_payment_date` datetime DEFAULT NULL,
  `book_payment_total` int(11) DEFAULT NULL,
  `book_payment_nominal` int(11) DEFAULT NULL,
  `book_payment_change` int(11) DEFAULT NULL,
  `book_payment_method` int(11) DEFAULT NULL,
  `book_payment_bank` int(11) DEFAULT NULL,
  `book_payment_bank_no` int(11) DEFAULT NULL,
  PRIMARY KEY (`book_payment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `book_payment` */

insert  into `book_payment`(`book_payment_id`,`book_payment_code`,`building_booking_code`,`book_payment_date`,`book_payment_total`,`book_payment_nominal`,`book_payment_change`,`book_payment_method`,`book_payment_bank`,`book_payment_bank_no`) values (1,'PAY/14-05-2017/123456567846/2/2','123456567846','2017-05-14 20:05:35',100000,120000,20000,0,0,0),(2,'PAY/16-05-2017/05/24/2017/10/12/2/2/2/2','05/24/2017/10/12/2/2','2017-05-16 14:05:18',100000,100000,0,0,0,0);

/*Table structure for table `branches` */

DROP TABLE IF EXISTS `branches`;

CREATE TABLE `branches` (
  `branch_id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_name` varchar(200) NOT NULL,
  `branch_phone` varchar(200) NOT NULL,
  `branch_address` text NOT NULL,
  `branch_email` text,
  `branch_hour_1` int(200) DEFAULT NULL,
  `branch_hour_2` int(200) DEFAULT NULL,
  PRIMARY KEY (`branch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `branches` */

insert  into `branches`(`branch_id`,`branch_name`,`branch_phone`,`branch_address`,`branch_email`,`branch_hour_1`,`branch_hour_2`) values (2,'GOR 10 NOPEMBER','879681','TAMBAKSARI','lntngppp@gmail.com',1493618700,1493654400),(3,'GOR DELTA SIDOARJO','8798473','sidoarjo','lntngp19@gmail.com',NULL,NULL),(4,'GOR REMAJA','750927509','Karang Gayam','lntngp19@gmail.com',1493445600,0);

/*Table structure for table `building_booking` */

DROP TABLE IF EXISTS `building_booking`;

CREATE TABLE `building_booking` (
  `building_booking_id` int(11) NOT NULL AUTO_INCREMENT,
  `building_booking_code` varchar(200) DEFAULT NULL,
  `building_booking_building` int(11) DEFAULT NULL,
  `building_booking_branch` int(11) DEFAULT NULL,
  `building_booking_customer` int(11) DEFAULT NULL,
  `building_booking_user` int(11) DEFAULT NULL,
  `building_booking_date` datetime DEFAULT NULL,
  `building_booking_date_for` date DEFAULT NULL,
  `building_booking_time_1` decimal(10,0) DEFAULT NULL,
  `building_booking_time_2` decimal(10,0) DEFAULT NULL,
  `building_booking_status` int(11) DEFAULT NULL,
  `building_booking_status_desc` text,
  `building_bukti_upload_date` datetime DEFAULT NULL,
  `building_bukti_img` text,
  PRIMARY KEY (`building_booking_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `building_booking` */

insert  into `building_booking`(`building_booking_id`,`building_booking_code`,`building_booking_building`,`building_booking_branch`,`building_booking_customer`,`building_booking_user`,`building_booking_date`,`building_booking_date_for`,`building_booking_time_1`,`building_booking_time_2`,`building_booking_status`,`building_booking_status_desc`,`building_bukti_upload_date`,`building_bukti_img`) values (1,'05/28/2017/8/11/2/2',2,2,1,0,'2017-05-27 00:00:00','2017-05-28',8,11,2,'sudah mengirim bukti','2017-05-30 00:05:49','jager.jpg'),(2,'05/31/2017/8/10/5/2',5,2,2,0,'2017-05-30 00:00:00','2017-05-31',8,10,1,'Belum Ada Konfirmasi','0000-00-00 00:00:00',''),(3,'05/31/2017/8/10/3/2',3,2,3,0,'2017-05-30 00:00:00','2017-05-31',8,10,1,'Belum Ada Konfirmasi','0000-00-00 00:00:00',''),(4,'05/31/2017/11/13/5/2',5,2,4,0,'2017-05-30 00:00:00','2017-05-31',11,13,1,'Belum Ada Konfirmasi','0000-00-00 00:00:00',''),(5,'05/31/2017/8/10/2/2',2,2,5,0,'2017-05-30 00:00:00','2017-05-31',8,10,1,'Belum Ada Konfirmasi','0000-00-00 00:00:00',''),(6,'05/31/2017/14/16/5/2',5,2,6,0,'2017-05-30 00:00:00','2017-05-31',14,16,1,'Belum Ada Konfirmasi','0000-00-00 00:00:00',''),(7,'05/30/2017/8/10/5/2',5,2,7,0,'2017-05-30 00:00:00','2017-05-30',8,10,1,'Belum Ada Konfirmasi','0000-00-00 00:00:00',''),(8,'05/30/2017/11/13/5/2',5,2,8,0,'2017-05-30 00:00:00','2017-05-30',11,13,1,'Belum Ada Konfirmasi','0000-00-00 00:00:00',''),(9,'05/29/2017/8/10/5/2',5,2,9,0,'2017-05-30 00:00:00','2017-05-29',8,10,1,'Belum Ada Konfirmasi','0000-00-00 00:00:00',''),(10,'06/01/2017/8/10/5/2',5,2,10,0,'2017-05-30 00:00:00','2017-06-01',8,10,1,'Belum Ada Konfirmasi','0000-00-00 00:00:00',''),(11,'05/28/2017/8/10/5/2',5,2,11,0,'2017-05-30 00:00:00','2017-05-28',8,10,1,'Belum Ada Konfirmasi','0000-00-00 00:00:00',''),(12,'05/29/2017/11/13/5/2',5,2,12,0,'2017-05-30 00:00:00','2017-05-29',11,13,1,'Belum Ada Konfirmasi','0000-00-00 00:00:00',''),(13,'05/30/2017/14/16/5/2',5,2,13,0,'2017-05-30 00:00:00','2017-05-30',14,16,1,'Belum Ada Konfirmasi','0000-00-00 00:00:00',''),(14,'05/28/2017/11/13/5/2',5,2,14,0,'2017-05-30 00:00:00','2017-05-28',11,13,1,'Belum Ada Konfirmasi','0000-00-00 00:00:00',''),(15,'05/31/2017/11/13/2/2',2,2,15,0,'2017-05-30 00:00:00','2017-05-31',11,13,1,'Belum Ada Konfirmasi','0000-00-00 00:00:00',''),(16,'06/08/2017/8/10/5/2',5,2,16,0,'2017-05-30 00:00:00','2017-06-08',8,10,1,'Belum Ada Konfirmasi','0000-00-00 00:00:00','');

/*Table structure for table `buildings` */

DROP TABLE IF EXISTS `buildings`;

CREATE TABLE `buildings` (
  `building_id` int(11) NOT NULL AUTO_INCREMENT,
  `building_name` varchar(200) NOT NULL,
  `building_img` text NOT NULL,
  `building_status` int(11) NOT NULL,
  `building_hour_book` int(11) DEFAULT NULL,
  `building_price` varchar(200) DEFAULT NULL,
  `branch` int(11) NOT NULL,
  PRIMARY KEY (`building_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `buildings` */

insert  into `buildings`(`building_id`,`building_name`,`building_img`,`building_status`,`building_hour_book`,`building_price`,`branch`) values (1,'lap. Futsal 1','modul4email.PNG',2,1,'50000',3),(2,'lap. Futsal 2','',1,1,'50000',2),(3,'lap. Futsal 3','',2,1,'50000',2),(5,'lap. Futsal 4','jager.jpg',1,1,'50000',2),(6,'lap. Futsal 5','',1,1,'50000',2),(7,'lap. Futsal 6','',1,1,'50000',2),(8,'lap. Futsal 7','',1,1,'50000',2),(9,'lap. Futsal 8','',1,1,'50000',2),(10,'lap. Futsal 9','',1,1,'50000',1),(11,'lap. Futsal 10','',1,1,'50000',2),(12,'lap. Futsal 11','',1,1,'50000',2),(13,'lap. Futsal 12','',1,1,'50000',2),(14,'lap. Futsal 14','',1,1,'50000',2),(15,'lap. Futsal 15','',1,1,'50000',2),(16,'lap. Futsal 16','',1,1,'50000',2),(18,'Lapangan Tenis','',1,1,'50000',1),(19,'Lapangan Tenis','',1,1,'50000',1),(20,'Lapangan Tenis','',1,1,'50000',1);

/*Table structure for table `customers` */

DROP TABLE IF EXISTS `customers`;

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(200) NOT NULL,
  `customer_nik` varchar(200) DEFAULT NULL,
  `customer_address` text,
  `customer_phone` varchar(200) DEFAULT NULL,
  `customer_email` varchar(200) DEFAULT NULL,
  `customer_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `customers` */

insert  into `customers`(`customer_id`,`customer_name`,`customer_nik`,`customer_address`,`customer_phone`,`customer_email`,`customer_status`) values (1,'agung','123456','panduk','1245','lntngp19@gmail.com',1),(2,'Rizal','1234567','Mentawai','123456','Mentawai@gmail.com',1),(3,'Yoyok','3456','njedong','54321','njedong@asd',1),(4,'Bayu','123456','mastrip','54321','bayu@gmail.com',1),(5,'muhajir','12345','kalikepiting','12345','muhajir@mail',1),(6,'firman','123456789','kalijudan','3214321','firman@gmail.com',1),(7,'diyas','123456','sidoarjo','098633','diyas@gmail.com',1),(8,'Dioiyo Surya','9089','pornorogo','12345','dio@gendut',1),(9,'Traju','12356','tulungagung','123456','tulungagung@ceriamail',1),(10,'gaga','1234567890','gaga','12345678','gaga@gmail',1),(11,'rudi','234567','njagiran','2345678','njagiran@mail',1),(12,'aku ','1245677','asdfg','ooo','lntngp19@gmail.com',1),(13,'duwi','32423764','wyerieyu','42938479','ufhufh@asd',1),(14,'jager','12345','asff','312312','dasdasd@as',1),(15,'CADASD','ASDASDS','SADASD','ASDSAD','AS@WQE',1),(16,'ASDSA','ASDAS','ASDS','ASDAS','AS@QW',1);

/*Table structure for table `items` */

DROP TABLE IF EXISTS `items`;

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(200) NOT NULL,
  `item_satuan` int(11) NOT NULL,
  `item_img` text,
  `item_kategori` int(11) NOT NULL,
  `item_desc` text NOT NULL,
  `item_harga` int(11) NOT NULL,
  `item_hpp` int(11) NOT NULL,
  `item_harga_jual` int(11) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `items` */

insert  into `items`(`item_id`,`item_name`,`item_satuan`,`item_img`,`item_kategori`,`item_desc`,`item_harga`,`item_hpp`,`item_harga_jual`) values (4,'ITEM A',1,'bg.PNG',3,'',0,4000,120000),(5,'Item D',1,NULL,1,'',0,1200,18000);

/*Table structure for table `journals` */

DROP TABLE IF EXISTS `journals`;

CREATE TABLE `journals` (
  `journal_id` int(11) NOT NULL AUTO_INCREMENT,
  `journal_code` varchar(200) DEFAULT NULL,
  `data_code` varchar(200) DEFAULT NULL,
  `journal_type` int(11) DEFAULT NULL,
  `journal_debit` int(11) DEFAULT NULL,
  `journal_credit` int(11) DEFAULT NULL,
  `journal_piutang` int(11) DEFAULT NULL,
  `journal_hutang` int(11) DEFAULT NULL,
  `payment_method` int(11) DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `norek` varchar(200) DEFAULT NULL,
  `debit_card` varchar(200) DEFAULT NULL,
  `credit_card` varchar(200) DEFAULT NULL,
  `edc_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`journal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `journals` */

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_name` varchar(200) NOT NULL,
  PRIMARY KEY (`kategori_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `kategori` */

insert  into `kategori`(`kategori_id`,`kategori_name`) values (1,'Kategori A'),(3,'Kategori B');

/*Table structure for table `office_details` */

DROP TABLE IF EXISTS `office_details`;

CREATE TABLE `office_details` (
  `office_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `office_name` varchar(200) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `office_phone` varchar(200) DEFAULT NULL,
  `office_email` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`office_detail_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `office_details` */

insert  into `office_details`(`office_detail_id`,`office_name`,`branch_id`,`office_phone`,`office_email`) values (1,'Futsal Center 1',2,'081-1234-234','lntngp19@gmail.com');

/*Table structure for table `penjualan_tmp` */

DROP TABLE IF EXISTS `penjualan_tmp`;

CREATE TABLE `penjualan_tmp` (
  `penjualan_tmp_id` int(11) NOT NULL AUTO_INCREMENT,
  `item` int(11) NOT NULL,
  `item_qty` int(11) NOT NULL,
  `item_harga_total` int(11) NOT NULL,
  PRIMARY KEY (`penjualan_tmp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `penjualan_tmp` */

insert  into `penjualan_tmp`(`penjualan_tmp_id`,`item`,`item_qty`,`item_harga_total`) values (1,4,2,240000);

/*Table structure for table `permits` */

DROP TABLE IF EXISTS `permits`;

CREATE TABLE `permits` (
  `permit_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` int(11) NOT NULL,
  `sidebar` int(11) NOT NULL,
  `permit_access` varchar(200) NOT NULL,
  PRIMARY KEY (`permit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

/*Data for the table `permits` */

insert  into `permits`(`permit_id`,`user_type`,`sidebar`,`permit_access`) values (1,1,1,''),(2,1,2,''),(3,1,3,'c,r,u,d'),(4,1,4,'c,r,u,d'),(5,2,1,'c,r,u,d'),(6,2,2,'c,r,u,d'),(7,2,3,'c,r,u,d'),(8,2,4,'c,r,u,d'),(9,2,5,''),(10,2,6,''),(11,1,5,''),(12,1,6,''),(13,1,7,''),(14,1,8,''),(15,1,9,''),(16,0,1,''),(17,0,2,''),(18,0,3,''),(19,0,4,''),(20,0,5,''),(21,0,6,''),(22,0,7,'c,r,u,d'),(23,0,8,'c,r,u,d'),(24,0,9,''),(25,4,1,''),(26,4,2,''),(27,4,3,''),(28,4,4,''),(29,4,5,''),(30,4,6,''),(31,4,7,''),(32,4,8,''),(33,4,9,'c,r,u,d'),(34,1,10,'c,r,u,d'),(35,1,11,''),(36,1,12,''),(37,1,13,'c,r,u,d'),(38,1,14,'c,r,u,d'),(39,1,16,''),(40,1,17,'c,r,u,d');

/*Table structure for table `satuan` */

DROP TABLE IF EXISTS `satuan`;

CREATE TABLE `satuan` (
  `satuan_id` int(11) NOT NULL AUTO_INCREMENT,
  `satuan_name` varchar(200) NOT NULL,
  PRIMARY KEY (`satuan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `satuan` */

insert  into `satuan`(`satuan_id`,`satuan_name`) values (1,'Kg');

/*Table structure for table `sidebar` */

DROP TABLE IF EXISTS `sidebar`;

CREATE TABLE `sidebar` (
  `sidebar_id` int(11) NOT NULL AUTO_INCREMENT,
  `sidebar_name` varchar(200) NOT NULL,
  `sidebar_parent` int(11) NOT NULL,
  `sidebar_level` int(11) NOT NULL,
  `sidebar_url` varchar(200) NOT NULL,
  `sidebar_icon` text NOT NULL,
  PRIMARY KEY (`sidebar_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `sidebar` */

insert  into `sidebar`(`sidebar_id`,`sidebar_name`,`sidebar_parent`,`sidebar_level`,`sidebar_url`,`sidebar_icon`) values (1,'Item',5,0,'item_c',''),(2,'Item Stock',5,0,'item_stock_c',''),(3,'User',5,2,'user_list',''),(4,'User Type',5,2,'user_type_c',''),(5,'Master',0,1,'#','fa fa-dashboard'),(6,'Transactions',0,0,'#','fa fa-shopping-cart'),(7,'Pembelian',6,0,'pembelian_c',''),(8,'Penjualan',6,0,'penjualan_c','fa fa-money'),(9,'Supplier',5,0,'supplier_c',''),(10,'Customer',5,2,'customer_c',''),(11,'Category',5,0,'kategori_c',''),(12,'Satuan',5,0,'satuan_c',''),(13,'Branch',5,2,'cabang_list',''),(14,'Field',5,2,'lapangan_list',''),(16,'Setting',0,1,'#','fa fa-cogs'),(17,'Head Office',16,2,'Head_office','');

/*Table structure for table `status_branch` */

DROP TABLE IF EXISTS `status_branch`;

CREATE TABLE `status_branch` (
  `status_branch_id` int(11) NOT NULL AUTO_INCREMENT,
  `status_branch_name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`status_branch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `status_branch` */

insert  into `status_branch`(`status_branch_id`,`status_branch_name`) values (1,'Pusat'),(2,'Cabang');

/*Table structure for table `status_buildings` */

DROP TABLE IF EXISTS `status_buildings`;

CREATE TABLE `status_buildings` (
  `status_building_id` int(11) NOT NULL AUTO_INCREMENT,
  `status_building_name` varchar(200) NOT NULL,
  PRIMARY KEY (`status_building_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `status_buildings` */

insert  into `status_buildings`(`status_building_id`,`status_building_name`) values (1,'available'),(2,'not ready');

/*Table structure for table `suppliers` */

DROP TABLE IF EXISTS `suppliers`;

CREATE TABLE `suppliers` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(200) NOT NULL,
  `supplier_address` text NOT NULL,
  `supplier_phone` varchar(200) NOT NULL,
  `supplier_email` text NOT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `suppliers` */

insert  into `suppliers`(`supplier_id`,`supplier_name`,`supplier_address`,`supplier_phone`,`supplier_email`) values (3,'Supplier B','supplier address','8491874','supplierb@gmail.com');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_img` text NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `branch` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`user_id`,`user_type`,`user_name`,`user_img`,`user_password`,`branch`) values (1,1,'lintang','','2b6895ae6a902d00da9e04a4d4269a68',2),(2,2,'agung','','',NULL),(3,1,'Edi','','7e1b42c7ba4eb61928b0627b38bb59f5',3),(4,1,'rizky','','49d8712dd6ac9c3745d53cd4be48284c',2);

/*Table structure for table `user_type` */

DROP TABLE IF EXISTS `user_type`;

CREATE TABLE `user_type` (
  `user_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type_name` varchar(200) NOT NULL,
  PRIMARY KEY (`user_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `user_type` */

insert  into `user_type`(`user_type_id`,`user_type_name`) values (1,'Administrator'),(2,'co'),(3,'cashier'),(4,'cashier');

/* Trigger structure for table `book_payment` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `update_bookingstatus` */$$

CREATE  TRIGGER `update_bookingstatus` AFTER INSERT ON `book_payment` FOR EACH ROW BEGIN
	update building_booking set building_booking_status = 3 where building_booking_code = new.building_booking_code;
    END $$


DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
