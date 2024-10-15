package mg.itu.gestion.entity.demande;

import jakarta.persistence.Column;
import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.JoinColumn;
import jakarta.persistence.ManyToOne;
import lombok.Builder;
import lombok.Data;
import mg.itu.gestion.entity.Besoin.Besoin;

@Entity
@Data
@Builder
public class DemandeDetail {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    Long id;

    @ManyToOne
    @JoinColumn(name = "demande_id")
    Demande demande;

    @ManyToOne
    @JoinColumn(name = "besoin_id")
    Besoin besoin;

    @Column
    Integer qte;

    
}
