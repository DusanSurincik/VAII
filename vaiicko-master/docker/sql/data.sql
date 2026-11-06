CREATE TABLE `events` (
                          `id` INT AUTO_INCREMENT PRIMARY KEY,
                          `title` VARCHAR(255) NOT NULL,
                          `description` TEXT NOT NULL,
                          `date` DATETIME NOT NULL,
                          `location` VARCHAR(255) NOT NULL,
                          `price` DECIMAL(10, 2) NOT NULL DEFAULT 0.00,
                          `image` VARCHAR(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `events` (`title`, `description`, `date`, `location`, `price`, `image`) VALUES
    ('Koncert kapely Nirvana', 'Živá hudba pod holým nebom a skvelá atmosféra.', '2026-07-15 19:00:00', 'Mestský park, Žilina', 15.00, 'images/concert.jpg'),
    ('Divadelná hra Hamlet', 'Klasická tragédia od Shakespeara.', '2026-08-20 18:30:00', 'Mestské divadlo, Žilina', 12.50, 'images/hamlet.jpg'),
    ('Slovan - HK Nitra', 'Veľkolepý zápas rivalov.', '2026-09-22 21:00:00', 'Hokejový štadión, Žilina', 5.00, 'images/slovan.jpg');
