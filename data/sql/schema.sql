CREATE TABLE contact (id BIGINT AUTO_INCREMENT, member_id BIGINT NOT NULL, enumeration_id BIGINT NOT NULL, kind VARCHAR(255) NOT NULL, target VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX member_id_idx (member_id), INDEX enumeration_id_idx (enumeration_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE enumeration (id BIGINT AUTO_INCREMENT, position BIGINT NOT NULL, is_active TINYINT(1) DEFAULT '1' NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE member_translation (id BIGINT, name VARCHAR(255) NOT NULL, surname VARCHAR(255) NOT NULL, address VARCHAR(255), category VARCHAR(255) NOT NULL, description BIGINT NOT NULL, lang CHAR(2), PRIMARY KEY(id, lang)) ENGINE = INNODB;
CREATE TABLE member (id BIGINT AUTO_INCREMENT, enumeration_id BIGINT NOT NULL, is_partner TINYINT(1) DEFAULT '0' NOT NULL, alt_image VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX enumeration_id_idx (enumeration_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE member_project (id BIGINT AUTO_INCREMENT, project_id BIGINT NOT NULL, member_id BIGINT NOT NULL, enumeration_id BIGINT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX project_id_idx (project_id), INDEX member_id_idx (member_id), INDEX enumeration_id_idx (enumeration_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE project (id BIGINT AUTO_INCREMENT, unit_id BIGINT NOT NULL, enumeration_id BIGINT NOT NULL, logo VARCHAR(255), logo_bw VARCHAR(255), alt_image VARCHAR(255), technology TEXT, begin_date DATETIME, end_date DATETIME, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX unit_id_idx (unit_id), INDEX enumeration_id_idx (enumeration_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE unit_translation (id BIGINT, title VARCHAR(255) NOT NULL, subtitle VARCHAR(255), summary VARCHAR(255), description TEXT, lang CHAR(2), PRIMARY KEY(id, lang)) ENGINE = INNODB;
CREATE TABLE unit (id BIGINT AUTO_INCREMENT, name VARCHAR(255) NOT NULL UNIQUE, url VARCHAR(255), image VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
ALTER TABLE contact ADD CONSTRAINT contact_member_id_member_id FOREIGN KEY (member_id) REFERENCES member(id) ON DELETE CASCADE;
ALTER TABLE contact ADD CONSTRAINT contact_enumeration_id_enumeration_id FOREIGN KEY (enumeration_id) REFERENCES enumeration(id) ON DELETE CASCADE;
ALTER TABLE member_translation ADD CONSTRAINT member_translation_id_member_id FOREIGN KEY (id) REFERENCES member(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE member ADD CONSTRAINT member_enumeration_id_enumeration_id FOREIGN KEY (enumeration_id) REFERENCES enumeration(id) ON DELETE CASCADE;
ALTER TABLE member_project ADD CONSTRAINT member_project_project_id_project_id FOREIGN KEY (project_id) REFERENCES project(id) ON DELETE CASCADE;
ALTER TABLE member_project ADD CONSTRAINT member_project_member_id_member_id FOREIGN KEY (member_id) REFERENCES member(id) ON DELETE CASCADE;
ALTER TABLE member_project ADD CONSTRAINT member_project_enumeration_id_enumeration_id FOREIGN KEY (enumeration_id) REFERENCES enumeration(id) ON DELETE CASCADE;
ALTER TABLE project ADD CONSTRAINT project_unit_id_unit_id FOREIGN KEY (unit_id) REFERENCES unit(id) ON DELETE CASCADE;
ALTER TABLE project ADD CONSTRAINT project_enumeration_id_enumeration_id FOREIGN KEY (enumeration_id) REFERENCES enumeration(id) ON DELETE CASCADE;
ALTER TABLE unit_translation ADD CONSTRAINT unit_translation_id_unit_id FOREIGN KEY (id) REFERENCES unit(id) ON UPDATE CASCADE ON DELETE CASCADE;
