-- DROP
DROP TABLE lek IF EXISTS;
DROP TABLE pojistovna IF EXISTS ;
DROP TABLE dodavatel IF EXISTS ;
DROP TABLE pobocka IF EXISTS ;
DROP TABLE nakup IF EXISTS ;
DROP TABLE sklad IF EXISTS ;
DROP TABLE prispevek IF EXISTS ;
DROP TABLE cena  IF EXISTS; 


-- vytvoreni tabulky lek
CREATE TABLE IF NOT EXISTS lek(
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  nazev_leku VARCHAR(25),
  predpis VARCHAR(1),
  uc_latka VARCHAR(20)
  ) ENGINE=InnoDB; 


  
-- vytvoreni tabulky pojistovna
CREATE TABLE IF NOT EXISTS pojistovna(
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  nazev_poj VARCHAR(10),
  ulice_poj VARCHAR(25),
  c_p_poj VARCHAR(7),
  mesto_poj VARCHAR(25)
  );

-- vytvoreni tabulky dodavatel  
CREATE TABLE IF NOT EXISTS dodavatel(
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  ICO NUMBER(8) PRIMARY KEY,
  jmeno_dod VARCHAR(15),
  ulice_dod VARCHAR(25),
  c_p_dod NUMBER(7),
  mesto_dod VARCHAR(25)
  );
  
-- vytvoreni tab. pobocka
CREATE TABLE IF NOT EXISTS pobocka(
  ID_pob NUMBER(1) PRIMARY KEY,
  ulice_pob VARCHAR(25),
  c_p_pob NUMBER(7),
  mesto_pob VARCHAR(25)
  );
 
-- tabulka nakup
CREATE TABLE IF NOT EXISTS nakup(
  ID_nakupu NUMBER(10) PRIMARY KEY,
  datum_nak DATE,
  pobocka_nakupu NUMBER(1),
  CONSTRAINT FK_pobocka_nakupu FOREIGN KEY (pobocka_nakupu) REFERENCES pobocka(ID_pob) ON DELETE CASCADE 
  );
  
-- tabulka sklad, reprezentuje jednotlive suplicky v lekarnach
CREATE TABLE IF NOT EXISTS sklad(
  pobocka_skladu NUMBER(2),
  lek_sklad VARCHAR(25),
  cena NUMBER(5),
  mnozstvi NUMBER(5),
  CONSTRAINT FK_lek_sklad FOREIGN KEY (lek_sklad) REFERENCES lek(nazev_leku) ON DELETE CASCADE,
  CONSTRAINT FK_pobocka_skladu FOREIGN KEY (pobocka_skladu) REFERENCES pobocka(ID_pob) ON DELETE CASCADE,
  CONSTRAINT PK_sklad PRIMARY KEY (lek_sklad, pobocka_skladu)
  );

-- tabulka prispeveku na leky od pojistoven  
CREATE TABLE IF NOT EXISTS prispevek(
  lek_pris VARCHAR(25),
  poj_pris NUMBER(3),
  cena NUMBER(5),
  od_plat DATE,
  do_plat DATE,
  CONSTRAINT FK_lek_pris FOREIGN KEY (lek_pris) REFERENCES lek(nazev_leku) ON DELETE CASCADE,
  CONSTRAINT FK_poj_pris FOREIGN KEY (poj_pris) REFERENCES pojistovna(c_poj) ON DELETE CASCADE,
  CONSTRAINT PK_prispevek PRIMARY KEY (lek_pris, poj_pris)
  );

-- tabulka cen od dodavatelu  
CREATE TABLE IF NOT EXISTS cena(
  dodavatel_cena NUMBER(8),
  lek_cena VARCHAR(25),
  cena NUMBER(5),
  CONSTRAINT FK_lek_cena FOREIGN KEY (lek_cena) REFERENCES lek(nazev_leku) ON DELETE CASCADE,
  CONSTRAINT FK_dodavatel_cena FOREIGN KEY (dodavatel_cena) REFERENCES dodavatel(ICO) ON DELETE CASCADE, 
  CONSTRAINT PK_cena PRIMARY KEY (dodavatel_cena, lek_cena)
  );

