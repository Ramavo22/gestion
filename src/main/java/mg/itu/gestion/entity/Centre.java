package mg.itu.gestion.entity;

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
public class Centre {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    Short id;

    @Column
    String label;

    @ManyToOne
    @JoinColumn( name = "type_centre_id" , nullable = false)
    TypeCentre typecentre;
}
