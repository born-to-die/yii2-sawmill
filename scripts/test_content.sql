INSERT INTO Category VALUES('0', 'Новости', 'новости', 'Категория новостей');
INSERT INTO Category VALUES('2', 'Просвещение', 'новости', 'Категория новостей');

INSERT INTO Post (category_id, title, excerpt, text, keywords, created) VALUES('1', 'Полетели!', 'Раздел новости создан!', 
  'Вот и создан раздел новостей. Здесь вы сможете быть в курсе событий.', 
  'новости', '2018-11-27');

  INSERT INTO Post (category_id, title, excerpt, text, keywords, created) VALUES('2', 'Что такое лесопилка?', 'Раздел новости создан!', 
    'Лесопилка, лесопильня — предприятие первичной переработки леса на лесоматериалы в системе лесозаготовительной промышленности. ', 
    'новости', '2018-11-27');

INSERT INTO Jobs (name) VALUES('Директор');

INSERT INTO Jobs (name) VALUES('Бухгалтер');

INSERT INTO Jobs (name) VALUES('Рамщик');

INSERT INTO Jobs (name) VALUES('Уборщик');

INSERT INTO Groups (name) VALUES('Управляющая');

INSERT INTO Groups (name) VALUES('Обслуживающая');

INSERT INTO Groups (name) VALUES ('Рабочая бригада №1');

INSERT INTO Crew (fullname, birth, address, mobile, registr, 
  group_id, job_id)
  VALUES('Алексей Алексеевич Заглавных', '1968-05-13',
  'г. Екатеринбург ул. 8 Марта 13', '79505624170', 
  'г. Санкт-Петербург ул. Ленина 22',
  '1', '1');

INSERT INTO Crew (fullname, birth, address, mobile, registr, 
  group_id, job_id)
  VALUES('Олеся Артемьевна Бамажных', '1980-09-23', 
    'г. Екатеринбург ул. Ленина 23', '79505624169', 
    'г. Екатеринбург ул. Заводская 23', '1', '2');

INSERT INTO Crew (fullname, birth, address, mobile, registr, 
  group_id, job_id)
  VALUES('Иван Иванович Рабочих', '1970-12-02', 
  'г. Екатеринбург ул. Малышева 93', '79505624160', 
  'г. Екатеринбург ул. Малышева 93', '3', '3');

INSERT INTO Crew (fullname, birth, address, mobile, registr, 
  group_id, job_id)
  VALUES('Ксения Владимировна Швабрина', '1970-11-12', 
  'г. Екатеринбург ул. Народная 12', '79505624161', 
  'г. Екатеринбург ул. Малышева 12', '2', '4');

INSERT INTO Materials VALUES (
  '0',
  'Брус прямоугольный'
);