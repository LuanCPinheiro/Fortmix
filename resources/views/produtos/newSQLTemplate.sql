-- Produto ID 49
INSERT INTO nutriente_produto (produto_id, nutriente_id, minimo, maximo, medidamin, medidamax, created_at, updated_at) VALUES
(49, 1, '40', '49', 'g', 'g', NOW(), NOW()),
(49, 3, '1,73', NULL, 'mg', NULL, NOW(), NOW()),
(49, 4, '28,8', NULL, 'mg', NULL, NOW(), NOW()),
(49, 6, '1610', NULL, 'mg', NULL, NOW(), NOW()),
(49, 9, '24', NULL, 'mg', NULL, NOW(), NOW()),
(49, 12, '5260', NULL, 'mg', NULL, NOW(), NOW()),
(49, 13, '1,73', NULL, 'mg', NULL, NOW(), NOW()),
(49, 15, '57,6', NULL, 'mg', NULL, NOW(), NOW()),
(49, 18, '727', NULL, 'g', NULL, NOW(), NOW()),
(49, 21, '190', NULL, 'g', NULL, NOW(), NOW()),
(49, 7, '38,33', NULL, 'g', NULL, NOW(), NOW()),
(49, 16, NULL, '138,26', NULL, 'g', NOW(), NOW()),
(49, 10, NULL, '37,22', NULL, 'g', NOW(), NOW()),
(49, 8, NULL, '37,93', NULL, 'g', NOW(), NOW()),
(49, 26, NULL, '120', NULL, 'g', NOW(), NOW()),
(49, 24, '0,48', NULL, 'mg', NULL, NOW(), NOW()),
(49, 25, '1900', NULL, 'g', NULL, NOW(), NOW()),
(49, 31, '96', NULL, 'mg', NULL, NOW(), NOW())
ON DUPLICATE KEY UPDATE minimo = VALUES(minimo), maximo = VALUES(maximo), medidamin = VALUES(medidamin), medidamax = VALUES(medidamax), created_at = VALUES(created_at), updated_at = VALUES(updated_at);

-- Produto ID 50
INSERT INTO nutriente_produto (produto_id, nutriente_id, minimo, maximo, medidamin, medidamax, created_at, updated_at) VALUES
(50, 1, '170', '180', 'g', 'g', NOW(), NOW()),
(50, 3, '86,4', NULL, 'mg', NULL, NOW(), NOW()),
(50, 4, '1440', NULL, 'mg', NULL, NOW(), NOW()),
(50, 6, '24', NULL, 'mg', NULL, NOW(), NOW()),
(50, 9, '1200', NULL, 'mg', NULL, NOW(), NOW()),
(50, 13, '86,4', NULL, 'mg', NULL, NOW(), NOW()),
(50, 12, '90', NULL, 'g', NULL, NOW(), NOW()),
(50, 11, NULL, '900', NULL, 'mg', NOW(), NOW()),
(50, 15, '2880', NULL, 'mg', NULL, NOW(), NOW()),
(50, 14, '15', NULL, 'g', NULL, NOW(), NOW()),
(50, 24, '24', NULL, 'mg', NULL, NOW(), NOW()),
(50, 25, '95', NULL, 'g', NULL, NOW(), NOW()),
(50, 31, '4800', NULL, 'mg', NULL, NOW(), NOW())
ON DUPLICATE KEY UPDATE minimo = VALUES(minimo), maximo = VALUES(maximo), medidamin = VALUES(medidamin), medidamax = VALUES(medidamax), created_at = VALUES(created_at), updated_at = VALUES(updated_at);
