CREATE TABLE projekt.pracownik (
                id_pracownik SERIAL NOT NULL,
                imie VARCHAR NOT NULL,
                nazwisko VARCHAR NOT NULL,
                zawod VARCHAR NOT NULL,
                CONSTRAINT pracownik_pk PRIMARY KEY (id_pracownik)
);


CREATE TABLE projekt.poziom_zaw (
                id_poziom SERIAL NOT NULL,
                poziom VARCHAR NOT NULL,
                CONSTRAINT poziom_zaw_pk PRIMARY KEY (id_poziom)
);


CREATE TABLE projekt.zawodnik (
                id_zaw SERIAL NOT NULL,
                imie VARCHAR NOT NULL,
                nazwisko VARCHAR NOT NULL,
                wiek INTEGER NOT NULL,
                id_poziom SERIAL NOT NULL,
                CONSTRAINT zawodnik_pk PRIMARY KEY (id_zaw)
);


CREATE TABLE projekt.rezerwacja (
                id_rez SERIAL NOT NULL,
                id_pracownik SERIAL NOT NULL,
                dzien VARCHAR NOT NULL,
                godz TIME NOT NULL,
                id_zaw SERIAL NOT NULL,
                CONSTRAINT rezerwacja_pk PRIMARY KEY (id_rez)
);


CREATE TABLE projekt.obiekt_sportowy (
                id_obiekt SERIAL NOT NULL,
                nazwa VARCHAR NOT NULL,
                CONSTRAINT obiekt_sportowy_pk PRIMARY KEY (id_obiekt)
);


CREATE TABLE projekt.sekcja (
                id_sekcja SERIAL NOT NULL,
                nazwa VARCHAR NOT NULL,
                CONSTRAINT sekcja_pk PRIMARY KEY (id_sekcja)
);


CREATE TABLE projekt.pracownik_sekcja (
                id_pracownik SERIAL NOT NULL,
                id_sekcja SERIAL NOT NULL
);


CREATE TABLE projekt.trener (
                id_trener SERIAL NOT NULL,
                id_sekcja SERIAL NOT NULL,
                imie VARCHAR NOT NULL,
                nazwisko VARCHAR NOT NULL,
                wiek INTEGER NOT NULL,
                CONSTRAINT trener_pk PRIMARY KEY (id_trener)
);


CREATE TABLE projekt.zajecia (
                id_zajecia SERIAL NOT NULL,
                id_sekcja SERIAL NOT NULL,
                dzien VARCHAR NOT NULL,
                godz_rozp TIME NOT NULL,
                godz_zak TIME NOT NULL,
                CONSTRAINT zajecia_pk PRIMARY KEY (id_zajecia)
);


CREATE TABLE projekt.zawodnik_sekcja (
                id_sekcja SERIAL NOT NULL,
                id_zaw SERIAL NOT NULL
);


CREATE TABLE projekt.obiekt_sekcja (
                id_obiekt SERIAL NOT NULL,
                id_sekcja SERIAL NOT NULL
);


ALTER TABLE projekt.rezerwacja ADD CONSTRAINT pracownik_rezerwacja_fk
FOREIGN KEY (id_pracownik)
REFERENCES projekt.pracownik (id_pracownik)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE projekt.pracownik_sekcja ADD CONSTRAINT pracownik_pracownik_sekcja_fk
FOREIGN KEY (id_pracownik)
REFERENCES projekt.pracownik (id_pracownik)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE projekt.zawodnik ADD CONSTRAINT poziom_zaw_zawodnik_fk
FOREIGN KEY (id_poziom)
REFERENCES projekt.poziom_zaw (id_poziom)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE projekt.zawodnik_sekcja ADD CONSTRAINT zawodnik_zawodnik_sekcja_fk
FOREIGN KEY (id_zaw)
REFERENCES projekt.zawodnik (id_zaw)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE projekt.rezerwacja ADD CONSTRAINT zawodnik_rezerwacja_fk
FOREIGN KEY (id_zaw)
REFERENCES projekt.zawodnik (id_zaw)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE projekt.obiekt_sekcja ADD CONSTRAINT obiekt_sportowy_obiekt_sekcja_fk1
FOREIGN KEY (id_obiekt)
REFERENCES projekt.obiekt_sportowy (id_obiekt)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE projekt.obiekt_sekcja ADD CONSTRAINT sekcja_obiekt_sekcja_fk1
FOREIGN KEY (id_sekcja)
REFERENCES projekt.sekcja (id_sekcja)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE projekt.zawodnik_sekcja ADD CONSTRAINT sekcja_zawodnik_sekcja_fk
FOREIGN KEY (id_sekcja)
REFERENCES projekt.sekcja (id_sekcja)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE projekt.zajecia ADD CONSTRAINT sekcja_zajecia_fk
FOREIGN KEY (id_sekcja)
REFERENCES projekt.sekcja (id_sekcja)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE projekt.trener ADD CONSTRAINT sekcja_trener_fk
FOREIGN KEY (id_sekcja)
REFERENCES projekt.sekcja (id_sekcja)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE projekt.pracownik_sekcja ADD CONSTRAINT sekcja_pracownik_sekcja_fk
FOREIGN KEY (id_sekcja)
REFERENCES projekt.sekcja (id_sekcja)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;