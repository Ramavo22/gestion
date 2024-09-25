package mg.itu.gestion.entity;

import lombok.Data;
import lombok.NoArgsConstructor;
import jakarta.persistence.Column;
import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import lombok.AllArgsConstructor;
import lombok.Builder;


@Data
@Builder
@AllArgsConstructor
@NoArgsConstructor
@Entity
public class Unity {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    Short id;

    @Column
    String label;

}
