package mg.itu.gestion.entity;

import java.sql.Date;
import java.util.List;

import jakarta.persistence.Column;
import jakarta.persistence.Entity;
import jakarta.persistence.FetchType;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.JoinColumn;
import jakarta.persistence.ManyToOne;
import jakarta.persistence.OneToMany;
import lombok.AllArgsConstructor;
import lombok.Builder;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@Builder
@NoArgsConstructor
@AllArgsConstructor
@Entity
public class Charge {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    Long id;

    @ManyToOne
    @JoinColumn(name = "rubrique_id")
    Rubrique rubrique;

    @Column
    Double montant_total;

    @ManyToOne
    @JoinColumn(name = "unity_id")
    Unity unity;

    @Column
    Date dateAction;

    @OneToMany(mappedBy = "charge",fetch = FetchType.LAZY)
    List<ChargeCentre> chargeCentre;

}
