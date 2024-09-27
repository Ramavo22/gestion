package mg.itu.gestion.entity;

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
import lombok.Getter;
import lombok.NoArgsConstructor;
import lombok.Setter;

@Getter
@Setter
@Builder
@AllArgsConstructor
@NoArgsConstructor
@Entity
public class Rubrique {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    Integer id;

    @Column
    String label;

    @ManyToOne
    @JoinColumn(name = "type_charge_id")
    TypeCharge typeCharge;

    @ManyToOne
    @JoinColumn(name = "nature_id")
    Nature nature;

    @OneToMany(mappedBy = "rubrique",fetch = FetchType.LAZY)
    List<RubriqueCentre> rubriqueCentre;
}