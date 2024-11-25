-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Час створення: Лис 19 2024 р., 21:45
-- Версія сервера: 10.4.28-MariaDB
-- Версія PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `Apteka`
--

-- --------------------------------------------------------

--
-- Структура таблиці `APTEKA`
--

CREATE TABLE `APTEKA` (
  `ID_APTEKA` int(11) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `LOCATION` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `APTEKA`
--

INSERT INTO `APTEKA` (`ID_APTEKA`, `NAME`, `LOCATION`) VALUES
(1, 'Аптека №1', 'Київ, вул. Шевченка, 12'),
(2, 'Аптека №2', 'Львів, просп. Свободи, 45'),
(3, 'Аптека №3', 'Одеса, вул. Дерибасівська, 20');

-- --------------------------------------------------------

--
-- Структура таблиці `LIKY`
--

CREATE TABLE `LIKY` (
  `ID_LIKY` int(11) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `CATEGORY` varchar(50) DEFAULT NULL,
  `PRICE` decimal(10,2) NOT NULL,
  `STOCK` int(11) DEFAULT NULL,
  `ID_POSTACHALNYK` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `LIKY`
--

INSERT INTO `LIKY` (`ID_LIKY`, `NAME`, `CATEGORY`, `PRICE`, `STOCK`, `ID_POSTACHALNYK`) VALUES
(1, 'Парацетамол', 'Жарознижувальні', 25.50, 100, 1),
(2, 'Аспірин', 'Знеболювальні', 30.00, 200, 2),
(3, 'Но-шпа', 'Спазмолітики', 50.00, 150, 1),
(4, 'Вітамін C', 'Вітаміни', 15.00, 300, 3);

-- --------------------------------------------------------

--
-- Структура таблиці `PERSONNEL`
--

CREATE TABLE `PERSONNEL` (
  `ID_PERSONNEL` int(11) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `POSITION` varchar(50) DEFAULT NULL,
  `ID_APTEKA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `PERSONNEL`
--

INSERT INTO `PERSONNEL` (`ID_PERSONNEL`, `NAME`, `POSITION`, `ID_APTEKA`) VALUES
(1, 'Іван Іванов', 'Фармацевт', 1),
(2, 'Марія Петренко', 'Адміністратор', 1),
(3, 'Олег Сидоренко', 'Фармацевт', 2),
(4, 'Анна Коваленко', 'Фармацевт', 3);

-- --------------------------------------------------------

--
-- Структура таблиці `POKUPEC`
--

CREATE TABLE `POKUPEC` (
  `ID_POKUPEC` int(11) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `CONTACT` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `POKUPEC`
--

INSERT INTO `POKUPEC` (`ID_POKUPEC`, `NAME`, `CONTACT`) VALUES
(1, 'Олександр Гончар', '380671234890'),
(2, 'Олена Литвин', '380501234567'),
(3, 'Дмитро Павленко', '380931234890');

-- --------------------------------------------------------

--
-- Структура таблиці `POSTACHALNYK`
--

CREATE TABLE `POSTACHALNYK` (
  `ID_POSTACHALNYK` int(11) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `PHONE` varchar(20) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `POSTACHALNYK`
--

INSERT INTO `POSTACHALNYK` (`ID_POSTACHALNYK`, `NAME`, `PHONE`, `EMAIL`) VALUES
(1, 'ФармаПост', '380671234567', 'contact@farmapost.ua'),
(2, 'МедЛогістика', '380501234567', 'info@medlogistics.com'),
(3, 'АльянсЛіки', '380931234567', 'support@alliance.ua');

-- --------------------------------------------------------

--
-- Структура таблиці `ZAMOVLENNYA`
--

CREATE TABLE `ZAMOVLENNYA` (
  `ID_ZAMOVLENNYA` int(11) NOT NULL,
  `DATE` date NOT NULL,
  `ID_APTEKA` int(11) DEFAULT NULL,
  `ID_LIKY` int(11) DEFAULT NULL,
  `ID_POKUPEC` int(11) DEFAULT NULL,
  `QUANTITY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `ZAMOVLENNYA`
--

INSERT INTO `ZAMOVLENNYA` (`ID_ZAMOVLENNYA`, `DATE`, `ID_APTEKA`, `ID_LIKY`, `ID_POKUPEC`, `QUANTITY`) VALUES
(1, '2024-11-15', 1, 1, 1, 2),
(2, '2024-11-16', 2, 2, 2, 3),
(3, '2024-11-17', 3, 3, 3, 1),
(4, '2024-11-18', 1, 4, 1, 5);

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `APTEKA`
--
ALTER TABLE `APTEKA`
  ADD PRIMARY KEY (`ID_APTEKA`);

--
-- Індекси таблиці `LIKY`
--
ALTER TABLE `LIKY`
  ADD PRIMARY KEY (`ID_LIKY`),
  ADD KEY `ID_POSTACHALNYK` (`ID_POSTACHALNYK`);

--
-- Індекси таблиці `PERSONNEL`
--
ALTER TABLE `PERSONNEL`
  ADD PRIMARY KEY (`ID_PERSONNEL`),
  ADD KEY `ID_APTEKA` (`ID_APTEKA`);

--
-- Індекси таблиці `POKUPEC`
--
ALTER TABLE `POKUPEC`
  ADD PRIMARY KEY (`ID_POKUPEC`);

--
-- Індекси таблиці `POSTACHALNYK`
--
ALTER TABLE `POSTACHALNYK`
  ADD PRIMARY KEY (`ID_POSTACHALNYK`);

--
-- Індекси таблиці `ZAMOVLENNYA`
--
ALTER TABLE `ZAMOVLENNYA`
  ADD PRIMARY KEY (`ID_ZAMOVLENNYA`),
  ADD KEY `ID_APTEKA` (`ID_APTEKA`),
  ADD KEY `ID_LIKY` (`ID_LIKY`),
  ADD KEY `ID_POKUPEC` (`ID_POKUPEC`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `APTEKA`
--
ALTER TABLE `APTEKA`
  MODIFY `ID_APTEKA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблиці `LIKY`
--
ALTER TABLE `LIKY`
  MODIFY `ID_LIKY` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблиці `PERSONNEL`
--
ALTER TABLE `PERSONNEL`
  MODIFY `ID_PERSONNEL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблиці `POKUPEC`
--
ALTER TABLE `POKUPEC`
  MODIFY `ID_POKUPEC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблиці `POSTACHALNYK`
--
ALTER TABLE `POSTACHALNYK`
  MODIFY `ID_POSTACHALNYK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблиці `ZAMOVLENNYA`
--
ALTER TABLE `ZAMOVLENNYA`
  MODIFY `ID_ZAMOVLENNYA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `LIKY`
--
ALTER TABLE `LIKY`
  ADD CONSTRAINT `liky_ibfk_1` FOREIGN KEY (`ID_POSTACHALNYK`) REFERENCES `POSTACHALNYK` (`ID_POSTACHALNYK`);

--
-- Обмеження зовнішнього ключа таблиці `PERSONNEL`
--
ALTER TABLE `PERSONNEL`
  ADD CONSTRAINT `personnel_ibfk_1` FOREIGN KEY (`ID_APTEKA`) REFERENCES `APTEKA` (`ID_APTEKA`);

--
-- Обмеження зовнішнього ключа таблиці `ZAMOVLENNYA`
--
ALTER TABLE `ZAMOVLENNYA`
  ADD CONSTRAINT `zamovlennya_ibfk_1` FOREIGN KEY (`ID_APTEKA`) REFERENCES `APTEKA` (`ID_APTEKA`),
  ADD CONSTRAINT `zamovlennya_ibfk_2` FOREIGN KEY (`ID_LIKY`) REFERENCES `LIKY` (`ID_LIKY`),
  ADD CONSTRAINT `zamovlennya_ibfk_3` FOREIGN KEY (`ID_POKUPEC`) REFERENCES `POKUPEC` (`ID_POKUPEC`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
