package mg.itu.gestion.entity.bondereception;

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
import mg.itu.gestion.entity.bondelivraison.BonDeLivraison;

@Entity
@Data
@Builder
public class BonDeReceptionExterne {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    Long id;

    @Column
    String desc;

    @ManyToOne
    @JoinColumn(name = "bondelivraison_id")
    BonDeLivraison bonDeLivraison;

    @Column
    Date daty;

    @Column
    Integer incidentNote;

    @Column
    String remarque;
}
