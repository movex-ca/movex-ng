-- Movex Batch 01: Identity Foundation
-- Tables:
-- 1. roles
-- 2. users
-- 3. user_profiles
-- 4. user_role_map

CREATE TABLE IF NOT EXISTS roles (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    public_id VARCHAR(30) NOT NULL UNIQUE,
    role_name VARCHAR(50) NOT NULL UNIQUE,
    role_description VARCHAR(255) DEFAULT NULL,
    status ENUM('active','inactive') NOT NULL DEFAULT 'active',
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    created_by BIGINT UNSIGNED DEFAULT NULL,
    updated_by BIGINT UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS users (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    public_id VARCHAR(30) NOT NULL UNIQUE,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    phone_e164 VARCHAR(20) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    status ENUM('pending','active','suspended','rejected') NOT NULL DEFAULT 'pending',
    email_verified_at DATETIME NULL,
    phone_verified_at DATETIME NULL,
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    created_by BIGINT UNSIGNED DEFAULT NULL,
    updated_by BIGINT UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS user_profiles (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    public_id VARCHAR(30) NOT NULL UNIQUE,
    user_id BIGINT UNSIGNED NOT NULL,
    sex ENUM('Male','Female','Other') DEFAULT NULL,
    date_of_birth DATE DEFAULT NULL,
    state_name VARCHAR(100) DEFAULT NULL,
    city_name VARCHAR(100) DEFAULT NULL,
    address_line TEXT DEFAULT NULL,
    referral_code VARCHAR(50) DEFAULT NULL,
    avatar_path VARCHAR(255) DEFAULT NULL,
    status ENUM('active','inactive') NOT NULL DEFAULT 'active',
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    created_by BIGINT UNSIGNED DEFAULT NULL,
    updated_by BIGINT UNSIGNED DEFAULT NULL,
    CONSTRAINT fk_user_profiles_user FOREIGN KEY (user_id) REFERENCES users(id)
        ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS user_role_map (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    public_id VARCHAR(30) NOT NULL UNIQUE,
    user_id BIGINT UNSIGNED NOT NULL,
    role_id BIGINT UNSIGNED NOT NULL,
    is_primary TINYINT(1) NOT NULL DEFAULT 0,
    status ENUM('active','inactive') NOT NULL DEFAULT 'active',
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    created_by BIGINT UNSIGNED DEFAULT NULL,
    updated_by BIGINT UNSIGNED DEFAULT NULL,
    CONSTRAINT fk_user_role_map_user FOREIGN KEY (user_id) REFERENCES users(id)
        ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_user_role_map_role FOREIGN KEY (role_id) REFERENCES roles(id)
        ON DELETE RESTRICT ON UPDATE CASCADE,
    UNIQUE KEY uq_user_role (user_id, role_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Seed roles
INSERT INTO roles (public_id, role_name, role_description, status) VALUES
('ROL-2026-001','admin','System administrator','active'),
('ROL-2026-002','user','General customer user','active'),
('ROL-2026-003','driver','Approved or pending driver','active'),
('ROL-2026-004','business_partner','Business carrying loads and registering drivers','active'),
('ROL-2026-005','company_client','Company needing logistics services','active')
ON DUPLICATE KEY UPDATE role_description=VALUES(role_description), status=VALUES(status);

-- Seed users
INSERT INTO users (public_id, first_name, last_name, email, phone_e164, password_hash, status, email_verified_at, phone_verified_at) VALUES
('USR-2026-001','System','Admin','admin@movex.test','+2348000000001','$2y$10$examplehashforadmin1111111111111111111111111111111','active',NOW(),NOW()),
('USR-2026-002','Alao','Odeleye','alao@movex.test','+2348000000002','$2y$10$examplehashforuser22222222222222222222222222222222','active',NOW(),NOW()),
('USR-2026-003','Kunle','Adeyemi','kunle@movex.test','+2348000000003','$2y$10$examplehashfordriver333333333333333333333333333333','pending',NOW(),NOW()),
('USR-2026-004','Agege','Load Movers','ops@agegeload.test','+2348000000004','$2y$10$examplehashforbiz44444444444444444444444444444444','active',NOW(),NOW()),
('USR-2026-005','PrimeBuild','Nigeria','admin@primebuild.test','+2348000000005','$2y$10$examplehashforcompany5555555555555555555555555555','active',NOW(),NOW())
ON DUPLICATE KEY UPDATE first_name=VALUES(first_name), last_name=VALUES(last_name), status=VALUES(status);

-- Seed profiles
INSERT INTO user_profiles (public_id, user_id, sex, date_of_birth, state_name, city_name, address_line, referral_code, status)
SELECT 'UPR-2026-001', u.id, 'Male', '1988-01-10', 'Lagos', 'Ikeja', '1 Admin Close, Ikeja, Lagos', 'MOVEX-ADM-001', 'active'
FROM users u WHERE u.public_id='USR-2026-001'
ON DUPLICATE KEY UPDATE state_name=VALUES(state_name), city_name=VALUES(city_name);

INSERT INTO user_profiles (public_id, user_id, sex, date_of_birth, state_name, city_name, address_line, referral_code, status)
SELECT 'UPR-2026-002', u.id, 'Male', '1989-02-11', 'Lagos', 'Agege', '24 Example Road, Agege, Lagos', 'MOVEX-USER-002', 'active'
FROM users u WHERE u.public_id='USR-2026-002'
ON DUPLICATE KEY UPDATE state_name=VALUES(state_name), city_name=VALUES(city_name);

INSERT INTO user_profiles (public_id, user_id, sex, date_of_birth, state_name, city_name, address_line, referral_code, status)
SELECT 'UPR-2026-003', u.id, 'Male', '1990-03-12', 'Lagos', 'Agege', '12 Driver Street, Agege, Lagos', 'MOVEX-DRV-003', 'active'
FROM users u WHERE u.public_id='USR-2026-003'
ON DUPLICATE KEY UPDATE state_name=VALUES(state_name), city_name=VALUES(city_name);

INSERT INTO user_profiles (public_id, user_id, sex, date_of_birth, state_name, city_name, address_line, referral_code, status)
SELECT 'UPR-2026-004', u.id, 'Other', '1987-04-13', 'Lagos', 'Agege', 'Ops Yard, Agege, Lagos', 'MOVEX-BIZ-004', 'active'
FROM users u WHERE u.public_id='USR-2026-004'
ON DUPLICATE KEY UPDATE state_name=VALUES(state_name), city_name=VALUES(city_name);

INSERT INTO user_profiles (public_id, user_id, sex, date_of_birth, state_name, city_name, address_line, referral_code, status)
SELECT 'UPR-2026-005', u.id, 'Other', '1986-05-14', 'Lagos', 'Victoria Island', 'Corporate HQ, VI, Lagos', 'MOVEX-COY-005', 'active'
FROM users u WHERE u.public_id='USR-2026-005'
ON DUPLICATE KEY UPDATE state_name=VALUES(state_name), city_name=VALUES(city_name);

-- Seed user_role_map
INSERT INTO user_role_map (public_id, user_id, role_id, is_primary, status)
SELECT 'URM-2026-001', u.id, r.id, 1, 'active'
FROM users u JOIN roles r ON r.role_name='admin'
WHERE u.public_id='USR-2026-001'
ON DUPLICATE KEY UPDATE status=VALUES(status), is_primary=VALUES(is_primary);

INSERT INTO user_role_map (public_id, user_id, role_id, is_primary, status)
SELECT 'URM-2026-002', u.id, r.id, 1, 'active'
FROM users u JOIN roles r ON r.role_name='user'
WHERE u.public_id='USR-2026-002'
ON DUPLICATE KEY UPDATE status=VALUES(status), is_primary=VALUES(is_primary);

INSERT INTO user_role_map (public_id, user_id, role_id, is_primary, status)
SELECT 'URM-2026-003', u.id, r.id, 1, 'active'
FROM users u JOIN roles r ON r.role_name='driver'
WHERE u.public_id='USR-2026-003'
ON DUPLICATE KEY UPDATE status=VALUES(status), is_primary=VALUES(is_primary);

INSERT INTO user_role_map (public_id, user_id, role_id, is_primary, status)
SELECT 'URM-2026-004', u.id, r.id, 1, 'active'
FROM users u JOIN roles r ON r.role_name='business_partner'
WHERE u.public_id='USR-2026-004'
ON DUPLICATE KEY UPDATE status=VALUES(status), is_primary=VALUES(is_primary);

INSERT INTO user_role_map (public_id, user_id, role_id, is_primary, status)
SELECT 'URM-2026-005', u.id, r.id, 1, 'active'
FROM users u JOIN roles r ON r.role_name='company_client'
WHERE u.public_id='USR-2026-005'
ON DUPLICATE KEY UPDATE status=VALUES(status), is_primary=VALUES(is_primary);
