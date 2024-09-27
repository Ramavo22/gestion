package mg.itu.gestion.repo;

import org.springframework.data.jpa.repository.JpaRepository;

import mg.itu.gestion.entity.Charge;

public interface ChargeRepository extends JpaRepository<Charge,Long>{

    
}
