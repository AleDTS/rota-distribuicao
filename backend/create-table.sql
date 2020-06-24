DROP TABLE IF EXISTS cities;

CREATE TABLE IF NOT EXISTS cities (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL UNIQUE,
  `coordinate` point NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO`cities` (name, coordinate)
VALUES 
  ('a', POINT(-23.543797,-46.634158)),
  ('b', POINT(-22.910086,-47.059311)),
  ('c', POINT(-23.500147,-47.458557)),
  ('d', POINT(-23.188704,-46.884137)),
  ('e', POINT(-22.124055,-51.386076)),
  ('f', POINT(-20.427292,-51.343513)),
  ('g', POINT(-21.177986,-47.810823)),
  ('h', POINT(-23.932337,-46.330097)),
  ('i', POINT(-23.184146,-45.887737)),
  ('j', POINT(-23.115557,-46.548272)),
  ('k', POINT(-21.996022,-47.431006)),
  ('l', POINT(-22.010785,-47.890079)),
  ('m', POINT(-22.977390,-49.868635)),
  ('n', POINT(-20.420253,-49.975181)),
  ('o', POINT(-21.138111,-48.974366)),
  ('p', POINT(-20.554312,-48.571846)),
  ('q', POINT(-20.535479,-47.399258)),
  ('r', POINT(-21.789480,-48.176770)),
  ('s', POINT(-22.245826,-49.968522));