-- generatory na ID 
create sequence s_pobocky
  INCREMENT BY 1
  START WITH 1;

create sequence s_nakupu
  INCREMENT BY 1
  START WITH 1;
  
-- naplnime to daty

-- druhy leku
INSERT INTO lek (nazev_leku, predpis, uc_latka) VALUES ('Ibalgin', 'N', 'antibolestinum');
INSERT INTO lek (nazev_leku, predpis, uc_latka) VALUES ('Viagra', 'N', 'erectinum');
INSERT INTO lek (nazev_leku, predpis, uc_latka) VALUES ('Xanax', 'Y', 'antimentalium');
INSERT INTO lek (nazev_leku, predpis, uc_latka) VALUES ('Minerva', 'Y', 'mcgonagalium');
INSERT INTO lek (nazev_leku, predpis, uc_latka) VALUES ('Bioparox', 'Y', 'tomasium');
INSERT INTO lek (nazev_leku, predpis, uc_latka) VALUES ('Rohypnol', 'Y', 'znasilnovalium');

-- pojistovny
INSERT INTO pojistovna (c_poj, nazev_poj, ulice_poj, c_p_poj, mesto_poj) VALUES (201 , 'VOZP', 'Drahobejlova', 4, 'Praha');
INSERT INTO pojistovna (c_poj, nazev_poj, ulice_poj, c_p_poj, mesto_poj) VALUES (205 , '�PZP', 'Jeremenkova', 11, 'Ostrava');
INSERT INTO pojistovna (c_poj, nazev_poj, ulice_poj, c_p_poj, mesto_poj) VALUES (207 , 'OZP', 'Ro�kotova', 1, 'Praha');
INSERT INTO pojistovna (c_poj, nazev_poj, ulice_poj, c_p_poj, mesto_poj) VALUES (209 , 'ZP�', 'Husova', 302, 'Mlad� Boleslav');
INSERT INTO pojistovna (c_poj, nazev_poj, ulice_poj, c_p_poj, mesto_poj) VALUES (211 , 'ZPMV', 'Koda�sk�', 46, 'Praha');
INSERT INTO pojistovna (c_poj, nazev_poj, ulice_poj, c_p_poj, mesto_poj) VALUES (213 , 'RBP', 'Mich�lkovick�', 108, 'Ostrava');

-- pobocky
INSERT INTO pobocka (ID_pob, ulice_pob, c_p_pob, mesto_pob) VALUES (s_pobocky.NEXTVAL, 'Bo�et�chova', 42, 'Brno');
INSERT INTO pobocka (ID_pob, ulice_pob, c_p_pob, mesto_pob) VALUES (s_pobocky.NEXTVAL, 'Milady Hor�kov�', 2, 'Praha');
INSERT INTO pobocka (ID_pob, ulice_pob, c_p_pob, mesto_pob) VALUES (s_pobocky.NEXTVAL, 'Pek�rensk�', 37, 'Brno');
INSERT INTO pobocka (ID_pob, ulice_pob, c_p_pob, mesto_pob) VALUES (s_pobocky.NEXTVAL, '�lut�', 8, 'Horn� Doln�');
INSERT INTO pobocka (ID_pob, ulice_pob, c_p_pob, mesto_pob) VALUES (s_pobocky.NEXTVAL, 'Hlavn�', 64, 'St�elskoho�tick� Lhota');

-- dodavatele
INSERT INTO dodavatel (ICO, jmeno_dod, ulice_dod, c_p_dod, mesto_dod) VALUES (12345678, 'Lekus', 'Vedlej��', 23, 'Praha');
INSERT INTO dodavatel (ICO, jmeno_dod, ulice_dod, c_p_dod, mesto_dod) VALUES (99999999, 'Levne Leky', 'Modr�', 1, 'Brno');
INSERT INTO dodavatel (ICO, jmeno_dod, ulice_dod, c_p_dod, mesto_dod) VALUES (11223344, 'Babi��ina mast', 'Star�', 99, 'Bohd�kov');


