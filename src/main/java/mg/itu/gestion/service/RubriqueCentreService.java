package mg.itu.gestion.service;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import mg.itu.gestion.entity.Centre;
import mg.itu.gestion.entity.Rubrique;
import mg.itu.gestion.entity.RubriqueCentre;
import mg.itu.gestion.repo.RubriqueCentreRepository;

@Service
public class RubriqueCentreService {

    @Autowired
    RubriqueCentreRepository rubriqueCentreRepository;

    public void save(Rubrique rubrique,Short centreId,Double pourcentage){
        RubriqueCentre rubriqueCentre = RubriqueCentre.builder()
                            .rubrique(rubrique)
                            .pourcentage(pourcentage)
                            .centre(Centre.builder().id(centreId).build())
                            .build();

        rubriqueCentreRepository.save(rubriqueCentre);
         
        
    }
}
