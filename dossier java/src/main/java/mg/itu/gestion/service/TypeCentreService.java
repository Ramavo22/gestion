package mg.itu.gestion.service;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import mg.itu.gestion.entity.TypeCentre;
import mg.itu.gestion.repo.TypeCentreRepository;

@Service
public class TypeCentreService {

    @Autowired
    TypeCentreRepository typeCentreRepository;


    public void save(String label){
        TypeCentre typeCentre = TypeCentre.builder()
                                        .label(label)
                                        .build();

        /**
         * Verification si besion
         */

        typeCentreRepository.save(typeCentre);
    }

    public List<TypeCentre> findAll(){
        return typeCentreRepository.findAll();
    }

    public TypeCentre findById(Short id){
        return typeCentreRepository.findById(id).orElseThrow(() -> new IllegalArgumentException("Type du centre not found"));
    }
}
