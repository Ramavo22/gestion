package mg.itu.gestion.entity;

import java.sql.Date;

import jakarta.persistence.Column;
import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.JoinColumn;
import jakarta.persistence.ManyToOne;
import lombok.Builder;
import lombok.Data;

@Entity
@Data
@Builder
public class BonDeCommande {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    Long id;

    @Column
    String designation;

    @ManyToOne
    @JoinColumn(name = "demande_id")
    Demande demande;

    @ManyToOne
    @JoinColumn(name = "fournisseur_id")
    Departement fournisseur;

    @Column
    Date daty;

    @Column
    Boolean isInterne;

}
