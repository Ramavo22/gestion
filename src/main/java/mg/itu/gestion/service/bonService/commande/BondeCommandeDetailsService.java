package mg.itu.gestion.service.bonService.commande;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import mg.itu.gestion.entity.Besoin;
import mg.itu.gestion.entity.BonDeCommande;
import mg.itu.gestion.entity.BonDeCommandeDetails;
import mg.itu.gestion.repo.bonRepo.commande.BondeCommandeDetailsRepo;

@Service
public class BondeCommandeDetailsService {
    
    @Autowired
    BondeCommandeDetailsRepo bondeCommandeDetailsRepo;


    public BonDeCommandeDetails save(BonDeCommande bonDeCommande, Short besoinId, Integer qte, Double prixUnitaire){
        BonDeCommandeDetails bonDeCommandeDetails = BonDeCommandeDetails.builder()
                                                .bonDeCommande(bonDeCommande)
                                                .besoin(Besoin.builder().id(besoinId).build())
                                                .qte(qte)
                                                .prixUnitaire(prixUnitaire)
                                                .build();

        return bondeCommandeDetailsRepo.save(bonDeCommandeDetails);
    }
}
