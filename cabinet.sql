-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Июн 10 2019 г., 00:26
-- Версия сервера: 10.1.26-MariaDB-0+deb9u1
-- Версия PHP: 7.0.27-0+deb9u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cabinet`
--

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `all_zayavki`
-- (See below for the actual view)
--
CREATE TABLE `all_zayavki` (
`naimen_usl` varchar(12)
,`data_nach` varchar(10)
,`data_okonch` varchar(20)
,`marka` varchar(20)
,`number` varchar(20)
,`FIo_vod` varchar(100)
,`vid_usl` varchar(40)
,`comment` varchar(200)
,`data_zayavki` datetime
,`familiya` varchar(25)
,`imya` varchar(25)
,`otchestvo` varchar(25)
,`nazvanie_organizacii` varchar(50)
,`telephone` varchar(15)
,`rezerv_telephone` varchar(15)
);

-- --------------------------------------------------------

--
-- Структура таблицы `car`
--

CREATE TABLE `car` (
  `ID_car` int(11) NOT NULL,
  `marka` varchar(20) NOT NULL,
  `number` varchar(10) NOT NULL,
  `FIO_voditelya` varchar(100) NOT NULL,
  `ID_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `car`
--

INSERT INTO `car` (`ID_car`, `marka`, `number`, `FIO_voditelya`, `ID_user`) VALUES
(2, 'Honda', 'а562аа', 'Петров Петр Петрович', 3),
(4, 'Тойота', 'ф585вм', 'Травин Алексей Геннадиевич', 1),
(5, 'KIA', 'в698вы', 'Остров Андрей Викторович', 3),
(18, 'BMW', 'в452вм', 'Карасев Иван Анатольевич', 3),
(33, 'Mazda', 'м714мм', 'Терентьева Жанна Максимовна ', 4),
(34, 'Mazda', 'в651мл', 'Савин Эрик Иванович', 14),
(35, 'Mazda', 'ц825вш', 'Терентьев Яков Максимович', 14),
(36, 'Mazda', 'а962чч', 'Некрасов Платон Львович', 9),
(37, 'Opel', 'с565ав', 'Фролов Владлен Максимович', 4),
(38, 'Opel', 'д628дщ', 'Герасимов Богдан Владимирович', 4),
(39, 'Opel', 'е656шш', 'Кондратьев Клим Андреевич', 14),
(40, 'Opel', 'у968гд', 'Исаков Пётр Алексеевич', 13),
(41, 'Peugeot', 'л236пд', 'Медведев Абрам Дмитриевич', 1),
(42, 'Peugeot', 'х388гг', 'Гордеев Кузьма Львович', 2),
(43, 'Peugeot', 'ф254аа', 'Беляев Сергей Сергеевич', 5),
(44, 'Peugeot', 'у230вв', 'Ситников Роберт Владимирович', 3),
(45, 'Renault', 'н128вы', 'Евсеев Михаил Сергеевич', 9),
(46, 'Renault', 'к568ак', 'Соловьёв Альберт Львович', 3),
(47, 'Honda', 'а368аа', 'Рябов Тимофей Евгеньевич', 14),
(48, 'Renault', 'в698ав', 'Евдокимов Иван Борисович', 4),
(49, 'Renault', 'т236см', 'Шестаков Руслан Андреевич', 14),
(50, 'Mercedes', 'д895ек', 'Потапов Данила Алексеевич', 5),
(51, 'Mercedes', 'п35аа', 'Елисеев Илья Андреевич', 8),
(52, 'Mercedes', 'п238ис', 'Филиппов Станислав Сергеевич', 1),
(53, 'Mercedes', 'с236ии', 'Фадеев Андрей Фёдорович', 2),
(54, 'Mercedes', 'т368ре', 'Матвеев Тимур Дмитриевич', 14),
(55, 'BMW', 'е555ее', 'Степанов Григорий Романович', 7),
(56, 'Honda', 'у968ку', 'Ширяев Олег Львович', 15),
(57, 'BMW', 'ф584ук', 'Владимиров Глеб Романович', 4),
(58, 'BMW', 'к695пм', 'Беляков Данила Львович', 7),
(59, 'Honda', 'п158пк', 'Дьячков Альберт Борисович', 3),
(60, 'BMW', 'р451ор', 'Устинов Кирилл Львович', 2),
(61, 'BMW', 'е365ке', 'Кабанов Макар Иванович', 12),
(62, 'Honda', 'р746ми', 'Михайлов Артемий Сергеевич', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `nomer_obor`
--

CREATE TABLE `nomer_obor` (
  `ID_nomer_obor` int(11) NOT NULL,
  `nomer` int(11) NOT NULL,
  `ID_tip_razgruzki` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `personal`
--

CREATE TABLE `personal` (
  `ID_personal` int(11) NOT NULL,
  `familiya` varchar(25) NOT NULL,
  `imya` varchar(25) NOT NULL,
  `otchestvo` varchar(25) NOT NULL,
  `ID_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `personal`
--

INSERT INTO `personal` (`ID_personal`, `familiya`, `imya`, `otchestvo`, `ID_user`) VALUES
(2, 'Шарапов ', 'Алексей ', 'Сергеевич', 1),
(20, 'Котова', 'Инна', 'Дмитриевна', 4),
(21, 'Зуев', 'Афанасий', 'Романович', 5),
(22, 'Беляева', 'Екатерина', 'Львовна', 12),
(23, 'Носков', 'Мирослав', 'Алексеевич', 11),
(24, 'Гусева', 'Марина', 'Романовна', 4),
(25, 'Третьякова', 'Таисия', 'Сергеевна', 12),
(26, 'Терентьев', 'Гавриил', 'Евгеньевич', 3),
(27, 'Журавлёва', 'Флорентина', 'Андреевна', 7),
(28, 'Носов', 'Борис', 'Алексеевич', 6),
(29, 'Костин', 'Ростислав', 'Алексеевич', 10),
(30, 'Сорокина', 'Антонина', 'Алексеевна', 12),
(31, 'Сафонова', 'Таисия', 'Евгеньевна', 6),
(32, 'Миронов', 'Константин', 'Фёдорович', 8),
(33, 'Галкина', 'Анастасия', 'Романовна', 14),
(34, 'Борисов', 'Степан', 'Андреевич', 9),
(35, 'Голубева', 'Полина', 'Александровна', 9),
(36, 'Жданов', 'Виктор', 'Борисович', 3),
(37, 'Лукина', 'Таисия', 'Дмитриевна', 8),
(38, 'Нестеров', 'Герман', 'Сергеевич', 1),
(39, 'Шилова', 'Ирина', 'Фёдоровна', 15),
(40, 'Кузнецов', 'Артур', 'Александрович', 9),
(41, 'Гущин', 'Павел', 'Сергеевич', 4),
(42, 'Семёнова', 'Алиса', 'Андреевна', 5),
(43, 'Жуков', 'Дмитрий', 'Владимирович', 9),
(44, 'Рогов', 'Игорь', 'Борисович', 3),
(50, 'Ильина', 'Владлена', 'Львовна', 2),
(66, 'Кулаков', 'Иосиф', 'Дмитриевич', 14),
(67, 'Селиверстов', 'Аким', 'Фёдорович', 13),
(68, 'Шестакова', 'Мальвина', 'Евгеньевна', 9);

-- --------------------------------------------------------

--
-- Структура таблицы `placement`
--

CREATE TABLE `placement` (
  `ID_placement` int(11) NOT NULL,
  `number` varchar(5) NOT NULL,
  `ploschad` int(11) NOT NULL,
  `ID_type_placement` int(11) NOT NULL,
  `ID_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `placement`
--

INSERT INTO `placement` (`ID_placement`, `number`, `ploschad`, `ID_type_placement`, `ID_user`) VALUES
(1, '205', 20, 1, 1),
(2, '201а', 50, 2, 1),
(5, '101', 200, 1, 3),
(21, '619', 812, 3, 5),
(22, '389', 222, 1, 6),
(23, '469', 122, 4, 15),
(24, '618', 94, 2, 9),
(25, '657', 546, 3, 10),
(26, '568', 303, 4, 2),
(27, '732', 470, 1, 13),
(28, '420', 712, 2, 3),
(29, '603', 144, 2, 2),
(30, '395', 329, 3, 8),
(31, '308', 521, 4, 3),
(32, '267', 990, 4, 11),
(33, '610', 800, 3, 2),
(34, '779', 350, 4, 12),
(35, '487', 840, 3, 8),
(36, '662', 289, 3, 12),
(37, '286', 950, 2, 12),
(38, '571', 938, 2, 4),
(39, '953', 962, 1, 11),
(40, '113', 308, 2, 9),
(41, '116', 327, 4, 11),
(42, '654', 425, 4, 1),
(43, '597', 1, 4, 8),
(44, '158', 478, 1, 14),
(45, '501', 91, 2, 7),
(46, '390', 755, 4, 2),
(47, '613', 766, 2, 7),
(48, '324', 303, 3, 7),
(49, '343', 845, 4, 9),
(50, '288', 263, 4, 10),
(51, '693', 451, 4, 8),
(52, '394', 719, 4, 13),
(53, '812', 53, 2, 3),
(54, '482', 321, 2, 8),
(55, '798', 255, 2, 3),
(56, '495', 742, 4, 5),
(57, '344', 468, 4, 2),
(58, '916', 820, 1, 8),
(59, '471', 702, 3, 1),
(60, '458', 956, 4, 13),
(61, '355', 634, 1, 14),
(63, '653', 857, 1, 13),
(64, '374', 416, 2, 8),
(65, '264', 883, 2, 3),
(66, '658', 460, 2, 7),
(67, '802', 607, 2, 6),
(68, '669', 248, 4, 14),
(69, '684', 687, 1, 9),
(70, '3', 696, 2, 7),
(71, '456', 162, 2, 9),
(72, '110', 436, 1, 15),
(73, '582', 288, 2, 13),
(74, '165', 960, 1, 7),
(75, '816', 547, 2, 13),
(76, '902', 33, 2, 4),
(77, '996', 464, 2, 9),
(78, '473', 369, 4, 15),
(79, '256', 297, 2, 10),
(80, '466', 669, 2, 2),
(81, '912', 397, 4, 13),
(82, '475', 707, 3, 11),
(83, '557', 845, 1, 1),
(84, '77', 67, 1, 13),
(86, '968', 161, 3, 15),
(87, '464', 931, 2, 12),
(88, '143', 426, 1, 8),
(89, '106', 422, 3, 9),
(90, '928', 156, 4, 11),
(91, '30', 467, 4, 2),
(92, '673', 151, 1, 10),
(93, '370', 475, 3, 8),
(95, '751', 286, 3, 5),
(96, '425', 890, 1, 11),
(97, '382', 253, 2, 7),
(98, '608', 511, 2, 2),
(99, '761', 228, 4, 9),
(100, '500', 295, 4, 3),
(101, '967', 909, 2, 11);

-- --------------------------------------------------------

--
-- Структура таблицы `razgruzka`
--

CREATE TABLE `razgruzka` (
  `ID_razgruzka` int(11) NOT NULL,
  `data` date NOT NULL,
  `vremya_nachala` time NOT NULL,
  `vremya_okonch` time NOT NULL,
  `ID_user` int(11) NOT NULL,
  `ID_tip_razgruzki` int(11) NOT NULL,
  `ID_nomer_obor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `razgruzka_pogruzka`
--

CREATE TABLE `razgruzka_pogruzka` (
  `ID_razgr_pogr` int(11) NOT NULL,
  `ID_vid_razgr_pogr` int(11) NOT NULL,
  `data` date NOT NULL,
  `comment` varchar(200) NOT NULL,
  `data_zayavki` datetime NOT NULL,
  `ID_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `razgruzka_pogruzka`
--

INSERT INTO `razgruzka_pogruzka` (`ID_razgr_pogr`, `ID_vid_razgr_pogr`, `data`, `comment`, `data_zayavki`, `ID_user`) VALUES
(14, 2, '2019-06-16', 'Поднять оборудование до склада', '2019-05-31 12:02:47', 2),
(15, 2, '2019-06-28', '3 коробки до склада', '2019-06-09 23:32:34', 12),
(16, 3, '2019-06-22', '', '2019-06-09 23:34:56', 9),
(17, 1, '2019-06-13', '', '2019-06-09 23:35:42', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `stroitelstvo`
--

CREATE TABLE `stroitelstvo` (
  `ID_stroitelstvo` int(11) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `data_zayavki` datetime NOT NULL,
  `ID_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `stroitelstvo`
--

INSERT INTO `stroitelstvo` (`ID_stroitelstvo`, `comment`, `data_zayavki`, `ID_user`) VALUES
(2, 'Побелить потолки в помещении 407', '2019-05-31 12:03:42', 2),
(3, 'Замена окна', '2019-06-09 23:32:00', 4),
(4, 'Покраска стен ', '2019-06-09 23:33:28', 15);

-- --------------------------------------------------------

--
-- Структура таблицы `tip_razgruzki`
--

CREATE TABLE `tip_razgruzki` (
  `ID_tip_razgruzki` int(11) NOT NULL,
  `naimenovanie` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tip_razgruzki`
--

INSERT INTO `tip_razgruzki` (`ID_tip_razgruzki`, `naimenovanie`) VALUES
(1, 'Лифт'),
(2, 'Ворота');

-- --------------------------------------------------------

--
-- Структура таблицы `transport`
--

CREATE TABLE `transport` (
  `ID_transport` int(11) NOT NULL,
  `data_nachala` date NOT NULL,
  `data_okonch` date NOT NULL,
  `marka` varchar(20) NOT NULL,
  `number` varchar(10) NOT NULL,
  `FIO` varchar(100) NOT NULL,
  `ID_vid_zayavki` int(11) NOT NULL,
  `data_zayavki` datetime NOT NULL,
  `ID_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `transport`
--

INSERT INTO `transport` (`ID_transport`, `data_nachala`, `data_okonch`, `marka`, `number`, `FIO`, `ID_vid_zayavki`, `data_zayavki`, `ID_user`) VALUES
(2, '2019-06-01', '2019-05-31', 'Honda', 'м569ку', 'Петров Иван Рустамович', 2, '2019-05-31 12:03:30', 2),
(3, '2019-06-21', '2019-06-30', 'BMW', 'у532аы', 'Касимова Екатерина Викторовна', 3, '2019-06-09 23:33:00', 12);

-- --------------------------------------------------------

--
-- Структура таблицы `type_arendatora`
--

CREATE TABLE `type_arendatora` (
  `ID_type_arendatora` int(11) NOT NULL,
  `naimenovanie` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `type_arendatora`
--

INSERT INTO `type_arendatora` (`ID_type_arendatora`, `naimenovanie`) VALUES
(1, 'ИП'),
(2, 'ФЛ'),
(3, 'ООО');

-- --------------------------------------------------------

--
-- Структура таблицы `type_placement`
--

CREATE TABLE `type_placement` (
  `ID_type_placement` int(11) NOT NULL,
  `naimenovanie` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `type_placement`
--

INSERT INTO `type_placement` (`ID_type_placement`, `naimenovanie`) VALUES
(1, 'складское'),
(2, 'производственное'),
(3, 'офисное'),
(4, 'производственно-складское');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `ID_user` int(11) NOT NULL,
  `nomer_dogovora` varchar(14) NOT NULL,
  `password` varchar(20) NOT NULL,
  `prava_dostypa` int(11) NOT NULL,
  `familiya` varchar(25) DEFAULT NULL,
  `imya` varchar(25) DEFAULT NULL,
  `otchestvo` varchar(25) DEFAULT NULL,
  `nazvanie_organizacii` varchar(50) DEFAULT NULL,
  `telephone` varchar(15) DEFAULT NULL,
  `rezerv_telephone` varchar(15) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `data_podpicaniya_dogovora` date NOT NULL,
  `ID_type_arendatora` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`ID_user`, `nomer_dogovora`, `password`, `prava_dostypa`, `familiya`, `imya`, `otchestvo`, `nazvanie_organizacii`, `telephone`, `rezerv_telephone`, `email`, `data_podpicaniya_dogovora`, `ID_type_arendatora`) VALUES
(1, '67/05-04-2019А', '123456', 1, 'Иванютина', 'Анастасия', 'Олеговна', NULL, '8(914)231-23-52', '8(925)827-31-90', 'bronislav84@hotmail.com', '2019-04-10', 1),
(2, '11/00-00-0000А', '1234', 1, NULL, NULL, NULL, 'Лучшая организация', '8(903)555-29-55', '8(944)559-45-63', 'mknyzev@hotmail.com', '2019-05-01', 3),
(3, '99/99-99-1999Д', '1234', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 0),
(4, '86/23-45-3812А', 'pass', 1, 'Егоров', 'Артём', 'Андреевич', NULL, '8(995)055-64-02', '70/63-22-8752Ð', 'sukanov.olga@nikitin.ru', '2018-08-06', 2),
(5, '88/40-25-2494А', '4cl951l3', 1, 'Фокин', 'Григорий', 'Борисович', NULL, '8(900)950-99-27', '8(968)884-43-45', 'larisa.orekov@subin.ru', '2019-02-07', 1),
(6, '69/51-18-5218А', '3cg547c4', 1, NULL, NULL, NULL, 'ГазТехВекторСбыт', '8(942)016-97-25', '8(964)159-27-32', 'lybov.sobolev@ya.ru', '2019-01-27', 3),
(7, '24/45-21-0070А', '7kc754b3', 1, 'Моисеев', 'Леонид', 'Иванович', NULL, '8(960)958-37-54', '8(916)397-81-94', 'rlukin@inbox.ru', '2018-10-16', 1),
(8, '89/08-70-9940А', '3so011e9', 1, 'Исаков', 'Руслан', 'Львович', NULL, '8(900)371-38-26', '8(914)599-11-42', 'bgulyev@komarov.com', '2018-03-06', 1),
(9, '04/03-58-6618А', '3ut247r5', 1, 'Казакова', 'Лада', 'Романовна', NULL, '8(902)720-10-57', '8(906)975-47-11', 'polina89@romanov.com', '2018-06-18', 1),
(10, '51/58-43-5770А', '5kz295d2', 1, 'Яковлева', 'Диана', 'Алексеевна', NULL, '8(988)469-46-94', '8(958)333-59-50', 'itvetkov@fomicev.ru', '2018-10-26', 1),
(11, '59/19-82-0023А', '8dj757x8', 1, 'Носков', 'Олег', 'Романович', NULL, '8(904)639-86-69', '8(917)231-68-52', 'liliy70@konovalov.ru', '2018-10-01', 1),
(12, '57/88-29-4912А', '1fe881w2', 1, 'Дементьев', 'Вениамин', 'Фёдорович', NULL, '8(907)343-76-59', '8(924)379-37-44', 'veniamin37@blinov.ru', '2018-12-15', 1),
(13, '64/62-77-7122А', '9qo921t0', 1, 'Авдеева', 'Ульяна', 'Евгеньевна', NULL, '8(994)969-91-14', '8(979)712-44-81', 'ulyna.avdeev@mail.ru', '2018-09-26', 1),
(14, '31/31-22-4838А', '8il048q5', 1, NULL, NULL, NULL, 'МикроИнфо', '8(941)862-80-86', '8(979)190-16-69', 'lukin.diana@mail.ru', '2018-03-01', 3),
(15, '84/20-68-8975А', '0lc985g330', 1, NULL, NULL, NULL, 'ЭлектроРадиПлюч', '8(955)788-54-54', '8(914)009-59-88', 'evgenii.ydin@gmail.com', '2018-09-12', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `vid_razgr_pogr`
--

CREATE TABLE `vid_razgr_pogr` (
  `ID_vid_razgr_pogr` int(11) NOT NULL,
  `naimenovanie` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `vid_razgr_pogr`
--

INSERT INTO `vid_razgr_pogr` (`ID_vid_razgr_pogr`, `naimenovanie`) VALUES
(1, 'Разгрузка-погрузка'),
(2, 'Подъем до склада'),
(3, 'Кросс-докинг');

-- --------------------------------------------------------

--
-- Структура таблицы `vid_sotrudnika`
--

CREATE TABLE `vid_sotrudnika` (
  `ID_vid_sotrudnika` int(11) NOT NULL,
  `naimenovanie` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `vid_sotrudnika`
--

INSERT INTO `vid_sotrudnika` (`ID_vid_sotrudnika`, `naimenovanie`) VALUES
(1, 'Уборщица'),
(2, 'Сантехник'),
(3, 'Электрик'),
(4, 'Разнорабочий');

-- --------------------------------------------------------

--
-- Структура таблицы `vid_zayavki`
--

CREATE TABLE `vid_zayavki` (
  `ID_vid_zayavki` int(11) NOT NULL,
  `naimenovanie` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `vid_zayavki`
--

INSERT INTO `vid_zayavki` (`ID_vid_zayavki`, `naimenovanie`) VALUES
(1, 'Круглосуточная стоянка'),
(2, 'Ночной отстой'),
(3, 'Временный доступ');

-- --------------------------------------------------------

--
-- Структура таблицы `vizov_sotrudnika`
--

CREATE TABLE `vizov_sotrudnika` (
  `ID_vizov_sotrudnika` int(11) NOT NULL,
  `data` date NOT NULL,
  `comment` varchar(200) NOT NULL,
  `ID_vid_sotrudnika` int(11) NOT NULL,
  `data_zayavki` datetime NOT NULL,
  `ID_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `vizov_sotrudnika`
--

INSERT INTO `vizov_sotrudnika` (`ID_vizov_sotrudnika`, `data`, `comment`, `ID_vid_sotrudnika`, `data_zayavki`, `ID_user`) VALUES
(2, '2019-06-02', 'проводка', 3, '2019-05-31 11:54:20', 2),
(3, '2019-06-01', 'клининг склада', 1, '2019-05-31 12:03:00', 2),
(4, '2019-06-21', '', 4, '2019-06-09 23:31:50', 4),
(5, '2019-06-15', 'Замена ламп', 3, '2019-06-09 23:33:40', 15),
(6, '2019-06-14', 'Течет труба', 2, '2019-06-09 23:35:06', 9),
(7, '2019-06-30', 'Влажная уборка', 1, '2019-06-09 23:36:15', 13);

-- --------------------------------------------------------

--
-- Структура для представления `all_zayavki`
--
DROP TABLE IF EXISTS `all_zayavki`;

CREATE ALGORITHM=UNDEFINED DEFINER=`db`@`%` SQL SECURITY DEFINER VIEW `all_zayavki`  AS  select 'stroitelstvo' AS `naimen_usl`,0 AS `data_nach`,0 AS `data_okonch`,0 AS `marka`,0 AS `number`,0 AS `FIo_vod`,0 AS `vid_usl`,`stroitelstvo`.`comment` AS `comment`,`stroitelstvo`.`data_zayavki` AS `data_zayavki`,`user`.`familiya` AS `familiya`,`user`.`imya` AS `imya`,`user`.`otchestvo` AS `otchestvo`,`user`.`nazvanie_organizacii` AS `nazvanie_organizacii`,`user`.`telephone` AS `telephone`,`user`.`rezerv_telephone` AS `rezerv_telephone` from (`stroitelstvo` join `user`) where (`stroitelstvo`.`ID_user` = `user`.`ID_user`) union all select 'razgr_pogr' AS `razgr_pogr`,`razgruzka_pogruzka`.`data` AS `data`,0 AS `0`,0 AS `0`,0 AS `0`,0 AS `0`,`vid_razgr_pogr`.`naimenovanie` AS `naimenovanie`,`razgruzka_pogruzka`.`comment` AS `COMMENT`,`razgruzka_pogruzka`.`data_zayavki` AS `data_zayavki`,`user`.`familiya` AS `familiya`,`user`.`imya` AS `imya`,`user`.`otchestvo` AS `otchestvo`,`user`.`nazvanie_organizacii` AS `nazvanie_organizacii`,`user`.`telephone` AS `telephone`,`user`.`rezerv_telephone` AS `rezerv_telephone` from ((`razgruzka_pogruzka` join `vid_razgr_pogr`) join `user`) where ((`razgruzka_pogruzka`.`ID_vid_razgr_pogr` = `vid_razgr_pogr`.`ID_vid_razgr_pogr`) and (`razgruzka_pogruzka`.`ID_user` = `user`.`ID_user`)) union all select 'transport' AS `transport`,`transport`.`data_nachala` AS `data_nachala`,`transport`.`data_okonch` AS `data_okonch`,`transport`.`marka` AS `marka`,`transport`.`number` AS `number`,`transport`.`FIO` AS `FIO`,`vid_zayavki`.`naimenovanie` AS `naimenovanie`,0 AS `0`,`transport`.`data_zayavki` AS `data_zayavki`,`user`.`familiya` AS `familiya`,`user`.`imya` AS `imya`,`user`.`otchestvo` AS `otchestvo`,`user`.`nazvanie_organizacii` AS `nazvanie_organizacii`,`user`.`telephone` AS `telephone`,`user`.`rezerv_telephone` AS `rezerv_telephone` from ((`transport` join `user`) join `vid_zayavki`) where ((`transport`.`ID_user` = `user`.`ID_user`) and (`transport`.`ID_vid_zayavki` = `vid_zayavki`.`ID_vid_zayavki`)) union all select 'vizov_sotr' AS `vizov_sotr`,`vizov_sotrudnika`.`data` AS `data`,0 AS `0`,0 AS `0`,0 AS `0`,0 AS `0`,`vid_sotrudnika`.`naimenovanie` AS `naimenovanie`,`vizov_sotrudnika`.`comment` AS `comment`,`vizov_sotrudnika`.`data_zayavki` AS `data_zayavki`,`user`.`familiya` AS `familiya`,`user`.`imya` AS `imya`,`user`.`otchestvo` AS `otchestvo`,`user`.`nazvanie_organizacii` AS `nazvanie_organizacii`,`user`.`telephone` AS `telephone`,`user`.`rezerv_telephone` AS `rezerv_telephone` from ((`vizov_sotrudnika` join `vid_sotrudnika`) join `user`) where ((`vizov_sotrudnika`.`ID_vid_sotrudnika` = `vid_sotrudnika`.`ID_vid_sotrudnika`) and (`vizov_sotrudnika`.`ID_user` = `user`.`ID_user`)) order by `data_zayavki` desc ;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`ID_car`);

--
-- Индексы таблицы `nomer_obor`
--
ALTER TABLE `nomer_obor`
  ADD PRIMARY KEY (`ID_nomer_obor`);

--
-- Индексы таблицы `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`ID_personal`);

--
-- Индексы таблицы `placement`
--
ALTER TABLE `placement`
  ADD PRIMARY KEY (`ID_placement`);

--
-- Индексы таблицы `razgruzka`
--
ALTER TABLE `razgruzka`
  ADD PRIMARY KEY (`ID_razgruzka`);

--
-- Индексы таблицы `razgruzka_pogruzka`
--
ALTER TABLE `razgruzka_pogruzka`
  ADD PRIMARY KEY (`ID_razgr_pogr`);

--
-- Индексы таблицы `stroitelstvo`
--
ALTER TABLE `stroitelstvo`
  ADD PRIMARY KEY (`ID_stroitelstvo`);

--
-- Индексы таблицы `tip_razgruzki`
--
ALTER TABLE `tip_razgruzki`
  ADD PRIMARY KEY (`ID_tip_razgruzki`);

--
-- Индексы таблицы `transport`
--
ALTER TABLE `transport`
  ADD PRIMARY KEY (`ID_transport`);

--
-- Индексы таблицы `type_arendatora`
--
ALTER TABLE `type_arendatora`
  ADD PRIMARY KEY (`ID_type_arendatora`);

--
-- Индексы таблицы `type_placement`
--
ALTER TABLE `type_placement`
  ADD PRIMARY KEY (`ID_type_placement`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_user`);

--
-- Индексы таблицы `vid_razgr_pogr`
--
ALTER TABLE `vid_razgr_pogr`
  ADD PRIMARY KEY (`ID_vid_razgr_pogr`);

--
-- Индексы таблицы `vid_sotrudnika`
--
ALTER TABLE `vid_sotrudnika`
  ADD PRIMARY KEY (`ID_vid_sotrudnika`);

--
-- Индексы таблицы `vid_zayavki`
--
ALTER TABLE `vid_zayavki`
  ADD PRIMARY KEY (`ID_vid_zayavki`);

--
-- Индексы таблицы `vizov_sotrudnika`
--
ALTER TABLE `vizov_sotrudnika`
  ADD PRIMARY KEY (`ID_vizov_sotrudnika`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `car`
--
ALTER TABLE `car`
  MODIFY `ID_car` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT для таблицы `nomer_obor`
--
ALTER TABLE `nomer_obor`
  MODIFY `ID_nomer_obor` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `personal`
--
ALTER TABLE `personal`
  MODIFY `ID_personal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT для таблицы `placement`
--
ALTER TABLE `placement`
  MODIFY `ID_placement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT для таблицы `razgruzka_pogruzka`
--
ALTER TABLE `razgruzka_pogruzka`
  MODIFY `ID_razgr_pogr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT для таблицы `stroitelstvo`
--
ALTER TABLE `stroitelstvo`
  MODIFY `ID_stroitelstvo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `tip_razgruzki`
--
ALTER TABLE `tip_razgruzki`
  MODIFY `ID_tip_razgruzki` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `transport`
--
ALTER TABLE `transport`
  MODIFY `ID_transport` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `type_arendatora`
--
ALTER TABLE `type_arendatora`
  MODIFY `ID_type_arendatora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `type_placement`
--
ALTER TABLE `type_placement`
  MODIFY `ID_type_placement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `ID_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT для таблицы `vid_razgr_pogr`
--
ALTER TABLE `vid_razgr_pogr`
  MODIFY `ID_vid_razgr_pogr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `vid_sotrudnika`
--
ALTER TABLE `vid_sotrudnika`
  MODIFY `ID_vid_sotrudnika` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `vid_zayavki`
--
ALTER TABLE `vid_zayavki`
  MODIFY `ID_vid_zayavki` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `vizov_sotrudnika`
--
ALTER TABLE `vizov_sotrudnika`
  MODIFY `ID_vizov_sotrudnika` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
