INSERT INTO projekt.sekcja (nazwa) VALUES
('piłka nożna'),
('siatkówka'),
('koszykówka'),
('kolarstwo'),
('pływanie'),
('tenis'),
('piłka ręczna'),
('bieganie - sprint'),
('bieganie długodystansowe');

INSERT INTO projekt.obiekt_sportowy (nazwa) VALUES
('stadion piłkarski'),
('hala sportowa'),
('basen olimpijski'),
('stadion lekkoatletyczny'),
('tor kolarski');


INSERT INTO projekt.obiekt_sekcja (id_obiekt, id_sekcja) VALUES 
(1, 1),
(2, 2),
(2, 3),
(2, 6),
(2, 7),
(3, 5),
(4, 8),
(4, 9),
(5, 4);

INSERT INTO projekt.poziom_zaw (poziom) VALUES
('amator'), 
('początkujący'),
('zawodowiec');

INSERT INTO projekt.zawodnik (imie, nazwisko, wiek, id_poziom) VALUES
('Maciej', 'Karnowski', 19, 1),
('Mateusz', 'Nowakowski', 21, 1),
('Mariusz', 'Chudzicki', 20, 1),
('Bartosz', 'Zuch', 18, 1),
('Maciej', 'Królewski', 17, 1),
('Karol', 'Kruk', 19, 1),
('Wojciech', 'Gnyp', 20, 1),
('Bartłomiej', 'Kowalski', 21, 1),
('Tomasz', 'Nowak', 17, 1),
('Karol', 'Kowalczyk', 18, 1),
('Kamil', 'Nowak', 19, 1),
('Aleksander', 'Kowalczyk', 21, 1),
('Łukasz', 'Wiśniewski', 20, 1),
('Nataniel', 'Jakubowski', 18, 1),
('Mateusz', 'Zieliński', 17, 1),
('Marcin', 'Szymański', 19, 1),
('Paweł', 'Michalski', 20, 1),
('Marek', 'Jankowski', 21, 1),
('Mikołaj', 'Kaczmarek', 24, 1),
('Klaudiusz', 'Wojciechowski', 22, 1),

('Adrian', 'Smokowski', 20, 2),
('Michał', 'Wiśniewski', 21, 2),
('Jerzy', 'Barnaś', 25, 2),
('Tadeusz', 'Stachera', 25, 2),
('Adam', 'Gzik', 24, 2),
('Łukasz', 'Całus', 26, 2),
('Zbigniew', 'Kołodziejek', 25, 2),
('Ryszard', 'Bukowiecki', 23, 2),
('Dariusz', 'Sielicki', 22, 2),
('Henryk', 'Radziszewski', 23, 2),
('Dominik', 'Adamski', 20, 2),
('Kacper', 'Mazur', 21, 2),
('Oliwier', 'Wiśniewski', 25, 2),
('Maciej', 'Dąbrowski', 25, 2),
('Szymon', 'Makowski', 25, 2),
('Konstanty', 'Nowakowski', 26, 2),
('Karol', 'Wojciechowski', 25, 2),
('Ignacy', 'Adamski', 23, 2),
('Leonard', 'Mazur', 21, 2),
('Eryk', 'Dąbrowski', 23, 2),

('Mariusz', 'Szcześniak', 21, 3),
('Kazimierz', 'Nawara', 23, 3),
('Wojciech', 'Kęski', 24, 3),
('Robert', 'Rafalski', 25, 3),
('Mateusz', 'Hołownia', 26, 3),
('Marian', 'Niedziałek', 22, 3),
('Rafał', 'Matuszczak', 22, 3),
('Jacek', 'Wolf', 23, 3),
('Janusz', 'Kolczyński', 22, 3),
('Mirosław', 'Chrobok', 22, 3),
('Marcin', 'Szymczak', 31, 3),
('Tomasz', 'Baranowski', 26, 3),
('Maciej', 'Szczepański', 30, 3),
('Czesław', 'Wróbel', 29, 3),
('Kazimierz', 'Górski', 25, 3),
('Marek', 'Krawczyk', 27, 3),
('Grzegorz', 'Urbański', 26, 3),
('Wiesław', 'Tomaszewski', 29, 3),
('Bogdan', 'Baranowski', 28, 3),
('Mateusz', 'Malinowski', 26, 3),
('Przemysław', 'Krajewski', 26, 3),
('Mieczysław', 'Zając', 24, 3),
('Wiesław', 'Przybylski', 25, 3),
('Jan', 'Tomaszewski', 28, 3),
('Jerzy', 'Wróblewski', 27, 3),
('Marian', 'Skwarek', 22, 3),
('Rafał', 'Ratuszyński', 22, 3),
('Jacek', 'Okniński', 23, 3),
('Janusz', 'Rolny', 22, 3),
('Mirosław', 'Wacławski', 22, 3);


