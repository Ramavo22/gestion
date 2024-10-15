package mg.itu.gestion.entity.demande;

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
import mg.itu.gestion.entity.users.Users;

@Entity
@Data
@Builder
public class DemandeValidation {
    
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    Long id;

    @ManyToOne
    @JoinColumn(name = "demande_id")
    Demande demande;

    @ManyToOne
    @JoinColumn(name = "user_id")
    Users users;

    @Column
    Date dateCheck;

    @Column
    Integer etat;

    @Column
    Integer hierachi;
}
