-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2023 at 05:35 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perfect_skill`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_contact` double NOT NULL,
  `user_profile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `user_name`, `user_email`, `user_password`, `user_contact`, `user_profile`, `created_at`, `updated_at`) VALUES
(1, 'Dacway Admin', 'admin@dacway.com', 'Pass@1234', 1234567890, '/assets/user_profile/dacway.png', NULL, '2022-11-29 03:12:13');

-- --------------------------------------------------------

--
-- Table structure for table `apply_jobs`
--

CREATE TABLE `apply_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_id_fk` int(11) NOT NULL,
  `candidate_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `candidate_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `candidate_portfolio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `candidate_resume` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `candidate_coverletter` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `apply_jobs`
--

INSERT INTO `apply_jobs` (`id`, `job_id_fk`, `candidate_name`, `candidate_email`, `candidate_portfolio`, `candidate_resume`, `candidate_coverletter`, `created_at`, `updated_at`) VALUES
(1, 1, 'ram jondhale', 'ramjondhale@gmail.com', 'make web responsive and interactive', '/assets/resume/442448-epf-pension-case-highlights.pdf', 'cover letter', '2022-11-21 01:05:26', '2022-11-21 01:05:26'),
(2, 2, 'Test_Name', 'testn@gmail.com', 'NA', '/assets/resume/Entry Form.pdf', 'TEST__DESC', '2022-11-21 12:58:11', '2022-11-21 12:58:11'),
(3, 3, 'Yash Wagh', 'yashwagh@gmail.com', 'http://localhost/phpmyadmin/index.php?route=/sql&db=laravel_job_entry&table=admin_users&pos=0', '/assets/resume/Document.pdf', 'Keep in mind, though, that a cover letter is a supplement to your resume, not a replacement. Meaning, you don’t just repeat whatever is mentioned in your resume.', '2022-11-30 00:19:40', '2022-11-30 00:19:40');

-- --------------------------------------------------------

--
-- Table structure for table `assessement_candidate_appears`
--

