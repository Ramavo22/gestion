package mg.itu.gestion.service.bonService.bilansortie;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import mg.itu.gestion.entity.BilanDeSortie;
import mg.itu.gestion.repo.bonRepo.bilandesortie.BilandeSortieRepo;

@Service
public class BilanDeSortieService {
    
    @Autowired
    BilandeSortieRepo bilandeSortieRepo;

    public BilanDeSortie findById(Long id){
        return bilandeSortieRepo.findById(id)
                .orElseThrow(() -> new IllegalArgumentException("Not Found"));
    }
}
