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
import mg.itu.gestion.entity.bondecommande.BonDeCommande;


@Entity
@Builder
@Data
public class BonDeReceptionInterne {

     @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    Long id;

    @Column
    String desc;

    @ManyToOne
    @JoinColumn(name = "bondecommande_id")
    BonDeCommande bonDeLivraison;

    @Column
    Date daty;

    @Column
    Integer incidentNote;

    @Column
    String remarque;


}
