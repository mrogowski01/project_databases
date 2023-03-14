CREATE OR REPLACE VIEW projekt.sekcje as 
SELECT sekcja.id_sekcja, sekcja.nazwa FROM projekt.sekcja;

CREATE OR REPLACE VIEW projekt.obiekty as
    SELECT s.id_sekcja, s.nazwa as nazwa_sekcji, obiekt.nazwa as nazwa_obiektu
        FROM projekt.obiekt_sportowy obiekt
            JOIN projekt.obiekt_sekcja os ON os.id_obiekt = obiekt.id_obiekt
            JOIN projekt.sekcja s ON s.id_sekcja = os.id_sekcja ORDER BY id_sekcja;

CREATE or replace VIEW projekt.rezerwacje as
SELECT p.imie as imie_p, p.nazwisko as nazwisko_p, p.zawod, rez.dzien as dzien, rez.godz as godz, z.imie as imie_zaw, z.nazwisko as nazwisko_zaw FROM projekt.rezerwacja rez
JOIN projekt.pracownik p ON p.id_pracownik = rez.id_pracownik
JOIN projekt.zawodnik z ON z.id_zaw = rez.id_zaw
GROUP BY p.imie, p.nazwisko, p.zawod, rez.dzien, rez.godz, z.imie, z.nazwisko
ORDER BY rez.dzien;

CREATE or replace VIEW projekt.zawodnicy as
SELECT zaw.id_zaw, zaw.imie, zaw.nazwisko, zaw.wiek, poz.poziom FROM projekt.zawodnik zaw
JOIN projekt.poziom_zaw poz ON poz.id_poziom = zaw.id_poziom
JOIN projekt.zawodnik_sekcja zs ON zs.id_zaw = zaw.id_zaw
JOIN projekt.sekcja s ON s.id_sekcja = zs.id_sekcja
GROUP BY zaw.id_zaw, zaw.imie, zaw.nazwisko, zaw.wiek, poz.poziom ORDER BY poz.poziom;

CREATE OR REPLACE VIEW projekt.trenerzy as
SELECT trener.id_trener, trener.imie, trener.nazwisko, trener.wiek, sekcja.nazwa
        FROM projekt.trener JOIN projekt.sekcja ON sekcja.id_sekcja = trener.id_sekcja
        GROUP BY trener.id_trener, trener.imie, trener.nazwisko, trener.wiek, sekcja.nazwa ORDER BY id_trener;

CREATE OR REPLACE VIEW projekt.zawodnik_poz as
SELECT z.imie, z.nazwisko, pz.poziom FROM projekt.zawodnik z
JOIN projekt.poziom_zaw pz ON pz.id_poziom = z.id_poziom;

CREATE OR REPLACE VIEW projekt.zajecia_sek as
SELECT z.id_zajecia, s.nazwa, z.dzien, z.godz_rozp, z.godz_zak
FROM projekt.zajecia z
JOIN projekt.sekcja s ON s.id_sekcja = z.id_sekcja
ORDER BY z.id_sekcja, z.id_zajecia ;

CREATE or replace VIEW projekt.pracownicy as
SELECT p.imie, p.nazwisko, p.zawod FROM projekt.pracownik p
GROUP BY p.imie, p.nazwisko, p.zawod;


CREATE OR REPLACE VIEW projekt.pracownicy_sek as
SELECT s.id_sekcja, s.nazwa, pracownik.imie, pracownik.nazwisko, pracownik.zawod
FROM projekt.pracownik 
JOIN projekt.pracownik_sekcja ps ON ps.id_pracownik = pracownik.id_pracownik 
JOIN projekt.sekcja s ON s.id_sekcja = ps.id_sekcja ORDER BY s.id_sekcja;
