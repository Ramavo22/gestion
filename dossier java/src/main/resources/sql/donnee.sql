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


