package mg.itu.gestion.repo;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.query.Param;

import mg.itu.gestion.entity.Charge;

public interface ChargeRepository extends JpaRepository<Charge,Long>{

    // Méthode pour récupérer les charges d'une année spécifique
    @Query("SELECT c FROM Charge c WHERE YEAR(c.dateAction) = :year")
    public List<Charge> findChargesByYear(@Param("year") int year);

    @Query("SELECT SUM(c.montant_total) FROM Charge c")
    public Double findTotalCharges();

    @Query("SELECT SUM(c.montant_total) FROM Charge c WHERE c.rubrique.typeCharge.id = :typeChargeId")
    Double findTotalChargesByTypeCharge(@Param("typeChargeId") Short typeChargeId);


}
