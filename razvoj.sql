DROP DATABASE IF EXISTS sajt;

CREATE DATABASE sajt;

USE sajt;

CREATE TABLE IF NOT EXISTS tipkorisnika(
    id INT UNSIGNED AUTO_INCREMENT,
    naziv VARCHAR(50) NOT NULL,
    PRIMARY KEY(id)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS korisnik(
    id INT UNSIGNED AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(250) NOT NULL,
    tip_id  INT UNSIGNED NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(tip_id) REFERENCES tipkorisnika(id)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS profil(
    id INT UNSIGNED AUTO_INCREMENT,
    ime VARCHAR(50) NOT NULL,
    prezime VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    adresa VARCHAR(50) NOT NULL,
    korisnik_id INT UNSIGNED NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(korisnik_id) REFERENCES korisnik(id)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS pitanje(
    id INT UNSIGNED AUTO_INCREMENT,
    tekst VARCHAR(500) NOT NULL,
    tacanodg VARCHAR(255) NOT NULL,
    PRIMARY KEY(id)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS netacniodgovori(
    id INT UNSIGNED AUTO_INCREMENT,
    tekst VARCHAR(255) NOT NULL,
    pitanje_id INT UNSIGNED NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(pitanje_id) REFERENCES pitanje(id)
) ENGINE = InnoDB;



INSERT INTO `pitanje`(`tekst`,`tacanodg`) VALUES ('Skraćenica CPU označava:','Central Processing Unit');
INSERT INTO `pitanje`(`tekst`,`tacanodg`) VALUES ('Operativni sistem je:','Kolekcija sistemskih programa koji omogućavaju efikasno korišćenje računarskog sistema');
INSERT INTO `pitanje`(`tekst`,`tacanodg`) VALUES ('Monitor u računarskom sistemu predstavlja njegovu:','Izlazni uređaj');
INSERT INTO `pitanje`(`tekst`,`tacanodg`) VALUES ('Memorijski prostor veličine od 1GB ekvivalentan je sa:','1024 MB');
INSERT INTO `pitanje`(`tekst`,`tacanodg`) VALUES ('Broj koji se u binarnom sistemu zapisuje kao 10100101 se u heksadekadnom sistemu zapisuje kao','A5');
INSERT INTO `pitanje`(`tekst`,`tacanodg`) VALUES ('Sa koliko nula se završava dekadni broj 45 u binarnom zapisu:','0');
INSERT INTO `pitanje`(`tekst`,`tacanodg`) VALUES ('Koji od sledećih dekadnih brojeva ima najveći zbir cifara u osnovi 8?','13');
INSERT INTO `pitanje`(`tekst`,`tacanodg`) VALUES ('Data su 3 niza znakova proizvoljne dužine. Na svaki niz pojedinačno primenimo redom sledeće operacije: i) Ispred svakog znaka a dodamo po jedan znak b, ii) Ispred svakog znaka b dodamo po jedan znak b, iii) Na početku i na kraju niza dodamo po jedan znak a. Dobijene nizove nadovežemo jedan za drugim i tako dobijemo jedan niz znakova. Samo na osnovu kreiranog niza','Moguće je odrediti koja su početna 3 niza samo u slučaju da nijedan od početnih nizova nije sadržao slovo b.');
INSERT INTO `pitanje`(`tekst`,`tacanodg`) VALUES ('Broj 961.5 pripada brojnom sistemu sa osnovom:','16');
INSERT INTO `pitanje`(`tekst`,`tacanodg`) VALUES ('Koji od navedenih tipova podataka ne predstavlja složen tip podatka:','Struct');
INSERT INTO `pitanje`(`tekst`,`tacanodg`) VALUES ('Koja od ponuđenih opcija predstavlja dva tipa mreže? ','WAN i LAN ');
INSERT INTO `pitanje`(`tekst`,`tacanodg`) VALUES ('Izlazni uređaj u računarskom sistemu je:','Monitor ');
INSERT INTO `pitanje`(`tekst`,`tacanodg`) VALUES ('Najveći ceo pozitivan broj koji može da se registruje u memorijskoj lokaciji veličine jednog bajta je:','255 ');
INSERT INTO `pitanje`(`tekst`,`tacanodg`) VALUES ('Memorijski prostor veličine od 1MB ekvivalentan je sa:','1024 ');
INSERT INTO `pitanje`(`tekst`,`tacanodg`) VALUES ('Broj koji se u binarnom sistemu zapisuje kao 11010011 se u heksadekadnom sistemu zapisuje kao','D3');
INSERT INTO `pitanje`(`tekst`,`tacanodg`) VALUES ('Komandom UNDO se vrši sledeće:','Poništava poslednja radnja');
INSERT INTO `pitanje`(`tekst`,`tacanodg`) VALUES ('Majka je imala 26 godina kada je rodila kćerku, a 31 godinu kada je rodila sina. Koliko danas majka ima godina ako svi zajedno imaju 60 godina?','39 ');
INSERT INTO `pitanje`(`tekst`,`tacanodg`) VALUES ('Prvog dana leta, na jezeru se rascvetao lokvanj. Svaki dan nakon toga, broj lokvanja bi se udvostručio, da bi 20. dana celo jezero bilo prekriveno lokvanjima. Kog je dana tačno pola jezera bilo prekriveno lokvanjima?','19 ');
INSERT INTO `pitanje`(`tekst`,`tacanodg`) VALUES ('Koliko jedinica ima u binarnom zapisu dekadnog broja 60?','4 ');
INSERT INTO `pitanje`(`tekst`,`tacanodg`) VALUES ('Pera i Laza su odlučili da nakon prijemnog ispita idu kući taksijem. Međutim, pošto Pera izlazi pre Laze, dogovorili su se da podele troškove vožnje u onom delu u kojem su se vozili zajedno. Ako je taksimetar pokazivao 800 dinara kada je Pera izašao, i 1400 dinara kada je Laza izašao, koliko dinara treba da plati Laza?','1000');
INSERT INTO `pitanje`(`tekst`,`tacanodg`) VALUES ('Broj 192.4 pripada brojnom sistemu sa osnovom:','16');
INSERT INTO `pitanje`(`tekst`,`tacanodg`) VALUES ('Data je sledeća funkcija sa jednim celobrojnim argumentom:
int f(int limit) {
 int br = 0, s = 1;
while(s <= limit){
br++;
s = s*2;
}
return br;
}
Koji je rezultat poziva funkcije f(16)?
','5 ');
INSERT INTO `pitanje`(`tekst`,`tacanodg`) VALUES ('Šta radi sledeći kod:
int c=a;
a=b;
b=c;
','Razmenjuje vrednosti promenljivih a i b ');
INSERT INTO `pitanje`(`tekst`,`tacanodg`) VALUES ('Tip datoteke zip se obično koristi za:','Arhivu');
INSERT INTO `pitanje`(`tekst`,`tacanodg`) VALUES ('Deo teksta se može premestiti iz jednog dokumenta u drugi instrukcijma:','CUT, PASTE');
INSERT INTO `pitanje`(`tekst`,`tacanodg`) VALUES ('Zbir brojeva B1 i AE u hekasadekadnom brojnom sistemu je','15F');


INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('Control Program Unit','1');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('Computing process unit','1');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('Sve prethodno navedeno','1');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('Deo svakog programa koji omogućuje njegovo startovanje','2');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('Operativna grupa programa koja isključivo kontroliše rad računarskih komponenti','2');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('Sve prethodno navedeno','2');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('Operativnu (centralnu) memoriju','3');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('Grafičku procesorsku jedinicu','3');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('Sve prethodno navedeno','3');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('8 MB','4');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('1000 MB','4');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('256 MB','4');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('AB','5');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('2211','5');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('15','5');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('1','6');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('2','6');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('3','6');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('8','7');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('10','7');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('16','7');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('Uvek je moguće odrediti koja su početna 3 niza znakova','8');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('Moguće je odrediti koja su početna 3 niza samo u slučaju da nijedan od početnih nizova nije sadržao slovo a.','8');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('Moguće je odrediti koja su početna 3 niza samo u slučaju da nijedan od početnih nizova nije sadržao ni slovo a ni slovo b.','8');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('2','9');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('4','9');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('8','9');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('Struct','10');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('Union','10');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('String','10');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('CPU i MOS ','11');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('Chrome i Explorer ','11');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('Sve prethodno ','11');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('Miš ','12');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('Tastatura ','12');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('Sve prethodno navedeno','12');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('127 ','13');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('256 ','13');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('128','13');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('8 KB','14');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('1000 KB','14');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('256 KB','14');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('BA ','15');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('3103 ','15');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('13 ','15');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('Vraća u prethodni folder','16');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('Briše željena datoteka','16');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('Sortiraju dokumanta u folderu','16');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('30 ','17');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('42 ','17');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('48','17');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('2  ','18');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('10  ','18');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('20','18');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('2 ','19');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('3 ','19');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('5','19');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('400 ','20');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('600 ','20');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('800 ','20');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('2 ','21');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('4','21');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('8','21');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('3 ','22');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('4','22');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('6','22');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('Duplira vrednosti promenljivih b i c ','23');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('Deklariše i inicijalizuje promenljive a, b i c ','23');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('Sortira po veličini promenljive a, b i c ','23');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('Dokumenta','24');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('Izvršne fajlove','24');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('Video materijale','24');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('CUT, MOVE','25');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('MOVE, DELETE','25');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('COPY, PASTE','25');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('FF','26');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('200','26');
INSERT INTO `netacniodgovori`(`tekst`,`pitanje_id`) VALUES ('1AF','26');



INSERT INTO `pitanje`(`tekst`, `tacanodg`) VALUES ('Koju vrstu podataka najčešće sadrže datoteke sa ekstenzijom .txt?','Tekst');
INSERT INTO `pitanje`(`tekst`, `tacanodg`) VALUES ('Veličina memorije u računaru se izražava brojem','bajtova');
INSERT INTO `pitanje`(`tekst`, `tacanodg`) VALUES ('U sezoni se igra 20 partija šaha. U prvih 15 partija Perica je imao 9 pobeda, dok je ostale partije izgubio. Koliki će biti njegov ukupan procenat uspešnosti u sezoni ukoliko pobedi u svim preostalim partijama?','70%');
INSERT INTO `pitanje`(`tekst`, `tacanodg`) VALUES ('Konstanta je','Podatak čija se vrednost ne menja posle prve dodele vrednosti');
INSERT INTO `pitanje`(`tekst`, `tacanodg`) VALUES ('Broj koji se u binarnom sistemu zapisuje kao 10101010 se u heksadekadnom sistemu zapisuje kao','AA');
INSERT INTO `pitanje`(`tekst`, `tacanodg`) VALUES ('Zbir svih neparnih brojeva manjih od 100 je','2500');
INSERT INTO `pitanje`(`tekst`, `tacanodg`) VALUES ('Koliko različitih prirodnih brojeva n ima osobinu da je tačno jedan od brojeva n i n + 30 četvorocifren?','60');
INSERT INTO `pitanje`(`tekst`, `tacanodg`) VALUES ('26 studenata je otišlo na izlet čamcima. Svako od njih je poneo po jedan novčić. Studenti mogu da iznajme čamce koji imaju 1, 2, 4, 8, 16 i 32 mesta. Cena iznajmljivanja čamca direktno zavisi od broja mesta u čamcu (čamac sa jednim mestom jedan novčić, sa dva mesta dva novčića, itd.). Koliko najmanje čamaca moraju iznajmiti da bi svi stali u njih? ','3');
INSERT INTO `pitanje`(`tekst`, `tacanodg`) VALUES ('Koja od sledećih nejednakosti je tačna?','8 bit < 2 byte ');
INSERT INTO `pitanje`(`tekst`, `tacanodg`) VALUES ('Digitalnim fotoaparatom ste snimili sliku veličine 4096x3072 (4096 piksela širine i 3072 piksela visine). Ako želite da postavite sliku na svoju web stranicu, prvo je morate smanjiti. Koja od predloženih dimenzija, izraženih u pikselima (širina x visina) je najprikladnija za to? Želite da prikažete celu sliku, čuvajući odnos između visine i širine. ','800×600');
INSERT INTO `pitanje`(`tekst`, `tacanodg`) VALUES ('Sava traži broj telefona svoje drugarice iz predškolskog, na web stranici koja sadrži veoma veliki broj imena i brojeva telefona. Sava se baš ne seća kako se tačno zove drugarica, pa prilikom pretrage koristi specijalne karaktere ?, & i %: Karakter ? se koristi kada tačno jedno slovo nije poznato Karakter & se koristi kada tačno dva uzastopna slova nisu poznata Karakter % se koristi kada ostatak imena nije poznat Sava je u polje za pretragu upisao sledeće: М?л&а М?ло&в% Koje ime Sava traži? ','Milica Milosevic');
INSERT INTO `pitanje`(`tekst`, `tacanodg`) VALUES ('Korisničko ime se sastoji od pet karaktera a, b, c, d, e koji se ne ponavljaju. Na primer, ispravno korisničko ime je daecb, dok je bbdae neispravno. Koliko postoji ispravnih korisničkih imena u kojima se slovo a nalazi neposredno iza slova e?','24');
INSERT INTO `pitanje`(`tekst`, `tacanodg`) VALUES ('Data je funkcija sa dva celobrojna argumenta: int f(int i, int j) { while(i + j < 10) { j = j + 1; i = i + j; } return i + j; } Koji je rezultat poziva funkcije f(1, 2)? ','12');
INSERT INTO `pitanje`(`tekst`, `tacanodg`) VALUES ('Za tri različita broja x, y i z moguće je odrediti najveći i najmanji broj, dok je preostali broj srednji po veličini. Ako su date funkcije max(a, b) i min(a, b) koje određuju maksimum, odnosno minimum dva broja, koji od sledećih poziva će odrediti srednji broj?','min(min(max(x,y), max(x,z)), max(y,z))');
INSERT INTO `pitanje`(`tekst`, `tacanodg`) VALUES ('Koja od navedenih ekstenzija se najčešće koristi za tekstualne datoteke?','txt');
INSERT INTO `pitanje`(`tekst`, `tacanodg`) VALUES ('Koja od sledećih skraćenica ne predstavlja mrežni protokol?','HDD');
INSERT INTO `pitanje`(`tekst`, `tacanodg`) VALUES ('Pod kojim imenom je poznat broj 10100?','Googol');
INSERT INTO `pitanje`(`tekst`, `tacanodg`) VALUES ('Jezik namenjen upravljanju podacima u relacionim sistemima za upravljanje bazama podataka je: ','SQL');
INSERT INTO `pitanje`(`tekst`, `tacanodg`) VALUES ('Koji od sledećih tipova memorije ne predstavlja unutrašnju memoriju računara?','USB');
INSERT INTO `pitanje`(`tekst`, `tacanodg`) VALUES ('Za prirodan broj n, definišemo n! = n(n − 1)(n − 2) ⋯ 3 ∙ 2 ∙ 1. Sa koliko nula se završava broj 100!','24');
INSERT INTO `pitanje`(`tekst`, `tacanodg`) VALUES ('Koji od sledećih izraza je tačan? Svi brojevi su zapisani u binarnom sistemu. ','10100/10 = 1100 − 10');
INSERT INTO `pitanje`(`tekst`, `tacanodg`) VALUES ('Koliko ima neparnih brojeva između heksadecimalnih brojeva 3C i A0?','50');
INSERT INTO `pitanje`(`tekst`, `tacanodg`) VALUES ('Koliko jedinica heksadekadni broj ABCDEF ima u svom binarnom zapisu?','17');
INSERT INTO `pitanje`(`tekst`, `tacanodg`) VALUES ('U jednoj velikoj porodici svakom detetu je postavljeno isto pitanje - “Koliko braće imaš?“. Kada su sabrani svi odgovori koje su deca dala, dobijen je broj 35. Ako se zna da u porodici ima bar dva muška deteta, koliko ukupno dece ima u toj porodici? ','8');
INSERT INTO `pitanje`(`tekst`, `tacanodg`) VALUES ('Verovatnoća da je parking mesto slobodno je 1/3. Ako je parking mesto bilo slobodno 9 dana za redom, kolika je verovatnoća da će biti slobodno desetog dana?','1/3');
INSERT INTO `pitanje`(`tekst`, `tacanodg`) VALUES ('Ako različitim slovima odgovaraju različite cifre i važi UDAR + UDAR = DRAMA, onda je zbir cifara kojima odgovaraju slova A i M jednak: ','7');
INSERT INTO `pitanje`(`tekst`, `tacanodg`) VALUES ('Kupili ste 1000 flaša soka, među kojima je jedna u kojoj je sok loš i izuzetno je gorak. Loš sok je toliko gorak da se gorčina oseća i ako je samo jedna kap lošeg soka pomešana sa bilo kojom količinom normalnog soka. Koliko je najmanje isprobavanja potrebno da bi se utvrdilo u kojoj flaši se nalazi loš sok? Pod jednim isprobavanjem se podrazumeva provera jednog gutljaja mešavine dobijene od soka iz datih flaša na bilo koji način.','10');
INSERT INTO `pitanje`(`tekst`, `tacanodg`) VALUES ('Data je funkcija f sa dva celobrojna argumenta. Koji je rezultat poziva funkcije f(1,1)? int f(int i, int j) { while (i + j < 10) { j++; i = i + 2; } return i + j; } function f(i, j: integer) : integer; begin while (i + j < 10) do begin inc(j); i := i + 2; end; f := i + j; end;','11');

INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('Sliku','27');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('Video','27');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('Zvuk','27');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('RAM modula','28');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('ROM modula','28');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('herca','28');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('60%','29');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('75%','29');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('80%','29');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('Podatak u koji se upisuje izračunata vrednost izraza pri svakom izračunavanju te vrednosti ','30');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('Podatak celobrojnog ili realnog tipa ','30');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('Podatak čija se vrednost menja samo jednom posle prve dodele vrednosti','30');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('BA','31');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('BB','31');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('AD','31');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('2450','32');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('2600','32');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('5050','32');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('29','33');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('30','33');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('31','33');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('1','34');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('2','34');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('4','34');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('32 bit < 3 byte','35');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('16 bit > 2 byte ','35');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('2 byte < 15 bit','35');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('600×600','36');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('800×640','36');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('480×600','36');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('Milena Milojkovic','37');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('Mila Marinkovic','37');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('Malina Milivojevic','37');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('20','38');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('30','38');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('36','38');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('10','39');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('11','39');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('13','39');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('min(max(x,y), z)','40');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('max(min(x,y),max(y,z))','40');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('min(min(max(x,y),z),max(x,y))','40');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('exe','41');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('jpg','41');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('png','41');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('HTTP','42');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('TCP','42');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('SMTP','42');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('Fibonacci – jev broj','43');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('Avogadrov broj','43');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('Catalan – ov broj','43');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('PHP','44');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('C++','44');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('Apache','44');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('RAM','45');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('ROM','45');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('Cache','45');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('20','46');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('100','46');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('1000','46');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('1000 < 10101','47');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('10111 + 10111 > 101111','47');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('1010 × 1111 = 101110','47');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('100','48');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('49','48');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('60','48');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('15','49');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('16','49');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('18','49');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('7','50');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('9','50');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('10','50');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('1⁄3) 9 × (2⁄3)','51');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('(2⁄3) 9 × (1⁄3)','51');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('2⁄3','51');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('6','52');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('8','52');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('9','52');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('100','53');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('500','53');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('9999','53');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('8','54');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('9','54');
INSERT INTO `netacniodgovori`(`tekst`, `pitanje_id`) VALUES ('10','54');
INSERT INTO `tipkorisnika`(`naziv`) VALUES('administrator');
INSERT INTO `tipkorisnika`(`naziv`) VALUES('nastavnik');
INSERT INTO `tipkorisnika`(`naziv`) VALUES('student');

INSERT INTO `korisnik`(`username`,`password`,`tip_id`) VALUES ('ivanai', '923352284767451ab158a387a283df26',3);
INSERT INTO `korisnik`(`username`, `password`, `tip_id`) VALUES ('nadjam','923352284767451ab158a387a283df26', 3);

INSERT INTO `profil`(`ime`, `prezime`, `email`, `adresa`, `korisnik_id`) VALUES ('Ivana','Ivanovic','email1','adresa1', 1);
INSERT INTO `profil`(`ime`, `prezime`, `email`, `adresa`, `korisnik_id`) VALUES ('Nadja','Marinkovic','email2','adresa2', 2);

INSERT INTO `korisnik`(`username`,`password`,`tip_id`) VALUES ('marijaj', '923352284767451ab158a387a283df26',2);
INSERT INTO `profil`(`ime`, `prezime`, `email`, `adresa`, `korisnik_id`) VALUES ('Marija','Jenic','email3','adresa3', 3);


CREATE TABLE IF NOT EXISTS testingpitanja(
    id INT UNSIGNED AUTO_INCREMENT,
    pitanje1 INT NOT NULL,
    pitanje2 INT NOT NULL,
    pitanje3 INT NOT NULL,
    pitanje4 INT NOT NULL,
    pitanje5 INT NOT NULL,
    pitanje6 INT NOT NULL,
    pitanje7 INT NOT NULL,
    pitanje8 INT NOT NULL,
    pitanje9 INT NOT NULL,
    pitanje10 INT NOT NULL,
    PRIMARY KEY(id)
)ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS procenatuspesnosti(
    id INT UNSIGNED AUTO_INCREMENT,
    student_id INT UNSIGNED NOT NULL,
    brojodg INT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY(student_id) REFERENCES korisnik(id)
)ENGINE=InnoDB;

ALTER TABLE pitanje
ADD COLUMN nastavnik_id INT UNSIGNED,
ADD CONSTRAINT fk_nastavnik_id
FOREIGN KEY (nastavnik_id) REFERENCES korisnik(id);

UPDATE pitanje
SET nastavnik_id=1;

ALTER TABLE korisnik
ADD COLUMN banovan VARCHAR(10) DEFAULT false;

INSERT INTO `korisnik`(`username`,`password`,`tip_id`) VALUES ('tanjap', '923352284767451ab158a387a283df26', 1);
INSERT INTO `profil`(`ime`, `prezime`, `email`, `adresa`, `korisnik_id`) VALUES ('Tanja','Pesic','email4','adresa4', 4);

INSERT INTO `korisnik`(`username`,`password`,`tip_id`) VALUES ('magdalenag', '923352284767451ab158a387a283df26', 3);
INSERT INTO `profil`(`ime`, `prezime`, `email`, `adresa`, `korisnik_id`) VALUES ('Magdalena','Grozdanovic','email5','adresa5', 5);

ALTER TABLE pitanje
ADD COLUMN banovano VARCHAR(10) DEFAULT false;