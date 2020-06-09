DROP DATABASE projetpersonnelSW;
CREATE DATABASE projetpersonnelSW;
USE projetpersonnelSW;


CREATE TABLE UTILISATEUR (
id_utilisateur INT NOT NULL AUTO_INCREMENT,
email VARCHAR(255) UNIQUE NOT NULL,
nomUtilisateur VARCHAR(255) NOT NULL,
prenomUtilisateur VARCHAR(255) NOT NULL,
password VARCHAR(255) NOT NULL,
PRIMARY KEY (id_utilisateur)
);

CREATE TABLE CONSOLE (
  idConsole INT AUTO_INCREMENT,
  nomConsole VARCHAR(255) NOT NULL,
  prixConsole FLOAT NOT NULL,
  imageConsole VARCHAR(255) NOT NULL,
  PRIMARY KEY(idconsole)
);

CREATE TABLE JEUX (
  idJeux INT NOT NULL AUTO_INCREMENT,
  nomJeux VARCHAR(255) NOT NULL,
  prixJeux FLOAT NOT NULL,
  fk_jeuxConsole INT NOT NULL,
  imageJeux VARCHAR(255) NOT NULL,
  PRIMARY KEY(idJeux),
  FOREIGN KEY(fk_jeuxConsole) REFERENCES CONSOLE(idConsole)
);


CREATE TABLE FIGURINE (
  idFigurine INT NOT NULL AUTO_INCREMENT,
  nomFigurine VARCHAR(255) NOT NULL,
  prixFigurine FLOAT NOT NULL,
  imageFigurine VARCHAR(255) NOT NULL,
  PRIMARY KEY(idFigurine)
);


INSERT INTO CONSOLE (idConsole, nomConsole, prixConsole, imageConsole) VALUES (1,"XBOX SERIES X", "499.99","https://img.phonandroid.com/2019/11/xbox-series-x-image.jpg");
INSERT INTO CONSOLE (idConsole, nomConsole, prixConsole, imageConsole) VALUES (2,"PS5", "499.99","https://images.frandroid.com/wp-content/uploads/2019/09/playstation-5-ps5-letsgodigital.jpg");
INSERT INTO CONSOLE (idConsole, nomConsole, prixConsole, imageConsole) VALUES (3,"NINTENDO SWITCH", "349.99","https://upload.wikimedia.org/wikipedia/commons/7/76/Nintendo-Switch-Console-Docked-wJoyConRB.jpg");

INSERT INTO JEUX (nomJeux, prixJeux,fk_jeuxConsole,imageJeux) VALUES ("HALO INFINITE", "69.99",1,"https://media1.auchan.fr/images/h8c/h5e/14668722241566.jpg");
INSERT INTO JEUX (nomJeux, prixJeux,fk_jeuxConsole,imageJeux) VALUES ("Tom Clancy's Rainbow Six Quarantine", "69.99", "2","https://www.psmania.net/images/covers/8421_cover.jpg");
INSERT INTO JEUX (nomJeux, prixJeux,fk_jeuxConsole,imageJeux) VALUES ("Tom Clancy's Rainbow Six: Quarantine", "69.99",1,"https://www.jbhifi.co.nz/FileLibrary/ProductResources/Images/137988-L-HI.jpg");
INSERT INTO JEUX (nomJeux, prixJeux,fk_jeuxConsole,imageJeux) VALUES ("ANIMAL CROSSING NEW HORIZON","49.99","3","https://www.carrefour.fr/media/540x540/Photosite/BAZAR/JEUX_VIDEO_ET_LOGICIELS/0045496425425_PHOTOSITE_20200207_084814_0.jpg?placeholder=1");
INSERT INTO JEUX (nomJeux, prixJeux,fk_jeuxConsole,imageJeux) VALUES ("FIFA 20", "35",3,"https://static.fnac-static.com/multimedia/Images/FR/NR/7b/82/aa/11174523/1540-1/tsp20190726173116/FIFA-20-Nintendo-Switch.jpg");
INSERT INTO JEUX (nomJeux, prixJeux,fk_jeuxConsole,imageJeux) VALUES ("FIFA 20", "69",2,"https://static.fnac-static.com/multimedia/Images/FR/NR/78/82/aa/11174520/1505-1/tsp20190726170217/FIFA-20-PS4.jpg");
INSERT INTO JEUX (nomJeux, prixJeux,fk_jeuxConsole,imageJeux) VALUES ("FIFA 20", "69",1,"https://cdn.cdkeys.com/500x706/media/catalog/product/f/i/fifa-20-ultimate-editon-cd-keys-discount-xbox-one.jpg");

INSERT INTO FIGURINE (nomFigurine,prixFigurine,imageFigurine) VALUES ("VEGETO","39.99","https://cdn.shopify.com/s/files/1/0039/8668/6063/products/figurine-vegeto-blue-7172783505519.jpg?v=1561570611");
INSERT INTO FIGURINE (nomFigurine,prixFigurine,imageFigurine) VALUES ("BARBE BLANCHE","70","https://www.kamehashop.fr/30059-large_default/one-piece-figurine-edward-newgate-pirate-captain.jpg");
INSERT INTO FIGURINE (nomFigurine,prixFigurine,imageFigurine) VALUES ("GUTS","1249.99","https://www.manga-story.fr/ms/images/visuels/produit_derive/grande/4111_4.jpg");

