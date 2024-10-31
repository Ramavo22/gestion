package mg.itu.gestion.service.bonService.livraison;

import java.sql.Date;

import org.springframework.beans.factory.annotation.Autowired;

import mg.itu.gestion.entity.BonDeCommande;
import mg.itu.gestion.entity.BonDeLivraison;
import mg.itu.gestion.repo.bonRepo.livraison.BondeLivraisonRepo;

public class BondeLivraisonService {
    
    @Autowired
    BondeLivraisonRepo bondeLivraisonRepo;

    @Autowired
    BondeLivraisonDetailsService bondeLivraisonDetailsService;



    public BonDeLivraison save(String designation, Long bondeCommandeId,Date daty,Integer[] besoinIds, Integer[] qtes  ){
        BonDeLivraison bonDeLivraison = BonDeLivraison.builder()
                                .designation(designation)
                                .bonDeCommande(BonDeCommande.builder().id(bondeCommandeId).build())
                                .daty(daty)
                                .build();

        
        bonDeLivraison =  bondeLivraisonRepo.save(bonDeLivraison);

        if(besoinIds.length != qtes.length ){
            throw new IllegalArgumentException("Besoin et qtes tsy mitovy");
        }

        for(int i = 0; i<besoinIds.length; i++){
            bondeLivraisonDetailsService.save(bonDeLivraison, besoinIds[i].shortValue(), qtes[i]);
        }

        return bondeLivraisonRepo.findById(bonDeLivraison.getId())
                .orElseThrow( () -> new IllegalArgumentException("tsy hita le izy"));
    }
}
