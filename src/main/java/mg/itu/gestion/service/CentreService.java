package mg.itu.gestion.service;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import mg.itu.gestion.entity.Centre;
import mg.itu.gestion.entity.TypeCentre;
import mg.itu.gestion.repo.CentreRepository;

@Service
public class CentreService {

    @Autowired
    CentreRepository centreRepository;

    public void save(String label, Integer typeCentre_id){
        Short typeCentreId = typeCentre_id.shortValue();


        Centre centre = Centre.builder()
                    .label(label)
                    .typecentre(TypeCentre.builder().id(typeCentreId).build())
                    .build();
        
        /*
         * Validation à faire
         */

        centreRepository.save(centre);              
    }

    public void update(Integer id,String label,Integer typeCentre){
        Centre centre = Centre.builder()
                    .id(id.shortValue())
                    .label(label)
                    .typecentre(TypeCentre.builder().id(typeCentre.shortValue()).build())
                    .build();

        centreRepository.save(centre);
    }

    // Méthode de filtrage qui prend en compte plusieurs paramètres
    public List<Centre> filterCentres(String label, Short typeCentreId) {
        if (label != null && typeCentreId != null) {
            return centreRepository.findByLabelContainingAndTypecentreId(label, typeCentreId);
        } else if (label != null) {
            return centreRepository.findByLabelContaining(label);
        } else if (typeCentreId != null) {
            return centreRepository.findByTypecentreId(typeCentreId);
        } else {
            return centreRepository.findAll(); // Retourner tous les centres si aucun critère n'est fourni
        }
    }

    public Centre findByID(Integer id){
        return centreRepository.findById(id.shortValue())
        .orElseThrow(() -> new IllegalArgumentException("Centre introuvable"));
    }

    public void delete (Integer id){
        Centre centre = centreRepository.findById(id.shortValue())
            .orElseThrow(() -> new IllegalArgumentException("Centre introuvable"));

        centreRepository.delete(centre);
    }


}
