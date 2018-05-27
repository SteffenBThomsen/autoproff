CREATE TABLE brands (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  name VARCHAR(255) NOT NULL UNIQUE,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
INSERT INTO brands (name) VALUES ('Audi'), ('BMW'), ('Citroën'), ('Ford');


CREATE TABLE models (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  name VARCHAR(255) NOT NULL UNIQUE,
  brand_id INTEGER NOT NULL REFERENCES brands(id) ON DELETE CASCADE,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
INSERT INTO models (name, brand_id) VALUES ('A4', 1), ('A3', 1), ('114d', 2), ('220d', 2), ('C1', 3), ('C3', 3), ('Focus', 4), ('Escort', 4);


create table engines (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  model_id INTEGER NOT NULL REFERENCES models(id) ON DELETE CASCADE,
  size DECIMAL(2, 2) NOT NULL,
  type VARCHAR(255),
  horsepower VARCHAR(255) NOT NULL,
  automatic TINYINT(1) DEFAULT 0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
insert into engines (model_id, size, type, horsepower, automatic) values
  (1, 2, 'TDi', 150, 0),
  (1, 2.4, 'V6', 170, 0),
  (2, 2, 'TDi', 184, 0),
  (2, 1.4, 'TFSi', 150, 0),
  (3, 1.6, null, 184, 0),
  (4, 2.0, null, 190, 1),
  (5, 1.0, 'e-VTi', 68, 0),
  (5, 1.2, 'PT', 82, 0),
  (6, 1.6, 'BlueHDi', 75, 0),
  (6, 1.2, 'PT', 110, 0),
  (7, 1.6, 'TDCi', 109, 0),
  (7, 1.0, 'SCTi', 125, 0),
  (8, 1.6, '16V', 90, 0),
  (8, 1.8, 'XR3i', 130, 0);


CREATE TABLE cars (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  model_id INTEGER NOT NULL REFERENCES models(id) ON DELETE CASCADE,
  description TEXT NOT NULL,
  mileage INTEGER NOT NULL,
  year INTEGER NOT NULL,
  engine_id INTEGER NOT NULL REFERENCES engines(id) ON DELETE CASCADE,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
INSERT INTO cars (model_id, description, mileage, year, engine_id) VALUES
  (1, 'Beskrivelse', 163000, 2010, 1),
  (1, 'Beskrivelse', 168000, 2004, 2),
  (2, 'Beskrivelse', 48000, 2015, 3),
  (2, 'Beskrivelse', 74000, 2015, 4),
  (3, 'Beskrivelse', 44000, 2014, 5),
  (4, 'Beskrivelse', 59000, 2017, 6),
  (5, 'Beskrivelse', 44000, 2013, 7),
  (5, 'Beskrivelse', 7000, 2017, 8),
  (6, 'Beskrivelse', 8000, 2017, 9),
  (6, 'Beskrivelse', 1000, 2014, 10),
  (7, 'Beskrivelse', 154000, 2011, 11),
  (7, 'Beskrivelse', 8000, 2017, 12),
  (8, 'Beskrivelse', 164000, 1996, 13),
  (8, 'Beskrivelse', 175000, 1994, 14);

