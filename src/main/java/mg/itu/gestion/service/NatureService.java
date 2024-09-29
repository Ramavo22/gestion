package mg.itu.gestion.service;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import mg.itu.gestion.entity.Nature;
import mg.itu.gestion.repo.NatureRepository;

@Service
public class NatureService {

    @Autowired
    NatureRepository natureRepository;

    public List<Nature> findAll(){
        return natureRepository.findAll();
    }
    
}
