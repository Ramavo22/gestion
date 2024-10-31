package mg.itu.gestion.repo.bonRepo.commande;

import java.sql.Date;
import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.query.Param;

import mg.itu.gestion.entity.BonDeCommande;

public interface BondeCommandeRepo extends JpaRepository<BonDeCommande,Long>{

    @Query("SELECT bdc FROM BonDeCommande bdc WHERE bdc.daty >= :date")
    public List<BonDeCommande> findByDateMin(@Param("date") Date debut);

    @Query("SELECT bdc FROM BonDeCommande bdc WHERE bdc.daty <= :date")
    public List<BonDeCommande> findByDateMax(@Param("date") Date fin);

    @Query("SELECT bdc FROM BonDeCommande bdc WHERE bdc.daty >= :dateD AND bdc.daty <= :dateF")
    public List<BonDeCommande> findByDateMinAndMax(@Param("dateD") Date debut, @Param("dateF") Date dateF);
}
