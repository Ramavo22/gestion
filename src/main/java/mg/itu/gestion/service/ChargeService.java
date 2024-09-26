package mg.itu.gestion.service;

import java.sql.Date;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import mg.itu.gestion.entity.Charge;
import mg.itu.gestion.entity.Rubrique;
import mg.itu.gestion.entity.RubriqueCentre;
import mg.itu.gestion.entity.Unity;
import mg.itu.gestion.repo.ChargeRepository;

@Service
public class ChargeService {

    @Autowired
    ChargeCentreService chargeCentreService;

    @Autowired
    ChargeRepository chargeRepository;


    public void save(Integer rubriqueId,Double montantTotal,Short unityId,Date d){
        Charge charge = Charge.builder()
                    .rubrique(Rubrique.builder().id(rubriqueId).build())
                    .montant_total(montantTotal)
                    .unity(Unity.builder().id(unityId).build())
                    .dateAction(d)
                    .build();

        charge = chargeRepository.save(charge);

        List<RubriqueCentre> rubriqueCentres = charge.getRubrique().getRubriqueCentre();

        for (RubriqueCentre rubriqueCentre : rubriqueCentres) {
            chargeCentreService.save(charge.getId(),rubriqueCentre.getCentre(), rubriqueCentre.getPourcentage(), ((montantTotal*rubriqueCentre.getPourcentage())/100));
        }
    }
}
