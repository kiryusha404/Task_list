-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 13 2023 г., 21:27
-- Версия сервера: 5.6.47
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `tasklist`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` varchar(512) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `created_at`) VALUES
(1, '1', '1', '2023-06-22 16:14:17'),
(2, 'sdf', '$2y$10$.GxQ.44HiIeihgGqdrGgR.cafP31Mjyj1P4nQF1deJbgPnrNZpcjS', '2023-06-13 16:11:43'),
(3, 'dsf', '$2y$10$St9Zf.elLsfx9YPcjcmm4uuspDmoIaAstO9UNTznx/7rxZzXtdnhS', '2023-06-13 16:11:45'),
(4, 'dfgdfhg', '$2y$10$5iCRWs2RbJnQ.9jlGG6R9u3kRFTED3gKB9ka02ub5uK512mXtxU3C', '2023-06-13 16:12:19'),
(5, 'k', '$2y$10$O4FZaI73mTXmo/nqRbbDcuQ0rMkSpRadwvC.jN19rk2YNhndWk1wa', '2023-06-13 16:12:40'),
(6, 'r', '$2y$10$WJIxqAt6.OkjPALjuGIzReRczH/IjSz6zEv/IHvgcLIFUgPoYxlMG', '2023-06-13 16:12:49'),
(7, 'ывап', '$2y$10$J2HiFHWqBmYWQ1z2NxAkDuDdOWh4vr9g1VOw3zx/6t4fc//oL9HCy', '2023-06-13 17:01:10'),
(8, 'выа', '$2y$10$0l4EsMkfxummKXiLHBcbpeRSSsQLPW8lq.8IqFkEpf0/Bsa0TKIme', '2023-06-13 17:01:13'),
(9, 'rrr', '$2y$10$eltz40Iqf7ZoAwdj3a/Ty.1BWc9eVcf4aB/9RFv.4cvczanRPrd96', '2023-06-13 17:18:54'),
(10, 'sdfsdf', '$2y$10$j6pTE2fVygi.E0aGfQyJM.CzxNq6ZBEfFWWak/L4wNqK/j27b8DoG', '2023-06-13 17:45:31');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
