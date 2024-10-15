package mg.itu.gestion.entity.Besoin;

import jakarta.persistence.Column;
import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import lombok.Builder;
import lombok.Data;

@Entity
@Data
@Builder
public class Besoin {
    
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    Short id;

    @Column
    String label;
}
