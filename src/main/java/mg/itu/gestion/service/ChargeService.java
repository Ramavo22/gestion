package mg.itu.gestion.service;

import java.sql.Date;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

import org.hibernate.Hibernate;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

import mg.itu.gestion.dto.TotalChargeCentre;
import mg.itu.gestion.dto.TotalChargeRubrique;
import mg.itu.gestion.entity.Centre;
import mg.itu.gestion.entity.Charge;
import mg.itu.gestion.entity.ChargeCentre;
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

    public List<Charge> findAll(){
        return chargeRepository.findAll();
    }

    // cumulerChargesParRubriqueEtCentre
    public List<TotalChargeRubrique> chargeCumulé() {

        List<Charge> charges = this.findAll();
        // Map pour stocker les cumuls par rubrique
        Map<Rubrique, Double> cumulParRubrique = new HashMap<>();
        // Map pour stocker les cumuls des centres par rubrique
        Map<Rubrique, Map<Centre, Double>> cumulCentreParRubrique = new HashMap<>();

        // Parcourir la liste des charges
        for (Charge charge : charges) {
            Rubrique rubrique = charge.getRubrique();
            
            // Ajouter le montant de cette charge au total cumulé de la rubrique
            Double montantTotalRubrique = cumulParRubrique.getOrDefault(rubrique, 0.0);
            montantTotalRubrique += charge.getMontant_total();
            cumulParRubrique.put(rubrique, montantTotalRubrique);

            // Pour chaque charge, ajouter le montant à chaque centre associé
            Map<Centre, Double> cumulParCentre = cumulCentreParRubrique.getOrDefault(rubrique, new HashMap<>());
            for (ChargeCentre chargeCentre : charge.getChargeCentre()) {
                Centre centre = chargeCentre.getCentre();
                Double montantTotalCentre = cumulParCentre.getOrDefault(centre, 0.0);
                montantTotalCentre += chargeCentre.getMontant();
                cumulParCentre.put(centre, montantTotalCentre);
            }
            cumulCentreParRubrique.put(rubrique, cumulParCentre);
        }

        // Construire la liste finale des TotalChargeRubrique avec les charges par centre
        List<TotalChargeRubrique> totalChargeRubriqueList = new ArrayList<>();
        for (Map.Entry<Rubrique, Double> entryRubrique : cumulParRubrique.entrySet()) {
            Rubrique rubrique = entryRubrique.getKey();
            Double montantTotalRubrique = entryRubrique.getValue();

            // Obtenir la liste des centres et leurs montants cumulés pour cette rubrique
            List<TotalChargeCentre> totalChargeCentreList = new ArrayList<>();
            Map<Centre, Double> cumulParCentre = cumulCentreParRubrique.get(rubrique);
            for (Map.Entry<Centre, Double> entryCentre : cumulParCentre.entrySet()) {
                totalChargeCentreList.add(new TotalChargeCentre(entryCentre.getKey(), entryCentre.getValue()));
            }

            // Créer l'objet TotalChargeRubrique et l'ajouter à la liste
            totalChargeRubriqueList.add(new TotalChargeRubrique(rubrique, montantTotalRubrique, totalChargeCentreList));
        }

        return totalChargeRubriqueList;
    }
}
