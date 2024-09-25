package mg.itu.gestion.entity;

import java.sql.Date;

import jakarta.persistence.Column;
import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.JoinColumn;
import jakarta.persistence.ManyToOne;
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

    @ManyToOne
    @JoinColumn(name = "type_charge_id")
    TypeCharge typeCharge;

    @ManyToOne
    @JoinColumn(name = "nature_id")
    Nature nature;

    @Column
    Date dateAction;





}