CREATE TABLE `assessement_candidate_appears` (
  `assCandAppearID` int(10) UNSIGNED NOT NULL,
  `assessmentsIdFk` int(10) UNSIGNED NOT NULL,
  `talentIdFk` bigint(20) UNSIGNED NOT NULL,
  `totalMark` double DEFAULT NULL,
  `attemptQuestion` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assessement_candidate_appears`
--

INSERT INTO `assessement_candidate_appears` (`assCandAppearID`, `assessmentsIdFk`, `talentIdFk`, `totalMark`, `attemptQuestion`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 6, 5, '2023-01-23 08:08:48', '2023-01-23 02:38:26'),
(2, 3, 3, 4, 5, '2023-01-23 08:09:40', '2023-01-23 02:39:19'),
(3, 1, 2, 0, 5, '2023-01-23 08:11:44', '2023-01-23 02:41:25'),
(4, 1, 5, 0, 0, '2023-01-23 11:39:05', '2023-01-23 06:09:01'),
(5, 1, 5, 2, 3, '2023-01-23 11:39:33', '2023-01-23 06:09:17'),
(6, 3, 5, 2, 4, '2023-01-23 11:40:11', '2023-01-23 06:09:57');

-- --------------------------------------------------------

--
-- Table structure for table `assessments`
--

CREATE TABLE `assessments` (
  `assessments_id` int(10) UNSIGNED NOT NULL,
  `assessment_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assessments`
--

INSERT INTO `assessments` (`assessments_id`, `assessment_name`, `created_at`, `updated_at`) VALUES
(1, 'JAVA', '2023-01-17 06:32:52', '2023-01-17 06:32:52'),
(2, 'PHP', '2023-01-18 00:39:04', '2023-01-18 00:39:04'),
(3, 'AJAX', '2023-01-18 02:20:49', '2023-01-18 02:20:49'),
(4, 'React JS', '2023-01-23 01:56:47', '2023-01-23 01:56:47'),
(5, 'this is', '2023-01-31 02:18:21', '2023-01-31 02:18:21');

-- --------------------------------------------------------

--
-- Table structure for table `assessment_questions`
--

CREATE TABLE `assessment_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `assessments_idfk` int(10) UNSIGNED NOT NULL,
  `assessment_question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `assessment_option_1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `assessment_option_2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `assessment_option_3` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assessment_option_4` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assessment_answer` enum('A','B','C','D') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assessment_questions`
--

INSERT INTO `assessment_questions` (`id`, `assessments_idfk`, `assessment_question`, `assessment_option_1`, `assessment_option_2`, `assessment_option_3`, `assessment_option_4`, `assessment_answer`, `created_at`, `updated_at`) VALUES
(1, 1, 'Which of the following is not a keyword in java?', 'Static', 'Boolean', 'Void', 'Private', 'B', '2023-01-18 00:33:39', '2023-01-18 00:33:39'),
(2, 1, 'Which of the following is true about String?', 'String is mutable.', 'String is immutable.', 'String is a data type.', 'None of the above.', 'B', '2023-01-18 00:38:24', '2023-01-18 00:38:24'),
(3, 2, 'Who is the father of PHP?', 'Rasmus Lerdorf', 'Willam Makepiece', 'Drek Kolkevi', 'List Barely', 'A', '2023-01-18 00:43:14', '2023-01-18 00:43:14'),
(4, 2, 'PHP files have a default file extension of.', '.html', '.java', '.php', '.ph', 'C', '2023-01-18 00:44:26', '2023-01-18 03:15:30'),
(5, 2, 'Which of the below statements is equivalent to $add += $add ?', '$add = $add', '$add = $add +$add', '$add = $add + 1', '$add = $add + $add + 1', 'B', '2023-01-18 02:52:57', '2023-01-18 02:52:57'),
(6, 2, 'Which method scope prevents a method from being overridden by a subclass?', 'Abstract', 'Protected', 'Final', 'Static', 'C', '2023-01-18 04:37:45', '2023-01-18 04:37:45'),
(7, 2, 'PHP recognizes constructors by the name.', 'classname()', '_construct()', 'function _construct()', 'function __construct()', 'D', '2023-01-18 04:38:40', '2023-01-18 04:38:40'),
(8, 2, 'Which method is used to tweak an object\'s cloning behavior?', 'clone()', '__clone()', '_clone', 'object_clone()', 'B', '2023-01-18 04:39:45', '2023-01-18 04:39:45'),
(9, 1, 'Code for Java 8 essentially used to be', 'Declarative', 'Imperative', 'Subjective', 'None', 'B', '2023-01-18 04:43:22', '2023-01-18 04:43:22'),
(10, 1, 'Which of these does Stream map() operates on', 'class', 'interface', 'Predicate', 'Function', 'D', '2023-01-18 04:45:25', '2023-01-18 04:45:25'),
(11, 3, 'What is AJAX?', 'is a program', 'is a country name', 'is a football club name', 'All of these', 'A', '2023-01-18 05:00:19', '2023-01-18 05:00:19'),
(12, 3, 'What are all the technologies used by Ajax?', 'JavaScript', 'XMLHttpRequest', 'Document Object Model (DOM)', 'All of the above', 'D', '2023-01-18 05:01:45', '2023-01-18 05:01:45'),
(13, 3, '___ JavaScript is also called server-side JavaScript.', 'Microsoft', 'Navigator', 'LiveWire', 'None', 'C', '2023-01-18 05:02:46', '2023-01-18 05:02:46'),
(14, 3, 'The jQuery AJAX methods .get(), .post(), and .ajax() all require which parameter to be supplied?', 'method', 'url', 'data', 'header', 'B', '2023-01-18 05:03:29', '2023-01-18 05:03:29'),
(15, 3, 'AJAX was made popular by?', 'Microsoft', 'Google', 'Sun Microsystemwrong', 'IBM', 'B', '2023-01-18 05:05:23', '2023-01-18 05:05:23'),
(16, 1, 'Code for Java 8 essentially used to be', 'Declarative', 'Imperative', 'Subjective', 'None', 'B', '2023-01-19 04:46:44', '2023-01-19 04:46:44'),
(17, 1, 'In Java 8 Interfaces, methods can be:', 'default', 'abstract', 'all', 'None', 'C', '2023-01-19 04:47:36', '2023-01-19 04:47:36'),
(18, 1, 'A method within a class is only accessible by classes that are defined within the same package as the class of the method. Which one of the following is used to enforce such restriction?', 'Declare the method with the keyword public', 'Declare the method with the keyword private', 'Declare the method with the keyword protected', 'Do not declare the method with any accessibility modifiers', 'D', '2023-01-19 04:48:29', '2023-01-19 04:48:29'),
(19, 1, 'Which of the following gets introduced with Java 8?', 'Lambda expression', 'Compact profiles', 'Stream API', 'Only first two', 'A', '2023-01-19 04:49:35', '2023-01-19 04:49:35'),
(20, 1, 'What is the return type of lambda expression?', 'String', 'Object', 'void', 'function', 'D', '2023-01-19 04:50:50', '2023-01-19 04:50:50'),
(21, 1, 'A functional interface acts as target types for which of the following?', 'Lambda expression', 'Method reference', 'Constructor reference', 'All of the above', 'D', '2023-01-19 04:51:56', '2023-01-19 04:51:56');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_image`, `created_at`, `updated_at`) VALUES
(1, 'web Developer', '/assets/category_image/Delhi-2.jpeg', '2022-11-21 00:55:56', '2022-11-21 00:56:26'),
(2, 'HR', '/assets/category_image/hr.jpeg', '2022-11-21 12:29:53', '2022-11-21 12:49:10'),
(3, 'Project Manager', '/assets/category_image/bussiness managment.jpg', '2022-11-21 12:38:49', '2022-11-21 12:49:20'),
(4, 'Web Designer', '/assets/category_image/download.png', '2022-11-29 01:31:13', '2022-11-29 23:55:01'),
(5, 'Admin', '/assets/category_image/pngtree-user-vector-icon-png-image_328702.jpg', '2022-11-29 23:56:20', '2022-11-29 23:56:20'),
(6, 'Non - Techncal', '/assets/category_image/images.png', '2022-11-30 00:03:18', '2022-11-30 00:03:18');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hire_talent`
--

CREATE TABLE `hire_talent` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` double NOT NULL,
  `hiretalent_profile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience` int(11) DEFAULT NULL,
  `domain_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_size` int(11) DEFAULT NULL,
  `city_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` int(11) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedIn_profile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skype_profile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(11) DEFAULT 2,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hire_talent`
--

INSERT INTO `hire_talent` (`id`, `full_name`, `email_address`, `company_name`, `password`, `mobile_number`, `hiretalent_profile`, `designation`, `experience`, `domain_name`, `company_size`, `city_name`, `state_name`, `country_name`, `zip_code`, `address`, `linkedIn_profile`, `skype_profile`, `role`, `created_at`, `updated_at`) VALUES
(3, 'prajyot gaikwad', 'prajyot@axelbuzz.com', 'Axelbuzz System', '25f9e794323b453885f5181f1b624d0b', 1234567890, '/assets/hiretalent/profile/MicrosoftTeams-image.png', NULL, NULL, 'AI', 10, 'string', NULL, NULL, NULL, 'Pune', 'https://in.linkedin.com/in/ramkrushna-jondhale-821933182', NULL, 2, '2022-12-30 06:21:12', '2023-01-26 23:15:09'),
(4, 'amresh kumar', 'amresh@dacway.com', 'dac system', '9e679f3e07ee226c002bd8b34f7f8c08', 1234567890, '/assets/hiretalent/profile/167305.jpg', 'Director', 10, 'Digital Agency', 20, NULL, NULL, NULL, NULL, 'Nashik', 'https://in.linkedin.com/', NULL, 2, '2023-01-06 00:57:59', '2023-01-13 07:35:43'),
(5, 'ram jondhale', 'ramjondhale987@gmail.com', 'dacway system', '9e679f3e07ee226c002bd8b34f7f8c08', 8630326408, '/assets/hiretalent/profile/abhiraj-das-ghosh.jpg', 'team lead', 10, 'Digital Agency', 10, NULL, NULL, NULL, NULL, 'pune', 'https://in.linkedin.com/company/dacways', NULL, 2, '2023-01-08 23:16:07', '2023-01-09 08:01:59');

-- --------------------------------------------------------

--
-- Table structure for table `hire_talent_open_positions`
--

CREATE TABLE `hire_talent_open_positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hireTalent_idfk` int(11) NOT NULL,
  `position_unique_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `developer_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_description_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skills` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `working_time_zone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `working_with_period` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_period` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience_required` int(11) NOT NULL,
  `onboard_time_period` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required_developers` int(11) DEFAULT NULL,
  `relevent_option` int(11) DEFAULT NULL,
  `from` int(11) DEFAULT NULL,
  `to` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hire_talent_open_positions`
--

INSERT INTO `hire_talent_open_positions` (`id`, `hireTalent_idfk`, `position_unique_id`, `developer_role`, `job_description_file`, `job_description`, `skills`, `working_time_zone`, `working_with_period`, `time_period`, `experience_required`, `onboard_time_period`, `required_developers`, `relevent_option`, `from`, `to`, `created_at`, `updated_at`) VALUES
(1, 5, 'HR167324565062', 'PHP Developer', NULL, NULL, 'Wordpress,xampp', 'IST Shift', 'Short Term', 'Full Time', 1, '15 Days', 1, NULL, NULL, NULL, '2023-01-09 00:57:30', '2023-01-09 00:57:30'),
(2, 5, 'HR167324744460', 'WordPress Full Stack Developer', NULL, NULL, 'HTML/CSS,Git', 'UK Shift', 'Long Term', 'Part Time', 6, '60 Days', 6, NULL, NULL, NULL, '2023-01-09 01:27:24', '2023-01-09 01:27:24'),
(3, 3, 'HR167335691084', 'WordPress Full Stack Developer', NULL, NULL, 'Wordpress,xampp,PHP,HTML/CSS', 'IST Shift', 'Short Term', 'Full Time', 10, '30 Days', 8, NULL, NULL, NULL, '2023-01-10 07:51:50', '2023-01-10 07:51:50'),
(4, 3, 'HR167360352723', 'WordPress Full Stack Developer', NULL, 'A job description is a document that clearly states essential job requirements, job duties, job responsibilities, and skills required to perform a specific role. A detailed job description will cover how success is measured in the role so it can be used in performance evaluations.', 'Wordpress,PHP,Git', 'IST Shift', 'Long Term', 'Full Time', 10, '15 Days', 10, NULL, NULL, NULL, '2023-01-13 04:22:07', '2023-01-13 04:22:07'),
(5, 3, 'HR167360364110', 'DevOps Engineer', '/assets/hiretalent/open-hiring/sample-job-description.pdf', 'A job description is a document that clearly states essential job requirements, job duties, job responsibilities, and skills required to perform a specific role. A detailed job description will cover how success is measured in the role so it can be used in performance evaluations.', 'Wordpress,xampp,HTML/CSS', 'AU Overlapping', 'Long Term', 'Part Time', 6, '45 Days', 6, NULL, NULL, NULL, '2023-01-13 04:24:02', '2023-01-13 04:24:02'),
(6, 4, 'HR167360396924', 'Back End', '/assets/hiretalent/open-hiring/sample-job-description.pdf', 'Job descriptions are also known as job specifications, job profiles, JDs, and position descriptions (job PD).', 'Wordpress,PHP,Laravel', 'AU Overlapping', 'Long Term', 'Project to Project', 10, '30 Days', 10, NULL, NULL, NULL, '2023-01-13 04:29:29', '2023-01-13 04:29:29'),
(7, 4, 'HR167360400238', 'Mobile App Developer', NULL, NULL, 'xampp,Git', 'US Full Shift', 'Long Term', 'Part Time', 6, '15 Days', 2, NULL, NULL, NULL, '2023-01-13 04:30:02', '2023-01-13 04:30:02'),
(8, 4, 'HR167361339528', 'WordPress Full Stack Developer', NULL, 'this is description is two', 'Wordpress,xampp', 'AU Full Shift', 'Short Term', 'Part Time', 10, '45 Days', 8, NULL, NULL, NULL, '2023-01-13 07:06:35', '2023-01-13 07:06:35'),
(9, 4, 'HR167361467820', 'Back End', NULL, NULL, 'Wordpress,xampp', 'AU Overlapping', 'Short Term', 'Part Time', 10, '15 Days', 10, NULL, NULL, NULL, '2023-01-13 07:27:58', '2023-01-13 07:27:58');

-- --------------------------------------------------------

--
-- Table structure for table `job_cities`
--

CREATE TABLE `job_cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_cities`
--

INSERT INTO `job_cities` (`id`, `city_name`, `created_at`, `updated_at`) VALUES
(1, 'Pune', NULL, NULL),
(2, 'Mumbai', NULL, NULL),
(3, 'Nashik', NULL, NULL),
(4, 'Nagpur', NULL, NULL),
(5, 'Surat', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job_details`
--

CREATE TABLE `job_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id_fk` int(11) NOT NULL,
  `job_title_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_profile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_schedule` int(11) NOT NULL,
  `job_vacancy` int(11) NOT NULL,
  `job_salary` double NOT NULL,
  `job_exp_id` int(11) NOT NULL,
  `last_date_apply` date NOT NULL,
  `job_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_city_id` int(11) NOT NULL,
  `job_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_responsibility` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_qualifications` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `compony_detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_details`
--

INSERT INTO `job_details` (`id`, `category_id_fk`, `job_title_name`, `job_profile`, `job_schedule`, `job_vacancy`, `job_salary`, `job_exp_id`, `last_date_apply`, `job_location`, `job_city_id`, `job_description`, `job_responsibility`, `job_qualifications`, `company_name`, `compony_detail`, `created_at`, `updated_at`) VALUES
(1, 1, 'wordpess Developer', '/assets/job_profile/Delhi-2.jpeg', 1, 120, 20000, 3, '2022-11-23', 'pune', 5, 'make web responsive and interactive', 'make web responsive and interactive', 'BE', 'IT comany', 'it comany in pune with 5 star rating in google', '2022-11-21 01:00:14', '2022-12-05 06:39:39'),
(2, 1, 'PHP Developer', '/assets/job_profile/download.png', 1, 15, 45000, 2, '2022-12-11', 'Vadgoan Budruk, Pune', 4, 'PHP developers write server-side web applications using Hypertext Preprocessor (PHP) scripting languages.', 'As a PHP developer, you will be responsible for developing and coding all server-side logic. You will also be required to maintain the central database and respond to requests from front-end developers.', 'BE', 'Softmate Sysem', 'A remarkable about page is genuine, approachable, and distinguished. It should give the visitor a glimpse into what working with you might be like. You can include personal interests, stories,', '2022-11-27 05:01:48', '2022-12-05 05:11:16'),
(3, 6, 'Data Entry Operator', '/assets/job_profile/images.png', 1, 45, 20000, 4, '2022-12-11', 'Nashik', 4, 'A Data Entry Operator is a professional who is in charge of entering all the data into different computer databases. In addition, they manage and maintain effective record keeping, organizing files to collect information for future use.', 'A Data Entry Operator is a professional who is in charge of entering all the data into different computer databases. In addition, they manage and maintain effective record keeping, organizing files to collect information for future use.', 'Diploma', 'Datamatrix', 'Mumbai Naka, Nashik', '2022-11-30 00:05:22', '2022-12-05 06:38:42'),
(4, 1, 'Flutter Developer', '/assets/job_profile/pngtree-flutter-logo-icon-png-image_6108134.png', 1, 150, 50000, 2, '2023-01-08', 'Office no 501, Surat Wala Mark Plazzo Business center, Hinjawadi, Pune, Maharashtra 411057', 1, 'we are looking out for someone who has experience using Flutter widgets that can be plugged together, customized and deployed anywhere. Someone who is passionate about code writing, solving technical errors and taking up full ownership of app development.', 'we are looking out for someone who has experience using Flutter widgets that can be plugged together, customized and deployed anywhere. Someone who is passionate about code writing, solving technical errors and taking up full ownership of app development.', 'BE', 'Dacway System', 'dacway IT system', '2022-12-05 04:33:57', '2022-12-05 05:08:31');

-- --------------------------------------------------------

--
-- Table structure for table `job_experiences`
--

CREATE TABLE `job_experiences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_experience` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_experiences`
--

INSERT INTO `job_experiences` (`id`, `job_experience`, `created_at`, `updated_at`) VALUES
(1, 'Fresher', NULL, NULL),
(2, '1 Year', NULL, NULL),
(3, '2 Year', NULL, NULL),
(4, '2+ Year', NULL, NULL),
(5, '5 Year', NULL, NULL),
(6, '5+ Year', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_11_16_014857_create_categories_table', 1),
(6, '2022_11_16_030905_create_job_details_table', 1),
(7, '2022_11_16_043704_create_apply_jobs_table', 1),
(8, '2022_11_17_171151_create_admin_users_table', 1),
(9, '2022_11_27_103235_create_testimonials_table', 2),
(10, '2022_12_05_082624_create_job_experiences_table', 3),
(11, '2022_12_05_075201_create_job_cities_table', 4),
(12, '2022_12_28_072037_create_hire_talent_table', 5),
(13, '2022_12_28_091529_create_talent_table', 6),
(14, '2022_12_28_101928_create_hire_talent_table', 7),
(15, '2022_12_28_120808_create_talent_table', 8),
(16, '2022_12_29_083917_create_talent_table', 9),
(17, '2022_12_29_100910_create_talent_table', 10),
(18, '2022_12_30_111839_create_hire_talent_table', 11),
(19, '2023_01_02_073431_create_talent_infos_table', 12),
(20, '2023_01_02_075137_create_talent_preferences_table', 13),
(21, '2023_01_02_075658_create_talent_prof_experiences_table', 13),
(22, '2023_01_02_080126_create_talent_major_projects_table', 13),
(23, '2023_01_02_080539_create_talent_core_competencies_table', 13),
(24, '2023_01_02_083754_create_talent_core_compe_achievements_table', 13),
(25, '2023_01_02_084758_create_talent_education_table', 13),
(26, '2023_01_02_085156_create_talent_certifications_table', 13),
(27, '2023_01_02_085801_create_talent_testimonials_table', 13),
(28, '2023_01_06_122449_create_open_positions_table', 14),
(29, '2023_01_07_073829_create_skills_table', 15),
(30, '2023_01_07_073937_create_application_tools_table', 15),
(31, '2023_01_07_074103_create_positions_table', 15),
(32, '2023_01_07_074219_create_courses_table', 15),
(33, '2023_01_07_102924_create_hire_talent_open_positions_table', 16),
(34, '2023_01_16_063514_create_super_admins_table', 17),
(35, '2023_01_16_070503_create_super_admin_models_table', 18),
(36, '2023_01_17_105903_create_assessments_table', 19),
(37, '2023_01_17_112316_create_assessment_questions_table', 19),
(38, '2023_01_18_054948_create_users_table_table', 20),
(39, '2023_01_18_055231_create_assessment_questions_table', 21),
(40, '2023_01_19_053608_create_assessment_candidate_appears_table', 22),
(41, '2023_01_19_061558_create_assessment_candidate_appears_table', 23),
(42, '2023_01_19_093741_create_assessment_candidate_appears_table', 24),
(43, '2023_01_19_094600_create_assessment_candidate_appears_table', 25),
(44, '2023_01_21_065323_create_assessement_candidate_appears_table', 26),
(45, '2023_01_31_065915_create_video_modules_table', 27),
(46, '2023_01_31_070429_create_video_module_tables_table', 28),
(47, '2023_01_31_072434_create_video_modules_table', 29),
(48, '2023_01_31_072526_create_video_module_tables_table', 30);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `super_admin_models`
--

CREATE TABLE `super_admin_models` (
  `id` bigint(20) NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` double NOT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_profile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `super_admin_models`
--

INSERT INTO `super_admin_models` (`id`, `full_name`, `email_address`, `password`, `mobile_number`, `profile_image`, `linkedin_profile`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'superadmin@gmail.com', '25f9e794323b453885f5181f1b624d0b', 2147483647, NULL, NULL, '2022-11-02 10:22:33', '2023-01-16 06:23:57');

-- --------------------------------------------------------

--
-- Table structure for table `talent`
--

CREATE TABLE `talent` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` double NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_profile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `gender` enum('Male','Female','Other') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` double DEFAULT NULL,
  `linkedin_profile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position_applied` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `curret_employment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_experience` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notice_period` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `curret_ctc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expected_ctc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_method_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_method_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_method_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_hour_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_hour_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_hour_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emp_resume` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `interest` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `introduction` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT 1 COMMENT '1 = ''talent'' 2 = ''hiretale/company''',
  `assessments` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `international_client` enum('No','Yes') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `talent`
--

INSERT INTO `talent` (`id`, `full_name`, `email_address`, `mobile_number`, `password`, `user_profile`, `birth_date`, `gender`, `address`, `city_name`, `pincode`, `linkedin_profile`, `position_applied`, `curret_employment_status`, `work_experience`, `notice_period`, `curret_ctc`, `expected_ctc`, `work_method_1`, `work_method_2`, `work_method_3`, `work_hour_1`, `work_hour_2`, `work_hour_3`, `emp_resume`, `interest`, `introduction`, `role`, `assessments`, `international_client`, `created_at`, `updated_at`) VALUES
(2, 'nikhil hole', 'nikhilhole@gmail.com', 8530326408, '25f9e794323b453885f5181f1b624d0b', '/assets/talent/profile/167305.jpg', '2023-01-06', 'Male', 'pandharpur', 'solapur', 423102, NULL, 'php development', 'employment', '18', 'Immediately', '43423', '13242342', 'remote', 'in-office', 'in-office', 'us full shift', 'us full shift', 'us full shift', '/assets/talent/resume/profile.pdf', 'watching tv,cooking,painting', 'Accomplished marketing professional with 4 years of corporate experience in social media management and advertising campaigns. Looking to leverage industry skills and abilities of raising awareness and sales through low or no budget marketing options for local NGO', 1, NULL, 'No', '2022-12-29 04:49:54', '2023-01-12 23:31:30'),
(3, 'Ram jondhale', 'ramjondhale@gmail.com', 8530326408, '25f9e794323b453885f5181f1b624d0b', '/assets/talent/profile/profile-photo.jpg', '1998-10-15', 'Male', 'bhaur', 'nashik', 423102, 'https://www.php.net/manual/en/function.explode.php', 'php development', 'unemployed', '1', 'More than 8 Week', '30000', '55000', 'in-office', 'remote', 'hybrid', 'ak full shift', 'uk full shift', 'us full shift', '/assets/talent/resume/profile.pdf', 'watching tv,painting', 'Outgoing project manager with more than 5 years of experience in working on high-level projects with mid-sized teams. Excellent relationship building and management skills which help deliver projects minimum $10K below costs and 10% faster than projected. Looking to leverage project management skills and know-how as a senior project manager at Acme.', 1, NULL, 'Yes', '2022-12-29 23:34:33', '2023-01-04 04:41:33'),
(5, 'sample user', 'sample@gmail.com', 8530326408, '25f9e794323b453885f5181f1b624d0b', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-01-11 04:00:42', '2023-01-11 04:00:42'),
(6, 'prajyot gaikwad', 'prajyot@gmail.com', 8530326408, '25f9e794323b453885f5181f1b624d0b', '/assets/talent/profile/167305.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-01-11 04:06:02', '2023-01-11 04:19:17');

-- --------------------------------------------------------

--
-- Table structure for table `talent_certifications`
--

CREATE TABLE `talent_certifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `talent_idfk` int(11) NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issue_organization` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `issue_date` date NOT NULL,
  `expire_date` date DEFAULT NULL,
  `credential_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `credential_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `talent_certifications`
--

INSERT INTO `talent_certifications` (`id`, `talent_idfk`, `course_name`, `issue_organization`, `issue_date`, `expire_date`, `credential_id`, `credential_url`, `created_at`, `updated_at`) VALUES
(1, 3, 'JAVA', 'QSPider, Wakad, Pune-1', '2023-01-03', '2023-01-18', NULL, NULL, '2023-01-03 07:03:57', '2023-01-04 06:03:30');

-- --------------------------------------------------------

--
-- Table structure for table `talent_core_competencies`
--

CREATE TABLE `talent_core_competencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `talent_idfk` int(11) NOT NULL,
  `position_open_for` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `application_tool_used` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `portfolio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skills` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `talent_core_competencies`
--

INSERT INTO `talent_core_competencies` (`id`, `talent_idfk`, `position_open_for`, `application_tool_used`, `portfolio`, `skills`, `created_at`, `updated_at`) VALUES
(4, 2, 'DevOps Engineer', 'Wordpress,PHP,Laravel', 'http://127.0.0.1:8000/Talent/assessments', 'Wordpress,PHP,Laravel', '2023-01-05 00:24:24', '2023-01-05 01:24:04');

-- --------------------------------------------------------

--
-- Table structure for table `talent_core_compe_achievements`
--

CREATE TABLE `talent_core_compe_achievements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `talent_idfk` int(11) NOT NULL,
  `core_competencie_idfk` int(11) NOT NULL,
  `achievement` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `achievement_profile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `talent_core_compe_achievements`
--

INSERT INTO `talent_core_compe_achievements` (`id`, `talent_idfk`, `core_competencie_idfk`, `achievement`, `achievement_profile`, `created_at`, `updated_at`) VALUES
(40, 2, 4, 'I\'ve worked on around 150+ projects based on MVC frameworks, Custom frameworks, and E-commerce online platforms', 'assets/talent/achievementprofile-photo.jpg', NULL, NULL),
(41, 2, 4, 'Stripe anonymous checkouts on the client\'s web app were resolved by eliminating the unknown script inserted in the database from some site hack or backdoor.', 'assets/talent/achievementram.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `talent_education`
--

CREATE TABLE `talent_education` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `talent_idfk` int(11) NOT NULL,
  `degree` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `university` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `talent_education`
--

INSERT INTO `talent_education` (`id`, `talent_idfk`, `degree`, `university`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(2, 3, 'SSC', 'Shri Sidheshwar Vidyalaya, Bhaur', '2011-05-04', '2014-01-04', '2023-01-04 05:09:24', '2023-01-04 05:09:24'),
(4, 3, 'bachelor of engineering', 'Gangamai Collage of Engnnering', '2020-01-10', '2023-01-10', NULL, NULL),
(5, 2, 'Bachelor of Engineering', 'Gangamai Collage of Enginnering, Nagoan', '2020-06-11', '2023-01-11', '2023-01-11 01:58:47', '2023-01-11 01:58:47');

-- --------------------------------------------------------

--
-- Table structure for table `talent_major_projects`
--

CREATE TABLE `talent_major_projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `talent_idfk` int(11) NOT NULL,
  `project_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skills` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `talent_major_projects`
--

INSERT INTO `talent_major_projects` (`id`, `talent_idfk`, `project_name`, `company_name`, `skills`, `description`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 3, 'Dodgson & Bell', 'dacway', '', 'Dodgson & Bell is a full-service funeral home. There is a price list on which arrangements are made that are tailored to the individual\'s needs, as well as counsel, guidance, and management of all aspects of the funeral. It is built in Laravel, VueJS and MySQL', '2023-01-03', '2023-01-04', '2023-01-03 04:09:15', '2023-01-04 04:20:35'),
(3, 3, 'Flying Chalks', 'sumo soft', '', 'The Flying Chalks web application was created using Laravel / VueJS / MySQL database. It is a website that provides advice to students who are studying abroad or who desire to study abroad', '2023-02-10', '2023-02-06', '2023-01-06 02:31:00', '2023-01-06 02:31:00'),
(4, 2, 'EZ Store India', 'axelbuzz', 'Wordpress,PHP,Git', 'EZ Store India. Explore Indian products with ease. We appreciate your choice to prefer. Indian. Help us to serve you better. Continue on website.', '2023-01-11', '2023-01-26', '2023-01-11 00:42:59', '2023-01-11 00:42:59');

-- --------------------------------------------------------

--
-- Table structure for table `talent_prof_experiences`
--

CREATE TABLE `talent_prof_experiences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `talent_idfk` int(11) NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skills` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roles_responsibilities` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `currently_work` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `start_date` date NOT NULL,
  `end_date` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `talent_prof_experiences`
--

INSERT INTO `talent_prof_experiences` (`id`, `talent_idfk`, `designation`, `company_name`, `skills`, `roles_responsibilities`, `currently_work`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 3, 'PHP developer', 'dacway system', 'xampp', 'A PHP developer is responsible for writing server-side web application logic. PHP developers usually develop back-end components, connect the application with the other (often third-party) web services, and support the front-end developers by integrating their work with the application.', 'Yes', '2023-01-03', NULL, '2023-01-03 03:32:51', '2023-01-04 03:55:02'),
(3, 2, 'JS Developer', 'Axelbuzz System', 'xampp', 'Redesigned sections of the website to ensure a more attractive and user friendly experience \n Maintained the current website and added more appealing features\n Involved in application design, site architecture design, using PHP, CSS, JavaScript and HTML programming to meet validation requirements', 'No', '2021-09-01', '2021-12-31', '2023-01-03 08:10:01', '2023-01-03 08:10:01'),
(5, 2, 'PHP Developer', 'Sumo Soft', 'Wordpress,xampp', 'Redesigned sections of the website to ensure a more attractive and user friendly experience \r\n Maintained the current website and added more appealing features\r\n Involved in application design, site architecture design, using PHP, CSS, JavaScript and HTML programming to meet validation requirements', 'Yes', '2023-01-02', NULL, '2023-01-06 02:30:12', '2023-01-14 07:12:37'),
(6, 2, 'React JS Fresher', 'Aloha Technology', 'Wordpress,xampp,HTML/CSS', 'JS jobs openings with salary, requirements, free alerts on Shine.com, ... for fresher candidates for the internship programme in frontend, react js ,react.', 'No', '2022-01-11', '2023-01-11', '2023-01-11 01:08:08', '2023-01-11 01:15:35');

-- --------------------------------------------------------

--
-- Table structure for table `talent_testimonials`
--

CREATE TABLE `talent_testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `talent_idfk` int(11) NOT NULL,
  `client_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `testimonial` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `talent_testimonials`
--

INSERT INTO `talent_testimonials` (`id`, `talent_idfk`, `client_name`, `company_name`, `testimonial`, `created_at`, `updated_at`) VALUES
(1, 2, 'Uplers', 'Dacway System', 'create user friendly front end end to the user.\nE-commerce online ticket booking system with coupon code.', '2023-01-03 07:18:02', '2023-01-04 06:21:35'),
(2, 3, 'Diamondparks', 'Softmate System', 'create user friendly front end end to the user.\nE-commerce online ticket booking system with coupon code.', '2023-01-04 06:22:04', '2023-01-04 06:22:04');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `user_name`, `user_role`, `user_message`, `created_at`, `updated_at`) VALUES
(1, 'ram jondhale', 'Web Developer', 'Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam', '2022-11-27 05:39:33', '2022-11-27 05:39:33'),
(2, 'Client Name', 'Profession', 'Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam', '2022-11-27 05:40:32', '2022-11-27 05:40:32'),
(3, 'Shubham Jagdale', 'Project Manager', 'This information is usually described in project documentation, created at the beginning of the development process. The primary constraints are scope, time, and budget', '2022-11-29 04:01:14', '2022-11-29 04:01:14');

-- --------------------------------------------------------

--
-- Table structure for table `video_modules`
--

CREATE TABLE `video_modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `moduleName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `video_modules`
--

INSERT INTO `video_modules` (`id`, `moduleName`, `created_at`, `updated_at`) VALUES
(1, 'youtube', '2023-01-31 02:14:25', '2023-01-31 02:14:25'),
(2, 'Video Module', '2023-01-31 02:14:50', '2023-01-31 02:14:50'),
(3, 'link', '2023-01-31 02:19:00', '2023-01-31 02:19:00'),
(4, 'Java', '2023-02-01 01:17:45', '2023-02-01 01:17:45');

-- --------------------------------------------------------

--
-- Table structure for table `video_module_tables`
--

CREATE TABLE `video_module_tables` (
  `moduleId` int(10) UNSIGNED NOT NULL,
  `module_idfk` bigint(20) UNSIGNED DEFAULT NULL,
  `videoHeading` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `videoModuleLink` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `moduleType` enum('link','file') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `video_module_tables`
--

INSERT INTO `video_module_tables` (`moduleId`, `module_idfk`, `videoHeading`, `videoModuleLink`, `moduleType`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '#5: ReactJS Hello World Program | React Folder Structure | JS Babel & Webpack in Hindi', 'https://www.youtube.com/embed/Y2pA6pz-ffM', 'link', 1, '2023-01-31 03:40:11', '2023-01-31 03:40:11'),
(2, 2, 'Zwigato | International Trailer | Kapil Sharma, Shahana Goswami, Nandita Das', 'https://www.youtube.com/embed/Cvw6ohO08lU', 'link', 1, '2023-01-31 05:44:58', '2023-01-31 05:44:58'),
(3, 2, 'Wishing you all a very happy New Year!', 'assets/superAdmin/videoModule/New_Year_Lights.mp4', 'file', 1, '2023-01-31 06:31:46', '2023-01-31 06:31:46'),
(4, 4, 'Java tutorial', 'https://www.youtube.com/embed/UmnCZ7-9yDY', 'link', 1, '2023-02-01 01:19:15', '2023-02-01 01:19:15'),
(5, 1, 'JSX in React in Hindi', 'https://www.youtube.com/watch?v=p9m_v9OxfAM', 'link', 1, '2023-02-01 07:29:41', '2023-02-01 07:29:41'),
(6, 1, 'https://www.youtube.com/watch?v=p9m_v9OxfAM', 'https://www.youtube.com/embed/p9m_v9OxfAM', 'link', 1, '2023-02-01 07:32:03', '2023-02-01 07:32:03'),
(7, 1, 'https://www.youtube.com/watch?v=sQREHNAdCog', 'https://www.youtube.com/embed/sQREHNAdCog', 'link', 1, '2023-02-01 07:32:59', '2023-02-01 07:32:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apply_jobs`
--
ALTER TABLE `apply_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assessement_candidate_appears`
--
ALTER TABLE `assessement_candidate_appears`
  ADD PRIMARY KEY (`assCandAppearID`),
  ADD KEY `assessement_candidate_appears_assessmentsidfk_foreign` (`assessmentsIdFk`),
  ADD KEY `assessement_candidate_appears_talentidfk_foreign` (`talentIdFk`);

--
-- Indexes for table `assessments`
--
ALTER TABLE `assessments`
  ADD PRIMARY KEY (`assessments_id`);

--
-- Indexes for table `assessment_questions`
--
ALTER TABLE `assessment_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assessment_questions_assessments_idfk_foreign` (`assessments_idfk`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hire_talent`
--
ALTER TABLE `hire_talent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hire_talent_open_positions`
--
ALTER TABLE `hire_talent_open_positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_cities`
--
ALTER TABLE `job_cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_details`
--
ALTER TABLE `job_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_experiences`
--
ALTER TABLE `job_experiences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `super_admin_models`
--
ALTER TABLE `super_admin_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `talent`
--
ALTER TABLE `talent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `talent_certifications`
--
ALTER TABLE `talent_certifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `talent_core_competencies`
--
ALTER TABLE `talent_core_competencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `talent_core_compe_achievements`
--
ALTER TABLE `talent_core_compe_achievements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `talent_education`
--
ALTER TABLE `talent_education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `talent_major_projects`
--
ALTER TABLE `talent_major_projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `talent_prof_experiences`
--
ALTER TABLE `talent_prof_experiences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `talent_testimonials`
--
ALTER TABLE `talent_testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_modules`
--
ALTER TABLE `video_modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_module_tables`
--
ALTER TABLE `video_module_tables`
  ADD PRIMARY KEY (`moduleId`),
  ADD KEY `video_module_tables_module_idfk_index` (`module_idfk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `apply_jobs`
--
ALTER TABLE `apply_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `assessement_candidate_appears`
--
ALTER TABLE `assessement_candidate_appears`
  MODIFY `assCandAppearID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `assessments`
--
ALTER TABLE `assessments`
  MODIFY `assessments_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `assessment_questions`
--
ALTER TABLE `assessment_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hire_talent`
--
ALTER TABLE `hire_talent`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hire_talent_open_positions`
--
ALTER TABLE `hire_talent_open_positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `job_cities`
--
ALTER TABLE `job_cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `job_details`
--
ALTER TABLE `job_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `job_experiences`
--
ALTER TABLE `job_experiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `super_admin_models`
--
ALTER TABLE `super_admin_models`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `talent`
--
ALTER TABLE `talent`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `talent_certifications`
--
ALTER TABLE `talent_certifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `talent_core_competencies`
--
ALTER TABLE `talent_core_competencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `talent_core_compe_achievements`
--
ALTER TABLE `talent_core_compe_achievements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `talent_education`
--
ALTER TABLE `talent_education`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `talent_major_projects`
--
ALTER TABLE `talent_major_projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `talent_prof_experiences`
--
ALTER TABLE `talent_prof_experiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `talent_testimonials`
--
ALTER TABLE `talent_testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `video_modules`
--
ALTER TABLE `video_modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `video_module_tables`
--
ALTER TABLE `video_module_tables`
  MODIFY `moduleId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assessement_candidate_appears`
--
ALTER TABLE `assessement_candidate_appears`
  ADD CONSTRAINT `assessement_candidate_appears_assessmentsidfk_foreign` FOREIGN KEY (`assessmentsIdFk`) REFERENCES `assessments` (`assessments_id`),
  ADD CONSTRAINT `assessement_candidate_appears_talentidfk_foreign` FOREIGN KEY (`talentIdFk`) REFERENCES `talent` (`id`);

--
-- Constraints for table `assessment_questions`
--
ALTER TABLE `assessment_questions`
  ADD CONSTRAINT `assessment_questions_assessments_idfk_foreign` FOREIGN KEY (`assessments_idfk`) REFERENCES `assessments` (`assessments_id`);

--
-- Constraints for table `video_module_tables`
--
ALTER TABLE `video_module_tables`
  ADD CONSTRAINT `video_module_tables_module_idfk_foreign` FOREIGN KEY (`module_idfk`) REFERENCES `video_modules` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
