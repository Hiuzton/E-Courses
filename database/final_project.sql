-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2023 at 03:25 PM
-- Server version: 8.0.32
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(100) NOT NULL,
  `images` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `name`, `description`, `images`) VALUES
(1, 'Online courses', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iste, illum!', 'icons/courses.png'),
(2, 'Expirienced teachers', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iste, illum!', 'icons/teacher.png'),
(3, 'Newest informations', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iste, illum!', 'icons/book.png');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `categorie` varchar(45) NOT NULL,
  `price` int NOT NULL,
  `description` varchar(500) NOT NULL,
  `images` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `name`, `categorie`, `price`, `description`, `images`) VALUES
(7, 'Introduction in JavaScript', 'Programing', 50, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, voluptas incidunt? Asperiores qui rem quod atque accusantium laboriosam maxime modi esse molestiae ab, explicabo sunt?', 'icons/course01.png'),
(9, 'Make a Photography Exhibition more interesting', 'Photography', 100, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, voluptas incidunt? Asperiores qui rem quod atque accusantium laboriosam maxime modi esse molestiae ab, explicabo sunt?', 'icons/course02.png'),
(10, 'BECOME A GREAT SINGER: Your Complete Vocal Training System', 'Music', 120, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, voluptas incidunt? Asperiores qui rem quod atque accusantium laboriosam maxime modi esse molestiae ab, explicabo sunt?', 'icons/course05.jpeg'),
(13, 'Introduction in PHP', 'Programing', 50, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, voluptas incidunt? Asperiores qui rem quod atque accusantium laboriosam maxime modi esse molestiae ab, explicabo sunt?', 'icons/course01.png'),
(20, 'HTML5 and CSS3 basic', 'Programing', 35, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, voluptas incidunt? Asperiores qui rem quod atque accusantium laboriosam maxime modi esse molestiae ab, explicabo sunt?', 'icons/course01.png'),
(29, 'The Complete Copywriting Course : Write to Sell Like a Pro', 'Marketing', 80, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, voluptas incidunt? Asperiores qui rem quod atque accusantium laboriosam maxime modi esse molestiae ab, explicabo sunt?', 'icons/courses15.jpg'),
(30, 'Tips for beginners', 'Photography', 25, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, voluptas incidunt? Asperiores qui rem quod atque accusantium laboriosam maxime modi esse molestiae ab, explicabo sunt?', 'icons/course02.png');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `categorie` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `price` int NOT NULL,
  `description` varchar(500) NOT NULL,
  `images` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `categorie`, `price`, `description`, `images`) VALUES
(1, 'Introduction in PHP', 'Programing', 50, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, voluptas incidunt? Asperiores qui rem quod atque accusantium laboriosam maxime modi esse molestiae ab, explicabo sunt?', 'icons/course01.png'),
(2, 'HTML5 and CSS3 basic', 'Programing', 35, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, voluptas incidunt? Asperiores qui rem quod atque accusantium laboriosam maxime modi esse molestiae ab, explicabo sunt?', 'icons/courses16.jpg'),
(3, 'Introduction in JavaScript', 'Programing', 50, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, voluptas incidunt? Asperiores qui rem quod atque accusantium laboriosam maxime modi esse molestiae ab, explicabo sunt?', 'icons/courses17.jpg\r\n'),
(4, 'MySQL and PHPmyadmin', 'Programing', 45, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, voluptas incidunt? Asperiores qui rem quod atque accusantium laboriosam maxime modi esse molestiae ab, explicabo sunt?', 'icons/courses18.jpeg'),
(5, 'Correct way to get right Exposure', 'Photography', 70, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, voluptas incidunt? Asperiores qui rem quod atque accusantium laboriosam maxime modi esse molestiae ab, explicabo sunt?', 'icons/course02.png'),
(6, 'Make a Photography Exhibition more interesting', 'Photography', 100, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, voluptas incidunt? Asperiores qui rem quod atque accusantium laboriosam maxime modi esse molestiae ab, explicabo sunt?', 'icons/courses19.jpg'),
(7, 'Shoot Film photography better then Digital', 'Photography', 120, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, voluptas incidunt? Asperiores qui rem quod atque accusantium laboriosam maxime modi esse molestiae ab, explicabo sunt?', 'icons/courses20.jpg'),
(8, 'Tips for beginners', 'Photography', 25, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, voluptas incidunt? Asperiores qui rem quod atque accusantium laboriosam maxime modi esse molestiae ab, explicabo sunt?', 'icons/courses21.jpg'),
(9, 'Learn playing a guitar in 24 hours', 'Music', 50, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, voluptas incidunt? Asperiores qui rem quod atque accusantium laboriosam maxime modi esse molestiae ab, explicabo sunt?', 'icons/course03.jpeg'),
(10, 'Guitar for Professionals', 'Music', 89, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, voluptas incidunt? Asperiores qui rem quod atque accusantium laboriosam maxime modi esse molestiae ab, explicabo sunt?', 'icons/course06.jpeg'),
(11, 'Pianoforall - Incredible New Way To Learn Piano & Keyboard', 'Music', 75, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, voluptas incidunt? Asperiores qui rem quod atque accusantium laboriosam maxime modi esse molestiae ab, explicabo sunt?', 'icons/course04.jpeg'),
(12, 'BECOME A GREAT SINGER: Your Complete Vocal Training System', 'Music', 120, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, voluptas incidunt? Asperiores qui rem quod atque accusantium laboriosam maxime modi esse molestiae ab, explicabo sunt?', 'icons/course05.jpeg'),
(13, 'The Ultimate Drawing Course - Beginner to Advanced', 'Design', 100, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, voluptas incidunt? Asperiores qui rem quod atque accusantium laboriosam maxime modi esse molestiae ab, explicabo sunt?', 'icons/courses07.jpg'),
(15, 'Character Art School: Complete Character Drawing', 'Design', 80, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, voluptas incidunt? Asperiores qui rem quod atque accusantium laboriosam maxime modi esse molestiae ab, explicabo sunt?', 'icons/courses08.jpg'),
(16, 'Complete Blender Creator: Learn 3D Modelling for Beginners', 'Design', 200, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, voluptas incidunt? Asperiores qui rem quod atque accusantium laboriosam maxime modi esse molestiae ab, explicabo sunt?', 'icons/courses09.jpg'),
(17, 'Leadership: Practical Leadership Skills', 'Business', 70, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, voluptas incidunt? Asperiores qui rem quod atque accusantium laboriosam maxime modi esse molestiae ab, explicabo sunt?', 'icons/courses10.jpg'),
(18, 'Emotional Intelligence and Work', 'Business', 150, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, voluptas incidunt? Asperiores qui rem quod atque accusantium laboriosam maxime modi esse molestiae ab, explicabo sunt?', 'icons/courses11.jpg'),
(19, 'Design Thinking for Beginners: Develop Innovative Ideas', 'Business', 120, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, voluptas incidunt? Asperiores qui rem quod atque accusantium laboriosam maxime modi esse molestiae ab, explicabo sunt?', 'icons/courses12.jpg'),
(20, 'The Complete Digital Marketing Course - 12 Courses in 1', 'Marketing', 170, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, voluptas incidunt? Asperiores qui rem quod atque accusantium laboriosam maxime modi esse molestiae ab, explicabo sunt?', 'icons/courses13.jpg'),
(21, 'Instagram Marketing 2023: Complete Guide To Instagram Growth', 'Marketing', 50, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, voluptas incidunt? Asperiores qui rem quod atque accusantium laboriosam maxime modi esse molestiae ab, explicabo sunt?', 'icons/courses14.jpg'),
(22, 'The Complete Copywriting Course : Write to Sell Like a Pro', 'Marketing', 80, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, voluptas incidunt? Asperiores qui rem quod atque accusantium laboriosam maxime modi esse molestiae ab, explicabo sunt?', 'icons/courses15.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `questions_answers`
--

CREATE TABLE `questions_answers` (
  `id` int NOT NULL,
  `question` varchar(200) NOT NULL,
  `answer` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `questions_answers`
--

INSERT INTO `questions_answers` (`id`, `question`, `answer`) VALUES
(1, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Necessitatibus, porro?', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa asperiores repellat harum enim repudiandae commodi cum provident repellendus nostrum odit eius, minus, laboriosam, pariatur deleniti!'),
(2, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Necessitatibus, porro?', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa asperiores repellat harum enim repudiandae commodi cum provident repellendus nostrum odit eius, minus, laboriosam, pariatur deleniti!'),
(3, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Necessitatibus, porro?', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa asperiores repellat harum enim repudiandae commodi cum provident repellendus nostrum odit eius, minus, laboriosam, pariatur deleniti!'),
(4, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Necessitatibus, porro?', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa asperiores repellat harum enim repudiandae commodi cum provident repellendus nostrum odit eius, minus, laboriosam, pariatur deleniti!'),
(5, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Necessitatibus, porro?', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa asperiores repellat harum enim repudiandae commodi cum provident repellendus nostrum odit eius, minus, laboriosam, pariatur deleniti!'),
(6, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Necessitatibus, porro?', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa asperiores repellat harum enim repudiandae commodi cum provident repellendus nostrum odit eius, minus, laboriosam, pariatur deleniti!'),
(7, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Necessitatibus, porro?', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa asperiores repellat harum enim repudiandae commodi cum provident repellendus nostrum odit eius, minus, laboriosam, pariatur deleniti!'),
(8, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Necessitatibus, porro?', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa asperiores repellat harum enim repudiandae commodi cum provident repellendus nostrum odit eius, minus, laboriosam, pariatur deleniti!'),
(9, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Necessitatibus, porro?', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa asperiores repellat harum enim repudiandae commodi cum provident repellendus nostrum odit eius, minus, laboriosam, pariatur deleniti!'),
(10, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Necessitatibus, porro?', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa asperiores repellat harum enim repudiandae commodi cum provident repellendus nostrum odit eius, minus, laboriosam, pariatur deleniti!');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` varchar(100) NOT NULL,
  `parola` varchar(500) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `parola`, `name`) VALUES
(9, 'andreyka.gutsan@gmail.com', '$2y$10$9K5i7zv5VY84RtPkNhRhS.563uz3ARb118e/kFSJKA7NFqC2b3nu6', 'Andrei '),
(10, 'hutsan.andrei.info21@uab.ro', '$2y$10$TCtdzIakGsbu1LemYRqqzeYV2SuTaiNtV75lZoB2e0Fzu2dlTqnlC', 'Hutsan');

-- --------------------------------------------------------

--
-- Table structure for table `user_question`
--

CREATE TABLE `user_question` (
  `id` int NOT NULL,
  `name` varchar(25) NOT NULL,
  `question` varchar(100) NOT NULL,
  `ques_time` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_question`
--

INSERT INTO `user_question` (`id`, `name`, `question`, `ques_time`) VALUES
(8, 'Hutsan', 'time\n', '2023-05-20 17:14:48'),
(9, 'Hutsan', 'Everything ', '2023-05-20 17:23:54'),
(10, 'Hutsan', 'hello mai', '2023-05-20 17:24:10'),
(11, 'Hutsan', 'developer did a lot of work', '2023-05-20 17:32:59'),
(12, 'Andrei ', 'i agree', '2023-05-20 19:43:43'),
(13, 'Andrei ', 'good comment', '2023-05-20 22:31:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions_answers`
--
ALTER TABLE `questions_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_question`
--
ALTER TABLE `user_question`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `questions_answers`
--
ALTER TABLE `questions_answers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_question`
--
ALTER TABLE `user_question`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