INSERT INTO projekt.zawodnik_sekcja (id_sekcja, id_zaw) VALUES
(1, 2),
(1, 4),
(1, 9),
(1, 20),
(1, 27),
(1, 35),
(1, 38),
(1, 39),
(1, 40),
(1, 42),
(1, 44),
(1, 48),
(1, 49),
(1, 50),
(1, 55),
(1, 56),
(1, 58),
(1, 60),
(1, 61),
(1, 62),
(1, 63),
(1, 64),
(1, 65),
(1, 66),

(2, 7),
(2, 8),
(2, 10),
(2, 11),
(2, 12),
(2, 53),
(2, 54),
(2, 55),
(2, 56),
(2, 57),
(2, 58),
(2, 59),
(2, 67),
(2, 68),


(3, 13),
(3, 14),
(3, 15),
(3, 16),
(3, 17),
(3, 18),
(3, 19),
(3, 20),
(3, 58),
(3, 67),
(3, 68),
(3, 70),

(4, 34),
(4, 37),
(4, 46),
(4, 51),
(4, 52),

(5, 44),
(5, 49),
(5, 55),
(5, 58),
(5, 61),
(5, 63),
(5, 65),
(5, 66),

(6, 1),
(6, 3),
(6, 33),
(6, 36),
(6, 45),
(6, 47),

(7, 21),
(7, 22),
(7, 23),
(7, 24),
(7, 25),
(7, 26),
(7, 27),
(7, 28),
(7, 29),
(7, 30),
(7, 31),
(7, 32),

(8, 5),
(8, 6),
(8, 41),
(8, 43),
(8, 69),
(8, 60),

(9, 1),
(9, 3),
(9, 41),
(9, 43),
(9, 69),
(9, 60);

INSERT INTO projekt.trener (id_sekcja, imie, nazwisko, wiek) VALUES
(1, 'Mariusz', 'Chrobak', 43),
(2, 'Adam', 'Kiliński', 46),
(3, 'Mateusz', 'Kanał', 50),
(4, 'Karol', 'Zdęba', 41),
(5, 'Wojciech', 'Adamski', 45),
(6, 'Janusz', 'Glizda', 53),
(7, 'Adrian', 'Turski', 47),
(8, 'Robert', 'Wacławski', 49),
(9, 'Maksymilian', 'Probierz', 44);


INSERT INTO projekt.zajecia (id_sekcja, dzien, godz_rozp, godz_zak) VALUES
(1, 'poniedziałek', '11:00', '14:00'),
(1, 'środa', '8:00', '11:00'),
(1, 'czwartek', '9:00', '12:00'),
(1, 'piątek', '17:00', '20:00'),

(4, 'poniedziałek', '10:00', '14:00'),
(4, 'wtorek', '16:00', '19:00'),
(4, 'czwartek', '12:00', '14:00'),

(5, 'poniedziałek', '6:00', '9:00'),
(5, 'wtorek', '6:00', '9:00'),
(5, 'czwartek', '12:00', '14:00'),
(5, 'piątek', '7:00', '10:00'),

(2, 'poniedziałek', '10:00', '13:00'),
(2, 'wtorek', '13:00', '16:00'),
(2, 'środa', '12:00', '14:00'),
(2, 'piątek', '8:00', '11:00'),

