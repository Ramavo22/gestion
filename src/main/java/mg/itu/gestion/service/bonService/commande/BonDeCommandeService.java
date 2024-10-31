package mg.itu.gestion.service.bonService.commande;

import java.sql.Date;
import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import mg.itu.gestion.entity.BonDeCommande;
import mg.itu.gestion.entity.Demande;
import mg.itu.gestion.entity.Departement;
import mg.itu.gestion.repo.bonRepo.commande.BondeCommandeRepo;

@Service
public class BonDeCommandeService {
    
    @Autowired
    BondeCommandeRepo bondeCommandeRepo;

    @Autowired
    BondeCommandeDetailsService bondeCommandeDetailsService;


    public BonDeCommande save(String desc,Long demandeId,Short departementId, Date daty, Boolean isInterne,Integer[] besoinId,Integer[] qtes, Double[] prixUnitaire){
        int besoinLength = besoinId.length;
        int qtesLength = qtes.length;
        int prixUnitaireLength = prixUnitaire.length;
        if(besoinLength != qtesLength || besoinLength != prixUnitaireLength || qtesLength != prixUnitaireLength) {
            throw new IllegalArgumentException("Tsy mitovy isa izany qte && besoin sy prix zany");
        }
        BonDeCommande bonDeCommande = BonDeCommande.builder()
                                .designation(desc)
                                .demande(Demande.builder().id(demandeId).build())
                                .fournisseur(Departement.builder().id(departementId).build())
                                .daty(daty)
                                .isInterne(isInterne)
                                .build();
                                
        bonDeCommande = bondeCommandeRepo.save(bonDeCommande);

        for (int i = 0; i < prixUnitaire.length; i++) {
            bondeCommandeDetailsService.save(bonDeCommande, besoinId[i].shortValue(),qtes[i] , prixUnitaire[i]);
        }
        
        return bonDeCommande;
    }


    public List<BonDeCommande> findBondeCommandeByDate(Date debut, Date fin){
        if(debut == null && fin == null) return bondeCommandeRepo.findAll();
        else if(debut != null && fin != null) return bondeCommandeRepo.findByDateMinAndMax(debut, fin);
        else if(debut != null && fin == null) return bondeCommandeRepo.findByDateMin(debut);
        else if(debut == null && fin != null) return bondeCommandeRepo.findByDateMax(fin);
        return null;
    }
}
