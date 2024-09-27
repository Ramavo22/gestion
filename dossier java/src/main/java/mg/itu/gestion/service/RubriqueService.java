package mg.itu.gestion.service;

import java.util.List;

import org.hibernate.Hibernate;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

import mg.itu.gestion.entity.Nature;
import mg.itu.gestion.entity.Rubrique;
import mg.itu.gestion.entity.TypeCharge;
import mg.itu.gestion.repo.RubriqueRepository;

@Service
public class RubriqueService {


    @Autowired
    RubriqueCentreService rubriqueCentreService;

    @Autowired
    RubriqueRepository rubriqueRepository;

    // Miampy anle Type charge sy Nature
    @Transactional
    public void save(String label,Short typeChargeId,Short natureId, String[] centresS,String[] pourcentagesS){
        Rubrique rubrique = Rubrique.builder()
                        .label(label)
                        .typeCharge(TypeCharge.builder().id(typeChargeId).build())
                        .nature(Nature.builder().id(natureId).build())
                        .build();

        rubrique = rubriqueRepository.save(rubrique);

        /*
         * Contraints à verifier
         * Verifier si les pourcentages donne 100%
         * length of centres and pourcetages is equal
         */

        Double pourcentageFinal = 0.0;
        for (int i = 0; i<centresS.length;++i) {
            pourcentageFinal+=Double.parseDouble(pourcentagesS[i]);
        }

        if(pourcentageFinal != 100){
            throw new IllegalArgumentException("Pourcentages des rubriques par centres ne donne pas 100%");
        }

        for (int i = 0; i < pourcentagesS.length; i++) {
            rubriqueCentreService.save(rubrique, centresS[i], pourcentagesS[i]);
        }
    }

    public List<Rubrique> findAll(){
        return rubriqueRepository.findAll();
    }

    @Transactional
    public Rubrique findById(Integer id){
        Rubrique rubrique = rubriqueRepository.findById(id)
        .orElseThrow(() -> new IllegalArgumentException("Rubrique not found"));
        Hibernate.initialize(rubrique.getRubriqueCentre());
        return rubrique;
    }
    
    
}
