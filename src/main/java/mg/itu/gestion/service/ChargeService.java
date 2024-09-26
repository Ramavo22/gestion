package mg.itu.gestion.service;

import java.sql.Date;

import java.util.List;

import org.hibernate.Hibernate;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

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

    @Autowired
    RubriqueService rubriqueService;


    @Transactional(rollbackFor = Exception.class)
    public void save(Integer rubriqueId,Double montantTotal,Short unityId,Date d){

        Rubrique rubrique = rubriqueService.findById(rubriqueId);

        // force hibernate a loader la rubriqueCentre
        Hibernate.initialize(rubrique.getRubriqueCentre());

        Charge charge = Charge.builder()
                    .rubrique(rubrique)
                    .montant_total(montantTotal)
                    .unity(Unity.builder().id(unityId).build())
                    .dateAction(d)
                    .build();

        charge = chargeRepository.save(charge);

        

        for (RubriqueCentre rubriqueCentre : rubrique.getRubriqueCentre()) {
            chargeCentreService.save(charge.getId(),rubriqueCentre.getCentre(), rubriqueCentre.getPourcentage(), ((montantTotal*rubriqueCentre.getPourcentage())/100));
        }
    }
}
