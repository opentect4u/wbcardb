-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 13, 2021 at 03:06 PM
-- Server version: 10.5.10-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wbscardb`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` bigint(22) NOT NULL,
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `user_agent`, `timestamp`, `data`) VALUES
(0, '122.176.27.53', '', 1631523656, '__ci_last_regenerate|i:1631523656;user_id|s:5:\"sss_r\";br_id|s:1:\"0\";user_type|s:1:\"R\";user_name|s:17:\"Document Receiver\";sys_date|s:10:\"2021-09-01\";login|O:8:\"stdClass\":14:{s:7:\"user_id\";s:5:\"sss_r\";s:8:\"password\";s:60:\"$2y$10$iumxF5civQAQyQpnEnm8peg1lkm0iNgAw7Xw4HlteHRw2vMS8wy4y\";s:9:\"user_type\";s:1:\"R\";s:9:\"user_name\";s:17:\"Document Receiver\";s:11:\"designation\";N;s:5:\"br_id\";s:1:\"0\";s:11:\"user_status\";s:1:\"A\";s:7:\"remarks\";s:0:\"\";s:10:\"created_by\";s:3:\"tan\";s:10:\"created_dt\";s:19:\"2019-01-16 02:01:01\";s:11:\"modified_by\";N;s:11:\"modified_dt\";N;s:9:\"ardb_name\";s:17:\"WBSCARDB(Kolkata)\";s:11:\"district_id\";s:2:\"42\";}'),
(1, '122.176.27.53', '', 1631516559, '__ci_last_regenerate|i:1631516559;login|O:8:\"stdClass\":14:{s:7:\"user_id\";s:7:\"bankura\";s:8:\"password\";s:60:\"$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6\";s:9:\"user_type\";s:1:\"U\";s:9:\"user_name\";s:12:\"BANKURA USER\";s:11:\"designation\";N;s:5:\"br_id\";s:2:\"22\";s:11:\"user_status\";s:1:\"A\";s:7:\"remarks\";s:0:\"\";s:10:\"created_by\";s:8:\"Synergic\";s:10:\"created_dt\";s:19:\"2020-06-22 02:05:28\";s:11:\"modified_by\";N;s:11:\"modified_dt\";N;s:9:\"ardb_name\";s:17:\"Bankura ARDB Ltd.\";s:11:\"district_id\";s:3:\"305\";}user_id|s:7:\"bankura\";br_id|s:2:\"22\";user_type|s:1:\"U\";user_name|s:12:\"BANKURA USER\";sys_date|s:10:\"2021-04-05\";'),
(2, '122.176.27.53', '', 1630661183, '__ci_last_regenerate|i:1630661132;login|O:8:\"stdClass\":14:{s:7:\"user_id\";s:7:\"bankura\";s:8:\"password\";s:60:\"$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6\";s:9:\"user_type\";s:1:\"U\";s:9:\"user_name\";s:12:\"BANKURA USER\";s:11:\"designation\";N;s:5:\"br_id\";s:2:\"22\";s:11:\"user_status\";s:1:\"A\";s:7:\"remarks\";s:0:\"\";s:10:\"created_by\";s:8:\"Synergic\";s:10:\"created_dt\";s:19:\"2020-06-22 02:05:28\";s:11:\"modified_by\";N;s:11:\"modified_dt\";N;s:9:\"ardb_name\";s:17:\"Bankura ARDB Ltd.\";s:11:\"district_id\";s:3:\"305\";}user_id|s:7:\"bankura\";br_id|s:2:\"22\";user_type|s:1:\"U\";user_name|s:12:\"BANKURA USER\";sys_date|s:10:\"2021-04-05\";'),
(3, '122.176.27.53', '', 1630661183, '__ci_last_regenerate|i:1630661180;user_id|s:5:\"sss_r\";br_id|s:1:\"0\";user_type|s:1:\"R\";user_name|s:17:\"Document Receiver\";sys_date|s:10:\"2021-09-02\";login|O:8:\"stdClass\":14:{s:7:\"user_id\";s:5:\"sss_r\";s:8:\"password\";s:60:\"$2y$10$iumxF5civQAQyQpnEnm8peg1lkm0iNgAw7Xw4HlteHRw2vMS8wy4y\";s:9:\"user_type\";s:1:\"R\";s:9:\"user_name\";s:17:\"Document Receiver\";s:11:\"designation\";N;s:5:\"br_id\";s:1:\"0\";s:11:\"user_status\";s:1:\"A\";s:7:\"remarks\";s:0:\"\";s:10:\"created_by\";s:3:\"tan\";s:10:\"created_dt\";s:19:\"2019-01-16 02:01:01\";s:11:\"modified_by\";N;s:11:\"modified_dt\";N;s:9:\"ardb_name\";s:17:\"WBSCARDB(Kolkata)\";s:11:\"district_id\";s:2:\"42\";}'),
(4, '122.176.27.53', '', 1631516840, '__ci_last_regenerate|i:1631516840;user_id|s:5:\"sss_r\";br_id|s:1:\"0\";user_type|s:1:\"R\";user_name|s:17:\"Document Receiver\";sys_date|s:10:\"2021-09-01\";login|O:8:\"stdClass\":14:{s:7:\"user_id\";s:5:\"sss_r\";s:8:\"password\";s:60:\"$2y$10$iumxF5civQAQyQpnEnm8peg1lkm0iNgAw7Xw4HlteHRw2vMS8wy4y\";s:9:\"user_type\";s:1:\"R\";s:9:\"user_name\";s:17:\"Document Receiver\";s:11:\"designation\";N;s:5:\"br_id\";s:1:\"0\";s:11:\"user_status\";s:1:\"A\";s:7:\"remarks\";s:0:\"\";s:10:\"created_by\";s:3:\"tan\";s:10:\"created_dt\";s:19:\"2019-01-16 02:01:01\";s:11:\"modified_by\";N;s:11:\"modified_dt\";N;s:9:\"ardb_name\";s:17:\"WBSCARDB(Kolkata)\";s:11:\"district_id\";s:2:\"42\";}'),
(5, '122.176.27.53', '', 1631466909, '__ci_last_regenerate|i:1631466909;user_id|s:5:\"sss_r\";br_id|s:1:\"0\";user_type|s:1:\"R\";user_name|s:17:\"Document Receiver\";sys_date|s:10:\"2021-09-02\";login|O:8:\"stdClass\":14:{s:7:\"user_id\";s:5:\"sss_r\";s:8:\"password\";s:60:\"$2y$10$iumxF5civQAQyQpnEnm8peg1lkm0iNgAw7Xw4HlteHRw2vMS8wy4y\";s:9:\"user_type\";s:1:\"R\";s:9:\"user_name\";s:17:\"Document Receiver\";s:11:\"designation\";N;s:5:\"br_id\";s:1:\"0\";s:11:\"user_status\";s:1:\"A\";s:7:\"remarks\";s:0:\"\";s:10:\"created_by\";s:3:\"tan\";s:10:\"created_dt\";s:19:\"2019-01-16 02:01:01\";s:11:\"modified_by\";N;s:11:\"modified_dt\";N;s:9:\"ardb_name\";s:17:\"WBSCARDB(Kolkata)\";s:11:\"district_id\";s:2:\"42\";}'),
(6, '223.223.146.254', '', 1630661183, '__ci_last_regenerate|i:1630661128;user_id|s:7:\"bankura\";br_id|s:2:\"22\";user_type|s:1:\"U\";user_name|s:12:\"BANKURA USER\";sys_date|s:10:\"2021-09-01\";login|O:8:\"stdClass\":14:{s:7:\"user_id\";s:7:\"bankura\";s:8:\"password\";s:60:\"$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6\";s:9:\"user_type\";s:1:\"U\";s:9:\"user_name\";s:12:\"BANKURA USER\";s:11:\"designation\";N;s:5:\"br_id\";s:2:\"22\";s:11:\"user_status\";s:1:\"A\";s:7:\"remarks\";s:0:\"\";s:10:\"created_by\";s:8:\"Synergic\";s:10:\"created_dt\";s:19:\"2020-06-22 02:05:28\";s:11:\"modified_by\";N;s:11:\"modified_dt\";N;s:9:\"ardb_name\";s:17:\"Bankura ARDB Ltd.\";s:11:\"district_id\";s:3:\"305\";}'),
(7, '182.66.5.240', '', 1630661132, '__ci_last_regenerate|i:1630661132;user_id|s:5:\"sss_r\";br_id|s:1:\"0\";user_type|s:1:\"R\";user_name|s:17:\"Document Receiver\";sys_date|s:10:\"2021-09-02\";login|O:8:\"stdClass\":14:{s:7:\"user_id\";s:5:\"sss_r\";s:8:\"password\";s:60:\"$2y$10$iumxF5civQAQyQpnEnm8peg1lkm0iNgAw7Xw4HlteHRw2vMS8wy4y\";s:9:\"user_type\";s:1:\"R\";s:9:\"user_name\";s:17:\"Document Receiver\";s:11:\"designation\";N;s:5:\"br_id\";s:1:\"0\";s:11:\"user_status\";s:1:\"A\";s:7:\"remarks\";s:0:\"\";s:10:\"created_by\";s:3:\"tan\";s:10:\"created_dt\";s:19:\"2019-01-16 02:01:01\";s:11:\"modified_by\";N;s:11:\"modified_dt\";N;s:9:\"ardb_name\";s:17:\"WBSCARDB(Kolkata)\";s:11:\"district_id\";s:2:\"42\";}'),
(8, '122.176.27.53', '', 1631466909, '__ci_last_regenerate|i:1631466909;user_id|s:5:\"sss_r\";br_id|s:1:\"0\";user_type|s:1:\"R\";user_name|s:17:\"Document Receiver\";sys_date|s:10:\"2021-09-02\";login|O:8:\"stdClass\":14:{s:7:\"user_id\";s:5:\"sss_r\";s:8:\"password\";s:60:\"$2y$10$iumxF5civQAQyQpnEnm8peg1lkm0iNgAw7Xw4HlteHRw2vMS8wy4y\";s:9:\"user_type\";s:1:\"R\";s:9:\"user_name\";s:17:\"Document Receiver\";s:11:\"designation\";N;s:5:\"br_id\";s:1:\"0\";s:11:\"user_status\";s:1:\"A\";s:7:\"remarks\";s:0:\"\";s:10:\"created_by\";s:3:\"tan\";s:10:\"created_dt\";s:19:\"2019-01-16 02:01:01\";s:11:\"modified_by\";N;s:11:\"modified_dt\";N;s:9:\"ardb_name\";s:17:\"WBSCARDB(Kolkata)\";s:11:\"district_id\";s:2:\"42\";}'),
(9, '122.176.27.53', '', 1631523874, '__ci_last_regenerate|i:1631523656;user_id|s:7:\"bankura\";br_id|s:2:\"22\";user_type|s:1:\"U\";user_name|s:12:\"BANKURA USER\";sys_date|s:10:\"2021-09-13\";login|O:8:\"stdClass\":14:{s:7:\"user_id\";s:7:\"bankura\";s:8:\"password\";s:60:\"$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6\";s:9:\"user_type\";s:1:\"U\";s:9:\"user_name\";s:12:\"BANKURA USER\";s:11:\"designation\";N;s:5:\"br_id\";s:2:\"22\";s:11:\"user_status\";s:1:\"A\";s:7:\"remarks\";s:0:\"\";s:10:\"created_by\";s:8:\"Synergic\";s:10:\"created_dt\";s:19:\"2020-06-22 02:05:28\";s:11:\"modified_by\";N;s:11:\"modified_dt\";N;s:9:\"ardb_name\";s:17:\"Bankura ARDB Ltd.\";s:11:\"district_id\";s:3:\"305\";}'),
(12, '202.65.156.246', '', 1630661130, '__ci_last_regenerate|i:1630661130;user_id|s:6:\"sss_a2\";br_id|s:1:\"0\";user_type|s:1:\"V\";user_name|s:19:\"WBSCARDB APPROVER 2\";sys_date|s:10:\"2021-04-06\";login|O:8:\"stdClass\":14:{s:7:\"user_id\";s:6:\"sss_a2\";s:8:\"password\";s:60:\"$2y$10$iumxF5civQAQyQpnEnm8peg1lkm0iNgAw7Xw4HlteHRw2vMS8wy4y\";s:9:\"user_type\";s:1:\"V\";s:9:\"user_name\";s:19:\"WBSCARDB APPROVER 2\";s:11:\"designation\";N;s:5:\"br_id\";s:1:\"0\";s:11:\"user_status\";s:1:\"A\";s:7:\"remarks\";s:0:\"\";s:10:\"created_by\";s:3:\"tan\";s:10:\"created_dt\";s:19:\"2019-01-16 02:01:01\";s:11:\"modified_by\";N;s:11:\"modified_dt\";N;s:9:\"ardb_name\";s:17:\"WBSCARDB(Kolkata)\";s:11:\"district_id\";s:2:\"42\";}'),
(14, '202.65.156.246', '', 1630661130, '__ci_last_regenerate|i:1630661130;'),
(16, '202.65.156.246', '', 1631466909, '__ci_last_regenerate|i:1631466909;user_id|s:5:\"sss_r\";br_id|s:1:\"0\";user_type|s:1:\"R\";user_name|s:17:\"Document Receiver\";sys_date|s:10:\"2021-09-01\";login|O:8:\"stdClass\":14:{s:7:\"user_id\";s:5:\"sss_r\";s:8:\"password\";s:60:\"$2y$10$iumxF5civQAQyQpnEnm8peg1lkm0iNgAw7Xw4HlteHRw2vMS8wy4y\";s:9:\"user_type\";s:1:\"R\";s:9:\"user_name\";s:17:\"Document Receiver\";s:11:\"designation\";N;s:5:\"br_id\";s:1:\"0\";s:11:\"user_status\";s:1:\"A\";s:7:\"remarks\";s:0:\"\";s:10:\"created_by\";s:3:\"tan\";s:10:\"created_dt\";s:19:\"2019-01-16 02:01:01\";s:11:\"modified_by\";N;s:11:\"modified_dt\";N;s:9:\"ardb_name\";s:17:\"WBSCARDB(Kolkata)\";s:11:\"district_id\";s:2:\"42\";}'),
(18, '202.65.156.246', '', 1630651960, '__ci_last_regenerate|i:1630651960;'),
(22, '122.176.27.53', '', 1630655280, '__ci_last_regenerate|i:1630655280;user_id|s:5:\"sss_r\";br_id|s:1:\"0\";user_type|s:1:\"R\";user_name|s:17:\"Document Receiver\";sys_date|s:10:\"2021-09-01\";login|O:8:\"stdClass\":14:{s:7:\"user_id\";s:5:\"sss_r\";s:8:\"password\";s:60:\"$2y$10$iumxF5civQAQyQpnEnm8peg1lkm0iNgAw7Xw4HlteHRw2vMS8wy4y\";s:9:\"user_type\";s:1:\"R\";s:9:\"user_name\";s:17:\"Document Receiver\";s:11:\"designation\";N;s:5:\"br_id\";s:1:\"0\";s:11:\"user_status\";s:1:\"A\";s:7:\"remarks\";s:0:\"\";s:10:\"created_by\";s:3:\"tan\";s:10:\"created_dt\";s:19:\"2019-01-16 02:01:01\";s:11:\"modified_by\";N;s:11:\"modified_dt\";N;s:9:\"ardb_name\";s:17:\"WBSCARDB(Kolkata)\";s:11:\"district_id\";s:2:\"42\";}'),
(28, '202.65.156.246', '', 1630661132, '__ci_last_regenerate|i:1630661132;login|O:8:\"stdClass\":14:{s:7:\"user_id\";s:7:\"bankura\";s:8:\"password\";s:60:\"$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6\";s:9:\"user_type\";s:1:\"U\";s:9:\"user_name\";s:12:\"BANKURA USER\";s:11:\"designation\";N;s:5:\"br_id\";s:2:\"22\";s:11:\"user_status\";s:1:\"A\";s:7:\"remarks\";s:0:\"\";s:10:\"created_by\";s:8:\"Synergic\";s:10:\"created_dt\";s:19:\"2020-06-22 02:05:28\";s:11:\"modified_by\";N;s:11:\"modified_dt\";N;s:9:\"ardb_name\";s:17:\"Bankura ARDB Ltd.\";s:11:\"district_id\";s:3:\"305\";}user_id|s:7:\"bankura\";br_id|s:2:\"22\";user_type|s:1:\"U\";user_name|s:12:\"BANKURA USER\";sys_date|s:10:\"2021-04-05\";'),
(30, '202.65.156.246', '', 1630659483, '__ci_last_regenerate|i:1630659483;'),
(33, '202.65.156.246', '', 1630659272, '__ci_last_regenerate|i:1630659272;'),
(41, '115.187.40.7', '', 1630655864, '__ci_last_regenerate|i:1630655864;user_id|s:5:\"sss_r\";br_id|s:1:\"0\";user_type|s:1:\"R\";user_name|s:17:\"Document Receiver\";sys_date|s:10:\"2021-09-02\";login|O:8:\"stdClass\":14:{s:7:\"user_id\";s:5:\"sss_r\";s:8:\"password\";s:60:\"$2y$10$iumxF5civQAQyQpnEnm8peg1lkm0iNgAw7Xw4HlteHRw2vMS8wy4y\";s:9:\"user_type\";s:1:\"R\";s:9:\"user_name\";s:17:\"Document Receiver\";s:11:\"designation\";N;s:5:\"br_id\";s:1:\"0\";s:11:\"user_status\";s:1:\"A\";s:7:\"remarks\";s:0:\"\";s:10:\"created_by\";s:3:\"tan\";s:10:\"created_dt\";s:19:\"2019-01-16 02:01:01\";s:11:\"modified_by\";N;s:11:\"modified_dt\";N;s:9:\"ardb_name\";s:17:\"WBSCARDB(Kolkata)\";s:11:\"district_id\";s:2:\"42\";}'),
(44, '202.65.156.246', '', 1630655278, '__ci_last_regenerate|i:1630655278;login|O:8:\"stdClass\":14:{s:7:\"user_id\";s:7:\"bankura\";s:8:\"password\";s:60:\"$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6\";s:9:\"user_type\";s:1:\"U\";s:9:\"user_name\";s:12:\"BANKURA USER\";s:11:\"designation\";N;s:5:\"br_id\";s:2:\"22\";s:11:\"user_status\";s:1:\"A\";s:7:\"remarks\";s:0:\"\";s:10:\"created_by\";s:8:\"Synergic\";s:10:\"created_dt\";s:19:\"2020-06-22 02:05:28\";s:11:\"modified_by\";N;s:11:\"modified_dt\";N;s:9:\"ardb_name\";s:17:\"Bankura ARDB Ltd.\";s:11:\"district_id\";s:3:\"305\";}user_id|s:7:\"bankura\";br_id|s:2:\"22\";user_type|s:1:\"U\";user_name|s:12:\"BANKURA USER\";sys_date|s:10:\"2021-04-05\";'),
(50, '202.65.156.246', '', 1630659484, '__ci_last_regenerate|i:1630659484;'),
(51, '202.65.156.246', '', 1630652391, '__ci_last_regenerate|i:1630652391;'),
(54, '202.65.156.246', '', 1630661185, '__ci_last_regenerate|i:1630661185;'),
(57, '202.65.156.246', '', 1630659481, '__ci_last_regenerate|i:1630659481;'),
(60, '202.65.156.246', '', 1631101254, '__ci_last_regenerate|i:1631101254;'),
(62, '202.65.156.246', '', 1630651882, '__ci_last_regenerate|i:1630651882;'),
(65, '202.65.156.246', '', 1630651880, '__ci_last_regenerate|i:1630651880;'),
(68, '202.65.156.246', '', 1630655828, '__ci_last_regenerate|i:1630655828;'),
(70, '202.65.156.246', '', 1630655827, '__ci_last_regenerate|i:1630655827;'),
(71, '202.65.156.246', '', 1630659483, '__ci_last_regenerate|i:1630659483;'),
(72, '202.65.156.246', '', 1630493819, '__ci_last_regenerate|i:1630493819;'),
(73, '202.65.156.246', '', 1631466908, '__ci_last_regenerate|i:1631466908;'),
(77, '202.65.156.246', '', 1630659270, '__ci_last_regenerate|i:1630659270;user_id|s:5:\"sss_r\";br_id|s:1:\"0\";user_type|s:1:\"R\";user_name|s:17:\"Document Receiver\";sys_date|s:10:\"2021-09-02\";login|O:8:\"stdClass\":14:{s:7:\"user_id\";s:5:\"sss_r\";s:8:\"password\";s:60:\"$2y$10$iumxF5civQAQyQpnEnm8peg1lkm0iNgAw7Xw4HlteHRw2vMS8wy4y\";s:9:\"user_type\";s:1:\"R\";s:9:\"user_name\";s:17:\"Document Receiver\";s:11:\"designation\";N;s:5:\"br_id\";s:1:\"0\";s:11:\"user_status\";s:1:\"A\";s:7:\"remarks\";s:0:\"\";s:10:\"created_by\";s:3:\"tan\";s:10:\"created_dt\";s:19:\"2019-01-16 02:01:01\";s:11:\"modified_by\";N;s:11:\"modified_dt\";N;s:9:\"ardb_name\";s:17:\"WBSCARDB(Kolkata)\";s:11:\"district_id\";s:2:\"42\";}'),
(78, '202.65.156.246', '', 1630659273, '__ci_last_regenerate|i:1630659273;'),
(79, '202.65.156.246', '', 1630493751, '__ci_last_regenerate|i:1630493751;'),
(80, '223.191.53.83', '', 1630490922, '__ci_last_regenerate|i:1630490685;'),
(85, '202.65.156.246', '', 1630655829, '__ci_last_regenerate|i:1630655829;'),
(90, '202.65.156.246', '', 1630661132, '__ci_last_regenerate|i:1630661132;'),
(93, '202.65.156.246', '', 1630651883, '__ci_last_regenerate|i:1630651883;'),
(94, '122.176.27.53', '', 1627372532, '__ci_last_regenerate|i:1627372301;user_id|s:5:\"sss_u\";br_id|s:1:\"0\";user_type|s:1:\"U\";user_name|s:13:\"WBSCARDB USER\";sys_date|s:10:\"2021-07-27\";'),
(95, '202.65.156.246', '', 1630661183, '__ci_last_regenerate|i:1630661183;'),
(96, '202.65.156.246', '', 1630661130, '__ci_last_regenerate|i:1630661130;login|O:8:\"stdClass\":14:{s:7:\"user_id\";s:7:\"bankura\";s:8:\"password\";s:60:\"$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6\";s:9:\"user_type\";s:1:\"U\";s:9:\"user_name\";s:12:\"BANKURA USER\";s:11:\"designation\";N;s:5:\"br_id\";s:2:\"22\";s:11:\"user_status\";s:1:\"A\";s:7:\"remarks\";s:0:\"\";s:10:\"created_by\";s:8:\"Synergic\";s:10:\"created_dt\";s:19:\"2020-06-22 02:05:28\";s:11:\"modified_by\";N;s:11:\"modified_dt\";N;s:9:\"ardb_name\";s:17:\"Bankura ARDB Ltd.\";s:11:\"district_id\";s:3:\"305\";}user_id|s:7:\"bankura\";br_id|s:2:\"22\";user_type|s:1:\"U\";user_name|s:12:\"BANKURA USER\";sys_date|s:10:\"2021-04-05\";'),
(99, '122.176.27.53', '', 1630661130, '__ci_last_regenerate|i:1630661130;user_id|s:6:\"sss_a2\";br_id|s:1:\"0\";user_type|s:1:\"V\";user_name|s:19:\"WBSCARDB APPROVER 2\";sys_date|s:10:\"2021-04-06\";login|O:8:\"stdClass\":14:{s:7:\"user_id\";s:6:\"sss_a2\";s:8:\"password\";s:60:\"$2y$10$iumxF5civQAQyQpnEnm8peg1lkm0iNgAw7Xw4HlteHRw2vMS8wy4y\";s:9:\"user_type\";s:1:\"V\";s:9:\"user_name\";s:19:\"WBSCARDB APPROVER 2\";s:11:\"designation\";N;s:5:\"br_id\";s:1:\"0\";s:11:\"user_status\";s:1:\"A\";s:7:\"remarks\";s:0:\"\";s:10:\"created_by\";s:3:\"tan\";s:10:\"created_dt\";s:19:\"2019-01-16 02:01:01\";s:11:\"modified_by\";N;s:11:\"modified_dt\";N;s:9:\"ardb_name\";s:17:\"WBSCARDB(Kolkata)\";s:11:\"district_id\";s:2:\"42\";}'),
(137, '202.65.156.246', '', 1630655221, '__ci_last_regenerate|i:1630655221;'),
(141, '202.65.156.246', '', 1630652394, '__ci_last_regenerate|i:1630652394;'),
(372, '202.65.156.246', '', 1630655827, '__ci_last_regenerate|i:1630655827;'),
(373, '202.65.156.246', '', 1630661131, '__ci_last_regenerate|i:1630661131;'),
(411, '202.65.156.246', '', 1630655832, '__ci_last_regenerate|i:1630655832;'),
(507, '202.65.156.246', '', 1630655830, '__ci_last_regenerate|i:1630655830;'),
(542, '202.65.156.246', '', 1630661132, '__ci_last_regenerate|i:1630661132;'),
(558, '202.65.156.246', '', 1630661181, '__ci_last_regenerate|i:1630661181;'),
(603, '202.65.156.246', '', 1630659270, '__ci_last_regenerate|i:1630659270;'),
(650, '202.65.156.246', '', 1630663304, '__ci_last_regenerate|i:1630663304;'),
(782, '202.65.156.246', '', 1630494212, '__ci_last_regenerate|i:1630494212;user_id|s:10:\"jalpaiguri\";br_id|s:1:\"8\";user_type|s:1:\"U\";user_name|s:15:\"JALPAIGURI USER\";sys_date|s:10:\"2021-09-01\";login|O:8:\"stdClass\":14:{s:7:\"user_id\";s:10:\"jalpaiguri\";s:8:\"password\";s:60:\"$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6\";s:9:\"user_type\";s:1:\"U\";s:9:\"user_name\";s:15:\"JALPAIGURI USER\";s:11:\"designation\";N;s:5:\"br_id\";s:1:\"8\";s:11:\"user_status\";s:1:\"A\";s:7:\"remarks\";s:0:\"\";s:10:\"created_by\";s:8:\"Synergic\";s:10:\"created_dt\";s:19:\"2020-06-22 02:05:28\";s:11:\"modified_by\";N;s:11:\"modified_dt\";N;s:9:\"ardb_name\";s:20:\"Jalpaiguri ARDB Ltd.\";s:11:\"district_id\";s:3:\"314\";}'),
(811, '202.65.156.246', '', 1630661127, '__ci_last_regenerate|i:1630661127;user_id|s:5:\"sss_r\";br_id|s:1:\"0\";user_type|s:1:\"R\";user_name|s:17:\"Document Receiver\";sys_date|s:10:\"2021-09-01\";login|O:8:\"stdClass\":14:{s:7:\"user_id\";s:5:\"sss_r\";s:8:\"password\";s:60:\"$2y$10$iumxF5civQAQyQpnEnm8peg1lkm0iNgAw7Xw4HlteHRw2vMS8wy4y\";s:9:\"user_type\";s:1:\"R\";s:9:\"user_name\";s:17:\"Document Receiver\";s:11:\"designation\";N;s:5:\"br_id\";s:1:\"0\";s:11:\"user_status\";s:1:\"A\";s:7:\"remarks\";s:0:\"\";s:10:\"created_by\";s:3:\"tan\";s:10:\"created_dt\";s:19:\"2019-01-16 02:01:01\";s:11:\"modified_by\";N;s:11:\"modified_dt\";N;s:9:\"ardb_name\";s:17:\"WBSCARDB(Kolkata)\";s:11:\"district_id\";s:2:\"42\";}'),
(907, '202.65.156.246', '', 1630659271, '__ci_last_regenerate|i:1630659271;'),
(3278, '117.247.76.202', '', 1630663689, '__ci_last_regenerate|i:1630663689;user_id|s:5:\"sss_r\";br_id|s:1:\"0\";user_type|s:1:\"R\";user_name|s:17:\"Document Receiver\";sys_date|s:10:\"2021-09-02\";login|O:8:\"stdClass\":14:{s:7:\"user_id\";s:5:\"sss_r\";s:8:\"password\";s:60:\"$2y$10$iumxF5civQAQyQpnEnm8peg1lkm0iNgAw7Xw4HlteHRw2vMS8wy4y\";s:9:\"user_type\";s:1:\"R\";s:9:\"user_name\";s:17:\"Document Receiver\";s:11:\"designation\";N;s:5:\"br_id\";s:1:\"0\";s:11:\"user_status\";s:1:\"A\";s:7:\"remarks\";s:0:\"\";s:10:\"created_by\";s:3:\"tan\";s:10:\"created_dt\";s:19:\"2019-01-16 02:01:01\";s:11:\"modified_by\";N;s:11:\"modified_dt\";N;s:9:\"ardb_name\";s:17:\"WBSCARDB(Kolkata)\";s:11:\"district_id\";s:2:\"42\";}'),
(3543, '202.65.156.246', '', 1630655218, '__ci_last_regenerate|i:1630655218;'),
(6000, '202.65.156.246', '', 1630651958, '__ci_last_regenerate|i:1630651958;'),
(7961, '122.176.27.53', '', 1630564105, '__ci_last_regenerate|i:1630564105;user_id|s:5:\"sss_r\";br_id|s:1:\"0\";user_type|s:1:\"R\";user_name|s:17:\"Document Receiver\";sys_date|s:10:\"2021-09-02\";login|O:8:\"stdClass\":14:{s:7:\"user_id\";s:5:\"sss_r\";s:8:\"password\";s:60:\"$2y$10$iumxF5civQAQyQpnEnm8peg1lkm0iNgAw7Xw4HlteHRw2vMS8wy4y\";s:9:\"user_type\";s:1:\"R\";s:9:\"user_name\";s:17:\"Document Receiver\";s:11:\"designation\";N;s:5:\"br_id\";s:1:\"0\";s:11:\"user_status\";s:1:\"A\";s:7:\"remarks\";s:0:\"\";s:10:\"created_by\";s:3:\"tan\";s:10:\"created_dt\";s:19:\"2019-01-16 02:01:01\";s:11:\"modified_by\";N;s:11:\"modified_dt\";N;s:9:\"ardb_name\";s:17:\"WBSCARDB(Kolkata)\";s:11:\"district_id\";s:2:\"42\";}'),
(67275, '122.176.27.53', '', 1617711488, '__ci_last_regenerate|i:1617711488;user_id|s:6:\"sss_a2\";br_id|s:1:\"0\";user_type|s:1:\"V\";user_name|s:19:\"WBSCARDB APPROVER 2\";sys_date|s:10:\"2021-04-06\";login|O:8:\"stdClass\":14:{s:7:\"user_id\";s:6:\"sss_a2\";s:8:\"password\";s:60:\"$2y$10$iumxF5civQAQyQpnEnm8peg1lkm0iNgAw7Xw4HlteHRw2vMS8wy4y\";s:9:\"user_type\";s:1:\"V\";s:9:\"user_name\";s:19:\"WBSCARDB APPROVER 2\";s:11:\"designation\";N;s:5:\"br_id\";s:1:\"0\";s:11:\"user_status\";s:1:\"A\";s:7:\"remarks\";s:0:\"\";s:10:\"created_by\";s:3:\"tan\";s:10:\"created_dt\";s:19:\"2019-01-16 02:01:01\";s:11:\"modified_by\";N;s:11:\"modified_dt\";N;s:9:\"ardb_name\";s:17:\"WBSCARDB(Kolkata)\";s:11:\"district_id\";s:2:\"42\";}msg|s:48:\"<b style:\"color:red;\">Forwaded Successfully!</b>\";__ci_vars|a:1:{s:3:\"msg\";s:3:\"old\";}'),
(928751, '202.65.156.246', '', 1631101255, '__ci_last_regenerate|i:1631101255;'),
(7000000, '202.65.156.246', '', 1630659271, '__ci_last_regenerate|i:1630659271;'),
(9223372036854775807, '223.191.53.83', '', 1630479780, '__ci_last_regenerate|i:1630479780;');