(3, 'poniedziałek', '13:00', '16:00'),
(3, 'wtorek', '16:00', '18:00'),
(3, 'czwartek', '10:00', '13:00'),
(3, 'piątek', '11:00', '13:00'),

(7, 'poniedziałek', '7:00', '10:00'),
(7, 'wtorek', '10:00', '13:00'),
(7, 'czwartek', '13:00', '15:00'),
(7, 'sobota', '7:00', '10:00'),

(6, 'poniedziałek', '16:00', '18:00'),
(6, 'wtorek', '7:00', '10:00'),
(6, 'czwartek', '8:00', '10:00'),
(6, 'piątek', '13:00', '16:00'),

(8, 'poniedziałek', '8:00', '10:00'),
(8, 'wtorek', '9:00', '12:00'),
(8, 'środa', '8:00', '11:00'),
(8, 'piątek', '12:00', '15:00'),

(9, 'poniedziałek', '11:00', '14:00'),
(9, 'wtorek', '13:00', '15:00'),
(9, 'czwartek', '10:00', '12:00'),
(9, 'piątek', '9:00', '12:00');


INSERT INTO projekt.pracownik (imie, nazwisko, zawod) VALUES
('Maciej', 'Kalinowski', 'lekarz'),
('Jan', 'Rolniski', 'fizjoterapeuta'),
('Mateusz', 'Kurski', 'masażysta'),
('Dariusz', 'Królik', 'psycholog'),
('Michał', 'Kowalczyk', 'lekarz'),
('Tomasz', 'Wichniarek', 'dietetyk'),
('Miłosz', 'Skalski', 'fizjoterapeuta'),
('Bartłomiej', 'Kruk', 'masażysta'),
('Tadeusz', 'Sztaba', 'dietetyk'),
('Kacper', 'Kielecki', 'fizjoterapeuta'),
('Sebastian', 'Pilch', 'masażysta'),
('Dawid', 'Kotłowski', 'dietetyk');


INSERT INTO projekt.pracownik_sekcja (id_pracownik, id_sekcja) VALUES
(1, 5),
(1, 6),
(1, 8),
(1, 9),
(2, 1),
(2, 2),
(2, 3),
(3, 1),
(3, 2),
(3, 3),
(4, 1),
(4, 2),
(4, 3),
(4, 4),
(4, 5),
(4, 6),
(4, 7),
(4, 8),
(4, 9),
(5, 1),
(5, 2),
(5, 3),
(5, 4),
(5, 7),
(6, 1),
(6, 2),
(6, 3),
(7, 4),
(7, 5),
(7, 6),
(8, 4),
(8, 5),
(8, 6),
(9, 4),
(9, 5),
(9, 6),
(10, 7),
(10, 8),
(10, 9),
(11, 7),
(11, 8),
(11, 9),
(12, 7),
(12, 8),
(12, 9);

INSERT INTO projekt.rezerwacja (id_pracownik, dzien, godz, id_zaw) VALUES
(1, 'sobota', '11:00', 43),
(1, 'niedziela', '12:00', 33),
(2, 'sobota', '10:00', 9),
(2, 'niedziela', '11:00', 61),
(3, 'sobota', '18:00', 54),
(3, 'niedziela', '19:00', 55),
(4, 'sobota', '17:00', 64),
(4, 'niedziela', '19:00', 20),
(5, 'sobota', '11:00', 52),
(5, 'niedziela', '12:00', 28),
(6, 'sobota', '15:00', 17),
(6, 'niedziela', '15:00', 18),
(7, 'sobota', '18:00', 34),
(7, 'niedziela', '19:00', 63),
(8, 'sobota', '19:00', 65),
(8, 'niedziela', '19:00', 66),
(9, 'sobota', '18:00', 1),
(9, 'niedziela', '12:00', 3),
(10, 'sobota', '10:00', 41),
(10, 'niedziela', '10:00', 43),
(11, 'sobota', '17:00', 5),
(11, 'niedziela', '18:00', 30),
(12, 'sobota', '10:00', 31),
(12, 'niedziela', '19:00', 61);
