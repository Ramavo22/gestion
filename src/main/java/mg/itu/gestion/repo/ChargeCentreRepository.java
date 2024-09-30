package mg.itu.gestion.repo;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.query.Param;

import mg.itu.gestion.dto.TotalCharge_Centre;
import mg.itu.gestion.entity.ChargeCentre;

public interface ChargeCentreRepository extends JpaRepository<ChargeCentre,Long>{


    @Query("SELECT new mg.itu.gestion.dto.TotalCharge_Centre(c.centre, SUM(c.montant)) " +
       "FROM ChargeCentre c " +
       "WHERE YEAR(c.charge.dateAction) = :year " +
       "GROUP BY c.centre")
    List<TotalCharge_Centre> findTotalMontantByCentreForYear(@Param("year") int year);


}
