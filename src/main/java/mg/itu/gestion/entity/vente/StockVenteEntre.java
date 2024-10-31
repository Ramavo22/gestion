package mg.itu.gestion.entity.vente;

import jakarta.persistence.Column;
import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.JoinColumn;
import jakarta.persistence.ManyToOne;
import mg.itu.gestion.entity.BilanDeSortie;

@Entity
public class StockVenteEntre {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    Long id;

    @Column
    String designation;

    @Column
    Integer qtes;

    @ManyToOne
    @JoinColumn(name = "bilan_de_sortie_id")
    BilanDeSortie bilanDeSortie;
}
