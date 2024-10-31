package mg.itu.gestion.service.bonService.livraison;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import mg.itu.gestion.entity.Besoin;
import mg.itu.gestion.entity.BonDeLivraison;
import mg.itu.gestion.entity.BonDeLivraisonDetail;
import mg.itu.gestion.repo.bonRepo.livraison.BondeLivraisonDetailsRepo;

@Service
public class BondeLivraisonDetailsService {
    
    @Autowired
    BondeLivraisonDetailsRepo bondeLivraisonDetailsRepo;

    public BonDeLivraisonDetail save(BonDeLivraison bonDeLivraison, Short besoinId, Integer qte){
        BonDeLivraisonDetail bonDeLivraisonDetail = BonDeLivraisonDetail.builder()
                                                .besoin(Besoin.builder().id(besoinId).build())
                                                .qte(qte)
                                                .build();

        return bondeLivraisonDetailsRepo.save(bonDeLivraisonDetail);
    }
}