-- cena
--INSERT INTO cena (dodavatel_cena, lek_cena, cena) VALUES (99999999, 'Ibalgin', 10);
INSERT INTO cena (dodavatel_cena, lek_cena, cena) VALUES (12345678, 'Ibalgin', 12);
INSERT INTO cena (dodavatel_cena, lek_cena, cena) VALUES (12345678, 'Viagra', 40);
INSERT INTO cena (dodavatel_cena, lek_cena, cena) VALUES (11223344, 'Viagra', 45);
INSERT INTO cena (dodavatel_cena, lek_cena, cena) VALUES (99999999, 'Xanax', 45);
INSERT INTO cena (dodavatel_cena, lek_cena, cena) VALUES (12345678, 'Xanax', 50);
INSERT INTO cena (dodavatel_cena, lek_cena, cena) VALUES (12345678, 'Minerva', 350);
INSERT INTO cena (dodavatel_cena, lek_cena, cena) VALUES (11223344, 'Minerva', 320);
INSERT INTO cena (dodavatel_cena, lek_cena, cena) VALUES (99999999, 'Bioparox', 90);
INSERT INTO cena (dodavatel_cena, lek_cena, cena) VALUES (12345678, 'Bioparox', 84);
INSERT INTO cena (dodavatel_cena, lek_cena, cena) VALUES (11223344, 'Rohypnol', 680);
INSERT INTO cena (dodavatel_cena, lek_cena, cena) VALUES (12345678, 'Rohypnol', 723);

--prispevek
INSERT INTO prispevek (lek_pris, poj_pris, cena, od_plat, do_plat) VALUES ('Xanax', 211, 45, TO_DATE('10.01.2012', 'dd.mm.yyyy'), TO_DATE('10.02.2012', 'dd.mm.yyyy'));
INSERT INTO prispevek (lek_pris, poj_pris, cena, od_plat, do_plat) VALUES ('Bioparox', 201, 30, TO_DATE('01.01.2012', 'dd.mm.yyyy'), TO_DATE('31.12.2013', 'dd.mm.yyyy'));
INSERT INTO prispevek (lek_pris, poj_pris, cena, od_plat, do_plat) VALUES ('Bioparox', 209, 25, TO_DATE('01.03.2012', 'dd.mm.yyyy'), TO_DATE('31.10.2013', 'dd.mm.yyyy'));
INSERT INTO prispevek (lek_pris, poj_pris, cena, od_plat, do_plat) VALUES ('Xanax', 201, 150, TO_DATE('20.01.2012', 'dd.mm.yyyy'), TO_DATE('31.05.2013', 'dd.mm.yyyy'));
INSERT INTO prispevek (lek_pris, poj_pris, cena, od_plat, do_plat) VALUES ('Ibalgin', 213, 5, TO_DATE('16.05.2012', 'dd.mm.yyyy'), TO_DATE('18.12.2013', 'dd.mm.yyyy'));
INSERT INTO prispevek (lek_pris, poj_pris, cena, od_plat, do_plat) VALUES ('Minerva', 207, 96, TO_DATE('01.09.2012', 'dd.mm.yyyy'), TO_DATE('30.04.2013', 'dd.mm.yyyy'));
INSERT INTO prispevek (lek_pris, poj_pris, cena, od_plat, do_plat) VALUES ('Rohypnol', 207, 50, TO_DATE('02.04.2012', 'dd.mm.yyyy'), TO_DATE('02.12.2013', 'dd.mm.yyyy'));

