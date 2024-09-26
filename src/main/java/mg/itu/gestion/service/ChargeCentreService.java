package mg.itu.gestion.service;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

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
}
