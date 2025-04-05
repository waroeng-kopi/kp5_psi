CREATE DATABASE IF NOT EXISTS db_akuntansi;
USE db_akuntansi;

CREATE TABLE IF NOT EXISTS user (
  userId INT(8) PRIMARY KEY,
  nama VARCHAR(255),
  deskripsi VARCHAR(255),
  tipeAkun VARCHAR(255),
  saldoAwal VARCHAR(255)
);

INSERT INTO user (userId, nama, deskripsi, tipeAkun, saldoAwal)
VALUES
(1, 'Agus Dummy', 'Dummy Account', 'Premium', '1.000.000');