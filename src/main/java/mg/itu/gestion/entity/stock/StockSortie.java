package mg.itu.gestion.entity.stock;

import java.sql.Date;

import jakarta.persistence.Column;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.JoinColumn;
import jakarta.persistence.ManyToOne;
import mg.itu.gestion.entity.Besoin.Besoin;
import mg.itu.gestion.entity.bilandesortie.BilanDeSortie;
import mg.itu.gestion.entity.departement.Departement;

public class StockSortie {
    
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    Long id;

    @Column
    String desc;

    @ManyToOne
    @JoinColumn(name = "besoin_id")
    Besoin besoin;

    @Column
    Integer qte;

    @Column
    Date datySortie;

    @ManyToOne
    @JoinColumn(name = "bilandesortie_id")
    BilanDeSortie bilanDeSortie;

    @ManyToOne
    @JoinColumn (name = "departement_id")
    Departement destinantion;
}