-- --------------------------------------------------------

--
-- Table structure for table `md_block`
--

CREATE TABLE `md_block` (
  `sl_no` int(10) NOT NULL,
  `district_code` int(50) NOT NULL,
  `block_code` int(50) NOT NULL,
  `block_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `md_block`
--

INSERT INTO `md_block` (`sl_no`, `district_code`, `block_code`, `block_name`) VALUES
(1, 320, 3029, 'Hanskhali'),
(2, 320, 3030, 'Haringhata'),
(3, 319, 3019, 'Raghunathganj-I'),
(4, 319, 3021, 'Raninagar-I'),
(5, 320, 3034, 'Krishnaganj'),
(6, 704, 2809, 'Kanksa'),
(7, 303, 2732, 'Bongaon'),
(8, 303, 2737, 'Haroa'),
(9, 304, 2764, 'Magra Hat-I'),
(10, 304, 2767, 'Mathurapur I'),
(11, 304, 2768, 'Mathurapur-Ii'),
(12, 304, 2769, 'Namkhana'),
(13, 304, 2770, 'Pathar Pratima'),
(14, 304, 2773, 'Thakurpukur Mahestola'),
(15, 308, 2849, 'Dinhata-II'),
(16, 308, 2850, 'Haldibari'),
(17, 309, 2868, 'Phansidewa'),
(18, 307, 2838, 'Nalhati-II'),
(19, 307, 2839, 'Nanoor'),
(20, 307, 2831, 'Labpur'),
(21, 308, 2857, 'Tufanganj-II'),
(22, 309, 2858, 'Darjeeling-Pulbazar'),
(23, 313, 2911, 'Jagatballavpur'),
(24, 313, 2918, 'Uluberia-II'),
(25, 314, 2923, 'Jalpaiguri'),
(26, 311, 2878, 'Chopra'),
(27, 311, 2881, 'Hemtabad'),
(28, 317, 2950, 'Contai-I'),
(29, 316, 2936, 'Gazole'),
(30, 316, 2939, 'Harishchandrapur-II'),
(31, 316, 2932, 'Bamongola'),
(32, 318, 2975, 'Chandrakona-II'),
(33, 318, 2978, 'Daspur-I'),
(34, 306, 2797, 'Ausgram-II'),
(35, 306, 2813, 'Ketugram_I'),
(36, 320, 3042, 'Tehatta-I'),
(37, 320, 7115, 'Kalyani'),
(38, 704, 2806, 'Jamuria'),
(39, 319, 3023, 'Sagardighi'),
(40, 320, 3037, 'Nabadwip'),
(41, 321, 3062, 'Raghunathpur-II'),
(42, 321, 3063, 'Santuri'),
(43, 321, 3056, 'Neturia'),
(44, 312, 2895, 'Haripal'),
(45, 312, 2903, 'Sirampur-Uttarpara'),
(46, 303, 2733, 'Deganga'),
(47, 304, 2752, 'Budge Budge-II'),
(48, 304, 2748, 'Bhangar-II'),
(49, 304, 2750, 'Bishnupur-II'),
(50, 304, 2756, 'Diamond Harbour-II'),
(51, 304, 2772, 'Sonar Pur'),
(52, 664, 2920, 'Alipurduar-II'),
(53, 664, 2926, 'Madarihat'),
(54, 309, 2867, 'Naxal Bari'),
(55, 307, 2845, 'Suri-II'),
(56, 307, 2837, 'Nalhati-I'),
(57, 308, 2853, 'Mekliganj'),
(58, 307, 2830, 'Khoyrasol'),
(59, 305, 2779, 'Hirbandh'),
(60, 305, 2782, 'Jaypur'),
(61, 305, 2789, 'Ranibundh'),
(62, 305, 2790, 'Saltora'),
(63, 703, 2985, 'Gopiballav Pur -II'),
(64, 313, 2916, 'Udaynarayanpur'),
(65, 310, 2876, 'Kushmandi'),
(66, 310, 2875, 'Kumarganj'),
(67, 311, 2879, 'Goalpokhar II'),
(68, 317, 2955, 'Haldia'),
(69, 317, 2958, 'Kolaghat'),
(70, 317, 2962, 'Nandigram-I'),
(71, 317, 2948, 'Bhagawanpur-II'),
(72, 317, 2963, 'Nandigram-II'),
(73, 703, 2987, 'Jambani'),
(74, 702, 2861, 'Kalimpong-I'),
(75, 319, 3002, 'Beldanga-II'),
(76, 318, 2994, 'Mohanpur'),
(77, 319, 3004, 'Bhagabangola-II'),
(78, 321, 3046, 'Balarampur'),
(79, 704, 2826, 'Salanpur'),
(80, 306, 2812, 'Ketugram-II'),
(81, 321, 3052, 'Jhalda-II'),
(82, 321, 3044, 'Arsha'),
(83, 320, 3040, 'Ranaghat-II'),
(84, 319, 3018, 'Nawda'),
(85, 320, 3043, 'Tehatta-II'),
(86, 704, 2798, 'Barabani'),
(87, 704, 2802, 'Faridpur - Durgapur'),
(88, 319, 3012, 'Jalangi'),
(89, 319, 3024, 'Shamsherganj'),
(90, 319, 3025, 'Suti-I'),
(91, 321, 3059, 'Purulia-I'),
(92, 312, 2901, 'Pursurah'),
(93, 303, 2735, 'Habra-I'),
(94, 303, 2738, 'Hasnabad'),
(95, 303, 2739, 'Hingalganj'),
(96, 304, 2749, 'Bishnupur-I'),
(97, 304, 2762, 'Kulpi'),
(98, 304, 2759, 'Jaynagar-I'),
(99, 304, 2761, 'Kak Dwip'),
(100, 304, 2766, 'Mandirbazar'),
(101, 309, 2865, 'Matigara'),
(102, 309, 2866, 'Mirik'),
(103, 307, 2829, 'Illambazar'),
(104, 308, 2848, 'Dinhata-I'),
(105, 309, 2860, 'Jore Bunglow-Sukiapokhri'),
(106, 305, 2785, 'Mejhia'),
(107, 305, 2781, 'Indus'),
(108, 314, 2927, 'Mal'),
(109, 703, 2972, 'Binpur-I'),
(110, 310, 2872, 'Gangarampur'),
(111, 311, 2883, 'Itahar'),
(112, 311, 2884, 'Kaliaganj'),
(113, 311, 2880, 'Goalpokhar-I'),
(114, 310, 2871, 'Bansihari'),
(115, 317, 2954, 'Egra-Ii'),
(116, 316, 2937, 'Habibpur'),
(117, 316, 2946, 'Ratua-Ii'),
(118, 317, 2947, 'Bhagawanpur-I'),
(119, 317, 2961, 'Nandakumar'),
(120, 316, 2938, 'Harishchandrapur-I'),
(121, 703, 2988, 'Jhargram'),
(122, 319, 3006, 'Bharatpur-I'),
(123, 318, 2992, 'Kharagpur-II'),
(124, 319, 3007, 'Bharatpur-II'),
(125, 319, 3008, 'Burwan'),
(126, 319, 3001, 'Beldanga-I'),
(127, 318, 2991, 'Kharagpur-I'),
(128, 319, 3005, 'Bhagawangola-I'),
(129, 317, 2967, 'Ramnagar-I'),
(130, 306, 2805, 'Jamal Pur'),
(131, 306, 2823, 'Raina-I'),
(132, 320, 3039, 'Ranaghat-I'),
(133, 319, 3016, 'Murshidabad-Jiagunj'),
(134, 319, 3010, 'Farakka'),
(135, 319, 3011, 'Hariharpara'),
(136, 319, 3013, 'Kandi'),
(137, 321, 3060, 'Purulia-II'),
(138, 303, 2725, 'Bagda'),
(139, 303, 2727, 'Barasat-II'),
(140, 303, 2740, 'Minakhan'),
(141, 303, 2742, 'Sandeshkhali-I'),
(142, 304, 2747, 'Bhangar-I'),
(143, 304, 2753, 'Canning-I'),
(144, 304, 2760, 'Jaynagar-II'),
(145, 304, 2763, 'Kultali'),
(146, 307, 2844, 'Suri-I'),
(147, 307, 2836, 'Murarai-II'),
(148, 308, 2854, 'Sitai'),
(149, 308, 2855, 'Sitalkuchi'),
(150, 305, 2786, 'Onda'),
(151, 305, 2780, 'Indpur'),
(152, 305, 2775, 'Bankura-II'),
(153, 703, 2986, 'Gopiballavpur-I'),
(154, 310, 2873, 'Harirampur'),
(155, 310, 2874, 'Hili'),
(156, 311, 2886, 'Raiganj'),
(157, 316, 2942, 'Kaliachak-III'),
(158, 317, 2965, 'Patashpur-I'),
(159, 316, 2944, 'Old Malda'),
(160, 317, 2960, 'Moyna'),
(161, 316, 2934, 'Chanchal-II'),
(162, 318, 2982, 'Garbeta-II'),
(163, 318, 2983, 'Garbeta-III'),
(164, 318, 2977, 'Dantan-II'),
(165, 306, 2808, 'Kalna-I'),
(166, 321, 3054, 'Manbazar-I'),
(167, 306, 2818, 'Memari-II'),
(168, 306, 2821, 'Purbasthali-I'),
(169, 321, 3048, 'Bundwan'),
(170, 306, 2822, 'Purbasthali-II'),
(171, 306, 2824, 'Raina-II'),
(172, 306, 2815, 'Mangolkote'),
(173, 704, 2820, 'Pandaveswar'),
(174, 320, 3035, 'Krishnagar-I'),
(175, 306, 2801, 'Burdwan-II'),
(176, 306, 2810, 'Katwa-I'),
(177, 704, 2819, 'Ondal'),
(178, 313, 2908, 'Bagnan-II'),
(179, 313, 2914, 'Shyampur-I'),
(180, 309, 2864, 'Kurseong'),
(181, 312, 2888, 'Balagarh'),
(182, 312, 2889, 'Chanditala-I'),
(183, 312, 2887, 'Arambagh'),
(184, 312, 2892, 'Dhaniakhali'),
(185, 312, 2894, 'Goghat-II'),
(186, 303, 2744, 'Swarupnagar'),
(187, 304, 2758, 'Gosaba'),
(188, 664, 2922, 'Falakata'),
(189, 664, 2919, 'Alipurduar-I'),
(190, 664, 2924, 'Kalchini'),
(191, 307, 2840, 'Rajnagar'),
(192, 308, 2846, 'Cooch Behar II'),
(193, 308, 2856, 'Tufanganj-I'),
(194, 307, 2841, 'Rampurhat-I'),
(195, 307, 2833, 'Mayureswar-II'),
(196, 305, 2778, 'Gangajal Ghati'),
(197, 305, 2787, 'Patrasayer'),
(198, 305, 2794, 'Taldangra'),
(199, 703, 2973, 'Binpur-II'),
(200, 314, 2929, 'Maynaguri'),
(201, 313, 2915, 'Shyampur-II'),
(202, 310, 2877, 'Tapan'),
(203, 313, 2907, 'Bagnan-I'),
(204, 311, 2885, 'Karandighi'),
(205, 317, 2964, 'Panskura-I'),
(206, 316, 2941, 'Kaliachak-II'),
(207, 317, 2949, 'Chandipur'),
(208, 317, 2956, 'Khejuri-I'),
(209, 703, 3000, 'Sankrail'),
(210, 703, 2996, 'Nayagram'),
(211, 702, 2859, 'Gorubathan'),
(212, 316, 2933, 'Chanchal-I'),
(213, 318, 2998, 'Sabang'),
(214, 317, 2966, 'Patashpur-II'),
(215, 318, 2981, 'Garbeta-I'),
(216, 317, 2968, 'Ramnagar-II'),
(217, 318, 2989, 'Keshiary'),
(218, 321, 3053, 'Kashipur'),
(219, 321, 3050, 'Jaipur'),
(220, 704, 2825, 'Raniganj'),
(221, 320, 3031, 'Kaliganj'),
(222, 319, 3026, 'Suti-II'),
(223, 321, 3061, 'Raghunath Pur-I'),
(224, 321, 3057, 'Para'),
(225, 312, 2890, 'Chanditala-Ii'),
(226, 312, 2891, 'Chinsurah-Magrah'),
(227, 303, 2723, 'Amdanga'),
(228, 312, 2904, 'Tarakeswar'),
(229, 303, 2730, 'Basirhat-I'),
(230, 303, 2734, 'Gaighata'),
(231, 303, 2736, 'Habra-II'),
(232, 304, 2751, 'Budge Budge-I'),
(233, 304, 2755, 'Diamond Harbour-I'),
(234, 304, 2754, 'Canning-II'),
(235, 304, 2765, 'Magra Hat-II'),
(236, 664, 2925, 'Kumargram'),
(237, 309, 2863, 'Kharibari'),
(238, 307, 2834, 'Mohammad Bazar'),
(239, 307, 2835, 'Murarai-I'),
(240, 305, 2791, 'Sarenga'),
(241, 305, 2788, 'Raipur-I'),
(242, 305, 2776, 'Barjora'),
(243, 305, 2795, 'Vishnupur'),
(244, 305, 2777, 'Chhatna'),
(245, 314, 2928, 'Matiali'),
(246, 313, 2905, 'Amta-I'),
(247, 313, 2909, 'Bally-Jagacha'),
(248, 316, 2943, 'Manikchak'),
(249, 317, 2951, 'Contai-III'),
(250, 316, 2940, 'Kaliachak-I'),
(251, 318, 2999, 'Salbani'),
(252, 318, 2979, 'Daspur-II'),
(253, 317, 2969, 'Shahid Matangini'),
(254, 321, 3045, 'Bagmundi'),
(255, 321, 3047, 'Barabazar'),
(256, 306, 2796, 'Ausgram-I'),
(257, 306, 2814, 'Khandaghosh'),
(258, 320, 3041, 'Santipur'),
(259, 319, 3020, 'Raghunathganj-II'),
(260, 319, 3022, 'Raninagar-II'),
(261, 319, 3014, 'Khargram'),
(262, 320, 3038, 'Nakashipara'),
(263, 321, 3055, 'Manbazar-II'),
(264, 312, 2893, 'Goghat-I'),
(265, 312, 2896, 'Jangipara'),
(266, 312, 2897, 'Khanakul-I'),
(267, 312, 2899, 'Pandua'),
(268, 303, 2724, 'Baduria'),
(269, 312, 2902, 'Singur'),
(270, 303, 2731, 'Basirhat-II'),
(271, 303, 2728, 'Barrackpur-I'),
(272, 304, 2745, 'Baruipur'),
(273, 307, 2843, 'Sainthia'),
(274, 308, 2852, 'Mathabhanga-I'),
(275, 309, 2869, 'Rangli Rangliot'),
(276, 308, 2851, 'Matha Bhanga-II'),
(277, 308, 2847, 'Cooch Behar-I'),
(278, 307, 2832, 'Mayureswar-I'),
(279, 305, 2793, 'Sonamukhi'),
(280, 307, 2827, 'Bolpur-Sriniketan'),
(281, 313, 2910, 'Domjur'),
(282, 313, 2912, 'Panchla'),
(283, 313, 2913, 'Sankrail'),
(284, 313, 2917, 'Uluberia-I'),
(285, 314, 2921, 'Dhupguri'),
(286, 313, 2906, 'Amta-II'),
(287, 310, 2870, 'Balurghat'),
(288, 317, 2952, 'Deshapran'),
(289, 702, 2862, 'Kalimpong-II'),
(290, 702, 7354, 'Lava'),
(291, 318, 2995, 'Narayangarh'),
(292, 318, 2990, 'Keshpur'),
(293, 318, 2993, 'Midnapore'),
(294, 319, 3003, 'Berhampore'),
(295, 318, 2974, 'Chandrakona-I'),
(296, 318, 2984, 'Ghatal'),
(297, 317, 2970, 'Sutahata'),
(298, 306, 2816, 'Manteswar'),
(299, 306, 2817, 'Memari-1'),
(300, 306, 2807, 'Kalna Ii'),
(301, 306, 2811, 'Katwa-II'),
(302, 321, 3049, 'Hura'),
(303, 306, 2804, 'Galsi-II'),
(304, 320, 3027, 'Chakdah'),
(305, 319, 3017, 'Nabagram'),
(306, 319, 3009, 'Domkal'),
(307, 320, 3032, 'Karimpur-1'),
(308, 320, 3033, 'Karimpur-II'),
(309, 320, 3036, 'Krishnagar-II'),
(310, 319, 3015, 'Lalgola'),
(311, 321, 3058, 'Puncha'),
(312, 312, 2898, 'Khanakul-II'),
(313, 312, 2900, 'Polba-Dadpur'),
(314, 303, 2726, 'Barasat-I'),
(315, 303, 2729, 'Barrackpur-II'),
(316, 304, 2746, 'Basanti'),
(317, 303, 2741, 'Rajarhat'),
(318, 303, 2743, 'Sandeshkhali-II'),
(319, 304, 2757, 'Falta'),
(320, 304, 2771, 'Sagar'),
(321, 305, 2774, 'Bankura-I'),
(322, 307, 2842, 'Rampurhat-II'),
(323, 307, 2828, 'Dubrajpur'),
(324, 305, 2792, 'Simlapal'),
(325, 305, 2783, 'Khatra-I'),
(326, 305, 2784, 'Kotulpur'),
(327, 314, 2930, 'Nagrakata'),
(328, 314, 2931, 'Rajganj'),
(329, 311, 2882, 'Islampur'),
(330, 317, 2957, 'Khejuri-Ii'),
(331, 317, 2959, 'Mahishadal'),
(332, 316, 2945, 'Ratua-I'),
(333, 317, 2953, 'Egra-I'),
(334, 316, 2935, 'English Bazar'),
(335, 702, 7355, 'Pedong'),
(336, 318, 2997, 'Pingla'),
(337, 317, 2971, 'Tamluk'),
(338, 318, 2980, 'Debra'),
(339, 318, 2976, 'Dantan-I'),
(340, 306, 2799, 'Bhatar'),
(341, 306, 2800, 'Burdwan-I'),
(342, 321, 3051, 'Jhalda-I'),
(343, 306, 2803, 'Galsi -I'),
(344, 320, 3028, 'Chapra'),
(345, 303, 1201003, 'Amdanga'),
(346, 303, 1201004, 'Deganga'),
(347, 303, 1201006, 'Habra-II'),
(348, 303, 1201012, 'Rajarhat'),
(349, 303, 1202001, 'Barrackpur-I'),
(350, 303, 1202002, 'Barrackpur-II'),
(351, 303, 1203001, 'Bongaon'),
(352, 303, 1203002, 'Gaighata'),
(353, 303, 1203003, 'Bagda'),
(354, 303, 1203004, 'Swarupnagar'),
(355, 303, 1204001, 'Basirhat-I'),
(356, 303, 1204002, 'Basirhat-II'),
(357, 303, 1204004, 'Baduria'),
(358, 303, 1204005, 'Haroa'),
(359, 303, 1204006, 'Minakhan'),
(360, 303, 1204007, 'Hasnabad'),
(361, 303, 1204008, 'Sandeshkhali-I'),
(362, 303, 1204010, 'Hingalganj'),
(363, 304, 1301001, 'Sonar Pur'),
(364, 304, 1301002, 'Baruipur'),
(365, 304, 1301003, 'Canning-I'),
(366, 304, 1301004, 'Canning-II'),
(367, 304, 1301005, 'Basanti'),
(368, 304, 1301006, 'Kultali'),
(369, 304, 1301007, 'Jaynagar-I'),
(370, 304, 1301008, 'Jaynagar-II'),
(371, 304, 1301009, 'Mathurapur I'),
(372, 304, 1301010, 'Mathurapur-Ii'),
(373, 304, 1301011, 'Bhangar-I'),
(374, 304, 1301012, 'Bhangar-II'),
(375, 304, 1301013, 'Budge Budge-I'),
(376, 304, 1301014, 'Budge Budge-II'),
(377, 304, 1301015, 'Thakurpukur Mahestola'),
(378, 304, 1302001, 'Kak Dwip'),
(379, 304, 1302002, 'Namkhana'),
(380, 304, 1302003, 'Pathar Pratima'),
(381, 304, 1302004, 'Kulpi'),
(382, 304, 1302005, 'Sagar'),
(383, 304, 1302006, 'Mandirbazar'),
(384, 304, 1302007, 'Diamond Harbour-I'),
(385, 304, 1302008, 'Diamond Harbour-II'),
(386, 304, 1302009, 'Bishnupur-I'),
(387, 304, 1302010, 'Bishnupur-II'),
(388, 304, 1302011, 'Magra Hat-I'),
(389, 304, 1302012, 'Magra Hat-II'),
(390, 304, 1302013, 'Gosaba'),
(391, 313, 1401001, 'Bagnan-I'),
(392, 313, 1401002, 'Bagnan-II'),
(393, 313, 1401003, 'Bally-Jagacha'),
(394, 313, 1401004, 'Panchla'),
(395, 313, 1401005, 'Shyampur-I'),
(396, 313, 1401006, 'Shyampur-II'),
(397, 313, 1401007, 'Sankrail'),
(398, 313, 1401008, 'Uluberia-I'),
(399, 313, 1401009, 'Uluberia-II'),
(400, 313, 1401010, 'Amta-I'),
(401, 313, 1401011, 'Amta-II'),
(402, 313, 1401012, 'Domjur'),
(403, 313, 1401013, 'Jagatballavpur'),
(404, 313, 1401014, 'Udaynarayanpur'),
(405, 306, 2101001, 'Katwa-I'),
(406, 306, 2101002, 'Katwa-II'),
(407, 306, 2101003, 'Ketugram_I'),
(408, 306, 2101004, 'Ketugram-II'),
(409, 306, 2101005, 'Kalna-I'),
(410, 306, 2101006, 'Kalna Ii'),
(411, 306, 2101007, 'Purbasthali-I'),
(412, 306, 2101008, 'Purbasthali-II'),
(413, 306, 2102001, 'Memari-1'),
(414, 306, 2102002, 'Memari-II'),
(415, 306, 2102003, 'Jamal Pur'),
(416, 306, 2102004, 'Burdwan-I'),
(417, 306, 2102005, 'Burdwan-II'),
(418, 306, 2102006, 'Bhatar'),
(419, 306, 2102007, 'Khandaghosh'),
(420, 306, 2102008, 'Raina-I'),
(421, 306, 2102009, 'Raina-II'),
(422, 306, 2102010, 'Ausgram-I'),
(423, 306, 2102011, 'Ausgram-II'),
(424, 306, 2102012, 'Galsi -I'),
(425, 306, 2102013, 'Galsi-II'),
(426, 704, 2102014, 'Kanksa'),
(427, 704, 2102015, 'Faridpur - Durgapur'),
(428, 704, 2102016, 'Salanpur'),
(429, 704, 2103002, 'Raniganj'),
(430, 704, 2103004, 'Ondal'),
(431, 704, 2103005, 'Barabani'),
(432, 306, 2104001, 'Manteswar'),
(433, 306, 2104002, 'Mangolkote'),
(434, 704, 2104003, 'Jamuria'),
(435, 305, 2201001, 'Bankura-I'),
(436, 305, 2201002, 'Bankura-II'),
(437, 305, 2201003, 'Chhatna'),
(438, 305, 2201004, 'Saltora'),
(439, 305, 2201005, 'Mejhia'),
(440, 305, 2201006, 'Gangajal Ghati'),
(441, 305, 2201007, 'Barjora'),
(442, 305, 2201008, 'Onda'),
(443, 305, 2202001, 'Vishnupur'),
(444, 305, 2202002, 'Jaypur'),
(445, 305, 2202003, 'Kotulpur'),
(446, 305, 2202004, 'Indus'),
(447, 305, 2202005, 'Patrasayer'),
(448, 305, 2202006, 'Sonamukhi'),
(449, 305, 2202009, 'Hirbandh'),
(450, 305, 2203001, 'Khatra-I'),
(451, 305, 2203003, 'Taldangra'),
(452, 305, 2203004, 'Simlapal'),
(453, 305, 2203005, 'Raipur-I'),
(454, 305, 2203008, 'Ranibundh'),
(455, 305, 2203009, 'Indpur'),
(456, 305, 2203010, 'Sarenga'),
(457, 317, 2401001, 'Tamluk'),
(458, 317, 2401003, 'Panskura-I'),
(459, 317, 2401005, 'Moyna'),
(460, 317, 2401006, 'Nandakumar'),
(461, 317, 2402001, 'Sutahata'),
(462, 317, 2402003, 'Nandigram-I'),
(463, 317, 2402004, 'Nandigram-II'),
(464, 317, 2402005, 'Mahishadal'),
(465, 317, 2402241, 'Chandipur'),
(466, 317, 2403001, 'Contai-I'),
(467, 317, 2403003, 'Contai-III'),
(468, 317, 2403004, 'Ramnagar-I'),
(469, 317, 2403005, 'Ramnagar-II'),
(470, 317, 2403006, 'Egra-I'),
(471, 317, 2403007, 'Egra-Ii'),
(472, 317, 2403008, 'Patashpur-I'),
(473, 317, 2403009, 'Patashpur-II'),
(474, 317, 2403010, 'Bhagawanpur-I'),
(475, 317, 2403011, 'Bhagawanpur-II'),
(476, 317, 2403012, 'Khejuri-I'),
(477, 317, 2403013, 'Khejuri-Ii'),
(478, 318, 2404001, 'Chandrakona-I'),
(479, 318, 2404002, 'Chandrakona-II'),
(480, 318, 2404003, 'Daspur-I'),
(481, 318, 2404004, 'Daspur-II'),
(482, 318, 2404005, 'Ghatal'),
(483, 318, 2405001, 'Kharagpur-I'),
(484, 318, 2405002, 'Kharagpur-II'),
(485, 318, 2405004, 'Narayangarh'),
(486, 318, 2405005, 'Dantan-I'),
(487, 318, 2405006, 'Dantan-II'),
(488, 318, 2405007, 'Keshiary'),
(489, 318, 2405008, 'Pingla'),
(490, 318, 2405009, 'Sabang'),
(491, 318, 2405010, 'Mohanpur'),
(492, 318, 2406001, 'Midnapore'),
(493, 318, 2406002, 'Keshpur'),
(494, 318, 2406003, 'Debra'),
(495, 318, 2406004, 'Salbani'),
(496, 318, 2406005, 'Garbeta-I'),
(497, 318, 2406006, 'Garbeta-II'),
(498, 318, 2406007, 'Garbeta-III'),
(499, 703, 2407001, 'Jhargram'),
(500, 703, 2407002, 'Binpur-I'),
(501, 703, 2407003, 'Binpur-II'),
(502, 703, 2407004, 'Gopiballavpur-I'),
(503, 703, 2407005, 'Gopiballav Pur -II'),
(504, 703, 2407006, 'Sankrail'),
(505, 703, 2407007, 'Jambani'),
(506, 703, 2407008, 'Nayagram'),
(507, 307, 2501001, 'Rampurhat-I'),
(508, 307, 2501002, 'Rampurhat-II'),
(509, 307, 2501003, 'Mayureswar-I'),
(510, 307, 2501004, 'Mayureswar-II'),
(511, 307, 2501005, 'Nalhati-I'),
(512, 307, 2501006, 'Nalhati-II'),
(513, 307, 2501007, 'Murarai-I'),
(514, 307, 2501008, 'Murarai-II'),
(515, 307, 2502001, 'Suri-I'),
(516, 307, 2502002, 'Suri-II'),
(517, 307, 2502003, 'Sainthia'),
(518, 307, 2502004, 'Mohammad Bazar'),
(519, 307, 2502005, 'Dubrajpur'),
(520, 307, 2502006, 'Rajnagar'),
(521, 307, 2502007, 'Khoyrasol'),
(522, 307, 2503001, 'Bolpur-Sriniketan'),
(523, 307, 2503002, 'Labpur'),
(524, 307, 2503003, 'Nanoor'),
(525, 307, 2503004, 'Illambazar'),
(526, 312, 2601001, 'Chinsurah-Magrah'),
(527, 312, 2601002, 'Balagarh'),
(528, 312, 2601003, 'Dhaniakhali'),
(529, 312, 2601004, 'Pandua'),
(530, 312, 2601005, 'Polba-Dadpur'),
(531, 312, 2602001, 'Chanditala-I'),
(532, 312, 2602002, 'Chanditala-Ii'),
(533, 312, 2602003, 'Jangipara'),
(534, 312, 2603001, 'Haripal'),
(535, 312, 2603002, 'Singur'),
(536, 312, 2603003, 'Tarakeswar'),
(537, 312, 2603005, 'Sirampur-Uttarpara'),
(538, 312, 2604001, 'Arambagh'),
(539, 312, 2604002, 'Goghat-I'),
(540, 312, 2604003, 'Khanakul-I'),
(541, 312, 2604004, 'Khanakul-II'),
(542, 312, 2604005, 'Pursurah'),
(543, 320, 2701001, 'Krishnagar-I'),
(544, 320, 2701002, 'Krishnagar-II'),
(545, 320, 2701003, 'Nabadwip'),
(546, 320, 2701004, 'Krishnaganj'),
(547, 320, 2701005, 'Chapra'),
(548, 320, 2701006, 'Kaliganj'),
(549, 320, 2701007, 'Nakashipara'),
(550, 320, 2702001, 'Tehatta-I'),
(551, 320, 2702002, 'Tehatta-II'),
(552, 320, 2702003, 'Karimpur-1'),
(553, 320, 2702004, 'Karimpur-II'),
(554, 320, 2703001, 'Ranaghat-I'),
(555, 320, 2703002, 'Ranaghat-II'),
(556, 320, 2703003, 'Santipur'),
(557, 320, 2703004, 'Hanskhali'),
(558, 320, 2704001, 'Chakdah'),
(559, 320, 2704002, 'Haringhata'),
(560, 664, 3101001, 'Alipurduar-I'),
(561, 664, 3101002, 'Alipurduar-II'),
(562, 664, 3101003, 'Kalchini'),
(563, 664, 3101004, 'Madarihat'),
(564, 664, 3101005, 'Falakata'),
(565, 664, 3101006, 'Kumargram'),
(566, 314, 3102003, 'Mal'),
(567, 314, 3102004, 'Rajganj'),
(568, 314, 3102005, 'Maynaguri'),
(569, 314, 3102007, 'Jalpaiguri'),
(570, 314, 3102008, 'Dhupguri'),
(571, 311, 3301001, 'Raiganj'),
(572, 311, 3301002, 'Kaliaganj'),
(573, 311, 3301003, 'Itahar'),
(574, 311, 3301004, 'Hemtabad'),
(575, 311, 3302001, 'Chopra'),
(576, 311, 3302002, 'Islampur'),
(577, 311, 3302003, 'Goalpokhar-I'),
(578, 311, 3302004, 'Goalpokhar II'),
(579, 311, 3302005, 'Karandighi'),
(580, 310, 3401001, 'Balurghat'),
(581, 310, 3401002, 'Kumarganj'),
(582, 310, 3401003, 'Hili'),
(583, 310, 3402001, 'Gangarampur'),
(584, 310, 3402002, 'Bansihari'),
(585, 310, 3402003, 'Harirampur'),
(586, 310, 3402004, 'Kushmandi'),
(587, 310, 3402005, 'Tapan'),
(588, 316, 3501001, 'English Bazar'),
(589, 316, 3501002, 'Harishchandrapur-I'),
(590, 316, 3501003, 'Harishchandrapur-II'),
(591, 316, 3501004, 'Chanchal-I'),
(592, 316, 3501005, 'Chanchal-II'),
(593, 316, 3502001, 'Ratua-I'),
(594, 316, 3502002, 'Ratua-Ii'),
(595, 316, 3502003, 'Gazole'),
(596, 316, 3502004, 'Bamongola'),
(597, 316, 3502005, 'Habibpur'),
(598, 316, 3502006, 'Old Malda'),
(599, 316, 3502008, 'Manikchak'),
(600, 316, 3502009, 'Kaliachak-I'),
(601, 316, 3502010, 'Kaliachak-II'),
(602, 316, 3502011, 'Kaliachak-III'),
(603, 319, 3601001, 'Berhampore'),
(604, 319, 3601002, 'Beldanga-I'),
(605, 319, 3601003, 'Beldanga-II'),
(606, 319, 3601004, 'Nawda'),
(607, 319, 3601005, 'Hariharpara'),
(608, 319, 3601006, 'Domkal'),
(609, 319, 3601007, 'Jalangi'),
(610, 319, 3602001, 'Murshidabad-Jiagunj'),
(611, 319, 3602002, 'Nabagram'),
(612, 319, 3602003, 'Bhagawangola-I'),
(613, 319, 3602004, 'Bhagabangola-II'),
(614, 319, 3602005, 'Lalgola'),
(615, 319, 3602006, 'Raninagar-I'),
(616, 319, 3602007, 'Raninagar-II'),
(617, 319, 3602011, 'Burwan'),
(618, 319, 3603001, 'Raghunathganj-I'),
(619, 319, 3603002, 'Raghunathganj-II'),
(620, 319, 3603003, 'Sagardighi'),
(621, 319, 3603004, 'Suti-I'),
(622, 319, 3603005, 'Suti-II'),
(623, 319, 3603006, 'Shamsherganj'),
(624, 319, 3603007, 'Farakka'),
(625, 319, 3604001, 'Kandi'),
(626, 319, 3604002, 'Khargram'),
(627, 319, 3604004, 'Bharatpur-I'),
(628, 319, 3604005, 'Bharatpur-II'),
(629, 702, 3701001, 'Gorubathan'),
(630, 702, 3701002, 'Kalimpong-I'),
(631, 702, 3701003, 'Kalimpong-II'),
(632, 309, 3701004, 'Phansidewa'),
(633, 309, 3701005, 'Matigara'),
(634, 309, 3701012, 'Naxal Bari'),
(635, 309, 3702001, 'Kurseong'),
(636, 309, 3702002, 'Mirik'),
(637, 309, 3702004, 'Rangli Rangliot'),
(638, 309, 3702005, 'Jore Bunglow-Sukiapokhri'),
(639, 309, 3703001, 'Kharibari'),
(640, 308, 3801001, 'Cooch Behar-I'),
(641, 308, 38010011, 'Mekliganj'),
(642, 308, 3802002, 'Cooch Behar II'),
(643, 308, 3803003, 'Tufanganj-I'),
(644, 308, 3804004, 'Dinhata-I'),
(645, 308, 3805005, 'Dinhata-II'),
(646, 308, 3806006, 'Mathabhanga-I'),
(647, 308, 3807007, 'Matha Bhanga-II'),
(648, 308, 3808008, 'Sitai'),
(649, 308, 3808009, 'Sitalkuchi'),
(650, 308, 3809010, 'Haldibari');

-- --------------------------------------------------------

--
-- Table structure for table `md_district`
--

CREATE TABLE `md_district` (
  `district_code` int(10) NOT NULL,
  `district_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `md_district`
--

INSERT INTO `md_district` (`district_code`, `district_name`) VALUES
(2, 'MALDAH'),
(3, 'PURBA BARDHAMAN'),
(4, 'KOLKATA'),
(5, 'ALIPURDUAR'),
(6, 'DAKHSHIN DINAJPUR'),
(7, 'PASCHIM MEDINIPUR'),
(8, 'HOWRAH'),
(9, 'HOOGHLY'),
(10, 'MURSHIDABAD'),
(11, 'NORTH 24 PARGANAS'),
(12, 'PURBA MEDINIPUR'),
(13, 'UTTAR DINAJPUR'),
(14, 'NADIA'),
(15, 'BANKURA'),
(16, 'PURULIA'),
(17, 'COOCHBEHAR'),
(18, 'BIRBHUM'),
(19, 'DARJEELING'),
(20, 'JALPAIGURI'),
(21, 'SOUTH 24 PARGANAS'),
(22, 'JHARGRAM'),
(23, 'PASCHIM BARDHAMAN'),
(24, 'KALIMPONG');

-- --------------------------------------------------------

--
-- Table structure for table `md_purpose`
--

CREATE TABLE `md_purpose` (
  `purpose_code` int(10) NOT NULL,
  `purpose_name` varchar(100) NOT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_dt` datetime DEFAULT NULL,
  `modified_by` varchar(50) DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `md_purpose`
--

INSERT INTO `md_purpose` (`purpose_code`, `purpose_name`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(10002, 'J L G', NULL, NULL, NULL, NULL),
(10100, 'Minor Irrigation/water hervest', NULL, NULL, NULL, NULL),
(10101, 'Dugwell', NULL, NULL, NULL, NULL),
(10102, 'Borewell with Pumpsets', NULL, NULL, NULL, NULL),
(10103, 'IP Sets', NULL, NULL, NULL, NULL),
(10104, 'Drip Sets', NULL, NULL, NULL, NULL),
(10105, 'Sprinkler Sets', NULL, NULL, NULL, NULL),
(10106, 'Sub - mursible Pumpsets', NULL, NULL, NULL, NULL),
(10107, 'Lift Irrigation', NULL, NULL, NULL, NULL),
(10108, 'Pumpsets', NULL, NULL, NULL, NULL),
(10109, 'S. T. W.', NULL, NULL, NULL, NULL),
(10110, 'J.T.IRRIGATION', NULL, NULL, NULL, NULL),
(10111, 'O.F.Water Management', NULL, NULL, NULL, NULL),
(10112, 'Mushrum ', NULL, NULL, NULL, NULL),
(10114, 'Cane Cultivation', NULL, NULL, NULL, NULL),
(10115, 'Lemon', NULL, NULL, NULL, NULL),
(10199, 'Others', NULL, NULL, NULL, NULL),
(10200, 'Land Development', NULL, NULL, NULL, NULL),
(10201, 'General / Reclamation', NULL, NULL, NULL, NULL),
(10203, 'Building', NULL, NULL, NULL, NULL),
(10207, 'bench terracing', NULL, NULL, NULL, NULL),
(10301, 'Tractor + INSURANCE', NULL, NULL, NULL, NULL),
(10302, 'Thresher', NULL, NULL, NULL, NULL),
(10303, 'Harvestor', NULL, NULL, NULL, NULL),
(10304, 'Powertiller', NULL, NULL, NULL, NULL),
(10305, 'Sprayer', NULL, NULL, NULL, NULL),
(10306, 'Trailor', NULL, NULL, NULL, NULL),
(10307, 'Road Roller', NULL, NULL, NULL, NULL),
(10308, 'Tejpata Garden', NULL, NULL, NULL, NULL),
(10400, 'PLANTATION', NULL, NULL, NULL, NULL),
(10401, 'Tea', NULL, NULL, NULL, NULL),
(10402, 'Coffee', NULL, NULL, NULL, NULL),
(10403, 'Sericulture', NULL, NULL, NULL, NULL),
(10404, 'Betel Vine', NULL, NULL, NULL, NULL),
(10405, 'Green House', NULL, NULL, NULL, NULL),
(10406, 'Nursery', NULL, NULL, NULL, NULL),
(10407, 'Mixed Garden', NULL, NULL, NULL, NULL),
(10408, 'Clinics', NULL, NULL, NULL, NULL),
(10409, 'CHC', NULL, NULL, NULL, NULL),
(10423, 'patato', NULL, NULL, NULL, NULL),
(10500, 'HORTICULTURE', NULL, NULL, NULL, NULL),
(10501, 'Pineapple', NULL, NULL, NULL, NULL),
(10502, 'Apple', NULL, NULL, NULL, NULL),
(10503, 'Mango - Garden', NULL, NULL, NULL, NULL),
(10504, 'Coconut', NULL, NULL, NULL, NULL),
(10505, 'Orange', NULL, NULL, NULL, NULL),
(10506, 'Banana plantation', NULL, NULL, NULL, NULL),
(10507, 'Guava', NULL, NULL, NULL, NULL),
(10508, 'Sapota', NULL, NULL, NULL, NULL),
(10509, 'Papaya', NULL, NULL, NULL, NULL),
(10510, 'Others Citrus Fruits', NULL, NULL, NULL, NULL),
(10511, 'Mango-Nursery', NULL, NULL, NULL, NULL),
(10600, 'DAIRY', NULL, NULL, NULL, NULL),
(10601, 'Cows', NULL, NULL, NULL, NULL),
(10602, 'Buffaloes', NULL, NULL, NULL, NULL),
(10603, 'Cardamum', NULL, NULL, NULL, NULL),
(10604, 'Food crop', NULL, NULL, NULL, NULL),
(10605, 'dairy venture capital', NULL, NULL, NULL, NULL),
(10700, 'POULTRY', NULL, NULL, NULL, NULL),
(10701, 'Commercial Broiler', NULL, NULL, NULL, NULL),
(10702, 'Commercial Layer', NULL, NULL, NULL, NULL),
(10703, 'Hatchery(Magur & Imc hatchery)', NULL, NULL, NULL, NULL),
(10704, 'poultry venture capital', NULL, NULL, NULL, NULL),
(10705, 'composit schemes (f+p)', NULL, NULL, NULL, NULL),
(10777, 'Farm Pond', NULL, NULL, NULL, NULL),
(10778, 'farm machanism ', NULL, NULL, NULL, NULL),
(10779, 'Farm Equipments', NULL, NULL, NULL, NULL),
(10800, 'ANIMAL HUSBANDARY', NULL, NULL, NULL, NULL),
(10801, 'Sheep Rearing', NULL, NULL, NULL, NULL),
(10802, 'Goat Rearing', NULL, NULL, NULL, NULL),
(10803, 'Pig Rearing', NULL, NULL, NULL, NULL),
(10804, 'Rabbit Rearing', NULL, NULL, NULL, NULL),
(10805, 'Duck Rearing', NULL, NULL, NULL, NULL),
(10806, 'gotary venture capital', NULL, NULL, NULL, NULL),
(10807, 'piggry venture capital', NULL, NULL, NULL, NULL),
(10809, 'Gul Factory', NULL, NULL, NULL, NULL),
(10900, 'Fishery& Reexcavation Of Tank', NULL, NULL, NULL, NULL),
(10901, 'Fish Ponds', NULL, NULL, NULL, NULL),
(10902, 'Reservoir/Reverine Units', NULL, NULL, NULL, NULL),
(10903, 'Tank Units', NULL, NULL, NULL, NULL),
(10904, 'Hatcheries/Shrimp', NULL, NULL, NULL, NULL),
(10905, 'Mechanised Boats', NULL, NULL, NULL, NULL),
(10906, 'Non - mechanised Boat', NULL, NULL, NULL, NULL),
(10907, 'Brackish Water Fishery', NULL, NULL, NULL, NULL),
(10908, 'Varmi culture', NULL, NULL, NULL, NULL),
(10909, 'Fishery', NULL, NULL, NULL, NULL),
(10910, 'bee- keping', NULL, NULL, NULL, NULL),
(10911, 'S. T.(S.A.O.)', NULL, NULL, NULL, NULL),
(10912, 'onion. crop.', NULL, NULL, NULL, NULL),
(11000, 'FORESTY & WEST LAND DEVELOPMNT', NULL, NULL, NULL, NULL),
(11001, 'Social Forestry', NULL, NULL, NULL, NULL),
(11002, 'Farm Forestry', NULL, NULL, NULL, NULL),
(11011, 'Rural Godown', NULL, NULL, NULL, NULL),
(11012, 'Motor cycle purchase', NULL, NULL, NULL, NULL),
(11013, 'Dry Land Farming', NULL, NULL, NULL, NULL),
(11014, 'Cycusplantation', NULL, NULL, NULL, NULL),
(11015, 'S.H.G.', NULL, NULL, NULL, NULL),
(11031, 'jlg.farm                      ', NULL, NULL, NULL, NULL),
(11100, 'FLORICULTURE', NULL, NULL, NULL, NULL),
(11101, 'Rose', NULL, NULL, NULL, NULL),
(11102, 'Jasmine', NULL, NULL, NULL, NULL),
(11103, 'Tube Rose', NULL, NULL, NULL, NULL),
(11104, 'Merry Gold', NULL, NULL, NULL, NULL),
(11105, 'Chrysanthemum', NULL, NULL, NULL, NULL),
(11106, 'Bela', NULL, NULL, NULL, NULL),
(11107, 'Anthorium', NULL, NULL, NULL, NULL),
(11108, 'Gladiolus', NULL, NULL, NULL, NULL),
(11109, 'Marriage Hall', NULL, NULL, NULL, NULL),
(11200, 'INDUSTRIAL CROPS', NULL, NULL, NULL, NULL),
(11201, 'Mat Stick', NULL, NULL, NULL, NULL),
(11203, 'rotavetor', NULL, NULL, NULL, NULL),
(11300, 'CROP LOAN', NULL, NULL, NULL, NULL),
(11301, 'Paddy', NULL, NULL, NULL, NULL),
(11302, 'Wheat', NULL, NULL, NULL, NULL),
(11303, 'Jowar', NULL, NULL, NULL, NULL),
(11304, 'Bajra', NULL, NULL, NULL, NULL),
(11305, 'Other Millets', NULL, NULL, NULL, NULL),
(11306, 'Mustard', NULL, NULL, NULL, NULL),
(11307, 'Groundnut', NULL, NULL, NULL, NULL),
(11308, 'Other Oilseeds', NULL, NULL, NULL, NULL),
(11309, 'Pulses', NULL, NULL, NULL, NULL),
(11310, 'Chilly', NULL, NULL, NULL, NULL),
(11311, 'Tobacco', NULL, NULL, NULL, NULL),
(11312, 'Sugarcane', NULL, NULL, NULL, NULL),
(11313, 'Vegetables(incl Potato & Onion', NULL, NULL, NULL, NULL),
(11314, 'Squash', NULL, NULL, NULL, NULL),
(11315, 'Ginger', NULL, NULL, NULL, NULL),
(11322, 'aman paddy', NULL, NULL, NULL, NULL),
(11324, 'boro paddy', NULL, NULL, NULL, NULL),
(11400, 'Land purchase', NULL, NULL, NULL, NULL),
(11401, 'Arecanut', NULL, NULL, NULL, NULL),
(11402, 'Motorcycle purchase', NULL, NULL, NULL, NULL),
(11514, 'vermi with vegitable', NULL, NULL, NULL, NULL),
(11590, 'Petrol Pump', NULL, NULL, NULL, NULL),
(13049, 'Water Harvesting', NULL, NULL, NULL, NULL),
(19901, 'Bullock', NULL, NULL, NULL, NULL),
(19902, 'Bullock Carts', NULL, NULL, NULL, NULL),
(19903, 'Bio - gas Plants', NULL, NULL, NULL, NULL),
(19904, 'Cattle Shed', NULL, NULL, NULL, NULL),
(19905, 'Farm House', NULL, NULL, NULL, NULL),
(19906, 'Pump set Repairing& Assembling', NULL, NULL, NULL, NULL),
(19907, 'agricultur SHG', NULL, NULL, NULL, NULL),
(19908, 'solar pump set', NULL, NULL, NULL, NULL),
(19909, 's.h.g. farm', NULL, NULL, NULL, NULL),
(20020, 's. h. g', NULL, NULL, NULL, NULL),
(20021, 'jlg non farm', NULL, NULL, NULL, NULL),
(20100, 'TRANSPORT SECTOR', NULL, NULL, NULL, NULL),
(20101, 'Small Road Transport Operator', NULL, NULL, NULL, NULL),
(20102, 'Auto Repair', NULL, NULL, NULL, NULL),
(20103, 'Auto Body Building', NULL, NULL, NULL, NULL),
(20104, 'Refrigerated Milk Transport', NULL, NULL, NULL, NULL),
(20105, 'Rickshaw/Small Auto Deliv. Van', NULL, NULL, NULL, NULL),
(20106, 'Pumpset/Tractor Servicing', NULL, NULL, NULL, NULL),
(20107, 'Oil Tanker', NULL, NULL, NULL, NULL),
(20108, 'Weigh Bridge', NULL, NULL, NULL, NULL),
(20109, 'Construction of Ropeway', NULL, NULL, NULL, NULL),
(20110, 'Confectionery(lozenges)', NULL, NULL, NULL, NULL),
(20111, 'Balance & Weight ', NULL, NULL, NULL, NULL),
(20112, 'Automobile garage', NULL, NULL, NULL, NULL),
(20113, 'Dal milling ', NULL, NULL, NULL, NULL),
(20114, 'Pillow Making', NULL, NULL, NULL, NULL),
(20115, 'pan & cigarate gumti , Tea sta', NULL, NULL, NULL, NULL),
(20116, 'suger candy ', NULL, NULL, NULL, NULL),
(20117, 'Stationery & Gift item ', NULL, NULL, NULL, NULL),
(20118, 'Rural Shop', NULL, NULL, NULL, NULL),
(20121, 'saree printing', NULL, NULL, NULL, NULL),
(20122, 'Spice Grinding Unit', NULL, NULL, NULL, NULL),
(20123, 'Tractor Body Building', NULL, NULL, NULL, NULL),
(20124, 'Powertiller R & S', NULL, NULL, NULL, NULL),
(20166, 'Primer Manufacturing unit', NULL, NULL, NULL, NULL),
(20167, 'Leather chappel', NULL, NULL, NULL, NULL),
(20168, 'Home Lighting System of Solar', NULL, NULL, NULL, NULL),
(20169, 'book binding', NULL, NULL, NULL, NULL),
(20170, 'Bag Manufacturing', NULL, NULL, NULL, NULL),
(20180, 'restrurent cum community hall', NULL, NULL, NULL, NULL),
(20181, 'Rice bran product', NULL, NULL, NULL, NULL),
(20200, 'AGROPROCESSING', NULL, NULL, NULL, NULL),
(20201, 'Mini Rice Mill', NULL, NULL, NULL, NULL),
(20202, 'Paddy to Rice', NULL, NULL, NULL, NULL),
(20203, 'Modernised Husking Mill', NULL, NULL, NULL, NULL),
(20204, 'Mustard/Groundnut Oil Mill', NULL, NULL, NULL, NULL),
(20205, 'Wheat/Spice Grinding Mill', NULL, NULL, NULL, NULL),
(20206, 'Fruit Preservation', NULL, NULL, NULL, NULL),
(20207, 'Muri Making', NULL, NULL, NULL, NULL),
(20208, 'Ata & Husking Mill', NULL, NULL, NULL, NULL),
(20209, 'Mustard oil seed crusher', NULL, NULL, NULL, NULL),
(20210, 'Oil mill (composit)', NULL, NULL, NULL, NULL),
(20211, 'Mineral Water', NULL, NULL, NULL, NULL),
(20212, 'Jajim & beading', NULL, NULL, NULL, NULL),
(20213, 'soap making', NULL, NULL, NULL, NULL),
(20214, 'Soler energy', NULL, NULL, NULL, NULL),
(20215, 'Beauty parlour', NULL, NULL, NULL, NULL),
(20216, 'Hand & Spray Machine', NULL, NULL, NULL, NULL),
(20217, 'Statchu', NULL, NULL, NULL, NULL),
(20218, 'cash credit', NULL, NULL, NULL, NULL),
(20219, 'varmi composed', NULL, NULL, NULL, NULL),
(20220, 'generator set', NULL, NULL, NULL, NULL),
(20226, 'two wheeler work shop', NULL, NULL, NULL, NULL),
(20289, 'Studio', NULL, NULL, NULL, NULL),
(20290, 'Bus', NULL, NULL, NULL, NULL),
(20298, 'Foam raxin bag manufecturing', NULL, NULL, NULL, NULL),
(20300, 'CONSTRUCTION INDUSTRIES', NULL, NULL, NULL, NULL),
(20301, 'RCC Products', NULL, NULL, NULL, NULL),
(20302, 'Brick Manufacturing', NULL, NULL, NULL, NULL),
(20303, 'Stone Quarry', NULL, NULL, NULL, NULL),
(20304, 'Grill and Gate Making', NULL, NULL, NULL, NULL),
(20305, 'Jhafri & Tiles Mfg    ', NULL, NULL, NULL, NULL),
(20306, 'PVC Pipe Making', NULL, NULL, NULL, NULL),
(20307, 'Grount Nut procecing', NULL, NULL, NULL, NULL),
(20308, 'Fly Ash Brick Manufacturing', NULL, NULL, NULL, NULL),
(20309, 'Solid & Hollow Bricks Mfg.', NULL, NULL, NULL, NULL),
(20310, 'Pen Manufacturing', NULL, NULL, NULL, NULL),
(20311, 'Candle manufacturing unit', NULL, NULL, NULL, NULL),
(20312, 'Battery Manufacturing Unit', NULL, NULL, NULL, NULL),
(20313, 'Mixture machine', NULL, NULL, NULL, NULL),
(20314, 'cake briqutte mfg', NULL, NULL, NULL, NULL),
(20315, 'Sola Pith ', NULL, NULL, NULL, NULL),
(20379, 'Ghee', NULL, NULL, NULL, NULL),
(20400, 'PACKAGING', NULL, NULL, NULL, NULL),
(20401, 'Poly Bag Making', NULL, NULL, NULL, NULL),
(20402, 'Polythene Product Manufaturing', NULL, NULL, NULL, NULL),
(20403, 'Making of Plastic Containers', NULL, NULL, NULL, NULL),
(20404, 'Gunny Bag Making', NULL, NULL, NULL, NULL),
(20405, 'Rope Making', NULL, NULL, NULL, NULL),
(20406, 'Musical Instrument ', NULL, NULL, NULL, NULL),
(20407, 'Fishing Hooks Mfg.', NULL, NULL, NULL, NULL),
(20500, 'FOOD PROCESSING', NULL, NULL, NULL, NULL),
(20501, 'Bakery', NULL, NULL, NULL, NULL),
(20502, 'Sweet Meat Shop', NULL, NULL, NULL, NULL),
(20503, 'Pickle/Condiment Making', NULL, NULL, NULL, NULL),
(20504, 'Pappad and Bori Making', NULL, NULL, NULL, NULL),
(20505, 'Flaked/Puffed Rice Mill', NULL, NULL, NULL, NULL),
(20506, 'Chanachur Making', NULL, NULL, NULL, NULL),
(20507, 'Condiment Preparation', NULL, NULL, NULL, NULL),
(20508, 'Ice Candy', NULL, NULL, NULL, NULL),
(20509, 'Cley Modeling', NULL, NULL, NULL, NULL),
(20510, 'Chowmin & Noodles Mfg', NULL, NULL, NULL, NULL),
(20511, 'Computer print,xerox&call cent', NULL, NULL, NULL, NULL),
(20512, 'Cottage Industry', NULL, NULL, NULL, NULL),
(20515, 'Sweet making', NULL, NULL, NULL, NULL),
(20516, 'Blanket Making', NULL, NULL, NULL, NULL),
(20517, 'Ice Cream Mfg', NULL, NULL, NULL, NULL),
(20523, 'saw mill', NULL, NULL, NULL, NULL),
(20555, 'Potato Chips Making', NULL, NULL, NULL, NULL),
(20565, 'Glass cutting & desing', NULL, NULL, NULL, NULL),
(20600, 'HOTEL & HOSPITALITY', NULL, NULL, NULL, NULL),
(20601, 'Hotel & Dhaba', NULL, NULL, NULL, NULL),
(20602, 'Tourist Resort & Cottage', NULL, NULL, NULL, NULL),
(20603, 'MOTEL', NULL, NULL, NULL, NULL),
(20604, 'Handicraft unit', NULL, NULL, NULL, NULL),
(20605, 'Hotel/Lodge', NULL, NULL, NULL, NULL),
(20606, 'hardware shop', NULL, NULL, NULL, NULL),
(20607, 'hosiery screen printing', NULL, NULL, NULL, NULL),
(20608, 's.c.c.y. n. f.', NULL, NULL, NULL, NULL),
(20700, 'TEXTILES & CLOTHING', NULL, NULL, NULL, NULL),
(20701, 'Readymade Garment', NULL, NULL, NULL, NULL),
(20702, 'Wool Knitting', NULL, NULL, NULL, NULL),
(20703, 'Hand Loom Unit', NULL, NULL, NULL, NULL),
(20704, 'Embroid n Saree(Kantha stitch)', NULL, NULL, NULL, NULL),
(20705, 'Jari Making', NULL, NULL, NULL, NULL),
(20706, 'Twisted Yarn Making', NULL, NULL, NULL, NULL),
(20707, 'Yarn Dyeing', NULL, NULL, NULL, NULL),
(20708, 'Powerloom Renovation', NULL, NULL, NULL, NULL),
(20709, 'Powerloom (New)', NULL, NULL, NULL, NULL),
(20710, 'Tailoring', NULL, NULL, NULL, NULL),
(20711, 'Ludo Manufacturing', NULL, NULL, NULL, NULL),
(20712, 'Cotton Product', NULL, NULL, NULL, NULL),
(20713, 'Mat Making Industries', NULL, NULL, NULL, NULL),
(20714, 'Silk saree Printing', NULL, NULL, NULL, NULL),
(20715, 'Dhupkathi Mfg. ', NULL, NULL, NULL, NULL),
(20716, 'Sheet Metal Fabrication', NULL, NULL, NULL, NULL),
(20719, 'Hosiery goods mfg. unit', NULL, NULL, NULL, NULL),
(20720, 'JCB Backhoe Loader', NULL, NULL, NULL, NULL),
(20722, 'p. l.', NULL, NULL, NULL, NULL),
(20777, 'Gura Masla', NULL, NULL, NULL, NULL),
(20799, 'Others', NULL, NULL, NULL, NULL),
(20800, 'PAPER & PAPER RELATED', NULL, NULL, NULL, NULL),
(20801, 'Printing Unit', NULL, NULL, NULL, NULL),
(20802, 'Publishing Unit', NULL, NULL, NULL, NULL),
(20803, 'Paper Roll Making Unit', NULL, NULL, NULL, NULL),
(20804, 'Photo Copying Centre / Binding', NULL, NULL, NULL, NULL),
(20805, 'S T D Booth & xerox machine', NULL, NULL, NULL, NULL),
(20832, 'watch repairing', NULL, NULL, NULL, NULL),
(20900, 'ELECTRICAL GOODS', NULL, NULL, NULL, NULL),
(20901, 'Making of Cells for Battery', NULL, NULL, NULL, NULL),
(20902, 'Making of Filaments for Bulbs', NULL, NULL, NULL, NULL),
(20903, 'Bulbs & Nightlamps', NULL, NULL, NULL, NULL),
(20905, 'Cable T V  operating', NULL, NULL, NULL, NULL),
(20906, 'Cement Product', NULL, NULL, NULL, NULL),
(20907, 'Cashewnut processing', NULL, NULL, NULL, NULL),
(20908, 'dimond cutting &polishing', NULL, NULL, NULL, NULL),
(20911, 'honey procesing', NULL, NULL, NULL, NULL),
(20912, 'nailpolish making & selling', NULL, NULL, NULL, NULL),
(20913, 'Jam & Jally', NULL, NULL, NULL, NULL),
(20914, 'nylon bag', NULL, NULL, NULL, NULL),
(20915, 'opthalmic lens', NULL, NULL, NULL, NULL),
(20916, 'fartiliser unit', NULL, NULL, NULL, NULL),
(21000, 'LEATHER GOODS', NULL, NULL, NULL, NULL),
(21001, 'Shoe Making', NULL, NULL, NULL, NULL),
(21002, 'Hand Bag Making', NULL, NULL, NULL, NULL),
(21003, 'Gloves & Vests', NULL, NULL, NULL, NULL),
(21004, 'Electric transformer repairing', NULL, NULL, NULL, NULL),
(21005, 'Electric motor workshop unit', NULL, NULL, NULL, NULL),
(21006, 'Excavator', NULL, NULL, NULL, NULL),
(21011, 'XEROX MACHINE', NULL, NULL, NULL, NULL),
(21012, 'Blacksmithy workshop', NULL, NULL, NULL, NULL),
(21013, 'Fiber tape mfg. unit', NULL, NULL, NULL, NULL),
(21014, 'Bus/truck repair & body build.', NULL, NULL, NULL, NULL),
(21015, 'Cyber Cafe', NULL, NULL, NULL, NULL),
(21016, 'lac shellac', NULL, NULL, NULL, NULL),
(21017, 'Mustard oil& oil cake mfg unit', NULL, NULL, NULL, NULL),
(21018, 'Bamboo stick works', NULL, NULL, NULL, NULL),
(21019, 'Husking mill', NULL, NULL, NULL, NULL),
(21020, 'Fibre Goods Mfg. Unit', NULL, NULL, NULL, NULL),
(21021, 'Manufacturing steel Furniture', NULL, NULL, NULL, NULL),
(21022, 'Kantha Stich Saree Making', NULL, NULL, NULL, NULL),
(21023, 'Paints & Primer Mfg. Unit', NULL, NULL, NULL, NULL),
(21024, 'Zori embroidery unit', NULL, NULL, NULL, NULL),
(21025, 'Oil Pestal Colour Making', NULL, NULL, NULL, NULL),
(21026, 'Rice & flour Mill', NULL, NULL, NULL, NULL),
(21027, 'Ball Pen Mfg. unit', NULL, NULL, NULL, NULL),
(21028, 'Electric Ceiling Fan Assemblin', NULL, NULL, NULL, NULL),
(21029, 'Stabilizer & Inverter Charger', NULL, NULL, NULL, NULL),
(21030, 'Fish Meal Industry', NULL, NULL, NULL, NULL),
(21031, 'Conch product', NULL, NULL, NULL, NULL),
(21032, 'Computor unit', NULL, NULL, NULL, NULL),
(21033, 'Mfg. of homoeopathic globules', NULL, NULL, NULL, NULL),
(21034, 'Terra cotta toy mfg.', NULL, NULL, NULL, NULL),
(21035, 'Coir & speaker mfg.', NULL, NULL, NULL, NULL),
(21036, 'Cycle hub brush mfg.', NULL, NULL, NULL, NULL),
(21037, 'MARKET YARDS', NULL, NULL, NULL, NULL),
(21039, 'Radio Repairing etc. ', NULL, NULL, NULL, NULL),
(21040, 'Jute manufacturing', NULL, NULL, NULL, NULL),
(21042, 'Decorators', NULL, NULL, NULL, NULL),
(21043, 'X- RAY. CENTER.&digonesis cen.', NULL, NULL, NULL, NULL),
(21048, 'lather manufacturing', NULL, NULL, NULL, NULL),
(21101, 'Nursing Home', NULL, NULL, NULL, NULL),
(21102, 'Pathological Lab/ USG D MACHIN', NULL, NULL, NULL, NULL),
(21103, 'Medical Clinic', NULL, NULL, NULL, NULL),
(21104, 'Bandage Roll Making', NULL, NULL, NULL, NULL),
(21105, 'Glowsign / signboard', NULL, NULL, NULL, NULL),
(21106, 'Foam Bag Making', NULL, NULL, NULL, NULL),
(21107, 'Voltage stabilizer', NULL, NULL, NULL, NULL),
(21108, 'Freeze/refrigerator', NULL, NULL, NULL, NULL),
(21119, 'Lozence making', NULL, NULL, NULL, NULL),
(21200, 'WOOD PRODUCTS', NULL, NULL, NULL, NULL),
(21201, 'Making of Frames for Pictures', NULL, NULL, NULL, NULL),
(21202, 'Wooden Furniture Making', NULL, NULL, NULL, NULL),
(21203, 'Sankha Making', NULL, NULL, NULL, NULL),
(21204, 'Salpata Thala & Bati Making', NULL, NULL, NULL, NULL),
(21205, 'Palm leaf Fan unit', NULL, NULL, NULL, NULL),
(21206, 'Welding Work', NULL, NULL, NULL, NULL),
(21209, 'REPIRING SHOP', NULL, NULL, NULL, NULL),
(21212, 'Interior Decoration', NULL, NULL, NULL, NULL),
(21225, 'wheeler damper', NULL, NULL, NULL, NULL),
(21230, 'bangaes', NULL, NULL, NULL, NULL),
(21231, 'bangles', NULL, NULL, NULL, NULL),
(21299, 'Drum,Box Mfg. Unit', NULL, NULL, NULL, NULL),
(21300, 'MANUFACTURING UNITS', NULL, NULL, NULL, NULL),
(21301, 'Ice Plant', NULL, NULL, NULL, NULL),
(21302, 'Milk Chilling Plants', NULL, NULL, NULL, NULL),
(21303, 'Sericulture Equipments', NULL, NULL, NULL, NULL),
(21304, 'Mechanical Job Work', NULL, NULL, NULL, NULL),
(21305, 'Lathe Machine for Job Works', NULL, NULL, NULL, NULL),
(21306, 'Pottery', NULL, NULL, NULL, NULL),
(21307, 'Coke/Soft Coke Brequttee', NULL, NULL, NULL, NULL),
(21308, 'Cold Drinks( Aerated Water)', NULL, NULL, NULL, NULL),
(21309, 'Milk Product', NULL, NULL, NULL, NULL),
(21310, 'Ply Board Manufacturing', NULL, NULL, NULL, NULL),
(21311, 'Saree Manufacturing', NULL, NULL, NULL, NULL),
(21399, 'Others', NULL, NULL, NULL, NULL),
(21400, 'SERVICING UNITS', NULL, NULL, NULL, NULL),
(21401, 'Cycle/Cycle Riksaw Van( R + S)', NULL, NULL, NULL, NULL),
(21402, 'T V/ Radio/ Tape( R + S)', NULL, NULL, NULL, NULL),
(21403, 'Data Processing & S/W Develop.', NULL, NULL, NULL, NULL),
(21404, 'Printing inks mfg.', NULL, NULL, NULL, NULL),
(21405, 'Paddy Husking/ wheat Grinding', NULL, NULL, NULL, NULL),
(21406, 'Utensil mfg. unit', NULL, NULL, NULL, NULL),
(21407, 'Boat making', NULL, NULL, NULL, NULL),
(21408, 'Smoke testing centre', NULL, NULL, NULL, NULL),
(21409, 'Laundry', NULL, NULL, NULL, NULL),
(21410, 'Truck R & S', NULL, NULL, NULL, NULL),
(21411, 'Trank, school box Mfg', NULL, NULL, NULL, NULL),
(21412, 'tiny sector', NULL, NULL, NULL, NULL),
(21517, 'Book Product', NULL, NULL, NULL, NULL),
(21562, 'bori makling', NULL, NULL, NULL, NULL),
(21679, 'tyre retreading & resoling', NULL, NULL, NULL, NULL),
(22105, 'rewinding motor', NULL, NULL, NULL, NULL),
(22229, 'Vedio Camera', NULL, NULL, NULL, NULL),
(22230, 'vedio hall', NULL, NULL, NULL, NULL),
(22302, 'tractor comarcial', NULL, NULL, NULL, NULL),
(22315, 'belt pest crasher', NULL, NULL, NULL, NULL),
(22505, 'Betel-Nut Processing', NULL, NULL, NULL, NULL),
(22506, 'Offset Printing', NULL, NULL, NULL, NULL),
(25601, 'AQuariam business', NULL, NULL, NULL, NULL),
(27789, 'Embroidary', NULL, NULL, NULL, NULL),
(27930, 'Distilled Water Mfg', NULL, NULL, NULL, NULL),
(27988, 'School Building', NULL, NULL, NULL, NULL),
(28640, 'BELL& BRASH METAL ROLLING MILL', NULL, NULL, NULL, NULL),
(29098, 'MARKATING COMPLEX', NULL, NULL, NULL, NULL),
(29900, 'OTHERS', NULL, NULL, NULL, NULL),
(29901, 'Thermocol Design Making', NULL, NULL, NULL, NULL),
(29902, 'Detergent Soap Making', NULL, NULL, NULL, NULL),
(29903, 'Silver Ornament Making', NULL, NULL, NULL, NULL),
(29904, 'Shuttle Cock Making', NULL, NULL, NULL, NULL),
(29905, 'Pesticide Preparation', NULL, NULL, NULL, NULL),
(29906, 'Broom Stick Making Unit', NULL, NULL, NULL, NULL),
(29907, 'Mosquito Net Making Unit', NULL, NULL, NULL, NULL),
(29908, 'Agar Bati Making', NULL, NULL, NULL, NULL),
(29909, 'Biri Making', NULL, NULL, NULL, NULL),
(29910, 'Computer Optical Lens Prep.', NULL, NULL, NULL, NULL),
(29911, 'Steel Almirah Making', NULL, NULL, NULL, NULL),
(29912, 'Chira Mill', NULL, NULL, NULL, NULL),
(29913, 'Eng. Job WOrks', NULL, NULL, NULL, NULL),
(29914, 'Alluminium product', NULL, NULL, NULL, NULL),
(29915, 'Telephone Booth/Fax Machine', NULL, NULL, NULL, NULL),
(29919, 'Steel furniture making', NULL, NULL, NULL, NULL),
(29920, 'Storage battery Assembling', NULL, NULL, NULL, NULL),
(29921, 'Plastic churi/pala making', NULL, NULL, NULL, NULL),
(29922, 'Surgical Instruments', NULL, NULL, NULL, NULL),
(29923, 'small business SHG', NULL, NULL, NULL, NULL),
(29924, 'RUBBER INDUSTRIES ', NULL, NULL, NULL, NULL),
(29925, 'j.l.g.small business', NULL, NULL, NULL, NULL),
(29926, 'Grill & Lathe Works', NULL, NULL, NULL, NULL),
(30101, 'House Construction', NULL, NULL, NULL, NULL),
(30102, 'Flat Construction', NULL, NULL, NULL, NULL),
(30106, 'house renovasion & repair', NULL, NULL, NULL, NULL),
(30201, 'House Purchase', NULL, NULL, NULL, NULL),
(30202, 'Flat Purchase', NULL, NULL, NULL, NULL),
(30301, 'House Extension', NULL, NULL, NULL, NULL),
(30302, 'Flat Extension', NULL, NULL, NULL, NULL),
(30303, 'Repair', NULL, NULL, NULL, NULL),
(30400, 'Radio Repairing etc.', NULL, NULL, NULL, NULL),
(30401, 'House Repair', NULL, NULL, NULL, NULL),
(30402, 'Flat Repair', NULL, NULL, NULL, NULL),
(30500, 'UPGRADATION', NULL, NULL, NULL, NULL),
(30501, 'House Upgradation', NULL, NULL, NULL, NULL),
(30502, 'Flat Upgradation', NULL, NULL, NULL, NULL),
(30601, 'House Contrn.(Commercial)', NULL, NULL, NULL, NULL),
(40300, 'GODOWN, L.p.G.', NULL, NULL, NULL, NULL),
(49902, 'Cycle hub brush mfg.', NULL, NULL, NULL, NULL),
(49906, 'Computor unit', NULL, NULL, NULL, NULL),
(49909, 'XEROX MACHINE', NULL, NULL, NULL, NULL),
(49910, 'Blacksmithy workshop', NULL, NULL, NULL, NULL),
(49915, 'Cyber Cafe', NULL, NULL, NULL, NULL),
(49916, 'lac shellac', NULL, NULL, NULL, NULL),
(49917, 'Mustard oil& oil cake mfg unit', NULL, NULL, NULL, NULL),
(49918, 'Bamboo stick works', NULL, NULL, NULL, NULL),
(49919, 'Dry Land Farming', NULL, NULL, NULL, NULL),
(49920, 'Husking mill', NULL, NULL, NULL, NULL),
(49921, 'Fibre Goods Mfg. Unit', NULL, NULL, NULL, NULL),
(49922, 'Manufacturing steel Furniture', NULL, NULL, NULL, NULL),
(49924, 'Paints & Primer Mfg. Unit', NULL, NULL, NULL, NULL),
(49925, 'Zori embroidery unit', NULL, NULL, NULL, NULL),
(49927, 'Rice & flour Mill', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `md_report_type`
--

CREATE TABLE `md_report_type` (
  `sl_no` int(11) NOT NULL,
  `report_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `md_report_type`
--

INSERT INTO `md_report_type` (`sl_no`, `report_type`) VALUES
(1, 'Consolidated'),
(2, 'Nab Farm'),
(3, 'Nab Non Farm'),
(4, 'SHG'),
(5, 'Rural Housing NHB'),
(6, 'Rural Housing NAB');

-- --------------------------------------------------------

--
-- Table structure for table `md_sector`
--

CREATE TABLE `md_sector` (
  `sector_code` int(10) NOT NULL,
  `sector_name` varchar(100) NOT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_dt` datetime DEFAULT current_timestamp(),
  `modified_by` varchar(50) DEFAULT NULL,
  `modified_dt` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `md_sector`
--

INSERT INTO `md_sector` (`sector_code`, `sector_name`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(10, 'Farm', 'NA', '2020-12-16 00:00:00', 'NA', '2020-12-16 00:00:00'),
(11, 'Farm Dep. Fund', 'NA', '2020-12-17 00:00:00', 'NA', '2020-12-17 00:00:00'),
(12, 'NORMAL F-NABARD', 'NA', '2020-12-18 00:00:00', 'NA', '2020-12-18 00:00:00'),
(13, 'FARM NABARD', 'NA', '2020-12-19 00:00:00', 'NA', '2020-12-19 00:00:00'),
(14, 'JLG ', 'NA', '2020-12-20 00:00:00', 'NA', '2020-12-20 00:00:00'),
(15, 'ST(SAO)FARM-NAB', 'NA', '2020-12-21 00:00:00', 'NA', '2020-12-21 00:00:00'),
(20, 'Non Farm', 'NA', '2020-12-22 00:00:00', 'NA', '2020-12-22 00:00:00'),
(22, 'NF NABARD', 'NA', '2020-12-23 00:00:00', 'NA', '2020-12-23 00:00:00'),
(23, 'SHG ', 'NA', '2020-12-24 00:00:00', 'NA', '2020-12-24 00:00:00'),
(30, 'Housing', 'NA', '2020-12-25 00:00:00', 'NA', '2020-12-25 00:00:00'),
(31, 'Deposit Fund', 'NA', '2020-12-26 00:00:00', 'NA', '2020-12-26 00:00:00'),
(32, 'NHB', 'NA', '2020-12-27 00:00:00', 'NA', '2020-12-27 00:00:00'),
(33, 'HUDCO', 'NA', '2020-12-28 00:00:00', 'NA', '2020-12-28 00:00:00'),
(34, 'RH NABARD', 'NA', '2020-12-29 00:00:00', 'NA', '2020-12-29 00:00:00'),
(40, 'Infrastructure', 'NA', '2020-12-30 00:00:00', 'NA', '2020-12-30 00:00:00'),
(41, 'NCDC', 'NA', '2020-12-31 00:00:00', 'NA', '2020-12-31 00:00:00'),
(50, 'Consumer Loan', 'NA', '2021-01-01 00:00:00', 'NA', '2021-01-01 00:00:00'),
(51, 'Deposit Fund', 'NA', '2021-01-02 00:00:00', 'NA', '2021-01-02 00:00:00'),
(52, 'personal loan', 'NA', '2021-01-03 00:00:00', 'NA', '2021-01-03 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `md_users`
--

CREATE TABLE `md_users` (
  `user_id` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` char(1) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `designation` varchar(50) DEFAULT NULL,
  `br_id` int(5) DEFAULT NULL,
  `user_status` char(1) NOT NULL DEFAULT 'A',
  `remarks` varchar(50) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_dt` datetime DEFAULT NULL,
  `modified_by` varchar(50) DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `md_users`
--

INSERT INTO `md_users` (`user_id`, `password`, `user_type`, `user_name`, `designation`, `br_id`, `user_status`, `remarks`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
('admin_wbscardb', '$2y$10$4FZAmYG5PDOVcvmLxhrrq.l13BXdzB1JrYxpgrNABx9x5EGXXlrU6', 'A', 'WBSCARDB ADMIN', NULL, 0, 'A', NULL, 'subham', '2021-02-09 02:01:01', NULL, NULL),
('ajay@123', '$2y$10$4l3G1f8JrRaNepxwXlcYTOBBOWu1NtGfHqZPsTlpbMh0A6y7y5lJa', 'P', 'Ajay Gupta', 'Manager-in-Charge', 32, 'A', NULL, 'subash_slg', '2021-02-10 06:23:17', NULL, NULL),
('alipurduar', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'U', 'ALIPURDUAR USER', NULL, 7, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('alipurduar_a1', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'P', 'ALIPURDUAR Approver L1', NULL, 7, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('alipurduar_a2', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'V', 'ALIPURDUAR Approver L2', NULL, 7, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('app1_sss', '$2y$10$l.7yUKmCrB/C5Sd/J4/TF.C7JDTI/pVCJAatAVUgcsmT5TSESa1q6', 'P', 'Approver L1', NULL, 33, 'A', '', 'Synergic', '2020-06-22 02:03:20', 'sss', '2021-01-05 08:19:10'),
('app2_sss', '$2y$10$0vG1EmAnRRf7yU60R99Ive18lL6bmn6mAlYdDtPkwAih0NLNRHSvG', 'V', 'Approver 2', NULL, 33, 'A', '', 'Synergic', '2020-06-22 02:03:20', NULL, NULL),
('arambagh', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'U', 'ARAMBAGH USER', NULL, 19, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('arambagh_a1', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'P', 'ARAMBAGH Approver L1', NULL, 19, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('arambagh_a2', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'V', 'ARAMBAGH Approver L2', NULL, 19, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('bankura', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'U', 'BANKURA USER', NULL, 22, 'A', '', 'Synergic', '2020-06-22 02:05:28', NULL, NULL),
('bankura_a1', '$2y$10$l.7yUKmCrB/C5Sd/J4/TF.C7JDTI/pVCJAatAVUgcsmT5TSESa1q6', 'P', 'Approver L1', NULL, 22, 'A', '', 'Synergic', '2020-06-22 02:03:20', 'sss', '2021-01-05 08:19:10'),
('bankura_a2', '$2y$10$0vG1EmAnRRf7yU60R99Ive18lL6bmn6mAlYdDtPkwAih0NLNRHSvG', 'V', 'Burdwan ARDB', NULL, 22, 'A', '', 'Synergic', '2020-06-22 02:03:20', NULL, NULL),
('birbhum', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'U', 'BIRBHUM USER', NULL, 20, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('birbhum_a1', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'P', 'BIRBHUM Approver L1', NULL, 20, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('birbhum_a2', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'V', 'BIRBHUM Approver L2', NULL, 20, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('burdwan', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'U', 'BURDWAN USER', NULL, 26, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('burdwan_a1', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'P', 'BURDWAN Approver L1', NULL, 26, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('burdwan_a2', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'V', 'BURDWAN Approver L2', NULL, 26, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('contai', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'U', 'CONTAI USER', NULL, 2, 'A', '', 'Synergic', '2020-06-22 02:05:28', NULL, NULL),
('contai_a1', '$2y$10$l.7yUKmCrB/C5Sd/J4/TF.C7JDTI/pVCJAatAVUgcsmT5TSESa1q6', 'P', 'Approver L1', NULL, 2, 'A', '', 'Synergic', '2020-06-22 02:03:20', 'sss', '2021-01-05 08:19:10'),
('contai_a2', '$2y$10$0vG1EmAnRRf7yU60R99Ive18lL6bmn6mAlYdDtPkwAih0NLNRHSvG', 'V', 'CONTAI ARDB', NULL, 2, 'A', '', 'Synergic', '2020-06-22 02:03:20', NULL, NULL),
('coochbehar', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'U', 'COOCHBEHAR USER', NULL, 9, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('coochbehar_a1', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'P', 'COOCHBEHAR Approver L1', NULL, 9, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('coochbehar_a2', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'V', 'COOCHBEHAR Approver L2', NULL, 9, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('dakshin', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'U', 'DAKSHIN USER', NULL, 10, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('dakshin_a1', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'P', 'DAKSHIN Approver L1', NULL, 10, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('dakshin_a2', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'V', 'DAKSHIN Approver L2', NULL, 10, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('gagan@123', '$10$2M2/PtFSGHwRjTsLGUtgNOZy..5CD46BFkczinZ2Orhi/CKqr0t/a', 'P', 'Gagan Thapa', 'Manager', 32, 'A', NULL, 'subash_slg', '2021-02-10 06:25:20', NULL, NULL),
('ghatal', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'U', 'GHATAL USER', NULL, 4, 'A', '', 'Synergic', '2020-06-22 02:05:28', NULL, NULL),
('ghatal_a1', '$2y$10$l.7yUKmCrB/C5Sd/J4/TF.C7JDTI/pVCJAatAVUgcsmT5TSESa1q6', 'P', 'Approver L1', NULL, 4, 'A', '', 'Synergic', '2020-06-22 02:03:20', 'sss', '2021-01-05 08:19:10'),
('ghatal_a2', '$2y$10$0vG1EmAnRRf7yU60R99Ive18lL6bmn6mAlYdDtPkwAih0NLNRHSvG', 'V', 'GHATAL ARDB', NULL, 4, 'A', '', 'Synergic', '2020-06-22 02:03:20', NULL, NULL),
('hooghly', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'U', 'HOOGHLY USER', NULL, 18, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('hooghly_a1', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'P', 'HOOGHLY Approver L1', NULL, 18, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('hooghly_a2', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'V', 'HOOGHLY Approver L2', NULL, 18, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('howrah', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'U', 'HOWRAH USER', NULL, 23, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('howrah_a1', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'P', 'HOWRAH Approver L1', NULL, 23, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('howrah_a2', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'V', 'HOWRAH Approver L2', NULL, 23, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('jalpaiguri', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'U', 'JALPAIGURI USER', NULL, 8, 'A', '', 'Synergic', '2020-06-22 02:05:28', NULL, NULL),
('jalpaiguri_a1', '$2y$10$l.7yUKmCrB/C5Sd/J4/TF.C7JDTI/pVCJAatAVUgcsmT5TSESa1q6', 'P', 'Approver L1', NULL, 8, 'A', '', 'Synergic', '2020-06-22 02:03:20', 'sss', '2021-01-05 08:19:10'),
('jalpaiguri_a2', '$2y$10$0vG1EmAnRRf7yU60R99Ive18lL6bmn6mAlYdDtPkwAih0NLNRHSvG', 'V', 'JALPAIGURI ARDB', NULL, 8, 'A', '', 'Synergic', '2020-06-22 02:03:20', NULL, NULL),
('jhargram', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'U', 'JHARGRAM USER', NULL, 5, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('jhargram_a1', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'P', 'JHARGRAM Approver L1', NULL, 5, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('jhargram_a2', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'V', 'JHARGRAM Approver L2', NULL, 5, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('kandi', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'U', 'KANDI USER', NULL, 16, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('kandi_a1', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'P', 'KANDI Approver L1', NULL, 16, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('kandi_a2', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'V', 'KANDI Approver L2', NULL, 16, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('katwa_kalna', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'U', 'KATWA KALNA USER', NULL, 25, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('katwa_kalna_a1', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'P', 'KATWA KALNA Approver L1', NULL, 25, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('katwa_kalna_a2', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'V', 'KATWA KALNA Approver L2', NULL, 25, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('malda', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'U', 'MALDA USER', NULL, 12, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('malda_a1', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'P', 'MALDA Approver L1', NULL, 12, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('malda_a2', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'V', 'MALDA Approver L2', NULL, 12, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('midnapore', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'U', 'MIDNAPORE USER', NULL, 6, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('midnapore_a1', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'P', 'MIDNAPORE Approver L1', NULL, 6, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('midnapore_a2', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'V', 'MIDNAPORE Approver L2', NULL, 6, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('murshidabad', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'U', 'MURSHIDABAD USER', NULL, 17, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('murshidabad_a1', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'P', 'MURSHIDABAD Approver L1', NULL, 17, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('murshidabad_a2', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'V', 'MURSHIDABAD Approver L2', NULL, 17, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('nadia', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'U', 'NADIA USER', NULL, 24, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('nadia_a1', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'P', 'NADIA Approver L1', NULL, 24, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('nadia_a2', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'V', 'NADIA Approver L2', NULL, 24, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('north_24', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'U', 'NORTH 24 USER', NULL, 15, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('north_24_a1', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'P', 'NORTH 24 Approver L1', NULL, 15, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('north_24_a2', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'V', 'NORTH 24 Approver L2', NULL, 15, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('pallab_bdn', '$2y$10$etjXfCgDHFUN29gCt3BNSOguwQpyE/5LQriK0n3YmwTyV2ks1le7O', 'U', 'Pallab Mohanta', 'Field Supervisor', 26, 'A', NULL, 'subal_bdn', '2021-02-10 06:43:03', NULL, NULL),
('raiganj', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'U', 'RAIGANJ USER', NULL, 11, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('raiganj_a1', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'P', 'RAIGANJ Approver L1', NULL, 11, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('raiganj_a2', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'V', 'RAIGANJ Approver L2', NULL, 11, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('rampurhat', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'U', 'RAMPURHAT USER', NULL, 21, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('rampurhat_a1', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'P', 'RAMPURHAT Approver L1', NULL, 21, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('rampurhat_a2', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'V', 'RAMPURHAT Approver L2', NULL, 21, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('siliguri', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'U', 'SILIGURI USER', NULL, 32, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('siliguri_a1', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'P', 'SILIGURI Approver L1', NULL, 32, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('siliguri_a2', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'V', 'SILIGURI Approver L2', NULL, 32, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('somindranath@123', '$10$AYaeVP.rOyOpJ9MPp0w38.MEA9GwzvM1mWf/z.jQmwks7ZlfDW64.', 'U', 'Somindranath Palchoudhary', 'Assistant', 32, 'A', NULL, 'subash_slg', '2021-02-10 06:28:39', NULL, NULL),
('south_24', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'U', 'SOUTH 24 USER', NULL, 1, 'A', '', 'Synergic', '2020-06-22 02:05:28', NULL, NULL),
('south_24_a1', '$2y$10$l.7yUKmCrB/C5Sd/J4/TF.C7JDTI/pVCJAatAVUgcsmT5TSESa1q6', 'P', 'Approver L1', NULL, 1, 'A', '', 'Synergic', '2020-06-22 02:03:20', 'sss', '2021-01-05 08:19:10'),
('south_24_a2', '$2y$10$0vG1EmAnRRf7yU60R99Ive18lL6bmn6mAlYdDtPkwAih0NLNRHSvG', 'V', 'SOUTH 24 ARDB', NULL, 1, 'A', '', 'Synergic', '2020-06-22 02:03:20', NULL, NULL),
('sss_a1', '$2y$10$iumxF5civQAQyQpnEnm8peg1lkm0iNgAw7Xw4HlteHRw2vMS8wy4y', 'P', 'WBSCARDB APPROVER 1', NULL, 0, 'A', '', 'tan', '2019-01-16 02:01:01', NULL, NULL),
('sss_a2', '$2y$10$iumxF5civQAQyQpnEnm8peg1lkm0iNgAw7Xw4HlteHRw2vMS8wy4y', 'V', 'WBSCARDB APPROVER 2', NULL, 0, 'A', '', 'tan', '2019-01-16 02:01:01', NULL, NULL),
('sss_r', '$2y$10$iumxF5civQAQyQpnEnm8peg1lkm0iNgAw7Xw4HlteHRw2vMS8wy4y', 'R', 'Document Receiver', NULL, 0, 'A', '', 'tan', '2019-01-16 02:01:01', NULL, NULL),
('sss_u', '$2y$10$iumxF5civQAQyQpnEnm8peg1lkm0iNgAw7Xw4HlteHRw2vMS8wy4y', 'U', 'WBSCARDB USER', NULL, 0, 'A', '', 'tan', '2019-01-16 02:01:01', NULL, NULL),
('subal_bdn', '$2y$10$qnND1K3bIo.DtQpEkS0PA.ka5uEP4d/14qfnBd5gOlu7Q0bBkAZg2', 'P', 'Subal Mazumdar', 'Accountant', 26, 'A', NULL, 'WBSCARDB ADMIN', '2021-02-10 05:26:25', NULL, NULL),
('subash_slg', '$2y$10$.mXJLM/jFbHUXPFVwp4zYeM1YUPmBPlYUal9uwBwRzmMLSgNwgmsW', 'V', 'Subash Chhetri', 'District Manager', 32, 'A', NULL, 'WBSCARDB ADMIN', '2021-02-10 05:33:35', NULL, NULL),
('tamluk', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'U', 'TAMLUK USER', NULL, 3, 'A', '', 'Synergic', '2020-06-22 02:05:28', NULL, NULL),
('tamluk_a1', '$2y$10$l.7yUKmCrB/C5Sd/J4/TF.C7JDTI/pVCJAatAVUgcsmT5TSESa1q6', 'P', 'Approver L1', NULL, 3, 'A', '', 'Synergic', '2020-06-22 02:03:20', 'sss', '2021-01-05 08:19:10'),
('tamluk_a2', '$2y$10$0vG1EmAnRRf7yU60R99Ive18lL6bmn6mAlYdDtPkwAih0NLNRHSvG', 'V', 'TAMLUK ARDB', NULL, 3, 'A', '', 'Synergic', '2020-06-22 02:03:20', NULL, NULL),
('u_sss', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'U', 'USER', NULL, 33, 'A', '', 'Synergic', '2020-06-22 02:05:28', NULL, NULL),
('wbscardb_asonsol', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'U', 'WBSCARDB ASONSOL USER', NULL, 29, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('wbscardb_asonsol_a1', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'P', 'WBSCARDB ASONSOL Approver L1', NULL, 29, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('wbscardb_asonsol_a2', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'V', 'WBSCARDB ASONSOL Approver L2', NULL, 29, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('wbscardb_darjeeling', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'U', 'WBSCARDB Darjeeling USER', NULL, 13, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('wbscardb_darjeeling_a1', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'P', 'WBSCARDB  Approver L1', NULL, 13, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('wbscardb_darjeeling_a2', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'V', 'WBSCARDB  Approver L2', NULL, 13, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('wbscardb_purulia', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'U', 'WBSCARDB PURULIA USER', NULL, 27, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('wbscardb_purulia_a1', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'P', 'WBSCARDB PURULIA Approver L1', NULL, 27, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('wbscardb_purulia_a2', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'V', 'WBSCARDB PURULIA Approver L2', NULL, 27, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('wbscardb_regional', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'U', 'WBSCARDB REGIONAL USER', NULL, 14, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('wbscardb_regional_a1', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'P', 'WBSCARDB REGIONAL Approver L1', NULL, 14, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('wbscardb_regional_a2', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'V', 'WBSCARDB REGIONAL Approver L2', NULL, 14, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('wbscardb_ultadanga', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'U', 'WBSCARDB ULTADANGA USER', NULL, 31, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('wbscardb_ultadanga_a1', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'P', 'WBSCARDB ULTADANGA Approver L1', NULL, 31, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL),
('wbscardb_ultadanga_a2', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'V', 'WBSCARDB ULTADANGA Approver L2', NULL, 31, 'A', NULL, 'Synergic', '2021-09-03 10:09:43', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mm_ardb_ho`
--

CREATE TABLE `mm_ardb_ho` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `ph_no` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `dist` int(1) NOT NULL,
  `no_of_users` int(11) NOT NULL,
  `no_of_approvers` int(11) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_by` varchar(50) NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mm_ardb_ho`
--

INSERT INTO `mm_ardb_ho` (`id`, `name`, `address`, `ph_no`, `email`, `dist`, `no_of_users`, `no_of_approvers`, `created_by`, `created_at`, `modified_by`, `modified_at`) VALUES
(0, 'WBSCARDB(Kolkata)', '25- D, Shakespeare Sarani, Calcutta-700 017', '', '', 42, 0, 0, '', '2020-12-16 09:40:36', '', '2020-12-16 09:40:36'),
(1, 'South 24 Parganas ARDB Ltd.', '21/1/d, Ballygung Station Road, Calcutta - 700 019', '', '', 304, 0, 0, '', '2020-12-16 09:40:36', '', '2020-12-16 09:40:36'),
(2, 'Contai ARDB Ltd.', 'P.O. Contai, Dist. Midnapore', '', '', 317, 0, 0, '', '2020-12-16 09:40:36', '', '2020-12-16 09:40:36'),
(3, 'Tamluk ARDB Ltd.', 'P.O. Tamluk, Dist. Midnapore', '', '', 317, 8, 2, '2021-01-07 12:10:53', '2020-12-16 09:40:36', '2021-01-07 12:10:53', '2020-12-16 09:40:36'),
(4, 'Ghatal ARDB Ltd.', 'P.O. Ghatal, Dist. Midnapore', '', '', 318, 0, 0, '', '2020-12-16 09:40:36', '', '2020-12-16 09:40:36'),
(5, 'Jhargram ARDB Ltd.', 'P.O. Jhargram, Dist. Midnapore', '', '', 703, 0, 0, '', '2020-12-16 09:40:36', '', '2020-12-16 09:40:36'),
(6, 'Midnapore ARDB Ltd.', 'P.O. & Dist. Midnapore', '', '', 318, 0, 0, '', '2020-12-16 09:40:36', '', '2020-12-16 09:40:36'),
(7, 'Alipurduar ARDB Ltd.', 'P.O. Alipurduar, Dist. Jalpaiguri', '', '', 664, 0, 0, '', '2020-12-16 09:40:36', '', '2020-12-16 09:40:36'),
(8, 'Jalpaiguri ARDB Ltd.', 'P.O. &Dist. Jalpaiguri', '', '', 314, 0, 0, '', '2020-12-16 09:40:36', '', '2020-12-16 09:40:36'),
(9, 'Coochbehar ARDB Ltd.', 'P.O. &Dist. Coochbehar', '', '', 308, 0, 0, '', '2020-12-16 09:40:36', '', '2020-12-16 09:40:36'),
(10, 'Dakshin Dinajpur ARDB Ltd.', 'P.O. Balurghat, Dist. Dk. Dinajpur', '', '', 310, 0, 0, '', '2020-12-16 09:40:36', '', '2020-12-16 09:40:36'),
(11, 'Raiganj ARDB Ltd.', 'P.O. Raigunj, Dist. Uttar Dinajpur', '', '', 311, 0, 0, '', '2020-12-16 09:40:36', '', '2020-12-16 09:40:36'),
(12, 'Malda ARDB Ltd.', 'Rabindra Avenue, P.O. & Dist. Malda', '', '', 316, 0, 0, '', '2020-12-16 09:40:36', '', '2020-12-16 09:40:36'),
(13, 'WBSCARDB( Reg. Off. Darjeeling)', '2/F,Lower Beech Wood Est.,P.O. & Dist. Darjeeling', '', '', 37, 0, 0, '', '2020-12-16 09:40:36', '', '2020-12-16 09:40:36'),
(14, 'WBSCARDB(Regional Office Siliguri)', 'Sarat Bose Road/Hakimpara, P.O. & Dist. Darjeeling', '', '', 37, 0, 0, '', '2020-12-16 09:40:36', '', '2020-12-16 09:40:36'),
(15, 'North 24 Parganas ARDB Ltd.', '39,K.N.C. Road, P.O. Barasat, Dist. 24 Pgs(N)', '', '', 303, 0, 0, '', '2020-12-16 09:40:36', '', '2020-12-16 09:40:36'),
(16, 'Kandi ARDB Ltd.', 'P.O. Kandi,Dist. Murshidabad', '', '', 319, 0, 0, '', '2020-12-16 09:40:36', '', '2020-12-16 09:40:36'),
(17, 'Murshidabad ARDB Ltd.', 'P.O.Berhampore, Dist. Murshidabad', '', '', 319, 0, 0, '', '2020-12-16 09:40:36', '', '2020-12-16 09:40:36'),
(18, 'Hooghly ARDB Ltd.', 'P.O. Chinsurah, Dist. Hoogly', '', '', 312, 0, 0, '', '2020-12-16 09:40:36', '', '2020-12-16 09:40:36'),
(19, 'Arambagh ARDB Ltd.', 'P.O. Arambagh, Dist. Hoogly', '', '', 312, 0, 0, '', '2020-12-16 09:40:36', '', '2020-12-16 09:40:36'),
(20, 'Birbhum ARDB Ltd.', 'P.O. Suri,Dist. Birbhum', '', '', 307, 0, 0, '', '2020-12-16 09:40:36', '', '2020-12-16 09:40:36'),
(21, 'Rampurhat ARDB Ltd.', 'P.O. Rampurhat, Dist. Birbhum', '', '', 307, 0, 0, '', '2020-12-16 09:40:36', '', '2020-12-16 09:40:36'),
(22, 'Bankura ARDB Ltd.', 'Rampur/Manohartala, P.O. & Dist. Bankura', '', '', 305, 0, 0, '', '2020-12-16 09:40:36', '', '2020-12-16 09:40:36'),
(23, 'Howrah ARDB Ltd.', 'P.O. Ulberia, Dist. Howrah', '', '', 313, 0, 0, '', '2020-12-16 09:40:36', '', '2020-12-16 09:40:36'),
(24, 'Nadia ARDB Ltd.', 'P.O. Krishna Nagar, Dist. Nadia', '', '', 320, 0, 0, '', '2020-12-16 09:40:36', '', '2020-12-16 09:40:36'),
(25, 'Katwa-Kalna ARDB Ltd.', 'P.O.Katwa, Dist. Burdwan', '', '', 306, 0, 0, '', '2020-12-16 09:40:36', '', '2020-12-16 09:40:36'),
(26, 'Burdwan ARDB Ltd.', 'P.O. & Dist. Burdwan', '', '', 704, 4, 2, '2021-02-09 12:31:53', '2020-12-16 09:40:36', '2021-02-09 12:31:53', '2020-12-16 09:40:36'),
(27, 'WBSCARDB(Purulia Branch)', 'P.O. & Dist. Purulia', '', '', 321, 0, 0, '', '2020-12-16 09:40:36', '', '2020-12-16 09:40:36'),
(28, 'WBSCARDB(Regional Office, Burdwan)', 'Spandan Complex, P.O. & Dist. Burdwan', '', '', 21, 0, 0, '', '2020-12-16 09:40:36', '', '2020-12-16 09:40:36'),
(29, 'WBSCARDB(Asonsol Branch)', 'Asansol Branch, Mantilla House , Fatehpur .', '', '', 21, 0, 0, '', '2020-12-16 09:40:36', '', '2020-12-16 09:40:36'),
(31, 'WBSCARDB(Ultadanga)', 'ultadanga.kolkata-67', '', '', 42, 0, 0, '', '2020-12-16 09:40:36', '', '2020-12-16 09:40:36'),
(32, 'Siliguri Branch, WBSCARDB Ltd', NULL, NULL, NULL, 0, 4, 2, '2021-02-10 05:31:08', '2021-02-10 05:31:08', '2021-02-10 05:31:08', '2021-02-10 05:31:08'),
(33, 'SYNERGIC ARDB Ltd.', '', '9051203118', 'samantasubham9804@gmail.com', 305, 3, 2, 'subham', '2021-02-17 05:35:00', 'subham', '2021-02-17 05:35:00'),
(34, 'SYNERGIC ADMIN', '', '9051203118', 'samantasubham9804@gmail.com', 42, 3, 2, 'subham', '2021-02-17 05:35:00', 'subham', '2021-02-17 05:35:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_test`
--

CREATE TABLE `tb_test` (
  `id` int(11) NOT NULL,
  `entry_date` date NOT NULL,
  `name` text NOT NULL,
  `emp_code` int(11) NOT NULL,
  `designation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `td_apex_self`
--

CREATE TABLE `td_apex_self` (
  `ardb_id` int(10) NOT NULL,
  `sector_code` int(10) NOT NULL,
  `memo_no` varchar(50) NOT NULL,
  `memo_date` date NOT NULL,
  `pronote_no` varchar(20) NOT NULL,
  `lso_no` varchar(20) NOT NULL,
  `pronote_recept_sanc` tinyint(1) NOT NULL DEFAULT 0,
  `bond_recept_sanc` tinyint(1) NOT NULL DEFAULT 0,
  `fwd_data` enum('N','Y','R','A') NOT NULL DEFAULT 'A' COMMENT 'N:Not fwd; Y:fwd; R:reject; A:approve',
  `fwd_by` varchar(50) DEFAULT NULL,
  `fwd_at` datetime DEFAULT NULL,
  `approve_1` enum('N','Y','R','A') NOT NULL DEFAULT 'A' COMMENT 'N:Not fwd; Y:fwd; R:reject; A:approve',
  `app1_by` varchar(50) DEFAULT NULL,
  `app1_at` datetime DEFAULT NULL,
  `approve_2` enum('N','Y','R','A') NOT NULL DEFAULT 'A' COMMENT 'N:Not fwd; Y:fwd; R:reject; A:approve',
  `app2_by` varchar(50) DEFAULT NULL,
  `app2_at` datetime DEFAULT NULL,
  `document_flag` tinyint(1) NOT NULL DEFAULT 0,
  `received_by` varchar(50) DEFAULT NULL,
  `received_date` date DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `ho_fwd_data` enum('N','Y','R','A') NOT NULL DEFAULT 'A' COMMENT 'N:Not fwd; Y:fwd; R:reject; A:approve',
  `ho_fwd_by` varchar(50) DEFAULT NULL,
  `ho_fwd_at` datetime DEFAULT NULL,
  `ho_approve_1` enum('N','Y','R','A') NOT NULL DEFAULT 'A' COMMENT 'N:Not fwd; Y:fwd; R:reject; A:approve',
  `ho_app1_by` varchar(50) DEFAULT NULL,
  `ho_app1_at` datetime DEFAULT NULL,
  `ho_approve_2` enum('N','Y','R','A') NOT NULL DEFAULT 'A' COMMENT 'N:Not fwd; Y:fwd; R:reject; A:approve',
  `ho_app2_by` varchar(50) DEFAULT NULL,
  `ho_app2_at` datetime DEFAULT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_by` varchar(50) NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `td_apex_self_api`
--

CREATE TABLE `td_apex_self_api` (
  `ardb_id` int(10) NOT NULL,
  `sector_code` int(10) DEFAULT NULL,
  `memo_no` varchar(50) NOT NULL,
  `memo_date` date NOT NULL,
  `pronote_no` varchar(50) NOT NULL DEFAULT '0',
  `lso_no` varchar(50) NOT NULL,
  `file_no` varchar(50) NOT NULL,
  `block_id` int(10) NOT NULL,
  `name_of_borr` varchar(100) NOT NULL,
  `moratorium` int(10) NOT NULL,
  `loan` int(10) NOT NULL,
  `repay_per_tot` decimal(20,2) NOT NULL,
  `purpose_code` int(10) NOT NULL,
  `roi` decimal(20,2) NOT NULL,
  `pro_cost` decimal(20,2) NOT NULL,
  `own_cont` decimal(20,2) NOT NULL,
  `corp_fund` decimal(20,2) NOT NULL,
  `sanc_amt` decimal(20,2) NOT NULL,
  `lnd_off_sec` decimal(20,2) NOT NULL,
  `cult_area` decimal(20,2) NOT NULL,
  `val_of_hypo` decimal(20,2) NOT NULL,
  `gros_inc_gen` decimal(20,2) NOT NULL,
  `reg_m_bond_dt` date NOT NULL,
  `reg_m_bond_no` int(10) NOT NULL,
  `pronote_recept_sanc` tinyint(1) NOT NULL DEFAULT 0,
  `bond_recept_sanc` tinyint(1) NOT NULL DEFAULT 0,
  `tot_memb` int(10) NOT NULL,
  `tot_borrower` int(10) NOT NULL,
  `tot_male` int(10) NOT NULL,
  `tot_female` int(10) NOT NULL,
  `tot_sc` int(10) NOT NULL,
  `tot_st` int(10) NOT NULL,
  `tot_obca` int(10) NOT NULL,
  `tot_obcb` int(10) NOT NULL,
  `tot_gen` int(10) NOT NULL,
  `tot_other` int(10) NOT NULL,
  `tot_count` int(10) NOT NULL,
  `tot_big` int(10) NOT NULL,
  `tot_small` int(10) NOT NULL,
  `tot_marginal` int(10) NOT NULL,
  `tot_landless` int(10) NOT NULL,
  `tot_lig` int(10) NOT NULL,
  `tot_mig` int(10) NOT NULL,
  `tot_hig` int(10) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_by` varchar(50) NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `td_apex_self_api`
--

INSERT INTO `td_apex_self_api` (`ardb_id`, `sector_code`, `memo_no`, `memo_date`, `pronote_no`, `lso_no`, `file_no`, `block_id`, `name_of_borr`, `moratorium`, `loan`, `repay_per_tot`, `purpose_code`, `roi`, `pro_cost`, `own_cont`, `corp_fund`, `sanc_amt`, `lnd_off_sec`, `cult_area`, `val_of_hypo`, `gros_inc_gen`, `reg_m_bond_dt`, `reg_m_bond_no`, `pronote_recept_sanc`, `bond_recept_sanc`, `tot_memb`, `tot_borrower`, `tot_male`, `tot_female`, `tot_sc`, `tot_st`, `tot_obca`, `tot_obcb`, `tot_gen`, `tot_other`, `tot_count`, `tot_big`, `tot_small`, `tot_marginal`, `tot_landless`, `tot_lig`, `tot_mig`, `tot_hig`, `created_by`, `created_at`, `modified_by`, `modified_at`) VALUES
(1, 13, '', '0000-00-00', '0', '01202013000104', '01202013000104', 1302013, 'Sujan Barman ', 0, 60, '60.00', 10700, '7.90', '197000.00', '47000.00', '0.00', '150000.00', '0.00', '0.00', '0.00', '0.00', '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2021-09-08 11:40:53', '', '2021-09-08 11:40:53'),
(1, 13, '', '0000-00-00', '0', '01202013000105', '01202013000105', 1301003, 'Mrityunjoy Halder ', 0, 60, '60.00', 10700, '7.90', '197000.00', '72000.00', '0.00', '125000.00', '0.00', '0.00', '0.00', '0.00', '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2021-09-08 11:40:53', '', '2021-09-08 11:40:53'),
(1, 13, '', '0000-00-00', '0', '01202013000106', '01202013000106', 1302013, 'Tusharkanti Mistri and Oth ', 0, 60, '60.00', 10700, '7.90', '197000.00', '67000.00', '0.00', '130000.00', '0.00', '0.00', '0.00', '0.00', '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2021-09-08 11:40:54', '', '2021-09-08 11:40:54'),
(1, 13, '', '0000-00-00', '0', '01202013000108', '01202013000108', 1301003, 'Brindaban Sardar and Oth ', 12, 48, '48.00', 10909, '7.90', '167000.00', '32000.00', '0.00', '135000.00', '0.00', '0.00', '0.00', '0.00', '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2021-09-08 11:40:54', '', '2021-09-08 11:40:54'),
(1, 13, '', '0000-00-00', '0', '01202013000118', '01202013000118', 1302012, 'Jalaluddin Laskar', 0, 60, '60.00', 10700, '7.90', '196720.00', '56720.00', '0.00', '140000.00', '0.00', '0.00', '0.00', '0.00', '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2021-09-08 11:40:54', '', '2021-09-08 11:40:54'),
(1, 13, '', '0000-00-00', '0', '01202013000124', '01202013000124', 3202011, 'Kartick Mondal', 0, 60, '60.00', 10700, '7.90', '447000.00', '97000.00', '0.00', '350000.00', '0.00', '0.00', '0.00', '0.00', '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2021-09-08 11:40:54', '', '2021-09-08 11:40:54'),
(5, 13, '', '0000-00-00', '0', '05202113000013', '05202113000013', 1401007, 'Haradhan Mahata and Other', 0, 60, '60.00', 10303, '8.00', '2250000.00', '350000.00', '0.00', '1900000.00', '0.00', '0.00', '0.00', '0.00', '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2021-09-08 11:40:54', '', '2021-09-08 11:40:54'),
(5, 34, '', '0000-00-00', '0', '05202134000001', '05202134000001', 2407001, 'Saroj Kr. Das ', 0, 84, '84.00', 30106, '7.80', '968849.00', '268849.00', '0.00', '700000.00', '0.00', '0.00', '0.00', '0.00', '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2021-09-08 11:40:54', '', '2021-09-08 11:40:54'),
(5, 34, '', '0000-00-00', '0', '05202134000002', '05202134000002', 2407001, 'Binda Debi Singh and Ors (ibsd) ', 6, 114, '114.00', 30101, '7.80', '1297496.00', '397496.00', '0.00', '900000.00', '0.00', '0.00', '0.00', '0.00', '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2021-09-08 11:40:54', '', '2021-09-08 11:40:54'),
(11, 13, '', '0000-00-00', '0', '11202113000003', '11202113000003', 2723, 'md habibur rahaman', 0, 60, '60.00', 10700, '8.00', '200000.00', '20000.00', '0.00', '180000.00', '0.00', '0.00', '0.00', '0.00', '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2021-09-12 17:15:08', '', '2021-09-12 17:15:08'),
(11, 13, '', '0000-00-00', '0', '11202113202053', '11202113202053', 2723, 'md habibur rahaman', 0, 60, '60.00', 10700, '8.00', '200000.00', '20000.00', '0.00', '180000.00', '0.00', '0.00', '0.00', '0.00', '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2021-09-08 11:40:55', '', '2021-09-08 11:40:55'),
(23, 13, '', '0000-00-00', '0', '23202113000007', '23202113000007', 2917, 'Sk. Atiyar ', 12, 72, '72.00', 10404, '8.00', '286000.00', '111000.00', '0.00', '175000.00', '0.00', '0.00', '0.00', '0.00', '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2021-09-12 17:15:08', '', '2021-09-12 17:15:08'),
(23, 13, '', '0000-00-00', '0', '23202113000008', '23202113000008', 2918, 'Ganesh Ch. Makhal and Oths', 12, 72, '72.00', 10404, '8.00', '312000.00', '62000.00', '0.00', '250000.00', '0.00', '0.00', '0.00', '0.00', '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2021-09-12 17:15:09', '', '2021-09-12 17:15:09'),
(23, 13, '', '0000-00-00', '0', '23202113000009', '23202113000009', 2917, 'Nityananda Manna ', 12, 72, '72.00', 10404, '8.00', '295000.00', '95000.00', '0.00', '200000.00', '0.00', '0.00', '0.00', '0.00', '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2021-09-12 17:15:09', '', '2021-09-12 17:15:09'),
(23, 13, '', '0000-00-00', '0', '23202113202015', '23202113202015', 2917, 'Sk. Atiyar ', 12, 72, '72.00', 10404, '8.00', '286000.00', '111000.00', '0.00', '175000.00', '0.00', '0.00', '264975.00', '0.00', '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2021-09-08 11:40:55', '', '2021-09-08 11:40:55'),
(23, 13, '', '0000-00-00', '0', '23202113202016', '23202113202016', 2918, 'Ganesh Ch. Makhal and Oths', 12, 72, '72.00', 10404, '8.00', '312000.00', '62000.00', '0.00', '250000.00', '0.00', '0.00', '423970.00', '0.00', '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2021-09-08 11:40:55', '', '2021-09-08 11:40:55'),
(23, 13, '', '0000-00-00', '0', '23202113202017', '23202113202017', 2917, 'Nityananda Manna ', 12, 72, '72.00', 10404, '8.00', '295000.00', '95000.00', '0.00', '200000.00', '0.00', '0.00', '0.00', '0.00', '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2021-09-08 11:40:55', '', '2021-09-08 11:40:55'),
(23, 22, '', '0000-00-00', '0', '23202122000001', '23202122000001', 2915, 'Tanusree Dhara and oths', 0, 60, '60.00', 20701, '8.00', '596592.00', '96592.00', '0.00', '500000.00', '0.00', '0.00', '0.00', '0.00', '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2021-09-13 07:02:39', '', '2021-09-13 07:02:39'),
(25, 13, '', '0000-00-00', '0', '25202113000028', '25202113000028', 2812, 'raghu nath pan and other', 0, 60, '60.00', 10303, '8.00', '4353545.00', '1088545.00', '0.00', '3265000.00', '0.00', '0.00', '0.00', '0.00', '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2021-09-13 07:07:20', '', '2021-09-13 07:07:20');

-- --------------------------------------------------------

--
-- Table structure for table `td_apex_self_borrower`
--

CREATE TABLE `td_apex_self_borrower` (
  `ardb_id` int(10) NOT NULL,
  `entry_date` date NOT NULL,
  `memo_no` varchar(50) NOT NULL,
  `pronote_no` varchar(20) NOT NULL,
  `tot_memb` int(10) NOT NULL,
  `tot_borrower` int(10) NOT NULL,
  `tot_male` int(10) NOT NULL,
  `tot_female` int(10) NOT NULL,
  `tot_sc` int(10) NOT NULL,
  `tot_st` int(10) NOT NULL,
  `tot_obca` int(10) NOT NULL,
  `tot_obcb` int(10) NOT NULL,
  `tot_gen` int(10) NOT NULL,
  `tot_other` int(10) NOT NULL,
  `tot_count` int(10) NOT NULL,
  `tot_big` int(10) NOT NULL,
  `tot_small` int(10) NOT NULL,
  `tot_marginal` int(10) NOT NULL,
  `tot_landless` int(10) NOT NULL,
  `tot_lig` int(10) NOT NULL,
  `tot_mig` int(10) NOT NULL,
  `tot_hig` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `td_apex_self_dis`
--

CREATE TABLE `td_apex_self_dis` (
  `ardb_id` int(10) NOT NULL,
  `entry_date` date NOT NULL,
  `memo_no` varchar(50) NOT NULL,
  `pronote_no` varchar(50) NOT NULL,
  `lso_no` varchar(50) NOT NULL,
  `inst_sl_no` int(10) NOT NULL,
  `inst_date` date NOT NULL,
  `inst_amt` decimal(10,2) NOT NULL,
  `in_out` tinyint(1) NOT NULL DEFAULT -1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `td_apex_self_dtls`
--

CREATE TABLE `td_apex_self_dtls` (
  `ardb_id` int(10) NOT NULL,
  `entry_date` date NOT NULL,
  `memo_no` varchar(50) NOT NULL,
  `pronote_no` varchar(50) NOT NULL DEFAULT '0',
  `lso_no` varchar(50) NOT NULL,
  `file_no` varchar(50) NOT NULL,
  `block_id` int(10) NOT NULL,
  `name_of_borr` varchar(100) NOT NULL,
  `moratorium` int(10) NOT NULL,
  `loan` int(10) NOT NULL,
  `repay_per_tot` decimal(10,2) NOT NULL,
  `purpose_code` int(10) NOT NULL,
  `roi` decimal(10,2) NOT NULL,
  `pro_cost` decimal(10,2) NOT NULL,
  `own_cont` decimal(10,2) NOT NULL,
  `corp_fund` decimal(10,2) NOT NULL,
  `sanc_amt` decimal(10,2) NOT NULL,
  `lnd_off_sec` decimal(10,2) NOT NULL,
  `cult_area` decimal(10,2) NOT NULL,
  `val_of_hypo` decimal(10,2) NOT NULL,
  `gros_inc_gen` decimal(10,2) NOT NULL,
  `reg_m_bond_dt` date NOT NULL,
  `reg_m_bond_no` int(10) NOT NULL,
  `in_out` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `td_apex_shg`
--

CREATE TABLE `td_apex_shg` (
  `ardb_id` int(10) NOT NULL,
  `sector_code` int(10) NOT NULL,
  `memo_no` varchar(50) NOT NULL,
  `memo_date` date NOT NULL,
  `pronote_no` varchar(20) NOT NULL,
  `lso_no` varchar(20) NOT NULL,
  `pronote_recept_sanc` tinyint(1) NOT NULL DEFAULT 0,
  `inter_ag_recept_sanc` tinyint(1) NOT NULL DEFAULT 0,
  `fwd_data` enum('N','Y','R','A') NOT NULL DEFAULT 'A' COMMENT 'N:Not fwd; Y:fwd; R:reject; A:approve',
  `fwd_by` varchar(50) DEFAULT NULL,
  `fwd_at` datetime DEFAULT NULL,
  `approve_1` enum('N','Y','R','A') NOT NULL DEFAULT 'A' COMMENT 'N:Not fwd; Y:fwd; R:reject; A:approve',
  `app1_by` varchar(50) DEFAULT NULL,
  `app1_at` datetime DEFAULT NULL,
  `approve_2` enum('N','Y','R','A') NOT NULL DEFAULT 'A' COMMENT 'N:Not fwd; Y:fwd; R:reject; A:approve',
  `app2_by` varchar(50) DEFAULT NULL,
  `app2_at` datetime DEFAULT NULL,
  `document_flag` tinyint(1) NOT NULL DEFAULT 0,
  `received_by` varchar(50) DEFAULT NULL,
  `received_date` date DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `ho_fwd_data` enum('N','Y','R','A') NOT NULL DEFAULT 'A' COMMENT 'N:Not fwd; Y:fwd; R:reject; A:approve',
  `ho_fwd_by` varchar(50) DEFAULT NULL,
  `ho_fwd_at` datetime DEFAULT NULL,
  `ho_approve_1` enum('N','Y','R','A') NOT NULL DEFAULT 'A' COMMENT 'N:Not fwd; Y:fwd; R:reject; A:approve',
  `ho_app1_by` varchar(50) DEFAULT NULL,
  `ho_app1_at` datetime DEFAULT NULL,
  `ho_approve_2` enum('N','Y','R','A') NOT NULL DEFAULT 'A' COMMENT 'N:Not fwd; Y:fwd; R:reject; A:approve',
  `ho_app2_by` varchar(50) DEFAULT NULL,
  `ho_app2_at` datetime DEFAULT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_by` varchar(50) NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `td_apex_shg_api`
--

CREATE TABLE `td_apex_shg_api` (
  `ardb_id` int(10) NOT NULL,
  `sector_code` int(10) NOT NULL,
  `memo_no` varchar(50) NOT NULL,
  `memo_date` date NOT NULL,
  `pronote_no` varchar(50) NOT NULL DEFAULT '0',
  `group` varchar(50) NOT NULL DEFAULT '0',
  `lso_no` varchar(50) NOT NULL,
  `file_no` varchar(50) NOT NULL,
  `block_id` int(10) NOT NULL,
  `name_of_group` varchar(100) NOT NULL,
  `tot_member` int(10) NOT NULL DEFAULT 0,
  `moratorium_period` int(10) NOT NULL,
  `repayment_no` int(10) NOT NULL,
  `repay_per_tot` decimal(20,2) NOT NULL,
  `purpose_code` int(10) NOT NULL,
  `roi` decimal(20,2) NOT NULL,
  `pro_cost` decimal(20,2) NOT NULL,
  `own_cont` decimal(20,2) NOT NULL,
  `corp_fund` decimal(20,2) NOT NULL,
  `sanc_amt` decimal(20,2) NOT NULL,
  `tot_depo_rais` decimal(20,2) NOT NULL,
  `inter_ag_bo_dt` date NOT NULL,
  `inter_ag_bo_no` int(10) NOT NULL,
  `pronote_recept_sanc` tinyint(1) NOT NULL DEFAULT 0,
  `inter_ag_recept_sanc` tinyint(1) NOT NULL DEFAULT 0,
  `tot_memb` int(10) NOT NULL,
  `tot_borrower` int(10) NOT NULL,
  `tot_male` int(10) NOT NULL,
  `tot_female` int(10) NOT NULL,
  `tot_sc` int(10) NOT NULL,
  `tot_st` int(10) NOT NULL,
  `tot_obca` int(10) NOT NULL,
  `tot_obcb` int(10) NOT NULL,
  `tot_gen` int(10) NOT NULL,
  `tot_other` int(10) NOT NULL,
  `tot_count` int(10) NOT NULL,
  `tot_big` int(10) NOT NULL,
  `tot_marginal` int(10) NOT NULL,
  `tot_landless` int(10) NOT NULL,
  `tot_hig` int(10) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_by` varchar(50) NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `td_apex_shg_api`
--

INSERT INTO `td_apex_shg_api` (`ardb_id`, `sector_code`, `memo_no`, `memo_date`, `pronote_no`, `group`, `lso_no`, `file_no`, `block_id`, `name_of_group`, `tot_member`, `moratorium_period`, `repayment_no`, `repay_per_tot`, `purpose_code`, `roi`, `pro_cost`, `own_cont`, `corp_fund`, `sanc_amt`, `tot_depo_rais`, `inter_ag_bo_dt`, `inter_ag_bo_no`, `pronote_recept_sanc`, `inter_ag_recept_sanc`, `tot_memb`, `tot_borrower`, `tot_male`, `tot_female`, `tot_sc`, `tot_st`, `tot_obca`, `tot_obcb`, `tot_gen`, `tot_other`, `tot_count`, `tot_big`, `tot_marginal`, `tot_landless`, `tot_hig`, `created_by`, `created_at`, `modified_by`, `modified_at`) VALUES
(8, 23, '', '0000-00-00', '0', '0', '', '', 2923, 'sangram shg', 0, 0, 12, '12.00', 11015, '9.60', '400000.00', '0.00', '0.00', '400000.00', '0.00', '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2021-09-08 07:32:42', '', '2021-09-08 07:32:42'),
(8, 23, '', '0000-00-00', '0', '0', '08202123000004', '08202123000004', 2723, 'sangram shg', 0, 0, 24, '24.00', 20020, '9.60', '400000.00', '0.00', '0.00', '400000.00', '0.00', '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2021-09-12 17:15:08', '', '2021-09-12 17:15:08'),
(8, 23, '', '0000-00-00', '0', '0', '08202123202024', '08202123202024', 2723, 'sangram shg', 0, 0, 24, '24.00', 20020, '9.60', '400000.00', '0.00', '0.00', '400000.00', '0.00', '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2021-09-08 11:40:54', '', '2021-09-08 11:40:54'),
(8, 23, '', '0000-00-00', '0', '0', '8202123000004', '8202123000004', 2723, 'sangram shg', 0, 0, 24, '24.00', 20020, '9.60', '400000.00', '0.00', '0.00', '400000.00', '0.00', '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2021-09-12 17:15:09', '', '2021-09-12 17:15:09'),
(11, 23, '', '0000-00-00', '0', '0', '11202123000002', '11202123000002', 2723, 'dhandhol 3 no. mohila shg dal', 0, 0, 36, '36.00', 20020, '9.60', '200000.00', '0.00', '0.00', '200000.00', '0.00', '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2021-09-08 07:37:48', '', '2021-09-08 07:37:48'),
(13, 23, '', '0000-00-00', '0', '0', '13202123000007', '13202123000007', 2723, 'swastika shg', 0, 0, 36, '36.00', 20020, '9.60', '140000.00', '0.00', '0.00', '140000.00', '0.00', '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2021-09-12 17:15:08', '', '2021-09-12 17:15:08'),
(13, 23, '', '0000-00-00', '0', '0', '13202123000052', '13202123000052', 2723, 'swastika shg', 0, 0, 36, '36.00', 20020, '9.60', '140000.00', '0.00', '0.00', '140000.00', '0.00', '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2021-09-08 07:32:42', '', '2021-09-08 07:32:42'),
(25, 23, '', '0000-00-00', '0', '0', '25202123000002', '25202123000002', 2723, 'sree radha gobind mohila shg', 0, 0, 36, '36.00', 20020, '9.60', '240000.00', '0.00', '0.00', '240000.00', '0.00', '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2021-09-12 17:15:09', '', '2021-09-12 17:15:09'),
(25, 23, '', '0000-00-00', '0', '0', '25202123000004', '25202123000004', 2723, 'sree radha gobind mohila shg', 0, 0, 36, '36.00', 20020, '9.60', '240000.00', '0.00', '0.00', '240000.00', '0.00', '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2021-09-08 11:40:55', '', '2021-09-08 11:40:55');

-- --------------------------------------------------------

--
-- Table structure for table `td_apex_shg_borrower`
--

CREATE TABLE `td_apex_shg_borrower` (
  `ardb_id` int(10) NOT NULL,
  `entry_date` date NOT NULL,
  `memo_no` varchar(50) NOT NULL,
  `pronote_no` varchar(20) NOT NULL,
  `tot_memb` int(10) NOT NULL,
  `tot_borrower` int(10) NOT NULL,
  `tot_male` int(10) NOT NULL,
  `tot_female` int(10) NOT NULL,
  `tot_sc` int(10) NOT NULL,
  `tot_st` int(10) NOT NULL,
  `tot_obca` int(10) NOT NULL,
  `tot_obcb` int(10) NOT NULL,
  `tot_gen` int(10) NOT NULL,
  `tot_other` int(10) NOT NULL,
  `tot_count` int(10) NOT NULL,
  `tot_big` int(10) NOT NULL,
  `tot_marginal` int(10) NOT NULL,
  `tot_landless` int(10) NOT NULL,
  `tot_hig` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `td_apex_shg_dis`
--

CREATE TABLE `td_apex_shg_dis` (
  `ardb_id` int(10) NOT NULL,
  `entry_date` date NOT NULL,
  `memo_no` varchar(50) NOT NULL,
  `pronote_no` varchar(50) NOT NULL,
  `lso_no` varchar(50) NOT NULL,
  `inst_sl_no` int(10) NOT NULL,
  `inst_date` date NOT NULL,
  `inst_amt` decimal(10,2) NOT NULL,
  `in_out` tinyint(1) NOT NULL DEFAULT -1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `td_apex_shg_dtls`
--

CREATE TABLE `td_apex_shg_dtls` (
  `ardb_id` int(10) NOT NULL,
  `entry_date` date NOT NULL,
  `memo_no` varchar(50) NOT NULL,
  `pronote_no` varchar(50) NOT NULL DEFAULT '0',
  `lso_no` varchar(50) NOT NULL,
  `group` varchar(20) NOT NULL DEFAULT '0',
  `file_no` varchar(50) NOT NULL,
  `block_id` int(10) NOT NULL,
  `name_of_group` varchar(100) NOT NULL,
  `tot_member` int(10) NOT NULL DEFAULT 0,
  `moratorium_period` int(10) NOT NULL,
  `repayment_no` int(10) NOT NULL,
  `repay_per_tot` decimal(10,2) NOT NULL,
  `purpose_code` int(10) NOT NULL,
  `roi` decimal(10,2) NOT NULL,
  `pro_cost` decimal(10,2) NOT NULL,
  `own_cont` decimal(10,2) NOT NULL,
  `corp_fund` decimal(10,2) NOT NULL,
  `sanc_amt` decimal(10,2) NOT NULL,
  `tot_depo_rais` decimal(10,2) NOT NULL,
  `inter_ag_bo_dt` date NOT NULL,
  `inter_ag_bo_no` int(10) NOT NULL,
  `in_out` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `td_borrower_classification`
--

CREATE TABLE `td_borrower_classification` (
  `ardb_id` int(11) NOT NULL,
  `return_dt` date NOT NULL,
  `sc` decimal(20,2) NOT NULL DEFAULT 0.00,
  `st` decimal(20,2) NOT NULL DEFAULT 0.00,
  `obc` decimal(20,2) NOT NULL DEFAULT 0.00,
  `gen` decimal(20,2) NOT NULL DEFAULT 0.00,
  `total_1` decimal(20,2) NOT NULL DEFAULT 0.00,
  `marginal` decimal(20,2) NOT NULL DEFAULT 0.00,
  `small` decimal(20,2) NOT NULL DEFAULT 0.00,
  `big` decimal(20,2) NOT NULL DEFAULT 0.00,
  `sal_earner` decimal(20,2) NOT NULL DEFAULT 0.00,
  `bussiness` decimal(20,2) NOT NULL DEFAULT 0.00,
  `total_2` decimal(20,2) NOT NULL DEFAULT 0.00,
  `male` decimal(20,2) NOT NULL DEFAULT 0.00,
  `female` decimal(20,2) NOT NULL DEFAULT 0.00,
  `total_3` decimal(20,2) NOT NULL DEFAULT 0.00,
  `uploaded_by` varchar(50) DEFAULT NULL,
  `uploaded_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `td_dc`
--

CREATE TABLE `td_dc` (
  `ardb_id` int(10) NOT NULL,
  `return_dt` date NOT NULL,
  `brrower_name` varchar(100) NOT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `block_name` varchar(100) DEFAULT NULL,
  `sanc_amt` decimal(10,2) DEFAULT NULL,
  `sanc_dt` date DEFAULT NULL,
  `recpt_dt` date DEFAULT NULL,
  `activity_name` varchar(100) DEFAULT NULL,
  `loan_case_no` varchar(100) DEFAULT NULL,
  `loan_bond_no` varchar(100) DEFAULT NULL,
  `bond_dt` date DEFAULT NULL,
  `disb_dt` date DEFAULT NULL,
  `disb_amt` decimal(10,2) DEFAULT NULL,
  `tot_project_cost` decimal(10,2) DEFAULT NULL,
  `own_contr` decimal(10,2) DEFAULT NULL,
  `land_sec_area` decimal(10,2) DEFAULT NULL,
  `cult_area` decimal(10,2) DEFAULT NULL,
  `valuation_hypo` decimal(10,2) DEFAULT NULL,
  `net_income` decimal(10,2) DEFAULT NULL,
  `sec_amt` decimal(10,2) DEFAULT NULL,
  `repayment_yr` int(10) DEFAULT NULL,
  `under_head` varchar(200) DEFAULT NULL,
  `memo_no` varchar(100) DEFAULT NULL,
  `pronote_no` varchar(100) DEFAULT NULL,
  `pronote_amt` decimal(10,2) DEFAULT NULL,
  `intt_rt` decimal(10,2) DEFAULT NULL,
  `uploaded_by` varchar(55) DEFAULT NULL,
  `uploaded_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `td_dc_self`
--

CREATE TABLE `td_dc_self` (
  `ardb_id` int(10) NOT NULL,
  `entry_date` date NOT NULL,
  `memo_no` varchar(50) NOT NULL,
  `sector_code` int(10) NOT NULL,
  `pronote_no` varchar(50) NOT NULL,
  `pronote_date` date NOT NULL,
  `purpose_code` int(10) NOT NULL,
  `gender_id` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1:male; 2:female; 3:other',
  `roi` decimal(10,2) NOT NULL DEFAULT 0.00,
  `moratorium_period` int(10) NOT NULL DEFAULT 0,
  `repayment_no` int(10) NOT NULL DEFAULT 0,
  `letter_no` varchar(50) DEFAULT NULL,
  `letter_date` date DEFAULT NULL,
  `fwd_data` enum('N','Y','R','A') NOT NULL DEFAULT 'A' COMMENT 'N:Not fwd; Y:fwd; R:reject; A:approve',
  `fwd_by` varchar(50) DEFAULT NULL,
  `fwd_at` datetime DEFAULT NULL,
  `approve_1` enum('N','Y','R','A') NOT NULL DEFAULT 'A' COMMENT 'N:Not fwd; Y:fwd; R:reject; A:approve',
  `app1_by` varchar(50) DEFAULT NULL,
  `app1_at` datetime DEFAULT NULL,
  `approve_2` enum('N','Y','R','A') NOT NULL DEFAULT 'A' COMMENT 'N:Not fwd; Y:fwd; R:reject; A:approve',
  `app2_by` varchar(50) DEFAULT NULL,
  `app2_at` datetime DEFAULT NULL,
  `ho_fwd_data` enum('N','Y','R','A') NOT NULL DEFAULT 'A' COMMENT 'N:Not fwd; Y:fwd; R:reject; A:approve',
  `ho_fwd_by` varchar(50) DEFAULT NULL,
  `ho_fwd_at` datetime DEFAULT NULL,
  `ho_approve_1` enum('N','Y','R','A') NOT NULL DEFAULT 'A' COMMENT 'N:Not fwd; Y:fwd; R:reject; A:approve',
  `ho_app1_by` varchar(50) DEFAULT NULL,
  `ho_app1_at` datetime DEFAULT NULL,
  `ho_approve_2` enum('N','Y','R','A') NOT NULL DEFAULT 'A' COMMENT 'N:Not fwd; Y:fwd; R:reject; A:approve',
  `ho_app2_by` varchar(50) DEFAULT NULL,
  `ho_app2_at` datetime DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_by` varchar(50) DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `document_flag` tinyint(1) NOT NULL DEFAULT 0,
  `received_by` varchar(50) DEFAULT NULL,
  `received_date` date DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `dock_no` bigint(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `td_dc_self_borrower`
--

CREATE TABLE `td_dc_self_borrower` (
  `ardb_id` int(10) NOT NULL,
  `entry_date` date NOT NULL,
  `memo_no` varchar(50) NOT NULL,
  `pronote_no` varchar(50) NOT NULL,
  `tot_memb` int(10) NOT NULL DEFAULT 0,
  `tot_borrower` int(10) NOT NULL DEFAULT 0,
  `tot_male` int(10) NOT NULL DEFAULT 0,
  `tot_female` int(10) NOT NULL DEFAULT 0,
  `tot_sc` int(10) NOT NULL DEFAULT 0,
  `tot_st` int(10) NOT NULL DEFAULT 0,
  `tot_obca` int(10) NOT NULL DEFAULT 0,
  `tot_obcb` int(10) NOT NULL DEFAULT 0,
  `tot_gen` int(10) NOT NULL DEFAULT 0,
  `tot_other` int(10) NOT NULL DEFAULT 0,
  `tot_count` int(10) NOT NULL DEFAULT 0,
  `tot_big` int(10) NOT NULL DEFAULT 0,
  `tot_marginal` int(10) NOT NULL DEFAULT 0,
  `tot_small` int(10) NOT NULL DEFAULT 0,
  `tot_landless` int(10) NOT NULL DEFAULT 0,
  `tot_lig` int(10) NOT NULL DEFAULT 0,
  `tot_mig` int(10) NOT NULL DEFAULT 0,
  `tot_hig` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `td_dc_self_dtls`
--

CREATE TABLE `td_dc_self_dtls` (
  `sl_no` int(11) NOT NULL,
  `ardb_id` int(11) NOT NULL,
  `entry_date` date NOT NULL,
  `memo_no` varchar(50) NOT NULL,
  `pronote_no` varchar(50) NOT NULL,
  `bod_sanc_dt` date NOT NULL,
  `due_dt` date DEFAULT NULL,
  `brrwr_sl_no` int(10) NOT NULL,
  `roi` decimal(10,2) NOT NULL DEFAULT 0.00,
  `project_cost` decimal(10,2) NOT NULL DEFAULT 0.00,
  `sanc_block` decimal(10,2) NOT NULL DEFAULT 0.00,
  `sanc_working` int(10) NOT NULL,
  `sanc_total` int(10) NOT NULL,
  `dis_block` decimal(10,2) NOT NULL DEFAULT 0.00,
  `dis_working` int(10) NOT NULL,
  `dis_total` int(10) NOT NULL,
  `own_cont` decimal(10,2) NOT NULL DEFAULT 0.00,
  `sub_received` decimal(10,2) DEFAULT NULL,
  `sub_receivable` decimal(10,2) DEFAULT NULL,
  `tot_loan_amt` decimal(10,2) NOT NULL DEFAULT 0.00,
  `lof_mort` decimal(10,2) NOT NULL DEFAULT 0.00,
  `af_culti` decimal(10,2) NOT NULL DEFAULT 0.00,
  `sec_land` decimal(10,2) NOT NULL DEFAULT 0.00,
  `sec_oth` decimal(10,2) NOT NULL DEFAULT 0.00,
  `sec_tot` decimal(10,2) NOT NULL DEFAULT 0.00,
  `igo_loan` decimal(10,2) NOT NULL DEFAULT 0.00,
  `tot_mordg_bond` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `td_dc_self_upload`
--

CREATE TABLE `td_dc_self_upload` (
  `sl_no` bigint(22) NOT NULL,
  `ardb_id` int(10) NOT NULL,
  `entry_date` date NOT NULL,
  `memo_no` varchar(50) NOT NULL,
  `pronote_no` varchar(50) NOT NULL,
  `file_name` varchar(50) NOT NULL,
  `file_path` varchar(100) NOT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_by` varchar(50) DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `td_dc_shg`
--

CREATE TABLE `td_dc_shg` (
  `ardb_id` int(10) NOT NULL,
  `entry_date` date NOT NULL,
  `memo_no` varchar(50) NOT NULL,
  `sector_code` int(10) NOT NULL,
  `pronote_no` varchar(50) NOT NULL,
  `pronote_date` date NOT NULL,
  `purpose_code` int(10) NOT NULL,
  `gender_id` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1:male; 2:female; 3:other',
  `roi` decimal(10,2) NOT NULL DEFAULT 0.00,
  `moratorium_period` int(10) NOT NULL DEFAULT 0,
  `repayment_no` int(10) NOT NULL DEFAULT 0,
  `letter_no` varchar(50) DEFAULT NULL,
  `letter_date` date DEFAULT NULL,
  `fwd_data` enum('N','Y','R','A') NOT NULL DEFAULT 'N' COMMENT 'N:Not fwd; Y:fwd; R:reject; A:approve',
  `fwd_by` varchar(50) DEFAULT NULL,
  `fwd_at` datetime DEFAULT NULL,
  `approve_1` enum('N','Y','R','A') NOT NULL DEFAULT 'A' COMMENT 'N:Not fwd; Y:fwd; R:reject; A:approve',
  `app1_by` varchar(50) DEFAULT NULL,
  `app1_at` datetime DEFAULT NULL,
  `approve_2` enum('N','Y','R','A') NOT NULL DEFAULT 'A' COMMENT 'N:Not fwd; Y:fwd; R:reject; A:approve',
  `app2_by` varchar(50) DEFAULT NULL,
  `app2_at` datetime DEFAULT NULL,
  `ho_fwd_data` enum('N','Y','R','A') NOT NULL DEFAULT 'A' COMMENT 'N:Not fwd; Y:fwd; R:reject; A:approve',
  `ho_fwd_by` varchar(50) DEFAULT NULL,
  `ho_fwd_at` datetime DEFAULT NULL,
  `ho_approve_1` enum('N','Y','R','A') NOT NULL DEFAULT 'A' COMMENT 'N:Not fwd; Y:fwd; R:reject; A:approve',
  `ho_app1_by` varchar(50) DEFAULT NULL,
  `ho_app1_at` datetime DEFAULT NULL,
  `ho_approve_2` enum('N','Y','R','A') NOT NULL DEFAULT 'A' COMMENT 'N:Not fwd; Y:fwd; R:reject; A:approve',
  `ho_app2_by` varchar(50) DEFAULT NULL,
  `ho_app2_at` datetime DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_by` varchar(50) DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `document_flag` tinyint(1) NOT NULL DEFAULT 0,
  `received_by` varchar(50) DEFAULT NULL,
  `received_date` date DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `dock_no` bigint(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `td_dc_shg_borrower`
--

CREATE TABLE `td_dc_shg_borrower` (
  `ardb_id` int(10) NOT NULL,
  `entry_date` date NOT NULL,
  `memo_no` varchar(50) NOT NULL,
  `pronote_no` varchar(50) NOT NULL,
  `total_shg` int(10) NOT NULL DEFAULT 0,
  `tot_memb` int(10) NOT NULL DEFAULT 0,
  `tot_male` int(10) NOT NULL DEFAULT 0,
  `tot_female` int(10) NOT NULL DEFAULT 0,
  `tot_sc` int(10) NOT NULL DEFAULT 0,
  `tot_st` int(10) NOT NULL DEFAULT 0,
  `tot_obca` int(10) NOT NULL DEFAULT 0,
  `tot_obcb` int(10) NOT NULL DEFAULT 0,
  `tot_gen` int(10) NOT NULL DEFAULT 0,
  `tot_other` int(10) NOT NULL DEFAULT 0,
  `tot_count` int(10) NOT NULL DEFAULT 0,
  `tot_big` int(10) NOT NULL DEFAULT 0,
  `tot_marginal` int(10) NOT NULL DEFAULT 0,
  `tot_small` int(10) NOT NULL DEFAULT 0,
  `tot_landless` int(10) NOT NULL DEFAULT 0,
  `tot_lig` int(10) NOT NULL DEFAULT 0,
  `tot_mig` int(10) NOT NULL DEFAULT 0,
  `tot_hig` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `td_dc_shg_dtls`
--

CREATE TABLE `td_dc_shg_dtls` (
  `sl_no` int(11) NOT NULL,
  `ardb_id` int(11) NOT NULL,
  `entry_date` date NOT NULL,
  `memo_no` varchar(50) NOT NULL,
  `pronote_no` varchar(50) NOT NULL,
  `shg_name` varchar(255) NOT NULL,
  `tot_memb` int(10) NOT NULL DEFAULT 0,
  `shg_addr` text NOT NULL,
  `block_code` int(10) NOT NULL,
  `roi` decimal(10,2) NOT NULL DEFAULT 0.00,
  `bod_sanc_dt` date NOT NULL,
  `due_dt` date DEFAULT NULL,
  `brrwr_sl_no` int(10) NOT NULL,
  `project_cost` decimal(10,2) NOT NULL DEFAULT 0.00,
  `sanc_amt` decimal(10,2) NOT NULL DEFAULT 0.00,
  `tot_own_amt` decimal(10,2) NOT NULL DEFAULT 0.00,
  `corp_fnd` decimal(10,2) NOT NULL DEFAULT 0.00,
  `disb_amt` decimal(10,2) NOT NULL DEFAULT 0.00,
  `intr_aggr_dt` date NOT NULL,
  `total_Intr_ag_bond` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `td_dc_shg_upload`
--

CREATE TABLE `td_dc_shg_upload` (
  `sl_no` bigint(22) NOT NULL,
  `ardb_id` int(10) NOT NULL,
  `entry_date` date NOT NULL,
  `memo_no` varchar(50) NOT NULL,
  `pronote_no` varchar(50) NOT NULL,
  `file_name` varchar(50) NOT NULL,
  `file_path` varchar(100) NOT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_by` varchar(50) DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `td_fortnight`
--

CREATE TABLE `td_fortnight` (
  `ardb_id` int(10) NOT NULL,
  `return_dt` date NOT NULL,
  `report_type` int(10) NOT NULL,
  `dmd_frm_fin_yr` int(10) NOT NULL,
  `dmd_to_fin_yr` int(10) NOT NULL,
  `dmd_prn_od` decimal(20,2) NOT NULL DEFAULT 0.00,
  `dmd_prn_cr` decimal(20,2) NOT NULL DEFAULT 0.00,
  `dmd_prn_tot` decimal(20,2) NOT NULL DEFAULT 0.00,
  `dmd_int_od` decimal(20,2) NOT NULL DEFAULT 0.00,
  `dmd_int_cr` decimal(20,2) NOT NULL DEFAULT 0.00,
  `dmd_int_tot` decimal(20,2) NOT NULL DEFAULT 0.00,
  `tot_dmd` decimal(20,2) NOT NULL DEFAULT 0.00,
  `col_prn_od` decimal(20,2) NOT NULL DEFAULT 0.00,
  `col_prn_cr` decimal(20,2) NOT NULL DEFAULT 0.00,
  `col_prn_adv` decimal(20,2) NOT NULL DEFAULT 0.00,
  `col_prn_tot` decimal(20,2) NOT NULL DEFAULT 0.00,
  `col_int_od` decimal(20,2) NOT NULL DEFAULT 0.00,
  `col_int_cr` decimal(20,2) NOT NULL DEFAULT 0.00,
  `col_int_tot` decimal(20,2) NOT NULL DEFAULT 0.00,
  `tot_colc` decimal(20,2) NOT NULL DEFAULT 0.00,
  `recov_per` decimal(20,2) NOT NULL DEFAULT 0.00,
  `prv_yr_dmd_prn` decimal(20,2) NOT NULL DEFAULT 0.00,
  `prv_yr_dmd_int` decimal(20,2) NOT NULL DEFAULT 0.00,
  `prv_yr_dmd_tot` decimal(20,2) NOT NULL DEFAULT 0.00,
  `prv_yr_col_prn` decimal(20,2) NOT NULL DEFAULT 0.00,
  `prv_yr_col_int` decimal(20,2) NOT NULL DEFAULT 0.00,
  `prv_yr_col_tot` decimal(20,2) NOT NULL DEFAULT 0.00,
  `col_per` decimal(20,2) NOT NULL DEFAULT 0.00,
  `tot_no_ac_dmd` int(10) NOT NULL DEFAULT 0,
  `tot_no_ac_od_dmd` int(10) NOT NULL DEFAULT 0,
  `tot_no_ac_curr_dmd` int(10) NOT NULL DEFAULT 0,
  `tot_no_ac_col` int(10) NOT NULL DEFAULT 0,
  `tot_no_ac_od_col` int(10) NOT NULL DEFAULT 0,
  `tot_no_ac_curr_col` int(10) NOT NULL DEFAULT 0,
  `tot_no_ac_prog` int(10) NOT NULL DEFAULT 0,
  `tot_no_ac_od_prog` int(10) NOT NULL DEFAULT 0,
  `tot_no_ac_curr_prog` int(10) NOT NULL DEFAULT 0,
  `uploaded_by` varchar(50) DEFAULT '0',
  `uploaded_dt` datetime DEFAULT NULL,
  `fwd_data` enum('N','Y','R','A') NOT NULL DEFAULT 'A' COMMENT 'N:Not fwd; Y:fwd; R:reject; A:approve',
  `fwd_by` varchar(50) DEFAULT NULL,
  `fwd_at` datetime DEFAULT NULL,
  `approve_1` enum('N','Y','R','A') NOT NULL DEFAULT 'A' COMMENT 'N:Not fwd; Y:fwd; R:reject; A:approve',
  `app1_by` varchar(50) DEFAULT NULL,
  `app1_at` datetime DEFAULT NULL,
  `approve_2` enum('N','Y','R','A') NOT NULL DEFAULT 'A' COMMENT 'N:Not fwd; Y:fwd; R:reject; A:approve',
  `app2_by` varchar(50) DEFAULT NULL,
  `app2_at` datetime DEFAULT NULL,
  `ho_fwd_data` enum('N','Y','R','A') NOT NULL DEFAULT 'A' COMMENT 'N:Not fwd; Y:fwd; R:reject; A:approve',
  `ho_fwd_by` varchar(50) DEFAULT NULL,
  `ho_fwd_at` datetime DEFAULT NULL,
  `ho_approve_1` enum('N','Y','R','A') NOT NULL DEFAULT 'A' COMMENT 'N:Not fwd; Y:fwd; R:reject; A:approve',
  `ho_app1_by` varchar(50) DEFAULT NULL,
  `ho_app1_at` datetime DEFAULT NULL,
  `ho_approve_2` enum('N','Y','R','A') NOT NULL DEFAULT 'A' COMMENT 'N:Not fwd; Y:fwd; R:reject; A:approve',
  `ho_app2_by` varchar(50) DEFAULT NULL,
  `ho_app2_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `td_fortnight`
--

INSERT INTO `td_fortnight` (`ardb_id`, `return_dt`, `report_type`, `dmd_frm_fin_yr`, `dmd_to_fin_yr`, `dmd_prn_od`, `dmd_prn_cr`, `dmd_prn_tot`, `dmd_int_od`, `dmd_int_cr`, `dmd_int_tot`, `tot_dmd`, `col_prn_od`, `col_prn_cr`, `col_prn_adv`, `col_prn_tot`, `col_int_od`, `col_int_cr`, `col_int_tot`, `tot_colc`, `recov_per`, `prv_yr_dmd_prn`, `prv_yr_dmd_int`, `prv_yr_dmd_tot`, `prv_yr_col_prn`, `prv_yr_col_int`, `prv_yr_col_tot`, `col_per`, `tot_no_ac_dmd`, `tot_no_ac_od_dmd`, `tot_no_ac_curr_dmd`, `tot_no_ac_col`, `tot_no_ac_od_col`, `tot_no_ac_curr_col`, `tot_no_ac_prog`, `tot_no_ac_od_prog`, `tot_no_ac_curr_prog`, `uploaded_by`, `uploaded_dt`, `fwd_data`, `fwd_by`, `fwd_at`, `approve_1`, `app1_by`, `app1_at`, `approve_2`, `app2_by`, `app2_at`, `ho_fwd_data`, `ho_fwd_by`, `ho_fwd_at`, `ho_approve_1`, `ho_app1_by`, `ho_app1_at`, `ho_approve_2`, `ho_app2_by`, `ho_app2_at`) VALUES
(15, '2021-02-03', 1, 2020, 2021, '200000.00', '100000.00', '300000.00', '200000.00', '200000.00', '400000.00', '700000.00', '400000.00', '200000.00', '3000000.00', '3600000.00', '2000000.00', '2000000.00', '4000000.00', '7600000.00', '83000.00', '3000000.00', '2000000.00', '5000000.00', '7000000.00', '200000.00', '7200000.00', '122000.00', 20, 30, 40, 50, 60, 40, 30, 20, 50, 'bankura', '2021-02-03 07:44:24', 'A', NULL, NULL, 'A', NULL, NULL, 'A', NULL, NULL, 'A', NULL, NULL, 'A', NULL, NULL, 'A', NULL, NULL),
(22, '2021-02-03', 1, 2020, 2021, '200000.00', '100000.00', '300000.00', '200000.00', '200000.00', '400000.00', '700000.00', '400000.00', '200000.00', '3000000.00', '3600000.00', '2000000.00', '2000000.00', '4000000.00', '7600000.00', '83000.00', '3000000.00', '2000000.00', '5000000.00', '7000000.00', '200000.00', '7200000.00', '122000.00', 20, 30, 40, 50, 60, 40, 30, 20, 50, 'bankura', '2021-02-03 07:44:24', 'Y', 'bankura', '2021-02-25 06:11:56', 'A', NULL, NULL, 'A', NULL, NULL, 'A', NULL, NULL, 'A', NULL, NULL, 'A', NULL, NULL),
(33, '2021-02-17', 1, 2020, 2021, '20.00', '30.00', '50.00', '20.00', '30.00', '50.00', '100.00', '40.00', '50.00', '20.00', '110.00', '40.00', '50.00', '90.00', '200.00', '50.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'u_sss', '2021-02-17 06:49:20', 'Y', 'u_sss', '2021-02-17 06:49:27', 'Y', 'app1_sss', '2021-02-17 07:02:34', 'Y', 'app2_sss', '2021-02-17 07:03:27', 'Y', 'sss_u', '2021-02-17 08:38:11', 'Y', 'sss_a1', '2021-02-17 08:44:41', 'A', NULL, NULL),
(33, '2021-02-17', 2, 2020, 2021, '20.00', '30.00', '50.00', '20.00', '30.00', '50.00', '100.00', '40.00', '50.00', '20.00', '110.00', '40.00', '50.00', '90.00', '200.00', '50.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'u_sss', '2021-02-17 06:49:20', 'Y', 'u_sss', '2021-02-17 06:49:27', 'Y', 'app1_sss', '2021-02-17 07:02:34', 'Y', 'app2_sss', '2021-02-17 07:03:27', 'Y', 'sss_u', '2021-02-17 08:38:28', 'Y', 'sss_a1', '2021-02-17 08:44:41', 'A', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `td_fort_borr`
--

CREATE TABLE `td_fort_borr` (
  `ardb_id` int(11) NOT NULL,
  `entry_date` date NOT NULL,
  `target_id` bigint(22) NOT NULL,
  `return_form` date NOT NULL,
  `return_to` date NOT NULL,
  `sc` int(11) NOT NULL,
  `st` int(11) NOT NULL,
  `obca` int(11) NOT NULL,
  `obcb` int(11) NOT NULL,
  `gen` int(11) NOT NULL,
  `total_1` int(11) NOT NULL,
  `marginal` int(11) NOT NULL,
  `small` int(11) NOT NULL,
  `big` int(11) NOT NULL,
  `sal_earner` int(11) NOT NULL,
  `bussiness` int(11) NOT NULL,
  `total_2` int(11) NOT NULL,
  `male` int(11) NOT NULL,
  `female` int(11) NOT NULL,
  `total_3` int(11) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_by` varchar(50) NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `td_fort_borr`
--

INSERT INTO `td_fort_borr` (`ardb_id`, `entry_date`, `target_id`, `return_form`, `return_to`, `sc`, `st`, `obca`, `obcb`, `gen`, `total_1`, `marginal`, `small`, `big`, `sal_earner`, `bussiness`, `total_2`, `male`, `female`, `total_3`, `created_by`, `created_at`, `modified_by`, `modified_at`) VALUES
(22, '2021-03-10', 2, '2021-02-24', '2021-03-10', 20, 30, 20, 30, 20, 120, 20, 30, 20, 30, 20, 120, 60, 60, 120, 'bankura', '2021-03-10 05:19:01', 'bankura', '2021-03-10 17:19:01'),
(33, '2021-02-17', 1, '2021-02-08', '2021-02-17', 10, 10, 10, 10, 10, 50, 10, 10, 10, 10, 10, 50, 25, 25, 50, 'u_sss', '2021-02-17 06:40:03', 'u_sss', '2021-02-17 06:40:03');

-- --------------------------------------------------------

--
-- Table structure for table `td_fort_dr_col`
--

CREATE TABLE `td_fort_dr_col` (
  `ardb_id` int(11) NOT NULL,
  `sector_id` int(11) NOT NULL,
  `dmd_id` bigint(22) NOT NULL,
  `entry_date` date NOT NULL,
  `return_form` date NOT NULL,
  `return_to` date NOT NULL,
  `pri_od` decimal(10,2) NOT NULL DEFAULT 0.00,
  `pri_cr` decimal(10,2) NOT NULL DEFAULT 0.00,
  `pri_adv` decimal(10,2) NOT NULL DEFAULT 0.00,
  `pri_tot` decimal(10,2) NOT NULL DEFAULT 0.00,
  `int_od` decimal(10,2) NOT NULL DEFAULT 0.00,
  `int_cr` decimal(10,2) NOT NULL DEFAULT 0.00,
  `int_tot` decimal(10,2) NOT NULL DEFAULT 0.00,
  `tot_colc` decimal(10,2) NOT NULL DEFAULT 0.00,
  `recov_per` decimal(10,2) NOT NULL DEFAULT 0.00,
  `fwd_data` enum('N','Y','R','A') NOT NULL DEFAULT 'A' COMMENT 'N:Not fwd; Y:fwd; R:reject; A:approve',
  `fwd_by` varchar(50) DEFAULT NULL,
  `fwd_at` datetime DEFAULT NULL,
  `approve_1` enum('N','Y','R','A') NOT NULL DEFAULT 'A' COMMENT 'N:Not fwd; Y:fwd; R:reject; A:approve',
  `app1_by` varchar(50) DEFAULT NULL,
  `app1_at` datetime DEFAULT NULL,
  `approve_2` enum('N','Y','R','A') NOT NULL DEFAULT 'A' COMMENT 'N:Not fwd; Y:fwd; R:reject; A:approve',
  `app2_by` varchar(50) DEFAULT NULL,
  `app2_at` datetime DEFAULT NULL,
  `ho_fwd_data` enum('N','Y','R','A') NOT NULL DEFAULT 'A' COMMENT 'N:Not fwd; Y:fwd; R:reject; A:approve',
  `ho_fwd_by` varchar(50) DEFAULT NULL,
  `ho_fwd_at` datetime DEFAULT NULL,
  `ho_approve_1` enum('N','Y','R','A') NOT NULL DEFAULT 'A' COMMENT 'N:Not fwd; Y:fwd; R:reject; A:approve',
  `ho_app1_by` varchar(50) DEFAULT NULL,
  `ho_app1_at` datetime DEFAULT NULL,
  `ho_approve_2` enum('N','Y','R','A') NOT NULL DEFAULT 'A' COMMENT 'N:Not fwd; Y:fwd; R:reject; A:approve',
  `ho_app2_by` varchar(50) DEFAULT NULL,
  `ho_app2_at` datetime DEFAULT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `modified_by` varchar(50) NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `td_fort_dr_col`
--

INSERT INTO `td_fort_dr_col` (`ardb_id`, `sector_id`, `dmd_id`, `entry_date`, `return_form`, `return_to`, `pri_od`, `pri_cr`, `pri_adv`, `pri_tot`, `int_od`, `int_cr`, `int_tot`, `tot_colc`, `recov_per`, `fwd_data`, `fwd_by`, `fwd_at`, `approve_1`, `app1_by`, `app1_at`, `approve_2`, `app2_by`, `app2_at`, `ho_fwd_data`, `ho_fwd_by`, `ho_fwd_at`, `ho_approve_1`, `ho_app1_by`, `ho_app1_at`, `ho_approve_2`, `ho_app2_by`, `ho_app2_at`, `created_by`, `created_at`, `modified_by`, `modified_at`) VALUES
(22, 1, 1, '2021-03-01', '2021-02-14', '2021-03-01', '1000.00', '2000.00', '30000.00', '33000.00', '4000.00', '2000.00', '6000.00', '39000.00', '8974.36', 'Y', 'bankura', '2021-03-01 02:07:28', 'Y', 'bankura_a1', '2021-03-02 12:25:07', 'A', NULL, NULL, 'A', NULL, NULL, 'A', NULL, NULL, 'A', NULL, NULL, 'bankura', '2021-03-01 12:51:51', '', '2021-03-01 06:21:51'),
(22, 1, 1, '2021-03-11', '2021-03-10', '2021-03-10', '8000.00', '6000.00', '3000.00', '17000.00', '4000.00', '2000.00', '6000.00', '23000.00', '17500.00', 'Y', 'bankura', '2021-03-11 11:03:16', 'Y', 'bankura_a1', '2021-03-11 11:13:25', 'Y', 'bankura_a2', '2021-03-11 11:15:06', 'Y', 'sss_u', '2021-03-11 11:15:56', 'Y', 'sss_a1', '2021-03-11 11:17:13', 'A', NULL, NULL, 'bankura', '2021-03-11 10:59:45', '', '2021-03-11 10:59:45'),
(22, 2, 2, '2021-03-01', '2021-02-14', '2021-03-01', '1000.00', '2000.00', '30000.00', '33000.00', '4000.00', '2000.00', '6000.00', '39000.00', '8974.36', 'Y', 'bankura', '2021-03-01 02:07:28', 'Y', 'bankura_a1', '2021-03-02 12:25:07', 'A', NULL, NULL, 'A', NULL, NULL, 'A', NULL, NULL, 'A', NULL, NULL, 'bankura', '2021-03-01 12:51:51', '', '2021-03-01 06:21:51'),
(22, 2, 2, '2021-03-11', '2021-03-10', '2021-03-10', '7000.00', '3000.00', '1000.00', '11000.00', '4000.00', '2000.00', '6000.00', '17000.00', '21875.00', 'Y', 'bankura', '2021-03-11 11:03:19', 'Y', 'bankura_a1', '2021-03-11 11:13:25', 'Y', 'bankura_a2', '2021-03-11 11:15:06', 'Y', 'sss_u', '2021-03-11 11:16:01', 'Y', 'sss_a1', '2021-03-11 11:17:13', 'A', NULL, NULL, 'bankura', '2021-03-11 11:03:11', '', '2021-03-11 11:03:11'),
(22, 3, 3, '2021-03-01', '2021-02-14', '2021-03-01', '1000.00', '2000.00', '30000.00', '33000.00', '4000.00', '2000.00', '6000.00', '39000.00', '8974.36', 'Y', 'bankura', '2021-03-01 02:07:28', 'Y', 'bankura_a1', '2021-03-02 12:25:07', 'A', NULL, NULL, 'A', NULL, NULL, 'A', NULL, NULL, 'A', NULL, NULL, 'bankura', '2021-03-01 12:51:51', '', '2021-03-01 06:21:51'),
(22, 5, 4, '2021-03-10', '2021-03-10', '2021-03-10', '12000.00', '3000.00', '6000.00', '21000.00', '6000.00', '2000.00', '8000.00', '29000.00', '6347.83', 'Y', 'bankura', '2021-03-10 08:00:44', 'Y', 'bankura_a1', '2021-03-11 11:13:25', 'Y', 'bankura_a2', '2021-03-11 11:15:06', 'Y', 'sss_u', '2021-03-11 11:16:05', 'Y', 'sss_a1', '2021-03-11 11:17:13', 'A', NULL, NULL, 'bankura', '2021-03-10 07:55:19', 'sss_u', '2021-03-10 07:55:19');

-- --------------------------------------------------------

--
-- Table structure for table `td_fort_dr_dmd`
--

CREATE TABLE `td_fort_dr_dmd` (
  `id` int(11) NOT NULL,
  `entry_date` date NOT NULL,
  `ardb_id` int(11) NOT NULL,
  `sector_id` int(11) NOT NULL,
  `frm_fn_year` int(11) NOT NULL,
  `to_fn_year` int(11) NOT NULL,
  `pri_od` decimal(10,2) NOT NULL,
  `pri_cr` decimal(10,2) NOT NULL,
  `pri_tot` decimal(10,2) NOT NULL,
  `int_od` decimal(10,2) NOT NULL,
  `int_cr` decimal(10,2) NOT NULL,
  `int_tot` decimal(10,2) NOT NULL,
  `tot_dmd` decimal(10,2) NOT NULL,
  `pri_adv_rec` decimal(10,2) NOT NULL DEFAULT 0.00,
  `gross_tot_dmd` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_by` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_by` varchar(50) NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `td_fort_dr_dmd`
--

INSERT INTO `td_fort_dr_dmd` (`id`, `entry_date`, `ardb_id`, `sector_id`, `frm_fn_year`, `to_fn_year`, `pri_od`, `pri_cr`, `pri_tot`, `int_od`, `int_cr`, `int_tot`, `tot_dmd`, `pri_adv_rec`, `gross_tot_dmd`, `created_by`, `created_at`, `modified_by`, `modified_at`) VALUES
(1, '2021-03-01', 22, 1, 2020, 2021, '400000.00', '600000.00', '1000000.00', '500000.00', '2000000.00', '2500000.00', '3500000.00', '3000.00', '3533000.00', 'burdwan_a2', '2021-03-01 08:39:45', 'bankura', '2021-03-11 10:59:45'),
(2, '2021-03-01', 22, 2, 2020, 2021, '400000.00', '600000.00', '1000000.00', '500000.00', '2000000.00', '2500000.00', '3500000.00', '1000.00', '3531000.00', 'burdwan_a2', '2021-03-01 08:39:45', 'bankura', '2021-03-11 11:03:10'),
(3, '2021-03-01', 22, 3, 2020, 2021, '400000.00', '600000.00', '1000000.00', '500000.00', '2000000.00', '2500000.00', '3500000.00', '30000.00', '3530000.00', 'burdwan_a2', '2021-03-01 08:39:45', 'bankura', '2021-03-01 06:21:51'),
(4, '2021-03-10', 22, 5, 2020, 2021, '800000.00', '50000.00', '850000.00', '600000.00', '10000.00', '610000.00', '1460000.00', '6000.00', '1466000.00', 'bankura_a2', '2021-03-10 07:51:31', 'sss_u', '2021-03-10 10:48:23');

-- --------------------------------------------------------

--
-- Table structure for table `td_fort_dr_prog`
--

CREATE TABLE `td_fort_dr_prog` (
  `ardb_id` int(11) NOT NULL,
  `sector_id` int(11) NOT NULL,
  `dmd_id` bigint(22) NOT NULL,
  `entry_date` date NOT NULL,
  `return_form` date NOT NULL,
  `return_to` date NOT NULL,
  `pri_od` decimal(10,2) NOT NULL DEFAULT 0.00,
  `pri_cr` decimal(10,2) NOT NULL DEFAULT 0.00,
  `pri_adv` decimal(10,2) NOT NULL DEFAULT 0.00,
  `pri_tot` decimal(10,2) NOT NULL DEFAULT 0.00,
  `int_od` decimal(10,2) NOT NULL DEFAULT 0.00,
  `int_cr` decimal(10,2) NOT NULL DEFAULT 0.00,
  `int_tot` decimal(10,2) NOT NULL DEFAULT 0.00,
  `tot_colc` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_by` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_by` varchar(50) NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `td_fort_dr_prog`
--

INSERT INTO `td_fort_dr_prog` (`ardb_id`, `sector_id`, `dmd_id`, `entry_date`, `return_form`, `return_to`, `pri_od`, `pri_cr`, `pri_adv`, `pri_tot`, `int_od`, `int_cr`, `int_tot`, `tot_colc`, `created_by`, `created_at`, `modified_by`, `modified_at`) VALUES
(22, 1, 1, '2021-03-01', '2021-02-14', '2021-03-01', '1000.00', '2000.00', '30000.00', '33000.00', '4000.00', '2000.00', '6000.00', '39000.00', 'bankura', '2021-03-01 12:51:51', '', '2021-03-01 06:21:51'),
(22, 1, 1, '2021-03-11', '2021-03-10', '2021-03-10', '9000.00', '8000.00', '33000.00', '50000.00', '8000.00', '4000.00', '12000.00', '62000.00', 'bankura', '2021-03-11 10:59:45', '', '2021-03-11 10:59:45'),
(22, 2, 2, '2021-03-01', '2021-02-14', '2021-03-01', '1000.00', '2000.00', '30000.00', '33000.00', '4000.00', '2000.00', '6000.00', '39000.00', 'bankura', '2021-03-01 12:51:51', '', '2021-03-01 06:21:51'),
(22, 2, 2, '2021-03-11', '2021-03-10', '2021-03-10', '8000.00', '5000.00', '31000.00', '44000.00', '8000.00', '4000.00', '12000.00', '56000.00', 'bankura', '2021-03-11 11:03:11', '', '2021-03-11 11:03:11'),
(22, 3, 3, '2021-03-01', '2021-02-14', '2021-03-01', '1000.00', '2000.00', '30000.00', '33000.00', '4000.00', '2000.00', '6000.00', '39000.00', 'bankura', '2021-03-01 12:51:51', '', '2021-03-01 06:21:51'),
(22, 5, 4, '2021-03-10', '2021-03-10', '2021-03-10', '12000.00', '3000.00', '6000.00', '21000.00', '6000.00', '2000.00', '8000.00', '29000.00', 'bankura', '2021-03-10 07:55:19', 'sss_u', '2021-03-10 10:48:23');

-- --------------------------------------------------------

--
-- Table structure for table `td_fort_inv`
--

CREATE TABLE `td_fort_inv` (
  `ardb_id` int(11) NOT NULL,
  `entry_date` date NOT NULL,
  `target_id` bigint(22) NOT NULL,
  `return_form` date NOT NULL,
  `return_to` date NOT NULL,
  `ac_closed` int(11) NOT NULL,
  `pro_bro_mem` int(11) NOT NULL,
  `fm_no_case` int(11) NOT NULL,
  `fm_amt` decimal(10,2) NOT NULL DEFAULT 0.00,
  `nf_no_case` int(11) NOT NULL,
  `nf_amt` decimal(10,2) NOT NULL DEFAULT 0.00,
  `pl_no_case` int(11) NOT NULL,
  `pl_amt` decimal(10,2) NOT NULL DEFAULT 0.00,
  `rh_no_case` int(11) NOT NULL,
  `rh_amt` decimal(10,2) NOT NULL DEFAULT 0.00,
  `shg_no_case` int(11) NOT NULL,
  `shg_amt` decimal(10,2) NOT NULL DEFAULT 0.00,
  `tot_inv_of_curr_yr_no_case` int(11) NOT NULL,
  `tot_inv_of_curr_yr_amt` decimal(10,2) NOT NULL DEFAULT 0.00,
  `tot_inv_of_pre_yr_no_case` int(11) NOT NULL,
  `tot_inv_of_pre_yr_amt` decimal(10,2) NOT NULL DEFAULT 0.00,
  `fwd_data` enum('N','Y','R','A') NOT NULL DEFAULT 'A' COMMENT 'N:Not fwd; Y:fwd; R:reject; A:approve',
  `fwd_by` varchar(50) DEFAULT NULL,
  `fwd_at` datetime DEFAULT NULL,
  `approve_1` enum('N','Y','R','A') NOT NULL DEFAULT 'A' COMMENT 'N:Not fwd; Y:fwd; R:reject; A:approve',
  `app1_by` varchar(50) DEFAULT NULL,
  `app1_at` datetime DEFAULT NULL,
  `approve_2` enum('N','Y','R','A') NOT NULL DEFAULT 'A' COMMENT 'N:Not fwd; Y:fwd; R:reject; A:approve',
  `app2_by` varchar(50) DEFAULT NULL,
  `app2_at` datetime DEFAULT NULL,
  `ho_fwd_data` enum('N','Y','R','A') NOT NULL DEFAULT 'A' COMMENT 'N:Not fwd; Y:fwd; R:reject; A:approve',
  `ho_fwd_by` varchar(50) DEFAULT NULL,
  `ho_fwd_at` datetime DEFAULT NULL,
  `ho_approve_1` enum('N','Y','R','A') NOT NULL DEFAULT 'A' COMMENT 'N:Not fwd; Y:fwd; R:reject; A:approve',
  `ho_app1_by` varchar(50) DEFAULT NULL,
  `ho_app1_at` datetime DEFAULT NULL,
  `ho_approve_2` enum('N','Y','R','A') NOT NULL DEFAULT 'A' COMMENT 'N:Not fwd; Y:fwd; R:reject; A:approve',
  `ho_app2_by` varchar(50) DEFAULT NULL,
  `ho_app2_at` datetime DEFAULT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_at` date DEFAULT NULL,
  `modified_by` varchar(50) NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `td_fort_inv`
--

INSERT INTO `td_fort_inv` (`ardb_id`, `entry_date`, `target_id`, `return_form`, `return_to`, `ac_closed`, `pro_bro_mem`, `fm_no_case`, `fm_amt`, `nf_no_case`, `nf_amt`, `pl_no_case`, `pl_amt`, `rh_no_case`, `rh_amt`, `shg_no_case`, `shg_amt`, `tot_inv_of_curr_yr_no_case`, `tot_inv_of_curr_yr_amt`, `tot_inv_of_pre_yr_no_case`, `tot_inv_of_pre_yr_amt`, `fwd_data`, `fwd_by`, `fwd_at`, `approve_1`, `app1_by`, `app1_at`, `approve_2`, `app2_by`, `app2_at`, `ho_fwd_data`, `ho_fwd_by`, `ho_fwd_at`, `ho_approve_1`, `ho_app1_by`, `ho_app1_at`, `ho_approve_2`, `ho_app2_by`, `ho_app2_at`, `created_by`, `created_at`, `modified_by`, `modified_at`) VALUES
(22, '2021-03-10', 2, '2021-02-24', '2021-03-10', 10, 20, 10, '200000.00', 20, '300000.00', 30, '400000.00', 40, '500000.00', 50, '600000.00', 150, '2000000.00', 60, '1000000.00', 'Y', 'bankura', '2021-03-10 05:19:28', 'Y', 'bankura_a1', '2021-03-10 05:20:57', 'Y', 'bankura_a2', '2021-03-11 11:20:44', 'Y', 'sss_u', '2021-03-11 11:21:08', 'Y', 'sss_a1', '2021-03-11 11:21:42', 'A', NULL, NULL, 'bankura', '2021-03-10', 'bankura', '2021-03-10 17:19:01'),
(33, '2021-02-17', 1, '2021-02-08', '2021-02-17', 20, 30, 10, '20.00', 10, '20.00', 10, '20.00', 10, '20.00', 10, '20.00', 50, '100.00', 40, '90.00', 'Y', 'u_sss', '2021-02-17 06:40:16', 'Y', 'app1_sss', '2021-02-17 06:51:47', 'Y', 'app2_sss', '2021-02-17 07:03:19', 'Y', 'sss_u', '2021-02-17 08:37:09', 'Y', 'sss_a1', '2021-02-17 08:39:45', 'A', NULL, NULL, 'u_sss', '2021-02-17', 'u_sss', '2021-02-17 06:40:03');

-- --------------------------------------------------------

--
-- Table structure for table `td_fort_prograsive`
--

CREATE TABLE `td_fort_prograsive` (
  `ardb_id` int(11) NOT NULL,
  `entry_date` date NOT NULL,
  `target_id` bigint(22) NOT NULL,
  `return_form` date NOT NULL,
  `return_to` date NOT NULL,
  `fm_no_case` int(11) NOT NULL,
  `fm_amt` decimal(10,2) NOT NULL DEFAULT 0.00,
  `nf_no_case` int(11) NOT NULL,
  `nf_amt` decimal(10,2) NOT NULL DEFAULT 0.00,
  `pl_no_case` int(11) NOT NULL,
  `pl_amt` decimal(10,2) NOT NULL DEFAULT 0.00,
  `rh_no_case` int(11) NOT NULL,
  `rh_amt` decimal(10,2) NOT NULL DEFAULT 0.00,
  `shg_no_case` int(11) NOT NULL,
  `shg_amt` decimal(10,2) NOT NULL DEFAULT 0.00,
  `tot_inv_of_curr_yr_no_case` int(11) NOT NULL,
  `tot_inv_of_curr_yr_amt` decimal(10,2) NOT NULL DEFAULT 0.00,
  `tot_inv_of_pre_yr_no_case` int(11) NOT NULL,
  `tot_inv_of_pre_yr_amt` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_by` varchar(50) NOT NULL,
  `created_at` date DEFAULT NULL,
  `modified_by` varchar(50) NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `td_fort_prograsive`
--

INSERT INTO `td_fort_prograsive` (`ardb_id`, `entry_date`, `target_id`, `return_form`, `return_to`, `fm_no_case`, `fm_amt`, `nf_no_case`, `nf_amt`, `pl_no_case`, `pl_amt`, `rh_no_case`, `rh_amt`, `shg_no_case`, `shg_amt`, `tot_inv_of_curr_yr_no_case`, `tot_inv_of_curr_yr_amt`, `tot_inv_of_pre_yr_no_case`, `tot_inv_of_pre_yr_amt`, `created_by`, `created_at`, `modified_by`, `modified_at`) VALUES
(22, '2021-03-10', 2, '2021-02-24', '2021-03-10', 10, '200000.00', 20, '300000.00', 30, '400000.00', 40, '500000.00', 50, '600000.00', 150, '2000000.00', 60, '1000000.00', 'bankura', '2021-03-10', 'bankura', '2021-03-10 17:19:01'),
(33, '2021-02-17', 1, '2021-02-08', '2021-02-17', 10, '20.00', 10, '20.00', 10, '20.00', 10, '20.00', 10, '20.00', 50, '100.00', 44, '90.00', 'u_sss', '2021-02-17', 'u_sss', '2021-02-17 06:40:03');

-- --------------------------------------------------------

--
-- Table structure for table `td_fort_target`
--

CREATE TABLE `td_fort_target` (
  `id` bigint(22) NOT NULL,
  `entry_date` date NOT NULL,
  `ardb_id` int(11) NOT NULL,
  `frm_fn_year` int(11) NOT NULL,
  `to_fn_year` int(11) NOT NULL,
  `fm_no_case` int(11) NOT NULL,
  `fm_amt` decimal(10,2) NOT NULL DEFAULT 0.00,
  `nf_no_case` int(11) NOT NULL,
  `nf_amt` decimal(10,2) NOT NULL DEFAULT 0.00,
  `pl_no_case` int(11) NOT NULL,
  `pl_amt` decimal(10,2) NOT NULL DEFAULT 0.00,
  `rh_no_case` int(11) NOT NULL,
  `rh_amt` decimal(10,2) NOT NULL DEFAULT 0.00,
  `shg_no_case` int(11) NOT NULL,
  `shg_amt` decimal(10,2) NOT NULL DEFAULT 0.00,
  `tot_inv_of_curr_yr_no_case` int(11) NOT NULL,
  `tot_inv_of_curr_yr_amt` decimal(10,2) NOT NULL DEFAULT 0.00,
  `tot_inv_of_pre_yr_no_case` int(11) NOT NULL,
  `tot_inv_of_pre_yr_amt` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_by` varchar(50) NOT NULL,
  `created_at` date DEFAULT NULL,
  `modified_by` varchar(50) NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `td_fort_target`
--

INSERT INTO `td_fort_target` (`id`, `entry_date`, `ardb_id`, `frm_fn_year`, `to_fn_year`, `fm_no_case`, `fm_amt`, `nf_no_case`, `nf_amt`, `pl_no_case`, `pl_amt`, `rh_no_case`, `rh_amt`, `shg_no_case`, `shg_amt`, `tot_inv_of_curr_yr_no_case`, `tot_inv_of_curr_yr_amt`, `tot_inv_of_pre_yr_no_case`, `tot_inv_of_pre_yr_amt`, `created_by`, `created_at`, `modified_by`, `modified_at`) VALUES
(1, '2021-02-17', 33, 2020, 2021, 20, '30.00', 20, '30.00', 20, '30.00', 20, '30.00', 20, '30.00', 100, '150.00', 90, '140.00', 'app2_sss', '2021-02-17', 'app2_sss', '2021-02-17 06:37:55'),
(2, '2021-03-10', 22, 2020, 2021, 20, '200000.00', 30, '300000.00', 40, '400000.00', 50, '500000.00', 60, '600000.00', 200, '2000000.00', 190, '1800000.00', 'bankura_a2', '2021-03-10', 'bankura_a2', '2021-03-10 17:16:00');

-- --------------------------------------------------------

--
-- Table structure for table `td_fridy_rtn`
--

CREATE TABLE `td_fridy_rtn` (
  `ardb_id` int(10) NOT NULL,
  `week_dt` date NOT NULL,
  `rd` decimal(20,2) NOT NULL DEFAULT 0.00,
  `fd` decimal(20,2) NOT NULL DEFAULT 0.00,
  `flexi_sb` decimal(20,2) NOT NULL DEFAULT 0.00,
  `mis` decimal(20,2) NOT NULL DEFAULT 0.00,
  `other_dep` decimal(20,2) NOT NULL DEFAULT 0.00,
  `ibsd` decimal(20,2) NOT NULL DEFAULT 0.00,
  `total_dep_mob` decimal(20,2) NOT NULL DEFAULT 0.00,
  `cash_in_hand` decimal(20,2) NOT NULL DEFAULT 0.00,
  `other_bank` decimal(20,2) NOT NULL DEFAULT 0.00,
  `ibsd_loan` decimal(20,2) NOT NULL DEFAULT 0.00,
  `dep_loan` decimal(20,2) NOT NULL DEFAULT 0.00,
  `wbcardb_remit_slr` decimal(20,2) NOT NULL DEFAULT 0.00,
  `wbcardb_remit_slr_excess` decimal(20,2) NOT NULL DEFAULT 0.00,
  `total_fund_deploy` decimal(20,2) NOT NULL DEFAULT 0.00,
  `ibsd_as` decimal(20,2) NOT NULL DEFAULT 0.00,
  `uploded_by` varchar(50) DEFAULT NULL,
  `uploaded_dt` datetime DEFAULT NULL,
  `fwd_data` enum('N','Y','R','A') NOT NULL DEFAULT 'A' COMMENT 'N:Not fwd; Y:fwd; R:reject; A:approve',
  `fwd_by` varchar(50) DEFAULT NULL,
  `fwd_at` datetime DEFAULT NULL,
  `approve_1` enum('N','Y','R','A') NOT NULL DEFAULT 'A' COMMENT 'N:Not fwd; Y:fwd; R:reject; A:approve',
  `app1_by` varchar(50) DEFAULT NULL,
  `app1_at` datetime DEFAULT NULL,
  `approve_2` enum('N','Y','R','A') NOT NULL DEFAULT 'A' COMMENT 'N:Not fwd; Y:fwd; R:reject; A:approve',
  `app2_by` varchar(50) DEFAULT NULL,
  `app2_at` datetime DEFAULT NULL,
  `ho_fwd_data` enum('Y','N','R','A') NOT NULL DEFAULT 'N',
  `ho_fwd_by` varchar(50) DEFAULT NULL,
  `ho_fwd_at` datetime DEFAULT NULL,
  `ho_approve_1` enum('N','Y','R','A') NOT NULL DEFAULT 'A' COMMENT 'N:Not fwd; Y:fwd; R:reject; A:approve',
  `ho_app1_by` varchar(50) DEFAULT NULL,
  `ho_app1_at` datetime DEFAULT NULL,
  `ho_approve_2` enum('N','Y','R','A') NOT NULL DEFAULT 'A' COMMENT 'N:Not fwd; Y:fwd; R:reject; A:approve',
  `ho_app2_by` varchar(50) DEFAULT NULL,
  `ho_app2_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `td_fridy_rtn`
--

INSERT INTO `td_fridy_rtn` (`ardb_id`, `week_dt`, `rd`, `fd`, `flexi_sb`, `mis`, `other_dep`, `ibsd`, `total_dep_mob`, `cash_in_hand`, `other_bank`, `ibsd_loan`, `dep_loan`, `wbcardb_remit_slr`, `wbcardb_remit_slr_excess`, `total_fund_deploy`, `ibsd_as`, `uploded_by`, `uploaded_dt`, `fwd_data`, `fwd_by`, `fwd_at`, `approve_1`, `app1_by`, `app1_at`, `approve_2`, `app2_by`, `app2_at`, `ho_fwd_data`, `ho_fwd_by`, `ho_fwd_at`, `ho_approve_1`, `ho_app1_by`, `ho_app1_at`, `ho_approve_2`, `ho_app2_by`, `ho_app2_at`) VALUES
(2, '2020-10-30', '400000.00', '800000.00', '600000.00', '550000.00', '400000.00', '60000.00', '3000000.00', '250000.00', '60000.00', '120000.00', '1000000.00', '500000.00', '0.00', '800000.00', '-100.00', 'arambagh', '2020-11-02 09:00:35', 'A', NULL, NULL, 'A', NULL, NULL, 'A', NULL, NULL, 'N', NULL, NULL, 'A', NULL, NULL, 'A', NULL, NULL),
(3, '2020-09-11', '400000.00', '800000.00', '600000.00', '550000.00', '400000.00', '60000.00', '3000000.00', '250000.00', '60000.00', '120000.00', '1000000.00', '500000.00', '0.00', '800000.00', '-100.00', 'bankura', '2020-11-02 12:30:15', 'A', NULL, NULL, 'A', NULL, NULL, 'A', NULL, NULL, 'N', NULL, NULL, 'A', NULL, NULL, 'A', NULL, NULL),
(3, '2020-10-15', '400000.00', '800000.00', '600000.00', '550000.00', '400000.00', '60000.00', '3000000.00', '250000.00', '60000.00', '120000.00', '1000000.00', '500000.00', '0.00', '800000.00', '-100.00', 'bankura', '2020-11-02 12:31:52', 'A', NULL, NULL, 'A', NULL, NULL, 'A', NULL, NULL, 'N', NULL, NULL, 'A', NULL, NULL, 'A', NULL, NULL),
(3, '2020-10-16', '400000.00', '800000.00', '600000.00', '550000.00', '400000.00', '60000.00', '3000000.00', '250000.00', '60000.00', '120000.00', '1000000.00', '500000.00', '0.00', '800000.00', '-100.00', 'bankura', '2020-11-02 13:03:57', 'A', NULL, NULL, 'A', NULL, NULL, 'A', NULL, NULL, 'N', NULL, NULL, 'A', NULL, NULL, 'A', NULL, NULL),
(3, '2020-10-25', '400000.00', '800000.00', '600000.00', '550000.00', '400000.00', '60000.00', '3000000.00', '250000.00', '60000.00', '120000.00', '1000000.00', '500000.00', '0.00', '800000.00', '-100.00', 'bankura', '2020-11-03 09:10:21', 'A', NULL, NULL, 'A', NULL, NULL, 'A', NULL, NULL, 'N', NULL, NULL, 'A', NULL, NULL, 'A', NULL, NULL),
(3, '2020-11-01', '400000.00', '800000.00', '600000.00', '550000.00', '400000.00', '60000.00', '3000000.00', '250000.00', '60000.00', '120000.00', '1000000.00', '500000.00', '0.00', '800000.00', '-100.00', 'bankura', '2020-11-02 08:41:51', 'A', NULL, NULL, 'A', NULL, NULL, 'A', NULL, NULL, 'N', NULL, NULL, 'A', NULL, NULL, 'A', NULL, NULL),
(3, '2020-11-02', '400000.00', '800000.00', '600000.00', '550000.00', '400000.00', '60000.00', '3000000.00', '250000.00', '60000.00', '120000.00', '1000000.00', '500000.00', '0.00', '800000.00', '-100.00', 'bankura', '2020-11-02 12:30:00', 'A', NULL, NULL, 'A', NULL, NULL, 'A', NULL, NULL, 'N', NULL, NULL, 'A', NULL, NULL, 'A', NULL, NULL),
(22, '2021-03-10', '10000.00', '20000.00', '300000.00', '200000.00', '20000.00', '10000.00', '560000.00', '100000.00', '20000.00', '40000.00', '300000.00', '40000.00', '60000.00', '560000.00', '0.00', 'bankura', '2021-03-10 05:12:25', 'Y', 'bankura', '2021-03-10 05:12:44', 'Y', 'bankura_a1', '2021-03-10 05:22:08', 'Y', 'bankura_a2', '2021-03-10 05:22:28', 'N', NULL, NULL, 'A', NULL, NULL, 'A', NULL, NULL),
(33, '2021-02-17', '20000.00', '10000.00', '20000.00', '300000.00', '20000.00', '200000.00', '570000.00', '100000.00', '20000.00', '10000.00', '200000.00', '200000.00', '40000.00', '570000.00', '0.00', 'u_sss', '2021-02-17 06:50:21', 'Y', 'u_sss', '2021-02-17 06:50:26', 'Y', 'app1_sss', '2021-02-17 06:51:09', 'Y', 'app2_sss', '2021-02-17 07:03:05', 'Y', 'sss_u', '2021-02-17 08:34:59', 'Y', 'sss_a1', '2021-02-17 08:39:01', 'A', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `td_investment`
--

CREATE TABLE `td_investment` (
  `ardb_id` int(10) NOT NULL,
  `return_dt` date NOT NULL,
  `from_fin_yr` int(11) NOT NULL,
  `to_fin_yr` int(11) NOT NULL,
  `prv_frm_fin_yr` int(11) NOT NULL,
  `prv_to_fin_yr` int(11) NOT NULL,
  `no_acc_closed` int(10) NOT NULL DEFAULT 0,
  `prog_brro_memb` int(10) NOT NULL DEFAULT 0,
  `farm_sec_case_no` int(10) NOT NULL DEFAULT 0,
  `farm_sec_amt` decimal(20,2) NOT NULL DEFAULT 0.00,
  `non_farm_sec_case_no` int(10) NOT NULL DEFAULT 0,
  `non_farm_sec_amt` decimal(20,2) NOT NULL DEFAULT 0.00,
  `housing_sec_case_no` int(10) NOT NULL DEFAULT 0,
  `housing_sec_amt` decimal(20,2) NOT NULL DEFAULT 0.00,
  `other_sec_case_no` int(10) NOT NULL DEFAULT 0,
  `other_sec_amt` decimal(20,2) NOT NULL DEFAULT 0.00,
  `non_sch_inv_case_no` int(10) NOT NULL DEFAULT 0,
  `non_sch_inv_amt` decimal(20,2) NOT NULL DEFAULT 0.00,
  `tot_inv_case_no` int(10) NOT NULL DEFAULT 0,
  `tot_inv_amt` decimal(20,2) NOT NULL DEFAULT 0.00,
  `tot_inv_case_no_prv_yr` int(10) NOT NULL DEFAULT 0,
  `tot_inv_amt_prv_yr` decimal(20,2) NOT NULL DEFAULT 0.00,
  `sc` int(11) NOT NULL,
  `st` int(11) NOT NULL,
  `obca` int(11) NOT NULL,
  `obcb` int(11) NOT NULL,
  `gen` int(11) NOT NULL,
  `total_1` int(11) NOT NULL,
  `marginal` int(11) NOT NULL,
  `small` int(11) NOT NULL,
  `big` int(11) NOT NULL,
  `sal_earner` int(11) NOT NULL,
  `bussiness` int(11) NOT NULL,
  `total_2` int(11) NOT NULL,
  `male` int(11) NOT NULL,
  `female` int(11) NOT NULL,
  `total_3` int(11) NOT NULL,
  `fwd_data` enum('N','Y','R','A') NOT NULL DEFAULT 'A' COMMENT 'N:Not fwd; Y:fwd; R:reject; A:approve',
  `fwd_by` varchar(50) DEFAULT NULL,
  `fwd_at` datetime DEFAULT NULL,
  `approve_1` enum('N','Y','R','A') NOT NULL DEFAULT 'A' COMMENT 'N:Not fwd; Y:fwd; R:reject; A:approve',
  `app1_by` varchar(50) DEFAULT NULL,
  `app1_at` datetime DEFAULT NULL,
  `approve_2` enum('N','Y','R','A') NOT NULL DEFAULT 'A' COMMENT 'N:Not fwd; Y:fwd; R:reject; A:approve',
  `app2_by` varchar(50) DEFAULT NULL,
  `app2_at` datetime DEFAULT NULL,
  `ho_fwd_data` enum('N','Y','R','A') NOT NULL DEFAULT 'A' COMMENT 'N:Not fwd; Y:fwd; R:reject; A:approve',
  `ho_fwd_by` varchar(50) DEFAULT NULL,
  `ho_fwd_at` datetime DEFAULT NULL,
  `ho_approve_1` enum('N','Y','R','A') NOT NULL DEFAULT 'A' COMMENT 'N:Not fwd; Y:fwd; R:reject; A:approve',
  `ho_app1_by` varchar(50) DEFAULT NULL,
  `ho_app1_at` datetime DEFAULT NULL,
  `ho_approve_2` enum('N','Y','R','A') NOT NULL DEFAULT 'A' COMMENT 'N:Not fwd; Y:fwd; R:reject; A:approve',
  `ho_app2_by` varchar(50) DEFAULT NULL,
  `ho_app2_at` datetime DEFAULT NULL,
  `uploaded_by` varchar(50) DEFAULT NULL,
  `uploaded_dt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `td_investment`
--

INSERT INTO `td_investment` (`ardb_id`, `return_dt`, `from_fin_yr`, `to_fin_yr`, `prv_frm_fin_yr`, `prv_to_fin_yr`, `no_acc_closed`, `prog_brro_memb`, `farm_sec_case_no`, `farm_sec_amt`, `non_farm_sec_case_no`, `non_farm_sec_amt`, `housing_sec_case_no`, `housing_sec_amt`, `other_sec_case_no`, `other_sec_amt`, `non_sch_inv_case_no`, `non_sch_inv_amt`, `tot_inv_case_no`, `tot_inv_amt`, `tot_inv_case_no_prv_yr`, `tot_inv_amt_prv_yr`, `sc`, `st`, `obca`, `obcb`, `gen`, `total_1`, `marginal`, `small`, `big`, `sal_earner`, `bussiness`, `total_2`, `male`, `female`, `total_3`, `fwd_data`, `fwd_by`, `fwd_at`, `approve_1`, `app1_by`, `app1_at`, `approve_2`, `app2_by`, `app2_at`, `ho_fwd_data`, `ho_fwd_by`, `ho_fwd_at`, `ho_approve_1`, `ho_app1_by`, `ho_app1_at`, `ho_approve_2`, `ho_app2_by`, `ho_app2_at`, `uploaded_by`, `uploaded_dt`) VALUES
(22, '2021-02-03', 2020, 2021, 2019, 2020, 10, 20, 10, '200000.00', 20, '300000.00', 40, '400000.00', 50, '500000.00', 60, '600000.00', 120, '1400000.00', 200, '2000000.00', 10, 10, 20, 10, 10, 60, 20, 10, 10, 10, 10, 60, 40, 20, 60, 'A', NULL, NULL, 'A', NULL, NULL, 'A', NULL, NULL, 'A', NULL, NULL, 'A', NULL, NULL, 'A', NULL, NULL, 'bankura', '2021-02-03 03:31:26');

-- --------------------------------------------------------

--
-- Table structure for table `td_sanc_amt`
--

CREATE TABLE `td_sanc_amt` (
  `ardb_id` int(11) NOT NULL,
  `effective_date` date NOT NULL,
  `sector_id` int(11) NOT NULL,
  `sanction_amt` bigint(22) NOT NULL,
  `created_by` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_by` text NOT NULL,
  `modified_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `td_sanc_amt`
--

INSERT INTO `td_sanc_amt` (`ardb_id`, `effective_date`, `sector_id`, `sanction_amt`, `created_by`, `created_at`, `modified_by`, `modified_at`) VALUES
(22, '2021-01-12', 10, 3000000, 'sss_u', '2021-01-12 17:47:16', 'sss_u', '2021-01-12 17:47:16'),
(22, '2021-01-12', 20, 800000, 'sss_u', '2021-01-12 17:47:16', 'sss_u', '2021-01-12 17:47:16'),
(22, '2021-01-12', 23, 900000, 'sss_u', '2021-01-12 17:46:30', 'sss_u', '2021-01-12 17:46:30'),
(22, '2021-09-02', 10, 300000, 'sss_u', '2021-09-02 17:45:55', 'sss_u', '2021-09-02 17:45:55'),
(22, '2021-09-02', 14, 90000, 'sss_u', '2021-09-02 17:45:55', 'sss_u', '2021-09-02 17:45:55'),
(22, '2021-09-02', 20, 1067700, 'sss_u', '2021-09-02 17:45:55', 'sss_u', '2021-09-02 17:45:55');

-- --------------------------------------------------------

--
-- Table structure for table `test_subscription`
--

CREATE TABLE `test_subscription` (
  `user_id` bigint(22) NOT NULL,
  `form_time` datetime NOT NULL,
  `to_time` datetime NOT NULL,
  `time_zone` varchar(100) NOT NULL,
  `flag` tinyint(1) NOT NULL DEFAULT 0,
  `order_limit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_subscription`
--

INSERT INTO `test_subscription` (`user_id`, `form_time`, `to_time`, `time_zone`, `flag`, `order_limit`) VALUES
(2, '2021-03-17 16:27:14', '2021-03-18 16:27:14', 'Asia/Kolkata', 0, '24'),
(2, '2021-03-17 22:36:14', '2021-03-18 22:36:14', 'America/Los_Angeles', 1, '24'),
(2, '2021-03-18 06:34:59', '2021-03-19 06:34:59', 'Europe/Paris', 1, '24'),
(2, '2021-03-18 07:59:33', '2021-03-19 07:59:33', 'Europe/Berlin', 1, '24'),
(2, '2021-03-18 13:29:42', '2021-03-19 13:29:42', 'Asia/Singapore', 1, '24'),
(4, '2021-03-17 01:57:06', '2021-03-18 01:57:06', 'Australia/Perth', 1, '24'),
(6, '2021-03-17 02:20:29', '2021-03-18 02:20:29', 'Asia/Kolkata', 1, '24');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_fort_dr`
-- (See below for the actual view)
--
CREATE TABLE `vw_fort_dr` (
`dmd_id` int(11)
,`ardb_id` int(11)
,`return_form` date
,`return_to` date
,`sector_id` int(11)
,`dmd_frm_fin_yr` int(11)
,`dmd_to_fin_yr` int(11)
,`dmd_prn_od` decimal(10,2)
,`dmd_prn_cr` decimal(10,2)
,`dmd_prn_tot` decimal(10,2)
,`dmd_int_od` decimal(10,2)
,`dmd_int_cr` decimal(10,2)
,`dmd_int_tot` decimal(10,2)
,`tot_dmd` decimal(10,2)
,`col_prn_od` decimal(10,2)
,`col_prn_cr` decimal(10,2)
,`col_prn_adv` decimal(10,2)
,`col_prn_tot` decimal(10,2)
,`col_int_od` decimal(10,2)
,`col_int_cr` decimal(10,2)
,`col_int_tot` decimal(10,2)
,`tot_colc` decimal(10,2)
,`recov_per` decimal(10,2)
,`pro_prn_od` decimal(10,2)
,`pro_prn_cr` decimal(10,2)
,`pro_prn_adv` decimal(10,2)
,`pro_prn_tot` decimal(10,2)
,`pro_int_od` decimal(10,2)
,`pro_int_cr` decimal(10,2)
,`pro_int_tot` decimal(10,2)
,`pro_tot_colc` decimal(10,2)
,`fwd_data` enum('N','Y','R','A')
,`approve_1` enum('N','Y','R','A')
,`approve_2` enum('N','Y','R','A')
,`ho_fwd_data` enum('N','Y','R','A')
,`ho_approve_1` enum('N','Y','R','A')
,`ho_approve_2` enum('N','Y','R','A')
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_docket`
-- (See below for the actual view)
--
CREATE TABLE `v_docket` (
`memo_no` varchar(50)
,`pronote_no` varchar(50)
,`pronote_date` date
,`dock_no` bigint(22)
);

-- --------------------------------------------------------

--
-- Structure for view `vw_fort_dr`
--
DROP TABLE IF EXISTS `vw_fort_dr`;

CREATE ALGORITHM=UNDEFINED DEFINER=`wbscardb`@`%` SQL SECURITY DEFINER VIEW `vw_fort_dr`  AS SELECT `b`.`id` AS `dmd_id`, `b`.`ardb_id` AS `ardb_id`, `a`.`return_form` AS `return_form`, `a`.`return_to` AS `return_to`, `b`.`sector_id` AS `sector_id`, `b`.`frm_fn_year` AS `dmd_frm_fin_yr`, `b`.`to_fn_year` AS `dmd_to_fin_yr`, `b`.`pri_od` AS `dmd_prn_od`, `b`.`pri_cr` AS `dmd_prn_cr`, `b`.`pri_tot` AS `dmd_prn_tot`, `b`.`int_od` AS `dmd_int_od`, `b`.`int_cr` AS `dmd_int_cr`, `b`.`int_tot` AS `dmd_int_tot`, `b`.`tot_dmd` AS `tot_dmd`, `a`.`pri_od` AS `col_prn_od`, `a`.`pri_cr` AS `col_prn_cr`, `a`.`pri_adv` AS `col_prn_adv`, `a`.`pri_tot` AS `col_prn_tot`, `a`.`int_od` AS `col_int_od`, `a`.`int_cr` AS `col_int_cr`, `a`.`int_tot` AS `col_int_tot`, `a`.`tot_colc` AS `tot_colc`, `a`.`recov_per` AS `recov_per`, `c`.`pri_od` AS `pro_prn_od`, `c`.`pri_cr` AS `pro_prn_cr`, `c`.`pri_adv` AS `pro_prn_adv`, `c`.`pri_tot` AS `pro_prn_tot`, `c`.`int_od` AS `pro_int_od`, `c`.`int_cr` AS `pro_int_cr`, `c`.`int_tot` AS `pro_int_tot`, `c`.`tot_colc` AS `pro_tot_colc`, `a`.`fwd_data` AS `fwd_data`, `a`.`approve_1` AS `approve_1`, `a`.`approve_2` AS `approve_2`, `a`.`ho_fwd_data` AS `ho_fwd_data`, `a`.`ho_approve_1` AS `ho_approve_1`, `a`.`ho_approve_2` AS `ho_approve_2` FROM ((`td_fort_dr_col` `a` join `td_fort_dr_dmd` `b` on(`a`.`dmd_id` = `b`.`id` and `a`.`ardb_id` = `b`.`ardb_id` and `a`.`sector_id` = `b`.`sector_id`)) join `td_fort_dr_prog` `c` on(`a`.`ardb_id` = `c`.`ardb_id` and `a`.`sector_id` = `c`.`sector_id` and `a`.`dmd_id` = `c`.`dmd_id` and `a`.`return_form` = `c`.`return_form` and `a`.`return_to` = `c`.`return_to`)) ORDER BY `a`.`ardb_id` ASC, `a`.`return_form` ASC, `a`.`return_to` ASC, `a`.`sector_id` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `v_docket`
--
DROP TABLE IF EXISTS `v_docket`;

CREATE ALGORITHM=UNDEFINED DEFINER=`wbscardb`@`%` SQL SECURITY DEFINER VIEW `v_docket`  AS SELECT `td_dc_shg`.`memo_no` AS `memo_no`, `td_dc_shg`.`pronote_no` AS `pronote_no`, `td_dc_shg`.`pronote_date` AS `pronote_date`, `td_dc_shg`.`dock_no` AS `dock_no` FROM `td_dc_shg` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `last_activity_idx` (`timestamp`);

--
-- Indexes for table `md_block`
--
ALTER TABLE `md_block`
  ADD PRIMARY KEY (`sl_no`);

--
-- Indexes for table `md_district`
--
ALTER TABLE `md_district`
  ADD PRIMARY KEY (`district_code`);

--
-- Indexes for table `md_purpose`
--
ALTER TABLE `md_purpose`
  ADD PRIMARY KEY (`purpose_code`);

--
-- Indexes for table `md_report_type`
--
ALTER TABLE `md_report_type`
  ADD PRIMARY KEY (`sl_no`);

--
-- Indexes for table `md_sector`
--
ALTER TABLE `md_sector`
  ADD PRIMARY KEY (`sector_code`);

--
-- Indexes for table `md_users`
--
ALTER TABLE `md_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `mm_ardb_ho`
--
ALTER TABLE `mm_ardb_ho`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_test`
--
ALTER TABLE `tb_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `td_apex_self`
--
ALTER TABLE `td_apex_self`
  ADD PRIMARY KEY (`ardb_id`,`memo_no`,`memo_date`,`pronote_no`,`lso_no`) USING BTREE;

--
-- Indexes for table `td_apex_self_api`
--
ALTER TABLE `td_apex_self_api`
  ADD PRIMARY KEY (`ardb_id`,`memo_no`,`pronote_no`,`lso_no`) USING BTREE;

--
-- Indexes for table `td_apex_self_borrower`
--
ALTER TABLE `td_apex_self_borrower`
  ADD PRIMARY KEY (`ardb_id`,`memo_no`,`entry_date`,`pronote_no`) USING BTREE;

--
-- Indexes for table `td_apex_self_dis`
--
ALTER TABLE `td_apex_self_dis`
  ADD PRIMARY KEY (`ardb_id`,`memo_no`,`pronote_no`,`lso_no`,`entry_date`) USING BTREE;

--
-- Indexes for table `td_apex_self_dtls`
--
ALTER TABLE `td_apex_self_dtls`
  ADD PRIMARY KEY (`ardb_id`,`memo_no`,`pronote_no`,`entry_date`,`lso_no`) USING BTREE;

--
-- Indexes for table `td_apex_shg`
--
ALTER TABLE `td_apex_shg`
  ADD PRIMARY KEY (`ardb_id`,`memo_no`,`memo_date`,`pronote_no`,`lso_no`) USING BTREE;

--
-- Indexes for table `td_apex_shg_api`
--
ALTER TABLE `td_apex_shg_api`
  ADD PRIMARY KEY (`ardb_id`,`lso_no`) USING BTREE;

--
-- Indexes for table `td_apex_shg_borrower`
--
ALTER TABLE `td_apex_shg_borrower`
  ADD PRIMARY KEY (`ardb_id`,`memo_no`,`entry_date`,`pronote_no`) USING BTREE;

--
-- Indexes for table `td_apex_shg_dis`
--
ALTER TABLE `td_apex_shg_dis`
  ADD PRIMARY KEY (`ardb_id`,`memo_no`,`pronote_no`,`lso_no`,`entry_date`) USING BTREE;

--
-- Indexes for table `td_apex_shg_dtls`
--
ALTER TABLE `td_apex_shg_dtls`
  ADD PRIMARY KEY (`ardb_id`,`memo_no`,`pronote_no`,`entry_date`,`lso_no`) USING BTREE;

--
-- Indexes for table `td_borrower_classification`
--
ALTER TABLE `td_borrower_classification`
  ADD PRIMARY KEY (`ardb_id`,`return_dt`) USING BTREE;

--
-- Indexes for table `td_dc`
--
ALTER TABLE `td_dc`
  ADD PRIMARY KEY (`ardb_id`,`return_dt`,`brrower_name`);

--
-- Indexes for table `td_dc_self`
--
ALTER TABLE `td_dc_self`
  ADD PRIMARY KEY (`ardb_id`,`entry_date`,`memo_no`,`pronote_no`);

--
-- Indexes for table `td_dc_self_borrower`
--
ALTER TABLE `td_dc_self_borrower`
  ADD PRIMARY KEY (`ardb_id`,`entry_date`,`memo_no`,`pronote_no`);

--
-- Indexes for table `td_dc_self_dtls`
--
ALTER TABLE `td_dc_self_dtls`
  ADD PRIMARY KEY (`sl_no`,`ardb_id`,`entry_date`,`memo_no`,`pronote_no`);

--
-- Indexes for table `td_dc_self_upload`
--
ALTER TABLE `td_dc_self_upload`
  ADD PRIMARY KEY (`sl_no`);

--
-- Indexes for table `td_dc_shg`
--
ALTER TABLE `td_dc_shg`
  ADD PRIMARY KEY (`ardb_id`,`entry_date`,`memo_no`,`pronote_no`);

--
-- Indexes for table `td_dc_shg_borrower`
--
ALTER TABLE `td_dc_shg_borrower`
  ADD PRIMARY KEY (`ardb_id`,`entry_date`,`memo_no`,`pronote_no`);

--
-- Indexes for table `td_dc_shg_dtls`
--
ALTER TABLE `td_dc_shg_dtls`
  ADD PRIMARY KEY (`ardb_id`,`entry_date`,`memo_no`,`pronote_no`,`sl_no`) USING BTREE;

--
-- Indexes for table `td_dc_shg_upload`
--
ALTER TABLE `td_dc_shg_upload`
  ADD PRIMARY KEY (`sl_no`);

--
-- Indexes for table `td_fortnight`
--
ALTER TABLE `td_fortnight`
  ADD PRIMARY KEY (`ardb_id`,`return_dt`,`report_type`) USING BTREE;

--
-- Indexes for table `td_fort_borr`
--
ALTER TABLE `td_fort_borr`
  ADD PRIMARY KEY (`ardb_id`,`target_id`,`return_form`,`return_to`);

--
-- Indexes for table `td_fort_dr_col`
--
ALTER TABLE `td_fort_dr_col`
  ADD PRIMARY KEY (`ardb_id`,`sector_id`,`dmd_id`,`entry_date`,`return_form`,`return_to`);

--
-- Indexes for table `td_fort_dr_dmd`
--
ALTER TABLE `td_fort_dr_dmd`
  ADD PRIMARY KEY (`id`,`entry_date`,`ardb_id`,`sector_id`);

--
-- Indexes for table `td_fort_dr_prog`
--
ALTER TABLE `td_fort_dr_prog`
  ADD PRIMARY KEY (`ardb_id`,`sector_id`,`dmd_id`,`entry_date`,`return_form`,`return_to`);

--
-- Indexes for table `td_fort_inv`
--
ALTER TABLE `td_fort_inv`
  ADD PRIMARY KEY (`ardb_id`,`target_id`,`return_form`,`return_to`) USING BTREE;

--
-- Indexes for table `td_fort_prograsive`
--
ALTER TABLE `td_fort_prograsive`
  ADD PRIMARY KEY (`ardb_id`,`target_id`,`return_form`,`return_to`) USING BTREE;

--
-- Indexes for table `td_fort_target`
--
ALTER TABLE `td_fort_target`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `td_fridy_rtn`
--
ALTER TABLE `td_fridy_rtn`
  ADD PRIMARY KEY (`ardb_id`,`week_dt`);

--
-- Indexes for table `td_investment`
--
ALTER TABLE `td_investment`
  ADD PRIMARY KEY (`ardb_id`,`return_dt`) USING BTREE;

--
-- Indexes for table `td_sanc_amt`
--
ALTER TABLE `td_sanc_amt`
  ADD PRIMARY KEY (`ardb_id`,`effective_date`,`sector_id`);

--
-- Indexes for table `test_subscription`
--
ALTER TABLE `test_subscription`
  ADD PRIMARY KEY (`user_id`,`form_time`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `md_block`
--
ALTER TABLE `md_block`
  MODIFY `sl_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=651;

--
-- AUTO_INCREMENT for table `md_district`
--
ALTER TABLE `md_district`
  MODIFY `district_code` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `md_report_type`
--
ALTER TABLE `md_report_type`
  MODIFY `sl_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mm_ardb_ho`
--
ALTER TABLE `mm_ardb_ho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tb_test`
--
ALTER TABLE `tb_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `td_dc_self_upload`
--
ALTER TABLE `td_dc_self_upload`
  MODIFY `sl_no` bigint(22) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `td_dc_shg_upload`
--
ALTER TABLE `td_dc_shg_upload`
  MODIFY `sl_no` bigint(22) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `td_fort_dr_dmd`
--
ALTER TABLE `td_fort_dr_dmd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `td_fort_target`
--
ALTER TABLE `td_fort_target`
  MODIFY `id` bigint(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
