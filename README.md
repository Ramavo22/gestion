# Projet gestion analytique

## Note

Les réferences de ce projet se fera ici, dont la description du projet et ces fonctionnalité

### Technologie

La techonologie pour ce projet:

- Java 19 (Spring boot comme framework)
- PostgreSQL
- Php pour le front

### A savoir

A la réception du projet, il faut resolve la dépendance pour le fonctionnement du projet.

Veuillez executer le prompt suivant dans votre terminal à la racine du projet:

- Si linux ou bien dans le terminal de vscode

```bash
    ./mvnw dependency:resolve
```

- Si dans le invite de commande windows

```bash
    mvnw.cmd dependency:resolve
```

Voici une liste de prompt à savoir

- Pour lancer le projet
  
```bash
    mvnw spring-boot:run
```

- Pour (re)construire le projet

```bash
    mvnw clean install
```

## Description

C'est un projet pour but de faire une gestion analytique d'une entreprise.
Ceci appliquera évidemment la notion de gestion analytique

## Conception

Table type_centre

- id
- label

Table centre

- id
- label
- id_type_centre

Table unity

- id
- label

Table type_charge

- id
- label

Table Rubrique

- id
- Label

Table nature

- id
- label

Table charge

- id
- id_exercice
- id_rubrique
- montant_total
- id_unity
- id_type_charge
- id_nature

Table charge_centre

- id_charge
- id_centre
- montant
- pourcentage

## Fonctionnalité

- Comptablité analytique

  - CRUD pour chaque entité + getById
  - Calcul des charges total par centre
  - Calcul de repartition de cout du centre de structure
  - Calcul du prix unitaire théorique
  - Resultat analytique

- Comptabilité général

  - Resultat general (supposition de prix vente et faire les charges)

## Termes

- Type de charge: Incorporable/corporable/suppletive
- Type de centre: Structure/Operationnel
- Nature: Fixe/Variable
