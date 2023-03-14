CREATE OR REPLACE FUNCTION get_id_pracownik(p_imie VARCHAR, p_nazwisko VARCHAR, p_zawod VARCHAR)
RETURNS INTEGER AS $$
BEGIN
  RETURN (SELECT id_pracownik FROM projekt.pracownik p WHERE p.imie = p_imie AND p.nazwisko = p_nazwisko AND p.zawod = p_zawod);
END;
$$ LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION get_id_sekcja(s_sekcja VARCHAR)
RETURNS INTEGER AS $$
BEGIN
  RETURN (SELECT id_sekcja FROM projekt.sekcja s WHERE s.nazwa = s_sekcja);
END;
$$ LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION get_id_obiekt(obiekt VARCHAR)
RETURNS INTEGER AS $$
BEGIN
  RETURN (SELECT id_obiekt FROM projekt.obiekt_sportowy os WHERE os.nazwa = obiekt);
END;
$$ LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION get_id_poziom(poz VARCHAR)
RETURNS INTEGER AS $$
BEGIN
    RETURN (SELECT id_poziom FROM projekt.poziom_zaw pz WHERE pz.poziom = poz);
END;
$$ LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION get_id_zawodnik(z_imie VARCHAR, z_nazwisko VARCHAR, z_poziom VARCHAR)
RETURNS INTEGER AS $$
BEGIN
  RETURN (SELECT id_zaw FROM projekt.zawodnik z JOIN projekt.poziom_zaw pz ON
  pz.id_poziom = z.id_poziom WHERE z.imie = z_imie AND z.nazwisko = z_nazwisko AND pz.poziom = z_poziom);
END;
$$ LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION find_zawodnik_poz_sek(p_poziom VARCHAR, p_sekcja VARCHAR)
RETURNS TABLE (id_zaw INTEGER, imie VARCHAR, nazwisko VARCHAR, wiek INTEGER) AS $$
BEGIN
  RETURN QUERY SELECT z.id_zaw, z.imie, z.nazwisko, z.wiek
FROM projekt.zawodnik z
    JOIN projekt.zawodnik_sekcja zs ON zs.id_zaw = z.id_zaw
  JOIN projekt.sekcja s ON s.id_sekcja = zs.id_sekcja
JOIN projekt.poziom_zaw pz ON z.id_poziom = pz.id_poziom
WHERE pz.poziom = p_poziom AND s.nazwa = p_sekcja ORDER BY z.id_zaw;
END;
$$ LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION find_zawodnik_poz(p_poziom VARCHAR)
RETURNS TABLE (id_zaw INTEGER, imie VARCHAR, nazwisko VARCHAR, wiek INTEGER) AS $$
BEGIN
  RETURN QUERY SELECT z.id_zaw, z.imie, z.nazwisko, z.wiek
FROM projekt.zawodnik z
JOIN projekt.poziom_zaw pz ON z.id_poziom = pz.id_poziom
WHERE pz.poziom = p_poziom ORDER BY z.id_zaw;
END;
$$ LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION find_zawodnik_sek(p_sekcja VARCHAR)
RETURNS TABLE (id_zaw INTEGER, imie VARCHAR, nazwisko VARCHAR, wiek INTEGER, poziom VARCHAR) AS $$
BEGIN
  RETURN QUERY SELECT z.id_zaw, z.imie, z.nazwisko, z.wiek, pz.poziom
FROM projekt.zawodnik z
    JOIN projekt.zawodnik_sekcja zs ON zs.id_zaw = z.id_zaw
  JOIN projekt.sekcja s ON s.id_sekcja = zs.id_sekcja
  JOIN projekt.poziom_zaw pz ON pz.id_poziom = z.id_poziom
WHERE s.nazwa = p_sekcja ORDER BY z.id_zaw;
END;
$$ LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION find_zajecia(s_sekcja VARCHAR)
RETURNS TABLE(nazwa VARCHAR, dzien VARCHAR, godz_rozp TIME, godz_zak TIME) AS $$
BEGIN
  RETURN QUERY SELECT s.nazwa, z.dzien, z.godz_rozp, z.godz_zak FROM projekt.zajecia z
            JOIN projekt.sekcja s ON s.id_sekcja = z.id_sekcja WHERE s.nazwa = s_sekcja ORDER BY s.id_sekcja;
