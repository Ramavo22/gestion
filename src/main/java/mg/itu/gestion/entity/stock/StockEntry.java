package mg.itu.gestion.entity.stock;

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
import mg.itu.gestion.entity.Besoin.Besoin;
import mg.itu.gestion.entity.bondereception.BonDeReceptionExterne;

@Entity
@Data
@Builder
public class StockEntry {

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
    Date datyEntry;

    @ManyToOne
    @JoinColumn(name = "bondereceptionext_id")
    BonDeReceptionExterne bonDeReceptionExterne;
}
