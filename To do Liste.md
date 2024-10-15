# TO DO LIST

## Données

### departement

Il y a differente departement

- les centres
- admin
- les fournisseurs en externe
- le stock

### roles

Vu que notre règles sera le fait que c'est le responsable de departement qui fais les demandes et sont coverges dans sur une meme entité. du coup il y a:

- responsable de production
- responsable des demandes
- responsable de stock
- responsable des achats
- responsable des finances
- repsonsable des ventes
- directeur

### etats

- Demandes

  - Pas encore traiter (*la première validation est encore en attente*)
  - En cours de validation (*la première validation est accepter et les autre validation ne sont pas encore refuser*)
  - Refuser
  - Valider

- Validalition

  - En attente
  - refuser
  - Valider
  
## Fonctionnalité

### Général

- S'authentifier
- Suivre sa demandes
  - Listes sa demandes (getListDemandeId(Id))
  - avoir les informations sur la demandes
- **Pour les departement qui reçoit des besoin venant des stocks**: Creation de Bon de réception internes (liée par un bilan de sorties)

### Responsable de production (Equipe A)

- produire les cahiers

  - produireCahier()
  - **NB:** Definir les matieres premiers necessaire pour produire les cahier. Table production cahier pas encore définis

### Responsable des demandes (Equibe B)

- Creation des demandes
  
  - Formulaire de demandes, les information sont

    - descrpition
    - date demande
    - quelle user
    - pour quel departement

- liste des personnes qui doit valider la demandes

### Responsable stock (Equipe A + B)

- Liste des demandes qu'il doit valider
  - Valider ou refuser
- Voir stock
- Ajouter Bon de livraison
- Creation de bon de reception (Lié par un bon de commande)
  - Ajoute Bon de reception
  - Ajouter les besoins dans le stock Entry

### Responseble achats (Equipe C)

- Liste des demandes qu'il doit valider
- Creation de bon de commandes

### Responsable des finances (Equipe C)

- Vois les ventes et achats (Bon de commandes) par les services de ventes
  - get Liste Ventes produits
  - get Liste Bon de commandes (savoir il a été bien livré)
- Liste des demandes qu'il doit valider

### Responsable des ventes (Equipe C)

- Vente les cahiers au clients

### Directeurs (Equipe C)

- faire une demandes, toute de suites valider

- Dashboard (à definir)
