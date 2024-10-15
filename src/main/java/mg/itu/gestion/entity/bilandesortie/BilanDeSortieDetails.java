package mg.itu.gestion.entity.bilandesortie;

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
public class BilanDeSortieDetails {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    Long id;

    @ManyToOne
    @JoinColumn(name = "bilandesortie_id")
    BilanDeSortie bilanDeSortie;

    @ManyToOne
    @JoinColumn(name = "besoin_id")
    Besoin besoin;

    @Column
    Integer qte;
}
