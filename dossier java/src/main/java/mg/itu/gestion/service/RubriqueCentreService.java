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

    public void save(Rubrique rubrique,String centreIdS,String pourcentage){
        Double pourcent = null;
        Short centreId = null;
        try {
           pourcent = Double.parseDouble(pourcentage);
           centreId = Integer.valueOf(centreIdS).shortValue(); 
           RubriqueCentre rubriqueCentre = RubriqueCentre.builder()
                                .rubrique(rubrique)
                                .pourcentage(pourcent)
                                .centre(Centre.builder().id(centreId).build())
                                .build();

            rubriqueCentreRepository.save(rubriqueCentre);
        } 
        catch(NumberFormatException ex){
            System.err.println("Number format ivalide, pls verify it");
        }
        catch (Exception e) {
            e.printStackTrace();
        }
    }
}
