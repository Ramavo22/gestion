# Projet Cahier

## Etape de conception

### Matiere premiere

- Achat du papier (Kg)
- Achat reliure (nb)
- Achat encre (litre)
- Achat du papier de couverture (Nbr)
- Achat de l'emballage

  - Film plastique (m)
  - Carton(Nb)
  - Ruban (Nb)
  
### Cout production

- Eau & Electricité (KW)
- Salaire (Sal Mens)

### Cout de Distribution

- Livraison des produits

  - Carburant (L)
  - Location Voiture (Loyer mensuel)

- Communucation

  - Crédit (Cons Periodique)

### Cout de revient

A déterminer à partir des Couts précedents

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

Table nature

- id
- label

Table charge

- id
- montant_total
- id_unity
- id_type_charge
- id_nature

Table charge_centre

- id_charge
- id_centre
- montant
- pourcentage
