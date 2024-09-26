package mg.itu.gestion.service;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import mg.itu.gestion.entity.Unity;
import mg.itu.gestion.repo.UnityRepository;

@Service
public class UnityService {

    @Autowired
    UnityRepository unityRepository;

    public void save(String label){
        Unity unity = Unity.builder()
                    .label(label)
                    .build();
        
        unityRepository.save(unity);
    }

    public List<Unity> findAll(){
        return unityRepository.findAll();
    }

    public Unity findById(Short id){
        return unityRepository.findById(id).orElseThrow(() -> new IllegalArgumentException("Unity not found"));
    }

    public void update(Short id, String label){
        unityRepository.save(new Unity(id, label));
    }

    public void delete(Integer id){
        Unity u = Unity.builder().id(id.shortValue()).build();
        unityRepository.delete(u);
    }


}
