package mg.itu.gestion.service;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import mg.itu.gestion.entity.TypeCharge;
import mg.itu.gestion.repo.TypeChargesRepository;

@Service
public class TypeChargeService {
    
    @Autowired
    TypeChargesRepository typeChargesRepository;


    public List<TypeCharge> findAll(){
        return typeChargesRepository.findAll();
    }



}
