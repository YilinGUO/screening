USE screening;

CREATE TABLE people (
  id INTEGER PRIMARY KEY AUTO_INCREMENT,
  first_name VARCHAR(38) NOT NULL,
  middle_name VARCHAR(38),
  last_name VARCHAR(38) NOT NULL,
  url VARCHAR(100)
);


CREATE TABLE news (
  id INTEGER PRIMARY KEY AUTO_INCREMENT,
  title VARCHAR(100) NOT NULL,
  content VARCHAR(1000) NOT NULL
);

CREATE TABLE website (
  id INTEGER PRIMARY KEY AUTO_INCREMENT,
  url VARCHAR(100) NOT NULL
);

CREATE TABLE publication (
  id INTEGER PRIMARY KEY AUTO_INCREMENT,
  pub_name VARCHAR(100) NOT NULL,
  pdate DATE,
  url VARCHAR(100),
  award VARCHAR(38)
);

CREATE TABLE project (
  id INTEGER PRIMARY KEY AUTO_INCREMENT,
  pname VARCHAR(38),
  pdescp VARCHAR(100),
  pcontent VARCHAR(5000),
  url VARCHAR(100)
);

CREATE TABLE people_publish (
  people_id INTEGER NOT NULL,
  pub_id INTEGER NOT NULL,
  FOREIGN KEY (people_id) REFERENCES people(id),
  FOREIGN KEY (pub_id) REFERENCES publication(id)
);

CREATE TABLE people_project (
  people_id INTEGER NOT NULL,
  project_id INTEGER NOT NULL,
  FOREIGN KEY (people_id) REFERENCES people(id),
  FOREIGN KEY (project_id) REFERENCES project(id)
);

CREATE TABLE project_publish (
  project_id INTEGER NOT NULL,
  pub_id INTEGER NOT NULL,
  FOREIGN KEY (project_id) REFERENCES project(id),
  FOREIGN KEY (pub_id) REFERENCES publication(id)
);

CREATE TABLE project_news (
  project_id INTEGER NOT NULL,
  news_id INTEGER NOT NULL,
  FOREIGN KEY (project_id) REFERENCES project(id),
  FOREIGN KEY (news_id) REFERENCES news(id)
);

CREATE TABLE publish_website (
  pub_id INTEGER NOT NULL,
  web_id INTEGER NOT NULL,
  FOREIGN KEY (pub_id) REFERENCES publication(id),
  FOREIGN KEY (web_id) REFERENCES website(id)
);


