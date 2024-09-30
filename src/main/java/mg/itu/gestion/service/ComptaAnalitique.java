package mg.itu.gestion.service;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

import mg.itu.gestion.dto.TotalCharge_Centre;
import mg.itu.gestion.entity.Centre;
import mg.itu.gestion.entity.Charge;
import mg.itu.gestion.repo.ChargeCentreRepository;
import mg.itu.gestion.repo.ChargeRepository;

@Service
public class ComptaAnalitique {
    
    @Autowired
    ChargeService chargeService;

    @Autowired 
    ChargeRepository chargeRepository;

    @Autowired
    ChargeCentreRepository chargeCentreRepository;



    @Transactional
    public List<Charge> getChargeByYear(int year){
        List<Charge> charges = chargeRepository.findChargesByYear(year);
        
        // Initialiser les collections 'chargeCentre' pour éviter LazyInitializationException
        for (Charge charge : charges) {
            charge.getChargeCentre().size(); // Force l'initialisation de la collection
        }

        return charges;
    }

    public List<TotalCharge_Centre> getTotalMontantByCentreForYear(int year) {
        return chargeCentreRepository.findTotalMontantByCentreForYear(year);
    }


    public Double totalCharge(){
        return chargeRepository.findTotalCharges();
    }

    public Double getTotalChargesByTypeCharge(Short typeChargeId) {
        return chargeRepository.findTotalChargesByTypeCharge(typeChargeId);
    }

    public Double getTotalNonIncorporable(){
        Integer id = 2;
        return this.getTotalChargesByTypeCharge(id.shortValue());
    }

    List<TotalCharge_Centre> getTotalChargeStruture( List<TotalCharge_Centre> charge_Centres){
        List<TotalCharge_Centre> structure = new ArrayList<>();
        for (TotalCharge_Centre totalCharge_Centre : charge_Centres) {
            if(totalCharge_Centre.centre().getTypecentre().getId() == 1){
                structure.add(totalCharge_Centre);
            }
        }
        return structure;
    }
    List<TotalCharge_Centre> getTotalChargeOperationnel( List<TotalCharge_Centre> charge_Centres){
        List<TotalCharge_Centre> structure = new ArrayList<>();
        for (TotalCharge_Centre totalCharge_Centre : charge_Centres) {
            if(totalCharge_Centre.centre().getTypecentre().getId() == 2){
                structure.add(totalCharge_Centre);
            }
        }
        return structure;
    }

    public List<TotalCharge_Centre> getTotalChargeOperationnelRepartie(int year) {
        // Récupérer la liste des montants opérationnels et de structure
        List<TotalCharge_Centre> charge_Centres = this.getTotalMontantByCentreForYear(year);
        List<TotalCharge_Centre> structureCentre = this.getTotalChargeStruture(charge_Centres);
        List<TotalCharge_Centre> operationnel = this.getTotalChargeOperationnel(charge_Centres);
    
        // Calculer le total des charges opérationnelles
        double chargesTotalOperationnel = operationnel.stream()
            .mapToDouble(TotalCharge_Centre::montant)
            .sum();
    
        // Créer une HashMap pour stocker les pourcentages des centres opérationnels
        Map<Centre, Double> centrePourcentageMap = new HashMap<>();
    
        // Calculer les pourcentages pour chaque centre
        for (TotalCharge_Centre chargeCentre : operationnel) {
            Double pourcentage = (chargeCentre.montant() / chargesTotalOperationnel) * 100;
            centrePourcentageMap.put(chargeCentre.centre(), pourcentage);
        }
    
        // Créer une nouvelle liste pour stocker les coûts répartis
        List<TotalCharge_Centre> resultRepartie = new ArrayList<>();
    
        // Répartir les coûts de structure selon les pourcentages des centres opérationnels
        for (TotalCharge_Centre struct : structureCentre) {
            // Pour chaque centre dans les coûts de structure, on va répartir le coût
            for (Map.Entry<Centre, Double> entry : centrePourcentageMap.entrySet()) {
                Centre centreOperationnel = entry.getKey();
                Double pourcentageOperationnel = entry.getValue();
    
                // Calculer la part du coût de structure pour ce centre
                double montantReparti = struct.montant() * (pourcentageOperationnel / 100);
    
                // Ajouter ce montant au coût opérationnel correspondant
                // Trouver le centre opérationnel correspondant
                TotalCharge_Centre centreOp = operationnel.stream()
                    .filter(op -> op.centre().equals(centreOperationnel))
                    .findFirst()
                    .orElse(null);
    
                if (centreOp != null) {
                    // Ajouter le montant réparti au coût opérationnel existant
                    double nouveauMontant = centreOp.montant() + montantReparti;
    
                    // Créer un nouvel objet TotalCharge_Centre avec le montant mis à jour
                    TotalCharge_Centre updatedChargeCentre = new TotalCharge_Centre(centreOperationnel, nouveauMontant);
    
                    // Ajouter le nouveau montant à la liste des résultats
                    resultRepartie.add(updatedChargeCentre);
                }
            }
        }
    
        // Retourner la liste des coûts opérationnels avec les coûts de structure répartis
        return resultRepartie;
    }

    // Fonction pour obtenir la répartition des coûts de structure par centre opérationnel
    public Map<Centre, Double> getRepartitionStructureParCentreOperationnel(List<TotalCharge_Centre> structureCentres, List<TotalCharge_Centre> operationnels) {
        // Calculer le total des charges opérationnelles
        double totalChargesOperationnel = operationnels.stream()
            .mapToDouble(TotalCharge_Centre::montant)
            .sum();

        // Créer une HashMap pour stocker la répartition des coûts de structure
        Map<Centre, Double> repartitionMap = new HashMap<>();

        // Parcourir chaque centre opérationnel pour calculer le pourcentage et la répartition
        for (TotalCharge_Centre operationnel : operationnels) {
            // Calculer le pourcentage de ce centre opérationnel par rapport au total
            double pourcentageOperationnel = (operationnel.montant() / totalChargesOperationnel);

            // Pour chaque centre de structure, répartir selon le pourcentage opérationnel
            for (TotalCharge_Centre structure : structureCentres) {
                // Calculer la part du coût de structure pour ce centre opérationnel
                double repartitionMontant = structure.montant() * pourcentageOperationnel;

                // Ajouter ou cumuler la répartition dans la map
                repartitionMap.merge(operationnel.centre(), repartitionMontant, Double::sum);
            }
        }

        return repartitionMap; // Retourner la répartition des coûts de structure
    }
}
