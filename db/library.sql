use library;


CREATE TABLE `authors` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO `authors` VALUES (1,'Ivan Ivanov'),(2,'Max Petrov');




CREATE TABLE `book_types` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `book_types` VALUES (1,'Paper'),(2,'Digital');


CREATE TABLE `books` (
  `id` int NOT NULL AUTO_INCREMENT,
  `author_id` int NOT NULL,
  `name` text,
  `description` text,
  `publish_year` int DEFAULT NULL,
  `image` varchar(256) DEFAULT NULL,
  `type_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `books_authors_id_fk` (`author_id`),
  KEY `books_book_types_id_fk` (`type_id`),
  CONSTRAINT `books_authors_id_fk` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`),
  CONSTRAINT `books_book_types_id_fk` FOREIGN KEY (`type_id`) REFERENCES `book_types` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;



INSERT INTO `books` VALUES (1,2,'Harry potter and the philosopher\'s stone','Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s',2018,'https://images.unsplash.com/photo-1586796676789-f6fe8cc276f7?auto=format&fit=crop&w=200',1),(2,2,'Book second','Lorem Ipsum is simply dummy text of the printing and typesetting industry.',2022,'https://images.unsplash.com/photo-1657299156185-6f5de6da0996?auto=format&fit=crop&w=200',2),(14,1,'new book','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. ',2007,'https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1627673942i/58341222.jpg',1);


CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO `users` VALUES (1,'User1','user@user.com'),(2,'User2','user2@user.com'),(3,'User3','user3@user.com'),(4,'User4','user4@user.com'),(5,'User5','user5@user.com');

CREATE TABLE `book_taken` (
  `id` int NOT NULL AUTO_INCREMENT,
  `book_id` int NOT NULL,
  `user_id` int NOT NULL,
  `from_time` timestamp NOT NULL,
  `to_time` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `book_taken_books_id_fk` (`book_id`),
  KEY `book_taken_users_id_fk` (`user_id`),
  CONSTRAINT `book_taken_books_id_fk` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  CONSTRAINT `book_taken_users_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO `book_taken` VALUES (1,1,1,'2022-08-27 21:00:00','2022-09-13 21:00:00'),(2,1,1,'2022-09-20 21:00:00','2022-09-27 21:00:00'),(8,1,1,'2022-10-19 21:00:00','2022-10-23 21:00:00'),(10,2,4,'2022-08-28 21:00:00','2022-08-30 21:00:00');

