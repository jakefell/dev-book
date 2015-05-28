CREATE DATABASE auth;

USE auth;

CREATE TABLE authorised_users (
name VARCHAR(20),
password VARCHAR(40),
PRIMARY KEY (name));

INSERT INTO authorised_users VALUES
('username', 'password');

INSERT INTO authorised_users VALUES
('testuser', SHA1('password'));

GRANT SELECT ON auth.*
TO 'webauth'
IDENTIFIED BY 'webauth';

FLUSH PRIVILEGES;