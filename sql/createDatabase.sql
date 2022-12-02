
BEGIN;

CREATE DATABASE php_do_zero;

CREATE TABLE IF NOT EXISTS users (
    "id" SERIAL NOT NULL PRIMARY KEY,
    "name" VARCHAR(256) NOT NULL,
    "email" VARCHAR(256) NOT NULL,
    "password" VARCHAR(256) NOT NULL
);

INSERT INTO users ("name", "email", "password")
VALUES
  ('Erik'  , 'erik@erik.com' , 'secret'),
  ('Erik 2', 'erik2@erik.com', '12345678'),
  ('Erik 3', 'erik3@erik.com', '654321'),
  ('Erik 4', 'erik4@erik.com', 'qwe123')
;

-- ROLLBACK;
COMMIT;