-- sklad
INSERT INTO sklad (pobocka_skladu, lek_sklad, cena, mnozstvi) VALUES (1, 'Xanax', 60, 5);
INSERT INTO sklad (pobocka_skladu, lek_sklad, cena, mnozstvi) VALUES (2, 'Xanax', 65, 4);
INSERT INTO sklad (pobocka_skladu, lek_sklad, cena, mnozstvi) VALUES (3, 'Xanax', 60, 5);
INSERT INTO sklad (pobocka_skladu, lek_sklad, cena, mnozstvi) VALUES (4, 'Xanax', 51, 2);
INSERT INTO sklad (pobocka_skladu, lek_sklad, cena, mnozstvi) VALUES (5, 'Xanax', 55, 0);
INSERT INTO sklad (pobocka_skladu, lek_sklad, cena, mnozstvi) VALUES (1, 'Viagra', 60, 5);
INSERT INTO sklad (pobocka_skladu, lek_sklad, cena, mnozstvi) VALUES (2, 'Viagra', 65, 14);
INSERT INTO sklad (pobocka_skladu, lek_sklad, cena, mnozstvi) VALUES (3, 'Viagra', 60, 0);
INSERT INTO sklad (pobocka_skladu, lek_sklad, cena, mnozstvi) VALUES (4, 'Viagra', 51, 2);
INSERT INTO sklad (pobocka_skladu, lek_sklad, cena, mnozstvi) VALUES (5, 'Viagra', 55, 10);
INSERT INTO sklad (pobocka_skladu, lek_sklad, cena, mnozstvi) VALUES (1, 'Ibalgin', 40, 54);
INSERT INTO sklad (pobocka_skladu, lek_sklad, cena, mnozstvi) VALUES (2, 'Ibalgin', 45, 140);
INSERT INTO sklad (pobocka_skladu, lek_sklad, cena, mnozstvi) VALUES (3, 'Ibalgin', 40, 38);
INSERT INTO sklad (pobocka_skladu, lek_sklad, cena, mnozstvi) VALUES (4, 'Ibalgin', 31, 20);
INSERT INTO sklad (pobocka_skladu, lek_sklad, cena, mnozstvi) VALUES (5, 'Ibalgin', 35, 10);
INSERT INTO sklad (pobocka_skladu, lek_sklad, cena, mnozstvi) VALUES (1, 'Rohypnol', 960, 0);
INSERT INTO sklad (pobocka_skladu, lek_sklad, cena, mnozstvi) VALUES (2, 'Rohypnol', 979, 0);
INSERT INTO sklad (pobocka_skladu, lek_sklad, cena, mnozstvi) VALUES (3, 'Rohypnol', 960, 0);
INSERT INTO sklad (pobocka_skladu, lek_sklad, cena, mnozstvi) VALUES (4, 'Rohypnol', 937, 0);
INSERT INTO sklad (pobocka_skladu, lek_sklad, cena, mnozstvi) VALUES (5, 'Rohypnol', 937, 3);
INSERT INTO sklad (pobocka_skladu, lek_sklad, cena, mnozstvi) VALUES (1, 'Minerva', 360, 22);
INSERT INTO sklad (pobocka_skladu, lek_sklad, cena, mnozstvi) VALUES (2, 'Minerva', 379, 0);
INSERT INTO sklad (pobocka_skladu, lek_sklad, cena, mnozstvi) VALUES (3, 'Minerva', 360, 2);
INSERT INTO sklad (pobocka_skladu, lek_sklad, cena, mnozstvi) VALUES (4, 'Minerva', 337, 1);
INSERT INTO sklad (pobocka_skladu, lek_sklad, cena, mnozstvi) VALUES (5, 'Minerva', 337, 13);
INSERT INTO sklad (pobocka_skladu, lek_sklad, cena, mnozstvi) VALUES (1, 'Bioparox', 160, 2);
INSERT INTO sklad (pobocka_skladu, lek_sklad, cena, mnozstvi) VALUES (2, 'Bioparox', 179, 10);
INSERT INTO sklad (pobocka_skladu, lek_sklad, cena, mnozstvi) VALUES (3, 'Bioparox', 160, 2);
INSERT INTO sklad (pobocka_skladu, lek_sklad, cena, mnozstvi) VALUES (4, 'Bioparox', 137, 0);
INSERT INTO sklad (pobocka_skladu, lek_sklad, cena, mnozstvi) VALUES (5, 'Bioparox', 137, 3);

