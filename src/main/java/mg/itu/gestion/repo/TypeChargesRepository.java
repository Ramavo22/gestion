package mg.itu.gestion.repo;

import org.springframework.data.jpa.repository.JpaRepository;

import mg.itu.gestion.entity.TypeCharge;

public interface TypeChargesRepository extends JpaRepository<TypeCharge,Short>{
    
}