END;
$$ LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION count_sek(s_sekcja VARCHAR)
RETURNS INTEGER AS $$
BEGIN
  RETURN (SELECT COUNT(*) FROM projekt.zawodnik z
    JOIN projekt.zawodnik_sekcja zs ON zs.id_zaw = z.id_zaw
  JOIN projekt.sekcja s ON s.id_sekcja = zs.id_sekcja
WHERE s.nazwa = s_sekcja);
END;
$$ LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION count_poz_sek(p_poziom VARCHAR, p_sekcja VARCHAR)
RETURNS INTEGER AS $$
BEGIN
  RETURN (SELECT COUNT(*) FROM projekt.zawodnik z
    JOIN projekt.zawodnik_sekcja zs ON zs.id_zaw = z.id_zaw
  JOIN projekt.sekcja s ON s.id_sekcja = zs.id_sekcja
JOIN projekt.poziom_zaw pz ON z.id_poziom = pz.id_poziom
WHERE pz.poziom = p_poziom AND s.nazwa = p_sekcja);
END;
$$ LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION count_()
RETURNS INTEGER AS $$
BEGIN
  RETURN (SELECT COUNT(*) FROM projekt.zawodnik);
END;
$$ LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION find_pracownik_sek(p_sekcja VARCHAR)
RETURNS TABLE (id_pracownik INTEGER, imie VARCHAR, nazwisko VARCHAR, zawod VARCHAR) AS $$
BEGIN
  RETURN QUERY SELECT p.id_pracownik, p.imie, p.nazwisko, p.zawod
FROM projekt.pracownik p
    JOIN projekt.pracownik_sekcja ps ON ps.id_pracownik = p.id_pracownik
  JOIN projekt.sekcja s ON s.id_sekcja = ps.id_sekcja
WHERE s.nazwa = p_sekcja ORDER BY p.id_pracownik;
END;
$$ LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION count_prac()
RETURNS INTEGER AS $$
BEGIN
RETURN (SELECT COUNT(*) FROM projekt.pracownik);
END;
$$ LANGUAGE plpgsql;



CREATE OR REPLACE FUNCTION count_pracownik_sek(s_sekcja VARCHAR)
RETURNS INTEGER AS $$
BEGIN
  RETURN (SELECT COUNT(*) FROM projekt.pracownik p
    JOIN projekt.pracownik_sekcja ps ON ps.id_pracownik = p.id_pracownik
  JOIN projekt.sekcja s ON s.id_sekcja = ps.id_sekcja
WHERE s.nazwa = s_sekcja);
END;
$$ LANGUAGE plpgsql;


CREATE OR REPLACE FUNCTION find_rezerwacja_prac(p_imie VARCHAR, p_nazwisko VARCHAR, p_zawod VARCHAR)
RETURNS TABLE (dzien VARCHAR, godz TIME, imie VARCHAR, nazwisko VARCHAR) AS $$
BEGIN
  RETURN QUERY SELECT rez.dzien, rez.godz, z.imie, z.nazwisko
FROM projekt.rezerwacja rez
    JOIN projekt.zawodnik z ON z.id_zaw = rez.id_zaw
  JOIN projekt.pracownik p ON p.id_pracownik = rez.id_pracownik
WHERE p.imie = p_imie AND p.nazwisko = p_nazwisko AND p.zawod = p_zawod ORDER BY rez.id_rez;
END;
$$ LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION find_rezerwacja_prac_sek(p_imie VARCHAR, p_nazwisko VARCHAR, p_zawod VARCHAR, p_sekcja VARCHAR)
RETURNS TABLE (dzien VARCHAR, godz TIME, imie VARCHAR, nazwisko VARCHAR) AS $$
BEGIN
  RETURN QUERY SELECT rez.dzien, rez.godz, z.imie, z.nazwisko
FROM projekt.rezerwacja rez
    JOIN projekt.zawodnik z ON z.id_zaw = rez.id_zaw
    JOIN projekt.zawodnik_sekcja zs ON zs.id_zaw = z.id_zaw
  JOIN projekt.sekcja s ON s.id_sekcja = zs.id_sekcja
  JOIN projekt.pracownik p ON p.id_pracownik = rez.id_pracownik
WHERE p.imie = p_imie AND p.nazwisko = p_nazwisko AND p.zawod = p_zawod AND s.nazwa = p_sekcja ORDER BY rez.id_rez;
END;
$$ LANGUAGE plpgsql;


