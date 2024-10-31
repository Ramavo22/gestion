package mg.itu.gestion.entity;

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
public class BonDeLivraisonDetail {
    
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    Long id;

    @ManyToOne
    @JoinColumn(name = "bondelivraison_id")
    BonDeLivraison bonDeLivraison;

    @ManyToOne
    @JoinColumn(name = "besoin_id")
    Besoin besoin;

    @Column
    Integer qte;

}
