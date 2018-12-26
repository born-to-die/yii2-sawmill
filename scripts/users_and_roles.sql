INSERT INTO auth_item (name, type, description) VALUES('admin', '1', 'Админ');
INSERT INTO auth_item (name, type, description) VALUES('manager', '1', 'Менеджер');
INSERT INTO auth_item (name, type, description) VALUES('master', '1', 'Мастер');

INSERT INTO auth_item_child VALUES('admin', 'manager');

INSERT INTO auth_item_child VALUES('admin', 'master');

INSERT INTO user (username, password, crew_id) VALUES ('Admin', 'Admin', '1');
