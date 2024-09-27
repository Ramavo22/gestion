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

    public void save(String label, String typeCentre_id){
        Short typeCentreId = Integer.valueOf(typeCentre_id).shortValue();


        Centre centre = Centre.builder()
                    .label(label)
                    .centre(TypeCentre.builder().id(typeCentreId).build())
                    .build();
        
        /*
         * Validation à faire
         */

        centreRepository.save(centre);              
    }

    public void update(String idS,String label,String typeCentre_id){

        Short id = Integer.valueOf(idS).shortValue();
        Short typeCentre = null;

        // peut etre changer grace à jakarta validation
        if(typeCentre_id.compareTo("")==0 || typeCentre_id == null){
            typeCentre = Integer.valueOf(typeCentre_id).shortValue();
        }

        Centre centre = Centre.builder()
                    .id(id)
                    .label(label)
                    .centre(TypeCentre.builder().id(typeCentre).build())
                    .build();

        centreRepository.save(centre);
    }

    public List<Centre> findAll(){
        return centreRepository.findAll();
    }
}
