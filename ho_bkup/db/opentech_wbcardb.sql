-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 24, 2020 at 05:05 PM
-- Server version: 5.7.30-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `opentech_wbcardb`
--

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
-- Table structure for table `md_users`
--

CREATE TABLE `md_users` (
  `user_id` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` char(1) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `br_id` int(5) DEFAULT NULL,
  `user_status` char(1) NOT NULL DEFAULT 'A',
  `created_by` varchar(50) DEFAULT NULL,
  `created_dt` datetime DEFAULT NULL,
  `modified_by` varchar(50) DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `md_users`
--

INSERT INTO `md_users` (`user_id`, `password`, `user_type`, `user_name`, `br_id`, `user_status`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
('arambagh', '$2y$10$vqmY6BOtMKfG0MpQVBPQIu1po7RJvKW78oOyNceHKN3hq/yzIrmcq', 'U', 'Arambagh ARDB', 2, 'A', 'Synergic', '2020-06-22 01:39:09', NULL, NULL),
('bankura', '$2y$10$CCZgrP.bi8Oi6FyF43YCL.ML.9p1lj9AmqFA3GGPq4tFrsU6aN1u6', 'U', 'Bankura ARDB', 3, 'A', 'Synergic', '2020-06-22 02:05:28', NULL, NULL),
('lokesh', '$2y$10$0vG1EmAnRRf7yU60R99Ive18lL6bmn6mAlYdDtPkwAih0NLNRHSvG', 'U', 'Burdwan ARDB', 5, 'A', 'Synergic', '2020-06-22 02:03:20', NULL, NULL),
('sss', '$2y$10$iumxF5civQAQyQpnEnm8peg1lkm0iNgAw7Xw4HlteHRw2vMS8wy4y', 'A', 'Synergic', 1, 'A', 'tan', '2019-01-16 02:01:01', NULL, NULL);

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
  `dist` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mm_ardb_ho`
--

INSERT INTO `mm_ardb_ho` (`id`, `name`, `address`, `ph_no`, `email`, `dist`) VALUES
(1, 'West Bengal Co-operative Agriculture & Rural Developement Bank', '', '', '', 0),
(2, 'Arambagh ARDB', '', '', '', 0),
(3, 'Bankura ARDB', '', '', '', 0),
(4, 'Birbhum ARDB', '', '', '', 0),
(5, 'Burdwan ARDB', '', '', '', 0),
(6, 'Contai ARDB', '', '', '', 0),
(7, 'Ghatal ARDB', '', '', '', 0),
(8, 'Hooghly ARDB', '', '', '', 0),
(9, 'Jhargram ARDB', '', '', '', 0),
(10, 'Katwa-kalna ARDB', '', '', '', 0),
(11, 'Midnapore ARDB', '', '', '', 0),
(12, 'Rampurhat ARDB', '', '', '', 0),
(13, 'Tamluk ARDB', '', '', '', 0),
(14, 'North 24 Prgs ARDB', '', '', '', 0),
(15, 'South 24 Prgs ARDB', '', '', '', 0),
(16, 'Howrah ARDB', '', '', '', 0),
(17, 'Kandi ARDB', '', '', '', 0),
(18, 'Murshidabad ARDB', '', '', '', 0),
(19, 'Nadia ARDB', '', '', '', 0),
(20, 'Alipurduar ARDB', '', '', '', 0),
(21, 'Coochbehar ARDB', '', '', '', 0),
(22, 'Dk. Dinajpur ARDB', '', '', '', 0),
(23, 'Jalpaiguri ARDB', '', '', '', 0),
(24, 'Malda ARDB', '', '', '', 0),
(25, 'Raiganj ARDB', '', '', '', 0),
(26, 'Darjeeling Dist. Office ARDB', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `td_borrower_classification`
--

CREATE TABLE `td_borrower_classification` (
  `ardb_id` int(11) NOT NULL,
  `return_dt` date NOT NULL,
  `sc` decimal(20,2) NOT NULL DEFAULT '0.00',
  `st` decimal(20,2) NOT NULL DEFAULT '0.00',
  `obc` decimal(20,2) NOT NULL DEFAULT '0.00',
  `gen` decimal(20,2) NOT NULL DEFAULT '0.00',
  `total_1` decimal(20,2) NOT NULL DEFAULT '0.00',
  `marginal` decimal(20,2) NOT NULL DEFAULT '0.00',
  `small` decimal(20,2) NOT NULL DEFAULT '0.00',
  `big` decimal(20,2) NOT NULL DEFAULT '0.00',
  `sal_earner` decimal(20,2) NOT NULL DEFAULT '0.00',
  `bussiness` decimal(20,2) NOT NULL DEFAULT '0.00',
  `total_2` decimal(20,2) NOT NULL DEFAULT '0.00',
  `male` decimal(20,2) NOT NULL DEFAULT '0.00',
  `female` decimal(20,2) NOT NULL DEFAULT '0.00',
  `total_3` decimal(20,2) NOT NULL DEFAULT '0.00',
  `uploaded_by` varchar(50) DEFAULT NULL,
  `uploaded_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `td_borrower_classification`
--

INSERT INTO `td_borrower_classification` (`ardb_id`, `return_dt`, `sc`, `st`, `obc`, `gen`, `total_1`, `marginal`, `small`, `big`, `sal_earner`, `bussiness`, `total_2`, `male`, `female`, `total_3`, `uploaded_by`, `uploaded_dt`) VALUES
(3, '2020-06-22', '20.00', '20.00', '30.00', '10.00', '50.00', '80.00', '50.00', '50.00', '50.00', '50.00', '20.00', '20.00', '12.00', '45.00', NULL, NULL),
(4, '2020-06-23', '20.00', '20.00', '30.00', '10.00', '50.00', '80.00', '50.00', '50.00', '50.00', '50.00', '20.00', '20.00', '12.00', '45.00', 'sss', '2020-06-23 00:00:00');

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
  `dmd_prn_od` decimal(20,2) NOT NULL DEFAULT '0.00',
  `dmd_prn_cr` decimal(20,2) NOT NULL DEFAULT '0.00',
  `dmd_prn_tot` decimal(20,2) NOT NULL DEFAULT '0.00',
  `dmd_int_od` decimal(20,2) NOT NULL DEFAULT '0.00',
  `dmd_int_cr` decimal(20,2) NOT NULL DEFAULT '0.00',
  `dmd_int_tot` decimal(20,2) NOT NULL DEFAULT '0.00',
  `tot_dmd` decimal(20,2) NOT NULL DEFAULT '0.00',
  `col_prn_od` decimal(20,2) NOT NULL DEFAULT '0.00',
  `col_prn_cr` decimal(20,2) NOT NULL DEFAULT '0.00',
  `col_prn_adv` decimal(20,2) NOT NULL DEFAULT '0.00',
  `col_prn_tot` decimal(20,2) NOT NULL DEFAULT '0.00',
  `col_int_od` decimal(20,2) NOT NULL DEFAULT '0.00',
  `col_int_cr` decimal(20,2) NOT NULL DEFAULT '0.00',
  `col_int_tot` decimal(20,2) NOT NULL DEFAULT '0.00',
  `tot_colc` decimal(20,2) NOT NULL DEFAULT '0.00',
  `recov_per` decimal(20,2) NOT NULL DEFAULT '0.00',
  `prv_yr_dmd_prn` decimal(20,2) NOT NULL DEFAULT '0.00',
  `prv_yr_dmd_int` decimal(20,2) NOT NULL DEFAULT '0.00',
  `prv_yr_dmd_tot` decimal(20,2) NOT NULL DEFAULT '0.00',
  `prv_yr_col_prn` decimal(20,2) NOT NULL DEFAULT '0.00',
  `prv_yr_col_int` decimal(20,2) NOT NULL DEFAULT '0.00',
  `prv_yr_col_tot` decimal(20,2) NOT NULL DEFAULT '0.00',
  `col_per` decimal(20,2) NOT NULL DEFAULT '0.00',
  `tot_no_ac_dmd` int(10) NOT NULL DEFAULT '0',
  `tot_no_ac_od_dmd` int(10) NOT NULL DEFAULT '0',
  `tot_no_ac_curr_dmd` int(10) NOT NULL DEFAULT '0',
  `tot_no_ac_col` int(10) NOT NULL DEFAULT '0',
  `tot_no_ac_od_col` int(10) NOT NULL DEFAULT '0',
  `tot_no_ac_curr_col` int(10) NOT NULL DEFAULT '0',
  `tot_no_ac_prog` int(10) NOT NULL DEFAULT '0',
  `tot_no_ac_od_prog` int(10) NOT NULL DEFAULT '0',
  `tot_no_ac_curr_prog` int(10) NOT NULL DEFAULT '0',
  `uploaded_by` varchar(50) DEFAULT '0',
  `uploaded_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `td_fortnight`
--

INSERT INTO `td_fortnight` (`ardb_id`, `return_dt`, `report_type`, `dmd_frm_fin_yr`, `dmd_to_fin_yr`, `dmd_prn_od`, `dmd_prn_cr`, `dmd_prn_tot`, `dmd_int_od`, `dmd_int_cr`, `dmd_int_tot`, `tot_dmd`, `col_prn_od`, `col_prn_cr`, `col_prn_adv`, `col_prn_tot`, `col_int_od`, `col_int_cr`, `col_int_tot`, `tot_colc`, `recov_per`, `prv_yr_dmd_prn`, `prv_yr_dmd_int`, `prv_yr_dmd_tot`, `prv_yr_col_prn`, `prv_yr_col_int`, `prv_yr_col_tot`, `col_per`, `tot_no_ac_dmd`, `tot_no_ac_od_dmd`, `tot_no_ac_curr_dmd`, `tot_no_ac_col`, `tot_no_ac_od_col`, `tot_no_ac_curr_col`, `tot_no_ac_prog`, `tot_no_ac_od_prog`, `tot_no_ac_curr_prog`, `uploaded_by`, `uploaded_dt`) VALUES
(1, '2020-06-22', 1, 2020, 2012, '451.00', '256.25', '4155.25', '457841.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', NULL),
(1, '2020-06-22', 2, 1, 2020, '2012.00', '451.00', '256.25', '4155.25', '457841.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'sss', '2020-06-23 15:50:03');

-- --------------------------------------------------------

--
-- Table structure for table `td_fridy_rtn`
--

CREATE TABLE `td_fridy_rtn` (
  `ardb_id` int(10) NOT NULL,
  `week_dt` date NOT NULL,
  `rd` decimal(20,2) NOT NULL DEFAULT '0.00',
  `fd` decimal(20,2) NOT NULL DEFAULT '0.00',
  `flexi_sb` decimal(20,2) NOT NULL DEFAULT '0.00',
  `mis` decimal(20,2) NOT NULL DEFAULT '0.00',
  `other_dep` decimal(20,2) NOT NULL DEFAULT '0.00',
  `ibsd` decimal(20,2) NOT NULL DEFAULT '0.00',
  `total_dep_mob` decimal(20,2) NOT NULL DEFAULT '0.00',
  `cash_in_hand` decimal(20,2) NOT NULL DEFAULT '0.00',
  `other_bank` decimal(20,2) NOT NULL DEFAULT '0.00',
  `ibsd_loan` decimal(20,2) NOT NULL DEFAULT '0.00',
  `dep_loan` decimal(20,2) NOT NULL DEFAULT '0.00',
  `wbcardb_remit_slr` decimal(20,2) NOT NULL DEFAULT '0.00',
  `wbcardb_remit_slr_excess` decimal(20,2) NOT NULL DEFAULT '0.00',
  `total_fund_deploy` decimal(20,2) NOT NULL DEFAULT '0.00',
  `ibsd_as` decimal(20,2) NOT NULL,
  `uploded_by` varchar(50) DEFAULT NULL,
  `uploded_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `td_fridy_rtn`
--

INSERT INTO `td_fridy_rtn` (`ardb_id`, `week_dt`, `rd`, `fd`, `flexi_sb`, `mis`, `other_dep`, `ibsd`, `total_dep_mob`, `cash_in_hand`, `other_bank`, `ibsd_loan`, `dep_loan`, `wbcardb_remit_slr`, `wbcardb_remit_slr_excess`, `total_fund_deploy`, `ibsd_as`, `uploded_by`, `uploded_at`) VALUES
(2, '2020-05-01', '400000.00', '800000.00', '600000.00', '550000.00', '400000.00', '60000.00', '3000000.00', '250000.00', '60000.00', '120000.00', '1000000.00', '500000.00', '0.00', '800000.00', '0.00', NULL, NULL),
(3, '2020-06-15', '2020.00', '2021.00', '2019.00', '2020.00', '50.00', '100.00', '20.00', '12.22', '1000.00', '5263.25', '50.00', '523689.25', '10.00', '4512.25', '0.00', NULL, NULL),
(3, '2020-06-22', '400000.00', '800000.00', '600000.00', '550000.00', '400000.00', '60000.00', '3000000.00', '250000.00', '60000.00', '120000.00', '1000000.00', '500000.00', '0.00', '800000.00', '0.00', NULL, NULL);

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
  `no_acc_closed` int(10) NOT NULL DEFAULT '0',
  `prog_brro_memb` int(10) NOT NULL DEFAULT '0',
  `farm_sec_case_no` int(10) NOT NULL DEFAULT '0',
  `farm_sec_amt` decimal(20,2) NOT NULL DEFAULT '0.00',
  `non_farm_sec_case_no` int(10) NOT NULL DEFAULT '0',
  `non_farm_sec_amt` decimal(20,2) NOT NULL DEFAULT '0.00',
  `housing_sec_case_no` int(10) NOT NULL DEFAULT '0',
  `housing_sec_amt` decimal(20,2) NOT NULL DEFAULT '0.00',
  `other_sec_case_no` int(10) NOT NULL DEFAULT '0',
  `other_sec_amt` decimal(20,2) NOT NULL DEFAULT '0.00',
  `non_sch_inv_case_no` int(10) NOT NULL DEFAULT '0',
  `non_sch_inv_amt` decimal(20,2) NOT NULL DEFAULT '0.00',
  `tot_inv_case_no` int(10) NOT NULL DEFAULT '0',
  `tot_inv_amt` decimal(20,2) NOT NULL DEFAULT '0.00',
  `tot_inv_case_no_prv_yr` int(10) NOT NULL DEFAULT '0',
  `tot_inv_amt_prv_yr` decimal(20,2) NOT NULL DEFAULT '0.00',
  `uploaded_by` varchar(50) DEFAULT NULL,
  `uploaded_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `td_investment`
--

INSERT INTO `td_investment` (`ardb_id`, `return_dt`, `from_fin_yr`, `to_fin_yr`, `prv_frm_fin_yr`, `prv_to_fin_yr`, `no_acc_closed`, `prog_brro_memb`, `farm_sec_case_no`, `farm_sec_amt`, `non_farm_sec_case_no`, `non_farm_sec_amt`, `housing_sec_case_no`, `housing_sec_amt`, `other_sec_case_no`, `other_sec_amt`, `non_sch_inv_case_no`, `non_sch_inv_amt`, `tot_inv_case_no`, `tot_inv_amt`, `tot_inv_case_no_prv_yr`, `tot_inv_amt_prv_yr`, `uploaded_by`, `uploaded_at`) VALUES
(3, '2020-06-22', 2020, 2021, 2019, 2020, 50, 100, 20, '12.22', 1000, '5263.25', 50, '523689.25', 10, '4512.25', 80, '5269874.00', 25, '2545.21', 50, '5214569.25', 'sss', '2020-06-22 11:45:23'),
(4, '2020-06-23', 2020, 2021, 2019, 2020, 2020, 50, 100, '20.00', 12, '1000.00', 5263, '50.00', 523689, '10.00', 4512, '80.00', 5269874, '25.00', 2545, '50.00', '5214569.25', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `md_district`
--
ALTER TABLE `md_district`
  ADD PRIMARY KEY (`district_code`);

--
-- Indexes for table `md_report_type`
--
ALTER TABLE `md_report_type`
  ADD PRIMARY KEY (`sl_no`);

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
-- Indexes for table `td_borrower_classification`
--
ALTER TABLE `td_borrower_classification`
  ADD PRIMARY KEY (`ardb_id`,`return_dt`) USING BTREE;

--
-- Indexes for table `td_fortnight`
--
ALTER TABLE `td_fortnight`
  ADD PRIMARY KEY (`ardb_id`,`return_dt`,`report_type`) USING BTREE;

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
-- AUTO_INCREMENT for dumped tables
--

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
