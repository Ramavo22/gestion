-- Data basique

INSERT INTO type_centre (label) VALUES
    ('Structure'),
    ('Operationnel');

INSERT INTO type_charge (label) VALUES
    ('Incorporable'),
    ('Non Incorporable'),
    ('Suppletive');

INSERT INTO nature (label) VALUES
    ('Fixe'),
    ('Variable');

INSERT INTO centre (label,type_centre_id) VALUES
    ('Approvisionnement',2),
    ('Découpe papier et carton',2),
    ('Impression',2),
    ('Assemblage et reliure',2),
    ('Massicotage et emballage',2);


insert into users (hierachi,login,nom,password,departement_id,role_id) VALUES (1,'admin','RAKOTO','test',1,1);
insert into departement(is_externe,label) VALUES (false,'admin');
insert into role (label) VALUES ('directeur');