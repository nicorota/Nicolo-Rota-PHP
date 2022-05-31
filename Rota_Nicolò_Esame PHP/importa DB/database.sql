SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `Ricette` (
  `Nome` varchar(30) NOT NULL,
  `Difficolta` int(1) NOT NULL,
  `Descrizione` varchar(200) NOT NULL,
  `Nome_ingrediente` varchar(20) NOT NULL,
  `Quantita_ingrediente` int(4) NOT NULL,
  `Unita_m_ingrediente` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `ricette` (`Nome`, `Difficolta`, `Descrizione`, `Nome_ingrediente`, `Quantita_ingrediente`, `Unita_m_ingrediente`) VALUES
("Uova occhio di bue", 1, "Cucinare l' uovo sulla padella", "Uovo", 1, "n"),
("Uovo sodo", 1, "Cucinare l'uovo con il guscio", "Uovo", 1, "n");

----------------------------------------------------------

-- Struttura della tabella `users`

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(150) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `pr_id` varchar(240) DEFAULT NULL,
  `joining_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`, `pr_id`, `joining_date`) VALUES
(0, 'admin', 'admin@mail.com', '$2y$10$aOlPrYHUoovjuenLel1eI.rQvmJ6j.iHYzcObthU/VHgn2z3YSTRi', 'ZNY7mx0Uk7yVjcZhXSjyUp6w2yntaPwgLKPMS3cnl6ixtwDY0LbDBHpRi7pCadMl', '2017-05-07 08:32:13');

ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
;
