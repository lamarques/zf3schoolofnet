create table post (id INTEGER PRIMARY KEY AUTOINCREMENT, title varchar(255) not null, content text not null);
INSERT INTO post (title, content) VALUES ('Post1', 'Content 1');
INSERT INTO post (title, content) VALUES ('Post2', 'Content 2');
INSERT INTO post (title, content) VALUES ('Post3', 'Content 3');
INSERT INTO post (title, content) VALUES ('Post4', 'Content 4');

CREATE TABLE comments
(
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  content TEXT NOT NULL,
  post_id INTEGER NOT NULL
);

INSERT INTO comments (content, post_id) VALUES ('Comentário 1', 1);
INSERT INTO comments (content, post_id) VALUES ('Comentário 2', 1);
INSERT INTO comments (content, post_id) VALUES ('Comentário 3', 2);
INSERT INTO comments (content, post_id) VALUES ('Comentário 4', 2);

CREATE TABLE users
(
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  username VARCHAR(100) UNIQUE NOT NULL,
  password VARCHAR(60) NOT NULL,
  full_name VARCHAR(150) NOT NULL
);
INSERT INTO users (username, password, full_name)  VALUES ('lamarques@lamarques.com.br', '$2y$10$NEgGrXll4nqLLiRY94ueJua02eryS.X7cQnPCKve2HiBknq1P2Wja', 'Rogerio Lamaruqes');

