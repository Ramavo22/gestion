package mg.itu.gestion.service;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import mg.itu.gestion.dto.TotalCharge_Centre;
import mg.itu.gestion.entity.Centre;
import mg.itu.gestion.entity.Charge;
import mg.itu.gestion.entity.ChargeCentre;
import mg.itu.gestion.repo.ChargeCentreRepository;

@Service
public class ChargeCentreService {

    @Autowired
    ChargeCentreRepository chargeCentreRepository;


    public void save(Long charge_id,Centre centre,Double pourcentage,Double montant){
        ChargeCentre chargeCentre = ChargeCentre.builder()
                                .charge(Charge.builder().id(charge_id).build())
                                .centre(centre)
                                .pourcentage(pourcentage)
                                .montant(montant)
                                .build();

        chargeCentreRepository.save(chargeCentre);
    }
    public  List<TotalCharge_Centre> findTotalMontantByCentreForYear(int year){
     return   chargeCentreRepository.findTotalMontantByCentreForYear(year);
    }
    public double getTotalMontantChargeForYear(int year){
        double montant=0;
        List<TotalCharge_Centre> t= findTotalMontantByCentreForYear(year);
        for (TotalCharge_Centre totalCharge_Centre : t) {
          montant+=totalCharge_Centre.montant();
        }
        return montant;
    }
}
