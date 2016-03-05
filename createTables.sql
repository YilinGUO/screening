USE screening;

CREATE TABLE people (
  people_id INTEGER PRIMARY KEY AUTO_INCREMENT,
  first_name VARCHAR(38),
  last_name VARCHAR(38)
);


CREATE TABLE news_article (
  nid INTEGER PRIMARY KEY AUTO_INCREMENT
);


CREATE TABLE publication (
  pub_id INTEGER PRIMARY KEY AUTO_INCREMENT,
  people_id INTEGER,
  pub_name VARCHAR(38),
  pdate DATE,
  FOREIGN KEY (people_id) REFERENCES people(people_id)
);



CREATE TABLE website (
  wid INTEGER PRIMARY KEY AUTO_INCREMENT,
  url VARCHAR(38)
);



CREATE TABLE project_content (
  pcid INTEGER PRIMARY KEY AUTO_INCREMENT,
  pcontent VARCHAR(1000)
);

CREATE TABLE project (
  project_id INTEGER PRIMARY KEY AUTO_INCREMENT,
  pname VARCHAR(38),
  pcid INTEGER,
  wid INTEGER,
  people_id INTEGER,
  pub_id INTEGER,
  FOREIGN KEY (people_id) REFERENCES people(people_id),
  FOREIGN KEY (wid) REFERENCES website(wid),
  FOREIGN KEY (pub_id) REFERENCES publication(pub_id),
  FOREIGN KEY (pcid) REFERENCES project_content(pcid)
);


