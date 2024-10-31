package mg.itu.gestion.repo.bonRepo.livraison;

import org.springframework.data.jpa.repository.JpaRepository;

import mg.itu.gestion.entity.BonDeLivraisonDetail;

public interface BondeLivraisonDetailsRepo extends JpaRepository<BonDeLivraisonDetail,Long>{
    
}