--n�kup
INSERT INTO nakup (ID_nakupu, datum_nak, pobocka_nakupu) VALUES (s_nakupu.NEXTVAL, TO_DATE('02.04.2012', 'dd.mm.yyyy'), 1);
INSERT INTO nakup (ID_nakupu, datum_nak, pobocka_nakupu) VALUES (s_nakupu.NEXTVAL, TO_DATE('02.04.2012', 'dd.mm.yyyy'), 2);
INSERT INTO nakup (ID_nakupu, datum_nak, pobocka_nakupu) VALUES (s_nakupu.NEXTVAL, TO_DATE('02.05.2012', 'dd.mm.yyyy'), 3);
INSERT INTO nakup (ID_nakupu, datum_nak, pobocka_nakupu) VALUES (s_nakupu.NEXTVAL, TO_DATE('02.05.2012', 'dd.mm.yyyy'), 4);
INSERT INTO nakup (ID_nakupu, datum_nak, pobocka_nakupu) VALUES (s_nakupu.NEXTVAL, TO_DATE('02.06.2012', 'dd.mm.yyyy'), 1);
INSERT INTO nakup (ID_nakupu, datum_nak, pobocka_nakupu) VALUES (s_nakupu.NEXTVAL, TO_DATE('02.06.2012', 'dd.mm.yyyy'), 1);
INSERT INTO nakup (ID_nakupu, datum_nak, pobocka_nakupu) VALUES (s_nakupu.NEXTVAL, TO_DATE('02.07.2012', 'dd.mm.yyyy'), 2);
INSERT INTO nakup (ID_nakupu, datum_nak, pobocka_nakupu) VALUES (s_nakupu.NEXTVAL, TO_DATE('02.07.2012', 'dd.mm.yyyy'), 3);
INSERT INTO nakup (ID_nakupu, datum_nak, pobocka_nakupu) VALUES (s_nakupu.NEXTVAL, TO_DATE('02.07.2012', 'dd.mm.yyyy'), 5);

--na kter� l�k p�isp�v� kter� poji��ovna a jakou ��stkou
SELECT nazev_leku, nazev_poj, cena
FROM prispevek NATURAL JOIN lek NATURAL JOIN pojistovna
WHERE lek.nazev_leku = prispevek.lek_pris AND prispevek.poj_pris = pojistovna.c_poj;

--ktery dodavatel dodava ktere leky 
SELECT jmeno_dod as dodavatel, lek_cena as lek
FROM cena NATURAL JOIN dodavatel
WHERE cena.dodavatel_cena = dodavatel.ICO;

--ktere leky dodava krome Lekus i jiny dodavatel
SELECT dodavatel.jmeno_dod as dodavatel, cena.lek_cena as lek
FROM cena, dodavatel
WHERE dodavatel.ICO = cena.dodavatel_cena AND cena.dodavatel_cena <> '12345678' AND 
      EXISTS(SELECT cena.lek_cena
             FROM cena
             WHERE cena.dodavatel_cena = '12345678');
             
--ktere pojistovny maji sidlo v Ostrave nebo Mlad� Boleslavi
SELECT nazev_poj, ulice_poj, c_p_poj, mesto_poj
FROM pojistovna 
WHERE mesto_poj IN ('Ostrava', 'Mlad� Boleslav');

--kolik krabicek leku celkem je na jednotlivyych pobockach
SELECT ulice_pob, c_p_pob, mesto_pob, krabicek
FROM pobocka NATURAL JOIN(
SELECT sklad.pobocka_skladu, SUM(sklad.mnozstvi) as krabicek
FROM sklad
GROUP BY pobocka_skladu)
WHERE pobocka.ID_pob = pobocka_skladu;


-- kolko kde stoji Viagra
SELECT ulice_pob, nazev_leku, cena
FROM pobocka
NATURAL JOIN lek NATURAL JOIN sklad
WHERE pobocka.ID_pob=sklad.pobocka_skladu
AND lek.nazev_leku=sklad.lek_sklad
AND lek.nazev_leku='Viagra';

-- na kolko liekov ktora poistovna prispieva
SELECT nazev_poj, na_kolik_prispiva
FROM pojistovna NATURAL JOIN
(
  SELECT COUNT(*) as na_kolik_prispiva, prispevek.poj_pris
  FROM prispevek
  GROUP BY poj_pris
)
WHERE pojistovna.c_poj=poj_pris;
