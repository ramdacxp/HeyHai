CREATE TABLE `jokes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` tinytext NOT NULL,
  `question` tinytext NOT NULL,
  `answer` tinytext NOT NULL,
  `showAnswer` tinyint(1) NOT NULL DEFAULT 0,
  `upVotes` int(11) NOT NULL DEFAULT 0,
  `downVotes` int(11) NOT NULL DEFAULT 0,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=3;

INSERT INTO `jokes` (`id`, `title`, `question`, `answer`, `showAnswer`, `upVotes`, `downVotes`, `created`) VALUES
(1, 'Bond, James Bond', 'Von welchem Raubtier würde sich James Bond das Frühstück servieren lassen, aber niemals seinen Martini?', 'Vom Rührhai.', 1, 0, 0, '2025-04-26 21:54:14'),
(2, 'Anhalter', 'What is the answer to the ultimate question of life, the universe, and everything?', 'The answer is 42.', 1, 0, 0, '2025-04-26 21:56:39');
